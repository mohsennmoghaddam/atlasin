@extends('admin.layout.master')


@section('content')

    <div class="row" dir="rtl">
        <div style="padding-top:30px;">
            <div class="col-10 col-xl-10" style="margin: auto;">
                <div class="card text-right" style="margin: auto;">
                    <div class="card-header" style="margin: auto;">
                        <h4 class="card-title" style="color:#a626a4">
                            <b>ایجاد دسته بندی صفحه اصلی</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">انتخاب عنوان دسته بندی</label>
                                <select name="category" id="category_id" class="form-control sidebar-item">
                                    <option value="pages" name="pages" >صفحات</option>
                                    <option value="moshaverkonkour" name="moshaverkonkour">مشاور کنکور</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="title">عنوان زیر دسته بندی</label>
                                <input type="text" name="title" class="form-control" placeholder="عنوان" id="title">
                            </div>

                            <div class="mb-6">
                                <label class="form-label" for="category_id">انتخاب زیر دسته بندی</label>
                                <select name="categories_id" id="categories_id" class="form-control sidebar-item" >
                                    <option value="" disabled selected>دسته بندی اصلی را انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="title">لینک دسترسی زیر دسته بندی</label>
                                <input type="text" name="link" class="form-control" placeholder="لینک دسنرسی" id="link">
                            </div>

                            {{--                            </div>--}}

                            {{--                            <div class="mb-3">--}}
                            {{--                                <label class="form-label" for="Description">توضیحات</label>--}}
                            {{--                                <textarea class="form-control" placeholder="Textarea" rows="5" name="Description" id="Description"></textarea>--}}
                            {{--                            </div>--}}

                            <div style="text-align:center; margin-top:20px;">
                                <button type="submit" class="btn btn-primary" style="">ایجاد دسته بندی</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        @if(count($errors->all()) > 0)

            <ul>

                @foreach($errors->all() as $error)
                    <li class="has-error text-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    </div>
@endsection
