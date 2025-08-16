@extends('client.Fa.layout.master')
@section('content')


    @if($schematic)
        <section class="container my-5 text-center">
            <img src="{{ asset('storage/'.$schematic->image) }}"
                 class="img-fluid rounded-3 shadow"
                 style="max-height:480px; object-fit:cover; width:100%;" alt="">
        </section>
    @endif

    @if($summary)
        <section class="container my-5" dir="rtl">
            <div class="mx-auto text-center" style="max-width: 900px;">
                @if(!empty($summary->title[$locale]))
                    <h2 class="fw-bold mb-3">{!! $summary->title[$locale] !!}</h2>
                @endif
                <div class="text-black" style="line-height:1.9; text-align:justify;">
                    {!! $summary->body[$locale] ?? '' !!}
                </div>
            </div>
        </section>
    @endif

    @if($stages && $stages->count())
        <section class="container my-5">
            @foreach($stages as $i => $st)
                @php
                    $t = $st->title[$locale] ?? '';
                    $b = $st->body[$locale] ?? '';
                    $reverse = $i % 2 == 0;
                @endphp

                <div class="row g-4 align-items-center mb-5 {{ $reverse ? 'flex-row-reverse' : '' }}" dir="{{ $locale=='fa'?'rtl':'ltr' }}">
                    <div class="col-lg-5 text-center">
                        @if($st->image)
                            <img src="{{ asset('storage/'.$st->image) }}" class="rounded-3 shadow w-100" style="max-height:360px;object-fit:cover" alt="">
                        @endif
                    </div>
                    <div class="col-lg-7">
                        @if($t)
                            <h4 class="fw-bold mb-3 {{ $locale=='fa'?'text-end':'text-start' }}">{!! $t !!}</h4>
                        @endif
                        <div class="{{ $locale=='fa'?'text-secondary text-justify text-end':'text-secondary text-start' }}" style="line-height:1.9;">
                            {!! $b !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @endif

    @if($catalogs && $catalogs->count())
        <section class="container my-5">
            <h3 class="fw-bold mb-4 {{ $locale=='fa'?'text-end':'text-start' }}">
                {{ $locale=='fa' ? 'دانلود کاتالوگ‌ها' : 'Download Catalogs' }}
            </h3>

            <div class="row g-3">
                @foreach($catalogs as $doc)
                    @php $label = $doc->title[$locale] ?? ($doc->title['fa'] ?? $doc->title['en'] ?? 'Catalog'); @endphp
                    <div class="col-md-6 col-lg-4">
                        <div class="d-flex align-items-center justify-content-between border rounded p-3 shadow-sm">
                            <div class="{{ $locale=='fa'?'text-end':'text-start' }} me-2">
                                <div class="fw-semibold">{{ $label }}</div>
                                <small class="text-muted">{{ $locale=='fa'?'فرمت: PDF':'Format: PDF' }}</small>
                            </div>
                            @if($doc->file)
                                <a class="btn btn-outline-primary btn-sm"
                                   href="{{ asset('storage/'.$doc->file) }}"
                                   download>
                                    {{ $locale=='fa'?'دانلود':'Download' }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if($gallery && $gallery->count())
        <section class="container my-5">
            <h3 class="fw-bold mb-4 {{ $locale=='fa'?'text-end':'text-start' }}">
                {{ $locale=='fa' ? 'گالری تصاویر' : 'Gallery' }}
            </h3>

            <div class="row g-4">
                @foreach($gallery as $img)
                    @php
                        $caption = $img->title[$locale] ?? ($img->title['fa'] ?? $img->title['en'] ?? '');
                    @endphp
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="hc-gallery-card position-relative overflow-hidden rounded-3 shadow-sm">
                            <img src="{{ asset('storage/'.$img->image) }}" class="w-100 hc-gallery-img" alt="gallery">
                            <div class="hc-gallery-overlay d-flex flex-column justify-content-center align-items-center text-white text-center p-3">
                                @if($caption)
                                    <div class="fw-semibold mb-2">{!! $caption !!}</div>
                                @endif
                                <button class="btn btn-light btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#galleryModal"
                                        data-src="{{ asset('storage/'.$img->image) }}"
                                        data-title="{{ strip_tags($caption) }}">
                                    {{ $locale=='fa' ? 'نمایش' : 'Preview' }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Modal preview --}}
        <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img src="" class="w-100 rounded-bottom" style="max-height:75vh;object-fit:contain">
                    </div>
                </div>
            </div>
        </div>

        {{-- Styles (فقط این سکشن) --}}
        <style>
            .hc-gallery-card { aspect-ratio: 1 / 1; background:#f7f7f7; }
            .hc-gallery-img { width:100%; height:100%; object-fit:cover; transition: transform .35s ease; display:block; }
            .hc-gallery-overlay {
                position:absolute; inset:0;
                background: linear-gradient(180deg, rgba(0,0,0,.0) 0%, rgba(0,0,0,.55) 100%);
                opacity:0; transition: opacity .25s ease;
            }
            .hc-gallery-card:hover .hc-gallery-img { transform: scale(1.05); }
            .hc-gallery-card:hover .hc-gallery-overlay { opacity:1; }
        </style>

        {{-- Script برای پر کردن مودال --}}
        <script>
            document.getElementById('galleryModal')?.addEventListener('show.bs.modal', function (e) {
                const btn   = e.relatedTarget;
                const src   = btn?.getAttribute('data-src') || '';
                const title = btn?.getAttribute('data-title') || '';
                this.querySelector('.modal-title').textContent = title;
                this.querySelector('img').setAttribute('src', src);
            });
        </script>
    @endif


@endsection
