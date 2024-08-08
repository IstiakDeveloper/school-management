<?php

use App\Livewire\BiometricDeviceComponent;
use App\Models\DeviceIp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Rats\Zkteco\Lib\ZKTeco;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', function () {
    $deviceIpModel = DeviceIp::first();
    if (!$deviceIpModel) {
        return response()->json(['error' => 'No device IP found'], 500);
    }
    $deviceIp = $deviceIpModel->ip_address;
    $zk = new ZKTeco($deviceIp);
    if ($zk->connect()) {
        $users = $zk->getUser();
        $zk->disconnect();
        return response()->json($users);
    }
    return response()->json(['error' => 'Unable to connect to device'], 500);
});

Route::get('/clear-all-user', function () {
    $deviceIpModel = DeviceIp::first();
    if (!$deviceIpModel) {
        return response()->json(['error' => 'No device IP found'], 500);
    }
    $deviceIp = $deviceIpModel->ip_address;
    $zk = new ZKTeco($deviceIp);
    if ($zk->connect()) {
        $usersDelete = $zk->clearAdmin();
        $zk->disconnect();
        return response()->json($usersDelete);
    }
    return response()->json(['error' => 'Unable to connect to device'], 500);
});

Route::get('/attendance-logs', function () {
    $deviceIpModel = DeviceIp::first();
    if (!$deviceIpModel) {
        return response()->json(['error' => 'No device IP found'], 500);
    }
    $deviceIp = $deviceIpModel->ip_address;

    $zk = new ZKTeco($deviceIp);
    if ($zk->connect()) {
        // Fetch attendance logs
        $attendanceLogs = $zk->getAttendance();
        // Fetch user data
        $users = $zk->getUser();
        $zk->disconnect();

        // Create a user lookup array by user ID
        $userLookup = [];
        foreach ($users as $user) {
            $userLookup[$user['userid']] = $user['name'];
        }

        // Merge user names into attendance logs
        foreach ($attendanceLogs as &$log) {
            if (isset($userLookup[$log['id']])) {
                $log['name'] = $userLookup[$log['id']];
            } else {
                $log['name'] = 'Unknown';
            }
        }

        return response()->json($attendanceLogs);
    }
    return response()->json(['error' => 'Unable to connect to device'], 500);
});
