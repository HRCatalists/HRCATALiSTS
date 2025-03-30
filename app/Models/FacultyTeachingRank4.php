<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeachingRank4 extends Model
{
    use HasFactory;

    protected $table = 'teaching_rank4'; // Explicit table name

    protected $fillable = [
        'emp_id', 
        'Attendance_school_sponsored_activities', 
        'Committee_Involvement', 
        'Participation_in_the_CC_Community_Extension_Program', 
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
     * Relationship to FacultyTeachingRank3 model.
     */
    public function facultyTeachingRank3()
    {
        return $this->belongsTo(FacultyTeachingRank3::class, 'emp_id', 'emp_id');
    }

    /**
     * Calculate and update total points.
     */
    public function calculateTotalPoints()
    {
        $points = 0;

        // Participation Points
        $points += ($this->Attendance_school_sponsored_activities ?? 0);
        $points += ($this->Committee_Involvement ?? 0);
        $points += ($this->Participation_in_the_CC_Community_Extension_Program ?? 0);

        // Update total points
        $this->total_points = $points;
        $this->save();
    }
}
