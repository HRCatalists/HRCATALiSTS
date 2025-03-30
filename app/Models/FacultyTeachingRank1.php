<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeachingRank1 extends Model
{
    use HasFactory;

    protected $table = 'teaching_rank1'; // Explicitly define the table name

    protected $fillable = [
        'emp_id', 'department',
        'bachelors_degree', 'academic_units_masters', 'ma_ms_mat_mba_mpm_candidate',
        'masters_thesis_no_so', 'full_masters_degree', 'academic_units_doctorate',
        'phd_ed', 'doctorate_dissertation', 'full_doctorate_degree',
        'another_bachelors', 'another_masters', 'another_doctorate', 'multiple_degrees',
        'special_training', 'travel_study_grant', 'seminars_workshops',
        'professional_education_units', 'plumbing_license', 'certificate_completion',
        'national_certificate', 'trainors_methodology',
        'teachers_board', 'cs_certification', 'bar_cpa_md_engineering',
        'board_bar_placer', 'award_local', 'award_regional', 'award_national',
        'summa_cum_laude', 'magna_cum_laude', 'cum_laude', 'with_distinction',
        'total_points'
    ];

    // Auto-calculate points before saving
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($rank) {
            $rank->calculateTotalPoints();
        });
    }

    // Calculate total points dynamically
    public function calculateTotalPoints()
    {
        $pointMap = [
            // Educational qualifications
            'bachelors_degree' => 10,
            'academic_units_masters' => 5,
            'ma_ms_mat_mba_mpm_candidate' => 7,
            'masters_thesis_no_so' => 8,
            'full_masters_degree' => 20,
            'academic_units_doctorate' => 10,
            'phd_ed' => 12,
            'doctorate_dissertation' => 15,
            'full_doctorate_degree' => 30,

            // Additional degrees
            'another_bachelors' => 5,
            'another_masters' => 10,
            'another_doctorate' => 15,
            'multiple_degrees' => 5,

            // Certifications & Training
            'special_training' => 5,
            'travel_study_grant' => 6,
            'seminars_workshops' => 3,
            'professional_education_units' => 4,
            'plumbing_license' => 5,
            'certificate_completion' => 3,
            'national_certificate' => 7,
            'trainors_methodology' => 6,

            // Certifications
            'teachers_board' => 10,
            'cs_certification' => 5,
            'bar_cpa_md_engineering' => 15,

            // Achievements
            'board_bar_placer' => 10,
            'award_local' => 5,
            'award_regional' => 10,
            'award_national' => 15,
            'summa_cum_laude' => 15,
            'magna_cum_laude' => 10,
            'cum_laude' => 5,
            'with_distinction' => 7,
        ];

        // Calculate the total points by summing up the corresponding values
        $this->total_points = collect($pointMap)
            ->sum(fn ($points, $attribute) => $this->$attribute ? $points : 0);
    }

    // Define relationship to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
