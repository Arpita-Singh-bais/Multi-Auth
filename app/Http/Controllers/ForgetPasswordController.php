<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\PasswordResetNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ForgetPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {

        return view('auth.forget-password');
    }

    // send reset link on mail
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users']
        ]);

        // generate a six digit random code
        $code = rand(100000, 999999);

        // store code in reset password table
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $code,
                'created_at' => now()
            ]
        );

        // Get the user and send notification
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->notify(new PasswordResetNotification($code));
        }

        // Store email in session for next steps
        session(['reset_email' => $request->email]);

        return redirect()->route('password.verify')
            ->with('status', 'We have emailed your password reset verification code!');

        /**
         * Show the verify code form.
         */
    }

    public function showVerifyCodeForm()
    {
        if (!session('reset_email')) {
            return redirect()->route('password.request');
        }
        return view('auth.verify-code');
    }

    /**
     * Verify the code.
     */
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric|digits:6',
        ]);

        $email = session('reset_email');
        if (!$email) {
            return redirect()->route('password.request');
        }

        $reset = DB::table('password_resets')
            ->where('email', $email)
            ->first();
       

        if (!$reset) {
            throw ValidationException::withMessages([
                'code' => ['No reset request found. Please request a new code.'],
            ]);
        }


        // Check if the token is expired (60 minutes)
        if (now()->diffInMinutes($reset->created_at) > 60) {
            DB::table('password_resets')->where('email', $email)->delete();

            throw ValidationException::withMessages([
                'code' => ['The verification code has expired. Please request a new one.'],
            ]);
        }

        // Store in session that the code is verified
        session(['code_verified' => true]);

        return redirect()->route('password-reset');
    }

    public function showResetPasswordForm()
    {
        if (!session('reset_email') || !session('code_verified')) {
            return redirect()->route('password.request');
        }
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
    
        $user = User::where('email', session('reset_email'))->first();
        if (!$user) {
            return redirect()->route('password.request');
        }

        $user->password = Hash::make($request->password);
        $user->save();
        DB::table('password_resets')->where('email', $user->email)->delete();

        return redirect()->route('auth.login')->with('status', 'Password reset successfully');
    }
}
