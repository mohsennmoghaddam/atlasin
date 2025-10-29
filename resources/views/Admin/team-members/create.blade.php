@extends('Admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">افزودن عضو جدید تیم</h4>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('team-members.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3 mt-5">
                                <div class="col-md-6">
                                    <label>نام (فارسی)</label>
                                    <input type="text" name="name_fa" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>نام (انگلیسی)</label>
                                    <input type="text" name="name_en" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>سمت (فارسی)</label>
                                    <input type="text" name="position_fa" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>سمت (انگلیسی)</label>
                                    <input type="text" name="position_en" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>ایمیل</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>لینک لینکدین</label>
                                    <input type="url" name="linkedin" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>شماره موبایل</label>
                                    <input type="text" name="mobile" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>شماره داخلی شرکت</label>
                                    <input type="text" name="internal_number" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>تصویر (آپلود عکس)</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="text-center">
                                <button class="btn btn-success px-5">ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
