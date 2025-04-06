<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   // In app/Http/Controllers/Auth/AuthenticatedSessionController.php
   public function store(LoginRequest $request): RedirectResponse
   {
       $request->authenticate();
       $request->session()->regenerate();
   
       $user = Auth::user();
   
       // 🔁 Redirect based on role
       if ($user->role === 'admin' || $user->role === 'secretary') {
           return redirect()->intended(route('admin.dashboard'));
       } elseif ($user->role === 'employee') {
           return redirect()->intended(route('emp.dashboard'));
       } else {
           // Optional fallback if role is not recognized
           return redirect()->intended(route('home'));
       }
   }
   

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
