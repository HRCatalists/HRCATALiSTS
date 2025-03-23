<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('hrcatalists.openings', compact('departments'));
    }

    public function store(Request $request)
    {
        // ✅ Ensure the authenticated user is an admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action. Only admins can add new departments.');
        }
    
        // ✅ Validate request
        $validated = $request->validate([
            'department' => 'required',
            'other_department_name' => $request->department === 'other' ? 'required|string|max:255' : 'nullable',
            'other_department_code' => $request->department === 'other' ? 'required|string|max:50' : 'nullable',
        ]);
    
        // ✅ Determine selected or new department
        if ($request->department === 'other') {
            // Save new department
            $department = Department::firstOrCreate(
                ['name' => $request->other_department_name],
                ['code' => $request->other_department_code]
            );
    
            $selectedDepartment = $department->name;
        } else {
            $selectedDepartment = $request->department;
        }
    
        // ✅ Continue saving job/user with $selectedDepartment
        // Example:
        // Job::create([... 'department' => $selectedDepartment]);
    
        return back()->with('success', 'Department handled successfully.');
    }
}