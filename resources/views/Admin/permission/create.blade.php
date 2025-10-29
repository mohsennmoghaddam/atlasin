@extends('Admin.layout.master')

@section('content')
    <div class="container py-5" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">ایجاد سطح دسترسی جدید</h5>
                    </div>

                    <div class="card-body mt-5">
                        @if ($errors->any())
                            <div class="alert alert-danger small">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('permission.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">نام دسترسی (مثلاً: edit-posts)</label>
                                <input type="text" name="name" id="name"
                                       class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">لیبل (مثلاً: web)</label>
                                <input type="text" name="guard_name" id="name"
                                       class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="bx bx-save me-1"></i> ذخیره
                                </button>
                                <a href="{{ route('permission.index') }}" class="btn btn-secondary">
                                    بازگشت
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
