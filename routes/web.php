<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth; // Ensure Auth is imported


Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/main-menu', function () {
        return view('hrcatalists.main-menu-ats-ems'); // Match the new filename
    })->name('main-menu'); // Updated route name

    Route::get('/dashboard', function () {
        return view('dashboard'); // Ensure dashboard.blade.php exists in resources/views
    })->name('dashboard');

    Route::get('/admin-ems-db', function () {
        return view('hrcatalists.admin-ems-db'); // Ensure admin-ems-db.blade.php exists in resources/views
    })->name('admin-ems-db');    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

require __DIR__.'/auth.php';
