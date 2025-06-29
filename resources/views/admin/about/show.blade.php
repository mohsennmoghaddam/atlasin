@extends('admin.layout.master')

@section('content')

    <div class="container" dir="rtl" style="padding-top: 30px;">
        <h4 class="mb-4 text-center text-primary mt-5">
            آیکون‌های مربوط به:
            <br class="mt-5">
            <span class="text-dark m-1">
                فارسی: {{ json_decode($aboutUs->title)->fa ?? '-' }}
            </span>
            <br>
            <span class="text-dark mt-1">
                English: {{ json_decode($aboutUs->title)->en ?? '-' }}
            </span>
        </h4>

        @if($aboutUs->icons->count())
            <div class="row">
                @foreach($aboutUs->icons as $icon)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            {{-- تصویر آیکون --}}
                            @php
                                $imagePath = str_starts_with($icon->icon_image, 'abouts/')
                                    ? asset('storage/' . $icon->icon_image)
                                    : asset($icon->icon_image);
                            @endphp
                            <img src="{{ $imagePath }}" class="card-img-top mt-5" alt="Icon" style="max-height: 200px; object-fit: contain;">

                            {{-- عنوان آیکون --}}
                            <div class="card-body text-center">
                                @php
                                    $title = json_decode($icon->icon_title, true);
                                @endphp
                                <p class="mb-1"><strong>FA:</strong> {{ $title['fa'] ?? '-' }}</p>
                                <p><strong>EN:</strong> {{ $title['en'] ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted text-center">هیچ آیکونی ثبت نشده است.</p>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('about.index') }}" class="btn btn-secondary">بازگشت</a>
        </div>
    </div>
@endsection
