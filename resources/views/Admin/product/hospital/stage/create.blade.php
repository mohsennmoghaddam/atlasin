@extends('Admin.layout.master')
@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">افزودن آیتم اجرا</h4>
        <form action="{{ route('hospital-stages.store') }}" method="POST" enctype="multipart/form-data" id="stage-form">
            @csrf

            <div class="mb-3">
                <label class="form-label">کتگوری</label>
                <select name="category_id" class="form-control" required>
                    <option value="">انتخاب...</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->title['fa'] ?? $c->title['en'] ?? $c->slug }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">عنوان (FA)</label>
                    <textarea id="title-fa" name="title[fa]" class="form-control" rows="2"></textarea>
                </div>
                <div class="col-md-6 mb-3" dir="ltr">
                    <label class="form-label">Title (EN)</label>
                    <textarea id="title-en" name="title[en]" class="form-control" rows="2"></textarea>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">متن (FA)</label>
                <textarea id="body-fa" name="body[fa]" class="form-control" rows="6"></textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label class="form-label">Body (EN)</label>
                <textarea id="body-en" name="body[en]" class="form-control" rows="6"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">تصویر</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">ترتیب</label>
                    <input type="number" name="order" class="form-control" value="1" min="1">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label d-block">وضعیت</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked id="st">
                        <label class="form-check-label" for="st">فعال</label>
                    </div>
                </div>
            </div>

            <button class="btn btn-success">ذخیره</button>
        </form>
    </div>

    <style>.ck-editor__editable {
            min-height: 160px
        }</style>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        let ed = {};
        const ids = ['title-fa', 'title-en', 'body-fa', 'body-en'];
        (async () => {
            for (const id of ids) {
                const el = document.getElementById(id);
                if (el) {
                    ed[id] = await ClassicEditor.create(el);
                }
            }
        })();
        document.getElementById('stage-form').addEventListener('submit', () => {
            for (const id of ids) {
                if (ed[id]) document.getElementById(id).value = ed[id].getData();
            }
        });
    </script>
@endsection
