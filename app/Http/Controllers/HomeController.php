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
        // Fetch only active jobs
        $jobs = Job::where('status', 'active')->get();
        
        return view('hrcatalists.openings', compact('jobs'));
    }
}
