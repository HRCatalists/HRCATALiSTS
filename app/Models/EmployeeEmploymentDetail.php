<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

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
        'years_served',
        'contract_type', 
    ];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // ✅ Automatically calculate and update years_served
    public function updateYearsServed()
    {
        if ($this->date_employed) {
            $startDate = Carbon::parse($this->date_employed);
            $now = now();

            $calculatedYears = $startDate->diffInYears($now);

            if ($this->years_served !== $calculatedYears) {
                $this->years_served = $calculatedYears;
                $this->save();
            }
        }
    }
}
