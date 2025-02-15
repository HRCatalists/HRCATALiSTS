<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    /**
     * Display all job positions.
     */
    public function index()
    {
        $jobs = Job::with('user')->get();
        return view('hrcatalists.ats.admin-ats-jobs', compact('jobs'));
    }

    /**
     * Store a newly created job position.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'job_description' => 'required|string',
            'requirements' => 'required|string',
            'tags' => 'nullable|string',
            'date_issued' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Add the authenticated user ID to the validated data
        $validatedData['user_id'] = Auth::id();

        // Create the new job position
        $job = Job::create($validatedData);

        // Return the success response with job details
        return response()->json([
            'success' => true,
            'message' => 'Job position added successfully!',
            'job' => $job
        ]);
    }

    /**
     * Retrieve job details for editing.
     */
    public function edit(Job $job)
    {
        return response()->json($job);
    }

    /**
     * Update an existing job position.
     */
    public function update(Request $request, Job $job)
    {
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'job_description' => 'required|string',
            'requirements' => 'required|string',
            'tags' => 'nullable|string',
            'date_issued' => 'required|date',
            'end_date' => 'required|date|after_or_equal:date_issued',
        ]);

        $job->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Job updated successfully!',
            'job' => $job
        ]);
    }

    /**
     * Delete a job position.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return response()->json([
            'success' => true,
            'message' => 'Job deleted successfully!'
        ]);
    }
}
