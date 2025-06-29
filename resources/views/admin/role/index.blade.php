@extends('admin.layout.master')

@section('content')

    {{--    <script src="https://unpkg.com/feather-icons@4.10.0/dist/feather.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">--}}
    {{--        --}}{{--        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>--}}
    {{--        --}}{{--        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>--}}
    {{--    </svg>--}}
    <div dir="rtl">
        <div class="row text-center">
            <div style="padding-top:50px;">
                <div class="col-10 col-xl-8 col-sm" style="margin: auto;">
                    <div class="card table-responsive">
                        <div class="card-header text-center">
                            <h5 class="card-title" style="color:#a626a4"><b>جدول  نقش ها جهت دسترسی </b></h5>
                            <h6 class="card-subtitle text-muted"></h6>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="">شماره </th>
                                <th style="">نام </th>
                                <th style=""> ویرایش</th>
                                <th style=""> حذف</th>
                                <th style=""> زیر دوره ها </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr class="table-primary">
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td class="table-action">
                                        <a href="{{route('role.edit', $role)}}"><i class="tf-icon bx bx-edit "></i></a>
                                    </td>
                                    <td>
                                        <form class="form-group" action="{{route('role.destroy', $role)}}" method="post">
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
                                    <td>
                                        {{--                                        @if(auth()->user()->role->hasPermission('permission-edit'))--}}
                                        <a href="{{route('role.permission.index',$role)}}"><button class="btn btn-primary">مشاهده سطح دسترسی نقش کاربر</button></a>
                                        {{--                                        @else--}}
                                        {{--                                            <a href="" readonly=""><button class="btn btn-primary" disabled>مشاهده زیر دوره ها </button></a>--}}
                                        {{--                                        @endif--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{route('role.create')}}" class="btn btn-success mt-4"><i class="tf-icon bx bx-plus-circle"></i>ایجادنقش جدید </a>
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





