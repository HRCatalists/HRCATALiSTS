<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_posts';

    protected $fillable = [
        'user_id',
        'job_title',
        'department',
        'job_description',
        'requirements',
        'tags',
        'date_issued',
        'end_date',
    ];

    /**
     * Get the user who posted the job.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
