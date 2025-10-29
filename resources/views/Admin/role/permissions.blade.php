@extends('Admin.layout.master')

@section('content')
    <div class="container py-5" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">مدیریت سطح دسترسی‌ها برای نقش:</h5>
                        <span class="fw-bold">{{ $role->name }}</span>
                    </div>

                    <form action="{{ route('role.permission.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0 small">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4 col-sm-6 mb-3">
                                        <div class="form-check bg-light rounded px-3 py-2 shadow-sm">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                   value="{{ $permission->id }}"
                                                   id="permission_{{ $permission->id }}"
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">
                                <i class="bx bx-save me-1"></i> ذخیره تغییرات
                            </button>
                            <a href="{{ route('role.index') }}" class="btn btn-secondary ms-2">
                                بازگشت
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
