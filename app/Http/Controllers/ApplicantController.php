<?php

namespace App\Http\Controllers;
use App\Services\GoogleDriveService;
use App\Models\{Applicant, Log, Job, Event};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as LaravelLog;
use App\Models\Employee;
use App\Mail\InterviewScheduled;
use Illuminate\Support\Facades\Mail;
use App\Models\FacultyTeachingRank1;
use App\Models\FacultyTeachingRank2;
use App\Models\FacultyTeachingRank3;
use App\Models\FacultyTeachingRank4;
use App\Models\User;
use App\Models\EmployeeEmploymentDetail;
// use App\Models\FacultyTeachingRank2;
// use App\Models\FacultyTeachingRank2;
// use App\Models\FacultyTeachingRank2;




class ApplicantController extends Controller
{
    private function isSecretary()
    {
        return Auth::check() && Auth::user()->role === 'secretary';
    }
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

    // *
    // **
    // ***
    //status update in overview
    public function updateStatus(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to update status.');
        }

        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }        
    
        $request->validate([
            'action' => 'required|string|in:approve,reject,archive,pass_evaluation,fail_evaluation'
        ]);        
    
        try {
            $applicant = Applicant::findOrFail($id);
    
            // Map actions to statuses
            $statusMap = [
                'approve' => 'evaluation',          // Moved to Evaluation stage
                'reject' => 'rejected',
                'archive' => 'archived',
                'pass_evaluation' => 'hired',       // Passed the Evaluation
                'fail_evaluation' => 'rejected',    // Failed the Evaluation
            ];
    
            $newStatus = $statusMap[$request->action];
            $applicant->status = $newStatus;
            $applicant->save();
    
            // Log the action
            Log::create([
                'user_id' => Auth::id(),
                'activity' => "Applicant {$applicant->first_name} {$applicant->last_name} marked as {$newStatus}",
                'created_at' => now(),
            ]);
    
            return redirect()->back()->with('success', 'Applicant status updated successfully.');
        } catch (\Exception $e) {
            \Log::error("Failed to update status: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update status. Please try again.');
        }
    }

    // *
    // **
    // ***
    // Update status of the applicant in datatables
    public function chooseStatus(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to update applicant status.');
        }

        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }       
    
        $applicant = Applicant::with('job')->find($id);
        if (!$applicant) {
            return redirect()->back()->with('error', 'Applicant not found.');
        }
    
        $validStatuses = ['pending', 'screening', 'scheduled', 'evaluation', 'hired', 'rejected', 'archived'];
        $newStatus = $request->input('status');
        $oldStatus = $applicant->status;
    
        // 🚫 Prevent reverting to pending
        if ($oldStatus !== 'pending' && $newStatus === 'pending') {
            return redirect()->back()->with('error', 'You cannot revert an applicant back to Pending status.');
        }
    
        if (!in_array($newStatus, $validStatuses)) {
            return redirect()->back()->with('error', 'Invalid status provided.');
        }
    
        $applicantName = trim($applicant->first_name . ' ' . $applicant->last_name);
   
    
        if ($newStatus === 'hired') {
            // Prevent duplicate hire
            if (Employee::where('email', $applicant->email)->exists()) {
                return redirect()->back()->with('error', 'This applicant is already hired. Duplicate email found.');
            }
        
            $job = $applicant->job;
        
            $employee = Employee::create([
                'first_name' => $applicant->first_name,
                'last_name' => $applicant->last_name,
                'email' => $applicant->email,
                'phone' => $applicant->phone,
                'address' => $applicant->address,
                'cv' => $applicant->cv,
                'privacy_policy_agreed' => $applicant->privacy_policy_agreed,
                'status' => 'hired',
                'applied_at' => $applicant->applied_at,
                'job_title' => $job?->job_title ?? 'Not Set',
                'department' => $job?->department ?? 'Not Set',
            ]);
        
            if (strtolower($applicant->classification) === 'teaching') {
                 EmployeeEmploymentDetail::create([
                     'employee_id' => $employee->id,
                     'classification' => $applicant->classification,
                 ]);
                
                FacultyTeachingRank1::create([
                    'emp_id' => $employee->id,
                    'department' => $employee->department,
                ]);
            
                FacultyTeachingRank2::create([
                    'emp_id' => $employee->id,
                ]);
            
                FacultyTeachingRank3::create([
                    'emp_id' => $employee->id,
                ]);
            
                FacultyTeachingRank4::create([
                    'emp_id' => $employee->id,
                ]);
            }
            
        
            // ✅ Create login using phone number
            if (!User::where('email', $applicant->email)->exists()) {
                $rawPassword = 'P@SSW0RD';
            
                User::create([
                    'name' => $applicant->first_name . ' ' . $applicant->last_name,
                    'email' => $applicant->email,
                    'phone' => $applicant->phone,
                    'address' => $applicant->address,
                    'cv' => $applicant->cv,
                    'privacy_policy_agreed' => $applicant->privacy_policy_agreed,
                    'status' => 'hired',
                    'applied_at' => $applicant->applied_at,
                    'job_title' => $job?->job_title ?? 'Not Set',
                    'department' => $job?->department ?? 'Not Set',
                ]);
    
                // Auto-create blank faculty rank records
                FacultyTeachingRank1::create(['emp_id' => $employee->id, 'department' => $employee->department]);
                FacultyTeachingRank2::create(['emp_id' => $employee->id]);
                FacultyTeachingRank3::create(['emp_id' => $employee->id]);
                FacultyTeachingRank4::create(['emp_id' => $employee->id]);
    
                // Create user account
                if (!User::where('email', $applicant->email)->exists()) {
                    User::create([
                        'name' => $applicant->first_name . ' ' . $applicant->last_name,
                        'email' => $applicant->email,
                        'password' => bcrypt('P@SSW0RD'),
                        'role' => 'Employee',
                    ]);
                }
            }
        }
    
        // ✅ Update the status regardless
        $applicant->update(['status' => $newStatus]);
    
        // 📝 Log the update
        Log::create([
            'user_id' => Auth::id(),
            'activity' => "Updated status for applicant: {$applicantName} from " . ucfirst($oldStatus) . " to " . ucfirst($newStatus),
            'created_at' => now(),
        ]);
    
        return redirect()->back()->with('success', "Applicant status updated to " . ucfirst($newStatus) . ".");
    }    

    // *
    // **
    // ***
    // ****Sending email for scheduling add it to events
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

            // Send Email Notification
            Mail::to($request->applicant_email)->send(new InterviewScheduled($applicant, $request->event_date, $request->event_time));

            return redirect()->back()->with('success', 'Interview scheduled successfully and email sent.');
        } catch (\Exception $e) {
            \Log::error("Interview scheduling failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to schedule the interview. Please try again.');
        }
    }
    // *
    // **
    // ***
    // ****Adding Notes
    public function updateNotes(Request $request, $id)
    {
        $request->validate([
            'notes' => 'required|string',
        ]);
    
        $applicant = Applicant::find($id);
    
        if (!$applicant) {
            return back()->with('error', 'Applicant not found.');
        }
    
        $applicant->notes = $request->notes;
        $applicant->save();
    
        return redirect()->back()->with('success', 'Note(s) added successfully.');
    }
    // *
    // **
    // ***
    // ****Show applicant datatables by status using bootstrap tabs
    public function byStatus($status = 'all')
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in.');
        } 
    
        $validStatuses = ['pending', 'screening', 'scheduled', 'evaluation', 'hired', 'rejected', 'archived'];
    
        if (!in_array($status, array_merge($validStatuses, ['all']))) {
            abort(404);
        }
    
        $allApplicants = Applicant::with('job')->get(); // Fetch all
    
        $jobs = Job::all();
    
        return view('hrcatalists.ats.admin-ats-master-list', compact('allApplicants', 'status', 'jobs'));
    }    

    public function pending()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view pending applicants.');
        }

        $allApplicants = Applicant::whereIn('status', ['pending'])->get();
        return view('hrcatalists.ats.admin-ats-screening', compact('allApplicants'));
    }

    public function screening()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view screening applicants.');
        }

        $allApplicants = Applicant::whereIn('status', ['screening'])->get();
        return view('hrcatalists.ats.admin-ats-screening', compact('allApplicants'));
    }
    public function scheduled($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view screening applicants.');
        }
    
        $applicant = Applicant::where('status', 'screening')->find($id);
    
        if (!$applicant) {
            return redirect()->route('ats-scheduled')->with('error', 'Applicant not found.');
        }
    
        return view('hrcatalists.ats.admin-ats-scheduled', compact('applicant'));
    }
    
    public function archived()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view archived applicants.');
        }

        $allApplicants = Applicant::whereIn('status', ['archived', 'rejected'])->get();
        return view('hrcatalists.ats.admin-ats-archived', compact('allApplicants'));
    }

    public function evaluation()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view applicants in Evaluation.');
        }

        $interviewedApplicants = Applicant::whereIn('status', ['evaluation'])->get();
        return view('hrcatalists.ats.admin-ats-evaluation', compact('interviewedApplicants'));
    }

    // public function show($id)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login')->with('error', 'Please log in to view applicant details.');
    //     }

    //     // Fetch applicant with the job relationship
    //     $applicant = Applicant::with('job')->find($id); 

    //     if (!$applicant) {
    //         return redirect()->route('applicants.index')->with('error', 'Applicant not found.');
    //     }

    //     return view('hrcatalists.ats.show-applicant', compact('applicant'));
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
                'classification' => 'required|string|max:255',
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
            $applicant->classification = $validated['classification'];
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

    // *
    // **
    // ***
    // bulk action - change status to archived
    public function bulkArchive(Request $request)
    {

        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }  

        Applicant::whereIn('id', $request->ids)->update(['status' => 'archived']);
        return response()->json(['success' => true]);
    }

    // *
    // **
    // ***
    // bulk action - change status to rejected
    public function bulkReject(Request $request)
    {
        if ($this->isSecretary()) {
            $errorMsg = 'You do not have permission to perform this action.';
    
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => $errorMsg], 403);
            }
    
            return redirect()->back()->with('error', $errorMsg);
        }
    
        // Delete applicants by their IDs
        Applicant::whereIn('id', $request->ids)->delete();
    
        return response()->json(['success' => true, 'message' => 'Applicants deleted successfully.']);
    }       

    // *
    // **
    // ***
    // ****Action button approve
    public function approve($id)
    {
        if ($this->isSecretary()) {
            $errorMsg = 'You do not have permission to perform this action.';
    
            if (request()->expectsJson()) {
                return response()->json(['success' => false, 'message' => $errorMsg], 403);
            }
    
            return redirect()->back()->with('error', $errorMsg);
        }
    
        $applicant = Applicant::with('job')->findOrFail($id);
        $applicant->status = 'hired';
        $applicant->save();
    
        if (Employee::where('email', $applicant->email)->exists()) {
            $conflictMsg = 'This applicant is already hired. Duplicate email found in employees table.';
    
            if (request()->expectsJson()) {
                return response()->json(['success' => false, 'message' => $conflictMsg], 409);
            }
    
            return redirect()->back()->with('error', $conflictMsg);
        }
    
        $job = $applicant->job;
    
        $employee = Employee::create([
            'first_name' => $applicant->first_name,
            'last_name' => $applicant->last_name,
            'email' => $applicant->email,
            'phone' => $applicant->phone,
            'address' => $applicant->address,
            'cv' => $applicant->cv,
            'privacy_policy_agreed' => $applicant->privacy_policy_agreed,
            'status' => 'hired',
            'applied_at' => $applicant->applied_at,
            'job_title' => $job?->job_title ?? 'Not Set',
            'department' => $job?->department ?? 'Not Set',
        ]);
    
        FacultyTeachingRank1::create(['emp_id' => $employee->id, 'department' => $job?->department ?? 'Not Set']);
        FacultyTeachingRank2::create(['emp_id' => $employee->id]);
        FacultyTeachingRank3::create(['emp_id' => $employee->id]);
        FacultyTeachingRank4::create(['emp_id' => $employee->id]);
    
        $successMsg = 'Applicant approved and transferred to employees.';
    
        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => $successMsg]);
        }
    
        return redirect()->back()->with('success', $successMsg);
    }

    // *
    // **
    // ***
    // ****Action button reject/delete
    public function reject($id)
    {
        if ($this->isSecretary()) {
            $errorMsg = 'You do not have permission to perform this action.';
    
            if (request()->expectsJson()) {
                return response()->json(['success' => false, 'message' => $errorMsg], 403);
            }
    
            return redirect()->back()->with('error', $errorMsg);
        }
    
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
    
        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Applicant permanently deleted.']);
        }
    
        return redirect()->back()->with('success', 'Applicant permanently deleted.');
    }    

    // *
    // **
    // ***
    // ****Action button archive
    public function archive($id)
    {
        if ($this->isSecretary()) {
            $errorMsg = 'You do not have permission to perform this action.';
    
            if (request()->expectsJson()) {
                return response()->json(['success' => false, 'message' => $errorMsg], 403);
            }
    
            return redirect()->back()->with('error', $errorMsg);
        }
    
        $applicant = Applicant::findOrFail($id);
        $applicant->status = 'archived';
        $applicant->save();
    
        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Applicant archived successfully.']);
        }
    
        return redirect()->back()->with('success', 'Applicant archived successfully.');
    }    
}
    
