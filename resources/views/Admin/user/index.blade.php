@extends('Admin.layout.master')

@section('content')
    <div class="container py-4" dir="rtl">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-primary fw-bold">لیست کاربران</h4>
            <a href="{{ route('users.create') }}" class="btn btn-success">
                <i class="bx bx-plus-circle me-1"></i> کاربر جدید
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-hover text-center align-middle">
                    <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>شماره</th>
                        <th>نقش‌ها</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge bg-info text-dark">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit-alt"></i> ویرایش
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">هیچ کاربری یافت نشد.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
