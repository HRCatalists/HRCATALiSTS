<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeachingRank3 extends Model
{
    use HasFactory;

    protected $table = 'teaching_rank3'; // Explicit table name

    protected $fillable = [
        'emp_id', 
        'classroom_evaluation', 
        'work_evaluation', 
        'total_points',
        'total_percentage',
    ];

    /**
     * Relationship to Employee model.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    /**
     * Relationship to FacultyTeachingRank2 model.
     */
    public function facultyTeachingRank2()
    {
        return $this->belongsTo(FacultyTeachingRank2::class, 'emp_id', 'emp_id');
    }

    /**
     * Calculate and update total points.
     */
    public function calculateTotalPoints()
    {
        $points = ($this->classroom_evaluation ?? 0) + ($this->work_evaluation ?? 0);
        $this->total_points = $points;
        $this->total_percentage = $points * 0.35;
        $this->save();
    }
}
