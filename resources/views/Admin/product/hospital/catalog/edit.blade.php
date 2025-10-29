@extends('Admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">ویرایش کاتالوگ</h4>

        <form action="{{ route('hospital-catalogs.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">کتگوری</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ $c->id==$item->category_id ? 'selected':'' }}>
                            {{ $c->title['fa'] ?? $c->title['en'] ?? $c->slug }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">عنوان (FA)</label>
                    <input type="text" name="title[fa]" class="form-control" value="{{ $item->title['fa'] ?? '' }}"
                           required>
                </div>
                <div class="col-md-6 mb-3" dir="ltr">
                    <label class="form-label">Title (EN)</label>
                    <input type="text" name="title[en]" class="form-control" value="{{ $item->title['en'] ?? '' }}"
                           required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">فایل PDF</label>
                @if($item->file)
                    <div class="mb-2">
                        <a class="btn btn-outline-primary btn-sm" target="_blank"
                           href="{{ asset('storage/'.$item->file) }}">نمایش فایل فعلی</a>
                    </div>
                @endif
                <input type="file" name="file" class="form-control" accept="application/pdf">
                <small class="text-muted d-block mt-1">در صورت انتخاب فایل جدید، جایگزین قبلی می‌شود.</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">ترتیب</label>
                    <input type="number" name="order" class="form-control" value="{{ $item->order }}" min="1">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label d-block">وضعیت</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                               id="st" {{ $item->is_active?'checked':'' }}>
                        <label class="form-check-label" for="st">فعال</label>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary">بروزرسانی</button>
        </form>
    </div>
@endsection
