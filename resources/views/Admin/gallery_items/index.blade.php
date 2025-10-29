@extends('Admin.layout.master')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h4>لیست آیتم‌های گالری</h4>
            <a href="{{ route('gallery_items.create') }}" class="btn btn-success">افزودن آیتم جدید</a>
        </div>

        <table class="table table-bordered text-center align-middle">
            <thead>
            <tr>
                <th>#</th>
                <th>عکس</th>
                <th>عنوان</th>
                <th>دسته‌بندی</th>
                <th>ترتیب</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><img src="{{ asset('storage/'.$item->image) }}" width="80"></td>
                    <td>{{ $item->title['fa'] }}</td>
                    <td>{{ $item->category?->name['fa'] ?? '-' }}</td>
                    <td>{{ $item->order }}</td>
                    <td>
                        <a href="{{ route('gallery_items.edit', $item) }}" class="btn btn-sm btn-warning">ویرایش</a>
                        <form action="{{ route('gallery_items.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('حذف شود؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $items->links() }}
    </div>
@endsection
