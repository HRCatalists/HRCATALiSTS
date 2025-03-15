<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

    // If request is AJAX, return JSON
    if (request()->ajax()) {
        return response()->json(['jobs' => $jobs]);
    }

    return view('hrcatalists.openings', compact('jobs'));
}

}
