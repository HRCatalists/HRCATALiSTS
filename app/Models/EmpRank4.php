<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpRank4 extends Model
{
    use HasFactory;

    protected $table = 'emp_rank1';

    protected $fillable = [
        'emp_id',
        'AcademicUnitsDegree',
        'AdditionalDegree',
        'Special_Training',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
