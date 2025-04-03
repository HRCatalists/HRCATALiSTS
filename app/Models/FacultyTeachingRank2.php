<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeachingRank2 extends Model
{
    use HasFactory;

    protected $table = 'teaching_rank2';

    protected $primaryKey = 'id';

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
        'total_points',
    ];

    public function employee()
    {
        return $this->belongsTo(FacultyTeachingRank1::class, 'emp_id', 'emp_id');
    }

    public function calculateTotalPoints()
    {
        return
            ($this->full_time_cc * 2) +
            ($this->full_time_other_schools * 1) +
            ($this->part_time_cc * 0.5) +
            ($this->part_time_other_schools * 0.25) +

            ($this->research_class_based * 5) +
            ($this->research_school_based * 15) +
            ($this->research_community_based * 5) +

            ($this->course_module * 5) +
            ($this->workbook_lab_manual * 5) +
            ($this->research_articles * 2) +
            ($this->journal_editorship * 2) +

            ($this->participation_chairman * 5) +
            ($this->participation_member * 3) +

            ($this->resource_person_within * 1) +
            ($this->resource_person_outside * 1) +

            ($this->membership_officer_accreditor * 2) +
            ($this->membership_member * 1);
    }
}
