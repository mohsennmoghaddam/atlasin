@extends('Admin.layout.master')

@section('content')
    <div class="container mt-5" style="direction: rtl">
        <h4>افزودن دسته‌بندی جدید</h4>

        <form action="{{ route('blogs-category.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label>نام فارسی</label>
                <input type="text" name="name[fa]" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>نام انگلیسی</label>
                <input type="text" name="name[en]" class="form-control" required>
            </div>

            <button class="btn btn-success">ذخیره</button>
        </form>
    </div>
@endsection
