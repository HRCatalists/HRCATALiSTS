<?php

use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Log;
use App\Models\Job;
use Illuminate\Support\Carbon;

Schedule::everyMinute()->call(function () {
    Log::info('⚡ Running job expiration check...');

    $updated = Job::whereDate('end_date', '<', Carbon::today())
                  ->where('status', 'active')
                  ->update(['status' => 'inactive']);

    if ($updated) {
        Log::info("✅ {$updated} expired job(s) updated to inactive.");
    } else {
        Log::warning("⚠️ No expired jobs found.");
    }
});
