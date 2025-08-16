@extends('admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">

                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="mb-0"><b>ویرایش تصویر گالری</b></h5>
                        <a href="{{ route('hospital-gallery.index') }}" class="btn btn-light btn-sm">بازگشت</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('hospital-gallery.update', $item) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">کتگوری</label>
                                <select name="category_id" class="form-control" required>
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}" {{ $c->id==$item->category_id?'selected':'' }}>
                                            {{ $c->title['fa'] ?? $c->title['en'] ?? $c->slug }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">عنوان (فارسی)</label>
                                    <input type="text" name="title[fa]" class="form-control" value="{{ $item->title['fa'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3" dir="ltr">
                                    <label class="form-label">Title (EN)</label>
                                    <input type="text" name="title[en]" class="form-control" value="{{ $item->title['en'] ?? '' }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">تصویر فعلی</label>
                                @if($item->image)
                                    <img src="{{ asset('storage/'.$item->image) }}" width="200" class="rounded mb-2" style="object-fit:cover">
                                @endif
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <small class="text-muted">در صورت انتخاب، تصویر جدید جایگزین می‌شود.</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">ترتیب</label>
                                    <input type="number" name="order" class="form-control" value="{{ $item->order }}" min="1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label d-block">وضعیت</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="st" {{ $item->is_active?'checked':'' }}>
                                        <label class="form-check-label" for="st">فعال</label>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary">بروزرسانی</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
