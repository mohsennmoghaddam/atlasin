@extends('admin.layout.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow rounded-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">ایجاد بیمارستان جدید</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('hospitals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">نام بیمارستان <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="website" class="form-label">لینک سایت</label>
                                    <input type="url" name="website" class="form-control" value="{{ old('website') }}">
                                    @error('website')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">توضیح مختصر</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="مثلاً معرفی کوتاه از بیمارستان...">{{ old('description') }}</textarea>
                                @error('description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">تصویر بیمارستان <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" accept="image/*" required>
                                @error('image')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">ذخیره</button>
                                <a href="{{ route('hospitals.index') }}" class="btn btn-secondary">بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
