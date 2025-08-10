{{-- resources/views/admin/product/homecare/feature/edit.blade.php --}}
@extends('admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-4">ویرایش فلش‌کارت محصول</h4>

        <form action="{{ route('homecare-features.update', $homecare_feature) }}"
              method="POST" enctype="multipart/form-data" id="feature-form" novalidate>
            @csrf @method('PUT')

            {{-- نام محصول --}}
            <div class="mb-3">
                <label>نام محصول (FA)</label>
                <textarea id="title-fa" name="title[fa]" class="form-control" rows="2">{!! old('title.fa', $homecare_feature->title['fa'] ?? '') !!}</textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label>Product Name (EN)</label>
                <textarea id="title-en" name="title[en]" class="form-control" rows="2">{!! old('title.en', $homecare_feature->title['en'] ?? '') !!}</textarea>
            </div>

            {{-- متن کوتاه --}}
            <div class="mb-3">
                <label>متن کوتاه (FA)</label>
                <textarea id="intro-fa" name="intro[fa]" class="form-control" rows="3">{!! old('intro.fa', $homecare_feature->intro['fa'] ?? '') !!}</textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label>Intro (EN)</label>
                <textarea id="intro-en" name="intro[en]" class="form-control" rows="3">{!! old('intro.en', $homecare_feature->intro['en'] ?? '') !!}</textarea>
            </div>

            {{-- تصویر --}}
            <div class="mb-3">
                <label class="d-block">تصویر فعلی</label>
                @if($homecare_feature->image)
                    <img src="{{ asset('storage/'.$homecare_feature->image) }}" class="rounded-circle mb-2" width="120" height="120" alt="current">
                @else
                    <span class="text-muted d-block mb-2">ثبت نشده</span>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            {{-- مدل دستگاه --}}
            <div class="mb-3">
                <label>مدل دستگاه (FA)</label>
                <textarea id="model-fa" name="model_title[fa]" class="form-control" rows="2">{!! old('model_title.fa', $homecare_feature->model_title['fa'] ?? '') !!}</textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label>Device Model (EN)</label>
                <textarea id="model-en" name="model_title[en]" class="form-control" rows="2">{!! old('model_title.en', $homecare_feature->model_title['en'] ?? '') !!}</textarea>
            </div>

            {{-- مشخصات --}}
            <div class="mb-3">
                <label>مشخصات / توضیحات (FA)</label>
                <textarea id="specs-fa" name="specs[fa]" class="form-control" rows="6">{!! old('specs.fa', $homecare_feature->specs['fa'] ?? '') !!}</textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label>Specs (EN)</label>
                <textarea id="specs-en" name="specs[en]" class="form-control" rows="6">{!! old('specs.en', $homecare_feature->specs['en'] ?? '') !!}</textarea>
            </div>

            {{-- کاتالوگ --}}
            <div class="mb-3">
                <label class="d-block">کاتالوگ فعلی</label>
                @if($homecare_feature->catalog)
                    <a class="btn btn-info btn-sm mb-2" target="_blank" href="{{ asset('storage/'.$homecare_feature->catalog) }}">دانلود کاتالوگ</a>
                @else
                    <span class="text-muted d-block mb-2">ثبت نشده</span>
                @endif
                <input type="file" name="catalog" class="form-control" accept=".pdf,.doc,.docx">
            </div>

            {{-- ترتیب --}}
            <div class="mb-3">
                <label>ترتیب نمایش</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $homecare_feature->order ?? 1) }}" min="1">
            </div>

            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>

    <style>.ck-editor__editable{min-height:180px}</style>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        // همه فیلدهای ادیتوری
        let ed = {};
        const ids = ['title-fa','title-en','intro-fa','intro-en','model-fa','model-en','specs-fa','specs-en'];

        (async () => {
            for (const id of ids) {
                ed[id] = await ClassicEditor.create(document.querySelector('#'+id), {
                    language: { ui: id.endsWith('-fa') ? 'fa' : 'en', content: id.endsWith('-fa') ? 'fa' : 'en' }
                });
            }
        })().catch(console.error);

        // قبل از ارسال فرم، مقدار ادیتورها را داخل textarea بریز
        document.getElementById('feature-form').addEventListener('submit', () => {
            for (const id of ids) {
                if (ed[id]) document.getElementById(id).value = ed[id].getData();
            }
        });
    </script>
@endsection
