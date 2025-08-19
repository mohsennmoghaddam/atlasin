@extends('client.ّّEn.layout.master')

@section('content')
    @php
        $t = fn($arr) => is_array($arr) ? ($arr[$locale] ?? ($arr['fa'] ?? ($arr['en'] ?? ''))) : $arr;
        $title = $t($blog->title);
        $short = $t($blog->short_description);
        $content = $t($blog->content);
        $cover = $blog->image ? asset('storage/'.$blog->image) : asset('client/img/hero.jpg');
    @endphp

    <style>
        .post-cover {
            height: 380px; border-radius: 16px; object-fit: cover; width: 100%;
        }
        .post-meta .badge { margin-{{ app()->getLocale()==='fa' ? 'left' : 'right' }}: .25rem; }
        .content img { max-width:100%; height:auto; border-radius:8px; }
    </style>

    <div class="container-xxl py-5">
        <div class="container" @if($locale==='fa') dir="rtl" @endif>

            {{-- عنوان --}}
            <div class="text-center mb-4">
                <h1 class="fw-bold" style="line-height:1.4">{{ strip_tags($title) }}</h1>
                <div class="text-muted small mt-2">
                    {{ $blog->published_at ? $blog->published_at->format('Y/m/d') : '' }}
                    @if($blog->author) · {{ $blog->author->name }} @endif
                </div>
            </div>

            {{-- کاور --}}
            <div class="mb-4">
                <img src="{{ $cover }}" alt="{{ strip_tags($title) }}" class="post-cover shadow-sm">
            </div>

            {{-- متا: کتگوری‌ها --}}
            <div class="post-meta mb-3">
                @foreach($blog->categories as $c)
                    <span class="badge bg-primary bg-opacity-10 text-primary">{{ $t($c->name) }}</span>
                @endforeach
            </div>

            {{-- خلاصه --}}
            @if($short)
                <p class="lead text-muted">{{ strip_tags($short) }}</p>
            @endif

            {{-- متن کامل --}}
            <article class="content mt-3">
                {!! $content !!}
            </article>

            {{-- اشتراک‌گذاری ساده --}}
            <div class="mt-4 d-flex gap-2">
                <a class="btn btn-sm btn-outline-secondary"
                   href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode(strip_tags($title)) }}"
                   target="_blank" rel="noopener">Twitter</a>
                <a class="btn btn-sm btn-outline-secondary"
                   href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                   target="_blank" rel="noopener">Facebook</a>
                <a class="btn btn-sm btn-outline-secondary"
                   href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode(strip_tags($title)) }}"
                   target="_blank" rel="noopener">LinkedIn</a>
            </div>

            {{-- بازگشت --}}
            <div class="mt-4">
                <a href="{{ route('clients.index') }}" class="btn btn-outline-primary">
                    {{ $locale==='fa' ? 'بازگشت به مقالات' : 'Back to articles' }}
                </a>
            </div>

        </div>
    </div>
@endsection
