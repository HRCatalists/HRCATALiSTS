<?php

namespace App\Http\Controllers;
use App\Services\GoogleDriveService;
use App\Models\{Applicant, Log, Job, Event};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicationSubmission;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    
        $activeApplicants = Applicant::with('job')
            ->whereNotIn('status', ['rejected', 'archived'])
            ->get();
    
        $archivedApplicants = Applicant::onlyTrashed()->with('job')->get();
    
        $jobs = Job::all();
    
        return view('hrcatalists.ats.admin-ats-master-list', compact(
            'activeApplicants',
            'archivedApplicants',
            'jobs'
        ));
    }    

    public function restore($id)
    {
        $applicant = Applicant::withTrashed()->findOrFail($id);
    
        // Restore the soft-deleted applicant
        $applicant->restore();
    
        // Update status to 'screening'
        $applicant->update(['status' => 'screening']);
    
        return redirect()->back()->with('success', 'Applicant restored and moved back to screening stage.');
    }    

    // *
    // **
    // ***
    //status update in overview
    // public function updateStatus(Request $request, $id)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login')->with('error', 'Please log in to update status.');
    //     }

    //     if ($this->isSecretary()) {
    //         return redirect()->back()->with('error', 'You do not have permission to perform this action.');
    //     }        
    
    //     $request->validate([
    //         'action' => 'required|string|in:approve,reject,archive,pass_evaluation,fail_evaluation'
    //     ]);        
    
    //     try {
    //         $applicant = Applicant::findOrFail($id);
    
    //         // Map actions to statuses
    //         $statusMap = [
    //             'approve' => 'evaluation',          // Moved to Evaluation stage
    //             'reject' => 'rejected',
    //             'archive' => 'archived',
    //             'pass_evaluation' => 'hired',       // Passed the Evaluation
    //             'fail_evaluation' => 'rejected',    // Failed the Evaluation
    //         ];
    
    //         $newStatus = $statusMap[$request->action];
    //         $applicant->status = $newStatus;
    //         $applicant->save();
    
    //         // Log the action
    //         Log::create([
    //             'user_id' => Auth::id(),
    //             'activity' => "Applicant {$applicant->first_name} {$applicant->last_name} marked as {$newStatus}",
    //             'created_at' => now(),
    //         ]);
    
    //         return redirect()->back()->with('success', 'Applicant status updated successfully.');
    //     } catch (\Exception $e) {
    //         \Log::error("Failed to update status: " . $e->getMessage());
    //         return redirect()->back()->with('error', 'Failed to update status. Please try again.');
    //     }
    // }

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
        // Check if the applicant exists
        if (!$applicant) {

            return redirect()->back()->with('error', 'Applicant not found.');
        }
    
        $validStatuses = ['pending', 'screening', 'scheduled', 'evaluation', 'hired', 'rejected', 'archived'];
        $newStatus = strtolower(trim($request->input('status')));
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
            // If not already in employees table, hire and create
            if (!Employee::where('email', $applicant->email)->exists()) {
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
                    FacultyTeachingRank2::create(['emp_id' => $employee->id]);
                    FacultyTeachingRank3::create(['emp_id' => $employee->id]);
                    FacultyTeachingRank4::create(['emp_id' => $employee->id]);
                }
                
                else{
                    EmployeeEmploymentDetail::create([
                      'employee_id' => $employee->id,
                      'classification' => $applicant->classification,
                  ]);
      
                 
              }

        
                if (!User::where('email', $applicant->email)->exists()) {
                    User::create([
                        'name' => $applicant->first_name . ' ' . $applicant->last_name,
                        'email' => $applicant->email,
                        'password' => bcrypt('P@SSW0RD'),
                        'role' => 'Employee',
                    ]);
                }
            }
        
            // ✅ Always update status to hired, even if already an employee
            $applicant->update(['status' => 'hired']);

            Log::create([
                'user_id' => Auth::id(),
                'activity' => "Hired applicant: {$applicantName}",
                'created_at' => now(),
            ]);
        
            return redirect()->back()->with('success', "Applicant has been hired successfully.");
        }        

        //ARCHIVING = SOFT DELETE        
        elseif ($newStatus === 'archived') {
            $applicant->status = 'archived';
            $applicant->save();
        
            $applicant->delete();

            Log::create([
                'user_id' => Auth::id(),
                'activity' => "Archived applicant: {$applicantName}",
                'created_at' => now(),
            ]);

            return redirect()->back()->with('success', "Applicant has been archived.");
        }
    
        // ✅ Update the status regardless
        // $applicant->update(['status' => $newStatus]);
    
        // ✅ DELETION for Rejected       
        elseif ($newStatus === 'rejected') {
            $applicant->forceDelete();

            Log::create([
                'user_id' => Auth::id(),
                'activity' => "Rejected applicant: {$applicantName} (record deleted)",
                'created_at' => now(),
            ]);

            return redirect()->back()->with('success', "Applicant has been rejected and removed.");
        }

        // ✅ Other status updates
        else {
            $applicant->update(['status' => $newStatus]);

            Log::create([
                'user_id' => Auth::id(),
                'activity' => "Updated status for applicant: {$applicantName} from " . ucfirst($oldStatus) . " to " . ucfirst($newStatus),
                'created_at' => now(),
            ]);

            return redirect()->back()->with('success', "Applicant status updated to " . ucfirst($newStatus) . ".");            
        }
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

    $activeApplicants = Applicant::with('job')->get();
    $archivedApplicants = Applicant::onlyTrashed()->with('job')->get();
    $jobs = Job::all();

    return view('hrcatalists.ats.admin-ats-master-list', compact(
        'activeApplicants',
        'archivedApplicants',
        'jobs'
    ));
}
    
    protected $googleDriveService;

    public function __construct(GoogleDriveService $googleDriveService)
    {
        $this->googleDriveService = $googleDriveService;
    }

    public function store(Request $request)
    {
        // ✅ 1. Validate request
        $validated = $request->validate([
            'job_id' => 'required|integer|exists:job_posts,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:applicants,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'classification' => 'required|string|max:255',
            'cv' => 'required|mimes:pdf|max:2048',
            'privacy_policy_agreed' => 'required',
            'terms_agreed' => 'required',
        ]);
    
        // ✅ 2. Upload to Google Drive
        $cvFileId = null;
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvFileId = $this->googleDriveService->uploadFile($cvFile); // returns Google Drive File ID
        }
    
        // ✅ 3. Create new applicant
        $applicant = new Applicant();
        $applicant->job_id = $validated['job_id'];
        $applicant->first_name = $validated['first_name'];
        $applicant->last_name = $validated['last_name'];
        $applicant->email = $validated['email'];
        $applicant->phone = $validated['phone'];
        $applicant->address = $validated['address'];
        $applicant->classification = $validated['classification'];
        $applicant->cv = $cvFileId;
        $applicant->status = 'pending';
        $applicant->applied_at = now();
        $applicant->privacy_policy_agreed = true;
        $applicant->terms_agreed = true;
        $applicant->save();

        // ✅ 4. Log submission to application_submissions
        ApplicationSubmission::create([
            'full_name' => $applicant->first_name . ' ' . $applicant->last_name,
            'email' => $applicant->email,
            'classification' => $applicant->classification,
            'job_id' => $applicant->job_id,
            'job_title' => $applicant->job->job_title ?? 'N/A',
            'status' => 'submitted',
            'submitted_at' => now(),
        ]);

        // ✅ 5. Redirect back with success message
        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    public function submitFromPublic(Request $request)
    {
        // ✅ 1. Validate request
        $validated = $request->validate([
            'job_id' => 'required|integer|exists:job_posts,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:applicants,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'classification' => 'required|string|max:255',
            'cv' => 'required|mimes:pdf|max:2048',
            'privacy_policy_agreed' => 'required',
            'terms_agreed' => 'required',
        ]);

        // ✅ 2. Upload to Google Drive
        $cvFileId = null;
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvFileId = $this->googleDriveService->uploadFile($cvFile); // returns Google Drive File ID
        }

        // ✅ 3. Create new applicant
        $applicant = new Applicant();
        $applicant->job_id = $validated['job_id'];
        $applicant->first_name = $validated['first_name'];
        $applicant->last_name = $validated['last_name'];
        $applicant->email = $validated['email'];
        $applicant->phone = $validated['phone'];
        $applicant->address = $validated['address'];
        $applicant->classification = $validated['classification'];
        $applicant->cv = $cvFileId;
        $applicant->status = 'pending';
        $applicant->applied_at = now();
        $applicant->privacy_policy_agreed = true;
        $applicant->terms_agreed = true;
        $applicant->save();

        // ✅ 4. Log submission
        ApplicationSubmission::create([
            'full_name' => $applicant->first_name . ' ' . $applicant->last_name,
            'email' => $applicant->email,
            'classification' => $applicant->classification,
            'job_id' => $applicant->job_id,
            'job_title' => $applicant->job->job_title ?? 'N/A',
            'status' => 'submitted',
            'submitted_at' => now(),
        ]);

        // ✅ 5. Redirect back with success message
        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }

    // ***
    // Bulk Archive (update status + soft delete)
    public function bulkArchive(Request $request)
    {
        if ($this->isSecretary()) {
            return response()->json(['success' => false, 'message' => 'You do not have permission to perform this action.'], 403);
        }

        $ids = $request->ids;

        foreach ($ids as $id) {
            $applicant = Applicant::find($id);
            if ($applicant) {
                $applicant->status = 'archived';
                $applicant->save();
                $applicant->delete(); // Soft delete
            }
        }

        return response()->json(['success' => true, 'message' => 'Applicants archived successfully.']);
    }

    // ***
    // Bulk Reject (permanent delete)
    public function bulkReject(Request $request)
    {
        if ($this->isSecretary()) {
            return response()->json(['success' => false, 'message' => 'You do not have permission to perform this action.'], 403);
        }

        Applicant::whereIn('id', $request->ids)->forceDelete(); // Permanent delete

        return response()->json(['success' => true, 'message' => 'Applicants permanently deleted.']);
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
    // *
    // **
    // ***
    // ****offcanvas for requirements
    public function updateRequirements(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);
    
        // Retrieve the submitted requirements (will have "0" for unchecked, "1" for checked)
        $reqs = $request->input('requirements', []);
    
        // Get the list of all requirements from your configuration
        $allRequirements = config('requirements.list');
    
        $normalized = [];
        foreach ($allRequirements as $key => $label) {
            // Convert the submitted value to a boolean (or leave as 1/0)
            $normalized[$key] = (isset($reqs[$key]) && $reqs[$key] == '1') ? true : false;
        }
    
        $applicant->requirements = $normalized;
        $applicant->save();
    
        return back()->with('success', 'Requirements updated successfully.');
    }    
}
    
