<?php

use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


Route::get('/api/check-auth', function () {
    return response()->json(['authenticated' => Auth::check()]);
});

// Public Route for Welcome Page
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return Auth::check() ? redirect()->route('main-menu') : view('welcome');
// })->name('home');


// Route::get('/jobs/{id}', [HomeController::class, 'show'])->name('jobs.show');

Route::get('/openings', [HomeController::class, 'openings'])->name('openings');

// ✅ Allow only guests to access the login page
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

// ✅ Redirect logged-in users away from login page
// Route::middleware(['auth', PreventBackHistory::class])->group(function () {
//     Route::get('/main-menu', [AdminController::class, 'mainMenu'])->name('main-menu');
// });

Route::get('/job-selected/{slug}', [JobPostController::class, 'jobSelected'])->name('job-selected');

// Form Submission for Job Applications
Route::post('/job-selected/{slug}/apply', [ApplicantController::class, 'store'])->name('applicants.store');

// Apply authentication middleware to protect routes
Route::middleware(['auth', PreventBackHistory::class])->group(function () {

    // Main Menu
    Route::get('/main-menu', [AdminController::class, 'mainMenu'])->name('main-menu');

    // EMS Routes
    Route::get('/ems-dashboard', [AdminController::class, 'emsDashboard'])->name('ems-dashboard');
    Route::get('/ems-employees', [AdminController::class, 'employees'])->name('ems-employees');
    Route::get('/ems-emp-dept-coa', [AdminController::class, 'deptCOA'])->name('ems-dept-coa');
    Route::get('/ems-emp-dept-cased', [AdminController::class, 'deptCASED'])->name('ems-dept-cased');
    Route::get('/ems-emp-dept-cba', [AdminController::class, 'deptCBA'])->name('ems-dept-cba');
    Route::get('/ems-emp-dept-ccs', [AdminController::class, 'deptCCS'])->name('ems-dept-ccs');
    Route::get('/ems-emp-dept-coe', [AdminController::class, 'deptCOE'])->name('ems-dept-coe');
    Route::get('/ems-emp-dept-con', [AdminController::class, 'deptCON'])->name('ems-dept-con');
    Route::get('/ems-emp-dept-basicEd', [AdminController::class, 'deptBasicEd'])->name('ems-dept-basicEd');
    Route::get('/ems-calendar', [AdminController::class, 'calendar'])->name('ems-calendar');
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

    // Applicant Routes
    Route::get('/ats-applicants', [ApplicantController::class, 'index'])->name('ats-applicants');
    Route::get('/ats-screening', [ApplicantController::class, 'pending'])->name('ats-screening');
    Route::get('/ats-interview', [ApplicantController::class, 'interviewed'])->name('ats-interview');
    Route::get('/ats-archived', [ApplicantController::class, 'archived'])->name('ats-archived');
    Route::get('/applicants/{id}', [ApplicantController::class, 'show']);
    Route::post('/applicants/{id}/update-status', [ApplicantController::class, 'updateStatus'])->name('applicants.updateStatus');

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

