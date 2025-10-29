@extends('Admin.layout.master')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>لیست دسته‌بندی‌های گالری</h4>
            <a href="{{ route('gallery-categories.create') }}" class="btn btn-success">ایجاد دسته‌بندی جدید</a>
        </div>

        <div class="card shadow">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>عنوان فارسی</th>
                    <th>عنوان انگلیسی</th>
                    <th>تصویر</th>
                    <th>slug</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td>{{ $cat->name['fa'] ?? '' }}</td>
                        <td>{{ $cat->name['en'] ?? '' }}</td>
                        <td>
                            @if($cat->cover_image)
                                <img src="{{ asset('storage/'.$cat->cover_image) }}" width="60" height="60" class="rounded">
                            @endif
                        </td>
                        <td>{{ $cat->slug }}</td>
                        <td>
                            <a href="{{ route('gallery-categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                            <form action="{{ route('gallery-categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('حذف شود؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
