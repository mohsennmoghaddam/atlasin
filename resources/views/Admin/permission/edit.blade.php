@extends('Admin.layout.master')

@section('content')
    <div class="container py-5" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">ویرایش سطح دسترسی</h5>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger small">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('Admin.permission.update', $permission) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">نام دسترسی</label>
                                <input type="text" name="name" id="name"
                                       class="form-control" value="{{ old('name', $permission->name) }}" required>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="bx bx-save me-1"></i> ذخیره تغییرات
                                </button>
                                <a href="{{ route('Admin.permission.index') }}" class="btn btn-secondary">
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
