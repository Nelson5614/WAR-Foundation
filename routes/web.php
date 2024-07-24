<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController as AdminDashboardController;
use App\Http\Controllers\Member\MemberController as MemberDashboardController;
use App\Http\Controllers\Counselor\CounselorController as CounselorDashboardController;
use App\Http\Controllers\Student\FileController;
use App\Http\Controllers\Student\StudentController as StudentDashboardController;


Route::get('/', function () {
    return view('index');
});


 Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::middleware(['role:admin'])->group(function(){
        //Admin Routes
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/admin/staff', 'App\Http\Controllers\Admin\StaffController');
        Route::resource('/admin/projects','App\Http\Controllers\Admin\ProjectsController');
        Route::resource('/admin/library', 'App\Http\Controllers\Admin\AdminLibraryController');
    });


    Route::middleware(['role:counselor'])->group(function(){

        Route::get('/counselor/dashboard', [CounselorDashboardController::class, 'index'])->name('counselor.dashboard');
    });
    //Students Routes
    Route::middleware(['role:student'])->group(function(){
        Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
        Route::get('students/library/files/download{id}', [FileController::class, 'download'])->name('files.download');
        Route::resource('/student/upcomingsessions', 'App\Http\Controllers\Student\UpcomingSessionsController');
        Route::resource('student/tasks', 'App\Http\Controllers\Student\StudentTasksController');
        Route::resource('student/studentlibrary', 'App\Http\Controllers\Student\StudentLibraryController');
        Route::resource('student/session-request', 'App\Http\Controllers\Student\SessionController');
    });

    Route::middleware(['role:member'])->group(function(){
        Route::get('/member/dashboard', [MemberDashboardController::class, 'index'])->name('member.dashboard');
    });

});
