@extends('Admin.layout.master')
@section('content')
    <div class="container mt-5">
        <h4 class="mb-3">ایجاد دوره</h4>
        <form action="{{ route('trainings.store') }}" method="post">
            @include('admin.trainings._form')
        </form>
    </div>
@endsection
