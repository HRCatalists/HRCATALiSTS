<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeEmploymentDetail extends Model
{
    use HasFactory;

    protected $table = 'employee_employment_details';

    protected $fillable = [
        'employee_id',
        'parent_department',
        'parent_college',
        'classification',
        'employment_status',
        'date_employed',
        'accreditation',
        'date_permanent',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}