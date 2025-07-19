@extends('admin.layout.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow rounded-3">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0">ویرایش کاربر</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">نام کاربر <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ایمیل</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">شماره موبایل</label>
                                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $user->mobile) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">نقش کاربر</label>
                                    <select name="role_id" class="form-select" required>
                                        <option value="">انتخاب نقش</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">تصویر پروفایل</label>
                                <input type="file" name="image" class="form-control">
                                @if($user->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/users/' . $user->image) }}" alt="Profile" height="80">
                                    </div>
                                @endif
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">بروزرسانی</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
