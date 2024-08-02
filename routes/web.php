<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Student\FileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Counselor\FileDownloadController;
use App\Http\Controllers\Counselor\NotificationsController;
use App\Http\Controllers\Counselor\ShareProjectsController;
use App\Http\Controllers\Counselor\SessionSortingController;
use App\Http\Controllers\Counselor\ViewStudentFormController;
use App\Http\Controllers\Member\MemberController as MemberDashboardController;
use App\Http\Controllers\Student\StudentController as StudentDashboardController;
use App\Http\Controllers\Counselor\CounselorController as CounselorDashboardController;


Route::get('/', [PagesController::class, 'faq'])->name('pages.index');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);




Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::middleware(['role:admin'])->group(function(){
        //Admin Routes
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/admin/staff', 'App\Http\Controllers\Admin\StaffController');
        Route::resource('/admin/projects','App\Http\Controllers\Admin\ProjectsController');
        Route::resource('/admin/library', 'App\Http\Controllers\Admin\AdminLibraryController');
        Route::resource('/admin/faqs', 'App\Http\Controllers\Admin\FAQsController');
        Route::resource('/admin/testimonials', 'App\Http\Controllers\Admin\TestimonialController');
    });


    Route::middleware(['role:counselor'])->group(function(){

        Route::get('/counselor/dashboard', [CounselorDashboardController::class, 'index'])->name('counselor.dashboard');
        Route::get('/counselor/notifications', [NotificationsController::class, 'index'])->name('counselor.notifications');
        Route::get('/counselor/session-requests/{id}', [NotificationsController::class, 'showSessionRequest'])->name('counselor.session-requests.show');
        Route::get('/counselor/session-sorting', [SessionSortingController::class, 'sort'])->name('counselor.sort');
        Route::get('/counselor/shared-projects', [ShareProjectsController::class, 'index'])->name('counselor-sharedprojects.index');
        Route::get('/counselor/view-student-form/{id}', [ViewStudentFormController::class, 'view'])->name('view-student-form');
        Route::get('/counselor/file-download/{id}', [FileDownloadController::class, 'download'])->name('studentfiles.download');
        Route::resource('/counselor/set-new-session', 'App\Http\Controllers\Counselor\NewSessionController');
        Route::resource('/counselor/upcoming-sessions', 'App\Http\Controllers\Counselor\UpcomingSessionsController');
        Route::resource('/counselor/counselor-tasks', 'App\Http\Controllers\Counselor\CounselorTaskController');
        Route::resource('/counselor/counselor-library', 'App\Http\Controllers\Counselor\CounselorLibraryController');
        Route::resource('/counselor/counselor-student-files', 'App\Http\Controllers\Counselor\StudentFilesController');



    });
    //Students Routes
    Route::middleware(['role:student'])->group(function(){
        Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
        Route::get('students/library/files/download/{id}', [FileController::class, 'download'])->name('files.download');
        Route::resource('/student/upcomingsessions', 'App\Http\Controllers\Student\UpcomingSessionsController');
        Route::resource('student/tasks', 'App\Http\Controllers\Student\StudentTasksController');
        Route::resource('student/studentlibrary', 'App\Http\Controllers\Student\StudentLibraryController');
        Route::resource('student/session-request', 'App\Http\Controllers\Student\SessionController');
    });

    Route::middleware(['role:member'])->group(function(){
        Route::get('/member/dashboard', [MemberDashboardController::class, 'index'])->name('member.dashboard');
    });

});

