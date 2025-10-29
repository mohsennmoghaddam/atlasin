@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid mt-5" dir="rtl" style="font-family: IRANSansWeb">
        <div class="col-xl-10 mx-auto">

            {{-- ================== هدر صفحه ================== --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-primary fw-bold">جزئیات دوره</h4>
                <div>
                    <a href="{{ route('trainings.edit', $training) }}" class="btn btn-warning">
                        <i class="bx bx-edit"></i> ویرایش دوره
                    </a>
                    <a href="{{ route('trainings.index') }}" class="btn btn-secondary">
                        <i class="bx bx-list-ul"></i> بازگشت به لیست
                    </a>
                </div>
            </div>

            {{-- پیام موفقیت یا خطا --}}
            @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif
            @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

            {{-- ================== مشخصات دوره ================== --}}
            <div class="card shadow-sm rounded-3 mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0">مشخصات دوره</h6>
                </div>

                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6"><strong>عنوان:</strong> {{ $training->title['fa'] ?? '-' }}</div>
                        <div class="col-md-6"><strong>زیرعنوان:</strong> {{ $training->subtitle['fa'] ?? '-' }}</div>
                        <div class="col-md-6"><strong>برگزارکننده:</strong> {{ $training->organizer['fa'] ?? '-' }}</div>
                        <div class="col-md-6"><strong>محل برگزاری:</strong> {{ $training->location['fa'] ?? '-' }}</div>
                        <div class="col-md-6"><strong>تاریخ شروع:</strong> {{ $training->start_date ?? '-' }}</div>
                        <div class="col-md-6"><strong>تاریخ پایان:</strong> {{ $training->end_date ?? '-' }}</div>
                        <div class="col-md-6"><strong>مدت (ساعت):</strong> {{ $training->duration_hours ?? '-' }}</div>
                        <div class="col-md-6"><strong>تعداد جلسات:</strong> {{ $training->total_sessions }}</div>
                        <div class="col-md-2">
                            <strong>وضعیت:</strong>
                            <span class="badge bg-{{ ['draft'=>'secondary','open'=>'success','closed'=>'dark'][$training->status] }}">
                            {{ $training->status }}
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ================== فرم ثبت‌نام شرکت‌کننده ================== --}}
            @if( $training->status == 'open' )
            <div class="card shadow-sm rounded-3 mb-4">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0"><i class="bx bx-user-plus"></i> ثبت‌نام شرکت‌کننده جدید</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('trainings.enroll', $training) }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">نام *</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" required class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">نام خانوادگی *</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" required class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">شماره موبایل *</label>
                                <input type="text" name="mobile" value="{{ old('mobile') }}" required class="form-control" placeholder="09xxxxxxxxx">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">محل خدمت *</label>
                                <input type="text" name="workplace" value="{{ old('workplace') }}" required class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">کد ملی (۱۰ رقمی)</label>
                                <input type="text" name="national_id" value="{{ old('national_id') }}" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">رشته شغلی</label>
                                <input type="text" name="job_field" value="{{ old('job_field') }}" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">نمره آزمون (POST-TEST)</label>
                                <input type="number" name="post_test_score" value="{{ old('post_test_score') }}" class="form-control" min="0" max="100">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">نوع استخدام</label>
                                <select name="employment_type" class="form-select">
                                    <option value="">انتخاب کنید</option>
                                    <option value="رسمی">رسمی</option>
                                    <option value="قراردادی">قراردادی</option>
                                    <option value="پروژه‌ای">پروژه‌ای</option>
                                    <option value="سایر">سایر</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">تعداد جلسات حضور</label>
                                <input type="number" name="attended_sessions" value="{{ old('attended_sessions',0) }}" class="form-control" min="0" max="{{ $training->total_sessions }}">
                            </div>

                            <div class="col-12 text-end mt-2">
                                <button class="btn btn-success"><i class="bx bx-save"></i> ثبت‌نام</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif

            {{-- ================== جدول شرکت‌کنندگان ================== --}}
            <div class="card shadow-sm rounded-3 mb-5">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="bx bx-group"></i> شرکت‌کنندگان این دوره</h6>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0 text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>کد ملی</th>
                                <th>محل خدمت</th>
                                <th>نمره (POST-TEST)</th>
                                <th>جلسات حضور</th>
                                <th>کد پیگیری</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($training->enrollments()->with('participant')->get() as $i => $en)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $en->participant->first_name }}</td>
                                    <td>{{ $en->participant->last_name }}</td>
                                    <td>{{ $en->participant->meta['national_id'] ?? '-' }}</td>
                                    <td>{{ $en->participant->workplace ?? '-' }}</td>
                                    <td>{{ $en->post_test_score ?? '-' }}</td>
                                    <td>{{ $en->attended_sessions }}</td>
                                    <td><code>{{ $en->tracking_code }}</code></td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('enrollments.edit', $en) }}" class="btn btn-sm btn-warning">
                                            <i class="bx bx-edit"></i> ویرایش
                                        </a>
                                        <form action="{{ route('enrollments.destroy', $en) }}" method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('آیا از حذف این ثبت‌نام مطمئن هستید؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bx bx-trash"></i> حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="py-4 text-muted">هنوز هیچ شرکت‌کننده‌ای ثبت نشده است.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

{{--                        @if($training->status === 'closed')--}}
{{--                            <div class="card shadow-sm rounded-3 mt-4">--}}
{{--                                <div class="card-header bg-success text-white">--}}
{{--                                    <h6 class="mb-0">صدور گواهی پایان دوره</h6>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <form action="{{ route('trainings.export.libre', $training) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <label class="form-label">انتخاب تمپلیت گواهی</label>--}}
{{--                                            <select name="template_id" class="form-select" required>--}}
{{--                                                <option value="">-- انتخاب تمپلیت --</option>--}}
{{--                                                @foreach(\App\Models\CertificateTemplate::all() as $template)--}}
{{--                                                    <option value="{{ $template->id }}">{{ $template->name }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <button type="submit" class="btn btn-success">--}}
{{--                                            <i class="bx bx-file"></i> صدور گواهی‌ها--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}

                        @if($training->status === 'closed')
                            <div class="card shadow-sm rounded-3 mt-4">
                                <div class="card-header bg-success text-white">
                                    <h6 class="mb-0">صدور گواهی پایان دوره</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('trainings.export.certificates', $training) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            <i class="bx bx-file"></i> صدور گواهی‌ها
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif


                    {{--@if($training->status === 'closed')
                            <div class="card shadow-sm rounded-3 mt-4">
                                <div class="card-header bg-success text-white">
                                    <h6 class="mb-0">صدور گواهی پایان دوره</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('trainings.generate.certificates', $training) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">انتخاب تمپلیت گواهی</label>
                                            <select name="template_id" class="form-select" required>
                                                <option value="">-- انتخاب تمپلیت --</option>
                                                @foreach(\App\Models\CertificateTemplate::all() as $template)
                                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success">
                                            <i class="bx bx-file"></i> صدور گواهی‌ها
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif--}}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
