@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid mt-5" dir="rtl" style="font-family: IRANSansWeb">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-primary fw-bold">مدیریت تمپلیت‌های گواهی</h4>
            <a href="{{ route('certificates.create') }}" class="btn btn-success">
                <i class="bx bx-plus-circle"></i> افزودن تمپلیت جدید
            </a>
        </div>

        @if(session('ok'))
            <div class="alert alert-success">{{ session('ok') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped align-middle text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام تمپلیت</th>
                    <th>نوع</th>
                    <th>فایل</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($templates as $i => $t)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $t->name }}</td>
                        <td>{{ strtoupper($t->type) }}</td>
                        <td>
                            <a href="{{ asset('storage/'.$t->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                مشاهده
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('certificates.destroy', $t) }}" method="POST"
                                  onsubmit="return confirm('آیا از حذف تمپلیت مطمئن هستید؟')" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bx bx-trash"></i> حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
