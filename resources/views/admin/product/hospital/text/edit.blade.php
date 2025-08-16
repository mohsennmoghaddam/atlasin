@extends('admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">ویرایش سکشن متن (محصولات بیمارستانی)</h4>

        <form action="{{ route('hospital-texts.update', $section) }}" method="POST" id="text-form" novalidate>
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">کلید</label>
                <input type="text" name="key" class="form-control" value="{{ $section->key }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">عنوان (فارسی)</label>
                    <textarea id="title-fa" name="title[fa]" class="form-control" rows="2">{!! $section->title['fa'] ?? '' !!}</textarea>
                </div>
                <div class="col-md-6 mb-3" dir="ltr">
                    <label class="form-label">Title (English)</label>
                    <textarea id="title-en" name="title[en]" class="form-control" rows="2">{!! $section->title['en'] ?? '' !!}</textarea>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">متن (فارسی)</label>
                <textarea id="body-fa" name="body[fa]" class="form-control" rows="6">{!! $section->body['fa'] ?? '' !!}</textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label class="form-label">Body (English)</label>
                <textarea id="body-en" name="body[en]" class="form-control" rows="6">{!! $section->body['en'] ?? '' !!}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">ترتیب نمایش</label>
                <input type="number" name="order" class="form-control" value="{{ $section->order }}" min="1">
            </div>

            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>

    <style>.ck-editor__editable{min-height:180px}</style>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        let ed = {};
        const ids = ['title-fa','title-en','body-fa','body-en'];

        (async () => {
            for (const id of ids) {
                ed[id] = await ClassicEditor.create(document.querySelector('#'+id), {
                    language: { ui: id.endsWith('-fa') ? 'fa' : 'en', content: id.endsWith('-fa') ? 'fa' : 'en' }
                });
            }
        })().catch(console.error);

        document.getElementById('text-form').addEventListener('submit', () => {
            for (const id of ids) if (ed[id]) document.getElementById(id).value = ed[id].getData();
        });
    </script>
@endsection

