@extends('admin.layout.master')

@section('content')

    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-warning text-white">
                        <h5 class="mb-0"><b>شماتیک/بنر کتگوری‌های بیمارستانی</b></h5>
                        <a href="{{ route('hospital-schematics.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن شماتیک
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>کتگوری</th>
                                <th>تصویر</th>
                                <th>ترتیب</th>
                                <th>وضعیت</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->category->title['fa'] ?? $row->category->title['en'] ?? '---' }}</td>
                                    <td>
                                        @if($row->image)
                                            <img src="{{ asset('storage/'.$row->image) }}" width="120" height="70" class="rounded" style="object-fit:cover">
                                        @endif
                                    </td>
                                    <td>{{ $row->order }}</td>
                                    <td>
                  <span class="badge {{ $row->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $row->is_active ? 'فعال' : 'غیرفعال' }}
                  </span>
                                    </td>
                                    <td><a href="{{ route('hospital-schematics.edit', $row) }}" class="btn btn-warning btn-sm">ویرایش</a></td>
                                    <td>
                                        <form action="{{ route('hospital-schematics.destroy', $row) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
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
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-success text-white">
                        <h5 class="mb-0"><b>توضیح مختصر (محصولات بیمارستانی)</b></h5>
                        <a href="{{ route('hospital-summaries.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن سکشن
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>کتگوری</th>
                                <th>عنوان (FA)</th>
                                <th>عنوان (EN)</th>
                                <th>متن (FA)</th>
                                <th>متن (EN)</th>
                                <th>ترتیب</th>
                                <th>وضعیت</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($summaries as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->category->title['fa'] ?? $row->category->title['en'] ?? $row->category->slug }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($row->title['fa'] ?? ''), 30) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($row->title['en'] ?? ''), 30) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($row->body['fa'] ?? ''), 50) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($row->body['en'] ?? ''), 50) }}</td>
                                    <td>{{ $row->order }}</td>
                                    <td>
                  <span class="badge {{ $row->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $row->is_active ? 'فعال' : 'غیرفعال' }}
                  </span>
                                    </td>
                                    <td><a href="{{ route('hospital-summaries.edit', $row) }}" class="btn btn-warning btn-sm">ویرایش</a></td>
                                    <td>
                                        <form action="{{ route('hospital-summaries.destroy', $row) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
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
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-danger text-white">
                        <h5 class="mb-0"><b>اجرا / اجزای دستگاه (Stages)</b></h5>
                        <a href="{{ route('hospital-stages.create') }}" class="btn btn-light btn-sm"><i class="bx bx-plus-circle"></i> افزودن آیتم</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th><th>کتگوری</th><th>تصویر</th>
                                <th>عنوان (FA)</th><th>عنوان (EN)</th>
                                <th>ترتیب</th><th>وضعیت</th><th>ویرایش</th><th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stage as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->category->title['fa'] ?? $row->category->title['en'] ?? $row->category->slug }}</td>
                                    <td>@if($row->image)<img src="{{ asset('storage/'.$row->image) }}" width="110" height="70" style="object-fit:cover" class="rounded">@endif</td>
                                    <td>{{ $row->title['fa'] ?? '' }}</td>
                                    <td>{{ $row->title['en'] ?? '' }}</td>
                                    <td>{{ $row->order }}</td>
                                    <td><span class="badge {{ $row->is_active?'bg-success':'bg-secondary' }}">{{ $row->is_active?'فعال':'غیرفعال' }}</span></td>
                                    <td><a href="{{ route('hospital-stages.edit',$row) }}" class="btn btn-warning btn-sm">ویرایش</a></td>
                                    <td>
                                        <form action="{{ route('hospital-stages.destroy',$row) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
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
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="mb-0"><b>کاتالوگ‌های کتگوری‌های بیمارستانی</b></h5>
                        <a href="{{ route('hospital-catalogs.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن کاتالوگ
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>کتگوری</th>
                                <th>عنوان (FA)</th>
                                <th>Title (EN)</th>
                                <th>فایل</th>
                                <th>ترتیب</th>
                                <th>وضعیت</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cataloge as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->category->title['fa'] ?? $row->category->title['en'] ?? $row->category->slug }}</td>
                                    <td>{{ $row->title['fa'] ?? '' }}</td>
                                    <td>{{ $row->title['en'] ?? '' }}</td>
                                    <td>
                                        @if($row->file)
                                            <a class="btn btn-outline-primary btn-sm" target="_blank" href="{{ asset('storage/'.$row->file) }}">دانلود</a>
                                        @endif
                                    </td>
                                    <td>{{ $row->order }}</td>
                                    <td>
                  <span class="badge {{ $row->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $row->is_active ? 'فعال' : 'غیرفعال' }}
                  </span>
                                    </td>
                                    <td><a href="{{ route('hospital-catalogs.edit', $row) }}" class="btn btn-warning btn-sm">ویرایش</a></td>
                                    <td>
                                        <form action="{{ route('hospital-catalogs.destroy', $row) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">

                    <div class="card-header d-flex justify-content-between align-items-center bg-danger text-white">
                        <h5 class="mb-0"><b>گالری کتگوری‌های بیمارستانی</b></h5>
                        <a href="{{ route('hospital-gallery.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن تصویر جدید
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>عنوان (FA)</th>
                                <th>عنوان (EN)</th>
                                <th>کتگوری</th>
                                <th>ترتیب</th>
                                <th>وضعیت</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($gallery as $i => $item)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset('storage/'.$item->image) }}" width="110" height="70" class="rounded" style="object-fit:cover">
                                        @endif
                                    </td>
                                    <td>{{ $item->title['fa'] ?? '' }}</td>
                                    <td>{{ $item->title['en'] ?? '' }}</td>
                                    <td>{{ $item->category->title['fa'] ?? $item->category->title['en'] ?? $item->category->slug }}</td>
                                    <td>{{ $item->order }}</td>
                                    <td>
                    <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                      {{ $item->is_active ? 'فعال' : 'غیرفعال' }}
                    </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('hospital-gallery.edit', $item) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('hospital-gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="9" class="text-muted">موردی ثبت نشده است.</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
