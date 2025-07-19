<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Melipayamk;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    public function sendOtp(Request $request , Melipayamk $melipayamk)
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


        if (!$user->roles()->whereIn('name', ['admin', 'Real-admin' , 'seler'])->exists()) {
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
            'expires_at' => now()->addMinutes(2), // ⏰ انقضا دو دقیقه بعد),
        ]);

        // ذخیره موبایل در سشن برای مرحله بعد
        Session::put('auth_mobile', $user->mobile);

        $otp = \App\Models\Otp::where('user_id', $user->id)->where('expires_at', '>', now())->latest()->first();

        $code=$otp->otp_code;

        $mobile=$user->mobile;

        $text = '1';

//        $melipayamk->OTPSMS($code , $mobile , $text);

        // شبیه‌سازی ارسال OTP (فعلاً لاگ)
        logger("OTP for {$user->mobile} is: $otp");

        return redirect()->route('login.verifyForm')->with('success', 'کد یک‌بارمصرف برای شما ارسال شد.');
    }


    public function showVerifyForm()
    {
        if (!Session::has('auth_mobile')) {
            return redirect()->route('login.form')->withErrors(['identifier' => 'دسترسی غیرمجاز.']);
        }

        return view('admin.auth.verify');
    }



    public function verifyOtp(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $mobile = Session::get('auth_mobile');
        $user = User::where('mobile', $mobile)->first();

        if (!$user) {
            return redirect()->route('login.form')->withErrors(['identifier' => 'کاربر یافت نشد.']);
        }

        $otp = Otp::where('user_id', $user->id)->latest()->first();

        if (!$otp || !$otp->isValid()) {
            return redirect()->route('login.form')->withErrors(['identifier' => 'کد منقضی شده است.']);
        }

        $expectedCode = $user->secret_code . $otp->otp_code;

        if ($request->code !== $expectedCode) {
            return back()->withErrors(['code' => 'کد وارد شده نادرست است.']);
        }

        // حذف OTP پس از تایید موفق
        $otp->delete();

        // ذخیره وضعیت مرحله دوم در session برای ورود نهایی (با رمز ایستا)
        Session::put('verified_user_id', $user->id);

        return redirect()->route('login.passwordForm');
    }

    public function showPasswordForm()
    {
        if (!Session::has('verified_user_id')) {
            return redirect()->route('login.form')->withErrors(['identifier' => 'لطفاً مجدداً وارد شوید.']);
        }

        return view('admin.auth.password');
    }


    public function loginWithPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $userId = Session::get('verified_user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login.form')->withErrors(['identifier' => 'کاربر یافت نشد.']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'رمز وارد شده اشتباه است.']);
        }

        auth()->login($user);

        // پاک کردن اطلاعات session
        Session::forget('verified_user_id');
        Session::forget('auth_mobile');

        return redirect()->route('admin.index'); // یا هر مسیری که داشبورد شماست
    }


    public function logout(){

            auth()->logout();
            Session::forget('auth_mobile');
            return redirect()->route('login.form');

    }


}
