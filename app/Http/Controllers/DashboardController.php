<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Job;

class DashboardController extends Controller
{
    public function index()
    {
        // ✅ Count all applicants
        $totalApplicants = Applicant::count();
    
        // ✅ Count pending applicants
        $pendingApplicants = Applicant::where('status', 'pending')->count();
    
        // ✅ Count archived applicants
        $archivedApplicants = Applicant::where('status', 'archived')->count();
    
        return view('hrcatalists.ats.admin-ats-db', [
            'totalApplicants' => $totalApplicants,
            'pendingApplicants' => $pendingApplicants,
            'archivedApplicants' => $archivedApplicants,
        ]);
    }
}
