<?php

namespace App\Http\Controllers;

use App\Models\{Applicant, Log, Job, Event};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as LaravelLog;

class ApplicantController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view applicants.');
        }

        $allApplicants = Applicant::with('job')
            ->whereNotIn('status', ['rejected', 'archived']) // Exclude rejected & archived
            ->get();

        $jobs = Job::all(); // Fetch job list for the dropdown

        return view('hrcatalists.ats.admin-ats-master-list', compact('allApplicants', 'jobs'));
    }
    public function updateStatus(Request $request, $id)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to update status.');
    }

    $request->validate([
        'action' => 'required|string|in:approve,reject,archive'
    ]);

    try {
        $applicant = Applicant::findOrFail($id);

        // Map actions to statuses
        $statusMap = [
            'approve' => 'interviewed',
            'reject' => 'rejected',
            'archive' => 'archived',
        ];

        $applicant->status = $statusMap[$request->action];
        $applicant->save();

        // Log action
        Log::create([
            'user_id' => Auth::id(),
            'activity' => "Applicant {$applicant->first_name} {$applicant->last_name} marked as {$applicant->status}",
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Applicant status updated successfully.');
    } catch (\Exception $e) {
        \Log::error("Failed to update status: " . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to update status. Please try again.');
    }
}

    
    public function scheduleInterview(Request $request, $id)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to schedule interviews.');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'event_date' => 'required|date',
        'event_time' => 'required',
        'applicant_email' => 'required|email',
        'applicant_name' => 'required|string|max:255'
    ]);

    try {
        $applicant = Applicant::findOrFail($id);

        // Create new event
        Event::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => "Interview scheduled for {$request->applicant_name} ({$request->applicant_email})",
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
        ]);

        // Update applicant status
        $applicant->status = 'scheduled';
        $applicant->save();

        return redirect()->back()->with('success', 'Interview scheduled successfully.');
    } catch (\Exception $e) {
        \Log::error("Interview scheduling failed: " . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to schedule the interview. Please try again.');
    }
}



    // public function store(Request $request)
    // {
    //     // Validate input
    //     $validated = $request->validate([
    //         'job_id' => 'required|integer|exists:job_posts,id', // ✅ Fixed table name
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:applicants,email',
    //         'phone' => 'required|string|max:20', // ✅ Ensure phone is validated
    //         'address' => 'required|string|max:255',
    //         'cv' => 'required|mimes:pdf|max:2048',
    //         'privacy_policy_agreed' => 'required',
    //     ]);
    
    //     // Store CV
    //     if ($request->hasFile('cv')) {
    //         $cvPath = $request->file('cv')->store('cvs', 'public');
    //     }
    
    //     // Save to the database (only necessary fields)
    //     $applicant = new Applicant();
    //     $applicant->job_id = $validated['job_id'];
    //     $applicant->first_name = $validated['first_name'];
    //     $applicant->last_name = $validated['last_name'];
    //     $applicant->email = $validated['email'];
    //     $applicant->phone = $validated['phone'];
    //     $applicant->address = $validated['address'];
    //     $applicant->cv = $cvPath ?? null; // Save CV path
    //     $applicant->privacy_policy_agreed = 1;
    //     $applicant->status = 'pending';
    //     $applicant->applied_at = now(); // Automatically set application timestamp
    //     $applicant->save();

    
    //     return back()->with('success', 'Your application has been submitted successfully!');
    // // }

    // public function store(Request $request)
    // {
    //     try {
    //         $validated = $request->validate([
    //             'job_id' => 'required|integer|exists:job_posts,id',
    //             'first_name' => 'required|string|max:255',
    //             'last_name' => 'required|string|max:255',
    //             'email' => 'required|email|max:255|unique:applicants,email',
    //             'phone' => 'required|string|max:20',
    //             'address' => 'required|string|max:255',
    //             'cv' => 'required|mimes:pdf|max:2048',
    //             'privacy_policy_agreed' => 'required',
    //         ]);
    
    //         if ($request->hasFile('cv')) {
    //             $cvPath = $request->file('cv')->store('cvs', 'public');
    //         }
    
    //         $applicant = new Applicant();
    //         $applicant->job_id = $validated['job_id'];
    //         $applicant->first_name = $validated['first_name'];
    //         $applicant->last_name = $validated['last_name'];
    //         $applicant->email = $validated['email'];
    //         $applicant->phone = $validated['phone'];
    //         $applicant->address = $validated['address'];
    //         $applicant->cv = $cvPath ?? null;
    //         $applicant->privacy_policy_agreed = 1;
    //         $applicant->status = 'pending';
    //         $applicant->applied_at = now();
    //         $applicant->save();
    
    //         return response()->json(['message' => 'Application submitted successfully!'], 200);
    
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return response()->json(['message' => 'Validation failed!', 'errors' => $e->errors()], 422);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Something went wrong!'], 500);
    //     }
    // }




    public function store(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'job_id' => 'required|integer|exists:job_posts,id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:applicants,email',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'cv' => 'required|mimes:pdf|max:2048',
                'privacy_policy_agreed' => 'required',
            ]);

            // ✅ Fetch job details **before** saving the applicant
            $job = Job::find($validated['job_id']);

            if (!$job) {
                return response()->json(['message' => 'Job not found!'], 404);
            }

            // ✅ Store CV (Ensure `cvPath` is always set)
            $cvPath = $request->hasFile('cv') ? $request->file('cv')->store('cvs', 'public') : null;

            // Save to the database
            $applicant = new Applicant();
            $applicant->job_id = $validated['job_id'];
            $applicant->first_name = $validated['first_name'];
            $applicant->last_name = $validated['last_name'];
            $applicant->email = $validated['email'];
            $applicant->phone = $validated['phone'];
            $applicant->address = $validated['address'];
            $applicant->cv = $cvPath ?? null;
            $applicant->privacy_policy_agreed = 1;
            $applicant->status = 'pending';
            $applicant->applied_at = now();
            $applicant->save();

            // ✅ Log successful application
            Log::create([
                'user_id' => Auth::check() ? Auth::id() : null,
                'activity' => "New applicant added: {$applicant->first_name} {$applicant->last_name} for job {$job->job_title}.",
                'created_at' => now(),
            ]);

            return response()->json([
                'message' => 'Application submitted successfully!',
                'applicant' => $applicant->toArray() + ['job_title' => $job->job_title]
            ], 200);
        } 
        catch (\Illuminate\Validation\ValidationException $e) {
            // ❌ Log validation error
            Log::create([
                'user_id' => Auth::id() ?? null,
                'activity' => "Application submission failed (Validation Error): " . json_encode($e->errors()),
                'created_at' => now(),
            ]);

            return response()->json([
                'message' => 'Validation failed!',
                'errors' => $e->errors()
            ], 422);
        } 
        catch (\Exception $e) {
            // ❌ Log unexpected errors
            Log::create([
                'user_id' => Auth::id() ?? null,
                'activity' => "Application submission failed (System Error): " . $e->getMessage(),
                'created_at' => now(),
            ]);

            return response()->json([
                'message' => 'Something went wrong!',
            ], 500);
        }
    }
}