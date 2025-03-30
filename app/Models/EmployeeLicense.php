<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeLicense extends Model
{
    protected $fillable = [
        'employee_id',
        'license_name',
        'license_number',
        'expiry_date',
        'renewal_from',
        'renewal_to',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
