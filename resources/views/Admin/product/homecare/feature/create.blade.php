@extends('Admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-4">ایجاد فلش‌کارت محصول</h4>

        <form action="{{ route('homecare-features.store') }}" method="POST"
              enctype="multipart/form-data" id="feature-form" novalidate>
            @csrf

            {{-- نام محصول --}}
            <div class="mb-3">
                <label>نام محصول (FA)</label>
                <textarea id="title-fa" name="title[fa]" class="form-control" rows="2"></textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label>Product Name (EN)</label>
                <textarea id="title-en" name="title[en]" class="form-control" rows="2"></textarea>
            </div>

            {{-- متن کوتاه زیر عنوان --}}
            <div class="mb-3">
                <label>متن کوتاه (FA)</label>
                <textarea id="intro-fa" name="intro[fa]" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label>Intro (EN)</label>
                <textarea id="intro-en" name="intro[en]" class="form-control" rows="3"></textarea>
            </div>

            {{-- تصویر بزرگ دایره‌ای --}}
            <div class="mb-3">
                <label>تصویر محصول</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            {{-- مدل دستگاه --}}
            <div class="mb-3">
                <label>مدل دستگاه (FA)</label>
                <textarea id="model-fa" name="model_title[fa]" class="form-control" rows="2"></textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label>Device Model (EN)</label>
                <textarea id="model-en" name="model_title[en]" class="form-control" rows="2"></textarea>
            </div>

            {{-- مشخصات/توضیحات --}}
            <div class="mb-3">
                <label>مشخصات / توضیحات (FA)</label>
                <textarea id="specs-fa" name="specs[fa]" class="form-control" rows="6"></textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label>Specs (EN)</label>
                <textarea id="specs-en" name="specs[en]" class="form-control" rows="6"></textarea>
            </div>

            {{-- کاتالوگ --}}
            <div class="mb-3">
                <label>آپلود کاتالوگ</label>
                <input type="file" name="catalog" class="form-control" accept=".pdf,.doc,.docx">
            </div>

            {{-- ترتیب --}}
            <div class="mb-3">
                <label>ترتیب نمایش</label>
                <input type="number" name="order" class="form-control" value="1" min="1">
            </div>

            <button type="submit" class="btn btn-success">ذخیره</button>
        </form>
    </div>

    <style>.ck-editor__editable {
            min-height: 180px
        }</style>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        // ادیتورهای همه‌ی فیلدها
        let ed = {};
        const ids = ['title-fa', 'title-en', 'intro-fa', 'intro-en', 'model-fa', 'model-en', 'specs-fa', 'specs-en'];

        (async () => {
            for (const id of ids) {
                ed[id] = await ClassicEditor.create(document.querySelector('#' + id), {
                    language: {ui: id.endsWith('-fa') ? 'fa' : 'en', content: id.endsWith('-fa') ? 'fa' : 'en'}
                });
            }
        })().catch(console.error);

        // پیش از ارسال، مقدار ادیتورها را داخل textarea بریز
        document.getElementById('feature-form').addEventListener('submit', () => {
            for (const id of ids) {
                if (ed[id]) document.getElementById(id).value = ed[id].getData();
            }
        });
    </script>
@endsection
