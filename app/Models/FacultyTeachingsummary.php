<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FacultyTeachingSummary extends Model
{
    use HasFactory;

    protected $table = 'teaching_summary';
    protected $fillable = [
        'emp_id',
        'academy_preparation_other_qualifications',
        'teaching_and_work_exp',
        'faculty_performance',
        'corporate_commitment',
        'old_rank',
        'old_score',
    ];
    

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
}
