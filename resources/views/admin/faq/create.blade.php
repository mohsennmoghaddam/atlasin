@extends('admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">افزودن سؤال متداول</h4>

        <form action="{{ route('faqs.store') }}" method="POST" id="faq-form">
            @csrf

            <div class="mb-3">
                <label class="form-label">کتگوری (اختیاری برای FAQ کلی خالی بگذارید)</label>
                <select name="category_id" class="form-control">
                    <option value="">— FAQ کلی —</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->title['fa'] ?? $c->title['en'] ?? $c->slug }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">سؤال (FA)</label>
                    <input type="text" name="question[fa]" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3" dir="ltr">
                    <label class="form-label">Question (EN)</label>
                    <input type="text" name="question[en]" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">پاسخ (FA)</label>
                <textarea id="answer-fa" name="answer[fa]" class="form-control" rows="6"></textarea>
            </div>
            <div class="mb-3" dir="ltr">
                <label class="form-label">Answer (EN)</label>
                <textarea id="answer-en" name="answer[en]" class="form-control" rows="6"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">ترتیب نمایش</label>
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

    <style>.ck-editor__editable{min-height:160px}</style>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        let ed={}; const ids=['answer-fa','answer-en'];
        (async()=>{ for(const id of ids){ const el=document.getElementById(id); if(el){ ed[id]=await ClassicEditor.create(el); } }})();
        document.getElementById('faq-form').addEventListener('submit',()=>{ for(const id of ids){ if(ed[id]) document.getElementById(id).value=ed[id].getData(); }});
    </script>
@endsection
