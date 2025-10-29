@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="col-xl-10 mt-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><b>جدول اسلایدرها</b></h5>
                        <a href="{{ route('slider.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن اسلایدر جدید
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead class="table-light">
                            <tr>
                                <th>شماره</th>
                                <th>عنوان (زبان فعلی)</th>
                                <th>توضیح (FA)</th>
                                <th>توضیح (EN)</th>
                                <th>ترتیب</th>
                                <th>تصویر</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->getTranslation('description', 'fa') }}</td>
                                    <td>{{ $slider->getTranslation('description', 'en') }}</td>
                                    <td>{{ $slider->order }}</td>
                                    <td>
                                        @if($slider->image)
                                            <img src="{{ asset('storage/' . $slider->image) }}" alt="image" width="80"
                                                 class="rounded shadow-sm">
                                        @else
                                            <span class="text-muted">ندارد</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('slider.edit', $slider) }}" class="btn btn-warning btn-sm">
                                            <i class="bx bx-edit"></i> ویرایش
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('slider.destroy', $slider) }}" method="POST"
                                              onsubmit="return confirm('آیا از حذف اسلایدر مطمئن هستید؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
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
            </div>
        </div>
    </div>
@endsection
