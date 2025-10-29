@extends('Admin.layout.master')

@section('content')
    <div class="container mt-5" style="direction: rtl">
        <h4>ویرایش مقاله</h4>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            {{-- عنوان --}}
            <div class="form-group mb-3">
                <label>عنوان (فارسی)</label>
                <input type="text" name="title[fa]" class="form-control" value="{{ $blog->title['fa'] ?? '' }}"
                       required>
            </div>
            <div class="form-group mb-3">
                <label>عنوان (انگلیسی)</label>
                <input type="text" name="title[en]" class="form-control" value="{{ $blog->title['en'] ?? '' }}"
                       required>
            </div>

            {{-- توضیح کوتاه --}}
            <div class="form-group mb-3">
                <label>توضیح کوتاه (فارسی)</label>
                <textarea name="short_description[fa]"
                          class="form-control">{{ $blog->short_description['fa'] ?? '' }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label>توضیح کوتاه (انگلیسی)</label>
                <textarea name="short_description[en]"
                          class="form-control">{{ $blog->short_description['en'] ?? '' }}</textarea>
            </div>

            {{-- محتوا با CKEditor --}}
            <div class="form-group mb-3">
                <label>محتوای مقاله (فارسی)</label>
                <textarea name="content[fa]" id="editor-fa">{{ $blog->content['fa'] ?? '' }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label>محتوای مقاله (انگلیسی)</label>
                <textarea name="content[en]" id="editor-en">{{ $blog->content['en'] ?? '' }}</textarea>
            </div>

            {{-- دسته‌بندی --}}
            <div class="form-group mb-3">
                <label>دسته‌بندی</label>
                <select name="categories[]" class="form-control" multiple>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                                {{ $blog->categories->contains($cat->id) ? 'selected' : '' }}>
                            {{ $cat->name['fa'] ?? '' }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- تصویر کاور --}}
            <div class="form-group mb-3">
                <label>تصویر مقاله</label><br>
                @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" width="100" class="mb-2">
                @endif
                <input type="file" name="image" class="form-control">
            </div>

            {{-- وضعیت --}}
            <div class="form-group mb-3">
                <label>وضعیت</label>
                <select name="status" class="form-control">
                    <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>پیش‌نویس</option>
                    <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>منتشر شده</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#editor-fa')).catch(err => console.error(err));
        ClassicEditor.create(document.querySelector('#editor-en')).catch(err => console.error(err));
    </script>
@endsection

