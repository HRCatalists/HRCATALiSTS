<?php

namespace App\Http\Controllers;
use App\Models\Log;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    

    public function showLogs()
    {
        $logs = Log::with('user')->latest()->get();
        return view('admin.ats.logs', compact('logs'));
    }
    
}
