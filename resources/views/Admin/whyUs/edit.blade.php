@extends('Admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <div class="col-xl-10 mx-auto mt-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">ویرایش دلیل انتخاب ما</h5>
                </div>

                <div class="card-body mt-2">
                    <form action="{{ route('why-uses.update', $whyUse) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>عنوان (فارسی)</label>
                                <input type="text" name="title[fa]"
                                       value="{{ old('title.fa', $whyUse->title['fa'] ?? '') }}" class="form-control"
                                       required>
                            </div>
                            <div class="col-md-6">
                                <label>Title (English)</label>
                                <input type="text" name="title[en]"
                                       value="{{ old('title.en', $whyUse->title['en'] ?? '') }}" class="form-control"
                                       required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>توضیح (فارسی)</label>
                                <textarea name="description[fa]"
                                          class="form-control">{{ old('description.fa', $whyUse->description['fa'] ?? '') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Description (English)</label>
                                <textarea name="description[en]"
                                          class="form-control">{{ old('description.en', $whyUse->description['en'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>تصویر فعلی:</label><br>
                            @if($whyUse->image)
                                <img src="{{ asset('storage/' . $whyUse->image) }}" alt="image" width="120"
                                     class="rounded mb-2">
                            @else
                                <p class="text-muted">تصویری ثبت نشده</p>
                            @endif
                            <input type="file" name="image" class="form-control">
                        </div>

                        <hr>

                        <h6 class="mb-3">آیتم‌ها</h6>
                        <div id="item-container">
                            @foreach($whyUse->items as $index => $item)
                                <div class="border rounded p-3 mb-3 bg-light item-block">
                                    <input type="hidden" name="items[{{ $index }}][id]" value="{{ $item->id }}">
                                    <div class="row align-items-center">
                                        <div class="col-md-5">
                                            <label>عنوان آیتم (فارسی)</label>
                                            <input type="text" name="items[{{ $index }}][title][fa]"
                                                   value="{{ $item->title['fa'] ?? '' }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Item Title (English)</label>
                                            <input type="text" name="items[{{ $index }}][title][en]"
                                                   value="{{ $item->title['en'] ?? '' }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label>آیکون فعلی</label><br>
                                            @if($item->icon)
                                                <img src="{{ asset('storage/' . $item->icon) }}" width="40"
                                                     class="mb-2 rounded shadow-sm">
                                            @endif
                                            <input type="file" name="items[{{ $index }}][icon]" class="form-control">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeItem(this)">
                                        حذف آیتم
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-outline-secondary mb-3" onclick="addItem()">+ افزودن آیتم
                        </button>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
                            <a href="{{ route('why-uses.index') }}" class="btn btn-secondary">بازگشت</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <template id="item-template">
        <div class="border rounded p-3 mb-3 bg-light item-block">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <label>عنوان آیتم (فارسی)</label>
                    <input type="text" name="items[__INDEX__][title][fa]" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label>Item Title (English)</label>
                    <input type="text" name="items[__INDEX__][title][en]" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label>آیکون</label>
                    <input type="file" name="items[__INDEX__][icon]" class="form-control">
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeItem(this)">حذف آیتم</button>
        </div>
    </template>

    <script>
        let itemIndex = {{ $whyUse->items->count() }};

        function addItem() {
            const template = document.getElementById('item-template').innerHTML;
            const newItemHtml = template.replace(/__INDEX__/g, itemIndex);
            document.getElementById('item-container').insertAdjacentHTML('beforeend', newItemHtml);
            itemIndex++;
        }

        function removeItem(button) {
            button.closest('.item-block').remove();
        }
    </script>
@endsection
