<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // If the user is logged in, redirect to the main menu
        if (Auth::check()) {
            return redirect()->route('main-menu');
        }

        // Always show the welcome page for guests
        // return view('hrcatalists.index');
        return response()->view('hrcatalists.index');
    }
}

