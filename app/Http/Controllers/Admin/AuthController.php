<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    public function sendOtp(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
        ]);

        $user = User::where('mobile', $request->identifier)
            ->orWhere('email', $request->identifier)
            ->first();

        if (!$user) {
            return back()->withErrors(['identifier' => 'کاربری با این اطلاعات یافت نشد.']);
        }


        if (!$user->roles()->whereIn('name', ['admin', 'Real-admin'])->exists()) {
            return back()->withErrors(['identifier' => 'شما مجاز به ورود به پنل نیستید.']);
        }

        // ساخت OTP
        $otp = rand(1000, 9999);

        // حذف OTP‌های قبلی
        Otp::where('user_id', $user->id)->delete();

        // ذخیره OTP جدید
        Otp::create([
            'user_id' => $user->id,
            'otp_code' => $otp,
            'expires_at' => now()->addMinutes(2),
        ]);

        // ذخیره موبایل در سشن برای مرحله بعد
        Session::put('auth_mobile', $user->mobile);

        // شبیه‌سازی ارسال OTP (فعلاً لاگ)
        logger("OTP for {$user->mobile} is: $otp");

        return redirect()->route('login.verifyForm')->with('success', 'کد یک‌بارمصرف برای شما ارسال شد.');
    }



}
