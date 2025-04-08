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

        // ✅ Count applicants per status
        $pendingApplicants    = Applicant::where('status', 'pending')->count();
        $screeningApplicants  = Applicant::where('status', 'screening')->count();
        $scheduledApplicants  = Applicant::where('status', 'scheduled')->count();
        $evaluationApplicants = Applicant::where('status', 'evaluation')->count();
        $hiredApplicants      = Applicant::where('status', 'hired')->count();
        $archivedApplicants   = Applicant::where('status', 'archived')->count();

        return view('hrcatalists.ats.admin-ats-db', [
            'totalApplicants'     => $totalApplicants,
            'pendingApplicants'   => $pendingApplicants,
            'screeningApplicants' => $screeningApplicants,
            'scheduledApplicants' => $scheduledApplicants,
            'evaluationApplicants'=> $evaluationApplicants,
            'hiredApplicants'     => $hiredApplicants,
            'archivedApplicants'  => $archivedApplicants,
        ]);
    }
}
