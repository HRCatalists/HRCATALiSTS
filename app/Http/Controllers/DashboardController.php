<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\Log;
use App\Models\Event;
use App\Models\Employee;
use App\Models\EmployeeEmploymentDetail;
use App\Models\ApplicationSubmission;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Redirect to login if not authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Logs (latest 7 activities)
        $logs = Log::latest()->take(7)->get();

        // Applicant Counts
        $totalApplicants = Applicant::count();
        $activeApplicantsCount = Applicant::whereNotIn('status', ['hired', 'rejected', 'archived'])->count();
        $recentActiveApplicants = Applicant::whereNotIn('status', ['hired', 'rejected', 'archived'])
            ->latest('applied_at')
            ->take(5)
            ->get();

        // Applicants Count Grouped by Status (handling case & space issues)
        $applicantsByStatus = Applicant::selectRaw('LOWER(TRIM(status)) as status, COUNT(*) as count')
            ->groupByRaw('LOWER(TRIM(status))')
            ->pluck('count', 'status')
            ->toArray();

        // Job Counts
        $totalJobs = Job::count();
        $activeJobsCount = Job::where('status', 'active')->count();
        $inactiveJobsCount = Job::where('status', 'inactive')->count();

        // Event Calendar Data
        $events = Event::select('event_date', 'event_time', 'title', 'description')->get();

        // Employee Counts
        $totalEmployees = Employee::count();
        $teachingCount = EmployeeEmploymentDetail::where('classification', 'teaching')->count();
        $nonTeachingCount = EmployeeEmploymentDetail::where('classification', 'non-teaching')->count();

        // Applications Submission (Job Application Logs)
        $applicationsReceived = ApplicationSubmission::count();
        $recentSubmissions = ApplicationSubmission::latest('submitted_at')->take(5)->get();

        // Employee Count Per Department
        $departmentCounts = Employee::selectRaw('department, COUNT(*) as count')
            ->groupBy('department')
            ->pluck('count', 'department')
            ->toArray();

        // Compute Percentage Per Department
        $departmentPercentages = [];
        foreach ($departmentCounts as $dept => $count) {
            $departmentPercentages[$dept] = [
                'count' => $count,
                'percentage' => $totalEmployees > 0 ? round(($count / $totalEmployees) * 100, 1) : 0,
            ];
        }

        // Pass all data to dashboard view
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
}