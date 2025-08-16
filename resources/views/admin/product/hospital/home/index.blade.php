@extends('admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="mb-0"><b>سکشن‌های متنی (محصولات بیمارستانی)</b></h5>
                        <a href="{{ route('hospital-texts.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن سکشن
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>کلید</th>
                                <th>عنوان (FA)</th>
                                <th>عنوان (EN)</th>
                                <th>خلاصه متن (FA)</th>
                                <th>خلاصه متن (EN)</th>
                                <th>ترتیب</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sections as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->key }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($row->title['fa'] ?? ''), 40) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($row->title['en'] ?? ''), 40) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($row->body['fa'] ?? ''), 60) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($row->body['en'] ?? ''), 60) }}</td>
                                    <td>{{ $row->order }}</td>
                                    <td><a href="{{ route('hospital-texts.edit', $row) }}" class="btn btn-warning btn-sm">ویرایش</a></td>
                                    <td>
                                        <form action="{{ route('hospital-texts.destroy', $row) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
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
                    <div class="card-header d-flex justify-content-between align-items-center bg-warning text-white">
                        <h5 class="mb-0"><b>دسته‌بندی‌های بیمارستانی</b></h5>
                        <a href="{{ route('hospital-category.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن دسته
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>آیکون</th>
                                <th>نام (FA)</th>
                                <th>نام (EN)</th>
                                <th>زیرعنوان (FA)</th>
                                <th>Slug</th>
                                <th>ترتیب</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>@if($c->icon)<img src="{{ asset('storage/'.$c->icon) }}" width="70" height="70" class="rounded-circle" style="object-fit:cover">@endif</td>
                                    <td>{{ $c->title['fa'] ?? '' }}</td>
                                    <td>{{ $c->title['en'] ?? '' }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($c->subtitle['fa'] ?? '', 30) }}</td>
                                    <td>{{ $c->slug }}</td>
                                    <td>{{ $c->order }}</td>
                                    <td><a href="{{ route('hospital-category.edit',$c) }}" class="btn btn-warning btn-sm">ویرایش</a></td>
                                    <td>
                                        <form action="{{ route('hospital-category.destroy',$c) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
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



