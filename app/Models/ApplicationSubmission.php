<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationSubmission extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'email',
        'classification',
        'job_id',
        'job_title',
        'status',
        'submitted_at',
    ];
}
