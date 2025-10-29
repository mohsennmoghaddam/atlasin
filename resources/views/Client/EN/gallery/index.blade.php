@extends('Client.EN.layout.master')

@section('content')
    @php
        // Helper to translate fields dynamically
        $tr = fn($v) => is_array($v) ? ($v[$locale] ?? ($v['en'] ?? ($v['fa'] ?? ''))) : $v;
    @endphp

    <div class="container-xxl py-5">
        <div class="container position-relative">

            {{-- 🎯 Category Filter --}}
            <div class="position-absolute top-0 end-0 mt-2 me-2">
                <select id="categoryFilter" class="form-select form-select-sm shadow-sm" style="width:180px;">
                    <option value="all">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}">{{ $tr($cat->name) }}</option>
                    @endforeach
                </select>
            </div>

            <h2 class="text-center fw-bold mb-5">Gallery Categories</h2>

            {{-- 🖼️ Gallery Grid --}}
            <div id="galleryGrid" class="row g-2 justify-content-center">
                @foreach($categories as $cat)
                    <div class="col-6 col-md-3 gallery-item" data-category="{{ $cat->slug }}">
                        <a href="{{ route('clients.gallery_items.category', ['locale' => $locale, 'slug' => $cat->slug]) }}"
                           class="text-decoration-none d-block position-relative overflow-hidden rounded shadow-sm">

                            {{-- Image --}}
                            <img src="{{ asset('storage/' . ($cat->cover_image ?? ($cat->galleries->first()->image ?? 'default.jpg'))) }}"
                                 alt="{{ $tr($cat->name) }}"
                                 class="gallery-image">

                            {{-- Overlay with title --}}
                            <div class="gallery-overlay d-flex align-items-center justify-content-center">
                                <h6 class="text-white fw-bold m-0">{{ $tr($cat->name) }}</h6>
                            </div>

                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- 🎨 Styles --}}
    <style>
        .gallery-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform .4s ease;
            display: block;
        }
        .gallery-item:hover .gallery-image {
            transform: scale(1.1);
        }

        /* Overlay effect */
        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity .4s ease;
        }
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
    </style>

    {{-- ⚙️ JavaScript for category filter --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filter = document.getElementById('categoryFilter');
            const items = document.querySelectorAll('.gallery-item');

            filter.addEventListener('change', function () {
                const value = this.value;

                items.forEach(item => {
                    if (value === 'all' || item.dataset.category === value) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
