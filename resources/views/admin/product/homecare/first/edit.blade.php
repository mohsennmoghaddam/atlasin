
{{-- edit.blade.php --}}
@extends('admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <h3 class="text-center mt-5">ویرایش بخش معرفی محصولات خانگی</h3>

        <form action="{{ route('homecare.update', $homecare) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- عنوان فارسی --}}
            <div class="mb-3">
                <label class="form-label">عنوان (فارسی)</label>
                <input type="text" name="title[fa]" class="form-control" value="{{ old('title.fa', $homecare->title['fa'] ?? '') }}" required>
            </div>

            {{-- عنوان انگلیسی --}}
            <div class="mb-3">
                <label class="form-label">Title (English)</label>
                <input type="text" name="title[en]" class="form-control" value="{{ old('title.en', $homecare->title['en'] ?? '') }}" required>
            </div>

            {{-- متن فارسی --}}
            <div class="mb-3">
                <label class="form-label">متن (فارسی)</label>
                <textarea name="body[fa]" class="form-control" rows="4" required>{{ old('body.fa', $homecare->body['fa'] ?? '') }}</textarea>
            </div>

            {{-- متن انگلیسی --}}
            <div class="mb-3">
                <label class="form-label">Body (English)</label>
                <textarea name="body[en]" class="form-control" rows="4" required>{{ old('body.en', $homecare->body['en'] ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>
@endsection
