<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeOrganization extends Model
{
    protected $fillable = [
        'employee_id',
        'registration_date',
        'validity_date',
        'organization_name',
        'place',
        'position',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

