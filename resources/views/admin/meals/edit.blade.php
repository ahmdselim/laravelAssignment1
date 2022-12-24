@extends('admin.layouts.app')
@section('action','Create New Meal')
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
                        <form action="{{route('meal.update', [$meal->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group" id="name">
                                <label for="name">Meal Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{$meal->name}}" placeholder="Enter Meal Name here">
                            </div>
                            <div class="form-group" id="price">
                                <label for="price">Meal price</label>
                                <input type="text" name="price" class="form-control" id="price" value="{{ $meal->price }}" placeholder="Enter Meal price here">
                            </div>
                            {{-- input for ingredients--}}
                            <div class="form-group" id="ingredients">
                                <label for="ingredients">Ingredients</label>
                                <input type="text" name="Ingredients" class="form-control" id="ingredients" value="{{$meal->Ingredients}}" placeholder="Enter Meal ingredients here">
                            </div>
                            {{-- get the img --}}
                            <div class="form-group" id="image">
                                <label for="image">Meal Image</label>
                                <input type="file" name="image" class="form-control" id="image" value="" placeholder="Enter Meal image here">
                                <img src="{{asset('front/uploads/'.$meal->image)}}" alt="" width="100px" style="
    height: 100px;
    width: 100px;
    object-fit: contain;
" height="100px">
                            </div>
                            <div class="form-group" id="category_id">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $meal->category_id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">EDIT</button>
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