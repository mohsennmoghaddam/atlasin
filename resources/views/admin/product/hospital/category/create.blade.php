{{-- resources/views/admin/product/hospital/category/create.blade.php --}}
@extends('admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">ایجاد دسته‌بندی بیمارستانی</h4>

        <form action="{{ route('hospital-category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Slug (انگلیسی و یکتا)</label>
                <input type="text" name="slug" class="form-control" placeholder="oxygen, vacuum, agss ..." required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">عنوان (FA)</label>
                    <input type="text" name="title[fa]" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title (EN)</label>
                    <input type="text" name="title[en]" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">زیرعنوان (FA) - اختیاری</label>
                    <input type="text" name="subtitle[fa]" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Subtitle (EN) - optional</label>
                    <input type="text" name="subtitle[en]" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">آیکون (دایره‌ای)</label>
                <input type="file" name="icon" class="form-control" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ترتیب نمایش</label>
                <input type="number" name="order" class="form-control" value="1" min="1">
            </div>

            <button class="btn btn-success">ذخیره</button>
        </form>
    </div>
@endsection
