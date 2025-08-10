@extends('admin.layout.master')

@section('content')
    <div class="container mt-5" dir="rtl">
        <h3 class="text-center">ویرایش اسلاید</h3>

        <form action="{{ route('homecare-sliders.update', $homecare_slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">تصویر فعلی</label><br>
                <img src="{{ asset('storage/' . $homecare_slider->image) }}" width="150" class="mb-3 rounded">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">عنوان (فارسی)</label>
                <input type="text" name="title[fa]" value="{{ $homecare_slider->title['fa'] ?? '' }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">عنوان (English)</label>
                <input type="text" name="title[en]" value="{{ $homecare_slider->title['en'] ?? '' }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">زیرعنوان (فارسی)</label>
                <input type="text" name="subtitle[fa]" value="{{ $homecare_slider->subtitle['fa'] ?? '' }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">زیرعنوان (English)</label>
                <input type="text" name="subtitle[en]" value="{{ $homecare_slider->subtitle['en'] ?? '' }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">لینک</label>
                <input type="url" name="link" value="{{ $homecare_slider->link }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">ویرایش اسلاید</button>
        </form>
    </div>
@endsection
