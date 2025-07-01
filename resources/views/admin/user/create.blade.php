
@extends('admin.layout.master')

@section('content')
    <div class="container py-4" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">ایجاد کاربر جدید</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label>نام</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>ایمیل</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>موبایل</label>
                                <input type="text" name="mobile" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>رمز عبور</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label> رمز عبور مخفی</label>
                                <input type="password" name="secret_code" placeholder="AT61" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>نقش‌ها</label>
                                <select name="roles[]" class="form-select" multiple required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">می‌توانید بیش از یک نقش انتخاب کنید</small>
                            </div>

                            <div class="mb-3">
                                <label>عکس پروفایل</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>

                            <div class="text-end">
                                <button class="btn btn-success" type="submit">ذخیره</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
