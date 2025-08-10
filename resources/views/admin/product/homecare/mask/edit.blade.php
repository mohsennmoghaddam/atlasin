@extends('admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-4">ویرایش گروه ماسک</h4>

        <form action="{{ route('homecare-mask-categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>عنوان (فارسی)</label>
                    <input type="text" name="title[fa]" class="form-control" value="{{ $category->title['fa'] ?? '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Title (English)</label>
                    <input type="text" name="title[en]" class="form-control" value="{{ $category->title['en'] ?? '' }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label>ترتیب نمایش</label>
                <input type="number" name="order" class="form-control" value="{{ $category->order }}" min="1">
            </div>

            <hr>
            <h6 class="mb-3">تصاویر موجود</h6>

            @forelse($category->items as $idx => $it)
                <div class="d-flex align-items-center border rounded p-2 mb-2">
                    <img src="{{ asset('storage/'.$it->image) }}" class="rounded-circle me-3" width="70" height="70" style="object-fit:cover">
                    <input type="hidden" name="items[{{ $idx }}][id]" value="{{ $it->id }}">
                    <div class="me-2">
                        <label class="mb-1 small">ترتیب</label>
                        <input type="number" name="items[{{ $idx }}][order]" class="form-control" value="{{ $it->order }}" min="1">
                    </div>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" name="items[{{ $idx }}][_delete]" value="1" id="del{{ $it->id }}">
                        <label class="form-check-label text-danger" for="del{{ $it->id }}">حذف</label>
                    </div>
                </div>
            @empty
                <p class="text-muted">هنوز تصویری ثبت نشده است.</p>
            @endforelse

            <div class="mb-3 mt-3">
                <label>افزودن تصاویر جدید (چندتایی)</label>
                <input type="file" name="images[]" class="form-control" multiple accept="image/*">
            </div>

            <button class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>
@endsection
<?php
