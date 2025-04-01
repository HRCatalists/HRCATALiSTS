<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeachingRank1 extends Model
{
    use HasFactory;

    protected $table = 'teaching_rank1';

    // List all fields that can be mass assigned
    protected $fillable = [
        'emp_id',
        'bachelor_degree',
        'academic_units_master_degree',
        'ma_ms_candidate',
        'masters_thesis_completed',
        'full_master_degree',
        'academic_units_doctorate_degree',
        'phd_education',
        'doctorate_dissertation_completed',
        'full_doctorate_degree',
        'additional_bachelor_degree',
        'additional_master_degree',
        'additional_doctorate_degree',
        'multiple_degrees',
        'specialized_training',
        'travel_grant_for_study',
        'seminars_attended',
        'professional_education_units',
        'plumbing_certification',
        'certificate_of_completion',
        'national_certification',
        'trainers_methodology',
        'teachers_board_certified',
        'career_service_certification',
        'bar_exam_certification',
        'board_exam_placer',
        'local_awards',
        'regional_awards',
        'national_awards',
        'summa_cum_laude',
        'magna_cum_laude',
        'cum_laude',
        'with_distinction',
        'total_points'
    ];

    // Define relationship with Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }

    // Calculate total points method: Adjust the calculation logic as needed
    public function calculateTotalPoints()
    {
        $totalPoints = 0;
        $fields = [
            'bachelor_degree',
            'academic_units_master_degree',
            'ma_ms_candidate',
            'masters_thesis_completed',
            'full_master_degree',
            'academic_units_doctorate_degree',
            'phd_education',
            'doctorate_dissertation_completed',
            'full_doctorate_degree',
            'additional_bachelor_degree',
            'additional_master_degree',
            'additional_doctorate_degree',
            'multiple_degrees',
            'specialized_training',
            'travel_grant_for_study',
            'seminars_attended',
            'professional_education_units',
            'plumbing_certification',
            'certificate_of_completion',
            'national_certification',
            'trainers_methodology',
            'teachers_board_certified',
            'career_service_certification',
            'bar_exam_certification',
            'board_exam_placer',
            'local_awards',
            'regional_awards',
            'national_awards',
            'summa_cum_laude',
            'magna_cum_laude',
            'cum_laude',
            'with_distinction'
        ];

        foreach ($fields as $field) {
            // Only add numeric fields to the total points, ensuring no errors due to invalid values
            $totalPoints += is_numeric($this->$field) ? $this->$field : 0;
        }

        return $totalPoints;
    }

    // Optional: Casting boolean fields
    protected $casts = [
        'teachers_board_certified' => 'boolean',
        'career_service_certification' => 'boolean',
        'bar_exam_certification' => 'boolean',
    ];
    
}
