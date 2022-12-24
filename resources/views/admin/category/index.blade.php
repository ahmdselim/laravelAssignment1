@extends("admin.layouts.app")
@section('action')
category page
@endsection
@section("content")

<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="post" style="display: inline-block">
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