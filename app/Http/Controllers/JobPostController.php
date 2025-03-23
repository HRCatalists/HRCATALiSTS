<?php
namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    /**
     * Display all job positions.
     */
    public function index()
    {
        $jobs = Job::with('user')->get();
        $departments = Job::select('department')->distinct()->get();

        return view('hrcatalists.ats.admin-ats-jobs', compact('jobs', 'departments'));
    }

    /**
     * Store a newly created job position.
     */
    public function store(Request $request)
    {
        \Log::info('Received Data:', $request->all());
    
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

            if ($request->department === 'other') {
                $request->validate([
                    'other_department_name' => 'required|string|max:255',
                    'other_department_code' => 'required|string|max:10',
                ]);
                $customName = trim($request->input('other_department_name'));
                $customCode = trim($request->input('other_department_code'));

                if ($customName) {
                    // Save to departments table if it doesn't already exist
                    Department::firstOrCreate(
                        ['name' => $customName],
                        ['code' => $customCode]
                    );

                    // Override the department value to save the real name
                    $validatedData['department'] = $customName;
                }
            }
            // ✅ Generate a slug from job_title
            $slug = Str::slug($validatedData['job_title'], '-');
    
            // ✅ Ensure slug is unique by appending ID if needed
            $existingSlugs = Job::where('slug', 'LIKE', "{$slug}%")->pluck('slug')->toArray();
            if (in_array($slug, $existingSlugs)) {
                $slug = $slug . '-' . (count($existingSlugs) + 1);
            }
    
            // ✅ Store as plain text (not JSON)
            $job = Job::create([
                'user_id' => auth()->id(),
                'job_title' => $validatedData['job_title'],
                'slug' => $slug,
                'department' => $validatedData['department'],
                'job_description' => trim($validatedData['job_description']), // ✅ Store as plain text
                'requirements' => trim($validatedData['requirements']), // ✅ Store as plain text
                'tags' => $validatedData['tags'],
                'date_issued' => $validatedData['date_issued'],
                'end_date' => $validatedData['end_date'],
                'status' => 'inactive',
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
    public function edit($id)
    {
        $job = Job::find($id);
    
        if (!$job) {
            return response()->json(['success' => false, 'message' => 'Job not found'], 404);
        }
    
        $departments = Department::pluck('name'); // Get list of department names only
    
        $isCustomDepartment = !$departments->contains($job->department); // Check if department is not in list
    
        return response()->json([
            'success' => true,
            'job' => [
                'id' => $job->id,
                'job_title' => $job->job_title,
                'department' => $job->department,
                'is_custom_department' => $isCustomDepartment, // ✅ Flag for frontend
                'job_description' => $job->job_description,
                'requirements' => $job->requirements,
                'tags' => $job->tags,
                'date_issued' => $job->date_issued ? $job->date_issued->format('Y-m-d') : null,
                'end_date' => $job->end_date ? $job->end_date->format('Y-m-d') : null,
            ],
            'departments' => $departments, // ✅ Send full department list
        ]);
    }
    /**
     * Update an existing job position.
     */
    public function update(Request $request, $id)
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
    
        // ✅ Find job first so we can check the status
        $job = Job::findOrFail($id);
    
        // ❌ Prevent update if job is active
        if ($job->status === 'active') {
            return redirect()->back()->with('error', 'Cannot update an active job. Please deactivate it first.');
        }
    
        // ✅ Handle "Other" department
        if ($request->department === 'other') {
            $request->validate([
                'other_department_name' => 'required|string|max:255',
                'other_department_code' => 'required|string|max:10',
            ]);
    
            $customName = trim($request->input('other_department_name'));
            $customCode = trim($request->input('other_department_code'));
    
            if ($customName) {
                Department::firstOrCreate(
                    ['name' => $customName],
                    ['code' => $customCode]
                );
    
                $validatedData['department'] = $customName;
            }
        }
    
        // ✅ Proceed to update if not active
        $job->update($validatedData);
    
        return redirect()->back()->with('success', 'Job updated successfully!');
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
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
    
        // Prevent deletion if job is active
        if ($job->status === 'active') {
            return redirect()->back()->with('error', 'You cannot delete an active job. Please deactivate it first.');
        }
    
        $job->delete();
    
        return redirect()->back()->with('success', 'Job deleted successfully!');
    }

    /**
     * View job selected.
     */
    public function jobSelected($slug)
    {
        // Find the job by slug (or by ID if necessary)
        $job = Job::where('slug', $slug)->where('status', 'active')->firstOrFail();
    
        // ✅ No need for json_decode() anymore, just trim the string
        $job->job_description = trim($job->job_description);
        $job->requirements = trim($job->requirements);
    
        return view('hrcatalists.job-selected', compact('job'));
    }    
}
