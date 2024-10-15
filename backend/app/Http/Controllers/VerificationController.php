<?php

namespace App\Http\Controllers;
use App\Models\Account;

use Auth;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function send(Request $request)
    {
        $user = Auth::user();
        try {
            if ($user->hasVerifiedEmail()) {
                return response()->json(['message' => 'Email already verified.'], 400);
            }

            $user->sendEmailVerificationNotification();

            // Assuming you are using the default Notification class
            // The verification email should include a link generated via:
            // URL::temporarySignedRoute('verification.verify', now()->addMinutes(60), ['id' => $user->id, 'hash' => sha1($user->email)]);

            return response()->json(['message' => 'Verification email sent.'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Verification Failed.'], 200);
            ;
        }



    }


    public function resend(Request $request)
    {
        $user = Account::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'Account not found.'], 404);
        }
        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.'], 400);
        }
        $user->sendEmailVerificationNotification();
        return response()->json(['message' => 'Verification email resent.']);
    }
}
