<?php

namespace App\Livewire;

use App\Models\DeviceIp;
use Livewire\Component;
use Rats\Zkteco\Lib\ZKTeco;

class BiometricDeviceComponent extends Component
{
    public $ip_address;
    public $deviceIps;
    public $editMode = false;
    public $deviceIpId;

    public function mount()
    {
        $this->loadDeviceIps();
    }

    public function loadDeviceIps()
    {
        $this->deviceIps = DeviceIp::all();
    }

    public function addOrUpdateDeviceIp()
    {
        $this->validate(['ip_address' => 'required|ip|unique:device_ips,ip_address,' . $this->deviceIpId]);

        if ($this->editMode) {
            $deviceIp = DeviceIp::find($this->deviceIpId);
            $deviceIp->update(['ip_address' => $this->ip_address]);
            $this->editMode = false;
            $this->deviceIpId = null;
            sweetalert()->success('Device IP updated successfully');
        } else {
            DeviceIp::create(['ip_address' => $this->ip_address]);
            sweetalert()->success('Device IP created successfully');
        }

        $this->ip_address = '';
        $this->loadDeviceIps();
    }

    public function editDeviceIp($id)
    {
        $deviceIp = DeviceIp::find($id);
        $this->ip_address = $deviceIp->ip_address;
        $this->deviceIpId = $id;
        $this->editMode = true;
    }

    public function deleteDeviceIp($id)
    {
        DeviceIp::find($id)->delete();
        $this->loadDeviceIps();
        sweetalert()->success('Device IP deleted successfully');
    }

    public function render()
    {
        return view('livewire.device-ip-manager');
    }
}
