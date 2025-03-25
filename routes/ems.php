<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\PreventBackHistory;

Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/ems-dashboard', [AdminController::class, 'emsDashboard'])->name('ems-dashboard');
    Route::get('/ems-employees', [AdminController::class, 'employees'])->name('ems-employees');
    Route::get('/employees/{id}', [AdminController::class, 'showEmployee'])->name('employees.show');
    Route::delete('/employees/{id}/delete', [AdminController::class, 'deleteEmployee'])->name('employees.delete');

    // Departments
    Route::get('/ems-emp-dept-coa', [AdminController::class, 'deptCOA'])->name('ems-dept-coa');
    Route::get('/ems-emp-dept-cased', [AdminController::class, 'deptCASED'])->name('ems-dept-cased');
    Route::get('/ems-emp-dept-cba', [AdminController::class, 'deptCBA'])->name('ems-dept-cba');
    Route::get('/ems-emp-dept-ccs', [AdminController::class, 'deptCCS'])->name('ems-dept-ccs');
    Route::get('/ems-emp-dept-coe', [AdminController::class, 'deptCOE'])->name('ems-dept-coe');
    Route::get('/ems-emp-dept-con', [AdminController::class, 'deptCON'])->name('ems-dept-con');
    Route::get('/ems-emp-dept-non-teaching', [AdminController::class, 'deptNon'])->name('ems-dept-non-teaching');
    Route::get('/ems-emp-dept-basicEd', [AdminController::class, 'deptBasicEd'])->name('ems-dept-basicEd');

    // EMS Extras
    Route::get('/ems-calendar', [AdminController::class, 'emscalendar'])->name('ems-calendar');
    Route::get('/ems-ranking', [AdminController::class, 'ranking'])->name('ems-ranking');
    Route::get('/ems-policy', [AdminController::class, 'companyPolicy'])->name('ems-policy');
    Route::get('/ems-logs', [AdminController::class, 'logs'])->name('ems-logs');
});
