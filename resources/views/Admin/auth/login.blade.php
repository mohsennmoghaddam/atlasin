{{--@extends('Admin.auth.layout.master') --}}{{-- یا layout اختصاصی احراز هویت شما --}}

{{--@section('content')--}}
{{--    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300 px-4">--}}
{{--        <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">--}}
{{--            <div class="text-center mb-6">--}}
{{--                <h2 class="text-2xl font-bold text-gray-800">ورود به حساب کاربری</h2>--}}
{{--                <p class="text-sm text-gray-500 mt-1">لطفاً ایمیل یا شماره موبایل خود را وارد کنید</p>--}}
{{--            </div>--}}

{{--            @if(session('success'))--}}
{{--                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm">--}}
{{--                    {{ session('success') }}--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if($errors->any())--}}
{{--                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">--}}
{{--                    {{ $errors->first() }}--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <form action="{{ route('login.sendOtp') }}" method="POST" class="space-y-4">--}}
{{--                @csrf--}}

{{--                <div>--}}
{{--                    <label for="identifier" class="block text-sm font-medium text-gray-700 auth-input">ایمیل یا شماره موبایل</label>--}}
{{--                    <input type="text" name="identifier" id="identifier" required--}}
{{--                           class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-right text-gray-800 search-input" />--}}
{{--                </div>--}}

{{--                <button type="submit"--}}
{{--                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-xl transition duration-150">--}}
{{--                    دریافت کد یک‌بارمصرف--}}
{{--                </button>--}}
{{--            </form>--}}

{{--            <p class="text-xs text-gray-400 text-center mt-6">--}}
{{--                © {{ now()->year }} تمامی حقوق محفوظ است--}}
{{--            </p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}


<div class="overlay" style="margin-top: 200px">
    <div class="mb-3 text-center" style="text-align: center;">
        <img src="{{asset('Client/img/icon/logo1.png')}}" alt="لوگو" class="img-fluid mt-5 text-center"/>
    </div>
    <form method="POST" action="{{ route('login.sendOtp') }}">
        @csrf
        <div class="con">
            <header class="head-form">
                <h2>ورود به پنل</h2>
                <p>شماره موبایل یا ایمیل خود را وارد کنید</p>
            </header>

            <div class="field-set">
                <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                </span>

                <input class="form-input" type="text" name="identifier" placeholder="شماره موبایل یا ایمیل" required>
                @error('identifier')
                <p class="text-danger mt-1">{{ $message }}</p>
                @enderror

                <br>
                <button type="submit" class="log-in">دریافت کد</button>
            </div>
        </div>
    </form>
</div>



<style>
    /* Fonts Form Google Font ::- https://fonts.google.com/  -:: */
    @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');
    /* End Fonts */
    /* Start Global rules */
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    /* End Global rules */

    /* Start body rules */
    body {
        background-image: linear-gradient(-225deg, #0398fc 0%, #0331fc 100%);
        background-image: linear-gradient(to top, #0398fc 0%, #0331fc 100%);
        background-attachment: fixed;
        background-repeat: no-repeat;

        font-family: IRANSansWeb;
        /*   the main font */
        font-family: IRANSansWeb;
        opacity: .95;
        /* background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%); */
    }



    /* |||||||||||||||||||||||||||||||||||||||||||||*/
    /* //////////////////////////////////////////// */




    /* End body rules */

    /* Start form  attributes */
    form {
        width: 450px;
        min-height: 500px;
        height: auto;
        border-radius: 5px;
        margin: 2% auto;
        box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
        padding: 2%;
        background-image: linear-gradient(-225deg, #03cafc 50%, #7303fc 50%);
    }
    /* form Container */
    form .con {
        display: -webkit-flex;
        display: flex;

        -webkit-justify-content: space-around;
        justify-content: space-around;

        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;

        margin: 0 auto;
    }

    /* the header form form */
    header {
        margin: 2% auto 10% auto;
        text-align: center;
    }
    /* Login title form form */
    header h2 {
        font-size: 250%;
        font-family: 'Playfair Display', serif;
        color: #3e403f;
    }
    /*  A welcome message or an explanation of the login form */
    header p {letter-spacing: 0.05em;}



    /* //////////////////////////////////////////// */
    /* //////////////////////////////////////////// */


    .input-item {
        background: #fff;
        color: #333;
        padding: 14.5px 0px 15px 9px;
        border-radius: 5px 0px 0px 5px;
    }



    /* Show/hide password Font Icon */
    #eye {
        background: #fff;
        color: #333;

        margin: 5.9px 0 0 0;
        margin-left: -20px;
        padding: 15px 9px 19px 0px;
        border-radius: 0px 5px 5px 0px;

        float: right;
        position: relative;
        right: 1%;
        top: -.2%;
        z-index: 5;

        cursor: pointer;
    }
    /* inputs form  */
    input[class="form-input"]{
        width: 240px;
        height: 50px;

        margin-top: 2%;
        padding: 15px;

        font-size: 16px;
        font-family: 'Abel', sans-serif;
        color: #5E6472;

        outline: none;
        border: none;

        border-radius: 0px 5px 5px 0px;
        transition: 0.2s linear;

    }
    input[id="txt-input"] {width: 250px;}
    /* focus  */
    input:focus {
        transform: translateX(-2px);
        border-radius: 5px;
    }

    /* //////////////////////////////////////////// */
    /* //////////////////////////////////////////// */

    /* input[type="text"] {min-width: 250px;} */
    /* buttons  */
    button {
        display: inline-block;
        color: #252537;

        width: 280px;
        height: 50px;

        padding: 0 20px;
        background: #fff;
        border-radius: 5px;

        outline: none;
        border: none;

        cursor: pointer;
        text-align: center;
        transition: all 0.2s linear;

        margin: 7% auto;
        letter-spacing: 0.05em;
    }
    /* Submits */
    .submits {
        width: 48%;
        display: inline-block;
        float: left;
        margin-left: 2%;
    }

    /*       Forgot Password button FAF3DD  */
    .frgt-pass {background: transparent;}

    /*     Sign Up button  */
    .sign-up {background: #B8F2E6;}


    /* buttons hover */
    button:hover {
        transform: translatey(3px);
        box-shadow: none;
    }

    /* buttons hover Animation */
    button:hover {
        animation: ani9 0.4s ease-in-out infinite alternate;
    }
    @keyframes ani9 {
        0% {
            transform: translateY(3px);
        }
        100% {
            transform: translateY(5px);
        }
    }

</style>

<script>
    // Show/hide password onClick of button using Javascript only

    // https://stackoverflow.com/questions/31224651/show-hide-password-onclick-of-button-using-javascript-only

    function show() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'text');
    }

    function hide() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'password');
    }

    var pwShown = 0;

    document.getElementById("eye").addEventListener("click", function () {
        if (pwShown == 0) {
            pwShown = 1;
            show();
        } else {
            pwShown = 0;
            hide();
        }
    }, false);


</script>
