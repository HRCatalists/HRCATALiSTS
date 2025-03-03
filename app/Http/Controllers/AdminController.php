<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\Log;
use Carbon\Carbon;



class AdminController extends Controller
{
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

    public function emsDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-db'); // EMS dashboard
    }

    public function employees()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-emp'); // EMS Employee List
    }

    public function calendar()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-cl'); // EMS Calendar
    }

    public function deptCOA()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-dept-coa');
    }

    public function deptCASED()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-dept-cased'); // College of Arts & Science and Education
    }

    public function deptCBA()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-dept-cba'); // College of Business and Accountancy
    }

    public function deptCCS()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-dept-ccs'); // College of Computer Studies
    }

    public function deptCOE()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-dept-coe'); // College of Engineering
    }

    public function deptCON()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-dept-con'); // College of Nursing
    }

    public function deptBasicEd()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ems.admin-ems-dept-basicEd'); // College of Basic Education
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

    // ATS
    public function atsDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // ✅ Get total applicants
        $totalApplicants = Applicant::count();

        // ✅ Get applicants count by status
        $applicantsByStatus = Applicant::selectRaw('LOWER(TRIM(status)) as status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // ✅ Get all jobs
        $allJobs = Job::all();
        $totalJobs = $allJobs->count();

        // ✅ Active jobs (end_date in future or today)
        $activeJobs = Job::where('end_date', '>=', Carbon::now())->get();
        $activeJobCount = $activeJobs->count();

        // ✅ Inactive jobs (end_date has passed)
        $inactiveJobs = Job::where('end_date', '<', Carbon::now())->get();
        $inactiveJobCount = $inactiveJobs->count();

        return view('hrcatalists.ats.admin-ats-db', [
            'totalApplicants' => $totalApplicants,
            'applicantsByStatus' => $applicantsByStatus,
            'activeJobCount' => $activeJobCount,
            'inactiveJobCount' => $inactiveJobCount,
            'totalJobs' => $totalJobs,
            'allJobs' => $allJobs,
        ]);
    }

    public function atsCalendar()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ats.admin-ats-cl'); // ATS Calendar
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
}