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
        'classroom_TeacherEvaluation', 
        'Work_Performance_Evaluation', 
        'total_points'
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
        $points = 0;

        // Evaluation scores
        $points += ($this->classroom_TeacherEvaluation ?? 0);
        $points += ($this->Work_Performance_Evaluation ?? 0);

        // Update total points
        $this->total_points = $points;
        $this->save();
    }
}
