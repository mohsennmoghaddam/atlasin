@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid mt-5" dir="rtl" style="font-family: IRANSansWeb">
        <div class="col-xl-8 mx-auto">

            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-warning text-dark">
                    <h6 class="mb-0">ویرایش اطلاعات شرکت‌کننده</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('enrollments.update', $enrollment) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">نام و نام خانوادگی</label>
                            <input type="text" readonly class="form-control bg-light"
                                   value="{{ $enrollment->participant->first_name . ' ' . $enrollment->participant->last_name }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">تعداد جلسات حضور</label>
                            <input type="number" name="attended_sessions" class="form-control"
                                   min="0" max="{{ $enrollment->training->total_sessions }}"
                                   value="{{ old('attended_sessions', $enrollment->attended_sessions) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">نمره آزمون (POST-TEST)</label>
                            <input type="number" name="post_test_score" class="form-control"
                                   min="0" max="100" value="{{ old('post_test_score', $enrollment->post_test_score) }}">
                        </div>

                        <div class="text-end">
                            <button class="btn btn-success"><i class="bx bx-save"></i> ذخیره تغییرات</button>
                            <a href="{{ route('trainings.show', $training) }}" class="btn btn-secondary">بازگشت</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
