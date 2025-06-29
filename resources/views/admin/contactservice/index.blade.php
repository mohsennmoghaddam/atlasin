@extends('admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-8 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="mb-0 ئف"><b>جدول سرویس‌های فرم تماس</b></h5>
                        <a href="{{ route('contact-services.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن سرویس جدید
                        </a>
                    </div>

                    <div class="card-body table-responsive mt-2">
                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>عنوان فارسی</th>
                                <th>عنوان انگلیسی</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->getTranslation('title', 'fa') }}</td>
                                    <td>{{ $service->getTranslation('title', 'en') }}</td>
                                    <td>
                                        <a href="{{ route('contact-services.edit', $service) }}" class="btn btn-warning btn-sm">
                                            <i class="bx bx-edit"></i> ویرایش
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('contact-services.destroy', $service) }}" method="POST" onsubmit="return confirm('آیا از حذف این سرویس مطمئن هستید؟');">
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
