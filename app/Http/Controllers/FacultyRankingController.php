<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FacultyTeachingRank1;
use App\Models\FacultyTeachingRank2; // Import FacultyTeachingRank2 model
use App\Models\Employee;
use Illuminate\Support\Facades\Log;

class FacultyRankingController extends Controller
{
    // EMS Faculty Ranking page
    public function ranking()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-faculty-ranking');
    }

    // EMS Non-Faculty Ranking page
    public function non_ranking()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-non-teaching');
    }

    // Search function to filter faculty by name and department
    public function search(Request $request)
    {
        try {
            Log::info('Search Request Data:', $request->all()); // Log the incoming request data
    
            // Default to FacultyTeachingRank1, but check for a specific parameter to switch to FacultyTeachingRank2
            $rankType = $request->input('rank_type', 'rank1'); // Default to 'rank1' if not provided
    
            // Dynamically choose the model based on the rank type
            $query = $rankType === 'rank2' ? FacultyTeachingRank2::query() : FacultyTeachingRank1::query();
    
            // Filter by faculty name
            if ($request->has('name') && $request->name) {
                $query->whereHas('employee', function ($q) use ($request) {
                    $q->where('first_name', 'like', '%' . $request->name . '%')
                      ->orWhere('last_name', 'like', '%' . $request->name . '%');
                });
            }
    
            // Filter by department
            if ($request->has('department') && $request->department) {
                $query->whereHas('employee', function ($q) use ($request) {
                    $q->where('department', 'like', '%' . $request->department . '%');
                });
            }
    
            // Fetch the filtered faculties along with their employee data
            $faculties = $query->with('employee')->get();
    
            // If no results found, return a 404 response
            if ($faculties->isEmpty()) {
                return response()->json(['message' => 'No results found'], 404);
            }
    
            return response()->json($faculties);
    
        } catch (\Exception $e) {
            Log::error('Error searching faculty: ' . $e->getMessage()); // Log the error message
            return response()->json([
                'message' => 'An error occurred while searching',
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ], 500);
        }
    }
    

    // Save total points after calculating them
    public function saveTotalPoints(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        // Validate incoming request data
        $validated = $request->validate([
            'emp_id' => 'required|exists:teaching_rank1,emp_id',
        ]);
    
        try {
            // Fetch Faculty Rank 1 record
            $faculty = FacultyTeachingRank1::where('emp_id', $validated['emp_id'])->first();
    
            if (!$faculty) {
                return response()->json(['error' => 'Faculty not found'], 404);
            }
    
            // Log full request for debugging
            Log::info('Faculty Save Request:', $request->all());
    
            // Fields to update
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
                'with_distinction',
            ];
    
            // Assign all values
            foreach ($fields as $field) {
                $faculty->$field = $request->input($field, 0); // fallback to 0 if not present
            }
    
            // Option 1: Calculate total from model logic
            $faculty->total_points = $faculty->calculateTotalPoints();
    
            // Option 2 (optional): Accept frontend-sent total_points
            // $faculty->total_points = $request->input('total_points', $faculty->calculateTotalPoints());
    
            $faculty->save();
    
            // Optional: Update Rank 2 if it exists
            $facultyRank2 = FacultyTeachingRank2::where('emp_id', $validated['emp_id'])->first();
            if ($facultyRank2) {
                $facultyRank2->total_points = $facultyRank2->calculateTotalPoints();
                $facultyRank2->save();
            }
    
            return response()->json([
                'success' => true,
                'message' => 'Faculty ranking saved successfully.',
                'data' => $faculty // optionally return full updated record
            ]);
    
        } catch (\Exception $e) {
            Log::error('Error saving faculty ranking: ' . $e->getMessage());
            return response()->json([
                'error' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }      
}
