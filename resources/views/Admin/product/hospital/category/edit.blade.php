@extends('Admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-3">ویرایش دسته‌بندی بیمارستانی</h4>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('hospital-category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Slug (انگلیسی و یکتا)</label>
                <input type="text" name="slug" class="form-control"
                       value="{{ old('slug', $category->slug) }}" required>
                @error('slug') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">عنوان (FA)</label>
                    <input type="text" name="title[fa]" class="form-control"
                           value="{{ old('title.fa', $category->title['fa'] ?? '') }}" required>
                    @error('title.fa') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title (EN)</label>
                    <input type="text" name="title[en]" class="form-control"
                           value="{{ old('title.en', $category->title['en'] ?? '') }}" required>
                    @error('title.en') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">زیرعنوان (FA)</label>
                    <input type="text" name="subtitle[fa]" class="form-control"
                           value="{{ old('subtitle.fa', $category->subtitle['fa'] ?? '') }}">
                    @error('subtitle.fa') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Subtitle (EN)</label>
                    <input type="text" name="subtitle[en]" class="form-control"
                           value="{{ old('subtitle.en', $category->subtitle['en'] ?? '') }}">
                    @error('subtitle.en') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">آیکون فعلی</label><br>
                @if($category->icon && file_exists(public_path('storage/'.$category->icon)))
                    <img src="{{ asset('storage/'.$category->icon) }}" alt="icon" class="img-thumbnail rounded-circle" style="width:80px;height:80px;object-fit:cover;">
                @else
                    <span class="text-muted">آیکونی ثبت نشده</span>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">تغییر آیکون (اختیاری)</label>
                <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
                @error('icon') <div class="text-danger small">{{ $message }}</div> @enderror

                <img id="iconPreview" src="#" alt="preview" class="mt-2 img-thumbnail rounded-circle d-none" style="width:80px;height:80px;object-fit:cover;">
            </div>

            <div class="mb-3">
                <label class="form-label">ترتیب نمایش</label>
                <input type="number" name="order" class="form-control"
                       value="{{ old('order', $category->order) }}" min="1">
                @error('order') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="text-center">
                <button class="btn btn-primary px-4">بروزرسانی</button>
                <a href="{{ route('hospital-category.index') }}" class="btn btn-secondary px-4">بازگشت</a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('icon').addEventListener('change', function () {
            const [file] = this.files;
            if (file) {
                const img = document.getElementById('iconPreview');
                img.src = URL.createObjectURL(file);
                img.classList.remove('d-none');
            }
        });
    </script>
@endsection
