<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\InterviewController;
use Illuminate\Support\Facades\Auth; // Ensure Auth is imported
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Public Route for Welcome Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     // If the user is authenticated, redirect to the last visited page or categories page
//     if (Auth::check()) {
//         return redirect()->intended('/main-menu');
//     }

//     // If the user is not authenticated, show the home page (techmax)
//     return view('hrcatalists.index');
// })->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login'); // Ensure this view exists
    })->name('login');
});

// // Redirect to login after logout to prevent going back
// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/login')->withHeaders([
//         'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
//         'Pragma' => 'no-cache',
//         'Expires' => 'Fri, 01 Jan 1990 00:00:00 GMT',
//     ]);
// });

// Route::get('/login', function () {
//     return view('auth.login'); // Ensure this view exists
// })->name('login');


// Apply authentication middleware to protect routes
Route::middleware(['auth'])->group(function () {

    // Main Menu (Choose between EMS or ATS)
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
    Route::get('/ats-applicants', [AdminController::class, 'atsApplicants'])->name('ats-applicants');
    Route::get('/ats-screening', [AdminController::class, 'atsScreening'])->name('ats-screening');
    Route::get('/ats-interview', [AdminController::class, 'atsInterview'])->name('ats-interview');
    Route::get('/ats-archived', [AdminController::class, 'atsArchived'])->name('ats-archived');
    Route::get('/ats-job-openings', [AdminController::class, 'atsJobs'])->name('ats-jobs');
    Route::get('/ats-logs', [AdminController::class, 'atsLogs'])->name('ats-logs');
});

// Applicant Routes
Route::get('/applicants', [ApplicantController::class, 'index'])->name('applicants.index');
Route::get('/applicants/create', [ApplicantController::class, 'create'])->name('applicants.create');
Route::post('/applicants/store', [ApplicantController::class, 'store'])->name('applicants.store');
Route::delete('/applicants/{applicant}', [ApplicantController::class, 'destroy'])->name('applicants.destroy');

// Job Positions Routes
Route::get('/jobs', [JobPositionController::class, 'index'])->name('jobs.index');
Route::post('/jobs/store', [JobPositionController::class, 'store'])->name('jobs.store');

// Interviews Routes
Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews.index');
Route::post('/interviews/store', [InterviewController::class, 'store'])->name('interviews.store');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
// });

require __DIR__.'/auth.php';

