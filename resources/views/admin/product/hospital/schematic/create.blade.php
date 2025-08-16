@extends('admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">افزودن شماتیک کتگوری</h4>

        <form action="{{ route('hospital-schematics.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">کتگوری</label>
                <select name="category_id" class="form-control" required>
                    <option value="">انتخاب کنید...</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->title['fa'] ?? $c->title['en'] ?? $c->slug }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">تصویر شماتیک/بنر</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">ترتیب نمایش</label>
                    <input type="number" name="order" class="form-control" value="1" min="1">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label d-block">وضعیت</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked id="st">
                        <label class="form-check-label" for="st">فعال</label>
                    </div>
                </div>
            </div>

            <button class="btn btn-success">ذخیره</button>
        </form>
    </div>
@endsection
