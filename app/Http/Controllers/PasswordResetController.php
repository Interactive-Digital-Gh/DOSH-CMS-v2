<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function showForgotForm()
    {
        return view('dashboard.pages.auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        logActivity("Password reset requested for: " . $request->email . " (status: " . $status . ")");

        if ($status === Password::RESET_THROTTLED) {
            return back()->withErrors('Please wait a moment before requesting another reset link.');
        }

        // Same message whether or not the account exists, so the form can't be
        // used to discover which emails are registered.
        return back()->with('success', "If that email exists, we've sent a password reset link.");
    }

    public function showResetForm(Request $request, string $token)
    {
        return view('dashboard.pages.auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, string $password) {
                // The 'hashed' cast on User handles hashing
                $user->password = $password;
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            logActivity("Password successfully reset for: " . $request->email);

            return redirect()->route('login')->with('success', 'Password reset successfully. Please sign in.');
        }

        logActivity("Failed password reset attempt for: " . $request->email . " (status: " . $status . ")");

        return back()->withErrors('This password reset link is invalid or has expired. Please request a new one.');
    }
}
