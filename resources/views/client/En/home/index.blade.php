@extends('client.En.layout.master')
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
                                            {{ $slide->getTranslation('title', app()->getLocale()) }}
                                        </h1>
                                        <p class="fs-5 text-body mb-5">
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
{{--    <div class="container-xxl py-5">--}}
{{--        <div class="container">--}}
{{--            <div class="row g-5">--}}
{{--                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">--}}
{{--                    <div--}}
{{--                        class="position-relative overflow-hidden rounded ps-5 pt-5 h-100"--}}
{{--                        style="min-height: 400px"--}}
{{--                    >--}}
{{--                        <img--}}
{{--                            class="position-absolute w-100 h-100"--}}
{{--                            src="client/img/about.jpg"--}}
{{--                            alt=""--}}
{{--                            style="object-fit: cover"--}}
{{--                        />--}}
{{--                        <div--}}
{{--                            class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"--}}
{{--                            style="width: 200px; height: 200px"--}}
{{--                        >--}}
{{--                            <div--}}
{{--                                class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3"--}}
{{--                            >--}}
{{--                                <h1 class="text-white mb-0">25</h1>--}}
{{--                                <h2 class="text-white">Years</h2>--}}
{{--                                <h5 class="text-white mb-0">Experience</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">--}}
{{--                    <div class="h-100">--}}
{{--                        <h1 class="display-6 mb-5">--}}
{{--                            We're Here To Assist You With Exploring Protection--}}
{{--                        </h1>--}}
{{--                        <p class="fs-5 text-primary mb-4">--}}
{{--                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem sed stet--}}
{{--                            lorem sit clita duo justo erat amet--}}
{{--                        </p>--}}
{{--                        <div class="row g-4 mb-4">--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <img--}}
{{--                                        class="flex-shrink-0 me-3"--}}
{{--                                        src="client/img/icon/icon-04-primary.png"--}}
{{--                                        alt=""--}}
{{--                                    />--}}
{{--                                    <h5 class="mb-0">Flexible Insurance Plans</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <img--}}
{{--                                        class="flex-shrink-0 me-3"--}}
{{--                                        src="client/img/icon/icon-03-primary.png"--}}
{{--                                        alt=""--}}
{{--                                    />--}}
{{--                                    <h5 class="mb-0">Money Back Guarantee</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <p class="mb-4">--}}
{{--                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.--}}
{{--                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit,--}}
{{--                            sed stet lorem sit clita duo justo magna dolore erat amet--}}
{{--                        </p>--}}
{{--                        <div class="border-top mt-4 pt-4">--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <img--}}
{{--                                    class="flex-shrink-0 rounded-circle me-3"--}}
{{--                                    src="client/img/profile.jpg"--}}
{{--                                    alt=""--}}
{{--                                />--}}
{{--                                <h5 class="mb-0">Call Us: +012 345 6789</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container-xxl py-5" dir="ltr">
        <div class="container">
            <div class="row g-5">
                {{-- Left side image --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px">
                        <img class="position-absolute w-100 h-100" src="{{ asset('storage/' . $about->main_image) }}" alt="about image" style="object-fit: cover" />
                        <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3" style="width: 200px; height: 200px">
                            <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                                <h1 class="text-white mb-0">{{ $about->experience_years }}</h1>
                                <h2 class="text-white">{{ json_decode($about->experience_text_top)->en ?? '' }}</h2>
                                <h5 class="text-white mb-0">{{ json_decode($about->experience_text_bottom)->en ?? '' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right side text --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6 mb-5">{{ json_decode($about->title)->en ?? '' }}</h1>
                        <p class="fs-5 text-primary mb-4">{{ json_decode($about->subtitle)->en ?? '' }}</p>

                        <div class="row g-4 mb-4">
                            @foreach($about->icons as $icon)
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 me-3" src="{{ asset('storage/' . $icon->icon_image) }}" alt="icon" />
                                        <h5 class="mb-0">{{ json_decode($icon->icon_title)->en ?? '' }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <p class="mb-4">{{ json_decode($about->final_paragraph)->en ?? '' }}</p>

                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 rounded-circle me-3" src="{{ asset('storage/' . $about->call_us_image) }}" alt="" />
                                <h5 class="mb-0">Call Us: {{ json_decode($about->call_us_text)->en ?? '' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->
    <div class="container-fluid overflow-hidden my-5 px-lg-0 text-center">
        <div class="container facts px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 facts-text wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 px-4 ps-lg-0">
                        <h1 class="text-white mb-4">For Individuals And Organisations</h1>
                        <p class="text-light mb-5">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit,
                            sed stet lorem sit clita duo justo magna dolore erat amet
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
                                <h1 class="display-5" data-toggle="counter-up">1234</h1>
                                <p class="fs-5 text-primary">Active Installation Center</p>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="display-5" data-toggle="counter-up">1234</h1>
                                <p class="fs-5 text-primary">Projects Succeed</p>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="display-5" data-toggle="counter-up">1234</h1>
                                <p class="fs-5 text-primary">Awards Achieved</p>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="display-5" data-toggle="counter-up">1234</h1>
                                <p class="fs-5 text-primary">Team Members</p>
                            </div>
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

    <!-- Service Start -->
    <div class="container-xxl py-5">
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
    <!-- Service End -->

    <!-- Appointment Start -->
    @php $locale = app()->getLocale(); @endphp

    <div class="container-fluid appointment my-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-white mb-5">
                        @if($locale == 'fa')
                            ما تولیدکننده مولد اکسیژن بیمارستانی هستیم
                        @else
                            We're a Hospital Oxygen Generator Manufacturer
                        @endif
                    </h1>
                    <p class="text-white mb-5">
                        @if($locale == 'fa')
                            شرکت اطلسین تولیدکننده‌ی تجهیزات پزشکی با تمرکز ویژه بر روی سیستم‌های مولد اکسیژن بیمارستانی است. این شرکت با بهره‌گیری از فناوری روز، راهکارهای نوین و مطابق با استانداردهای بین‌المللی، در راستای تأمین اکسیژن پایدار و مطمئن برای مراکز درمانی فعالیت می‌کند.
                        @else
                            Atlasin Company is a medical equipment manufacturer specializing in hospital oxygen generator systems. By utilizing cutting-edge technology and adhering to international standards, the company provides reliable and efficient oxygen solutions for healthcare facilities.
                        @endif
                    </p>
                    <div class="bg-white rounded p-3" style="direction: rtl">
                        <div class="d-flex align-items-center bg-primary rounded p-3">
                            <h5 class="text-white ">
                                @if($locale == 'fa')
                                    تماس با ما :  02188725435
                                @else
                                    Call Us: +98 2188725435
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>

                {{-- فرم --}}
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-5">
                        <form action="{{ route('clients.contact.store') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" required />
                                        <label for="name">{{ $locale == 'fa' ? 'نام شما' : 'Your Name' }}</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required />
                                        <label for="email">{{ $locale == 'fa' ? 'ایمیل شما' : 'Your Email' }}</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" required />
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
                                    <div class="form-floating" >
                                        <textarea class="form-control" name="message" id="message" placeholder="Message" style="height: 80px"></textarea>
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
{{--                        <img class="img-fluid" src="img/team-2.jpg" alt="" />--}}
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
{{--                        <img class="img-fluid" src="img/team-3.jpg" alt="" />--}}
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
{{--                        <img class="img-fluid" src="img/team-4.jpg" alt="" />--}}
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
{{--    <div class="container-xxl py-5">--}}
{{--        <div class="container">--}}
{{--            <div class="text-center mx-auto" style="max-width: 500px">--}}
{{--                <h1 class="display-6 mb-5">{{ $locale == 'fa' ? 'اعضای تیم حرفه‌ای ما را بشناسید' : 'Meet Our Professional Team Members' }}</h1>--}}
{{--            </div>--}}
{{--            <div class="row g-4">--}}
{{--                @foreach($members as $member)--}}
{{--                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 1 }}s">--}}
{{--                        <div class="team-item rounded overflow-hidden shadow-sm">--}}
{{--                            <img class="img-fluid w-100" src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">--}}
{{--                            <div class="text-center p-3 bg-light">--}}
{{--                                <h5 class="mb-1">{{ $member->getTranslation('name', $locale) }}</h5>--}}
{{--                                <small class="text-muted d-block">{{ $member->getTranslation('position', $locale) }}</small>--}}
{{--                            </div>--}}
{{--                            <div class="team-text text-center bg-white p-3">--}}
{{--                                <div class="d-flex flex-column align-items-center">--}}
{{--                                    @if($member->email)--}}
{{--                                        <a class="btn btn-sm btn-outline-secondary w-100 mb-1" href="mailto:{{ $member->email }}">--}}
{{--                                            <i class="fas fa-envelope me-1"></i> {{ $member->email }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}

{{--                                    @if($member->mobile)--}}
{{--                                        <a class="btn btn-sm btn-outline-secondary w-100 mb-1" href="tel:{{ $member->mobile }}">--}}
{{--                                            <i class="fas fa-phone me-1"></i> {{ $member->mobile }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}

{{--                                    @if($member->internal_number)--}}
{{--                                        <span class="btn btn-sm btn-outline-secondary w-100 mb-1">--}}
{{--                                        <i class="fas fa-building me-1"></i> داخلی: {{ $member->internal_number }}--}}
{{--                                    </span>--}}
{{--                                    @endif--}}

{{--                                    @if($member->linkedin_url)--}}
{{--                                        <a class="btn btn-sm btn-outline-primary w-100" href="{{ $member->linkedin_url }}" target="_blank">--}}
{{--                                            <i class="fab fa-linkedin-in me-1"></i> LinkedIn--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
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
                <h2 class="fw-bold">Our customers </h2>
                <p class="text-muted">Hospitals that have trusted us</p>
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

    @if(isset($globalFaqs) ? $globalFaqs->count() : (isset($faqs) && $faqs->count()))
        @php
            $list = isset($globalFaqs) ? $globalFaqs : $faqs;
            $dir = $locale=='fa' ? 'rtl' : 'ltr';
            $alignQ = $locale=='fa' ? 'text-center' : 'text-center';
            $alignA = $alignQ;
        @endphp

        <section class="container my-5" dir="{{ $dir }}">
            <h3 class="fw-bold mb-4 {{ $alignQ }}"  style="text-align:center;!important">
                {{ $locale=='fa' ? 'سؤالات متداول' : 'Frequently Asked Questions' }}
            </h3>

            <div class="accordion bg-primary" id="faqAccordion">
                @foreach($list as $i => $f)
                    @php
                        $q = $f->question[$locale] ?? ($f->question['fa'] ?? $f->question['en'] ?? '');
                        $a = $f->answer[$locale]   ?? ($f->answer['fa']   ?? $f->answer['en']   ?? '');
                    @endphp
                    <div class="accordion-item shadow-sm mb-2 rounded bg-primary">
                        <h2 class="accordion-header" id="faq-h-{{ $i }}">
                            <button class="accordion-button collapsed {{ $alignQ }}" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq-c-{{ $i }}"
                                    aria-expanded="false"
                                    aria-controls="faq-c-{{ $i }}">
                                {!! $q !!}
                            </button>
                        </h2>
                        <div id="faq-c-{{ $i }}" class="accordion-collapse collapse" aria-labelledby="faq-h-{{ $i }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body {{ $alignA }}" style="line-height:1.9">
                                {!! $a !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <style>
            .accordion-button { font-weight:600; }
            .accordion-button:focus { box-shadow: none; }
            .accordion-item { border: 1px solid #e9ecef; }
        </style>
    @endif



@endsection
