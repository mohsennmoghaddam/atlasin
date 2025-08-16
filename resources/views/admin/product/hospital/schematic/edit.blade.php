@extends('admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">ویرایش شماتیک کتگوری</h4>

        <form action="{{ route('hospital-schematics.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">کتگوری</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $item->category_id ? 'selected' : '' }}>
                            {{ $c->title['fa'] ?? $c->title['en'] ?? $c->slug }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">تصویر فعلی</label>
                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" width="200" class="rounded mb-2" style="object-fit:cover">
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">برای تغییر تصویر، فایل جدید انتخاب کنید.</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">ترتیب نمایش</label>
                    <input type="number" name="order" class="form-control" value="{{ $item->order }}" min="1">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label d-block">وضعیت</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="st" {{ $item->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="st">فعال</label>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>
@endsection
