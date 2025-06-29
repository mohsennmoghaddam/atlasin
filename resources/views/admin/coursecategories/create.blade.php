@extends('admin.layout.master')
@section('content')

    <div class="row" dir="rtl">
        <div>
            <div style="padding-top:50px;padding-bottom:200px" >
                <div class="col-12 col-xl-7 col-sm" style="margin: auto;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>جدول ایجاد دوره</b></h4>
                            <h6 class="card-subtitle text-muted"></h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('CourseCategories.store')}}" method="post" >
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label" for="value">نام دوره </label>
                                    <input type="text"  name="title" class="form-control" placeholder="اجباری" id="name">
                                    <label class="form-label" for="value">نام دوره </label>
                                    <input type="text"  name="link" class="form-control" placeholder="غیر اجباری" id="link">
                                    <label class="form-label" for="category_id">دسته بندی اصلی </label>
                                    <select name="category_id" id="category_id" class="form-control sidebar-item" >
                                        <option value="" disabled selected>دسته بندی اصلی را انتخاب کنید</option>
                                            @foreach($coursecategories as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin:auto;">ثبت دوره </button>
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


