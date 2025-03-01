<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 'first_name', 'last_name', 'email', 'phone', 'address', 'cv',
        'privacy_policy_agreed', 'status', 'applied_at', 'ip_address', 'user_agent'
    ];
    
    // Define relationship if needed
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
