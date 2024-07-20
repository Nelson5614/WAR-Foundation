<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CounselorController;
use App\Http\Controllers\ProjectsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    //Admin Routes
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/tasks', [AdminController::class, 'tasks'])->name('admin.tasks');


    //staff routes
    Route::resource('/admin/staff', StaffController::class);

    //Projects Routes
    Route::resource('/admin/projects', ProjectsController::class);


    Route::get('/counselor/dashboard', [CounselorController::class, 'index'])->name('counselor.dashboard');
    Route::get('/member/dashboard', [MemberController::class, 'index'])->name('member.dashboard');
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
});
