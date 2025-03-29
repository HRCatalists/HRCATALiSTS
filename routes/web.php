<?php

use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // ✅ Required for sending emails
use App\Mail\InterviewScheduled;     // ✅ Custom Mailable for interview scheduling



// Route to show the departments list (for the search dropdown)
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
// Search Jobs Route
Route::get('/job-search', [HomeController::class, 'search'])->name('job.search');
Route::get('/search-jobs', [HomeController::class, 'searchJobs'])->name('search.jobs');

Route::get('/api/check-auth', function () {
    return response()->json(['authenticated' => Auth::check()]);
});

// Public Route for Welcome Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/jobs/{id}', [HomeController::class, 'show'])->name('jobs.show');
Route::get('/openings', [HomeController::class, 'openings'])->name('openings');
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name ('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// ✅ Google SSO Routes

// ✅ Allow only guests to access the login page
Route::get('/login', [GoogleAuthController::class, 'redirect'])
    ->name('login')
    ->middleware('guest');

  


// ✅ Allow only guests to access the login page
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::get('/job-selected/{slug}', [JobPostController::class, 'jobSelected'])->name('job-selected');

// Form Submission for Job Applications
Route::post('/job-selected/{slug}/apply', [ApplicantController::class, 'store'])->name('applicants.store');

// Apply authentication middleware to protect routes
Route::middleware(['auth', PreventBackHistory::class])->group(function () {

    // Main Menu
    // Route::get('/main-menu', [AdminController::class, 'mainMenu'])->name('main-menu');
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // EMS Routes
    Route::get('/ems-dashboard', [AdminController::class, 'emsDashboard'])->name('ems-dashboard');
    Route::get('/ems-employees', [AdminController::class, 'employees'])->name('ems-employees');
    Route::get('/employees/{id}', [AdminController::class, 'showEmployee'])->name('employees.show');
    Route::delete('/employees/{id}/delete', [AdminController::class, 'deleteEmployee'])->name('employees.delete');

    Route::get('/ems-emp-dept-coa', [AdminController::class, 'deptCOA'])->name('ems-dept-coa');
    Route::get('/ems-emp-dept-cased', [AdminController::class, 'deptCASED'])->name('ems-dept-cased');
    Route::get('/ems-emp-dept-cba', [AdminController::class, 'deptCBA'])->name('ems-dept-cba');
    Route::get('/ems-emp-dept-ccs', [AdminController::class, 'deptCCS'])->name('ems-dept-ccs');
    Route::get('/ems-emp-dept-coe', [AdminController::class, 'deptCOE'])->name('ems-dept-coe');
    Route::get('/ems-emp-dept-con', [AdminController::class, 'deptCON'])->name('ems-dept-con');
    Route::get('/ems-emp-dept-non-teaching', [AdminController::class, 'deptNon'])->name('ems-dept-non-teaching');
    Route::get('/ems-emp-dept-basicEd', [AdminController::class, 'deptBasicEd'])->name('ems-dept-basicEd');
    Route::get('/ems-calendar', [AdminController::class, 'emscalendar'])->name('ems-calendar');
    Route::get('/ems-ranking', [AdminController::class, 'ranking'])->name('ems-ranking');
    Route::get('/ems-policy', [AdminController::class, 'companyPolicy'])->name('ems-policy');
    Route::get('/ems-logs', [AdminController::class, 'logs'])->name('ems-logs');

    // ATS Routes
    Route::get('/ats-dashboard', [AdminController::class, 'atsDashboard'])->name('ats-dashboard');
    Route::get('/ats-calendar', [AdminController::class, 'atsCalendar'])->name('ats-calendar');


    Route::get('/events', [AdminController::class, 'getEvents'])->name('events.index');
    Route::post('/events', [AdminController::class, 'storeEvent'])->name('events.store');
    Route::delete('/events/{id}', [AdminController::class, 'deleteEvent'])->name('events.destroy');
    Route::get('/ats-job-openings', [AdminController::class, 'atsJobs'])->name('ats-jobs');
    // Update the status of expired jobs
    Route::post('/update-expired-jobs', [AdminController::class, 'updateExpiredJobs']);

    // Applicant Routes
    Route::get('/ats-applicants', [ApplicantController::class, 'byStatus'])->name('ats-applicants');
    Route::get('/ats/applicants/status/{status}', [ApplicantController::class, 'byStatus'])->name('applicants.byStatus');
    Route::get('/ats-pending', [ApplicantController::class, 'pending'])->name('ats-pending');
    Route::get('/ats-screening', [ApplicantController::class, 'screening'])->name('ats-screening');
    Route::get('/ats-scheduled', [ApplicantController::class, 'scheduled'])->name('ats-scheduled');
    Route::get('/ats-evaluation', [ApplicantController::class, 'evaluation'])->name('ats-evaluation');
    Route::get('/ats-archived', [ApplicantController::class, 'archived'])->name('ats-archived');
    // Route::get('/applicants/{id}', [ApplicantController::class, 'show']);
    Route::put('/ats/applicants/{id}/notes', [ApplicantController::class, 'updateNotes'])->name('applicants.updateNotes');
    Route::post('/ats/schedule/{id}', [ApplicantController::class, 'scheduleInterview'])->name('events.schedule');

    //overview buttons
    Route::post('/applicants/{id}/update-status', [ApplicantController::class, 'updateStatus'])->name('applicants.updateStatus');

    //applicant ats update dropdown buttons
    Route::post('/applicants/{id}/choose-status', [ApplicantController::class, 'chooseStatus'])->name('applicants.chooseStatus');

    // ** Job Post Routes (Nested under Job Openings) **
    Route::prefix('ats-job-openings')->group(function () {
        // Show the list of job posts
        Route::get('/job-posts', [JobPostController::class, 'index'])->name('job-posts.index');
    
        // Show the form to create a new job post
        Route::get('/job-posts/create', [JobPostController::class, 'create'])->name('job-posts.create');
    
        // Store a new job post
        Route::post('/job-posts/store', [JobPostController::class, 'store'])->name('job-posts.store');
    
        // Show the form to edit an existing job post
        Route::get('/job-posts/{id}/edit', [JobPostController::class, 'edit'])->name('job-posts.edit');
    
        // Update the existing job post
        Route::put('/job-posts/{id}', [JobPostController::class, 'update'])->name('job-posts.update');
    
        // Delete a job post
        Route::delete('/job-posts/{id}', [JobPostController::class, 'destroy'])->name('job-posts.destroy');
    });
    
    Route::get('/ats-logs', [AdminController::class, 'atsLogs'])->name('ats-logs');

    Route::post('/jobs/{id}/toggle-status', [JobPostController::class, 'toggleStatus'])->name('jobs.toggle-status');
});

Route::post('/logout', function () {
    Auth::logout();
    Session::flush(); // Clear all session data
    return redirect('/login');
})->name('logout');

require __DIR__.'/auth.php';

