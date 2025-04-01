<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingRank2 extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'teaching_rank2';

    // List all fields that can be mass-assigned
    protected $fillable = [
        'emp_id',
        'full_time_cc',
        'full_time_other_schools',
        'part_time_cc',
        'part_time_other_schools',
        'research_class_based',
        'research_school_based',
        'research_community_based',
        'course_module',
        'workbook_lab_manual',
        'research_articles',
        'journal_editorship',
        'participation_chairman',
        'participation_member',
        'resource_person_within',
        'resource_person_outside',
        'membership_officer_accreditor',
        'membership_member',
        'total_points'
    ];

    // Define relationship with TeachingRank1 model (emp_id belongs to teaching_rank1)
    public function teachingRank1()
    {
        return $this->belongsTo(TeachingRank1::class, 'emp_id', 'emp_id');
    }

    // Calculate total points method
    public function calculateTotalPoints()
    {
        $totalPoints = 0;

        // Add points for each relevant field, ensuring numeric values are valid
        $fields = [
            'full_time_cc' => 2,
            'full_time_other_schools' => 1,
            'part_time_cc' => 0.5,
            'part_time_other_schools' => 0.25,
            'research_class_based' => 15,
            'research_school_based' => 15,
            'research_community_based' => 15,
            'course_module' => 5,
            'workbook_lab_manual' => 5,
            'research_articles' => 2,
            'journal_editorship' => 2,
            'participation_chairman' => 5,
            'participation_member' => 3,
            'resource_person_within' => 1,
            'resource_person_outside' => 1,
            'membership_officer_accreditor' => 2,
            'membership_member' => 1,
        ];

        foreach ($fields as $field => $points) {
            if (is_numeric($this->$field)) {
                $totalPoints += $this->$field * $points;
            }
        }

        // Save the total points if necessary
        $this->total_points = $totalPoints;
        $this->save();

        return $totalPoints;
    }

    // Optional: Casting boolean fields (if any)
    protected $casts = [
        // 'some_field' => 'boolean',
    ];

}
