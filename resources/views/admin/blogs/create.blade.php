@extends('admin.layout.master')

@section('content')
    <div class="container mt-5" style="direction: rtl;">
        <h4>ایجاد مقاله جدید</h4>
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- عنوان --}}
            <div class="form-group mb-3">
                <label>عنوان (فارسی)</label>
                <input type="text" name="title[fa]" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>عنوان (انگلیسی)</label>
                <input type="text" name="title[en]" class="form-control" required>
            </div>

            {{-- توضیح کوتاه --}}
            <div class="form-group mb-3">
                <label>توضیح کوتاه (فارسی)</label>
                <textarea name="short_description[fa]" class="form-control" rows="2"></textarea>
            </div>
            <div class="form-group mb-3">
                <label>توضیح کوتاه (انگلیسی)</label>
                <textarea name="short_description[en]" class="form-control" rows="2"></textarea>
            </div>

            {{-- محتوا با CKEditor --}}
            <div class="form-group mb-3">
                <label>محتوای مقاله (فارسی)</label>
                <textarea name="content[fa]" id="editor-fa" class="form-control">{{ old('content.fa') }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label>محتوای مقاله (انگلیسی)</label>
                <textarea name="content[en]" id="editor-en" class="form-control">{{ old('content.en') }}</textarea>
            </div>

            {{-- دسته‌بندی‌ها --}}
            <div class="form-group mb-3">
                <label>دسته‌بندی</label>
                <select name="categories[]" class="form-control" multiple>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name['fa'] ?? '' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- تصویر کاور --}}
            <div class="form-group mb-3">
                <label>تصویر مقاله</label>
                <input type="file" name="image" class="form-control">
            </div>

            {{-- وضعیت و دکمه ذخیره --}}
            <div class="form-group mb-3">
                <label>وضعیت انتشار</label>
                <select name="status" class="form-control">
                    <option value="draft">پیش‌نویس</option>
                    <option value="published">منتشر شده</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">ذخیره</button>
        </form>
    </div>


    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#editor-fa')).catch(error => console.error(error));
        ClassicEditor.create(document.querySelector('#editor-en')).catch(error => console.error(error));
    </script>

@endsection


