@extends('admin.layout.master')

@section('content')

    <div class="row" dir="rtl">
        <div class="col-10 col-xl-8" style="padding-top:50px; margin:auto;">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="card-title" style="color:#a626a4"><b>ایجاد اسلایدر</b></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- عنوان --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label">عنوان (FA)</label>
                                <input type="text" name="title_fa" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Title (EN)</label>
                                <input type="text" name="title_en" class="form-control">
                            </div>
                        </div>

                        {{-- توضیحات --}}
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label class="form-label">توضیح (FA)</label>
                                <textarea name="description_fa" class="form-control"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Description (EN)</label>
                                <textarea name="description_en" class="form-control"></textarea>
                            </div>
                        </div>

                        {{-- ترتیب --}}
                        <div class="row mt-3">
                            <div class="col-sm-4">
                                <label class="form-label">ترتیب نمایش</label>
                                <input type="number" name="order" class="form-control" value="0">
                            </div>
                        </div>

                        {{-- تصویر --}}
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label class="form-label">آپلود تصویر</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">ذخیره اسلایدر</button>
                        </div>
                    </form>

                    {{-- نمایش خطاها --}}
                    @if($errors->any())
                        <ul class="text-danger mt-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
