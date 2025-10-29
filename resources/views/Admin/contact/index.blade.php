@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-10 mt-4">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><b>جدول پیام‌های دریافتی از ارتباط با ما</b></h5>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>موبایل</th>
                                <th>موضوع درخواست</th>
                                <th>ایمیل</th>
                                <th>وضعیت</th>
                                <th>مشاهده</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $locale = app()->getLocale(); @endphp
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->mobile }}</td>
                                    <td>
                                        {{ $contact->contactService?->getTranslation('title', $locale) ?? '-' }}
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                    </td>
                                    <td>
                                        @switch($contact->status)
                                            @case('new')
                                                <span class="badge bg-warning text-dark">جدید</span>
                                                @break
                                            @case('read')
                                                <span class="badge bg-info text-dark">خوانده شده</span>
                                                @break
                                            @case('answered')
                                                <span class="badge bg-success">پاسخ داده شده</span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">نامشخص</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('contact.show', $contact) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bx bx-show"></i> مشاهده
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('contact.destroy', $contact) }}" method="post"
                                              onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید حذف کنید؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bx bx-trash"></i> حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{-- صفحه‌بندی در صورت نیاز --}}
                        {{-- <div class="mt-3">{{ $contacts->links() }}</div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
