<?php

namespace App\Livewire;

use App\Models\DeviceIp;
use App\Models\Teacher;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Rats\Zkteco\Lib\ZKTeco;

class TeacherManager extends Component
{
    public $teachers = [];

    public function mount()
    {
        $this->fetchAndStoreTeachers();
        $this->loadTeachers();
    }

    public function loadTeachers()
    {
        $this->teachers = Teacher::all();
    }

    public function fetchAndStoreTeachers()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/teachers');
            if ($response->successful()) {
                $teachers = $response->json();
                
                foreach ($teachers as $teacher) {
                    Teacher::updateOrCreate(
                        ['teacher_id' => $teacher['id']],
                        [
                            'name_en' => $teacher['name_en'],
                            'pin_number' => $teacher['pin_number'],
                        ]
                    );
                }

                $this->teachers = Teacher::all();
                sweetalert()->success('Data fetched and stored successfully');
            } else {
                sweetalert()->error('Failed to fetch data from API');
            }
        } catch (\Exception $e) {
            sweetalert()->error('Error: ' . $e->getMessage());
        }
    }


    public function restartDevice(){
        $deviceIp = DeviceIp::first()->ip_address;
        $zk = new ZKTeco($deviceIp);

        if ($zk->connect()) {
            $zk->restart(); 
            sweetalert()->success('Restrat Successfully');
        } else {
            sweetalert()->error('Device Not Connected');
        }
    
    }
    
    public function pushTeacherToDevice($teacherId)
    {
        $teacher = Teacher::find($teacherId);

        if (!$teacher) {
            sweetalert()->error('Teacher not found.');
            return;
        }

        // Example IP address, replace with actual device IP retrieval logic
        $deviceIp = DeviceIp::first()->ip_address;
        $zk = new ZKTeco($deviceIp);

        if ($zk->connect()) {
            // Set user on the biometric device
            $result = $zk->setUser(
                $teacher->id,            // UID
                $teacher->id,            // UserID (same as UID in this case)
                $teacher->name_en,      // Name
                '00000000',             // Password (default or set as needed)
                1,                      // Role (default USER role)
                0                       // Cardno (default 0)
            );

            $zk->disconnect();

            if ($result) {
                sweetalert()->success('Teacher pushed to device successfully.');
            } else {
                sweetalert()->error('Failed to push teacher to device.');
            }
        } else {
            sweetalert()->error('Failed to connect to biometric device.');
        }
    }

    public function pushAllTeachersToDevice()
    {
        $teachers = Teacher::all();

        if ($teachers->isEmpty()) {
            sweetalert()->info('No teachers found to push.');
            return;
        }

        $deviceIp = DeviceIp::first()->ip_address;
        $zk = new ZKTeco($deviceIp);
        if (!$zk->connect()) {
            sweetalert()->error('Failed to connect to biometric device.');
            return;
        }

        $failedTeachers = [];

        foreach ($teachers as $teacher) {
            $uid = $teacher->pin_number;
            $id = $teacher->teacher_id;
            $name = $teacher->name_en;

            // Set user on the biometric device
            $result = $zk->setUser(90, $id, $name, '');

            if (!$result) {
                $failedTeachers[] = $teacher->name_en;
            }
        }

        $zk->disconnect();

        if (!empty($failedTeachers)) {
            sweetalert()->warning('Failed to push the following teachers to the device: ' . implode(', ', $failedTeachers));
        } else {
            sweetalert()->success('All teachers pushed to device successfully.');
        }
    }
    

    public function render()
    {
        return view('livewire.teacher-manager', [
            'teachers' => $this->teachers,
        ]);
    }

}
