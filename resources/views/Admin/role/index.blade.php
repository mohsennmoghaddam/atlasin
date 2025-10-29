@extends('Admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <div class="col-xl-10 mx-auto mt-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">لیست نقش‌ها</h5>
                    <a href="{{ route('role.create') }}" class="btn btn-success">
                        <i class="bx bx-plus-circle"></i> ایجاد نقش جدید
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-hover text-center align-middle">
                        <thead class="table-primary">
                        <tr>
                            <th>شماره</th>
                            <th>نام نقش</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                            <th>سطح دسترسی</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('role.edit', $role) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit-alt"></i> ویرایش
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('role.destroy', $role) }}" method="POST"
                                          onsubmit="return confirm('آیا از حذف این نقش مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bx bx-trash"></i> حذف
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('role.permission.edit', $role) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-shield"></i> دسترسی‌ها
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted">هیچ نقشی تعریف نشده است.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
