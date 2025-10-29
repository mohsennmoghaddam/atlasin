@extends('Admin    .layout.master')

@section('content')
    <div class="container mt-5">
        <h4>ایجاد دسته‌بندی جدید</h4>

        <form action="{{ route('gallery-categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>عنوان فارسی</label>
                <input type="text" name="name[fa]" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>عنوان انگلیسی</label>
                <input type="text" name="name[en]" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>تصویر شاخص</label>
                <input type="file" name="cover_image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">ذخیره</button>
            <a href="{{ route('gallery-categories.index') }}" class="btn btn-secondary">بازگشت</a>
        </form>
    </div>
@endsection
