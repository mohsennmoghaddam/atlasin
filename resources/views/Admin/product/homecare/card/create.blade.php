@extends('Admin.layout.master')

@section('content')
    <div class="container mt-5" dir="rtl">
        <h4 class="text-center mb-4">ایجاد فلش‌کارت جدید</h4>

        <form action="{{ route('homecare-cards.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- آیکون --}}
            <div class="mb-3">
                <label class="form-label">آیکون کارت</label>
                <input type="file" name="icon" class="form-control" required>
            </div>

            {{-- عنوان --}}
            <div class="mb-3">
                <label class="form-label">عنوان (فارسی)</label>
                <input type="text" name="title[fa]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Title (English)</label>
                <input type="text" name="title[en]" class="form-control" required>
            </div>

            {{-- توضیح --}}
            <div class="mb-3">
                <label class="form-label">توضیح (فارسی)</label>
                <textarea name="description[fa]" rows="3" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Description (English)</label>
                <textarea name="description[en]" rows="3" class="form-control" required></textarea>
            </div>

            {{-- لینک --}}
            <div class="mb-3">
                <label class="form-label">Slug (لینک به محصول)</label>
                <input type="text" name="slug" class="form-control">
            </div>

            <button class="btn btn-success">ثبت کارت</button>
        </form>
    </div>
@endsection
