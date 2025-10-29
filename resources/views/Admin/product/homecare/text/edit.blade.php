{{-- resources/views/Admin/product/homecare/text/edit.blade.php --}}
@extends('Admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">ویرایش سکشن متن</h4>

        <form action="{{ route('homecare-texts.update', $homecare_text) }}" method="POST" id="homecare-text-form"
              novalidate>
            @csrf
            @method('PUT')

            {{-- کلید --}}
            <div class="mb-3">
                <label class="form-label">کلید (مثال: post_cards_text)</label>
                <input type="text" name="key" class="form-control" value="{{ old('key', $homecare_text->key) }}"
                       required>
            </div>

            {{-- عنوان‌ها --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">عنوان (فارسی)</label>
                    <input type="text" name="title[fa]" class="form-control"
                           value="{{ old('title.fa', $homecare_text->title['fa'] ?? '') }}">
                </div>
                <div class="col-md-6 mb-3" dir="ltr">
                    <label class="form-label">Title (English)</label>
                    <input type="text" name="title[en]" class="form-control"
                           value="{{ old('title.en', $homecare_text->title['en'] ?? '') }}">
                </div>
            </div>

            {{-- متن‌ها با CKEditor --}}
            <div class="mb-3">
                <label class="form-label">متن (فارسی)</label>
                <textarea id="editor-fa" name="body[fa]" class="form-control"
                          rows="6">{!! old('body.fa', $homecare_text->body['fa'] ?? '') !!}</textarea>
            </div>

            <div class="mb-3" dir="ltr">
                <label class="form-label">Body (English)</label>
                <textarea id="editor-en" name="body[en]" class="form-control"
                          rows="6">{!! old('body.en', $homecare_text->body['en'] ?? '') !!}</textarea>
            </div>

            {{-- ترتیب --}}
            <div class="mb-3">
                <label class="form-label">ترتیب نمایش</label>
                <input type="number" name="order" class="form-control"
                       value="{{ old('order', $homecare_text->order ?? 1) }}" min="1">
            </div>

            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>

    <style>.ck-editor__editable {
            min-height: 260px
        }</style>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        let editorFa, editorEn;

        ClassicEditor.create(document.querySelector('#editor-fa'), {
            language: {ui: 'fa', content: 'fa'}
        }).then(ed => {
            editorFa = ed;
            ed.model.document.on('change:data', () => {
                document.getElementById('editor-fa').value = ed.getData();
            });
        }).catch(console.error);

        ClassicEditor.create(document.querySelector('#editor-en'), {
            language: {ui: 'en', content: 'en'}
        }).then(ed => {
            editorEn = ed;
            ed.model.document.on('change:data', () => {
                document.getElementById('editor-en').value = ed.getData();
            });
        }).catch(console.error);

        // پیش از ارسال، مقدار ادیتورها را داخل textarea بریزیم
        document.getElementById('homecare-text-form').addEventListener('submit', function () {
            if (editorFa) document.querySelector('#editor-fa').value = editorFa.getData();
            if (editorEn) document.querySelector('#editor-en').value = editorEn.getData();
        });
    </script>
@endsection
