<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\Log;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Employee;


use App\Models\FacultyTeachingRank1;

class FacultyRankingController extends Controller
{
    public function ranking()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-faculty-ranking'); // EMS Faculty/Non-teaching Ranking
    }
    public function non_ranking()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-non-teaching'); // EMS Faculty/Non-teaching Ranking
    }

    public function search(Request $request)
    {
        // Prepare query to filter based on employee's name and department
        $query = FacultyTeachingRank1::query();

        // Apply filter if 'name' is provided
        if ($request->has('name') && $request->name) {
            $query->whereHas('employee', function($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->name . '%')
                  ->orWhere('last_name', 'like', '%' . $request->name . '%');
            });
        }

        // Apply filter if 'department' is provided
        if ($request->has('department') && $request->department) {
            $query->whereHas('employee', function($q) use ($request) {
                $q->where('department', 'like', '%' . $request->department . '%');
            });
        }

        // Fetch faculties along with their scores and employee information
        $faculties = $query->with('employee')->get(); // Eager load employee data

        // Return the faculty data as a JSON response
        return response()->json($faculties);
    }
    
public function updatePoints(Request $request)
{
    // Validate the incoming points data
    $validated = $request->validate([
        'emp_id' => 'required|exists:faculty_teaching_ranks,emp_id', // Ensure the employee ID exists

        // Educational qualifications
        'bachelors_degree' => 'nullable|integer|min:0',
        'academic_units_masters' => 'nullable|integer|min:0',
        'ma_ms_mat_mba_mpm_candidate' => 'nullable|integer|min:0',
        'masters_thesis_no_so' => 'nullable|integer|min:0',
        'full_masters_degree' => 'nullable|integer|min:0',
        'academic_units_doctorate' => 'nullable|integer|min:0',
        'phd_ed' => 'nullable|integer|min:0',
        'doctorate_dissertation' => 'nullable|integer|min:0',
        'full_doctorate_degree' => 'nullable|integer|min:0',

        // Additional degrees
        'another_bachelors' => 'nullable|integer|min:0',
        'another_masters' => 'nullable|integer|min:0',
        'another_doctorate' => 'nullable|integer|min:0',
        'multiple_degrees' => 'nullable|integer|min:0',

        // Certifications and training
        'special_training' => 'nullable|integer|min:0',
        'travel_study_grant' => 'nullable|integer|min:0',
        'seminars_workshops' => 'nullable|integer|min:0',
        'professional_education_units' => 'nullable|integer|min:0',
        'plumbing_license' => 'nullable|integer|min:0',
        'certificate_completion' => 'nullable|integer|min:0',
        'national_certificate' => 'nullable|integer|min:0',
        'trainors_methodology' => 'nullable|integer|min:0',

        // Certifications (Changed to boolean where applicable)
        'teachers_board' => 'nullable|boolean',
        'cs_certification' => 'nullable|boolean',
        'bar_cpa_md_engineering' => 'nullable|boolean',

        // Achievements
        'board_bar_placer' => 'nullable|integer|min:0|max:10',
        'award_local' => 'nullable|integer|min:0|max:3',
        'award_regional' => 'nullable|integer|min:0|max:5',
        'award_national' => 'nullable|integer|min:0|max:10',
        'summa_cum_laude' => 'nullable|integer|min:0|max:10',
        'magna_cum_laude' => 'nullable|integer|min:0|max:8',
        'cum_laude' => 'nullable|integer|min:0|max:6',
        'with_distinction' => 'nullable|integer|min:0|max:3',
    ]);

    // Find the faculty record by emp_id
    $faculty = FacultyTeachingRank1::where('emp_id', $validated['emp_id'])->first();

    if (!$faculty) {
        return response()->json(['status' => 'error', 'message' => 'Faculty not found.'], 404);
    }

    // Update the points for each field
    foreach ($validated as $field => $points) {
        // Skip the emp_id key as it is not a field in the database
        if ($field !== 'emp_id') {
            $faculty->$field = $points;
        }
    }

    // Recalculate the total points after updating
    $faculty->total_points = $faculty->calculateTotalPoints();

    // Save the updated faculty record
    $faculty->save();

    return response()->json(['status' => 'success', 'message' => 'Points updated successfully!', 'data' => $faculty]);
}
}
