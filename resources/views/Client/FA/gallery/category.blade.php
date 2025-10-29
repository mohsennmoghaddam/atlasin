@extends('Client.FA.layout.master')

@section('content')
    @php
        $tr = fn($v) => is_array($v) ? ($v[$locale] ?? ($v['fa'] ?? ($v['en'] ?? ''))) : $v;
    @endphp

    <div class="container-xxl py-5" dir="rtl">
        <div class="container">
            <h2 class="fw-bold mb-5 text-center">{{ $tr($category->name) }}</h2>

            {{-- 🖼️ گالری تصاویر --}}
            <div class="gallery-grid">
                @foreach($category->galleries as $item)
                    <div class="gallery-card">
                        <img src="{{ asset('storage/'.$item->image) }}"
                             alt="{{ $tr($item->title) }}"
                             class="gallery-img">
                        <div class="gallery-overlay">
                            <span class="gallery-title">{{ $tr($item->title) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('clients.gallery_items.index', ['locale' => $locale]) }}" class="btn btn-outline-primary">
                    بازگشت به دسته‌بندی‌ها
                </a>
            </div>
        </div>
    </div>

    {{-- 🎨 استایل‌ها --}}
    <style>
        /* کانتینر اصلی گالری */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* تعداد ستون‌ها خودکار */
            gap: 20px; /* فاصله بین تصاویر */
        }

        /* کارت هر تصویر */
        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            background-color: #fff;
            transition: transform .3s ease, box-shadow .3s ease;
        }
        .gallery-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 18px rgba(0,0,0,0.2);
        }

        /* خود تصویر */
        .gallery-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        /* لایه نیمه‌شفاف هنگام hover */
        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity .3s ease;
        }
        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        /* عنوان روی تصویر */
        .gallery-title {
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            text-align: center;
        }
    </style>
@endsection
