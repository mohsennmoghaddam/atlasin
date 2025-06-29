@extends('admin.layout.master')


@section('content')

    <script src="https://unpkg.com/feather-icons@4.10.0/dist/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        {{--        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>--}}
        {{--        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>--}}
    </svg>
    <div dir="rtl">
        <div class="row" style="">
            <div style="padding-top:50px">
                <div class="col-md-10" style="margin: auto;">
                    <div class="card">
                        <div class="card-header" style="margin-left:50px;">
                            <h5 class="card-title "><b class="text-success ">جدول اظافه کردن و مشاهده دسترسی ها</b></h5>
                            <h6 class="card-subtitle text-muted"></h6>
                        </div>
                        <table class="table table-light  table-striped">
                            <thead>
                            <tr>
                                <th style="width:10%;">نام </th>
                                <th style="width:10%;" > سطح دسترسی</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr class="table-primary">

                                    <td>{{$permission->title}}</td>

                                    <form action="{{route('role.permission.store', $role)}}" method="post">
                                        @csrf
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="role" name="permissions[]" value="{{$permission->id}}"

                                                       @if($role->haspermission($permission->name))
                                                       checked
                                                >
                                                @endif
                                            </div>
                                            @endforeach
                                            <br>
                                            <div>
                                                <button type="submit" class="btn btn-danger">ثبت دسترسی</button>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                feather.replace();

                $('delete').click(function(){
                    $('.alert').html('<i data-feather="trash"></i>');
                    feather.replace();
                });

            });
        </script>
    </div>


@endsection





