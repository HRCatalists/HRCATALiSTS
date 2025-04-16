<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use App\Models\Log;
use App\Models\Event;
use App\Models\Employee;
use App\Models\EmployeeEmploymentDetail;
use App\Models\ApplicationSubmission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        // ATS Data
        $logs = Log::with('user')->latest()->limit(5)->get();
        $totalApplicants = Applicant::count();
        $incompleteApplicants = Applicant::incompleteRequirements()->get();
    
        $applicantsByStatus = Applicant::selectRaw('LOWER(TRIM(status)) as status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
    
        $activeJobCount = Job::where('end_date', '>=', Carbon::now())->count();
        $inactiveJobCount = Job::where('end_date', '<', Carbon::now())->count();
        $totalJobs = Job::count();
        $events = Event::select('event_date', 'event_time', 'title', 'description')->get();
    
        // EMS Data
        $totalEmployees = Employee::count();
        $teachingCount = EmployeeEmploymentDetail::where('classification', 'teaching')->count();
        $nonTeachingCount = EmployeeEmploymentDetail::where('classification', 'non-teaching')->count();
    
        return view('hrcatalists.admin-dashboard', compact(
            'logs',
            'totalApplicants',
            'applicantsByStatus',
            'activeJobCount',
            'inactiveJobCount',
            'totalJobs',
            'events',
            'totalEmployees',
            'teachingCount',
            'nonTeachingCount',
            'incompleteApplicants'
        ));
    }
}

