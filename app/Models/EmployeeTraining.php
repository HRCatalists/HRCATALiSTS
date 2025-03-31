<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTraining extends Model
{
    protected $fillable = [
        'employee_id',
        'training_date',
        'title',
        'venue',
        'remark',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
