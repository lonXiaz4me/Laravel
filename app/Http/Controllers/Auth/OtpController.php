<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\OtpGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function create(Request $request)
    {
        $email = $request->session()->get('otp_email');

        if (! $email) {
            return redirect()->route('login');
        }

        return view('auth.verify-otp', ['email' => $email]);
    }

    public function store(Request $request)
    {
        $request->validate(['otp' => ['required', 'digits:6']]);

        $email = $request->session()->get('otp_email');
        $user = User::where('email', $email)->first();

        if (! $user || ! OtpGenerator::verify($user, $request->otp)) {
            return back()->withErrors(['otp' => 'That code is invalid or has expired.']);
        }

        $user->forceFill(['email_verified_at' => now()])->save();
        OtpGenerator::clear($user);

        $request->session()->forget('otp_email');
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function resend(Request $request)
    {
        $email = $request->session()->get('otp_email');
        $user = User::where('email', $email)->first();

        if (! $user) {
            return redirect()->route('login');
        }

        OtpGenerator::generateFor($user);

        return back()->with('status', 'A new code has been sent.');
    }
}