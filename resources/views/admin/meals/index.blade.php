@extends('admin.layouts.app')
@section('action','ALL Meals')
@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($meals as $meal)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $meal->name }}</td>
                <td>{{$meal->category->name}}</td>
                <td>{{ $meal->price }}</td>
                <td>{{ $meal->Ingredients }}</td>
                <td><img src="{{ asset('front/uploads/'.$meal->image) }}" alt="" style="
    height: 100px;
    width: 100px;
    object-fit: contain;
"></td>
                <td>
                    <a href="{{ route('meal.edit', $meal->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('meal.destroy', $meal->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection


{{--$meal->category->name--}}