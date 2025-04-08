<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewScheduled;
// use App\Http\Controllers\ResetPasswordController;

// // Show "Forgot Password" form
// Route::get('/forgot-password', [ResetPasswordController::class, 'showEmailForm'])->name('password.request');
// Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLink'])->name('password.email');

// Route::get('/custom-reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
//     ->name('custom.password.reset');

// Route::post('/custom-reset-password', [ResetPasswordController::class, 'resetPassword'])
//     ->name('custom.password.update');




// Departments

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::post('/add-department', [DepartmentController::class, 'store'])->middleware(['auth']);

// Search Jobs
Route::get('/job-search', [HomeController::class, 'search'])->name('job.search');
Route::get('/search-jobs', [HomeController::class, 'searchJobs'])->name('search.jobs');

// Auth Check API
Route::get('/api/check-auth', function () {
    return response()->json(['authenticated' => Auth::check()]);
});

// Public
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/openings', [HomeController::class, 'openings'])->name('openings');
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// Login (guest only)
Route::get('/login', [GoogleAuthController::class, 'redirect'])->name('login')->middleware('guest');
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

// Job Application Form
Route::get('/job-selected/{slug}', [JobPostController::class, 'jobSelected'])->name('job-selected');
Route::post('/job-selected/{slug}/apply', [ApplicantController::class, 'store'])->name('applicants.store');

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    Session::flush();
    return redirect('/login');
})->name('logout');

Route::view('/privacy-policy', 'hrcatalists.legal-privacy-policy')->name('privacy.policy');
Route::view('/terms-of-use', 'hrcatalists.legal-terms-of-use')->name('terms.of.use');

// Auth routes
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/ats.php';
require __DIR__.'/ems.php';
require __DIR__.'/emp.php';