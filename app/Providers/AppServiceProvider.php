<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Department;
use Illuminate\Support\ServiceProvider;
use App\Services\GoogleDriveService;
use Illuminate\Console\Scheduling\Schedule;
use App\Models\FacultyTeachingRank;


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
    
    public function register()
    {
        $this->app->bind(GoogleDriveService::class, function ($app) {
            return new GoogleDriveService();
        });
    }
}
