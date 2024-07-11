<?php

namespace App\Livewire;

use Livewire\Component;
use App\Helpers\FingerHelper;
use App\Models\AttendanceLog;
use App\Models\FingerDevice;
use App\Models\Teacher;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Rats\Zkteco\Lib\ZKTeco;

class FingerDeviceComponent extends Component
{
    public $name;
    public $ip;
    public $deviceName;
    public $users = [];
    public $teachers = [];
    public $fingerDevice;
    public $fingerDevices;
    public $selectedDevice;
    public $attendanceLogs = [];


    public function mount()
    {
        $this->fingerDevices = FingerDevice::all();
    }

    protected $listeners = ['deviceSelected'];

    public function deviceSelected()
    {
        if ($this->selectedDevice) {
            $this->fingerDevice = FingerDevice::findOrFail($this->selectedDevice);
        } else {
            $this->fingerDevice = null;
        }
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'ip' => 'required|ipv4'
    ];

    public function store()
    {
        $this->validate();

        $helper = new FingerHelper();
        $device = $helper->init($this->ip);

        if ($device->connect()) {
            $serial = $helper->getSerial($device);

            FingerDevice::create([
                'name' => $this->name,
                'ip' => $this->ip,
                'serialNumber' => $serial
            ]);

            session()->flash('success', 'Biometric Device created successfully!');
        } else {
            session()->flash('error', 'Failed connecting to Biometric Device!');
        }

        return redirect()->route('finger_device.index');
    }

    public function getDeviceName()
    {
        $helper = new FingerHelper();
        $device = $helper->init($this->ip);

        if ($device->connect()) {
            $this->deviceName = $device->deviceName();
            $device->disconnect();
        } else {
            $this->deviceName = 'Failed to connect to device';
        }
    }
    
    
    public function setDemoUser()
    {
        $messages = [];
        $helper = new FingerHelper();
        $device = $helper->init($this->ip);

        if ($device->connect()) {
            $messages[] = 'Device connected successfully.';

            $device->disableDevice();
            $messages[] = 'Device disabled.';

            // Assuming you have retrieved the user data
            $userData = [
                'uid' => 4,
                'userid' => "3",
                'name' => "John Dosde",
                'password' => "12324",
                'role' => 0,
                'cardno' => "0000000090"
            ];

            // Set user using retrieved data
            $result = $helper->setUser($device, $userData['uid'], $userData['userid'], $userData['name'], $userData['password'], $userData['role'], $userData['cardno']);

            $messages[] = "Set user result: " . json_encode($result);

            $device->enableDevice();
            $messages[] = 'Device enabled.';


            if ($result) {
                $messages[] = 'User set successfully on the device.';
                session()->flash('success', implode('<br>', $messages));
            } else {
                $messages[] = 'Failed to set user on the device.';
                session()->flash('error', implode('<br>', $messages));
            }
        } else {
            $messages[] = 'Failed to connect to the device.';
            session()->flash('error', implode('<br>', $messages));
        }
    }

    public function getUsers()
    {
        $messages = [];
        $helper = new FingerHelper();
        $device = $helper->init($this->ip);

        if ($device->connect()) {
            $messages[] = 'Device connected successfully.';
            $this->users = $device->getUser();
            $messages[] = 'Users retrieved: ' . json_encode($this->users);
            $device->disconnect();
            session()->flash('success', implode('<br>', $messages));
        } else {
            $messages[] = 'Failed to connect to the device.';
            session()->flash('error', implode('<br>', $messages));
        }
    }


    public function addTeachers()
    {
        $device = new ZKTeco("192.168.1.238", 4370);
        $device->connect();
        $deviceUsers = collect($device->getUser())->pluck('uid', 'name');
        // dd($deviceUsers);
        $this->teachers = Teacher::select('id', 'name_en')->get();
       
        foreach ($this->teachers as $teacher) {
            $uid = $teacher->id;
            $name = $teacher->name_en;
            // dd($name);
            $result = $device->setUser($uid, $uid, $name, '');

            if ($result === false) {
                dd("Failed to add user {$teacher->name_en} with ID {$teacher->id}");
            }

            $test[] = $result;
        }

        session()->flash('success', 'All Teachers added to the biometric device successfully!');
    }



    public function getAttendance()
    {
        $helper = new FingerHelper();
        $device = $helper->init($this->fingerDevice->ip);

        if ($device->connect()) {
            $attendanceLogs = $device->getAttendance();
            $storedLogs = [];

            foreach ($attendanceLogs as $log) {
                // Check if the log already exists by uid
                $existingLog = AttendanceLog::where('uid', $log['uid'])->first();

                if (!$existingLog) {
                    AttendanceLog::create([
                        'teacher_id' => null, // Or any default value you choose for teacher_id
                        'uid' => $log['uid'],
                        'user_id' => $log['id'],
                        'state' => $log['state'],
                        'timestamp' => $log['timestamp'],
                        'type' => $log['type'] == 1 ? 'Clock In' : 'Clock Out',
                    ]);
                    $storedLogs[] = $log; // Collect stored logs for debugging
                    Log::info("Stored log for UID: {$log['uid']}");
                } else {
                    Log::info("Skipping duplicate log for UID: {$log['uid']}");
                }
            }

            if (!empty($storedLogs)) {
                session()->flash('success', 'Attendance logs retrieved and stored successfully!');
            } else {
                session()->flash('error', 'No new attendance logs were stored.');
            }
        } else {
            session()->flash('error', 'Failed to connect to the device.');
        }
    }
    

    


    public function render()
    {
        return view('livewire.finger-device-component');
    }
    

}
