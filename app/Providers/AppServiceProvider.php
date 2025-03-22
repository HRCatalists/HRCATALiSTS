<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Department;
use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Share departments with all views
        View::composer('*', function ($view) {
            $departments = Department::all();
            $view->with('departments', $departments);
        });
    }          
}
