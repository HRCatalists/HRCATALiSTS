<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\RoleMiddleware;

// 🔐 Admin + Secretary Dashboard
Route::middleware([
    'auth',
    PreventBackHistory::class,
    RoleMiddleware::class . ':admin,secretary'
])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Add other admin-only or shared routes here
});


