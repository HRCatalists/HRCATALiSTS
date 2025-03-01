<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Log;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view applicants.');
        }

        $allApplicants = Applicant::with('job')
            ->whereNotIn('status', ['rejected', 'archived']) // Exclude rejected & archived
            ->get();

        return view('hrcatalists.ats.admin-ats-master-list', compact('allApplicants'));
    }

    public function pending()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view pending applicants.');
        }

        $allApplicants = Applicant::whereIn('status', ['pending', 'screening'])->get();
        return view('hrcatalists.ats.admin-ats-screening', compact('allApplicants'));
    }

    public function archived()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view archived applicants.');
        }

        $allApplicants = Applicant::whereIn('status', ['archived', 'rejected'])->get();
        return view('hrcatalists.ats.admin-ats-archived', compact('allApplicants'));
    }

    public function interviewed()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view interviewed applicants.');
        }

        $interviewedApplicants = Applicant::whereIn('status', ['scheduled', 'interviewed'])->get();
        return view('hrcatalists.ats.admin-ats-interview', compact('interviewedApplicants'));
    }

    public function show($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view applicant details.');
        }

        $applicant = Applicant::findOrFail($id);
        return view('hrcatalists.ats.show-applicant', compact('applicant'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to update applicant status.');
        }

        $applicant = Applicant::find($id);
        if (!$applicant) {
            return redirect()->back()->with('error', 'Applicant not found.');
        }

        $validStatuses = ['pending', 'screening', 'scheduled', 'interviewed', 'hired', 'rejected', 'archived'];
        $newStatus = $request->input('status');

        if (!in_array($newStatus, $validStatuses)) {
            return redirect()->back()->with('error', 'Invalid status provided.');
        }

        // Combine first & last name for logging
        $applicantName = trim($applicant->first_name . ' ' . $applicant->last_name);
        $oldStatus = $applicant->status;

        // Update status
        $applicant->status = $newStatus;
        $applicant->save();

        // Log the update
        Log::create([
            'user_id' => Auth::id(),
            'activity' => "Updated status for applicant: {$applicantName} from " . ucfirst($oldStatus) . " to " . ucfirst($newStatus),
            'created_at' => now(),
            'updated_at' => $applicant->updated_at,
        ]);

        return redirect()->back()->with('success', "Applicant status updated to " . ucfirst($newStatus) . ".");
    }
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'job_id' => 'required|integer|exists:job_posts,id', // ✅ Fixed table name
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:applicants,email',
            'phone' => 'required|string|max:20', // ✅ Ensure phone is validated
            'address' => 'required|string|max:255',
            'cv' => 'required|mimes:pdf|max:2048',
            'privacy_policy_agreed' => 'required',
        ]);
    
        // Store CV
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }
    
      // Save to the database (only necessary fields)
$applicant = new Applicant();
$applicant->job_id = $validated['job_id'];
$applicant->first_name = $validated['first_name'];
$applicant->last_name = $validated['last_name'];
$applicant->email = $validated['email'];
$applicant->phone = $validated['phone'];
$applicant->address = $validated['address'];
$applicant->cv = $cvPath ?? null; // Save CV path
$applicant->privacy_policy_agreed = 1;
$applicant->status = 'pending';
$applicant->applied_at = now(); // Automatically set application timestamp
$applicant->save();

    
        return back()->with('success', 'Your application has been submitted successfully!');
    }
    
    
}        

