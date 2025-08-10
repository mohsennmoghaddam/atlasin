{{-- resources/views/admin/product/homecare/text/create.blade.php --}}
@extends('admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">ایجاد سکشن متن جدید</h4>

        <form action="{{ route('homecare-texts.store') }}" method="POST" id="homecare-text-form">
            @csrf

            <div class="mb-3">
                <label class="form-label">کلید (مثال: post_cards_text)</label>
                <input type="text" name="key" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">عنوان (فارسی)</label>
                    <input type="text" name="title[fa]" class="form-control">
                </div>
                <div class="col-md-6 mb-3" dir="ltr">
                    <label class="form-label">Title (English)</label>
                    <input type="text" name="title[en]" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">متن (فارسی)</label>
                <textarea name="body[fa]" id="editor-fa" class="form-control" rows="6">{{ old('body.fa') }}</textarea>
            </div>

            <div class="mb-3" dir="ltr">
                <label class="form-label">Body (English)</label>
                <textarea name="body[en]" id="editor-en" class="form-control" rows="6">{{ old('body.en') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">ترتیب نمایش</label>
                <input type="number" name="order" class="form-control" value="1" min="1">
            </div>

            <button type="submit" class="btn btn-success">ذخیره</button>
        </form>
    </div>

    <style>.ck-editor__editable{min-height:260px}</style>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        let editorFa, editorEn;

        ClassicEditor.create(document.querySelector('#editor-fa'), {
            language: { ui: 'fa', content: 'fa' }
        }).then(ed => editorFa = ed).catch(console.error);

        ClassicEditor.create(document.querySelector('#editor-en'), {
            language: { ui: 'en', content: 'en' }
        }).then(ed => editorEn = ed).catch(console.error);

        // قبل از ارسال فرم، مقدار ادیتورها را داخل textarea بریز
        document.getElementById('homecare-text-form').addEventListener('submit', function(e){
            if (editorFa) document.querySelector('#editor-fa').value = editorFa.getData();
            if (editorEn) document.querySelector('#editor-en').value = editorEn.getData();
        });
    </script>
@endsection
