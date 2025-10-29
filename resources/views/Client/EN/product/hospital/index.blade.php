@extends('Client.EN.layout.master')
@section('content')

    <div class="container my-5" dir="ltr">
        @if($textSections && $textSections->count() > 0)
            @foreach($textSections as $section)
                @php
                    $title = $section->title[$locale] ?? '';
                    $body  = $section->body[$locale] ?? '';
                @endphp

                <section class="py-5 text-center">
                    <div class="mx-auto" style="max-width: 900px;">
                        @if($title)
                            <h2 class="fw-bold mb-3">{!! $title !!}</h2>
                        @endif
                        <div class="text-center" style="line-height: 1.9; text-align: justify;">
                            <span style="text-align:justify;">{!! $body !!}</span>
                        </div>
                    </div>
                </section>
            @endforeach
        @else
            <p class="text-center text-muted">No sections found.</p>
        @endif
    </div>

    @php $title = $category->title['en'] ?? ''; $subtitle = $category->subtitle['en'] ?? ''; @endphp
    <div class="container my-5" dir="rtl">
        <h3 class="fw-bold text-center mb-4">Hospital product</h3>
        <div class="row g-4 justify-content-center">
            @foreach($categories as $cat)
                @php
                    $title = $cat->title['en'] ?? '';
                    $subtitle = $cat->subtitle['en'] ?? '';
                @endphp

                <div class="col-6 col-md-3">
                    <a href="{{ route('clients.hospital.category', $cat->slug) }}" class="text-decoration-none d-block">
                        <div class="position-relative mx-auto icon-card">
                            <img src="{{ asset('storage/'.$cat->icon) }}" alt=""
                                 class="w-100 h-100 rounded-circle object-cover shadow">
                            <div class="icon-overlay rounded-circle d-flex flex-column justify-content-center align-items-center text-white text-center p-3">
                                <div class="fw-bold mb-1" style="font-size:1.05rem">{{ $title }}</div>
                                @if($subtitle)
                                    <div class="small opacity-75">{{ $subtitle }}</div>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .icon-card {
            width: 180px;
            height: 180px;
        }

        .object-cover {
            object-fit: cover;
        }

        .icon-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            opacity: 0;
            transition: opacity .25s ease;
        }

        .icon-card:hover .icon-overlay {
            opacity: 1;
        }
    </style>

@endsection
