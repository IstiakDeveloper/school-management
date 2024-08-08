<?php

namespace App\Livewire;

use App\Models\DeviceIp;
use Livewire\Component;
use Rats\Zkteco\Lib\ZKTeco;

class DeviceIpManager extends Component
{
    public $ip_address;
    public $deviceIps;

    public function mount()
    {
        $this->loadDeviceIps();
    }

    public function loadDeviceIps()
    {
        $this->deviceIps = DeviceIp::all();
    }

    public function addDeviceIp()
    {
        $this->validate(['ip_address' => 'required|ip|unique:device_ips']);
        DeviceIp::create(['ip_address' => $this->ip_address]);
        $this->ip_address = '';
        $this->loadDeviceIps();
    }


    public function clearAttendanceLog() {
        $deviceIp = DeviceIp::first()->ip_address;
        $zk = new ZKTeco($deviceIp);

        if ($zk->connect()) {
            $zk->clearAttendance();
            sweetalert()->success('Clear Attendance Log Successfully');
        } else {
            sweetalert()->error('Device Not Connected');
        }
    }

    public function deleteDeviceIp($id)
    {
        DeviceIp::find($id)->delete();
        $this->loadDeviceIps();
    }

    public function render()
    {
        return view('livewire.device-ip-manager');
    }
}
