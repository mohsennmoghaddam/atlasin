@extends('admin.layout.master')

@section('content')
    <div class="container py-4" dir="rtl">
        <h4 class="text-center mb-4">ایجاد بخش دلایل انتخاب ما</h4>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('why-uses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="title_fa" class="form-label">عنوان (فارسی)</label>
                            <input type="text" name="title[fa]" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="title_en" class="form-label">عنوان (انگلیسی)</label>
                            <input type="text" name="title[en]" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="desc_fa" class="form-label">توضیح (فارسی)</label>
                            <textarea name="description[fa]" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="desc_en" class="form-label">توضیح (انگلیسی)</label>
                            <textarea name="description[en]" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">تصویر سمت راست</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <hr>
                    <h5 class="mb-3">ویژگی‌ها</h5>
                    <div id="items-container">
                        <div class="row item-row mb-3">
                            <div class="col-md-5">
                                <label>عنوان ویژگی (FA)</label>
                                <input type="text" name="items[0][title][fa]" class="form-control" required>
                            </div>
                            <div class="col-md-5">
                                <label>عنوان ویژگی (EN)</label>
                                <input type="text" name="items[0][title][en]" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label>آیکون</label>
                                <input type="file" name="items[0][icon]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" id="add-item-btn" class="btn btn-outline-primary btn-sm">+ افزودن ویژگی</button>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success">ثبت اطلاعات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script>
            let itemIndex = 1;
            document.getElementById('add-item-btn').addEventListener('click', function () {
                const container = document.getElementById('items-container');
                const row = document.createElement('div');
                row.className = 'row item-row mb-3';
                row.innerHTML = `
                <div class="col-md-5">
                    <input type="text" name="items[${itemIndex}][title][fa]" class="form-control" placeholder="عنوان (FA)" required>
                </div>
                <div class="col-md-5">
                    <input type="text" name="items[${itemIndex}][title][en]" class="form-control" placeholder="عنوان (EN)" required>
                </div>
                <div class="col-md-2">
                    <input type="file" name="items[${itemIndex}][icon]" class="form-control">
                </div>
            `;
                container.appendChild(row);
                itemIndex++;
            });
        </script>

@endsection

