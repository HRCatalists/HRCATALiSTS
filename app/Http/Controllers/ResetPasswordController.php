<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\PasswordResetMail;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Generate and encode token safely
        $token = base64_encode(Str::random(64));

        // Clean up old tokens
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Store token as-is (plain, but encoded)
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        // Send the reset link
        Mail::to($request->email)->send(new PasswordResetMail($token, $request->email));

        return back()->with('success', 'A password reset link has been sent to your email.');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $email = urldecode($request->email);

        $record = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        // Optional debug check:
        // dd([
        //     'submitted_token' => $request->token,
        //     'stored_token' => $record->token ?? 'none',
        //     'match' => $record && hash_equals($record->token, $request->token),
        // ]);

        if (!$record || !hash_equals($record->token, $request->token)) {
            return back()->with('error', 'Invalid or expired token.');
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        if (password_verify($request->password, $user->password)) {
            return back()->with('error', 'New password must be different from the current password.');
        }

        // Let model auto-hash the password via 'hashed' cast
        $user->password = $request->password;
        $user->save();

        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return redirect()->route('login')->with('success', 'Password reset successful. You can now log in.');
    }
}
