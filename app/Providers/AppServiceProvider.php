<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // $this->app->booted(function () {
        //     $this->app->make(Schedule::class)
        //         ->command('jobs:deactivate-expired')
        //         ->everyMinute()
        //         ->withoutOverlapping()
        //         ->appendOutputTo(storage_path('logs/scheduler.log'));
        // });
    }          
}
