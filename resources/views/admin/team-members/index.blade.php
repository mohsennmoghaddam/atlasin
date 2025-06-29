@extends('admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">لیست اعضای تیم</h5>
                        <a href="{{ route('team-members.create') }}" class="btn btn-light btn-sm">+ افزودن عضو جدید</a>
                    </div>
                    <div class="card-body bg-light">
                        @if($team_members->isEmpty())
                            <p class="text-center text-muted">هیچ عضوی ثبت نشده است.</p>
                        @else
                            <div class="table-responsive mt-2">
                                <table class="table table-striped table-hover align-middle text-center">
                                    <thead class="table-secondary">
                                    <tr>
                                        <th>تصویر</th>
                                        <th>نام</th>
                                        <th>سمت</th>
                                        <th>ایمیل</th>
                                        <th>موبایل</th>
                                        <th>شماره داخلی</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($team_members as $team_member)
                                        <tr>
                                            <td>
                                                @if($team_member->image)
                                                    <img src="{{ asset('storage/' . $team_member->image) }}" width="60" height="60" class="rounded-circle border">
                                                @else
                                                    <span class="text-muted">بدون تصویر</span>
                                                @endif
                                            </td>
                                            <td>{{ $team_member->getTranslation('name', 'fa') }}</td>
                                            <td>{{ $team_member->getTranslation('position', 'fa') }}</td>
                                            <td>
                                                @if($team_member->email)
                                                    <a href="mailto:{{ $team_member->email }}">{{ $team_member->email }}</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>{{ $team_member->mobile ?? '-' }}</td>
                                            <td>{{ $team_member->internal_number ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('team-members.edit', $team_member->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                                <form action="{{ route('team-members.destroy', $team_member->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
