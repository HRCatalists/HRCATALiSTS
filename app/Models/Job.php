<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Log;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_posts'; // Ensures model references the correct table

    protected $fillable = [
        'user_id',
        'job_title',
        'slug',
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
     * Booted method for model events.
     */
    protected static function booted()
    {
        // Automatically generate unique slug before creating a job
        static::creating(function ($job) {
            $job->slug = self::generateUniqueSlug($job->job_title);
        });

        // Log job activities
        static::created(function ($job) {
            self::logActivity($job, 'added a new job posting');
        });

        static::updated(function ($job) {
            self::logActivity($job, 'updated a job posting');
        });
    }

    /**
     * Generate a unique slug for a job title.
     */
    private static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title, '-');
        $count = Job::where('slug', 'like', "$slug%")->count();

        return $count ? "{$slug}-" . ($count + 1) : $slug;
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
