<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\RoleMiddleware;

// 👤 Employee Dashboard
Route::middleware([
    'auth',
    PreventBackHistory::class,
    RoleMiddleware::class . ':employee'
])->group(function () {
    Route::get('/emp-dashboard', [EmployeeController::class, 'dashboard'])->name('emp.dashboard');
    // Add other employee-specific routes here
});