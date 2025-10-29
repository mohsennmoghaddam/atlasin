@extends('Admin.layout.master')

@section('content')
    <div class="container" dir="rtl">
        <div class="col-xl-8 mx-auto mt-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">ایجاد نقش جدید</h5>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li class="small">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">نام نقش (role)</label>
                            <input type="text" name="name" id="name"
                                   class="form-control" placeholder="مثلاً: admin, editor, staff"
                                   value="{{ old('name') }}" required>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="bx bx-save"></i> ذخیره
                            </button>
                            <a href="{{ route('role.index') }}" class="btn btn-secondary">
                                بازگشت
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
