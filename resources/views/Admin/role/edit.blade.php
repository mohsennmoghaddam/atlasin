@extends('Admin.layout.master')

@section('content')

    <div class="row" dir="rtl">
        <div>
            <div style="padding-top: 50px ; padding-bottom: 50px">
                <div class="col-12 col-xl-10" style="margin: auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>تغییر یا به روز رسانی عنوان و دسترسی های ادمین </b></h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('role.update', $role)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label class="form-label" for="title"> به روز رسانی عنوان نقش</label>
                                    <input type="text" name="name" class="form-control" placeholder="" id="title"
                                           value="{{$role->name}}">
                                </div>
                                <br>
                                <div class="form-check form-switch">
                                    <label>به روز رسانی دسترسی ها</label>
                                    <div class="row">
                                        @foreach($permissions as $permission)
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="role"
                                                       name="permissions[]" value="{{$permission->id}}"
                                                       @if($role->hasPermission($permission->name))
                                                           checked
                                                        @endif
                                                >
                                                <label class="form-check-label"
                                                       for="role">{{$permission->title}}</label>
                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary" style="margin:auto;">ثبت دسترسی</button>
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


