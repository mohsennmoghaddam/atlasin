@extends('Admin.layout.master')



@section('content')

    <div style="padding-top:20px;" dir="rtl">
        <div class="col-12 ol-xl-10 col-sm" style="margin:auto;">
            <div class="card table-responsive">
                <div class="card-header">
                    <h5 class="card-title" style="color:#a626a4">جدول دسته بندی نوار بالایی </h5>
                    {{--                    <h6 class="card-subtitle text-muted">Use <code>.table-striped</code> to add zebra-striping to any table row within the <code>&lt;tbody&gt;</code>.</h6>--}}
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width:10%;">شماره</th>
                        <th style="width:15%;">عنوان دسته بندی اصلی</th>
                        <th style="width:15%">عنوان زیر دسته بندی</th>
                        <th style="width:15%">عنوان</th>
                        <th style="width:15%">لینک دسترسی</th>
                        <th style="width: 10%;"> تغییر</th>
                        <th style="width: 10%;"> حذف</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category}}</td>
                            <td>{{optional($category->parent)->title}}</td>
                            <td>{{$category->title}}</td>
                            <td>{{$category->link}}</td>
                            <td class="table-action">
                                <a href="{{route('categories.edit',$category)}}"><i class="tf-icon bx bx-edit menu-icon"
                                                                                    data-feather="edit-2"></i></a>
                            </td>
                            <td>
                                <form action="{{route('categories.destroy',$category)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="hidden-lg btn btn-sm btn-danger" id="delete"
                                           value="حذف">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
