@extends('Admin.layout.master')

@section('content')
    <div class="container mt-5">
        <h4>ویرایش دسته‌بندی</h4>

        <form action="{{ route('gallery-categories.update', $gallery_category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>عنوان فارسی</label>
                <input type="text" name="name[fa]" class="form-control" value="{{ $gallery_category->name['fa'] ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label>عنوان انگلیسی</label>
                <input type="text" name="name[en]" class="form-control" value="{{ $gallery_category->name['en'] ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label>تصویر شاخص</label>
                <input type="file" name="cover_image" class="form-control">
                @if($gallery_category->cover_image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$gallery_category->cover_image) }}" width="120" class="rounded">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">بروزرسانی</button>
            <a href="{{ route('gallery-categories.index') }}" class="btn btn-secondary">بازگشت</a>
        </form>
    </div>
@endsection
