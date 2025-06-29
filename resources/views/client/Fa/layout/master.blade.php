<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'fa' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8" />
    <title>اطلسین</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="client/img/icon/logo1.png" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
    />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="client/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="client/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="client/css/style.css" rel="stylesheet" />
</head>

<body>
<!-- Spinner Start -->
<div
    id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
>
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div
    class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block"
>
    <div class="row gx-0 align-items-center">
        <div class="col-lg-7 px-5 " style=" direction: ltr">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-phone-alt me-2 text-dark"></small>
                <small class="text-dark">+98 2188725434</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-envelope-open me-2 text-dark" ></small>
                <small class="text-dark">info@atlasin.com</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-clock me-2 text-dark"></small>
                <small class="text-dark">شنبه - چهار شنبه 8:00 الی 16:00</small>
            </div>
        </div>

        <div class="col-lg-5 px-5" style="text-align: left">
            <a href="{{ route('language.switch', app()->getLocale() == 'fa' ? 'en' : 'fa') }}"
               class="text-sm px-3 py-1 rounded hover:bg-gray-100 transition">
                {{ app()->getLocale() == 'fa' ? 'English' : 'فارسی' }}
            </a>
            <div class="h-100 d-inline-flex align-items-center">
                <a class="text-white-50 ms-4" href=""
                ><i class="fab fa-facebook-f text-dark"></i
                    ></a>
                <a class="text-white-50 ms-4" href=""
                ><i class="fab fa-twitter text-dark"></i
                    ></a>
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
    class="navbar navbar-expand-lg navbar-light sticky-top py-1"
>
    <a href="index.html" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
            <img
                class="img-fluid me-3"
                src="client/img/icon/logo1.png"
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
    <div class="collapse navbar-collapse" id="navbarCollapse" style="direction: rtl; margin-right:435px">
        <div class="navbar-nav bg-light rounded pe-4 py-1 py-lg-0">
            <a href="index.html" class="nav-item nav-link active">خانه</a>
            <a href="about.html" class="nav-item nav-link">درباره ی ما</a>
            <a href="service.html" class="nav-item nav-link">خدمات </a>
            <div class="nav-item dropdown">
                <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                >صفحات</a
                >
                <div class="dropdown-menu bg-light border-0 m-0">
                    <a href="feature.html" class="dropdown-item">Features</a>
                    <a href="appointment.html" class="dropdown-item">Appointment</a>
                    <a href="team.html" class="dropdown-item">Team Members</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">ارتباط با ما</a>
        </div>
    </div>
{{--    <a href="" class="btn btn-primary px-3 d-none d-lg-block">اطلسین</a>--}}
</nav>
<!-- Navbar End -->
@yield('content')
<!-- Footer Start -->
{{--<div--}}
{{--    class="container-fluid bd-foter footer mt-5 pt-5 wow fadeIn"--}}
{{--    data-wow-delay="0.1s" style="direction:rtl; text-align:right;"--}}
{{-->--}}
{{--    <div class="container py-5">--}}
{{--        <div class="row g-5">--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <h1 class="text-white mb-4">--}}
{{--                    <img--}}
{{--                        class="img-fluid me-3"--}}
{{--                        src="img/icon/icon-02-light.png"--}}
{{--                        alt=""--}}
{{--                    />Insure--}}
{{--                </h1>--}}
{{--                <p>--}}
{{--                    Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat--}}
{{--                    ipsum et lorem et sit, sed stet lorem sit clita--}}
{{--                </p>--}}
{{--                <div class="d-flex pt-2">--}}
{{--                    <a class="btn btn-square me-1" href=""--}}
{{--                    ><i class="fab fa-twitter"></i--}}
{{--                        ></a>--}}
{{--                    <a class="btn btn-square me-1" href=""--}}
{{--                    ><i class="fab fa-facebook-f"></i--}}
{{--                        ></a>--}}
{{--                    <a class="btn btn-square me-1" href=""--}}
{{--                    ><i class="fab fa-youtube"></i--}}
{{--                        ></a>--}}
{{--                    <a class="btn btn-square me-0" href=""--}}
{{--                    ><i class="fab fa-linkedin-in"></i--}}
{{--                        ></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <h5 class="text-light mb-4">ارتباط با ما </h5>--}}
{{--                <p>--}}
{{--                    <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA--}}
{{--                </p>--}}
{{--                <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>--}}
{{--                <p><i class="fa fa-envelope me-3"></i>info@example.com</p>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6" style="direction: rtl;"  >--}}
{{--                <h5 class="text-light mb-4">دسترسی سریع</h5>--}}
{{--                <a class="btn btn-link"  style="text-align:right;" href="">About Us</a>--}}
{{--                <a class="btn btn-link" href="">Contact Us</a>--}}
{{--                <a class="btn btn-link" href="">Our Services</a>--}}
{{--                <a class="btn btn-link" href="">Terms & Condition</a>--}}
{{--                <a class="btn btn-link" href="">Support</a>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <h5 class="text-light mb-4">Newsletter</h5>--}}
{{--                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>--}}
{{--                <div class="position-relative mx-auto" style="max-width: 400px">--}}
{{--                    <input--}}
{{--                        class="form-control bg-transparent w-100 py-3 ps-4 pe-5"--}}
{{--                        type="text"--}}
{{--                        placeholder="Your email"--}}
{{--                    />--}}
{{--                    <button--}}
{{--                        type="button"--}}
{{--                        class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2"--}}
{{--                    >--}}
{{--                        SignUp--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container-fluid copyright" style="direction: rtl">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12 text-center mb-3 mb-md-0">--}}
{{--                    &copy; <a href="#"> تمامی حقوق این سایت مطلق به شرکت اطلسین  می باشد  </a>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 text-center text-md-end">--}}
{{--                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->--}}
{{--                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>--}}
{{--                    <br />Distributed By:--}}
{{--                    <a href="https://themewagon.com" target="_blank">اطلسین</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div
    class="container-fluid bd-foter footer mt-5 pt-5 wow fadeIn"
    data-wow-delay="0.1s"
    style="direction: rtl; text-align: right; color: white;"
>
    <div class="container py-5">
        <div class="row g-5">
            <!-- لوگو و توضیح -->
            <div class="col-lg-3 col-md-6">
                <h1 class="text-white mb-4">
                   اطلسین
                </h1>
                <p class="text-white">
                    Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
                    ipsum et lorem et sit, sed stet lorem sit clita
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square me-1 text-white bg-transparent border" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square me-1 text-white bg-transparent border" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square me-1 text-white bg-transparent border" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square me-0 text-white bg-transparent border" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <!-- ارتباط با ما -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">ارتباط با ما</h5>
                <p class="text-white">
                    <i class="fa fa-map-marker-alt me-2 text-white"></i>
                    <span>123 Street, New York, USA</span>
                </p>
                <p class="text-white">
                    <i class="fa fa-phone-alt me-2 text-white"></i>
                    <span>98-2188725434+</span>
                </p>
                <p class="text-white">
                    <i class="fa fa-envelope me-2 text-white"></i>
                    <span>info@atlasin.com</span>
                </p>
            </div>

            <!-- دسترسی سریع -->
            <div class="col-lg-3 col-md-6" style="direction: rtl;">
                <h5 class="text-white mb-4">دسترسی سریع</h5>
                <a class="btn btn-link text-white d-flex justify-content-between align-items-center px-0" href="">
                    <span>درباره ما</span>
                    <i class="fa fa-angle-left text-white" style="margin-left:130px "></i>
                </a>
                <a class="btn btn-link text-white d-flex justify-content-between align-items-center px-0" href="">
                    <span>تماس با ما</span>
                    <i class="fa fa-angle-left text-white" style="margin-left:130px" ></i>
                </a>
                <a class="btn btn-link text-white d-flex justify-content-between align-items-center px-0" href="">
                    <span>خدمات ما</span>
                    <i class="fa fa-angle-left text-white " style="margin-left:130px" ></i>
                </a>
                <a class="btn btn-link text-white d-flex justify-content-between align-items-center px-0" href="">
                    <span>قوانین و مقررات</span>
                    <i class="fa fa-angle-left text-white" style="margin-left:130px" ></i>
                </a>
                <a class="btn btn-link text-white d-flex justify-content-between align-items-center px-0" href="">
                    <span>پشتیبانی</span>
                    <i class="fa fa-angle-left text-white" style="margin-left:130px" ></i>
                </a>
            </div>
            <!-- خبرنامه (در صورت نیاز) -->

            <div class="col-lg-3 col-md-6">
{{--                <h5 class="text-white mb-4">اطلسین</h5>--}}
                <div class="mb-3">
                    <img src="client/img/icon/logo1.png" alt="لوگو" class="img-fluid mt-5 footer-logo"/>
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
            -->
        </div>
    </div>

    <!-- کپی‌رایت -->
    <div class="container-fluid copyright" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-white">
                    &copy; تمامی حقوق این سایت متعلق به شرکت <a href="#" class="text-white fw-bold">اطلسین</a> می‌باشد.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
><i class="bi bi-arrow-up"></i
    ></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="client/lib/wow/wow.min.js"></script>
<script src="client/lib/easing/easing.min.js"></script>
<script src="client/lib/waypoints/waypoints.min.js"></script>
<script src="client/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="client/lib/counterup/counterup.min.js"></script>

<!-- Template Javascript -->
<script src="client/js/main.js"></script>
</body>
</html>
