@extends('client.Fa.layout.master')
@section('content')
    <html lang="fa">
    <section class="py-5 text-center p ">
        <div class="container">
            <h1 class="fw-bold">{{ $title }}</h1>
            <p class="text-muted">{{ $body }}</p>
        </div>
    </section>

    @if($sliders && count($sliders) > 0)
        <div id="homecareCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($sliders as $index => $slider)
                    <div class="carousel-item @if($index === 0) active @endif">
                        <div class="slider-container position-relative" style="height: 500px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $slider->image) }}"
                                 class="w-100 h-100 object-fit-cover"
                                 alt="slider">

                            <div class="carousel-caption d-flex flex-column justify-content-center align-items-{{ app()->getLocale() === 'fa' ? 'end' : 'start' }} text-{{ app()->getLocale() === 'fa' ? 'end' : 'start' }}"
                                 style="background: rgba(0,0,0,0.4); padding: 30px; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                                <h5 class="text-white fw-bold mb-3 fs-2">
                                    {{ $slider->title[app()->getLocale()] ?? '' }}
                                </h5>
                                <p class="text-white mb-4 fs-5">
                                    {{ $slider->subtitle[app()->getLocale()] ?? '' }}
                                </p>
                                @if($slider->link)
                                    <a href="{{ $slider->link }}" class="btn btn-light">
                                        {{ __('بیشتر بدانید') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- کنترل‌ها --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#homecareCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">قبلی</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homecareCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">بعدی</span>
            </button>
        </div>
    @endif
    <style>
        .slider-container img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 768px) {
            .carousel-caption h5 {
                font-size: 1.3rem;
            }

            .carousel-caption p {
                font-size: 1rem;
            }

            .carousel-caption {
                align-items: center !important;
                text-align: center !important;
            }
        }

    </style>


    <div class="container my-4">
        <div class="row justify-content-center">
            @foreach($cards as $card)
                @php
                    $title = json_decode($card->title, true);
                    $description = json_decode($card->description, true);
                    $locale = app()->getLocale();
                @endphp
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="card shadow h-100" style="background-color: #007bff; color: white; border-radius: 10px;">
                        <div class="card-body d-flex align-items-center p-3" style="min-height: 100px;">
                            @if($locale === 'fa')
                                <img src="{{ asset('storage/' . $card->icon) }}" class="rounded-circle ms-3" width="100" height="100" alt="icon">
                                <div class="text-end flex-grow-1">
                                    <h5 class="fw-bold mb-1" style="font-size: 1.3rem;">{{ $title['fa'] ?? '' }}</h5>
                                    <p class="mb-0" style="font-size: 1.2rem;">{{ $description['fa'] ?? '' }}</p>
                                </div>
                            @else
                                <div class="text-start flex-grow-1">
                                    <h6 class="fw-bold mb-1" style="font-size: 0.95rem;">{{ $title['en'] ?? '' }}</h6>
                                    <p class="mb-0" style="font-size: 0.85rem;">{{ $description['en'] ?? '' }}</p>
                                </div>
                                <img src="{{ asset('storage/' . $card->icon) }}" class="rounded-circle ms-3" width="60" height="60" alt="icon">
                            @endif
                        </div>
                        @if($card->slug)
                            <div class="card-footer bg-transparent text-center border-0 pb-2">
                                <a href="{{ $card->slug }}" class="btn btn-light btn-sm px-3 py-1" style="font-size: 0.8rem;">{{ __('مشاهده محصولات') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
    .card h5 {
            font-weight: bold;
        }
        .card img {
            border: 2px solid white;
        }

    </style>


    @if($textAfterCards)
        <section class="container my-5">
            @php $loc = app()->getLocale(); @endphp
            @if(!empty($textAfterCards->title[$loc]))
                <h3 class="mb-3 text-{{ $loc==='fa' ? 'end' : 'start' }}">
                    {{ $textAfterCards->title[$loc] }}
                </h3>
            @endif

            <div class="content-typo">
                {!! $textAfterCards->body[$loc] ?? '' !!}
            </div>
        </section>
    @endif

    @php $loc = app()->getLocale(); @endphp

    @foreach($features as $item)
        <section class="container my-5">
            <div class="row align-items-center g-4 {{ $loc==='fa' ? 'flex-row-reverse' : '' }}">
                <div class="col-lg-5 text-center">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" class="rounded-circle shadow"
                             style="width:320px;height:320px;object-fit:cover" alt="">
                    @endif
                </div>
                <div class="col-lg-7">
                    <h3 class="fw-bold mb-2">{!! $item->title[$loc] ?? '' !!}</h3>
                    <div class="text-muted mb-3">{!! $item->intro[$loc] ?? '' !!}</div>

                    <h5 class="mb-2">{!! $item->model_title[$loc] ?? '' !!}</h5>
                    <div class="mb-3">{!! $item->specs[$loc] ?? '' !!}</div>

                    @if($item->catalog)
                        <a class="btn btn-outline-primary" target="_blank" href="{{ asset('storage/'.$item->catalog) }}">
                            {{ $loc==='fa' ? 'دانلود کاتالوگ محصول' : 'Download Catalog' }}
                        </a>
                    @endif
                </div>
            </div>
        </section>
    @endforeach

    @php
        $locale = app()->getLocale();
        $title = $maskText->title;
        $body  = $maskText->body;
    @endphp
    <section class="my-5 text-center container">
        <h2 class="fw-bold">{{ $title[$locale] ?? '' }}</h2>
        <div class="mt-3">
            {!! $body[$locale] ?? '' !!}
        </div>
    </section>

    @php $loc = app()->getLocale(); @endphp

    @foreach($maskCategories as $cat)
        <section class="container my-5">
            <h3 class="text-center mb-4">{{ $cat->title[$loc] ?? '' }}</h3>

            <div class="row justify-content-center">
                @foreach($cat->items as $item)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">
                        <img src="{{ asset('storage/'.$item->image) }}"
                             alt="mask"
                             class="rounded-circle img-fluid shadow"
                             style="width:150px;height:150px;object-fit:cover;">
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach



@endsection
