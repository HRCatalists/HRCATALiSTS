<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Log; // Ensure Log model exists



class AdminController extends Controller
{
    public function atsLogs()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $logs = Log::with('user')->latest()->get(); // Fetch logs with user details
    
        return view('hrcatalists.ats.admin-ats-logs', compact('logs'));
    }
    

    public function mainMenu()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.main-menu-ats-ems'); // Main menu view
    }

    public function emsDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-db'); // EMS dashboard
    }

    public function employees()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-emp'); // EMS Employee List
    }

    public function calendar()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-cl'); // EMS Calendar
    }

    public function deptCOA()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-dept-coa');
    }

    public function deptCASED()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-dept-cased'); // College of Arts & Science and Education
    }

    public function deptCBA()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-dept-cba'); // College of Business and Accountancy
    }

    public function deptCCS()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-dept-ccs'); // College of Computer Studies
    }

    public function deptCOE()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-dept-coe'); // College of Engineering
    }

    public function deptCON()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-dept-con'); // College of Nursing
    }

    public function deptBasicEd()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-dept-basicEd'); // College of Basic Education
    }

    public function ranking()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-ranking'); // EMS Faculty/Non-teaching Ranking
    }

    public function companyPolicy()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-policy'); // Logs Page
    }

    public function logs()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.admin-ems-logs'); // Logs Page
    }

    // ATS
    public function atsDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('hrcatalists.ats.admin-ats-db'); // ATS dashboard
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

// class AdminController extends Controller
// {
//     public function mainMenu()
//     {
//         return view('hrcatalists.main-menu-ats-ems'); // Main menu view
//     }

//     public function emsDashboard()
//     {
//         return view('hrcatalists.admin-ems-db'); // EMS dashboard
//     }

    // public function atsDashboard()
    // {
    //     return view('hrcatalists.admin-ats-db'); // ATS dashboard
    // }

//     public function employees()
//     {
//         return view('hrcatalists.admin-ems-emp'); // EMS Employee List
//     }

//     public function deptCOA()
//     {
//         return view('hrcatalists.admin-ems-dept-coa'); // College of Architecture
//     }

//     public function deptCASED()
//     {
//         return view('hrcatalists.admin-ems-dept-cased'); // College of Arts & Science and Education
//     }

//     public function deptCBA()
//     {
//         return view('hrcatalists.admin-ems-dept-cba'); // College of Business and Accountancy
//     }

//     public function deptCCS()
//     {
//         return view('hrcatalists.admin-ems-dept-ccs'); // College of Computer Studies
//     }

//     public function deptCOE()
//     {
//         return view('hrcatalists.admin-ems-dept-coe'); // College of Engineering
//     }

//     public function deptCON()
//     {
//         return view('hrcatalists.admin-ems-dept-con'); // College of Nursing
//     }

//     public function deptBasicEd()
//     {
//         return view('hrcatalists.admin-ems-dept-basicEd'); // College of Basic Education
//     }

//     public function calendar()
//     {
//         return view('hrcatalists.admin-ems-cl'); // EMS Calendar
//     }

//     public function ranking()
//     {
//         return view('hrcatalists.admin-ems-ranking'); // EMS Faculty/Non-teaching Ranking
//     }

//     public function companyPolicy()
//     {
//         return view('hrcatalists.admin-ems-policy'); // Logs Page
//     }

//     public function logs()
//     {
//         return view('hrcatalists.admin-ems-logs'); // Logs Page
//     }
// }