@extends('admin.layout.master')

@section('content')

    <div class="container mt-4" dir="rtl">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">مشاهده پیام کاربر</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>شماره</th>
                        <td>{{ $contact->id }}</td>
                    </tr>
                    <tr>
                        <th>نام</th>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th>ایمیل</th>
                        <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                    </tr>
                    <tr>
                        <th>موبایل</th>
                        <td><a href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a></td>
                    </tr>
                    <tr>
                        <th>موضوع</th>
                        <td>
                            @if($contact->contactService)
                                {{ app()->getLocale() == 'fa' ? $contact->contactService->getTranslation('title', 'fa') : $contact->contactService->getTranslation('title', 'en') }}
                            @else
                                <span class="text-muted">نامشخص</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>متن پیام</th>
                        <td>{{ $contact->message }}</td>
                    </tr>
                    <tr>
                        <th>وضعیت</th>
                        <td>
                            @if($contact->status == 'new')
                                <span class="badge bg-warning text-dark">جدید</span>
                            @elseif($contact->status == 'read')
                                <span class="badge bg-info">خوانده شده</span>
                            @elseif($contact->status == 'answered')
                                <span class="badge bg-success">پاسخ داده شده</span>
                            @else
                                <span class="badge bg-secondary">نامشخص</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
