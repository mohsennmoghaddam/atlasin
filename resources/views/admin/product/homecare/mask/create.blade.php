@extends('admin.layout.master')

@section('content')
    <div class="container mt-4" dir="rtl">
        <h4 class="text-center mb-4">ایجاد گروه ماسک</h4>

        <form action="{{ route('homecare-mask-categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>عنوان (فارسی)</label>
                    <input type="text" name="title[fa]" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Title (English)</label>
                    <input type="text" name="title[en]" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label>ترتیب نمایش</label>
                <input type="number" name="order" class="form-control" value="1" min="1">
            </div>

            <div id="images-wrapper" class="mb-3">
                <label class="form-label fw-bold">تصاویر محصول</label>

                {{-- اولین ورودی --}}
                <input type="file" name="images[]" class="form-control mb-2" accept="image/*">

            </div>

            <button type="button" class="btn btn-outline-primary btn-sm" id="add-image-btn">
                افزودن عکس جدید +
            </button>


            <button class="btn btn-success">ذخیره</button>
        </form>
    </div>

    <script>
        document.getElementById('add-image-btn').addEventListener('click', function () {
            let wrapper = document.getElementById('images-wrapper');

            // ایجاد ورودی فایل جدید
            let input = document.createElement('input');
            input.type = 'file';
            input.name = 'images[]';
            input.accept = 'image/*';
            input.classList.add('form-control', 'mb-2');

            wrapper.appendChild(input);
        });
    </script>

@endsection
