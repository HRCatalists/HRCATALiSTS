<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\RoleMiddleware;

Route::middleware([RoleMiddleware::class . ':admin,secretary'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
