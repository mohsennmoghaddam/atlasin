@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="card shadow rounded-3">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">افزودن آیتم جدید</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('gallery_items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">عنوان فارسی</label>
                            <input type="text" name="title[fa]" value="{{ old('title.fa') }}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">عنوان انگلیسی</label>
                            <input type="text" name="title[en]" value="{{ old('title.en') }}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">دسته‌بندی</label>
                            <select name="gallery_category_id" class="form-select" required>
                                <option value="">انتخاب دسته‌بندی</option>
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{ $cat->name['fa'] ?? $cat->name['en'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">ترتیب نمایش</label>
                            <input type="number" name="order" class="form-control" value="1" min="1">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">عکس آیتم <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">فایل (PDF اختیاری)</label>
                            <input type="file" name="file" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">توضیح فارسی</label>
                            <textarea name="caption[fa]" rows="3" class="form-control">{{ old('caption.fa') }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">توضیح انگلیسی</label>
                            <textarea name="caption[en]" rows="3" class="form-control">{{ old('caption.en') }}</textarea>
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button class="btn btn-success">ذخیره</button>
                        <a href="{{ route('gallery_items.index') }}" class="btn btn-secondary">بازگشت</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

