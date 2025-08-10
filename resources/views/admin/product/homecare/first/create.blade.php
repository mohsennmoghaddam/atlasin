@extends('admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <h3 class="text-center mt-5">ایجاد بخش معرفی محصولات خانگی</h3>

        <form action="{{ route('homecare.store') }}" method="POST">
            @csrf

            {{-- عنوان فارسی --}}
            <div class="mb-3">
                <label class="form-label">عنوان (فارسی)</label>
                <input type="text" name="title[fa]" class="form-control" required>
            </div>

            {{-- عنوان انگلیسی --}}
            <div class="mb-3">
                <label class="form-label">Title (English)</label>
                <input type="text" name="title[en]" class="form-control" required>
            </div>

            {{-- متن فارسی --}}
            <div class="mb-3">
                <label class="form-label">متن (فارسی)</label>
                <textarea name="body[fa]" class="form-control" rows="4" required></textarea>
            </div>

            {{-- متن انگلیسی --}}
            <div class="mb-3">
                <label class="form-label">Body (English)</label>
                <textarea name="body[en]" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>
    </div>
@endsection
