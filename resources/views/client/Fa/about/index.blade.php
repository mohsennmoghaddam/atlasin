@extends('client.Fa.layout.master')

@section('content')

    <!-- Page Header Start -->
    <div
        class="container-fluid page-header py-5 mb-5 wow fadeIn"
        data-wow-delay="0.1s"
    >
        <div class="container py-5">
            <h1 class="display-4 animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<!-- About Start -->
    <div class="container-xxl py-5">
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
<div class="container-fluid overflow-hidden my-5 px-lg-0">
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
                    <a href="" class="align-self-start btn btn-secondary py-3 px-5"
                    >More Details</a
                    >
                </div>
            </div>
            <div class="col-lg-6 facts-counter wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 px-4 pe-lg-0">
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <h1 class="display-5" data-toggle="counter-up">1234</h1>
                            <p class="fs-5 text-primary">Happy Clients</p>
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

<!-- Team Start -->
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

@endsection
