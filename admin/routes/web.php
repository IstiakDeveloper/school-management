<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Admin\AddSchoolClass;
use App\Livewire\Admin\Attendance\StudentAttendanceComponent;
use App\Livewire\Admin\Attendance\StudentAttendanceReport;
use App\Livewire\Admin\Home\AdminHome;
use App\Livewire\Admin\Result\StudentResultCreate;
use App\Livewire\Admin\Result\StudentResultIndex;
use App\Livewire\Admin\Result\StudentResultShow;
use App\Livewire\Admin\Student\StudentAdmissionCreate;
use App\Livewire\Admin\Student\StudentAdmissionEdit;
use App\Livewire\Admin\Student\StudentAdmissionIndex;
use App\Livewire\Admin\Student\StudentAdmissionShow;
use App\Livewire\Admin\Subject\SubjectCreate;
use App\Livewire\Admin\Subject\SubjectEdit;
use App\Livewire\Admin\Subject\SubjectIndex;
use App\Livewire\Admin\Website\BlogComponent;
use App\Livewire\Admin\Website\Header;
use App\Livewire\Admin\Website\HeroSectionComponent;
use App\Livewire\Admin\Website\SmarterLearnerSectionComponent;
use App\Livewire\Admin\Website\StudentReviewComponent;
use App\Livewire\Admin\Website\VideoClassSectionComponent;
use App\Livewire\Admin\Teacher\IndexComponent;
use App\Livewire\Admin\Teacher\CreateComponent;
use App\Livewire\Admin\Teacher\EditComponent;
use App\Livewire\Admin\Teacher\ShowComponent;
use App\Livewire\AttendanceLogComponent;

;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\FingerDeviceComponent;
use App\Livewire\RP\PermissionManager;
use App\Livewire\RP\RoleManager;
use App\Livewire\RP\UserManager;
use App\Livewire\User\HomeComponent;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::post('/', Logout::class)->name('logout');
Route::get('/blog/{id}', [BlogComponent::class, 'show'])->name('blog.show');

Route::get('/finger-device', FingerDeviceComponent::class)->name('finger_device.index');
Route::get('/attendance-logs', AttendanceLogComponent::class)->name('attendance.logs');






Route::middleware(['auth'])->group(function () {
    Route::get('/roles', RoleManager::class)->name('roles');
    Route::get('/permissions', PermissionManager::class)->name('permissions');
    Route::get('/users', UserManager::class)->name('users');
    Route::get('/classes', AddSchoolClass::class)->name('classes');
    Route::get('/admission-create', StudentAdmissionCreate::class)->name('admission-create');
    Route::get('/admissions', StudentAdmissionIndex::class)->name('admissions');
    Route::get('/admin/students/{id}', StudentAdmissionShow::class)->name('admin.students.show');
    Route::get('/admin/student/{studentAdmission}/edit', StudentAdmissionEdit::class)->name('student.edit');


    Route::get('/subjects', SubjectIndex::class)->name('subjects.index');
    Route::get('/subjects/create', SubjectCreate::class)->name('subjects.create');
    Route::post('/subjects', [SubjectCreate::class, 'store'])->name('subjects.store');
    Route::get('/subjects/{subject}/edit', SubjectEdit::class)->name('subjects.edit');
    Route::put('/subjects/{subject}', [SubjectEdit::class, 'update'])->name('subjects.update');


    Route::get('/student-results/create', StudentResultCreate::class)->name('student-results.create');
    Route::post('/student-results', [StudentResultCreate::class, 'store'])->name('student-results.store');
    Route::get('/student-results', StudentResultIndex::class)->name('student-results.index');
    Route::get('/student-result/{studentId}', StudentResultShow::class)->name('admin.result.show');
    Route::get('/student-attendance', StudentAttendanceComponent::class)->name('student.attendance');
    Route::get('/attendance-report', StudentAttendanceReport::class)->name('attendance.report');
    Route::get('/dashboard', AdminHome::class)->name('dashboard');

    Route::get('/admin/header', Header::class)->name('admin.header');
    Route::get('/admin/hero-section', HeroSectionComponent::class)->name('admin.hero-section');
    Route::get('/admin/video-section', VideoClassSectionComponent::class)->name('admin.video-section');
    Route::get('/admin/smart-learn-section', SmarterLearnerSectionComponent::class)->name('smart.learn-section');
    Route::get('/admin/student-review-section', StudentReviewComponent::class)->name('student.review-section');
    Route::get('/admin/blogs', BlogComponent::class)->name('admin.blogs');

    Route::get('admin/teachers', IndexComponent::class)->name('teachers.index');
    Route::get('admin/teachers/create', CreateComponent::class)->name('teachers.create');
    Route::get('/teachers/{teacher}/edit', EditComponent::class)->name('teachers.edit');
    Route::get('/teachers/{teacher}', ShowComponent::class)->name('teachers.show');





});


Route::get('/run-branch-seeder', function () {
    Artisan::call('db:seed', [
        '--class' => 'BranchSeeder'
    ]);

    return 'BranchSeeder has been run successfully!';
});



Route::get('/test', function () {
    return "You have permission to access this test content!";
})->middleware('can:create-post');
Route::get('/permissions-test', function () {
    return view('permissions-test');
})->middleware('auth');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
