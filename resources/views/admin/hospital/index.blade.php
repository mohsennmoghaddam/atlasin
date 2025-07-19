@extends('admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <div class="col-xl-10 mx-auto mt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-primary fw-bold">لیست بیمارستان‌ها</h4>
                <a href="{{ route('hospitals.create') }}" class="btn btn-success">
                    <i class="bx bx-plus-circle"></i> افزودن جدید
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                @forelse($hospitals as $hospital)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($hospital->image)
                                <img src="{{ asset('storage/' . $hospital->image) }}" class="card-img-top" alt="{{ $hospital->name }}">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $hospital->name }}</h5>
                                <p class="text-muted small">{{ Str::limit($hospital->description, 80) }}</p>
                                @if($hospital->website)
                                    <a href="{{ $hospital->website }}" class="btn btn-outline-primary btn-sm mb-2" target="_blank">
                                        <i class="bx bx-link-external"></i> مشاهده سایت
                                    </a>
                                @endif
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('hospitals.edit', $hospital) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit"></i> ویرایش
                                </a>

                                <form action="{{ route('hospitals.destroy', $hospital) }}" method="POST" class="d-inline-block" onsubmit="return confirm('آیا مطمئن هستید؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bx bx-trash"></i> حذف
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center">هیچ بیمارستانی ثبت نشده است.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
