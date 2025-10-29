@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">

                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="mb-0"><b>افزودن تصاویر گالری</b></h5>
                        <a href="{{ route('hospital-gallery_items.index') }}" class="btn btn-light btn-sm">بازگشت</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('hospital-gallery_items.store') }}" method="POST"
                              enctype="multipart/form-data">
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

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">عنوان (فارسی)</label>
                                    <input type="text" name="title[fa]" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3" dir="ltr">
                                    <label class="form-label">Title (EN)</label>
                                    <input type="text" name="title[en]" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">انتخاب تصاویر (چندتایی)</label>
                                <input type="file" name="images[]" class="form-control" multiple required
                                       accept="image/*">
                                <small class="text-muted">می‌توانید چند تصویر را همزمان انتخاب کنید.</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">ترتیب شروع</label>
                                    <input type="number" name="order" class="form-control" value="1" min="1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label d-block">وضعیت</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                               checked id="st">
                                        <label class="form-check-label" for="st">فعال</label>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success">ذخیره</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
