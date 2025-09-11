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


// Debug routes - remove in production
Route::get('/debug/assign-student-role', function() {
    if (!Auth::check()) {
        return response()->json(['error' => 'Not logged in'], 401);
    }
    
    $user = Auth::user();
    
    // Create the role if it doesn't exist
    if (!\Spatie\Permission\Models\Role::where('name', 'student')->exists()) {
        \Spatie\Permission\Models\Role::create(['name' => 'student']);
    }
    
    // Assign the role to the user
    $user->assignRole('student');
    
    return response()->json([
        'message' => 'Assigned student role to user',
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->getRoleNames()
        ]
    ]);
})->middleware('auth');

Route::get('/debug/user-info', function() {
    if (!Auth::check()) {
        return response()->json(['error' => 'Not logged in'], 401);
    }
    
    $user = Auth::user();
    
    // Check if user has student role
    $hasStudentRole = $user->hasRole('student');
    
    // Get all roles
    $roles = \Spatie\Permission\Models\Role::all()->pluck('name');
    
    // Check if user has any roles
    $userRoles = $user->roles->pluck('name');
    
    // Check if user has any permissions
    $permissions = $user->getAllPermissions()->pluck('name');
    
    return response()->json([
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'has_student_role' => $hasStudentRole,
            'roles' => $userRoles,
            'all_roles' => $roles,
            'permissions' => $permissions
        ]
    ]);
})->middleware('auth');

Route::get('/', [PagesController::class, 'faq'])->name('pages.index');
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

// Contact Form Routes (public)
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    // Student Routes - Temporarily bypassing all middleware
    Route::resource('upcomingsessions', 'App\Http\Controllers\Student\UpcomingSessionsController')
        ->names([
            'index' => 'upcomingsessions.index',
            'create' => 'upcomingsessions.create',
            'store' => 'upcomingsessions.store',
            'show' => 'upcomingsessions.show',
            'edit' => 'upcomingsessions.edit',
            'update' => 'upcomingsessions.update',
            'destroy' => 'upcomingsessions.destroy',
        ]);
    
    // Admin Routes
    Route::middleware(['role:admin'])->group(function(){
        //Admin Routes
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
        
        // Contact Messages Management
        Route::prefix('admin/contacts')->name('admin.contacts.')->group(function() {
            Route::get('/', [\App\Http\Controllers\ContactController::class, 'index'])->name('index');
            Route::get('/{id}', [\App\Http\Controllers\ContactController::class, 'show'])->name('show');
            Route::delete('/{id}', [\App\Http\Controllers\ContactController::class, 'destroy'])->name('destroy');
            Route::patch('/{id}/mark-as-read', [\App\Http\Controllers\ContactController::class, 'markAsRead'])->name('markAsRead');
        });
        Route::resource('admin/staff', 'App\Http\Controllers\Admin\StaffController')->names([
            'index' => 'admin.staff.index',
            'create' => 'admin.staff.create',
            'store' => 'admin.staff.store',
            'show' => 'admin.staff.show',
            'edit' => 'admin.staff.edit',
            'update' => 'admin.staff.update',
            'destroy' => 'admin.staff.destroy',
        ]);
        Route::resource('admin/projects', 'App\Http\Controllers\Admin\ProjectsController')->names([
            'index' => 'admin.projects.index',
            'create' => 'admin.projects.create',
            'store' => 'admin.projects.store',
            'show' => 'admin.projects.show',
            'edit' => 'admin.projects.edit',
            'update' => 'admin.projects.update',
            'destroy' => 'admin.projects.destroy',
        ]);
        Route::resource('admin/library', 'App\Http\Controllers\Admin\AdminLibraryController')->names([
            'index' => 'admin.library.index',
            'create' => 'admin.library.create',
            'store' => 'admin.library.store',
            'show' => 'admin.library.show',
            'edit' => 'admin.library.edit',
            'update' => 'admin.library.update',
            'destroy' => 'admin.library.destroy',
        ]);
        Route::resource('admin/faqs', 'App\Http\Controllers\Admin\FAQsController')->names([
            'index' => 'admin.faqs.index',
            'create' => 'admin.faqs.create',
            'store' => 'admin.faqs.store',
            'show' => 'admin.faqs.show',
            'edit' => 'admin.faqs.edit',
            'update' => 'admin.faqs.update',
            'destroy' => 'admin.faqs.destroy',
        ]);
        Route::resource('admin/testimonials', 'App\Http\Controllers\Admin\TestimonialController')->names([
            'index' => 'admin.testimonials.index',
            'create' => 'admin.testimonials.create',
            'store' => 'admin.testimonials.store',
            'show' => 'admin.testimonials.show',
            'edit' => 'admin.testimonials.edit',
            'update' => 'admin.testimonials.update',
            'destroy' => 'admin.testimonials.destroy',
        ]);

        // Blog Routes
        Route::resource('admin/blogs', 'App\Http\Controllers\Admin\BlogController')->names([
            'index' => 'admin.blogs.index',
            'create' => 'admin.blogs.create',
            'store' => 'admin.blogs.store',
            'show' => 'admin.blogs.show',
            'edit' => 'admin.blogs.edit',
            'update' => 'admin.blogs.update',
            'destroy' => 'admin.blogs.destroy',
        ]);
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

