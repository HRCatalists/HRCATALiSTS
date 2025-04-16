<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\Log;
use App\Models\User;
use App\Models\Event;
use App\Models\EmployeeEmploymentDetail;
use App\Models\ApplicationSubmission;
use Carbon\Carbon;
use App\Models\Employee;
use App\Services\GoogleDriveService;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    private function isSecretary()
    {
        return Auth::check() && Auth::user()->role === 'secretary';
    }
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $logs = Log::latest()->take(7)->get();
        $totalApplicants = Applicant::count();
        $activeApplicantsCount = Applicant::whereNotIn('status', ['hired', 'rejected', 'archived'])->count();
        $recentActiveApplicants = Applicant::whereNotIn('status', ['hired', 'rejected', 'archived'])
            ->latest('applied_at')
            ->take(5)
            ->get();

        // dd(Applicant::where('status', 'archived')->get());
        $applicantsByStatus = Applicant::selectRaw('LOWER(TRIM(status)) as status, COUNT(*) as count')
        ->groupByRaw('LOWER(TRIM(status))')
        ->pluck('count', 'status')
        ->toArray();

        $archivedApplicantsCount = Applicant::onlyTrashed()->count();

        // Manually inject archived count in the array
        $applicantsByStatus['archived'] = $archivedApplicantsCount;

        $totalJobs = Job::count();
        $totalEmployees = Employee::count();
        $events = Event::select('event_date', 'event_time', 'title', 'description')->get();

        // Count teaching and non-teaching
        $teachingCount = EmployeeEmploymentDetail::where('classification', 'teaching')->count();
        $nonTeachingCount = EmployeeEmploymentDetail::where('classification', 'non-teaching')->count();

        $applicationsReceived = ApplicationSubmission::count(); // total count
        $recentSubmissions = ApplicationSubmission::latest('submitted_at')->take(5)->get(); // latest 5

        $activeJobsCount = Job::where('status', 'active')->count();
        $inactiveJobsCount = Job::where('status', 'inactive')->count(); // or 'closed', 'expired', etc.
    
        // ✅ Calculate employee count per department
        $departmentCounts = Employee::selectRaw('department, COUNT(*) as count')
            ->groupBy('department')
            ->pluck('count', 'department')
            ->toArray();

        // ✅ Compute percentages
        $departmentPercentages = [];
        foreach ($departmentCounts as $dept => $count) {
            $departmentPercentages[$dept] = [
                'count' => $count,
                'percentage' => $totalEmployees > 0 ? round(($count / $totalEmployees) * 100, 1) : 0,
            ];
        }
    
        return view('hrcatalists.admin-dashboard', compact(
            'logs',
            'totalApplicants',
            'applicantsByStatus',
            'totalJobs',
            'events',
            'totalEmployees',
            'teachingCount',
            'nonTeachingCount',
            'departmentPercentages',
            'applicationsReceived',
            'recentSubmissions',
            'activeApplicantsCount',
            'recentActiveApplicants',
            'activeJobsCount',
            'inactiveJobsCount'
        ));
    }

    public function atsLogs()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        // Fetch logs where:
        // - user_id is NULL (guest submissions)
        // - OR user role is 'admin'
        $logs = Log::with(['user' => function ($query) {
            $query->select('id', 'name', 'role'); // Fetch only necessary columns
        }])
        ->where(function ($query) {
            $query->whereNull('user_id') // Include guest logs
                  ->orWhereHas('user', function ($q) {
                      $q->where('role', 'admin'); // Include only admin logs
                  });
        })
        ->latest()
        ->get();
    
        return view('hrcatalists.ats.admin-ats-logs', compact('logs'));
    }

    public function mainMenu()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // ✅ Automatically expire job postings when admin logs in
        Job::whereDate('end_date', '<', Carbon::today())
        ->where('status', 'active')
        ->update(['status' => 'inactive']);
        
        return view('hrcatalists.main-menu-ats-ems'); // Main menu view
    }

    
    public function emsLogs()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        // Fetch logs where:
        // - user_id is NULL (guest submissions)
        // - OR user role is 'admin'
        $logs = Log::with(['user' => function ($query) {
            $query->select('id', 'name', 'role'); // Fetch only necessary columns
        }])
        ->where(function ($query) {
            $query->whereNull('user_id') // Include guest logs
                  ->orWhereHas('user', function ($q) {
                      $q->where('role', 'admin'); // Include only admin logs
                  });
        })
        ->latest()
        ->get();
    
        return view('hrcatalists.ems.admin-ems-logs', compact('logs'));
    }
    public function emsDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        // ✅ Fetch logs with user data
        $logs = Log::with('user')->latest()->limit(5)->get();

        // ✅ Fetch applicants data
        $totalApplicants = Applicant::count();
        $applicantsByStatus = Applicant::selectRaw('LOWER(TRIM(status)) as status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // ✅ Fetch jobs data
        $allJobs = Job::all();
        $totalJobs = $allJobs->count();
        $activeJobCount = Job::where('end_date', '>=', Carbon::now())->count();
        $inactiveJobCount = Job::where('end_date', '<', Carbon::now())->count();

         // ✅ Fetch events for the calendar
         $events = Event::select('event_date', 'event_time', 'title', 'description')->get();

         // ✅ Return view with all data, including logs
         return view('hrcatalists.ems.admin-ems-db', [
             'logs' => $logs, // ✅ Add logs to the view
             'totalApplicants' => $totalApplicants,
             'applicantsByStatus' => $applicantsByStatus,
             'activeJobCount' => $activeJobCount,
             'inactiveJobCount' => $inactiveJobCount,
             'totalJobs' => $totalJobs,
             'allJobs' => $allJobs,
             'events' => $events, // ✅ Send events to Blade
         ]);
     }

     
     public function employees()
     {
         if (!Auth::check()) {
             return redirect()->route('login');
         }
     
         // ✅ Bulk update all employment details (only once per load)
         $employmentDetails = EmployeeEmploymentDetail::all();
     
         foreach ($employmentDetails as $detail) {
             $detail->updateYearsServed(); // This will check and save only if necessary
         }
     
         // Now load employees with relationships after the update
         $employees = Employee::with('employmentDetails')->get();
     
         foreach ($employees as $employee) {
             if (!empty($employee->cv)) {
                 $employee->cv_file_name = $this->googleDriveService->getFileName($employee->cv);
             }
         }
     
         $jobs = Job::all();
     
         return view('hrcatalists.ems.admin-ems-emp', compact('employees', 'jobs'));
     }
     
     
     
     public function showEmployees()
     {
         $employees = Employee::with('employmentDetails')->get();
     
         foreach ($employees as $employee) {
             foreach ($employee->employmentDetails as $detail) {
                 $detail->updateYearsServed();
             }
         }
     
         $jobs = Job::all();
     
         return view('hrcatalists.ems.admin-ems-emp', compact('employees', 'jobs'));
     }
     
    // *
    // **
    // ***
    // ****Delete employee data
    public function deleteEmployee($id)
    {

        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }

        $employee = Employee::find($id);

        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found.');
        }

        $employee->delete();

        return redirect()->back()->with('success', 'Employee deleted successfully.');
    }

    // *
    // **
    // ***
    // ****Edit employee data
    public function update(Request $request, $id)
    {
        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'Unauthorized action for secretary role.');
        }

        $employee = Employee::findOrFail($id);
    
        // ✅ Validate minimal fields (editable but safe)
        $validated = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'privacy_policy_agreed' => 'nullable|boolean',
            'status' => 'nullable|string|max:100',
            'applied_at' => 'nullable|date',
            'department' => 'nullable|string|max:255',
            'job_id' => 'nullable|exists:job_posts,id',
            'job_title' => 'nullable|string|max:255',
            'faculty_code' => 'nullable|string|max:255',
            'school_of' => 'nullable|string|max:255',
            'designation_group' => 'nullable|string|max:255',
            'branch' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:50',
            'religion' => 'nullable|string|max:100',
            'civil_status' => 'nullable|string|max:100',
            'citizenship' => 'nullable|string|max:100',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_address' => 'nullable|string|max:255',
            'spouse_occupation' => 'nullable|string|max:255',
            'no_of_dependents' => 'nullable|numeric',
            'children_birthdates' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'mother_address' => 'nullable|string|max:255',
            'sss_no' => 'nullable|string|max:50',
            'pagibig_no' => 'nullable|string|max:50',
            'philhealth_no' => 'nullable|string|max:50',
            'tin_no' => 'nullable|string|max:50',
    
            // Employment Details
            'parent_department' => 'nullable|string|max:255',
            'parent_college' => 'nullable|string|max:255',
            'classification' => 'nullable|string|max:255',
            'employment_status' => 'nullable|string|max:255',
            'date_employed' => 'nullable|date',
            'accreditation' => 'nullable|string|max:255',
            'date_permanent' => 'nullable|date',

            // Licenses
            'licenses.*.license_name' => 'nullable|string|max:255',
            'licenses.*.license_number' => 'nullable|string|max:100',
            'licenses.*.expiry_date' => 'nullable|date',
            'licenses.*.renewal_from' => 'nullable|date',
            'licenses.*.renewal_to' => 'nullable|date',

            // Trainings
            'trainings.*.training_date' => 'nullable|date',
            'trainings.*.title' => 'nullable|string|max:255',
            'trainings.*.venue' => 'nullable|string|max:255',
            'trainings.*.remark' => 'nullable|string|max:255',

            // Service Records
            'service_records.*.department' => 'nullable|string|max:255',
            'service_records.*.inclusive_date' => 'nullable|string|max:255',
            'service_records.*.appointment_record' => 'nullable|string|max:255',
            'service_records.*.position' => 'nullable|string|max:255',
            'service_records.*.rank' => 'nullable|string|max:100',
            'service_records.*.remarks' => 'nullable|string|max:255',

            // Organizations
            'organizations.*.registration_date' => 'nullable|date',
            'organizations.*.validity_date' => 'nullable|date',
            'organizations.*.organization_name' => 'nullable|string|max:255',
            'organizations.*.place' => 'nullable|string|max:255',
            'organizations.*.position' => 'nullable|string|max:255',

            // Others
            'others.*.date' => 'nullable|date',
            'others.*.description' => 'nullable|string|max:255',
        ]);

        // ✅ Handle CV upload if present
        if ($request->hasFile('cv')) {
            // dd('CV is being uploaded');
            $cvFile = $request->file('cv');
            $cvFileId = $this->googleDriveService->uploadFile($cvFile);
            $validated['cv'] = $cvFileId;
        }
    
        $employee->update($validated);
    
        // ✅ Employment details
        $employee = Employee::findOrFail($id);

        $employment = $employee->employmentDetails()->firstOrNew(['employee_id' => $employee->id]);
    
        $contractType = $request->input('contract_type');
        $datePermanent = $request->input('date_permanent') ?? $employment->date_permanent;
    
        if ($contractType === 'Full-time' && empty($employment->date_permanent)) {
            $datePermanent = now()->toDateString();
        }
    
        $employmentData = [
            'parent_department' => $request->input('parent_department'),
            'parent_college' => $request->input('parent_college'),
            'classification' => $request->input('classification'),
            'employment_status' => $request->input('employment_status'),
            'contract_type' => $contractType,
            'date_employed' => $request->input('date_employed') ?? $employee->created_at->toDateString(),
            'accreditation' => $request->input('accreditation'),
            'date_permanent' => $datePermanent,
        ];
    
    
        $employee->employmentDetails()->updateOrCreate([], $employmentData);
    
        // ✅ Update related tables (delete old, create new)
        $relations = [
            'educations' => 'educations',
            'licenses' => 'licenses',
            'trainings' => 'trainings',
            'service_records' => 'serviceRecords',
            'organizations' => 'organizations',
            'others' => 'others',
        ];
    
        foreach ($relations as $input => $relationMethod) {
            if ($request->has($input)) {
                $employee->{$relationMethod}()->delete();
                foreach ($request->$input as $record) {
                    $employee->{$relationMethod}()->create($record);
                }
            }
        }

        // ✅ Create log entry after employee update
        Log::create([
            'user_id' => Auth::id(),
            'activity' => "Updated employee profile: {$employee->first_name} {$employee->last_name} (ID: {$employee->id})",
        ]);
        $employment->fill($employmentData);
        $employment->updateYearsServed();
        $employment->save();
    
 
        return back()->with('success', 'Employee updated successfully.');
    }


    //Load the ems Calendar View
    public function emsCalendar()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $events = Event::where('user_id', Auth::id())->get(); // Fetch events for logged-in user
        return view('hrcatalists.ems.admin-ems-cl', compact('events'));
    }


    public function deptCASED()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $employees = Employee::where('department', 'College of Arts & Sciences/Education')->get();
        return view('hrcatalists.ems.admin-ems-dept-cased', compact('employees')); // College of Arts & Science and Education
    }

    public function deptCBA()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $employees = Employee::where('department', 'College of Business & Accountancy')->get();
        return view('hrcatalists.ems.admin-ems-dept-cba', compact('employees')); // College of Business and Accountancy
    }

    public function deptCCS()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $employees = Employee::where('department', 'College of Computer Studies')->get();
        return view('hrcatalists.ems.admin-ems-dept-ccs', compact('employees')); // College of Computer Studies
    }

    public function deptCOE()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $employees = Employee::where('department', 'College of Engineering')->get();
        return view('hrcatalists.ems.admin-ems-dept-coe',compact('employees')); // College of Engineering
    }

    public function deptCON()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $employees = Employee::where('department', 'College of Nursing')->get();
        return view('hrcatalists.ems.admin-ems-dept-con',compact('employees')); // College of Nursing
    }

    public function deptBasicEd()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $employees = Employee::where('department', 'Basic Education - Main & Baretto Campus')->get();
        return view('hrcatalists.ems.admin-ems-dept-basicEd',compact('employees')); // College of Basic Education
    }
    public function deptNon()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $employees = Employee::where('department', 'None-Teaching')->get();
        return view('hrcatalists.ems.admin-ems-dept-non-teaching',compact('employees')); // Non-teaching
    }

  
    public function companyPolicy()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-policy'); // Logs Page
    }

    public function logs()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-logs'); // Logs Page
    }

   
    public function atsDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // ✅ Fetch logs with user data
        $logs = Log::with('user')->latest()->limit(5)->get();

        // ✅ Fetch applicants data
        $totalApplicants = Applicant::count();
        $applicantsByStatus = Applicant::selectRaw('LOWER(TRIM(status)) as status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // ✅ Fetch jobs data
        $allJobs = Job::all();
        $totalJobs = $allJobs->count();
        $activeJobCount = Job::where('end_date', '>=', Carbon::now())->count();
        $inactiveJobCount = Job::where('end_date', '<', Carbon::now())->count();

        // ✅ Fetch events for the calendar
        $events = Event::select('event_date', 'event_time', 'title', 'description')->get();

        // ✅ Return view with all data, including logs
        return view('hrcatalists.ats.admin-ats-db', [
            'logs' => $logs, // ✅ Add logs to the view
            'totalApplicants' => $totalApplicants,
            'applicantsByStatus' => $applicantsByStatus,
            'activeJobCount' => $activeJobCount,
            'inactiveJobCount' => $inactiveJobCount,
            'totalJobs' => $totalJobs,
            'allJobs' => $allJobs,
            'events' => $events, // ✅ Send events to Blade
        ]);
    }
       // Load the ATS Calendar View
    public function atsCalendar()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $events = Event::where('user_id', Auth::id())->get(); // Fetch events for logged-in user
        return view('hrcatalists.ats.admin-ats-cl', compact('events'));
    }
    public function getEvents()
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $events = Event::select('event_date', 'event_time', 'title', 'description')->get();
        return response()->json($events);
    }
    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required'
        ]);

        $event = Event::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
        ]);

        // Log event creation
        Log::create([
            'user_id' => Auth::id(),
            'activity' => "Created an event: {$event->title} on {$event->event_date} at {$event->event_time}",
        ]);

        return response()->json(['success' => true, 'event' => $event], 201);
    }   
    public function deleteEvent($id)
    {
        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }

        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized'
            ], 401);
        }
    
        $event = Event::where('id', $id)->where('user_id', Auth::id())->first();
    
        if (!$event) {
            return response()->json([
                'success' => false,
                'error' => 'Event not found or permission denied'
            ], 403);
        }
    
        // Log event deletion
        Log::create([
            'user_id' => Auth::id(),
            'activity' => "Deleted an event: {$event->title} scheduled on {$event->event_date}",
        ]);
    
        $event->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully!',
            'event_id' => $id
        ]);
    }    
    public function atsApplicants(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $status = $request->status;  // get the passed status from URL
    
        $query = Applicant::query();
    
        if ($status) {
            if ($status == 'total') {
                // Show all applicants
            } elseif ($status == 'active') {
                // Show only active applicants
                $query->whereNotIn('status', ['hired', 'rejected', 'archived']);
            } else {
                // Show applicants with the specific status
                $query->where('status', $status);
            }
        } else {
            // Default view: Active applicants only
            $query->whereNotIn('status', ['hired', 'rejected', 'archived']);
        }
    
        $applicants = $query->latest()->get();
    
        return view('hrcatalists.ats.admin-ats-master-list', compact('applicants', 'status'));
    }
    

    public function atsScreening()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ats.admin-ats-screening'); // ATS Screening
    }

    public function atsInterview()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ats.admin-ats-interview'); // ATS Interview
    }

    public function atsArchived()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ats.admin-ats-archived'); // ATS Archived
    }

    public function atsJobs()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $jobPosts = Job::with('user')->get(); 
        return view('hrcatalists.ats.admin-ats-jobs', compact('jobPosts'));
    }
    public function updateExpiredJobs(Request $request)
    {

        // Get count of expired jobs before updating
        $expiredJobCount = Job::where('end_date', '<', Carbon::today())
                              ->where('status', 'active')
                              ->count();
    
        if ($expiredJobCount > 0) {
            // Update only expired active jobs
            Job::where('end_date', '<', Carbon::today())
                ->where('status', 'active')
                ->update(['status' => 'inactive']);
        }
    
        return response()->json([
            'message' => $expiredJobCount > 0 ? 'Expired jobs updated successfully!' : 'No expired jobs to update.',
            'count' => $expiredJobCount
        ]);
    }

    public function printApplicantsByStatus($status)
    {
        $validStatuses = ['pending', 'screening', 'scheduled', 'evaluation', 'hired', 'rejected', 'archived'];

        if (!in_array($status, $validStatuses)) {
            abort(404);
        }

        $applicants = Applicant::where('status', $status)->get();

        return view('hrcatalists.print.applicants-by-status', compact('applicants', 'status'));
    }

    protected $googleDriveService;

    public function __construct(GoogleDriveService $googleDriveService)
    {
        $this->googleDriveService = $googleDriveService;
    }

    public function store(Request $request)
    {
        // dd([
        //     'has_cv' => $request->hasFile('cv'),
        //     'cv_file' => $request->file('cv'),
        // ]);
        
        $validated = $request->validate([
            // Core employee fields
            'job_title' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'cv' => 'nullable|mimes:pdf|max:2048',
            'job_id' => 'nullable|exists:jobs,id',
            'privacy_policy_agreed' => 'nullable|boolean',
            'status' => 'nullable|string|max:100',
            'applied_at' => 'nullable|date',
            'faculty_code' => 'nullable|string|max:255',
            'school_of' => 'nullable|string|max:255',
            'designation_group' => 'nullable|string|max:255',
            'branch' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:50',
            'religion' => 'nullable|string|max:100',
            'civil_status' => 'nullable|string|max:100',
            'citizenship' => 'nullable|string|max:100',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_address' => 'nullable|string|max:255',
            'spouse_occupation' => 'nullable|string|max:255',
            'no_of_dependents' => 'nullable|integer',
            'children_birthdates' => 'nullable|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'mother_address' => 'nullable|string|max:255',
            'sss_no' => 'nullable|string|max:50',
            'pagibig_no' => 'nullable|string|max:50',
            'philhealth_no' => 'nullable|string|max:50',
            'tin_no' => 'nullable|string|max:50',

            // Employment Details
            'parent_department' => 'nullable|string|max:255',
            'parent_college' => 'nullable|string|max:255',
            'classification' => 'nullable|string|max:255',
            'employment_status' => 'nullable|string|max:255',
            'date_employed' => 'nullable|date',
            'accreditation' => 'nullable|string|max:255',
            'date_permanent' => 'nullable|date',

            // Nested related fields
            'educations.*.level' => 'nullable|string|max:255',
            'educations.*.school' => 'nullable|string|max:255',
            'educations.*.course' => 'nullable|string|max:255',
            'educations.*.major' => 'nullable|string|max:255',
            'educations.*.remarks' => 'nullable|string|max:255',

            'licenses.*.license_name' => 'nullable|string|max:255',
            'licenses.*.license_number' => 'nullable|string|max:255',
            'licenses.*.expiry_date' => 'nullable|date',
            'licenses.*.renewal_from' => 'nullable|date',
            'licenses.*.renewal_to' => 'nullable|date',

            'trainings.*.training_date' => 'nullable|date',
            'trainings.*.title' => 'nullable|string|max:255',
            'trainings.*.venue' => 'nullable|string|max:255',
            'trainings.*.remark' => 'nullable|string|max:255',

            'service_records.*.department' => 'nullable|string|max:255',
            'service_records.*.inclusive_date' => 'nullable|string|max:255',
            'service_records.*.appointment_record' => 'nullable|string|max:255',
            'service_records.*.position' => 'nullable|string|max:255',
            'service_records.*.rank' => 'nullable|string|max:100',
            'service_records.*.remarks' => 'nullable|string|max:255',

            'organizations.*.registration_date' => 'nullable|date',
            'organizations.*.validity_date' => 'nullable|date',
            'organizations.*.organization_name' => 'nullable|string|max:255',
            'organizations.*.place' => 'nullable|string|max:255',
            'organizations.*.position' => 'nullable|string|max:255',

            'others.*.date' => 'nullable|date',
            'others.*.description' => 'nullable|string|max:255',
        ]);

        $employee = null;

        DB::transaction(function () use ($validated, $request, &$employee, &$cvFileId) {
            // ✅ Upload to Google Drive and hash filename
            // if ($request->hasFile('cv')) {
            //     $cvFile = $request->file('cv');
            //     $cvFileId = $this->googleDriveService->uploadFile($cvFile);
            //     $employeeData['cv'] = $cvFileId; // ✅ assign it here
            // } else {
            //     $cvFileId = null;
            // }

            if ($request->hasFile('cv')) {
                $cvFile = $request->file('cv');
                $cvFileId = $this->googleDriveService->uploadFile($cvFile);
                $validated['cv'] = $cvFileId;
            }

            $employeeData = collect($validated)->except([
                'educations', 'licenses', 'trainings', 'service_records', 'organizations', 'others'
            ])->toArray();           

            // ✅ Create employee
            $employee = Employee::create($employeeData);

            // ✅ Employment details
            $employee->employmentDetails()->create([
                'parent_department' => $request->input('parent_department'),
                'parent_college' => $request->input('parent_college'),
                'classification' => $request->input('classification'),
                'employment_status' => $request->input('employment_status'),
                'date_employed' => $request->input('date_employed') ?? now(),
                'accreditation' => $request->input('accreditation'),
                'date_permanent' => $request->input('date_permanent'),
                'cv' => $cvFileId,
            ]);

            // ✅ Related sections
            $relations = [
                'educations' => 'educations',
                'licenses' => 'licenses',
                'trainings' => 'trainings',
                'service_records' => 'serviceRecords',
                'organizations' => 'organizations',
                'others' => 'others',
            ];

            foreach ($relations as $input => $relation) {
                if ($request->has($input)) {
                    foreach ($request->input($input) as $record) {
                        if (array_filter($record)) {
                            $employee->{$relation}()->create($record);
                        }
                    }
                }
            }
        });

        Log::create([
            'user_id' => Auth::id(),
            'activity' => "Added new employee: {$employee->first_name} {$employee->last_name} (Job Title: {$employee->job_title})",
        ]);

        return back()->with('success', 'New employee added successfully.');
    }   


    public function manageUsers(Request $request)
    {
        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }

        $search = $request->input('search');
    
        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->get();
    
        return view('hrcatalists.ems.admin-ems-manage-users', compact('users'));
    }
    
    
    public function searchUsers(Request $request)
    {
        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }

        $search = $request->input('search');
    
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->get();
    
        return view('hrcatalists.ems.ems-manage-users', compact('users'));
    }
    public function updateUserRole(Request $request)
    {
        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:admin,secretary,employee',
        ]);
    
        $user = User::find($validated['user_id']);
        $oldRole = $user->role;
        $user->role = $validated['role'];
        $user->save();
    
        Log::create([
            'user_id' => Auth::id(),
            'activity' => "Changed role of {$user->name} from {$oldRole} to {$user->role}",
            'created_at' => now(),
        ]);
    
        return redirect()->back()->with('success', "{$user->name}'s role was updated to {$user->role}.");
    }
    
    public function createUser(Request $request)
    {
        if ($this->isSecretary()) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,secretary',
        ]);
    
        // Default password
        $defaultPassword = 'P@SSW0RD';
    
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($defaultPassword),
            'role' => $validated['role'],
        ]);
    
        return redirect()->route('manage-users')->with('success', 'User created successfully.');
    }
    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Current password is incorrect.');
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('success', 'Password updated successfully!');
    
}

}