@extends('admin.auth.layout.master') {{-- یا layout اختصاصی احراز هویت شما --}}

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300 px-4">
        <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">ورود به حساب کاربری</h2>
                <p class="text-sm text-gray-500 mt-1">لطفاً ایمیل یا شماره موبایل خود را وارد کنید</p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.sendOtp') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="identifier" class="block text-sm font-medium text-gray-700 auth-input">ایمیل یا شماره موبایل</label>
                    <input type="text" name="identifier" id="identifier" required
                           class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-right text-gray-800 search-input" />
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-xl transition duration-150">
                    دریافت کد یک‌بارمصرف
                </button>
            </form>

            <p class="text-xs text-gray-400 text-center mt-6">
                © {{ now()->year }} تمامی حقوق محفوظ است
            </p>
        </div>
    </div>
@endsection
