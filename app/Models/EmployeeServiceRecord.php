<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeServiceRecord extends Model
{
    protected $fillable = [
        'employee_id',
        'department',
        'inclusive_date',
        'appointment_record',
        'position',
        'rank',
        'remarks',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
