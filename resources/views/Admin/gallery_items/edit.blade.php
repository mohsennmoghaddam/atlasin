@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="card shadow rounded-3">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0">ویرایش آیتم گالری</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('gallery_items.update', $gallery_item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">عنوان فارسی</label>
                            <input type="text" name="title[fa]" value="{{ old('title.fa', $gallery_item->title['fa'] ?? '') }}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">عنوان انگلیسی</label>
                            <input type="text" name="title[en]" value="{{ old('title.en', $gallery_item->title['en'] ?? '') }}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">دسته‌بندی</label>
                            <select name="gallery_category_id" class="form-select" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $gallery_item->gallery_category_id ? 'selected' : '' }}>
                                        {{ $cat->name['fa'] ?? $cat->name['en'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">ترتیب نمایش</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', $gallery_item->order) }}" min="1">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">عکس جدید (در صورت نیاز)</label>
                            <input type="file" name="image" class="form-control">
                            @if($gallery_item->image)
                                <img src="{{ asset('storage/'.$gallery_item->image) }}" alt="" width="120" class="mt-2 rounded shadow-sm">
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">فایل (PDF)</label>
                            <input type="file" name="file" class="form-control">
                            @if($gallery_item->file)
                                <a href="{{ asset('storage/'.$gallery_item->file) }}" target="_blank" class="d-block mt-2 text-primary">دانلود فایل فعلی</a>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">توضیح فارسی</label>
                            <textarea name="caption[fa]" rows="3" class="form-control">{{ old('caption.fa', $gallery_item->caption['fa'] ?? '') }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">توضیح انگلیسی</label>
                            <textarea name="caption[en]" rows="3" class="form-control">{{ old('caption.en', $gallery_item->caption['en'] ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button class="btn btn-warning">بروزرسانی</button>
                        <a href="{{ route('gallery_items.index') }}" class="btn btn-secondary">بازگشت</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

