<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* feature Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
        lang="fa"
        class="light-style layout-menu-fixed"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="/Admin/assets/"
        data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>Atlassin Panel Co</title>

    <meta name="description" content="" />
    <!-- Favicon -->

    <link rel="icon" type="image/x-icon" href="{{asset('Client/img/icon/logo1.png')}}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"/>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/Admin/assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="/Admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/Admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/Admin/assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/Admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/Admin/assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="/Admin/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/Admin/assets/js/config.js"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container" style="background-color: #b4d6fa">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" dir="rtl">
            <div class="app-brand demo">
                <a href="" class="app-brand-link">
                    <h5 class="demo menu-text fw-bolder ms-2">پنل کاربری شرکت اطلسین</h5>
                </a>
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item active">
                    <a href="{{ route('Admin.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">داشبورد</div>
                    </a>
                </li>

                <!-- ===== تیتر ثابت: صفحه ی اصلی (بدون کشویی) ===== -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">صفحه اصلی</span>
                </li>

                <!-- صفحه اصلی (کشویی) -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div data-i18n="Account Settings"> بنر اصلی</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('slider.index') }}" class="menu-link">
                                <div data-i18n="Account">جدول بنر ها</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- خدمات - تماس با ما (کشویی) -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-server"></i>
                        <div data-i18n="Account Settings">خدمات - تماس با ما</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('contact-services.index') }}" class="menu-link">
                                <div data-i18n="Account">جدول سرویس های تماس با ما</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('contact.index') }}" class="menu-link">
                                <div data-i18n="Notifications">پیام های دریافتی</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- بخش های اطلسین (کشویی) -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxs-coupon"></i>
                        <div data-i18n="Account Settings">بخش های اطلسین</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('why-uses.index') }}" class="menu-link">
                                <div data-i18n="title course">جدول اصلی</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('why-uses.create') }}" class="menu-link">
                                <div data-i18n="subcourse index">ایجاد ویژگی</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- بیمارستان ها (کشویی) -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxs-category"></i>
                        <div data-i18n="Account Settings">بیمارستان ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('hospitals.index') }}" class="menu-link">
                                <div data-i18n="title course">لیست بیمارستان ها</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link">
                                <div data-i18n="subcourse index">ایجاد دوره جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- لینک‌های تکی -->
                <li class="menu-item">
                    <a href="{{ route('faqs.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-help-circle"></i>
                        <div data-i18n="Container">سوالات متداول</div>
                    </a>
                </li>
{{--                <li class="menu-item">--}}
{{--                    <a href="layouts-fluid.html" class="menu-link">--}}
{{--                        <i class="menu-icon tf-icons bx bx-fullscreen"></i>--}}
{{--                        <div data-i18n="Fluid">Fluid</div>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <!-- درباره ی ما (کشویی مستقل) -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-abacus"></i>
                        <div data-i18n="Layouts">درباره ی ما</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('about.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-shield"></i>
                                <div>در باره ی ما صفحه ی اصلی</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-abacus"></i>
                        <div data-i18n="Layouts">گالری</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('gallery-categories.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-shield"></i>
                                <div>کتگوری</div>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{route('gallery_items.index')}}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-shield"></i>
                                <div>ایتم</div>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- ===== تیتر ثابت: صفحات و یا خدمات ===== -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">صفحات و یا خدمات</span>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user-check"></i>
                        <div data-i18n="Account Settings">دوره ها و گواهی نامه ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('trainings.index')}}" class="menu-link">
                                <div data-i18n="Account">جدول دوره ها </div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('certificates.create') }}" class="menu-link">
                                <div data-i18n="Notifications">تمپلیت</div>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(auth()->check() && auth()->user()->hasRole(['Real-Admin','Admin']))
                <!-- کاربران (کشویی) -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user-check"></i>
                        <div data-i18n="Account Settings">کاربران</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('users.index') }}" class="menu-link">
                                <div data-i18n="Account">جدول مشاهده کاربران</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('team-members.index') }}" class="menu-link">
                                <div data-i18n="Notifications">تیم اطلسین</div>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- توسعه دهندگان (کشویی) -->
                    @if(auth()->check() && auth()->user()->hasRole('Real-Admin'))
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-code"></i>
                        <div data-i18n="User interface">توسعه دهندگان</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-user-check"></i>
                                <div>دسترسی ها</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="{{ route('role.index') }}" class="menu-link">
                                        <div>جدول نقش ها</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="javascript:void(0);" class="menu-link">
                                        <div>ایجاد نقش</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('permission.index') }}" class="menu-link">
                                        <div>لیست دسترسی</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- وبلاگ (کشویی) -->
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxl-blogger"></i>
                        <div data-i18n="User interface">وبلاگ</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('blogs.index') }}" class="menu-link">
                                <div>جدول مطالب</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('blogs-category.index') }}" class="menu-link">
                                <div>دسته بندی موضوعات</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- صفحه ی محصولات خانگی (کشویی) -->
                @if(auth()->check() && auth()->user()->hasRole(['Real-Admin','Admin','manager-home','home-user']))
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxl-blogger"></i>
                        <div data-i18n="User interface">صفحه ی محصولات خانگی</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('homecare.index') }}" class="menu-link">
                                <div>نوشته ی بخش اول</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('homecare.create') }}" class="menu-link">
                                <div>ایجاد نوشته ی بخش اول</div>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- بخش بیمارستانی (کشویی) -->
                @if(auth()->check() && auth()->user()->hasRole(['Real-Admin','Admin','manager-hospital','hospital-user']))
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="User interface">بخش بیمارستانی</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('hospital-texts.index') }}" class="menu-link">
                                <div>صغحه ی محصولات بیمارستانی</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('hospital-schematics.index') }}" class="menu-link">
                                <div>دسته بندی محصولات</div>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
            <div class="">
                <img src="{{asset('Client/img/icon/logo1.png')}}" alt="لوگو" class="img-fluid mt-5 footer-logo" style="width:150px;"/>
            </div>

        </aside>

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>
                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <input
                                    type="text"
                                    class="form-control border-0 shadow-none"
                                    placeholder="Search..."
                                    aria-label="Search..."
                            />
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->
{{--                        <li class="nav-item lh-1 me-3">--}}
{{--                            <a--}}
{{--                                    class="github-button"--}}
{{--                                    href="https://github.com/themeselection/sneat-html-Admin-template-free"--}}
{{--                                    data-icon="octicon-star"--}}
{{--                                    data-size="large"--}}
{{--                                    data-show-count="true"--}}
{{--                                    aria-label="Star themeselection/sneat-html-Admin-template-free on GitHub"--}}
{{--                            >Star</a--}}
{{--                            >--}}
{{--                        </li>--}}

     <!-- User -->
                        @auth()
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    @if(auth()->user()->avatar)
                                        <img src="{{ asset('storage/users/'.auth()->user()->avatar) }}" alt="Profile" height="80"  class="w-px-40 h-auto rounded-circle">
                                    @endif
                                </div>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    < @if(auth()->user()->avatar)
                                                        <img src="{{ asset('storage/users/'.auth()->user()->avatar) }}" alt="Profile" height="80"  class="w-px-40 h-auto rounded-circle">
                                                    @endif
                                                </div>
                                            </div>
{{--                                            @php--}}
{{--                                                $id= auth()->user()->id;--}}
{{--                                                $profile = \App\Models\UserProfile::query()->where('user_id' , $id)->first();--}}
{{--                                                $role = \App\Models\Role::query()->where('id' , $id)->first();--}}
{{--                                                $user = $id--}}
{{--                                            @endphp--}}
{{--                                            @isset($profile)--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <span class="fw-semibold d-block">{{$profile->name}}</span>--}}

{{--                                                <small class="text-muted">{{$role->name}}</small>--}}
{{--                                            </div>--}}
{{--                                            @else--}}
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ $currentUser->name }}</span>
                                                    <small class="text-muted">{{ $currentRole ?? 'بدون نقش' }}</small>
                                                </div>
{{--                                            @endisset--}}

                                        </div>
                                    </a>
                                    @endauth
                                </li>
{{--                                <li>--}}
{{--                                    <div class="dropdown-divider"></div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="dropdown-item" href="">--}}
{{--                                        <i class="bx bx-user me-2"></i>--}}
{{--                                        <span class="align-middle">My Profile</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="dropdown-item" href="#">--}}
{{--                                        <i class="bx bx-cog me-2"></i>--}}
{{--                                        <span class="align-middle">Settings</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="dropdown-item" href="#">--}}
{{--                        <span class="d-flex align-items-center align-middle">--}}
{{--                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>--}}
{{--                          <span class="flex-grow-1 align-middle">Billing</span>--}}
{{--                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>--}}
{{--                        </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="dropdown-divider"></div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
                                    <a class="dropdown-item" href="{{route('logout')}}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper" style=" background-color: #b4d6fa">
                <!-- Content -->
                @yield('content')
{{--              --}}
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            © تمامی حقوق این سایت مربوط به شرکت اطلسین می باشد
                            <script>
                                document.write(new Date().getFullYear());
                            </script>

                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder"></a>
                        </div>
                        <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank"></a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4"></a>

                            <a
                                    href="https://themeselection.com/demo/sneat-bootstrap-html-Admin-template/documentation/"
                                    target="_blank"
                                    class="footer-link me-4"
                            ></a
                            >

                            <a
                                    href="https://github.com/themeselection/sneat-html-Admin-template-free/issues"
                                    target="_blank"
                                    class="footer-link me-4"
                            ></a
                            >
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

{{--<div class="buy-now">--}}
{{--    <a--}}
{{--            href="https://themeselection.com/products/sneat-bootstrap-html-Admin-template/"--}}
{{--            target="_blank"--}}
{{--            class="btn btn-danger btn-buy-now"--}}
{{--    >Upgrade to Pro</a--}}
{{--    >--}}
{{--</div>--}}

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="/Admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/Admin/assets/vendor/libs/popper/popper.js"></script>
<script src="/Admin/assets/vendor/js/bootstrap.js"></script>
<script src="/Admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="/Admin/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="/Admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="/Admin/assets/js/main.js"></script>

<!-- Page JS -->
<script src="/Admin/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
