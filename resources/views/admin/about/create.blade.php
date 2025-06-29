@extends('admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <h3 class="text-center mt-5">ایجاد بخش درباره ما</h3>

        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- عکس اصلی --}}
            <div class="mb-3">
                <label for="main_image" class="form-label">عکس اصلی</label>
                <input type="file" name="main_image" id="main_image" class="form-control" required>
            </div>

            {{-- عنوان --}}
            <div class="mb-3">
                <label class="form-label">عنوان (فارسی)</label>
                <input type="text" name="title[fa]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">عنوان (English)</label>
                <input type="text" name="title[en]" class="form-control" required>
            </div>

            {{-- زیرعنوان --}}
            <div class="mb-3">
                <label class="form-label">زیرعنوان (فارسی)</label>
                <input type="text" name="subtitle[fa]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">زیرعنوان (English)</label>
                <input type="text" name="subtitle[en]" class="form-control" required>
            </div>

            {{-- پاراگراف نهایی --}}
            <div class="mb-3">
                <label class="form-label">متن نهایی (فارسی)</label>
                <textarea name="final_paragraph[fa]" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Final Paragraph (English)</label>
                <textarea name="final_paragraph[en]" class="form-control" rows="3" required></textarea>
            </div>

            {{-- تجربه --}}
            <div class="mb-3">
                <label class="form-label">متن بالا تجربه (fa)</label>
                <input type="text" name="experience_text_top[fa]" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Experience Top Text (en)</label>
                <input type="text" name="experience_text_top[en]" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">سال‌های تجربه</label>
                <input type="text" name="experience_years" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">متن پایین تجربه (fa)</label>
                <input type="text" name="experience_text_bottom[fa]" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Experience Bottom Text (en)</label>
                <input type="text" name="experience_text_bottom[en]" class="form-control">
            </div>

            {{-- تماس --}}
            <div class="mb-3">
                <label class="form-label">تصویر تماس</label>
                <input type="file" name="call_us_image" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">متن تماس (fa)</label>
                <input type="text" name="call_us_text[fa]" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Call Text (en)</label>
                <input type="text" name="call_us_text[en]" class="form-control">
            </div>

            {{-- آیکون‌ها --}}
            <h5>آیکون‌ها</h5>
            <div id="icons-wrapper">
                <div class="icon-item mb-3">
                    <label>تصویر آیکون</label>
                    <input type="file" name="icons[0][icon_image]" class="form-control" required>
                    <label>عنوان آیکون (fa)</label>
                    <input type="text" name="icons[0][icon_title][fa]" class="form-control" required>
                    <label>Icon Title (en)</label>
                    <input type="text" name="icons[0][icon_title][en]" class="form-control" required>
                </div>
            </div>
            <button type="button" id="add-icon" class="btn btn-secondary mb-3">افزودن آیکون</button>

            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>
    </div>

    <script>
        let iconIndex = 1;
        document.getElementById('add-icon').addEventListener('click', function () {
            const wrapper = document.getElementById('icons-wrapper');
            const div = document.createElement('div');
            div.className = 'icon-item mb-3';
            div.innerHTML = `
            <label>تصویر آیکون</label>
            <input type="file" name="icons[${iconIndex}][icon_image]" class="form-control" required>
            <label>عنوان آیکون (fa)</label>
            <input type="text" name="icons[${iconIndex}][icon_title][fa]" class="form-control" required>
            <label>Icon Title (en)</label>
            <input type="text" name="icons[${iconIndex}][icon_title][en]" class="form-control" required>
        `;
            wrapper.appendChild(div);
            iconIndex++;
        });
    </script>
@endsection
