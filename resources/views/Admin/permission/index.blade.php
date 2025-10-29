@extends('Admin.layout.master')

@section('content')
    <div class="container py-5" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="text-primary fw-bold">لیست سطوح دسترسی</h4>
                    <a href="{{ route('permission.create') }}" class="btn btn-success">
                        <i class="bx bx-plus-circle me-1"></i> دسترسی جدید
                    </a>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body table-responsive">
                        <table class="table table-hover align-middle text-center">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success')}}</div>
                            @endif
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>نام دسترسی</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->name }}</td>

                                    <td>
                                        <a href="{{ route('permission.edit', $permission) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="bx bx-edit-alt"></i> ویرایش
                                        </a>
                                    </td>

                                    <td>
                                        <form action="{{ route('permission.destroy', $permission) }}" method="POST"
                                              onsubmit="return confirm('آیا از حذف این دسترسی مطمئن هستید؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bx bx-trash"></i> حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">هیچ سطح دسترسی‌ای ثبت نشده است.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
