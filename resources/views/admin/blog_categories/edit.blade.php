@extends('admin.layout.master')

@section('content')
    <div class="container">
        <h4>ویرایش دسته‌بندی</h4>

        <form action="{{ route('blog-categories.update', $blogCategory->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group mb-3">
                <label>نام فارسی</label>
                <input type="text" name="name[fa]" class="form-control" value="{{ $blogCategory->name['fa'] ?? '' }}" required>
            </div>

            <div class="form-group mb-3">
                <label>نام انگلیسی</label>
                <input type="text" name="name[en]" class="form-control" value="{{ $blogCategory->name['en'] ?? '' }}" required>
            </div>

            <button class="btn btn-success">ذخیره تغییرات</button>
        </form>
    </div>
@endsection
