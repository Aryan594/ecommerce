@extends('admin.layouts.main')
@section('content')

@if(session('message'))
<div class="container mt-3 alert alert-success">
    <span>{{session('message')}}!</span>
</div>
@endif
<style>
    .container {
  background-color: skyblue;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h4 {
  color: black;
  margin-bottom: 20px;
}

.form-group label {
  color: #333;
  font-weight: bold;
}

.form-control {
  border: 1px solid #ced4da;
  border-radius: 4px;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}

</style>
<div class="container mt-4">
    <h4>Update Product Details</h4>
    <form action="/update-product/{{$product->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" id="product_name">
            </div>

            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" name="product_image" value="{{$product->product_image}}" class="form-control" id="product_image">
            </div>

            <div class="form-group">
                <label for="product_price">Product Price</label>
                <input type="number" step="any" name="product_price" value="{{$product->product_price}}" class="form-control" id="product_price">
            </div>

            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product_desc">Product Description</label>
                <textarea name="product_desc" id="product_desc" cols="20" rows="10" class="form-control">{{$product->product_desc}}</textarea>
            </div>
            <div class="form-group">
            <label for="sensor">Sensor</label>
            <textarea name="sensor" id="sensor" cols="20" rows="2" class="form-control">{{$product->sensor}}</textarea>
        </div>
        <div class="form-group">
            <label for="monitor">Monitor</label>
            <textarea name="monitor" id="monitor" cols="20" rows="2" class="form-control">{{$product->monitor}}</textarea>
        </div>
        <div class="form-group">
            <label for="connectivity">Connectivity</label>
            <textarea name="connectivity" id="connectivity" cols="20" rows="2" class="form-control">{{$product->Connectivity}}</textarea>
        </div>
        <div class="form-group">
            <label for="port">Port</label>
            <textarea name="port" id="port" cols="20" rows="2" class="form-control">{{$product->port}}</textarea>
        </div>
        <div class="form-group">
            <label for="video">Video</label>
            <textarea name="video" id="video" cols="20" rows="2" class="form-control">{{$product->video}}</textarea>
        </div>
        <div class="form-group">
            <label for="colors">Colors</label>
            <textarea name="colors" id="colors" cols="20" rows="2" class="form-control">{{$product->colors}}</textarea>
        </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </div>
    </form>
</div>

@endsection