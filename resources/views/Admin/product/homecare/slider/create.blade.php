@extends('Admin.layout.master')

@section('content')
    <div class="container mt-5" dir="rtl">
        <h3 class="text-center">ایجاد اسلاید جدید</h3>

        <form action="{{ route('homecare-sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">تصویر اسلاید</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">عنوان (فارسی)</label>
                <input type="text" name="title[fa]" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">عنوان (English)</label>
                <input type="text" name="title[en]" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">زیرعنوان (فارسی)</label>
                <input type="text" name="subtitle[fa]" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">زیرعنوان (English)</label>
                <input type="text" name="subtitle[en]" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">لینک (اختیاری)</label>
                <input type="url" name="link" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">ثبت اسلاید</button>
        </form>
    </div>
@endsection
