<?php

namespace App\Http\Controllers\Auth;

use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use App\Http\Requests\Auth\EmailVerifyRequest;
use App\Notifications\Auth\EmailVerificationNotification;

class EmailVerificationController extends Controller
{
    private $otp;
    use ApiResponseTrait;

    function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->otp = new Otp();
    }

    function sendEmailVerificationNotification(Request $request): JsonResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->apiResponse(null, 403, 'The user has already been verified. Invalid process.');
        }

        $request->user()->notify(new EmailVerificationNotification());

        return $this->apiResponse('Send email verification success');
    }

    function emailVerify(EmailVerifyRequest $request): JsonResponse
    {
        $user = $request->user();

    if ($user->hasVerifiedEmail()) {
        return $this->apiResponse(null, 403, 'The user has already been verified. Invalid process.');
    }

    $otpValidationResult = $this->otp->validate($user->email, $request->code);

    if (!$otpValidationResult->status) {
        return $this->apiResponse($otpValidationResult, 403, $otpValidationResult->message);
    }

    $emailVerifySuccess = $user->markEmailAsVerified();

    if ($emailVerifySuccess) {
        event(new Verified($user));
        return $this->apiResponse($user, 200, 'Verification successful');
    } else {
        return $this->apiResponse(null, 500, 'Failed to verify email. Please try again later.');
    }
    }
}
