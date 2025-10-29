@php($edit = isset($training))
@csrf
@if($edit) @method('PUT') @endif

<div class="card shadow rounded-3 mb-4">
    <div class="card-header bg-primary text-white text-center">
        <h5 class="mb-0">{{ $edit ? 'ویرایش اطلاعات دوره' : 'ایجاد دوره جدید' }}</h5>
    </div>

    <div class="card-body" dir="rtl" style="font-family: IRANSansWeb">
        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">عنوان دوره <span class="text-danger">*</span></label>
                <input type="text" name="title[fa]" value="{{ old('title.fa', $training->title['fa'] ?? '') }}"
                       class="form-control" required>
                @error('title.fa') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">زیرعنوان</label>
                <input type="text" name="subtitle[fa]" value="{{ old('subtitle.fa', $training->subtitle['fa'] ?? '') }}"
                       class="form-control">
                @error('subtitle.fa') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">برگزارکننده</label>
                <input type="text" name="organizer[fa]" value="{{ old('organizer.fa', $training->organizer['fa'] ?? '') }}"
                       class="form-control">
                @error('organizer.fa') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">محل برگزاری</label>
                <input type="text" name="location[fa]" value="{{ old('location.fa', $training->location['fa'] ?? '') }}"
                       class="form-control">
                @error('location.fa') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-2">
                <label class="form-label">تاریخ شروع</label>
                <input type="date" name="start_date" value="{{ old('start_date', $training->start_date ?? '') }}"
                       class="form-control">
                @error('start_date') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-2">
                <label class="form-label">تاریخ پایان</label>
                <input type="date" name="end_date" value="{{ old('end_date', $training->end_date ?? '') }}"
                       class="form-control">
                @error('end_date') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">مدت (ساعت)</label>
                <input type="number" name="duration_hours" min="1"
                       value="{{ old('duration_hours', $training->duration_hours ?? '') }}"
                       class="form-control">
                @error('duration_hours') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">تعداد جلسات <span class="text-danger">*</span></label>
                <input type="number" name="total_sessions" min="1"
                       value="{{ old('total_sessions', $training->total_sessions ?? 1) }}"
                       class="form-control" required>
                @error('total_sessions') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">وضعیت دوره</label>
                <select name="status" class="form-select">
                    @foreach(['draft'=>'پیش‌نویس','open'=>'باز','closed'=>'بسته'] as $k=>$v)
                        <option value="{{ $k }}" @selected(old('status', $training->status ?? 'open')==$k)>
                            {{ $v }}
                        </option>
                    @endforeach
                </select>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">اسلاگ (اختیاری)</label>
                <input type="text" name="slug" value="{{ old('slug', $training->slug ?? '') }}"
                       class="form-control" dir="ltr" placeholder="مثال: tehran-gas">
                <div class="form-text">اگر خالی بگذارید، خودکار از عنوان ساخته می‌شود.</div>
                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="form-label">لوگوی سمت راست</label>
                    <input type="file" name="logo_right" class="form-control" accept="image/*">
                </div>

                <div class="col-md-6">
                    <label class="form-label">لوگوی سمت چپ</label>
                    <input type="file" name="logo_left" class="form-control" accept="image/*">
                </div>

                <div class="col-md-6 mt-3">
                    <label class="form-label">تصویر مهر</label>
                    <input type="file" name="stamp_image" class="form-control" accept="image/*">
                </div>

                <div class="col-md-6 mt-3">
                    <label class="form-label">تصویر امضا</label>
                    <input type="file" name="signature_image" class="form-control" accept="image/*">
                </div>
            </div>

        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success px-4">
                {{ $edit ? 'ذخیره تغییرات' : 'ایجاد دوره' }}
            </button>
            <a href="{{ route('trainings.index') }}" class="btn btn-secondary px-4">بازگشت</a>
        </div>
    </div>
</div>
