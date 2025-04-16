<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // ✅ Import SoftDeletes

class Applicant extends Model
{
    use HasFactory, SoftDeletes; // ✅ Use the trait

    protected $fillable = [
        'job_id', 'first_name', 'classification', 'last_name', 'email', 'phone', 'address',
        'cv', 'privacy_policy_agreed', 'status', 'applied_at', 'notes', 'requirements'
    ];

    protected $dates = ['deleted_at']; // ✅ Helps Laravel cast deleted_at to a Carbon date object

    protected $casts = [
        'requirements' => 'array',  // ✅ This line makes everything work for JSON
    ];

    // Define relationship if needed
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    
    public function scopeIncompleteRequirements($query)
    {
        return $query->where(function($q) {
            // Check if no requirements at all
            $q->whereNull('requirements');
    
            // OR Check if any requirement is false
            foreach (config('requirements.list') as $key => $label) {
                $q->orWhereRaw("JSON_EXTRACT(requirements, '$.\"$key\"') = false");
            }
        })->whereNotIn('status', ['hired', 'rejected', 'archived']);
    }    
}
