<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    function show() {
        return view('auth.verify-email');
    }

    function verify(EmailVerificationRequest $request) {
        $request->fulfill();
    
        return redirect('/');
    }

    function resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    }

}
