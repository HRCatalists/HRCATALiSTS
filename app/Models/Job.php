<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_posts'; // Change if your actual table is named 'jobs'

    protected $fillable = [
        'user_id',
        'job_title',
        'department',
        'job_description',
        'requirements',
        'tags',
        'date_issued',
        'end_date',
        'status',
    ];

    /**
     * Scope query to filter active jobs.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get the user who posted the job.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Automatically log job posting activities.
     */
    protected static function booted()
    {
        static::created(function ($job) {
            self::logActivity($job, 'added a new job posting');
        });

        static::updated(function ($job) {
            self::logActivity($job, 'updated a job posting');
        });
    }

    /**
     * Log job activities.
     */
    private static function logActivity($job, $action)
    {
        if (Auth::check()) {
            Log::create([
                'user_id' => Auth::id(),
                'activity' => ucfirst($action) . ': ' . $job->job_title,
            ]);
        }
    }
}
