<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class HomeController extends Controller
{
    public function index()
    {
        // If the user is logged in, redirect to the main menu
        if (Auth::check()) {
            return redirect()->route('main-menu');
        }
        $jobs = Job::all();  // Or use a query to fetch the job posts

        // Always show the welcome page for guests
        return view('hrcatalists.index', compact('jobs'));
    }

   

}
