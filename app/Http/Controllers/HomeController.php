<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Department;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch only active jobs
        $jobs = Job::where('status', 'active')->get();
        
        // ✅ Fetch departments for the search dropdown
        $departments = Department::all();

        return view('hrcatalists.index', compact('jobs', 'departments'));
    }

    public function show($id)
    {
        $job = Job::findOrFail($id); // Fetch job by ID or return 404 if not found
        return view('jobs.show', compact('job'));
    }

    public function openings()
    {
        $query = Job::where('status', 'active');

        if (request()->has('keyword') && !empty(request('keyword'))) {
            $query->where(function ($q) {
                $q->where('job_title', 'LIKE', '%' . request('keyword') . '%')
                ->orWhere('job_description', 'LIKE', '%' . request('keyword') . '%')
                ->orWhere('requirements', 'LIKE', '%' . request('keyword') . '%');
            });
        }

        if (request()->has('position') && request('position') !== 'Positions') {
            $query->where('job_title', request('position'));
        }

        $jobs = $query->get();
        $departments = Department::all();

        // dd($departments);

        // If request is AJAX, return JSON
        if (request()->ajax()) {
            return response()->json(['jobs' => $jobs]);
        }

        return view('hrcatalists.openings', ['jobs' => $jobs,'departments' => $departments]);
    }

    // public function search(Request $request)
    // {
    //     $keyword = $request->input('keyword');
    //     $position = $request->input('position');
    
    //     // Debug request data to check if it’s received correctly
    //     \Log::info('Search Request:', $request->all());
    
    //     // Build query for job searching
    //     $query = Job::where('status', 'active'); // Ensure 'status' column exists in jobs table
    
    //     // Search in multiple fields
    //     if (!empty($keyword)) {
    //         $query->where(function ($q) use ($keyword) {
    //             $q->where('job_title', 'LIKE', "%{$keyword}%")
    //               ->orWhere('job_description', 'LIKE', "%{$keyword}%")
    //               ->orWhere('requirements', 'LIKE', "%{$keyword}%")
    //               ->orWhere('tags', 'LIKE', "%{$keyword}%");
    //         });
    //     }
    
    //     // Filter by department (Ensure correct column reference)
    //     if (!empty($position) && $position !== 'Positions') {
    //         $query->where('department', 'LIKE', "%{$position}%");
    //     }
    
    //     $jobs = $query->get();
    
    //     // Return JSON if AJAX request is made
    //     if ($request->ajax()) {
    //         return response()->json(['jobs' => $jobs]);
    //     }
    
    //     return view('hrcatalists.job-results', compact('jobs'));
    // }
    public function searchJobs(Request $request)
    {
        $keyword = $request->input('keyword');
        $department = $request->input('position');
    
        // Query to fetch only active jobs and apply filters
        $jobs = Job::where('status', 'active') // Only active jobs
            ->when($keyword, function ($query, $keyword) {
                return $query->where(function ($q) use ($keyword) {
                    $q->where('job_title', 'LIKE', "%$keyword%")
                      ->orWhere('tags', 'LIKE', "%$keyword%")
                      ->orWhere('job_description', 'LIKE', "%$keyword%")
                      ->orWhere('requirements', 'LIKE', "%$keyword%");
                });
            })
            ->when($department, function ($query, $department) {
                return $query->where('department', $department);
            })
            ->get();
    
        return response()->json(['jobs' => $jobs]);
    }    
    
}
