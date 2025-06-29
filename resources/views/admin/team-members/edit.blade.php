@extends('admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">ویرایش اطلاعات عضو تیم</h5>
                    </div>
                    <div class="card-body bg-white mt-2">
                        <form action="{{ route('team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">نام (فارسی)</label>
                                    <input type="text" name="name_fa" class="form-control form-control-sm" value="{{ $teamMember->getTranslation('name', 'fa') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">نام (انگلیسی)</label>
                                    <input type="text" name="name_en" class="form-control form-control-sm" value="{{ $teamMember->getTranslation('name', 'en') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">سمت (فارسی)</label>
                                    <input type="text" name="position_fa" class="form-control form-control-sm" value="{{ $teamMember->getTranslation('position', 'fa') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">سمت (انگلیسی)</label>
                                    <input type="text" name="position_en" class="form-control form-control-sm" value="{{ $teamMember->getTranslation('position', 'en') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">ایمیل</label>
                                    <input type="email" name="email" class="form-control form-control-sm" value="{{ $teamMember->email }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">شماره موبایل</label>
                                    <input type="text" name="mobile" class="form-control form-control-sm" value="{{ $teamMember->mobile }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">شماره داخلی</label>
                                    <input type="text" name="internal_number" class="form-control form-control-sm" value="{{ $teamMember->internal_number }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">تصویر</label>
                                    <input type="file" name="image" class="form-control form-control-sm">
                                    @if($teamMember->image)
                                        <img src="{{ asset('storage/' . $teamMember->image) }}" width="60" class="mt-2 border rounded">
                                    @endif
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success px-4">ذخیره تغییرات</button>
                                <a href="{{ route('team-members.index') }}" class="btn btn-outline-secondary px-4">بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
