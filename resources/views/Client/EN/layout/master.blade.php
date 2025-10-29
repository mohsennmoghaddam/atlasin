<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Atlasin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('Client/img/icon/logo1.png') }}" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('Client/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Client/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('Client/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('Client/css/style.css') }}" rel="stylesheet" />

</head>

<body>
<!-- Spinner Start -->
<div
    id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" style="margin-bottom: 44px"
>
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div
    class="container-fluid bg-dark text-white-50 py-1 px-0 d-none d-lg-block"
>
    <div class="row gx-0 align-items-center">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-phone-alt me-2 text-dark" style=""></small>
                <small class="text-dark">+98 2188725434</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-envelope-open me-2 text-dark" ></small>
                <small class="text-dark">info@atlasin.com</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-clock me-2 text-dark"></small>
                <small class="text-dark">SAT - WED : 08 AM - 16 PM</small>
            </div>
        </div>

        <div class="col-lg-5 px-5 text-end">
            <a href="{{ route('language.switch', app()->getLocale() == 'fa' ? 'en' : 'fa') }}"
               class="text-sm px-3 py-1 rounded hover:bg-gray-100 transition">
                {{ app()->getLocale() == 'fa' ? 'English' : 'فارسی' }}
            </a>
            <div class="h-100 d-inline-flex align-items-center">
{{--                <a class="text-white-50 ms-4" href=""--}}
{{--                ><i class="fab fa-facebook-f text-dark"></i--}}
{{--                    ></a>--}}
{{--                <a class="text-white-50 ms-4" href=""--}}
{{--                ><i class="fab fa-twitter text-dark"></i--}}
{{--                    ></a>--}}
                <a class="text-white-50 ms-4" href="https://www.linkedin.com/in/atlasin"
                ><i class="fab fa-linkedin-in text-dark"></i
                    ></a>
                <a class="text-white-50 ms-4" href="https://www.instagram.com/atlasin.ir"
                ><i class="fab fa-instagram text-dark"></i
                    ></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav
    class="navbar navbar-expand-lg  navbar-light sticky-top px-4 px-lg-5"
>
    <a href="index.html" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
            <img
                class="img-fluid me-3"
                src="{{asset('Client/img/icon/logo1.png')}}"
                alt=""
            />
        </h1>
    </a>
    <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav bg-light rounded pe-4 py-1 py-lg-0" style="margin-left:300px">
            <a href="{{route('clients.index')}}" class="nav-item nav-link active">Home</a>
            <a href="{{route('clients.aboutUs')}}" class="nav-item nav-link">About Us</a>
            <a href="{{route('clients.ourService')}}" class="nav-item nav-link">Our Services</a>
            <a href="{{route('clients.ourService')}}" class="nav-item nav-link">Gallery</a>
            <!-- English Version -->
            <!-- English Products Menu -->
            <div class="nav-item dropdown position-relative">
                <a class="nav-link dropdown-toggle" href="#" id="productMenuEn" data-bs-toggle="dropdown">
                    Our Products
                </a>
                <div class="dropdown-menu bg-white border-0 rounded-3 shadow-sm m-0 p-2 text-start" dir="ltr">
                    <!-- Hospital -->
                    <div class="position-relative category-item">
                        <a href="{{route('clients.hospital')}}" class="dropdown-item show-submenu fw-semibold" data-target="hospitalSubEn">Hospital</a>
                        <div class="submenu-box rounded-3" id="hospitalSubEn">
                            <a href="#" class="dropdown-item">PSA Oxygen Systems</a>
                            <a href="#" class="dropdown-item">Medical Air Systems</a>
                            <a href="#" class="dropdown-item">Central Vacuum Systems</a>
                            <a href="#" class="dropdown-item">AGS Systems</a>
                        </div>
                    </div>
                    <!-- Industrial -->
                    <div class="position-relative category-item">
                        <a href="#" class="dropdown-item show-submenu fw-semibold" data-target="industrialSubEn">Industrial</a>
                        <div class="submenu-box rounded-3" id="industrialSubEn">
                            <a href="#" class="dropdown-item">Agriculture</a>
                            <a href="#" class="dropdown-item">Aquaculture</a>
                            <a href="#" class="dropdown-item">Waste Water Treatment</a>
                            <a href="#" class="dropdown-item">Oil and Gas</a>
                            <a href="#" class="dropdown-item">Glass Industry</a>
                        </div>
                    </div>

                    <!-- Homecare -->
                    <div class="position-relative category-item">
                        <a href="{{route('clients.homecare')}}" class="dropdown-item show-submenu fw-semibold" data-target="homeSubEn">Homecare</a>
                        <div class="submenu-box rounded-3" id="homeSubEn">
                            <a href="#" class="dropdown-item">Oxygen Concentrators</a>
                            <a href="#" class="dropdown-item">Sleep Therapy Devices</a>
                            <a href="#" class="dropdown-item">Sleep Diagnostic Devices</a>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .submenu-box {
                    display: none;
                    position: absolute;
                    top: 0;
                    left: 100%;
                    background: #ffffff;
                    min-width: 180px;
                    padding: 0.5rem 0;
                    border: 1px solid #e0e0e0;
                    z-index: 1000;
                    transition: all 0.2s ease-in-out;
                    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
                }

                .category-item:hover .submenu-box {
                    display: block;
                }

                .dropdown-item {
                    padding: 8px 15px;
                    font-size: 14px;
                    color: #333;
                    border-radius: 0;
                    transition: background 0.2s;
                }

                .dropdown-item:hover {
                    background-color: #f1f1f1;
                    color: #000;
                }

                .dropdown-menu {
                    border-radius: 12px;
                    border: 1px solid #e0e0e0;
                }

                .nav-link {
                    color: #000 !important;
                    font-weight: 500;
                }
            </style>


            <a href="{{route('clients.ContactUS')}}" class="nav-item nav-link">Contact Us</a>
        </div>
    </div>

{{--    <div class="btn" style="margin-left: 100px">--}}
{{--        <a href="" class="btn btn-primary  d-none d-lg-block">Atlasin</a>--}}
{{--    </div>--}}

</nav>
<!-- Navbar End -->
@yield('content')
<!-- Footer Start -->
<div
     class="container-fluid footer mt-5 pt-5 wow fadeIn bd-foter"
    data-wow-delay="0.1s"
>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h1 class="text-white mb-4">
                    Atlasin
                </h1>
                <p>
                    Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
                    ipsum et lorem et sit, sed stet lorem sit clita
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square me-1" href=""
                    ><i class="fab fa-twitter"></i
                        ></a>
                    <a class="btn btn-square me-1" href=""
                    ><i class="fab fa-facebook-f"></i
                        ></a>
                    <a class="btn btn-square me-1" href="https://www.linkedin.com/in/atlasin"
                    ><i class="fab fa-linkedin-in"></i
                        ></a>
                    <a class="btn btn-square me-1" href="https://www.instagram.com/atlasin.ir"
                    ><i class="fab fa-instagram"></i
                        ></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Address</h5>
                <p>
                    <i class="fa fa-map-marker-alt me-3"></i>
                    <span>SGC Building No.22</span>
                    <span>17 th St Ahmad Qasir</span>
                    <span>Ave (Bucharest), tehran</span>
                </p>
                <p><i class="fa fa-phone-alt me-3"></i>+98 21 88725434</p>
                <p><i class="fa fa-envelope me-3"></i>info@atlasin.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Contact US </h5>
                <p class="text-white">
                    <i class="fa fa-map-marker-alt me-2 text-white"></i>
{{--                    <span>123 Street, New York, USA</span>--}}
                </p>
                <p class="text-white">
                    <i class="fa fa-phone-alt me-2 text-white"></i>
                    <span>+98 21 88725434</span>
                </p>
                <p class="text-white">
                    <i class="fa fa-envelope me-2 text-white"></i>
                    <span>info@atlasin.ir</span>
                </p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Quick Links</h5>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Our Services</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                {{--                <h5 class="text-white mb-4">اطلسین</h5>--}}
                <div class="mb-3">
                    <img src="{{asset('Client/img/icon/logo1.png')}}" alt="لوگو" class="img-fluid mt-5 footer-logo1"/>
                </div>

                {{--                <p class="text-white">برای دریافت اخبار جدید ایمیل خود را وارد کنید.</p>--}}
                {{--                <div class="position-relative mx-auto" style="max-width: 400px;">--}}
                {{--                    <input--}}
                {{--                        class="form-control bg-transparent w-100 py-3 ps-4 pe-5 text-white"--}}
                {{--                        type="text"--}}
                {{--                        placeholder="ایمیل شما"--}}
                {{--                    />--}}
                {{--                    <button--}}
                {{--                        type="button"--}}
                {{--                        class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2"--}}
                {{--                    >--}}
                {{--                        عضویت--}}
                {{--                    </button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                </div>
{{--                <div class="col-md-6 text-center text-md-end">--}}
{{--                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->--}}
{{--                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>--}}
{{--                    <br />Distributed By:--}}
{{--                    <a href="https://themewagon.com" target="_blank">ThemeWagon</a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
><i class="bi bi-arrow-up"></i
    ></a>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('Client/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('Client/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('Client/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('Client/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('Client/lib/counterup/counterup.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('Client/js/main.js') }}"></script>


<!-- Template Javascript -->
<script src="client/js/main.js"></script>
</body>
</html>
