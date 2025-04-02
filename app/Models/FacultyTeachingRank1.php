<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeachingRank1 extends Model
{
    use HasFactory;

    protected $table = 'teaching_rank1';

    protected $fillable = [
        'emp_id',
        'department',
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

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }

    public function calculateTotalPoints()
    {
        $total = 0;
        $fields = [
            // Numeric fields (number inputs)
            'academic_units_master_degree',
            'academic_units_doctorate_degree',
            'seminars_attended',

            // Point-based checkboxes
            'bachelor_degree',
            'ma_ms_candidate',
            'masters_thesis_completed',
            'full_master_degree',
            'phd_education',
            'doctorate_dissertation_completed',
            'full_doctorate_degree',
            'additional_bachelor_degree',
            'additional_master_degree',
            'additional_doctorate_degree',
            'multiple_degrees',
            'specialized_training',
            'travel_grant_for_study',
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
            $value = $this->$field;
            $total += is_numeric($value) ? (float) $value : 0;
        }

        return $total;
    }

    // Cast numeric fields only
    protected $casts = [
        'academic_units_master_degree' => 'float',
        'academic_units_doctorate_degree' => 'float',
        'seminars_attended' => 'float',
        'total_points' => 'float',
    ];
}
