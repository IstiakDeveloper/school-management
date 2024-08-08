<?php

use App\Livewire\BiometricDeviceComponent;
use App\Livewire\DeviceIpManager;
use App\Livewire\TeacherIndex;
use App\Livewire\TeacherManager;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::get('/device-ip', DeviceIpManager::class)->name('device_ip');
Route::get('/teacher-index', TeacherIndex::class)->name('teacher_index');
Route::get('/teachers', TeacherManager::class)->name('teachers');
Route::get('/biomatric-device', BiometricDeviceComponent::class)->name('biomatric_device');

require __DIR__.'/auth.php';
