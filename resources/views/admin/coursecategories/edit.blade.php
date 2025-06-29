@extends('admin.layout.master')


@section('content')

    <div class="row" dir="rtl">
        <div style="padding-top:50px; padding-bottom:100px">
            <div class="col-12 col-xl-8 col-sm" style="margin:auto;">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color: #a626a4"><b>جدول تععیر دوره </b></h4>
                        <h6 class="card-subtitle text-muted"></h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('CourseCategories.update', $CourseCategory)}}" method="post" >
                            @csrf
                            @method('PATCH')
                            <div class="mb-2">
                                <label class="form-label" for="value">نام دوره</label>
                                <input type="text"  name="title" class="form-control" placeholder="" id="name" value="{{$CourseCategory->title}}">

                                <label class="form-label" for="">اصلاح دسته بندی </label>
                                <select name="course_categories_id" id="course_categories_id" class="form-control sidebar-item" >
                                    <option value="{{$CourseCategory->course_categories_id}}" >اصلاح دسته بندی اصلی</option>
                                    @foreach($courseCategories as $parent)
                                        <option
                                                @if($parent->id == $CourseCategory->course_categories_id )
                                                selected
                                                @endif
                                                value="{{$parent->id}}">{{$parent->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin:auto;">ثبت</button>
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


