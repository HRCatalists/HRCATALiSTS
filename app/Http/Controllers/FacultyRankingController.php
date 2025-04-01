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

        // Validate the incoming request data
        $validated = $request->validate([
            'emp_id' => 'required|exists:teaching_rank1,emp_id', // Ensure emp_id exists in teaching_rank1
        ]);

        try {
            // Fetch the faculty entry from FacultyTeachingRank1
            $faculty = FacultyTeachingRank1::where('emp_id', $validated['emp_id'])->first();

            if (!$faculty) {
                return response()->json(['error' => 'Faculty not found'], 404);
            }

            // Log the incoming request data for debugging
            Log::info('Request Data: ', $request->all());

            // Recalculate total points using the method in FacultyTeachingRank1 model
            $faculty->total_points = $faculty->calculateTotalPoints();

            // Save the updated total points
            $faculty->save();

            // Also update FacultyTeachingRank2 total points (if applicable)
            $facultyRank2 = FacultyTeachingRank2::where('emp_id', $validated['emp_id'])->first();
            if ($facultyRank2) {
                $facultyRank2->total_points = $facultyRank2->calculateTotalPoints();
                $facultyRank2->save();
            }

            // Return success response
            return response()->json(['success' => true, 'message' => 'Total points saved successfully!']);

        } catch (\Exception $e) {
            // Log the error and return a response
            Log::error('Error saving total points: ' . $e->getMessage());
            return response()->json(['error' => 'Error saving total points: ' . $e->getMessage()], 500);
        }
    }
}
