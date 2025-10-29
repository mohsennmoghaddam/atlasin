@extends('Admin.layout.master')

@section('content')
    <div class="row" dir="rtl">
        <div>
            <div style="padding-top:50px;padding-bottom:200px">
                <div class="col-12 col-xl-7 col-sm" style="margin: auto;">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="card-title"><b>ایجاد سرویس تماس</b></h4>
                            <h6 class="card-subtitle text-muted"></h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('contact-services.store') }}" method="post">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label" for="title_fa">عنوان فارسی</label>
                                    <input type="text" name="title_fa" class="form-control"
                                           placeholder="مثلاً: سیستم اکسیژن" id="title_fa"
                                           value="{{ old('title_fa') }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="title_en">عنوان انگلیسی</label>
                                    <input type="text" name="title_en" class="form-control"
                                           placeholder="e.g. Oxygen System" id="title_en" value="{{ old('title_en') }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success" style="margin:auto;">ثبت سرویس
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="has-error text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
