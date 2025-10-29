@extends('Admin.layout.master')

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
                        <th>ایمیل</th>
                        <td class="d-flex align-items-center gap-2">
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>

                            <a
                                    href="#"
                                    id="replyOutlookBtn"
                                    class="btn btn-sm btn-success"
                                    data-to="{{ $contact->email }}"
                                    data-name="{{ $contact->name }}"
                            >
                                پاسخ در Outlook (دسکتاپ)
                            </a>
                        </td>
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


    <script>
        (function () {
            const btn = document.getElementById('replyOutlookBtn');
            if (!btn) return;

            btn.addEventListener('click', async function (e) {
                e.preventDefault();

                const to = encodeURIComponent(btn.dataset.to || '');
                const name = btn.dataset.name ? 'سلام ' + btn.dataset.name + '،\n\n' : 'سلام،\n\n';
                const subject = encodeURIComponent('پاسخ به درخواست شما');
                const body = encodeURIComponent(name);

                const mailtoLink = `mailto:${to}?subject=${subject}&body=${body}`;

                try {
                    // 1) اول وضعیت را answered کن (با keepalive تا حتی اگر صفحه فوکوس از دست بدهد، ارسال شود)
                    await fetch('{{ route('contact.answered', $contact) }}', {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        keepalive: true    // نکته‌ی مهم برای قابل‌اعتماد شدن
                    });

                    // اگر روی صفحه badge وضعیت دارید، اینجا هم به‌روز کنید (اختیاری)
                    const badge = document.querySelector('[data-contact-status]');
                    if (badge) {
                        badge.className = 'badge bg-success';
                        badge.textContent = 'پاسخ داده شده';
                    }
                } catch (err) {
                    // اگر شکست خورد هم اجازه بده ایمیل باز شود
                    console.error(err);
                } finally {
                    // 2) بعد از آپدیت، Outlook دسکتاپ را از طریق mailto باز کن
                    window.location.href = mailtoLink;
                }
            });
        })();
    </script>

@endsection
