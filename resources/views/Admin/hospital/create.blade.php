{{--@extends('Admin.layout.master')--}}

{{--@section('content')--}}
{{--    <div class="container-fluid mt-5">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-10 offset-md-1">--}}
{{--                <div class="card shadow rounded-3">--}}
{{--                    <div class="card-header bg-primary text-white">--}}
{{--                        <h5 class="mb-0">ایجاد بیمارستان جدید</h5>--}}
{{--                    </div>--}}

{{--                    <div class="card-body">--}}
{{--                        <form action="{{ route('hospitals.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                            @csrf--}}

{{--                            <div class="row mb-3">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="name" class="form-label">نام بیمارستان <span class="text-danger">*</span></label>--}}
{{--                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">--}}
{{--                                    @error('name')--}}
{{--                                    <small class="text-danger">{{ $message }}</small>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <label for="website" class="form-label">لینک سایت</label>--}}
{{--                                    <input type="url" name="website" class="form-control" value="{{ old('website') }}">--}}
{{--                                    @error('website')--}}
{{--                                    <small class="text-danger">{{ $message }}</small>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label for="description" class="form-label">توضیح مختصر</label>--}}
{{--                                <textarea name="description" class="form-control" rows="3" placeholder="مثلاً معرفی کوتاه از بیمارستان...">{{ old('description') }}</textarea>--}}
{{--                                @error('description')--}}
{{--                                <small class="text-danger">{{ $message }}</small>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label for="image" class="form-label">تصویر بیمارستان <span class="text-danger">*</span></label>--}}
{{--                                <input type="file" name="image" class="form-control" accept="image/*" required>--}}
{{--                                @error('image')--}}
{{--                                <small class="text-danger">{{ $message }}</small>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="text-end">--}}
{{--                                <button type="submit" class="btn btn-success">ذخیره</button>--}}
{{--                                <a href="{{ route('hospitals.index') }}" class="btn btn-secondary">بازگشت</a>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow rounded-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">ایجاد بیمارستان جدید</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('hospitals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- حالت آپلود: تکی یا چندتایی --}}
                            <div class="mb-3">
                                <label class="form-label d-block">حالت آپلود</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="upload_mode" id="mode_single"
                                           value="single" checked>
                                    <label class="form-check-label" for="mode_single">تک‌تصویر</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="upload_mode" id="mode_multi"
                                           value="multi">
                                    <label class="form-check-label" for="mode_multi">چندتصویر</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label" id="name_label">نام بیمارستان <span
                                                class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    <small id="baseNameHint" class="text-muted d-none">در حالت «نام پایه + شماره»، این
                                        مقدار به‌عنوان نام پایه استفاده می‌شود (مثلاً «بیمارستان X 1»، «بیمارستان X 2»
                                        ...).</small>
                                    @error('name')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="website" class="form-label">لینک سایت</label>
                                    <input type="url" name="website" class="form-control" value="{{ old('website') }}">
                                    @error('website')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">توضیح مختصر</label>
                                <textarea name="description" class="form-control" rows="3"
                                          placeholder="مثلاً معرفی کوتاه از بیمارستان...">{{ old('description') }}</textarea>
                                @error('description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- ورودی تک‌تصویر (قدیمی) --}}
                            <div class="mb-3" id="singleWrap">
                                <label for="image" class="form-label">تصویر بیمارستان <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                                @error('image')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- ورودی چندتصویر --}}
                            <div class="mb-3 d-none" id="multiWrap">
                                <label for="images" class="form-label">تصاویر بیمارستان‌ها</label>
                                <input type="file" name="images[]" id="imagesInput" class="form-control"
                                       accept="image/*" multiple>
                                <div class="form-text">می‌توانید تا 100 تصویر با فرمت‌های jpg, jpeg, png انتخاب کنید
                                    (هرکدام حداکثر 2MB یا طبق ولیدیشن کنترلر).
                                </div>
                                @error('images')
                                <small class="text-danger d-block">{{ $message }}</small>
                                @enderror
                                @error('images.*')
                                <small class="text-danger d-block">{{ $message }}</small>
                                @enderror

                                <div class="row mt-3 g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">روش نام‌گذاری رکوردها</label>
                                        <select name="name_strategy" id="name_strategy" class="form-select">
                                            <option value="filename" selected>نام از روی نام فایل</option>
                                            <option value="base_plus_index">نام پایه + شماره</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end">
                                        <small class="text-muted">
                                            «نام از روی نام فایل» = ستون نام از اسم هر فایل گرفته می‌شود.
                                            «نام پایه + شماره» = از فیلد بالا به‌عنوان پایه استفاده می‌شود.
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">ذخیره</button>
                                <a href="{{ route('hospitals.index') }}" class="btn btn-secondary">بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- اسکریپت کوچک برای سوییچ حالت‌ها و required --}}
    <script>
        (function () {
            const modeSingle = document.getElementById('mode_single');
            const modeMulti = document.getElementById('mode_multi');
            const singleWrap = document.getElementById('singleWrap');
            const multiWrap = document.getElementById('multiWrap');
            const imageSingleInput = document.querySelector('input[name="image"]');
            const imagesMultiInput = document.getElementById('imagesInput');
            const nameInput = document.querySelector('input[name="name"]');
            const nameLabel = document.getElementById('name_label');
            const baseHint = document.getElementById('baseNameHint');
            const strategy = document.getElementById('name_strategy');

            function syncUI() {
                const isMulti = modeMulti.checked;

                singleWrap.classList.toggle('d-none', isMulti);
                multiWrap.classList.toggle('d-none', !isMulti);

                if (imageSingleInput) imageSingleInput.required = !isMulti;
                if (imagesMultiInput) imagesMultiInput.required = isMulti;

                // نام: در تکی اجباری؛ در چندتایی فقط وقتی اجباری است که روش base_plus_index انتخاب شود
                const nameRequired = !isMulti || (isMulti && strategy && strategy.value === 'base_plus_index');
                nameInput.required = nameRequired;

                // برچسب و راهنما
                nameLabel.innerHTML = isMulti
                    ? 'نام پایه' + (nameRequired ? ' <span class="text-danger">*</span>' : '')
                    : 'نام بیمارستان <span class="text-danger">*</span>';

                baseHint.classList.toggle('d-none', !isMulti);
            }

            modeSingle.addEventListener('change', syncUI);
            modeMulti.addEventListener('change', syncUI);
            if (strategy) strategy.addEventListener('change', syncUI);
            syncUI();
        })();
    </script>
@endsection
