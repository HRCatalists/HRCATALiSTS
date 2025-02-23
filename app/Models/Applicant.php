<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'resume',
        'privacy_policy_agreed',
        'status',
        'applied_at',
        'ip_address',
        'user_agent',
        'job_id',
    ];

    // Define relationship if needed
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
