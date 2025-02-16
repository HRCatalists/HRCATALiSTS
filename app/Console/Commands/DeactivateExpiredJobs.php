<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Job;
use Carbon\Carbon;

class DeactivateExpiredJobs extends Command
{
    // ✅ Command signature
    protected $signature = 'jobs:deactivate-expired';

    // ✅ Description of what this command does
    protected $description = 'Automatically deactivate job posts that have passed their end date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->toDateString(); // ✅ Ensure date is formatted properly (YYYY-MM-DD)
    
        // ✅ Find all expired jobs
        $expiredJobs = Job::where('status', 'active')
                          ->whereDate('end_date', '<', $today)
                          ->get(); // Get instead of updating for debugging
    
        if ($expiredJobs->isEmpty()) {
            $this->info("No expired jobs found.");
        } else {
            foreach ($expiredJobs as $job) {
                $this->info("Expiring Job: {$job->job_title} (ID: {$job->id}) - End Date: {$job->end_date}");
            }
    
            // ✅ Now update jobs to 'inactive'
            $updatedCount = Job::where('status', 'active')
                               ->whereDate('end_date', '<', $today)
                               ->update(['status' => 'inactive']);
    
            $this->info("Successfully deactivated {$updatedCount} expired job(s).");
        }
    }
    
}
