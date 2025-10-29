<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'fa' ? 'rtl' : 'ltr' }}" style="font-family: IRANSansWeb , 'serif'">
<head>
    <meta charset="utf-8" />
    <title>اطلسین</title>
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
    class="navbar navbar-expand-lg navbar-light sticky-top py-1 h6"
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
    <div class="collapse navbar-collapse h6" id="navbarCollapse" style="direction: rtl; margin-right:435px; font-family:IRANSansWeb; " >
        <div class="navbar-nav bg-light rounded pe-4 py-1 py-lg-0">
            <a href="{{route('clients.index')}}" class="nav-item nav-link active">خانه</a>
            <a href="{{route('clients.aboutUs')}}" class="nav-item nav-link">درباره ی ما</a>
            <a href="{{route('clients.ourService')}}" class="nav-item nav-link">خدمات </a>
            <a href="{{route('clients.gallery_items.index')}}" class="nav-item nav-link">گالری </a>
            <!-- نسخه فارسی منو با ساب‌منوهای راست به چپ -->
            <!-- منوی اصلی محصولات -->
            <!-- منوی اصلی محصولات -->
            <div class="nav-item dropdown position-relative">
                <a class="nav-link dropdown-toggle" href="#" id="productMenu" data-bs-toggle="dropdown">
                    محصولات ما
                </a>
                <div class="dropdown-menu bg-white border-0 rounded-3 shadow-sm m-0 p-2 text-end" dir="rtl">
                    <!-- دسته اصلی: بیمارستانی -->
                    <div class="position-relative category-item">
                        <a href="{{route('clients.hospital')}}" class="dropdown-item show-submenu fw-semibold" data-target="hospitalSub">بیمارستانی</a>
                        <div class="submenu-box rounded-3">
                            <a href="#" class="dropdown-item">سیستم‌های اکسیژن PSA</a>
                            <a href="#" class="dropdown-item">سیستم‌های هوای فشرده </a>
                            <a href="#" class="dropdown-item">سیستم‌های وکیوم مرکزی</a>
                            <a href="#" class="dropdown-item">سیستم‌های AGS (تخلیه گازهای بی‌هوشی)</a>
                        </div>
                    </div>
                    <!-- صنعتی -->
                    <div class="position-relative category-item">
                        <a href="#" class="dropdown-item show-submenu fw-semibold" data-target="industrialSub">صنعتی</a>
                        <div class="submenu-box rounded-3">
                            <a href="#" class="dropdown-item">کشاورزی</a>
                            <a href="#" class="dropdown-item">آبزی‌پروری</a>
                            <a href="#" class="dropdown-item">تصفیه فاضلاب</a>
                            <a href="#" class="dropdown-item">نفت و گاز</a>
                            <a href="#" class="dropdown-item">صنایع شیشه</a>
                        </div>
                    </div>

                    <!-- خانگی -->
                    <div class="position-relative category-item">
                        <a href="{{route('clients.homecare')}}" class="dropdown-item show-submenu fw-semibold" data-target="homeSub">خانگی</a>
                        <div class="submenu-box rounded-3">
                            <a href="#" class="dropdown-item">دستگاه‌های اکسیژن‌ساز</a>
                            <a href="#" class="dropdown-item">دستگاه‌های درمان اختلالات خواب</a>
                            <a href="#" class="dropdown-item">دستگاه‌های تشخیص اختلالات خواب</a>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .submenu-box {
                    display: none;
                    position: absolute;
                    top: 0;
                    right: 100%;
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


            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const mainCategories = document.querySelectorAll(".main-category");
                    const subMenus = document.querySelectorAll(".submenu-container");

                    mainCategories.forEach(item => {
                        item.addEventListener("mouseenter", function () {
                            const targetId = this.getAttribute("data-target");

                            // پنهان کردن همه‌ی زیردسته‌ها
                            subMenus.forEach(menu => menu.style.display = "none");

                            // نمایش زیردسته‌ی مرتبط
                            const targetMenu = document.getElementById(targetId);
                            if (targetMenu) {
                                targetMenu.style.display = "block";
                            }
                        });
                    });

                    // وقتی از منو خارج شدیم، زیردسته پنهان شه
                    document.addEventListener("mouseover", function (e) {
                        if (!e.target.closest(".dropdown-menu") && !e.target.closest(".submenu-container")) {
                            subMenus.forEach(menu => menu.style.display = "none");
                        }
                    });
                });
            </script>

            <!-- ساید پنجره زیردسته‌ها -->
            <div class="submenu-container bg-white border shadow-sm p-2" id="hospitalSub">
                <a href="#" class="dropdown-item">اکسیژن‌ساز</a>
                <a href="#" class="dropdown-item">هوای فشرده</a>
                <a href="#" class="dropdown-item">وکیوم</a>
                <a href="#" class="dropdown-item">جمع‌آوری گاز بیهوشی</a>
            </div>

            <div class="submenu-container bg-white border shadow-sm p-2" id="industrialSub">
                <a href="#" class="dropdown-item">اکسیژن صنعتی</a>
                <a href="#" class="dropdown-item">نیتروژن</a>
            </div>

            <div class="submenu-container bg-white border shadow-sm p-2" id="homecareSub">
                <a href="#" class="dropdown-item">اکسیژن‌ساز خانگی</a>
            </div>


            <a href="{{route('clients.ContactUS')}}" class="nav-item nav-link">ارتباط با ما</a>
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
                <p class="text-white" style="text-align:justify">
                    شرکت اطلسین افتخار دارد که تکنولوژى تولید اکسیژن به روش PSA را براى اولین بار در ایران در سال ۱۳۶۸ معرفى و در همان سال به عنوان نخستین تامین‌کننده‌ی سیستم‌های تولید اکسیژن در محل، اولین دستگاه مولد اکسیژن به روش PSA را با ظرفیت ۱۲۰ متر مکعب در ساعت نصب و راه اندازى نموده است. اطلسین همچنین اولین دستگاه تولید اکسیژن طبی بیمارستانی را نیز در سال ۱۳۷۰ نصب نموده که تا کنون با همان راندمان اولیه مورد ‏بهره‌برداری قرار می‌گیرد.‏
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
                    <span>SGC Building No.22</span>
                    <span>17 th St Ahmad Qasir</span>
                    <span>Ave (Bucharest), tehran</span>
                </p>
                <p class="text-white">
                    <i class="fa fa-phone-alt me-2 text-white" style="rotate: -90deg"></i>
                    <span>98-2188725434+</span>
                </p>
                <p class="text-white">
                    <i class="fa fa-envelope me-2 text-white"></i>
                    <span>info@atlasin.ir</span>
                </p>
            </div>

            <!-- دسترسی سریع -->
            <div class="col-lg-3 col-md-6" style="direction: rtl;">
                <h5 class="text-white mb-4">دسترسی سریع</h5>
                <a class="btn btn-link text-white d-flex justify-content-between align-items-center px-0" href="{{route('clients.aboutUs')}}">
                    <span>درباره ما</span>
                    <i class="fa fa-angle-left text-white" style="margin-left:130px "></i>
                </a>
                <a class="btn btn-link text-white d-flex justify-content-between align-items-center px-0" href="{{route('clients.ContactUS')}}">
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
                <div class="mb-3 text-center">
                    <img
                        src="{{ asset('Client/img/icon/logo1.png') }}"
                        alt="لوگو"
                        class="img-fluid mt-5 footer-logo1"
                    />
                </div>
            </div>
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


<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        right: 100%; /* برای RTL */
        left: auto;
        display: none;
        margin-top: -1px;
        min-width: 200px;
        z-index: 1000;
    }

    .dropdown-submenu:hover .dropdown-menu {
        display: block;
    }

    .dropdown-submenu > a::after {
        content: "◄";
        float: left;
        margin-top: 5px;
        margin-left: 5px;
    }
</style>


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

</body>
</html>
