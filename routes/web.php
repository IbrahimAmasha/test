<?php

use App\Livewire\Home;
use App\Livewire\Dashboard;
use App\Livewire\Auth\Login;
use App\Http\Middleware\User;
use App\Livewire\EditProfile;
use App\Http\Middleware\Admin;
use App\Livewire\Auth\Register;
use App\Livewire\RoleManagement;
use App\Livewire\UserManagement;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Livewire\PermissionManagement;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Livewire\AddCourse;
use App\Livewire\EnrollInCourse;
use App\Livewire\Student;
use App\Livewire\StudentCourses;
use App\Livewire\Trainer;
use App\Livewire\TrainerCourses;

// Public Routes

Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();
        
        // Redirect based on user role
        if ($user->role_id == 1) {
            // Admin: Redirect to admin dashboard
            return redirect()->route('admin.dashboard');
        } elseif ($user->role_id == 2) {
            // Trainer: Redirect to trainer home
            return redirect()->route('trainer.home');
        } elseif ($user->role_id == 3) {
            // Student: Redirect to student home
            return redirect()->route('student.home');
        }
    }

    // If not authenticated, redirect to login page
    return redirect()->route('login');
})->name('/');




// Routes accessible only to Admin (role_id = 1)
Route::middleware('role:1')->prefix('admin')->name('admin.')->group(function () {

    // Admin Routes Group
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('user-management', UserManagement::class)->name('user.management');
    Route::get('role-management', RoleManagement::class)->name('role.management');
    Route::get('permission-management', PermissionManagement::class)->name('permission.management');
    Route::get('add-course', AddCourse::class)->name('add.course');
});


// Routes accessible only to Trainers (role_id = 2)
Route::middleware('role:2')->prefix('trainer')->name('trainer.')->group(function () {
    Route::get('trainer-home', Trainer::class)->name('home');
    Route::get('trainer-courses', TrainerCourses::class)->name('courses');

});

// Routes accessible only to Students (role_id = 3)
Route::middleware('role:3')->prefix('student')->name('student.')->group(function () {
    Route::get('student-home', Student::class)->name('home');
    Route::get('enroll-in-course', EnrollInCourse::class)->name('enroll.in.course');
    Route::get('student-courses', StudentCourses::class)->name('courses');
});











Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::get('edit-profile', EditProfile::class)->name('edit.profile');

// Middleware to handle locale switching
Route::get('language/switch/{locale}', [UserController::class, 'switchLanguage'])
    ->middleware(SetLocale::class)
    ->name('language.switch');




Route::post('logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
