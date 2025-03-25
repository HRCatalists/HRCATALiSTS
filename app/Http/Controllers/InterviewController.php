<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewScheduled;
use Illuminate\Support\Arr;

class InterviewController extends Controller
{
    public function scheduleInterview(Request $request, Applicant $applicant)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|string',
        ]);

        // Send email notification
        Mail::to($applicant->email)->send(new InterviewScheduled(
            $applicant, 
            Arr::get($validatedData, 'event_date'), 
            Arr::get($validatedData, 'event_time')
        ));

        return redirect()->back()->with('success', 'Interview scheduled, and email sent successfully.');
    }
}
