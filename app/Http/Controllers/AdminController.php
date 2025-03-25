<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\Log;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Employee;



class AdminController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        // Fetch logs, applicants, and jobs
        $logs = Log::latest()->take(5)->get();
        $totalApplicants = Applicant::count();
        $applicantsByStatus = Applicant::selectRaw('LOWER(TRIM(status)) as status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
        $totalJobs = Job::count();
    
        // ✅ Fetch all events (without category filtering)
        $events = Event::select('event_date', 'event_time', 'title', 'description')->get();
    
        return view('hrcatalists.admin-dashboard', compact(
            'logs', 'totalApplicants', 'applicantsByStatus', 'totalJobs', 'events'
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
     
         // Fetch employees from the database
         $employees = Employee::all();
     
         // Pass employees to the view
         return view('hrcatalists.ems.admin-ems-emp', compact('employees'));
     }
     public function showEmployee($id)
{
    $employee = Employee::findOrFail($id); // Fetch employee or fail
    return view('hrcatalists.ems.admin-ems-view-emp', compact('employee'));
}
public function deleteEmployee($id)
{
    $employee = Employee::find($id);

    if (!$employee) {
        return redirect()->back()->with('error', 'Employee not found.');
    }

    $employee->delete();

    return redirect()->back()->with('success', 'Employee deleted successfully.');
}







       // Load the ems Calendar View
       public function emsCalendar()
       {
           if (!Auth::check()) {
               return redirect()->route('login');
           }
   
           $events = Event::where('user_id', Auth::id())->get(); // Fetch events for logged-in user
           return view('hrcatalists.ems.admin-ems-cl', compact('events'));
       }

       public function deptCOA()
       {
           if (!Auth::check()) {
               return redirect()->route('login');
           }
       
           // Fetch employees where department is "College of Architecture"
           $employees = Employee::where('department', 'College of Architecture')->get();
       
           return view('hrcatalists.ems.admin-ems-dept-coa', compact('employees'));
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
        return view('hrcatalists.ems.admin-ems-dept-non-teaching',compact('employees')); // College of Basic Education
    }

    public function ranking()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-ranking'); // EMS Faculty/Non-teaching Ranking
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
    public function atsApplicants()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ats.admin-ats-master-list'); // ATS Applicants
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
}