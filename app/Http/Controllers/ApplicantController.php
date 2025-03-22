<?php

namespace App\Http\Controllers;
use App\Services\GoogleDriveService;
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

    //status update in overview
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

    //status update in dropdown
    public function chooseStatus(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to update applicant status.');
        }

        $applicant = Applicant::find($id);
        if (!$applicant) {
            return redirect()->back()->with('error', 'Applicant not found.');
        }

        $validStatuses = ['pending', 'screening', 'scheduled', 'interviewed', 'hired', 'rejected', 'archived'];
        $newStatus = $request->input('status');

        if (!in_array($newStatus, $validStatuses)) {
            return redirect()->back()->with('error', 'Invalid status provided.');
        }

        // Combine first & last name for logging
        $applicantName = trim($applicant->first_name . ' ' . $applicant->last_name);
        $oldStatus = $applicant->status;

        // Update status
        $applicant->status = $newStatus;
        $applicant->save();

        // Log the update
        Log::create([
            'user_id' => Auth::id(),
            'activity' => "Updated status for applicant: {$applicantName} from " . ucfirst($oldStatus) . " to " . ucfirst($newStatus),
            'created_at' => now(),
            'updated_at' => $applicant->updated_at,
        ]);

        return redirect()->back()->with('success', "Applicant status updated to " . ucfirst($newStatus) . ".");
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

    public function pending()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view pending applicants.');
        }

        $allApplicants = Applicant::whereIn('status', ['pending', 'screening'])->get();
        return view('hrcatalists.ats.admin-ats-screening', compact('allApplicants'));
    }

    public function archived()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view archived applicants.');
        }

        $allApplicants = Applicant::whereIn('status', ['archived', 'rejected'])->get();
        return view('hrcatalists.ats.admin-ats-archived', compact('allApplicants'));
    }

    public function interviewed()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view interviewed applicants.');
        }

        $interviewedApplicants = Applicant::whereIn('status', ['scheduled', 'interviewed'])->get();
        return view('hrcatalists.ats.admin-ats-interview', compact('interviewedApplicants'));
    }

public function show($id)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to view applicant details.');
    }

    // Fetch applicant with the job relationship
    $applicant = Applicant::with('job')->find($id); 

    if (!$applicant) {
        return redirect()->route('applicants.index')->with('error', 'Applicant not found.');
    }

    return view('hrcatalists.ats.show-applicant', compact('applicant'));
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


    
        protected $googleDriveService;
    
        public function __construct(GoogleDriveService $googleDriveService)
        {
            $this->googleDriveService = $googleDriveService;
        }
    
        public function store(Request $request)
        {
            try {
                // ✅ Validate input
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
    
                // ✅ Fetch job details
                $job = Job::find($validated['job_id']);
    
                if (!$job) {
                    return response()->json(['message' => 'Job not found!'], 404);
                }
    
                // ✅ Upload CV to Google Drive
                if ($request->hasFile('cv')) {
                    $cvFile = $request->file('cv');
                    $cvFileId = $this->googleDriveService->uploadFile($cvFile);
                } else {
                    $cvFileId = null;
                }
    
                // ✅ Save to the database
                $applicant = new Applicant();
                $applicant->job_id = $validated['job_id'];
                $applicant->first_name = $validated['first_name'];
                $applicant->last_name = $validated['last_name'];
                $applicant->email = $validated['email'];
                $applicant->phone = $validated['phone'];
                $applicant->address = $validated['address'];
                $applicant->cv = $cvFileId; // Save Google Drive File ID
                $applicant->privacy_policy_agreed = 1;
                $applicant->status = 'pending';
                $applicant->applied_at = now();
                $applicant->save();
    
                return response()->json([
                    'message' => 'Application submitted successfully!',
                    'applicant' => $applicant->toArray() + ['job_title' => $job->job_title]
                ], 200);
            } 
            catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'message' => 'Validation failed!',
                    'errors' => $e->errors()
                ], 422);
            } 
            catch (\Exception $e) {
                return response()->json([
                    'message' => 'Something went wrong!',
                ], 500);
            }
        }
    }
    
