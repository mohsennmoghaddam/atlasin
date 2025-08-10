@extends('client.Fa.layout.master')
@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $index => $slide)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img class="w-100" src="{{ asset('storage/' . $slide->image) }}" alt="Image" />
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <h1 class="display-3 text-dark mb-4 animated slideInDown">
{{--                                            {{ $slide->getTranslation('title', app()->getLocale()) }}--}}
                                        </h1>
                                        <p class="fs-5 text-body mb-5">
{{--                                            {{ $slide->getTranslation('description', app()->getLocale()) }}--}}
                                        </p>
{{--                                        @if($slide->getTranslation('button', app()->getLocale()))--}}
{{--                                            <a href="#" class="btn btn-primary py-3 px-5">--}}
{{--                                                {{ $slide->getTranslation('button', app()->getLocale()) }}--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
                                    </div>
                                    <div class="col-12 col-lg-6" style="text-align: left;">
                                        <h1 class="display-3 mb-4 animated slideInDown text-white">
                                            {{ $slide->getTranslation('title', app()->getLocale()) }}
                                        </h1>
                                        <p class="fs-5 text-body mb-5 text-white">
                                            {{ $slide->getTranslation('description', app()->getLocale()) }}
                                        </p>
{{--                                        @if($slide->getTranslation('button', app()->getLocale()))--}}
{{--                                            <a href="#" class="btn btn-primary py-3 px-5">--}}
{{--                                                {{ $slide->getTranslation('button', app()->getLocale()) }}--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5" dir="rtl">
        <div class="container">
            <div class="row g-5">
                {{-- تصویر اصلی --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden rounded pe-5 pt-5 h-100" style="min-height: 400px">
                        <img class="position-absolute w-100 h-100" src="{{ asset('storage/' . $about->main_image) }}" alt="about image" style="object-fit: cover" />
                        <div class="position-absolute top-0 end-0 bg-white rounded ps-3 pb-3" style="width: 250px; height: 250px">
                            <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                                <h2 class="text-white mb-0">{{ json_decode($about->experience_text_top)->fa ?? '' }}</h2>
                                <h1 class="text-white mb-0">{{ $about->experience_years }}</h1>
                                <h2 class="text-white">{{ json_decode($about->experience_text_bottom)->fa ?? '' }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- متن سمت راست --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6 mb-5">{{ json_decode($about->title)->fa ?? '' }}</h1>
                        <p class="fs-5 text-primary mb-4">{{ json_decode($about->subtitle)->fa ?? '' }}</p>

                        <div class="row g-4 mb-4">
                            @foreach($about->icons as $icon)
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 ms-3 text-dark" src="{{ asset('storage/' . $icon->icon_image) }}" alt="icon" />
                                        <h5 class="mb-0">{{ json_decode($icon->icon_title)->fa ?? '' }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <p class="mb-4">{{ json_decode($about->final_paragraph)->fa ?? '' }}</p>

                        <div class="border-top mt-4 pt-4 " STYLE="text-align: left;">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 rounded-circle ms-3" src="{{ asset('storage/' . $about->call_us_image) }}" alt="" />
                                <h5 class="mb-0">تماس با ما: {{ json_decode($about->call_us_text)->fa ?? '' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- list of center Start -->
    <div class="container-fluid overflow-hidden my-5 px-lg-0 text-center">
        <div class="container facts px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 facts-text wow fadeIn" data-wow-delay="0.1s" >
                    <div class="h-100 px-4 ps-lg-0">
                        <h1 class="text-white mb-4">دستاورد ها و مراکز نصب </h1>
                        <p class="text-light mb-5">
                            اطلسین با افختار و با تیکه بر  هدف رضایت مشتری توانسته است به بیش از 600 مرکز مهم سبلمت کشور خدمت رسانی کند
                        </p>
{{--                        <a href="" class="align-self-start btn btn-secondary py-3 px-5"--}}
{{--                        >More Details</a--}}
                        >
                    </div>
                </div>
                <div class="col-lg-6 facts-counter wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 px-4 pe-lg-0">
                        <div class="row g-5">
                            <div class="col-sm-6">
                                <h1 class="display-5" data-toggle="counter-up">+600</h1>
                                <p class="fs-5 text-primary"> مرکز نصب فعال</p>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="display-5" data-toggle="counter-up">+600</h1>
                                <p class="fs-5 text-primary">نصب موفق</p>
                            </div>
{{--                            <div class="col-sm-6">--}}
{{--                                <h1 class="display-5" data-toggle="counter-up">1234</h1>--}}
{{--                                <p class="fs-5 text-primary">Awards Achieved</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <h1 class="display-5" data-toggle="counter-up">1234</h1>--}}
{{--                                <p class="fs-5 text-primary">Team Members</p>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">

                {{-- سمت چپ: متن و آیتم‌ها --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-5">{{ $whyUs?->title[app()->getLocale()] ?? '' }}</h1>

                    <p class="mb-4">
                        {{ $whyUs?->description[app()->getLocale()] ?? '' }}
                    </p>

                    <div class="row g-3">
                        @foreach($whyUs?->items ?? [] as $index => $item)
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.{{ $index + 1 }}s">
                                <div class="bg-light rounded h-100 p-3">
                                    <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                        @if($item->icon)
                                            <img
                                                class="align-self-center mb-3"
                                                src="{{ asset('storage/' . $item->icon) }}"
                                                alt="icon"
                                                style="width: 50px;"
                                            />
                                        @endif
                                        <h5 class="mb-0">{{ $item->title[app()->getLocale()] ?? '' }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- سمت راست: تصویر --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative rounded overflow-hidden h-100" style="min-height: 400px">
                        @if($whyUs?->image)
                            <img
                                class="position-absolute w-100 h-100"
                                src="{{ asset('storage/' . $whyUs->image) }}"
                                alt="Why Us Image"
                                style="object-fit: cover"
                            />
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- blogs Start -->
    <div class="container-xxl py-5" style="direction: ltr; !important;">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px">
                <h1 class="display-6 mb-5">
                    We Provide professional Insurance Services
                </h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div
                                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
                            >
                                <img
                                    class="img-fluid"
                                    src="client/img/icon/icon-10-light.png"
                                    alt=""
                                />
                            </div>
                            <h4 class="mb-0">Life Insurance</h4>
                        </div>
                        <p class="mb-4">
                            Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                            sit clita duo justo erat amet
                        </p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div
                                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
                            >
                                <img
                                    class="img-fluid"
                                    src="client/img/icon/icon-01-light.png"
                                    alt=""
                                />
                            </div>
                            <h4 class="mb-0">Health Insurance</h4>
                        </div>
                        <p class="mb-4">
                            Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                            sit clita duo justo erat amet
                        </p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div
                                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
                            >
                                <img
                                    class="img-fluid"
                                    src="client/img/icon/icon-05-light.png"
                                    alt=""
                                />
                            </div>
                            <h4 class="mb-0">Home Insurance</h4>
                        </div>
                        <p class="mb-4">
                            Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                            sit clita duo justo erat amet
                        </p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div
                                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
                            >
                                <img
                                    class="img-fluid"
                                    src="client/img/icon/icon-08-light.png"
                                    alt=""
                                />
                            </div>
                            <h4 class="mb-0">Vehicle Insurance</h4>
                        </div>
                        <p class="mb-4">
                            Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                            sit clita duo justo erat amet
                        </p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div
                                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
                            >
                                <img
                                    class="img-fluid"
                                    src="client/img/icon/icon-07-light.png"
                                    alt=""
                                />
                            </div>
                            <h4 class="mb-0">Business Insurance</h4>
                        </div>
                        <p class="mb-4">
                            Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                            sit clita duo justo erat amet
                        </p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div
                                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
                            >
                                <img
                                    class="img-fluid"
                                    src="client/img/icon/icon-06-light.png"
                                    alt=""
                                />
                            </div>
                            <h4 class="mb-0">Property Insurance</h4>
                        </div>
                        <p class="mb-4">
                            Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                            sit clita duo justo erat amet
                        </p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blogs End -->

    <!-- Appointment Start -->
    @php $locale = app()->getLocale(); @endphp
    <div class="container-fluid appointment my-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn font-far" data-wow-delay="0.5s" style="direction: {{ $locale == 'fa' ? 'rtl' : 'ltr' }}; text-align: {{ $locale == 'fa' ? 'right' : 'left' }};">
                    <div class="bg-white rounded p-5">
                        <form action="{{ route('clients.contact.store') }}" method="post" dir="{{ $locale == 'fa' ? 'rtl' : 'ltr' }}">
                            @csrf
                            <div class="row g-3" style="text-align: {{ $locale == 'fa' ? 'right' : 'left' }};">
                                <div class="col-sm-6">
                                    <div class="form-floating" style="text-align: left">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="{{ $locale == 'fa' ? 'نام شما' : 'Your Name' }}" required />
                                        <label for="name">{{ $locale == 'fa' ? 'نام شما' : 'Your Name' }}</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="{{ $locale == 'fa' ? 'ایمیل شما' : 'Your Email' }}" required />
                                        <label for="email">{{ $locale == 'fa' ? 'ایمیل شما' : 'Your Email' }}</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="{{ $locale == 'fa' ? 'شماره تماس' : 'Your Mobile' }}" required />
                                        <label for="mobile">{{ $locale == 'fa' ? 'شماره تماس' : 'Your Mobile' }}</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="contact_service_id" id="contact_service_id" required>
                                            <option disabled selected>{{ $locale == 'fa' ? 'انتخاب نوع سرویس' : 'Select Service' }}</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">
                                                    {{ $locale == 'fa' ? $service->getTranslation('title', 'fa') : $service->getTranslation('title', 'en') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="contact_service_id">{{ $locale == 'fa' ? 'نوع سرویس' : 'Service Type' }}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" id="message" placeholder="{{ $locale == 'fa' ? 'پیام شما' : 'Your Message' }}" style="height: 80px"></textarea>
                                        <label for="message">{{ $locale == 'fa' ? 'پیام شما' : 'Your Message' }}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary py-3 px-5" type="submit">
                                        {{ $locale == 'fa' ? 'ارسال پیام' : 'Send Message' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-white mb-5">
                        @if($locale == 'fa')
                            ما تولیدکننده مولد اکسیژن بیمارستانی هستیم
                        @else
                            We're a Hospital Oxygen Generator Manufacturer
                        @endif
                    </h1>
                    <p class="text-white mb-5" style="text-align: {{ $locale == 'fa' ? 'right' : 'left' }};">
                        @if($locale == 'fa')
                            شرکت اطلسین تولیدکننده‌ی تجهیزات پزشکی با تمرکز ویژه بر روی سیستم‌های مولد اکسیژن بیمارستانی است. این شرکت با بهره‌گیری از فناوری روز، راهکارهای نوین و مطابق با استانداردهای بین‌المللی، در راستای تأمین اکسیژن پایدار و مطمئن برای مراکز درمانی فعالیت می‌کند.
                        @else
                            Atlasin Company is a medical equipment manufacturer specializing in hospital oxygen generator systems. By utilizing cutting-edge technology and adhering to international standards, the company provides reliable and efficient oxygen solutions for healthcare facilities.
                        @endif
                    </p>
                    <div class="bg-white rounded p-3">
                        <div class="d-flex align-items-center bg-primary rounded p-3">
                            <h5 class="text-white" style="text-align: {{ $locale == 'fa' ? 'right' : 'left' }};">
                                @if($locale == 'fa')
                                    تماس با ما: 02188725435
                                @else
                                    Call Us: +98 2188725435
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Appointment End -->

    <!-- Team Start -->
{{--    <div class="container-xxl py-5">--}}
{{--        <div class="container">--}}
{{--            <div class="text-center mx-auto" style="max-width: 500px">--}}
{{--                <h1 class="display-6 mb-5">Meet Our Professional Team Members</h1>--}}
{{--            </div>--}}
{{--            <div class="row g-4">--}}
{{--                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">--}}
{{--                    <div class="team-item rounded">--}}
{{--                        <img class="img-fluid" src="client/img/team-1.jpg" alt="" />--}}
{{--                        <div class="text-center p-4">--}}
{{--                            <h5>Full Name</h5>--}}
{{--                            <span>Designation</span>--}}
{{--                        </div>--}}
{{--                        <div class="team-text text-center bg-white p-4">--}}
{{--                            <h5>Full Name</h5>--}}
{{--                            <p>Designation</p>--}}
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-twitter"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-facebook-f"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-youtube"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-linkedin-in"></i--}}
{{--                                    ></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">--}}
{{--                    <div class="team-item rounded">--}}
{{--                        <img class="img-fluid" src="client/img/team-2.jpg" alt="" />--}}
{{--                        <div class="text-center p-4">--}}
{{--                            <h5>Full Name</h5>--}}
{{--                            <span>Designation</span>--}}
{{--                        </div>--}}
{{--                        <div class="team-text text-center bg-white p-4">--}}
{{--                            <h5>Full Name</h5>--}}
{{--                            <p>Designation</p>--}}
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-twitter"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-facebook-f"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-youtube"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-linkedin-in"></i--}}
{{--                                    ></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">--}}
{{--                    <div class="team-item rounded">--}}
{{--                        <img class="img-fluid" src="client/img/team-3.jpg" alt="" />--}}
{{--                        <div class="text-center p-4">--}}
{{--                            <h5>Full Name</h5>--}}
{{--                            <span>Designation</span>--}}
{{--                        </div>--}}
{{--                        <div class="team-text text-center bg-white p-4">--}}
{{--                            <h5>Full Name</h5>--}}
{{--                            <p>Designation</p>--}}
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-twitter"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-facebook-f"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-youtube"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-linkedin-in"></i--}}
{{--                                    ></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">--}}
{{--                    <div class="team-item rounded">--}}
{{--                        <img class="img-fluid" src="client/img/team-4.jpg" alt="" />--}}
{{--                        <div class="text-center p-4">--}}
{{--                            <h5>Full Name</h5>--}}
{{--                            <span>Designation</span>--}}
{{--                        </div>--}}
{{--                        <div class="team-text text-center bg-white p-4">--}}
{{--                            <h5>Full Name</h5>--}}
{{--                            <p>Designation</p>--}}
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-twitter"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-facebook-f"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-youtube"></i--}}
{{--                                    ></a>--}}
{{--                                <a class="btn btn-square btn-light m-1" href=""--}}
{{--                                ><i class="fab fa-linkedin-in"></i--}}
{{--                                    ></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px">
                <h1 class="display-6 mb-5">{{ $locale == 'fa' ? 'با اعضای تیم ما آشنا شوید' : 'Meet Our Professional Team Members' }}</h1>
            </div>
            <div class="row g-4">
                @foreach($members as $member)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 1 }}s">
                        <div class="team-item rounded">
                            <img class="img-fluid" src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->getTranslation('name', $locale) }}" />
                            <div class="text-center p-4">
                                <h5>{{ $member->getTranslation('name', $locale) }}</h5>
                                <span>{{ $member->getTranslation('position', $locale) }}</span>
                            </div>
                            <div class="team-text text-center bg-white p-4">
                                <h5>{{ $member->getTranslation('name', $locale) }}</h5>
                                <p>{{ $member->getTranslation('position', $locale) }}</p>
                                <div class="d-flex justify-content-center">
                                    @if($member->email)
                                        <a class="btn btn-square btn-light m-1" href="mailto:{{ $member->email }}">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    @endif
                                    @if($member->linkedin)
                                        <a class="btn btn-square btn-light m-1" href="{{ $member->linkedin }}" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    @endif
                                    @if($member->mobile)
                                        <a class="btn btn-square btn-light m-1" href="tel:{{ $member->mobile }}">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                    @endif
                                    @if($member->internal_number)
                                        <a class="btn btn-square btn-light m-1" href="tel:{{ $member->internal_number }}">
                                            <i class="fas fa-building"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <style>
        .hospital-hover {
            transition: all 0.3s;
        }
        .hospital-hover:hover {
            background-color: #e8f0fe;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
    </style>
    <div class="container-xxl py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">مشتریان ما</h2>
                <p class="text-muted">بیمارستان‌هایی که به ما اعتماد کرده‌اند</p>
            </div>

            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4 justify-content-center align-items-center">
                @foreach($hospitals as $hospital)
                    <div class="col text-center">
                        <a href="{{ $hospital->website }}" target="_blank" class="d-block">
                            <img src="{{ asset('storage/' . $hospital->image) }}"
                                 alt="{{ $hospital->name }}"
                                 class="img-fluid mx-auto d-block"
                                 style="max-height: 80px; object-fit: contain">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .partner-logo img {
            transition: transform 0.3s ease-in-out;
            filter: grayscale(100%);
        }

        .partner-logo img:hover {
            filter: none;
            transform: scale(1.05);
        }
    </style>
    <!-- Testimonial End -->


@endsection
