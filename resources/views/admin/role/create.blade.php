@extends('admin.layout.master')

@section('content')

    <div class="row" dir="rtl">
        <div>
            <div style="padding-top:50px;padding-bottom:200px" >
                <div class="col-12 col-xl-7 col-sm" style="margin: auto;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>ایجاد نقش </b></h4>
                            <h6 class="card-subtitle text-muted"></h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('role.store')}}" method="post" >
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label" for="value">نام دوره </label>
                                    <input type="text"  name="name" class="form-control" placeholder="اجباری" id="name">
                                </div>
                                <button type="submit" class="btn btn-success" style="margin:auto;">ثبت دوره </button>
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


