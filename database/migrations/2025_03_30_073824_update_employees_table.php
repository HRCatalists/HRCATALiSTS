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
        'academic_year',
        'faculty_code',
        'school_of',
        'designation_group',
        'branch',
        'tel_no',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'religion',
        'citizenship',
        'civil_status',
        'spouse_name',
        'spouse_address',
        'spouse_occupation',
        'no_of_dependents',
        'children_names',
        'children_birthdates',
        'father_name',
        'father_address',
        'mother_name',
        'mother_address',
        'sss_no',
        'philhealth_no',
        'tin_no',
        'pagibig_no'
    ];

    public function teachingRank1()
    {
        return $this->hasOne(FacultyTeachingRank1::class, 'emp_id', 'id');
    }

    public function teachingRank2()
    {
        return $this->hasOne(FacultyTeachingRank2::class, 'emp_id', 'id');
    }

    public function teachingRank3()
    {
        return $this->hasOne(FacultyTeachingRank3::class, 'emp_id', 'id');
    }

    public function teachingRank4()
    {
        return $this->hasOne(FacultyTeachingRank4::class, 'emp_id', 'id');
    }
}