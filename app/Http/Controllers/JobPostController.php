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
        \Log::info('Received Data:', $request->all()); // ✅ Log received data
    
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'job_description' => 'required|string',
            'requirements' => 'required|string',
            'tags' => 'nullable|string',
            'date_issued' => 'required|date',
            'end_date' => 'required|date|after_or_equal:date_issued',
        ]);
    
        try {
            // ✅ Attempt to insert into database
            $job = Job::create([
                'user_id' => auth()->id(), // Ensure user is logged in
                'job_title' => $validatedData['job_title'],
                'department' => $validatedData['department'],
                'job_description' => $validatedData['job_description'],
                'requirements' => $validatedData['requirements'],
                'tags' => $validatedData['tags'],
                'date_issued' => $validatedData['date_issued'],
                'end_date' => $validatedData['end_date'],
                'status' => 'inactive', // Default status
            ]);
    
            if ($job) {
                \Log::info('Job Successfully Inserted:', $job->toArray());
            } else {
                \Log::error('Job Insertion Failed!');
            }
    
            return redirect()->back()->with('success', 'Job added successfully!');
        } catch (\Exception $e) {
            \Log::error('Database Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save job: ' . $e->getMessage());
        }
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
     * Toggle the status of a job position.
     */
    public function toggleStatus(Request $request, $id)
    {
        try {
            $job = Job::findOrFail($id);
            $today = now()->toDateString(); // Get today's date
    
            // ✅ Prevent activation if the job is expired
            if ($job->status === 'inactive' && $job->end_date < $today) {
                return redirect()->back()->with('error', "Cannot activate job '{$job->job_title}' because it has expired.");
            }
    
            // ✅ Toggle status only if the job is not expired
            $newStatus = $job->status === 'active' ? 'inactive' : 'active';
            $job->update(['status' => $newStatus]);
    
            return redirect()->back()->with('success', "Job status updated to $newStatus.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating job status: ' . $e->getMessage());
        }
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

    /**
     * View job selected.
     */
    public function jobSelected($slug)
    {
        // Find the job by slug (or by ID if necessary)
        $job = Job::where('slug', $slug)->where('status', 'active')->firstOrFail();
    
        // ✅ Decode JSON fields if they are stored as JSON strings
        $job->tags = explode(',', $job->tags);
        $job->requirements = explode(',', $job->requirements);
        $job->description = explode(',', $job->description);
    
        return view('hrcatalists.job-selected', compact('job'));
    }
    
    
}
