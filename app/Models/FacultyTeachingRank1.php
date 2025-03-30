<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeachingRank1 extends Model
{
    use HasFactory;

    protected $table = 'teaching_rank1'; // ✅ Explicitly define the table name

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

    public function calculateTotalPoints()
    {
        $points = 0;

        // Educational qualifications
        $points += $this->bachelors_degree ? 10 : 0;
        $points += $this->academic_units_masters ? 5 : 0;
        $points += $this->ma_ms_mat_mba_mpm_candidate ? 7 : 0;
        $points += $this->masters_thesis_no_so ? 8 : 0;
        $points += $this->full_masters_degree ? 20 : 0;
        $points += $this->academic_units_doctorate ? 10 : 0;
        $points += $this->phd_ed ? 12 : 0;
        $points += $this->doctorate_dissertation ? 15 : 0;
        $points += $this->full_doctorate_degree ? 30 : 0;
        
        // Additional degrees
        $points += $this->another_bachelors ? 5 : 0;
        $points += $this->another_masters ? 10 : 0;
        $points += $this->another_doctorate ? 15 : 0;
        $points += $this->multiple_degrees ? 5 : 0;
        
        // Certifications & Training
        $points += $this->special_training ? 5 : 0;
        $points += $this->travel_study_grant ? 6 : 0;
        $points += $this->seminars_workshops ? 3 : 0;
        $points += $this->professional_education_units ? 4 : 0;
        $points += $this->plumbing_license ? 5 : 0;
        $points += $this->certificate_completion ? 3 : 0;
        $points += $this->national_certificate ? 7 : 0;
        $points += $this->trainors_methodology ? 6 : 0;

        // Certifications
        $points += $this->teachers_board ? 10 : 0;
        $points += $this->cs_certification ? 5 : 0;
        $points += $this->bar_cpa_md_engineering ? 15 : 0;
        
        // Achievements
        $points += $this->board_bar_placer ? 10 : 0;
        $points += $this->award_local ? 5 : 0;
        $points += $this->award_regional ? 10 : 0;
        $points += $this->award_national ? 15 : 0;
        $points += $this->summa_cum_laude ? 15 : 0;
        $points += $this->magna_cum_laude ? 10 : 0;
        $points += $this->cum_laude ? 5 : 0;
        $points += $this->with_distinction ? 7 : 0;

        // Update total points
        $this->total_points = $points;
        $this->save();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
