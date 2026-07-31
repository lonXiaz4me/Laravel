<?php

namespace App\Support;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OtpGenerator
{
    public static function generateFor(User $user): string
    {
        $code = (string) random_int(100000, 999999);

        $user->forceFill([
            'otp_code' => Hash::make($code),
            'otp_expires_at' => now()->addMinutes(10),
        ])->save();

        Mail::raw("Your verification code is: {$code}\nIt expires in 10 minutes.", function ($message) use ($user) {
            $message->to($user->email)->subject('Your verification code');
        });

        return $code;
    }

    public static function verify(User $user, string $code): bool
    {
        if (! $user->otp_code || ! $user->otp_expires_at) {
            return false;
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            return false;
        }

        return Hash::check($code, $user->otp_code);
    }

    public static function clear(User $user): void
    {
        $user->forceFill([
            'otp_code' => null,
            'otp_expires_at' => null,
        ])->save();
    }
}