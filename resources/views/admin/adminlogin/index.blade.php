<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V8</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/adminlogin/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/adminlogin/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/adminlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/adminlogin/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/adminlogin/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/adminlogin/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/adminlogin/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/adminlogin/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/adminlogin/css/util.css">
    <link rel="stylesheet" type="text/css" href="/adminlogin/css/main.css">
    <!--===============================================================================================-->
</head>
<style>
    .font-fa{

        font-family: IRANSansWeb, serif; !important;

    }

</style>

<body>

<div class="limiter" dir="rtl">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="{{route('SupportLogin')}}" method="post">
                @csrf
                <span class="login100-form-title">
						ورود به پنل پشتیبانی
					</span>
                <span class="fs-20 fw-light blockquote font-fa" style="margin-bottom:20px; color: #28a745;">شماره تلفن خود را وارد نمایید</span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username" style="margin-top:20px">
                    <input class="input100" type="text" name="phone" placeholder="موبایل" value="">
                    <span class="focus-input100"></span>
                </div>
{{--                @error('phone')--}}

{{--                <span class="text-sm text-danger text-rose-500 mt-2 bg-light " style="margin-top: 20px;">--}}
{{--                        {{$message}}--}}
{{--                    </span>--}}

{{--                @enderror--}}
                {{--                <div class="wrap-input100 validate-input" data-validate = "Please enter password">--}}
                {{--                    <input class="input100" type="password" name="password" placeholder="پسورد">--}}
                {{--                    <span class="focus-input100"></span>--}}
                {{--                </div>--}}

                <div class="text-right p-t-13 p-b-23">
                    {{--						<span class="txt1">--}}
                    {{--							Forgot--}}
                    {{--						</span>--}}

                    {{--                    <a href="#" class="txt2">--}}
                    {{--                        Username / Password?--}}
                    {{--                    </a>--}}
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        ورود
                    </button>
                </div>

                <div class="flex-col-c p-t-170 p-b-40" style="margin-top:-30px">
						<span class="txt1 p-b-9">
							فراموشی رمز عبور
						</span>

                    <a href="" class="txt3">
                        برای بازیابی کلیک کنید
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="/adminlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="/adminlogin/js/main.js"></script>

</body>
</html>
