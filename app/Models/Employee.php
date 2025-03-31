<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'cv',
        'privacy_policy_agreed',
        'status',
        'applied_at',
        'department',
        'job_title',

        // ✅ Add all fields based on your DB
        'faculty_code',
        'school_of',
        'designation_group',
        'branch',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'religion',
        'civil_status',
        'citizenship',
        'spouse_name',
        'spouse_address',
        'spouse_occupation',
        'no_of_dependents',
        'children_birthdates',
        'father_name',
        'mother_name',
        'mother_address',
        'sss_no',
        'pagibig_no',
        'philhealth_no',
        'tin_no',
    ];

    public function employmentDetails() {
        return $this->hasOne(EmployeeEmploymentDetail::class);
    }
    
    public function licenses() {
        return $this->hasMany(EmployeeLicense::class);
    }
    
    public function educations() {
        return $this->hasMany(EmployeeEducation::class);
    }
    
    public function organizations() {
        return $this->hasMany(EmployeeOrganization::class);
    }
    
    public function others() {
        return $this->hasMany(EmployeeOther::class);
    }
    
    public function serviceRecords() {
        return $this->hasMany(EmployeeServiceRecord::class);
    }
    
    public function trainings() {
        return $this->hasMany(EmployeeTraining::class);
    }
}