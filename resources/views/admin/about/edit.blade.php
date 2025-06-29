@extends('admin.layout.master')

@section('content')
    <div class="container" dir="rtl" style="padding-top: 30px;">
        <h3 class="text-center mb-4 text-primary">ویرایش بخش درباره ما</h3>

        <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- عکس اصلی --}}
            <div class="mb-3">
                <label for="main_image" class="form-label">عکس اصلی</label>
                <input type="file" name="main_image" class="form-control">
                @if($about->main_image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $about->main_image) }}" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>

            {{-- عنوان --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">عنوان (فارسی)</label>
                    <input type="text" name="title[fa]" value="{{ json_decode($about->title)->fa ?? '' }}" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title (English)</label>
                    <input type="text" name="title[en]" value="{{ json_decode($about->title)->en ?? '' }}" class="form-control" required>
                </div>
            </div>

            {{-- زیرعنوان --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">زیرعنوان (فارسی)</label>
                    <input type="text" name="subtitle[fa]" value="{{ json_decode($about->subtitle)->fa ?? '' }}" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Subtitle (English)</label>
                    <input type="text" name="subtitle[en]" value="{{ json_decode($about->subtitle)->en ?? '' }}" class="form-control" required>
                </div>
            </div>

            {{-- متن نهایی --}}
            <div class="mb-3">
                <label class="form-label">متن نهایی (فارسی)</label>
                <textarea name="final_paragraph[fa]" class="form-control" rows="3">{{ json_decode($about->final_paragraph)->fa ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Final Paragraph (English)</label>
                <textarea name="final_paragraph[en]" class="form-control" rows="3">{{ json_decode($about->final_paragraph)->en ?? '' }}</textarea>
            </div>

            {{-- تجربه --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">متن بالا تجربه (fa)</label>
                    <input type="text" name="experience_text_top[fa]" class="form-control" value="{{ json_decode($about->experience_text_top)->fa ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Experience Top Text (en)</label>
                    <input type="text" name="experience_text_top[en]" class="form-control" value="{{ json_decode($about->experience_text_top)->en ?? '' }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">تعداد سال‌های تجربه</label>
                <input type="text" name="experience_years" class="form-control" value="{{ $about->experience_years }}">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">متن پایین تجربه (fa)</label>
                    <input type="text" name="experience_text_bottom[fa]" class="form-control" value="{{ json_decode($about->experience_text_bottom)->fa ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Experience Bottom Text (en)</label>
                    <input type="text" name="experience_text_bottom[en]" class="form-control" value="{{ json_decode($about->experience_text_bottom)->en ?? '' }}">
                </div>
            </div>

            {{-- تماس --}}
            <div class="mb-3">
                <label class="form-label">تصویر تماس</label>
                <input type="file" name="call_us_image" class="form-control">
                @if($about->call_us_image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $about->call_us_image) }}" width="100" class="img-thumbnail">
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">متن تماس (fa)</label>
                    <input type="text" name="call_us_text[fa]" class="form-control" value="{{ json_decode($about->call_us_text)->fa ?? '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Call Text (en)</label>
                    <input type="text" name="call_us_text[en]" class="form-control" value="{{ json_decode($about->call_us_text)->en ?? '' }}">
                </div>
            </div>
            {{-- آیکون‌ها --}}
            <hr>
            <h4 class="text-primary mb-3">آیکون‌ها</h4>
            <div id="icons-wrapper">
                @foreach($about->icons as $index => $icon)
                    <div class="icon-item border rounded p-3 mb-3 bg-light">
                        <input type="hidden" name="icons[{{ $index }}][id]" value="{{ $icon->id }}">

                        {{-- نمایش عکس قبلی --}}
                        <div class="mb-2">
                            <label class="form-label">تصویر فعلی آیکون:</label><br>
                            <img src="{{ asset('storage/' . $icon->icon_image) }}" alt="Icon" width="100" class="img-thumbnail">
                        </div>

                        {{-- تغییر عکس --}}
                        <div class="mb-2">
                            <label class="form-label">آپلود تصویر جدید (در صورت نیاز)</label>
                            <input type="file" name="icons[{{ $index }}][icon_image]" class="form-control">
                        </div>

                        {{-- عنوان‌ها --}}
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label>عنوان (fa)</label>
                                <input type="text" name="icons[{{ $index }}][icon_title][fa]" value="{{ json_decode($icon->icon_title)->fa ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>عنوان (en)</label>
                                <input type="text" name="icons[{{ $index }}][icon_title][en]" value="{{ json_decode($icon->icon_title)->en ?? '' }}" class="form-control">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- افزودن آیکون جدید --}}
            <button type="button" class="btn btn-outline-secondary mb-3" id="add-icon">افزودن آیکون جدید</button>


            {{-- دکمه‌ها --}}
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('about.index') }}" class="btn btn-secondary">بازگشت</a>
                <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
            </div>
        </form>
    </div>




    <script>
        let iconIndex = {{ $about->icons->count() }};
        document.getElementById('add-icon').addEventListener('click', function () {
            const wrapper = document.getElementById('icons-wrapper');
            const div = document.createElement('div');
            div.className = 'icon-item border rounded p-3 mb-3 bg-light';
            div.innerHTML = `
            <div class="mb-2">
                <label>تصویر آیکون</label>
                <input type="file" name="icons[${iconIndex}][icon_image]" class="form-control" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>عنوان (fa)</label>
                    <input type="text" name="icons[${iconIndex}][icon_title][fa]" class="form-control" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>عنوان (en)</label>
                    <input type="text" name="icons[${iconIndex}][icon_title][en]" class="form-control" required>
                </div>
            </div>
        `;
            wrapper.appendChild(div);
            iconIndex++;
        });
    </script>
@endsection

