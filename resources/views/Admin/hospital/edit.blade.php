@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow rounded-3">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0">ویرایش بیمارستان: {{ $hospital->name }}</h5>
                    </div>

                    <div class="card-body">
                        {{--                        <form action="{{ route('hospitals.update', $hospital) }}" method="POST" enctype="multipart/form-data">--}}
                        {{--                            @csrf--}}
                        {{--                            @method('PUT')--}}

                        {{--                            <div class="row mb-3">--}}
                        {{--                                <div class="col-md-6">--}}
                        {{--                                    <label class="form-label">نام بیمارستان <span class="text-danger">*</span></label>--}}
                        {{--                                    <input type="text" name="name" class="form-control" value="{{ old('name', $hospital->name) }}" required>--}}
                        {{--                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror--}}
                        {{--                                </div>--}}

                        {{--                                <div class="col-md-6">--}}
                        {{--                                    <label class="form-label">لینک سایت</label>--}}
                        {{--                                    <input type="url" name="website" class="form-control" value="{{ old('website', $hospital->website) }}">--}}
                        {{--                                    @error('website') <small class="text-danger">{{ $message }}</small> @enderror--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="mb-3">--}}
                        {{--                                <label class="form-label">توضیح مختصر</label>--}}
                        {{--                                <textarea name="description" class="form-control" rows="3">{{ old('description', $hospital->description) }}</textarea>--}}
                        {{--                                @error('description') <small class="text-danger">{{ $message }}</small> @enderror--}}
                        {{--                            </div>--}}

                        {{--                            <div class="mb-3">--}}
                        {{--                                <label class="form-label">تصویر فعلی:</label><br>--}}
                        {{--                                @if($hospital->image)--}}
                        {{--                                    <img src="{{ asset('storage/' . $hospital->image) }}" alt="hospital image" width="120" class="rounded mb-2">--}}
                        {{--                                @endif--}}
                        {{--                                <input type="file" name="image" class="form-control mt-2">--}}
                        {{--                                @error('image') <small class="text-danger">{{ $message }}</small> @enderror--}}
                        {{--                            </div>--}}

                        {{--                            <div class="text-end">--}}
                        {{--                                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>--}}
                        {{--                                <a href="{{ route('hospitals.index') }}" class="btn btn-secondary">بازگشت</a>--}}
                        {{--                            </div>--}}
                        {{--                        </form>--}}
                        <form action="{{ route('hospitals.update', $hospital) }}" method="POST"
                              enctype="multipart/form-data" dir="rtl">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">نام بیمارستان <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control text-end"
                                           value="{{ old('name', $hospital->name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">لینک سایت</label>
                                    <input type="url" name="website" class="form-control text-end"
                                           value="{{ old('website', $hospital->website) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">توضیح مختصر</label>
                                    <textarea name="description" class="form-control"
                                              rows="3">{{ old('description', $hospital->description) }}</textarea>
                                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">تصویر فعلی:</label><br>
                                    @if($hospital->image)
                                        <img src="{{ asset('storage/' . $hospital->image) }}" alt="hospital image"
                                             width="120" class="rounded mb-2">
                                    @endif
                                    <input type="file" name="image" class="form-control mt-2">
                                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                                <a href="{{ route('hospitals.index') }}" class="btn btn-secondary">بازگشت</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

