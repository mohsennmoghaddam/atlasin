@extends('Admin.layout.master')
@section('content')
    <div class="container mt-5">
        <h4 class="mb-3">ویرایش دوره: {{ $training->title['fa'] }}</h4>
        <form action="{{ route('trainings.update',$training) }}" method="post">
            @include('admin.trainings._form', ['training'=>$training])
        </form>
    </div>
@endsection
