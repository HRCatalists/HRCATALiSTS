<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyRankingController;
use App\Http\Middleware\RoleMiddleware;

// Middleware group for admin and secretary roles
Route::middleware([RoleMiddleware::class . ':admin,secretary'])->group(function () {

    // 🟢 EMS Dashboard and Employee Management
    Route::get('/ems-dashboard', [AdminController::class, 'emsDashboard'])->name('ems-dashboard');
    Route::get('/ems-employees', [AdminController::class, 'employees'])->name('ems-employees');
    Route::get('/employees/{id}', [AdminController::class, 'showEmployee'])->name('employees.show');
    Route::delete('/employees/{id}/delete', [AdminController::class, 'deleteEmployee'])->name('employees.delete');
    Route::put('/employees/{id}/update', [AdminController::class, 'update'])->name('employees.update');
    Route::post('/employees', [AdminController::class, 'store'])->name('employees.store');

    // 🟢 Departmental Filtering
    Route::get('/ems-emp-dept-coa', [AdminController::class, 'deptCOA'])->name('ems-dept-coa');
    Route::get('/ems-emp-dept-cased', [AdminController::class, 'deptCASED'])->name('ems-dept-cased');
    Route::get('/ems-emp-dept-cba', [AdminController::class, 'deptCBA'])->name('ems-dept-cba');
    Route::get('/ems-emp-dept-ccs', [AdminController::class, 'deptCCS'])->name('ems-dept-ccs');
    Route::get('/ems-emp-dept-coe', [AdminController::class, 'deptCOE'])->name('ems-dept-coe');
    Route::get('/ems-emp-dept-con', [AdminController::class, 'deptCON'])->name('ems-dept-con');
    Route::get('/ems-emp-dept-non-teaching', [AdminController::class, 'deptNon'])->name('ems-dept-non-teaching');
    Route::get('/ems-emp-dept-basicEd', [AdminController::class, 'deptBasicEd'])->name('ems-dept-basicEd');

    // 🟢 EMS Extras
    Route::get('/ems-calendar', [AdminController::class, 'emscalendar'])->name('ems-calendar');
    Route::get('/ems-policy', [AdminController::class, 'companyPolicy'])->name('ems-policy');
    Route::get('/ems-logs', [AdminController::class, 'logs'])->name('ems-logs');

    // 🟢 Faculty Ranking Pages
    Route::get('/ems-ranking', [FacultyRankingController::class, 'ranking'])->name('ems-ranking');
    Route::get('/ems-non', [FacultyRankingController::class, 'non_ranking'])->name('non-ranking');

    // 🟢 Search Faculty
    Route::post('/search-faculty', [FacultyRankingController::class, 'search'])->name('faculty.search');

    // 🟢 Save / Update Faculty Rank Points (Rank 1–4)
    Route::post('/save-points', [FacultyRankingController::class, 'saveTotalPoints']);
    Route::post('/save-points2', [FacultyRankingController::class, 'saveTotalPoints2']);
    Route::post('/save-points3', [FacultyRankingController::class, 'saveTotalPoints3']);
    Route::post('/save-points4', [FacultyRankingController::class, 'saveTotalPoints4']);
    // summary of all points
    Route::post('/save-summary', [FacultyRankingController::class, 'saveSummary'])->name('summary.save');


    // 🟢 Optional: Update via combined route (if used)
    Route::post('/update-score', [FacultyRankingController::class, 'updatePoints']);

    // 🟢 User Role Management
    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('manage-users');
    Route::post('/create-user', [AdminController::class, 'createUser'])->name('create-user');
    Route::post('/update-role', [AdminController::class, 'updateUserRole'])->name('update-role');

    // 🟢 Password Change
    Route::get('/change-password', function () {
        return view('auth.change-password');
    })->name('password.change');
    

    Route::post('/change-password', [AdminController::class, 'updatePassword'])->name('password.update');


});
