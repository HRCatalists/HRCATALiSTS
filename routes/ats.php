<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\JobPostController;
use App\Http\Middleware\PreventBackHistory;

Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    // ATS Dashboard
    Route::get('/ats-dashboard', [AdminController::class, 'atsDashboard'])->name('ats-dashboard');
    Route::get('/ats-calendar', [AdminController::class, 'atsCalendar'])->name('ats-calendar');
    Route::get('/ats-job-openings', [AdminController::class, 'atsJobs'])->name('ats-jobs');
    Route::get('/ats-logs', [AdminController::class, 'atsLogs'])->name('ats-logs');

    // Events
    Route::get('/events', [AdminController::class, 'getEvents'])->name('events.index');
    Route::post('/events', [AdminController::class, 'storeEvent'])->name('events.store');
    Route::delete('/events/{id}', [AdminController::class, 'deleteEvent'])->name('events.destroy');

    // Applicants
    Route::get('/ats-applicants', [ApplicantController::class, 'byStatus'])->name('ats-applicants');
    Route::get('/ats/applicants/status/{status}', [ApplicantController::class, 'byStatus'])->name('applicants.byStatus');
    Route::get('/ats-pending', [ApplicantController::class, 'pending'])->name('ats-pending');
    Route::get('/ats-screening', [ApplicantController::class, 'screening'])->name('ats-screening');
    Route::get('/ats-scheduled', [ApplicantController::class, 'scheduled'])->name('ats-scheduled');
    Route::get('/ats-evaluation', [ApplicantController::class, 'evaluation'])->name('ats-evaluation');
    Route::get('/ats-archived', [ApplicantController::class, 'archived'])->name('ats-archived');
    Route::post('/applicants/bulk-archive', [ApplicantController::class, 'bulkArchive'])->name('applicants.bulkArchive');
    Route::post('/applicants/bulk-reject', [ApplicantController::class, 'bulkReject'])->name('applicants.bulkReject');

    Route::get('/applicants/{id}', [ApplicantController::class, 'show']);
    Route::put('/applicants/{id}/notes', [ApplicantController::class, 'updateNotes'])->name('applicants.updateNotes');
    Route::post('/events/schedule/{id}', [ApplicantController::class, 'scheduleInterview'])->name('events.schedule');
    Route::post('/applicants/{id}/update-status', [ApplicantController::class, 'updateStatus'])->name('applicants.updateStatus');
    Route::post('/applicants/{id}/choose-status', [ApplicantController::class, 'chooseStatus'])->name('applicants.chooseStatus');

    // Job Post (Nested)
    Route::prefix('ats-job-openings')->group(function () {
        Route::get('/job-posts', [JobPostController::class, 'index'])->name('job-posts.index');
        Route::get('/job-posts/create', [JobPostController::class, 'create'])->name('job-posts.create');
        Route::post('/job-posts/store', [JobPostController::class, 'store'])->name('job-posts.store');
        Route::get('/job-posts/{id}/edit', [JobPostController::class, 'edit'])->name('job-posts.edit');
        Route::put('/job-posts/{id}', [JobPostController::class, 'update'])->name('job-posts.update');
        Route::delete('/job-posts/{id}', [JobPostController::class, 'destroy'])->name('job-posts.destroy');
    });

    Route::post('/jobs/{id}/toggle-status', [JobPostController::class, 'toggleStatus'])->name('jobs.toggle-status');
    Route::post('/update-expired-jobs', [AdminController::class, 'updateExpiredJobs']);
});
