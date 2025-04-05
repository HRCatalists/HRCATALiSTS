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
use App\Services\GoogleDriveService;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
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
    
        return view('hrcatalists.emp-dashboard', compact(
            'logs', 'totalApplicants', 'applicantsByStatus', 'totalJobs', 'events'
        ));
    }    
    
}
