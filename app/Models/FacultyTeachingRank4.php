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
        'attendance_activities',
        'committee_involvement',
        'community_extension',
        'total_points',
        'total_percentage'
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
     * Calculate and update total points and percentage.
     */
    public function calculateTotalPoints()
    {
        $points = 
            ($this->attendance_activities ?? 0) +
            ($this->committee_involvement ?? 0) +
            ($this->community_extension ?? 0);

        $percentage = $points * 0.15;

        $this->total_points = $points;
        $this->total_percentage = $percentage;

        $this->save();
    }
}
