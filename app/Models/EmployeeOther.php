<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeOther extends Model
{
    protected $fillable = [
        'employee_id',
        'date',
        'description',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
