@extends('admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="mb-0"><b>سؤالات متداول</b></h5>
                        <a href="{{ route('faqs.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن سؤال
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>کتگوری</th>
                                <th>سؤال (FA)</th>
                                <th>Question (EN)</th>
                                <th>ترتیب</th>
                                <th>وضعیت</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->category?->title['fa'] ?? $row->category?->title['en'] ?? '— کلی —' }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($row->question['fa'] ?? '', 40) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($row->question['en'] ?? '', 40) }}</td>
                                    <td>{{ $row->order }}</td>
                                    <td>
                  <span class="badge {{ $row->is_active ? 'bg-success':'bg-secondary' }}">
                    {{ $row->is_active ? 'فعال' : 'غیرفعال' }}
                  </span>
                                    </td>
                                    <td><a href="{{ route('faqs.edit', $row) }}" class="btn btn-warning btn-sm">ویرایش</a></td>
                                    <td>
                                        <form action="{{ route('faqs.destroy', $row) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
