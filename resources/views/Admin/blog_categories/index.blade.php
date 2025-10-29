@extends('Admin.layout.master')

@section('content')
    <div class="container mt-5" style="direction: rtl">
        <h4>دسته‌بندی‌های وبلاگ</h4>

        <a href="{{ route('blogs-category.create') }}" class="btn btn-primary mb-3">افزودن دسته‌بندی جدید</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>نام (فارسی)</th>
                <th>نام (انگلیسی)</th>
                <th>Slug</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->name['fa'] ?? '' }}</td>
                    <td>{{ $cat->name['en'] ?? '' }}</td>
                    <td>{{ $cat->slug }}</td>
                    <td>
                        <a href="{{ route('blogs-category.edit', $cat->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                        <form action="{{ route('blogs-category.destroy', $cat->id) }}" method="POST"
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

        {{ $categories->links() }}
    </div>
@endsection
