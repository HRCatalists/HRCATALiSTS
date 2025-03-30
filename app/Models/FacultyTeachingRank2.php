<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeachingRank2 extends Model
{
    use HasFactory;

    protected $table = 'teaching_rank2'; // Explicit table name
    protected $fillable = [
        'emp_id', 'full_time_cc', 'full_time_other_schools', 'part_time_cc', 'part_time_other_schools',
        'research_class_based', 'research_school_based', 'research_community_based',
        'course_module', 'workbook_lab_manual', 'research_articles', 'journal_editorship',
        'participation_chairman', 'participation_member',
        'resource_person_within', 'resource_person_outside',
        'membership_officer_accreditor', 'membership_member',
        'total_points'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function teachingRank1()
    {
        return $this->belongsTo(TeachingRank1::class, 'emp_id', 'id');
    }

    public function calculateTotalPoints()
    {
        $points = 0;

        // Teaching experience
        $points += $this->full_time_cc * 2;
        $points += $this->full_time_other_schools * 2;
        $points += $this->part_time_cc * 1;
        $points += $this->part_time_other_schools * 1;

        // Research involvement
        $points += $this->research_class_based * 5;
        $points += $this->research_school_based * 5;
        $points += $this->research_community_based * 5;

        // Academic contributions
        $points += $this->course_module * 3;
        $points += $this->workbook_lab_manual * 4;
        $points += $this->research_articles * 5;
        $points += $this->journal_editorship * 6;

        // Participation in committees
        $points += $this->participation_chairman * 3;
        $points += $this->participation_member * 2;

        // Resource person activities
        $points += $this->resource_person_within * 4;
        $points += $this->resource_person_outside * 5;

        // Membership & leadership roles
        $points += $this->membership_officer_accreditor * 3;
        $points += $this->membership_member * 2;

        // Update total points
        $this->total_points = $points;
        $this->save();
    }
}
