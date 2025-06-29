@extends('admin.layout.master')

@section('content')

<style>
    body{margin-top:20px;
        color: #9b9ca1;
    }
    .bg-secondary-soft {
        background-color: rgba(208, 212, 217, 0.1) !important;
    }
    .rounded {
        border-radius: 5px !important;
    }
    .py-5 {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }
    .px-4 {
        padding-right: 1.5rem !important;
        padding-left: 1.5rem !important;
    }
    .file-upload .square {
        height: 250px;
        width: 250px;
        margin: auto;
        vertical-align: middle;
        border: 1px solid #e5dfe4;
        background-color: #fff;
        border-radius: 5px;
    }
    .text-secondary {
        --bs-text-opacity: 1;
        color: rgba(208, 212, 217, 0.5) !important;
    }
    .btn-success-soft {
        color: #28a745;
        background-color: rgba(40, 167, 69, 0.1);
    }
    .btn-danger-soft {
        color: #dc3545;
        background-color: rgba(220, 53, 69, 0.1);
    }
    .form-control {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem;
        font-size: 0.9375rem;
        font-weight: 400;
        line-height: 1.6;
        color: #29292e;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #e5dfe4;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 5px;
        -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    }
</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Page title -->
            <div class="my-5" dir="rtl">
                <h3 style="color:blue">پروفایل</h3>
                <hr>
            </div>
            <!-- Form START -->
            <form class="file-upload" action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row mb-5 gx-5" dir="rtl">
                    <!-- Contact detail -->
                    <div class="col-xxl-8 mb-5 mb-xxl-0">
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="mb-4 mt-0 h2" style="color: #0a53be" >*اطلاعات کاربر* </h4>
                                <!--  Name -->
                                <div class="col-md-6 " >
                                    <label class="form-label">نام و نام خانوادگی *</label>
                                    <input type="text" class="form-control" placeholder="" name="name" value="{{$AdminUserProfile->name}}" >
                                </div>
                                <!-- nationalCode -->
                                <div class="col-md-6">
                                    <label class="form-label">کد ملی*</label>
                                    <input type="text" class="form-control" placeholder="" aria-label="Last name" value="{{$AdminUserProfile->nationalCode}}" name="nationalCode">
                                </div>
                                <!-- Phone number -->
                                <div class="col-md-6">
                                    <label class="form-label">تلفن ثابت *</label>
                                    <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="{{$AdminUserProfile->home}}" name="home">
                                </div>
                                <!-- Mobile number -->
                                <div class="col-md-6">
                                    <label class="form-label">موبایل *</label>
                                    <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="{{$user->mobile}}" name="mobile">
                                </div>
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">ادرس ایمیل *</label>
                                    <input type="email" class="form-control" id="inputEmail4" value="{{$AdminUserProfile->email}}" name="email">
                                </div>
                                <!-- birthday -->
                                <div class="col-md-6">
                                    <label class="form-label">تاریخ تولد *</label>
                                    <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="" name="birth">
                                </div>
                                <!-- address -->
                                <div class="col-md-6">
                                    <label class="form-label"> آدرس محل سکونت</label>
                                    <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="{{$AdminUserProfile->address}}" name="address">
                                </div>
                            </div> <!-- Row END -->
                        </div>
                    </div>
                    <!-- Upload profile -->
                    <div class="col-xxl-4">
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="mb-4 mt-0">بارگذاری عکس پروفایل</h4>
                                <div class="text-center">
                                    <!-- Image upload -->
                                    <div class="square position-relative display-2 mb-3">
                                        {{--                                            <i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>--}}
                                        <img src="{{str_replace('public', '/storage', $AdminUserProfile->image)}}" width="80 px" style="margin-top: 10px">
                                    </div>
                                    <!-- Button -->
                                    {{--                                        <input type="file" id="customFile" name="image" hidden="">--}}
                                    {{--                                        <label class="btn btn-success-soft btn-block" for="customFile">بارگذاری</label>--}}
                                    <button type="button" class="btn btn-danger-soft">حذف</button>
                                    <!-- Content -->
                                    <p class="text-muted mt-3 mb-0"><span class="me-1">نکته:</span>عکس پروفایل کاربر</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row END -->

                <div class="gap-3 d-md-flex justify-content-md-end text-center bg-secondary-soft">
                    {{--                        <button type="submit" class="btn btn-danger btn-lg">Delete profile</button>--}}
                    <button type="submit" class="btn btn-danger-soft btn-lg" style="margin: auto;">ثبت یا تغییر در پروفایل کاربر</button>
                </div>
                <br>
            </form> <!-- Form END -->
        </div>
    </div>
</div>

<div class="col-md-5 col-xl-5 "style="margin: auto;">
    <div  class="card " dir="rtl" style="text-align:center;">
        <div class="form-control  bg-secondary-soft px-4 py-5 rounded">
            @if(auth()->user()->role->hasPermission('update-role'))
            <div class="row g-1">
                <h4 class="mb-4 mt-0 h2" style="color: #bd2130" >*تغییرات نقش کاربر*</h4>
                <form method="post" action="{{route('user.update',$user->id)}}">
                    @csrf
                    @method('PATCH')

                    @foreach($roles as $role)
                    <div class="" style="">
                        <label class="btn-danger-soft" for="role">{{$role->name}}</label>
                        <input type="radio" id="role" value="{{$role->id}}" name="role_id"
                               @if($user->role_id == $role->id)
                        checked
                        @endif
                        >
                    </div>
                    <br>
                    @endforeach
                    <div class="gap-3 d-md-flex justify-content-md-end text-center bg-secondary-soft">
                        {{--                        <button type="submit" class="btn btn-danger btn-lg">Delete profile</button>--}}
                        <button type="submit" class="btn btn-danger-soft btn-lg" style="margin:auto; ">تغییر نقش کاربر</button>
                    </div>
                </form>
            </div>
            @else
            <div class="row g-3">
                <h4 class="mb-4 mt-0 h2" style="color: #bd2130" >* نقش کاربر*</h4>
                <label class="btn-danger-soft" for="role">{{auth()->user()->role->name}}</label>
            </div>
            @endif
        </div>
    </div>
</div> <!-- Row END -->

<div class="mt-5">
    <div class="col-12 row" style="margin:auto;">
        <div class="col-8 col-md-8" style="text-align: center;">
            <div class="card table-responsive bg-secondary-soft px-4 py-5 rounded" dir="rtl">
                <div class="card-header text-center">
                    <h5 class="card-title" style="color:#a626a4"><b>جدول  نقش ها جهت دسترسی </b></h5>
                    <h6 class="card-subtitle text-muted"></h6>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th style="">شماره </th>
                        <th style="">نام فایل </th>
                        <th style=""> فایل</th>
                        <th style=""> تاریخ</th>
                        <th style=""> حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                        <tr class="table-primary">
                            <td>{{$file->id}}</td>
                            <td>{{$file->name}}</td>
                            <td>{{$file->date}}</td>
                            <td><a href="{{str_replace('public', '/storage', $file->file)}}" download><i class="bx bx-download"></i></a></td>
                            <td>
                                <form class="form-group" action="{{route('file.destroy', $file)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    {{----}}
                                    {{--                                            @if(auth()->user()->role->hasPermission('delete-role'))--}}
                                    <button class="btn btn-danger" type="submit" value="">حذف</button>
                                    {{--                                            @else--}}
                                    {{--                                                <button class="btn btn-danger" type="" value="" disabled>حذف</button>--}}
                                    {{--                                            @endif--}}
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4" style="text-align: center; margin: initial;">
            <div class="bg-secondary-soft px-4 py-5 rounded">
                <div class="card g-3">
                    <h4 class="mb-4 mt-0">بارگذاری فایل</h4>
                    <div class="text-center">
                        <div class="card-body">
                            <form action="{{route('PdfStore' ,$AdminUserProfile)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="Description">name</label>
                                    <input class="form-control"  name="name" id="Description">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="title"> date</label>
                                    <input type="date" name="date" class="form-control" placeholder="" id="date">
                                </div>

                                <div class="col-sm-5 form-group" >
                                    <label class="form-label w-100" for="file">اپلود فایل</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>

                                <button type="submit" class="btn btn-success" >بارگذاری</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@endsection
