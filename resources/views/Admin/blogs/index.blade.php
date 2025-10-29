@extends('Admin.layout.master')

@section('content')
    <div class="container mt-5" style="direction: rtl">
        <h4>لیست مقالات</h4>

        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">مقاله جدید</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>تصویر</th>
                <th>عنوان</th>
                <th>نویسنده</th>
                <th>وضعیت</th>
                <th>تاریخ</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" width="60" height="60">
                        @endif
                    </td>
                    <td>{{ $blog->title['fa'] ?? '-' }}</td>
                    <td>{{ $blog->author->name ?? '-' }}</td>
                    <td>
                    <span class="badge bg-{{ $blog->status === 'published' ? 'success' : 'secondary' }}">
                        {{ $blog->status === 'published' ? 'منتشر شده' : 'پیش‌نویس' }}
                    </span>
                    </td>
                    <td>{{ jdate($blog->created_at)->format('Y/m/d') }}</td>
                    <td>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                              style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('حذف شود؟')">
                                حذف
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
