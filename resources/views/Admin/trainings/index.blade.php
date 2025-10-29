@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid mt-5" dir="rtl" style="font-family:IRANSansWeb">
        <div class="col-xl-10 mx-auto">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-primary fw-bold">مدیریت دوره‌ها</h4>
                <a href="{{ route('trainings.create') }}" class="btn btn-success shadow-sm">
                    <i class="bx bx-plus-circle"></i> ایجاد دوره جدید
                </a>
            </div>

            {{-- پیام موفقیت --}}
            @if(session('ok'))
                <div class="alert alert-success shadow-sm">{{ session('ok')}}</div>
            @endif

            {{-- جدول دوره‌ها --}}
            <div class="card shadow rounded-3 border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0 text-center">
                            <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th class="text-start">عنوان دوره</th>
                                <th>تاریخ برگزاری</th>
                                <th>مدت (ساعت)</th>
                                <th>جلسات</th>
                                <th>وضعیت</th>
                                <th style="width: 220px;">عملیات</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($trainings as $i => $t)
                                <tr>
                                    <td>{{ $trainings->firstItem() + $i }}</td>
                                    <td class="text-start fw-semibold">{{ $t->title['fa'] ?? '-' }}</td>
                                    <td>
                                        @if($t->start_date && $t->end_date)
                                            {{ $t->start_date }} تا {{ $t->end_date }}
                                        @else
                                            <span class="text-muted small">نامشخص</span>
                                        @endif
                                    </td>
                                    <td>{{ $t->duration_hours ?? '-' }}</td>
                                    <td>{{ $t->total_sessions }}</td>
                                    <td>
                                        <span class="badge bg-{{ ['draft'=>'secondary','open'=>'success','closed'=>'dark'][$t->status] }}">
                                            {{ ['draft'=>'پیش‌نویس','open'=>'باز','closed'=>'بسته'][$t->status] }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('trainings.show',$t) }}" class="btn btn-sm btn-info">
                                                <i class="bx bx-show"></i> جزئیات
                                            </a>
                                            <a href="{{ route('trainings.edit',$t) }}" class="btn btn-sm btn-warning">
                                                <i class="bx bx-edit"></i> ویرایش
                                            </a>
                                            <form action="{{ route('trainings.destroy',$t) }}" method="post"
                                                  class="d-inline" onsubmit="return confirm('آیا از حذف این دوره مطمئن هستید؟')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bx bx-trash"></i> حذف
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-muted py-4">هیچ دوره‌ای ثبت نشده است.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- صفحه‌بندی --}}
                <div class="card-footer bg-light border-top-0">
                    <div class="d-flex justify-content-center">
                        {{ $trainings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
