<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeachingSummary extends Model
{
    use HasFactory;

    protected $table = 'teaching_summary'; // Explicit table name

    protected $fillable = [
        'emp_id', 
        'Academy_Preparation_Other_Qualifications', 
        'Faculty_Performance', 
        'Corporate_Commitmen', 
        'TeachingAndWorkExp'
    ];

    /**
     * Relationship to Employee model.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    /**
     * Relationship to FacultyTeachingRank4 model.
     */
    public function facultyTeachingRank4()
    {
        return $this->belongsTo(FacultyTeachingRank4::class, 'emp_id', 'emp_id');
    }

    /**
     * Calculate and update total points.
     */
    public function calculateTotalPoints()
    {
        $points = 0;

        // Summing up various ranking components
        $points += ($this->Academy_Preparation_Other_Qualifications ?? 0);
        $points += ($this->Faculty_Performance ?? 0);
        $points += ($this->Corporate_Commitmen ?? 0);
        $points += ($this->TeachingAndWorkExp ?? 0);

        // Update total points
        $this->total_points = $points;
        $this->save();
    }
}
