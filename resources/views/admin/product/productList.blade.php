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
  color: #333;
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

.table thead th {
  background-color: #007bff;
  color: #fff;
}

.table tbody td {
  vertical-align: middle;
}

.btn-primary.btn-sm {
  font-size: 12px;
  padding: 5px 10px;
}

.btn-danger.btn-sm {
  font-size: 12px;
  padding: 5px 10px;
}

</style>

<div class="container mt-4">
    <h4 class="mb-4">Add Product Details</h4>
    <form action="/add-product" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="product_image">Product Image</label>
            <input type="file" name="product_image" id="product_image" class="form-control">
        </div>

        <div class="form-group">
            <label for="product_price">Product Price</label>
            <input type="number" step="any" name="product_price" id="product_price" class="form-control">
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
            <textarea name="product_desc" id="product_desc" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="sensor">Sensor</label>
            <textarea name="sensor" id="sensor" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="monitor">Monitor</label>
            <textarea name="monitor" id="monitor" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="connectivity">Connectivity</label>
            <textarea name="Connectivity" id="Connectivity" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="port">Port</label>
            <textarea name="port" id="port" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="video">Video</label>
            <textarea name="video" id="video" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="colors">Colors</label>
            <textarea name="colors" id="colors" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>
<div class="container mt-4">
    <h4 class="mb-4">Product List</h4>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Product Price</th>
                            <th>Product Description</th>
                            <th>Sensor</th>
                            <th>Monitor</th>
                            <th>Connectivity</th>
                            <th>Port</th>
                            <th>Video</th>
                            <th>Colors</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->category->category_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_desc}}</td>
                            <td>{{$product->sensor}}</td>
                            <td>{{$product->monitor}}</td>
                            <td>{{$product->connectivity}}</td>
                            <td>{{$product->port}}</td>
                            <td>{{$product->video}}</td>
                            <td>{{$product->colors}}</td>
                            <td>
                                <a href="/edit-product/{{$product->id}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="/delete-product/{{$product->id}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
