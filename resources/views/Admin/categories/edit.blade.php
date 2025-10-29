@extends('Admin.layout.master')
@section('content')

    {{--    <div class="col-sm-12 col-xl-6" style="margin-left: 400px">--}}
    {{--    <div class="card-body" dir="rtl" style="padding-top: 40px",>--}}
    {{--    <div class="form-group">--}}

    {{--        <form action="adminpanel/categories/store">--}}
    {{--            @csrf--}}
    {{--            <div class="mb-3">--}}
    {{--                <label class="form-label" for="tilte">نام دسته</label>--}}
    {{--                <input type="text" name="title" class="form-control" placeholder="" id="title">--}}
    {{--            </div>--}}

    {{--            <div class="mb-3">--}}
    {{--                <label class="form-label">Textarea</label>--}}
    {{--                <textarea class="form-control" placeholder="Textarea" rows="1"></textarea>--}}
    {{--            </div>--}}
    {{--            <div class="mb-3">--}}
    {{--                <label class="form-label w-100">File input</label>--}}
    {{--                <input type="file">--}}
    {{--                <small class="form-text text-muted">Example block-level help text here.</small>--}}
    {{--            </div>--}}
    {{--            <div class="mb-3">--}}
    {{--                <label class="form-check m-0">--}}
    {{--                    <input type="checkbox" class="form-check-input">--}}
    {{--                    <span class="form-check-label">Check me out</span>--}}
    {{--                </label>--}}
    {{--            </div>--}}
    {{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
    {{--        </form>--}}
    {{--    </div>--}}
    {{--    </div>--}}
    {{--    </div>--}}
    {{--    </div>--}}
    {{--    </div>--}}

    <div class="row text-right" dir="rtl">
        <div style="padding-top: 50px; margin: auto;">
            <div class="col-10 col-xl-10" style="margin:auto;">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color:#a626a4"><b>ویرایش دسته بندی ها</b></h4>
                        <h6 class="card-subtitle text-muted"></h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('categories.update', $category)}}" method="post">
                            @csrf

                            @method('PATCH')

                            <div class="mb-3">
                                <label class="form-label" for="title"> ویرایش عنوان {{$category->title}} </label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="ویرایش {{$category->title}}" id="title"
                                       value="{{$category->title}}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for=""></label>
                                <select name="categories_id" id="categories" class="form-control sidebar-item">
                                    <option value="categories">اصلاح دسته بندی اصلی</option>
                                    @foreach($categories as $parent)
                                        <option
                                                @if($parent->id == $category->category_id )
                                                    selected
                                                @endif
                                                value="{{$parent->id}}">{{$parent->title}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label class="form-label" for="link">اصلاح لینک مربوط</label>
                                    <input type="text" name="link" class="form-control"
                                           placeholder="{{$category->link}}" id="link" value="{{$category->link}}">
                                    <br>
                                    {{--                                    <input type="submit" class="hidden-lg btn btn-sm btn-danger"  id="delete" value="{{$category->link}}">--}}
                                </div>

                                {{--                                <div class="mb-3 form-group" >--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-sm-6">--}}
                                {{--                                            <label class="form-label w-100" for="image">تغییر عکس یا فایل</label>--}}
                                {{--                                            <input type="file" name="image" id="image" class="form-control">--}}
                                {{--                                            <small class="form-text text-muted"></small>--}}
                                {{--                                        </div>--}}
                                {{--                                        <br>--}}
                                {{--                                        <div class="col-sm-6">--}}
                                {{--                                            <br>--}}
                                {{--                                            <img src="{{str_replace('public', '/storage',$category->image)}}" width="400 px">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                            <button type="submit" class="btn btn-warning btn-lg btn-block" style="margin-right:2px">
                                تغییر دسته بندی
                            </button>
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

@endsection


