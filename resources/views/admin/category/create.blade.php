@extends('admin.layouts.app')
@section('action','Create New Category')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class='card-body'>
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="form-group" id="category">
                                <label for="category">Category Name</label>
                                <input type="text" name="name" class="form-control" id="category" value="{{old('name')}}" placeholder="Enter Category Name here">
                            </div>
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



{{--<form action="{{route('category.store')}}" method="POST">--}}
{{-- @csrf--}}
{{-- <div class="form-group" id="category">--}}
{{-- <label for="category">Category Name</label>--}}
{{-- <input type="text" name="name" class="form-control" id="category"--}}
{{-- value="{{old('name')}}" placeholder="Enter Category Name here">--}}
{{-- <button type="submit" class="btn btn-primary">ADD</button>--}}
{{-- </div>--}}
{{--</form>--}}