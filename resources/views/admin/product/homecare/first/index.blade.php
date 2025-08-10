@extends('admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="mb-0"><b>جدول بخش‌های محصولات خانگی</b></h5>
                        <a href="{{ route('homecare.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن بخش جدید
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>عنوان (FA)</th>
                                <th>عنوان (EN)</th>
                                <th>متن (FA)</th>
                                <th>متن (EN)</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($homecare as $section)
                                @php
                                    $title = $section->title;
                                    $body = $section->body;
                                @endphp
                                <tr>
                                    <td>{{ $section->id }}</td>
                                    <td>{{ Str::limit($title['fa'] ?? '', 30) }}</td>
                                    <td>{{ Str::limit($title['en'] ?? '', 30) }}</td>
                                    <td>{{ Str::limit($body['fa'] ?? '', 40) }}</td>
                                    <td>{{ Str::limit($body['en'] ?? '', 40) }}</td>
                                    <td>
                                        <a href="{{ route('homecare.edit', $section) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('homecare.destroy', $section) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">حذف</button>
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
    {{-- اسلایدر --}}
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-warning text-white">
                        <h5 class="mb-0"><b>اسلایدهای محصولات خانگی</b></h5>
                        <a href="{{ route('homecare-sliders.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن اسلاید جدید
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
                                <th>متن (FA)</th>
                                <th>متن (EN)</th>
                                <th>لینک</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $homecare_slider)
                                <tr>
                                    <td>{{ $homecare_slider->id }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $homecare_slider->image) }}" width="100" height="60" class="rounded">
                                    </td>
                                    <td>{{ $homecare_slider->title['fa'] ?? '' }}</td>
                                    <td>{{ $homecare_slider->title['en'] ?? '' }}</td>
                                    <td>{{ $homecare_slider->subtitle['fa'] ?? '' }}</td>
                                    <td>{{ $homecare_slider->subtitle['en'] ?? '' }}</td>
                                    <td>{{ $homecare_slider->link ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('homecare-sliders.edit', $homecare_slider->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('homecare-sliders.destroy', $homecare_slider) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">حذف</button>
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
    {{-- فلش‌کارت‌ها --}}
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-success text-white">
                        <h5 class="mb-0"><b>فلش‌کارت‌های محصولات خانگی</b></h5>
                        <a href="{{ route('homecare-cards.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن کارت جدید
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
                                <th>توضیح (FA)</th>
                                <th>توضیح (EN)</th>
                                <th>لینک</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cards as $homecare_card)
                                @php
                                    $title = json_decode($homecare_card->title, true);
                                    $description = json_decode($homecare_card->description, true);
                                @endphp
                                <tr>
                                    <td>{{ $homecare_card->id }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $homecare_card->icon) }}" width="100" height="60" class="rounded">
                                    </td>
                                    <td>{{ $title['fa'] ?? '' }}</td>
                                    <td>{{ $title['en'] ?? '' }}</td>
                                    <td>{{ $description['fa'] ?? '' }}</td>
                                    <td>{{ $description['en'] ?? '' }}</td>
                                    <td>{{ $homecare_card->slug ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('homecare-cards.edit', $homecare_card->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('homecare-cards.destroy', $homecare_card) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">حذف</button>
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
    {{-- نوشته ها --}}
    <div class="container-fluid" dir="rtl">
            <div class="row justify-content-center">
                <div class="col-xl-11 mt-4">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                            <h5 class="mb-0"><b>سکشن‌های متن Homecare</b></h5>
                            <a href="{{ route('homecare-texts.create') }}" class="btn btn-light btn-sm">
                                <i class="bx bx-plus-circle"></i> ایجاد سکشن
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
                                    <th>ترتیب</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($texts as $t)
                                    <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->key }}</td>
                                        <td>{{ $t->title['fa'] ?? '-' }}</td>
                                        <td>{{ $t->title['en'] ?? '-' }}</td>
                                        <td>{{ $t->order }}</td>
                                        <td><a href="{{ route('homecare-texts.edit',$t) }}" class="btn btn-sm btn-warning">ویرایش</a></td>
                                        <td>
                                            <form action="{{ route('homecare-texts.destroy',$t) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger">حذف</button>
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
                            <h5 class="mb-0"><b>فلش‌کارت‌های محصول</b></h5>
                            <a href="{{ route('homecare-features.create') }}" class="btn btn-light btn-sm">
                                <i class="bx bx-plus-circle"></i> افزودن
                            </a>
                        </div>

                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>تصویر</th>
                                    <th>نام (FA)</th>
                                    <th>نام (EN)</th>
                                    <th>مدل (FA)</th>
                                    <th>مدل (EN)</th>
                                    <th>کاتالوگ</th>
                                    <th>ترتیب</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($features as $f)
                                    <tr>
                                        <td>{{ $f->id }}</td>
                                        <td>@if($f->image)<img src="{{ asset('storage/'.$f->image) }}" width="70" height="70" class="rounded-circle">@endif</td>
{{--                                        <td>{{ $f->title['fa'] ?? '' }}</td>--}}
{{--                                        <td>{{ $f->title['en'] ?? '' }}</td>--}}
{{--                                        <td>{{ $f->model_title['fa'] ?? '' }}</td>--}}
{{--                                        <td>{{ $f->model_title['en'] ?? '' }}</td>--}}
                                        <td>{{ Str::limit(strip_tags($f->title['fa'] ?? ''), 40) }}</td>
                                        <td>{{ Str::limit(strip_tags($f->intro['fa'] ?? ''), 60) }}</td>
                                        <td>{{ Str::limit(strip_tags($f->model_title['fa'] ?? ''), 40) }}</td>
                                        <td>{{ Str::limit(strip_tags($f->specs['fa'] ?? ''), 60) }}</td>
                                        <td>@if($f->catalog)<a target="_blank" href="{{ asset('storage/'.$f->catalog) }}" class="btn btn-info btn-sm">دانلود</a>@endif</td>
                                        <td>{{ $f->order }}</td>
                                        <td><a href="{{ route('homecare-features.edit',$f) }}" class="btn btn-warning btn-sm">ویرایش</a></td>
                                        <td>
                                            <form action="{{ route('homecare-features.destroy',$f) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
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
                    <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                        <h5 class="mb-0"><b>گروه ماسک‌ها</b></h5>
                        <a href="{{ route('homecare-mask-categories.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن گروه
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>عنوان (FA)</th>
                                <th>عنوان (EN)</th>
                                <th>تعداد تصاویر</th>
                                <th>ترتیب</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($maskCategories as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->title['fa'] ?? '' }}</td>
                                    <td>{{ $c->title['en'] ?? '' }}</td>
                                    <td>{{ $c->items_count }}</td>
                                    <td>{{ $c->order }}</td>
                                    <td><a href="{{ route('homecare-mask-categories.edit', $c) }}" class="btn btn-warning btn-sm">ویرایش</a></td>
                                    <td>
                                        <form action="{{ route('homecare-mask-categories.destroy', $c) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
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
