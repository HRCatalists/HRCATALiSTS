<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\PreventBackHistory;

Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
