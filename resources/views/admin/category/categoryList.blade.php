@extends('admin.layouts.main')
@section('content')
@if(session('message'))
<div class="container mt-3 alert alert-success"></div>
<span>{{session('message')}}!</span>
</div>
@endif
<style>
    .container{
        background-color: skyblue;
        border: 2px solid black;
    }
    .row-white-bg {
        background-color: #fff;
        border: 2px solid black;
    }
</style>
<div class="container mt-4">
    <h4>Add Category Details</h4>
    <form action="/add-category" method="post">
        @csrf
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

<div class="container mt-4">
    <h4>Category List</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="row-white-bg">
                <td><b>{{$category->category_name}}</b></td>
                <td>
                    <a href="/edit-category/{{$category->id}}" class="btn btn-outline-primary btn-sm">Edit</a>
                    <a href="/delete-category/{{$category->id}}" class="btn btn-outline-danger btn-sm ms-2">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection