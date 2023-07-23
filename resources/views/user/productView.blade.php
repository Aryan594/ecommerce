@extends('user.layout.main')
@section('content')
<?php

use App\Models\Product;

$product = Product::find($id);
?>
<style>
    .product_details{
        background-color:  rgb(216, 247, 247);;
    }
        .product-details-tab {
            background-color: lightcyan;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-details-tab .product_d_right {
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
        .product_d_right{
            background-color: lightcyan;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .price_box{    
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgb(182, 241, 241);
        }
        .product_variant_quantity{
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgb(182, 241, 241);
        }
        .product_meta{
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgb(182, 241, 241);
        }
        .product-details-tab .product_variant.quantity label {
            font-weight: bold;
        }

        .product-details-tab .product_variant.quantity input[type="number"] {
            width: 70px;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .product-details-tab .product_variant_quantity .button {
            background-color: #007bff;
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .product-details-tab .product_variant.quantity .button:hover {
            background-color: red;
        }

        .product-details-tab .product_meta span {
            font-weight: bold;
        }

        .product-details-tab form button[type="submit"] {
            background-color: #28a745;
            border: none;
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .product-details-tab form button[type="submit"]:hover {
            background-color: #218838;
        }

        .product-details-tab form button[type="submit"],
        .product-details-tab form button[type="submit"]:hover,
        .product-details-tab .wishlist-icon {
            margin-top: 10px;
        }
        .product_info_button{
            margin-top: 5px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: lightcyan;
        }
        .product-details-tab .product_d_info {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-details-tab .product_d_info .product_info_button ul.nav li {
            display: inline-block;
            margin-right: 10px;
        }

        .product-details-tab .product_d_info .product_info_button ul.nav li a {
            color: #000000;
            font-weight: bold;
            text-decoration: none;
        }

        .product-details-tab .product_d_info .product_info_button ul.nav li a.active,
        .product-details-tab .product_d_info .product_info_button ul.nav li a:hover {
            color: #007bff;
        }

        .product-details-tab .product_d_info .product_info_content {
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        .product-details-tab .product_d_info .product_d_table table {
            width: 100%;
            margin-bottom: 0;
            
        }

        .product-details-tab .product_d_info .product_d_table table td {
            padding: 8px 0;
        }

        .product-details-tab .comment-section .comment-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        .product-details-tab .comment-section .comment-form .btn-submit-comment {
            background-color: #007bff;
            border: none;
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .product-details-tab .comment-section .comment-form .btn-submit-comment:hover {
            background-color: #0069d9;
        }

        .product-details-tab .comment-section .comment-list .comment {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .product-details-tab .comment-section .comment-list .comment-content {
            margin-bottom: 10px;
        }

        .product-details-tab .comment-section .comment-list .comment-username {
            font-weight: bold;
        }

        .product-details-tab .comment-section .comment-list .comment-text {
            margin-bottom: 10px;
        }

        .product-details-tab .comment-section .comment-list .btn-delete-comment {
            background-color: #dc3545;
            border: none;
            color: #ffffff;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
        }

        .product-details-tab .comment-section .comment-list .btn-delete-comment:hover {
            background-color: #c82333;
        }
        .product_info_content{
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            background-color: rgb(182, 241, 241);
        }
        .product_d_table{
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            background-color: rgb(182, 241, 241);
        }
        .comment-content{
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            background-color: rgb(182, 241, 241);
        }
        .comment-section{
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            background-color: lightcyan;
        }
        .current_price{
            background-color:  rgb(214, 39, 39);
            color: white;
        }
        .catalog_i{
            background-color: orange;
            font-weight: bold;
        }
</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="crap">Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--product details start-->
<div class="product_details mt-1 mb-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{asset($product->product_image)}}" data-zoom-image="{{asset($product->product_image)}}" alt="big-1" class="bordered-image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif
                    <div class="product_d_right">
                        <form action="/add-to-cart/{{$product->id}}" method="post">
                            @csrf
                            <h1>{{$product->product_name}}</h1>
                            <div class="price_box">
                                <span class="current_price">NPR {{$product->product_price}}</span>
                            </div>
                            <div class="product_variant_quantity">
                                <label>Quantity</label>
                                <input min="1" name="product_quantity" max="100" value="1" type="number">
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </div>
                            <div class="product_meta">
                                <span >Category: <span class="catalog_i">{{$product->category['category_name']}}</span></span>
                            </div>
                        </form>
                        <!-- Wishlist -->
                        <form action="{{ route('wishlist.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="category_id" value="{{ $product->category->id }}">
                            <button type="submit" class="btn btn-primary">Add to Wishlist</button>
                        </form>
                        <i class="fa-sharp fa-solid fa-bookmark wishlist-icon"></i>
                        <!-- Wishlist -->
                    </div>
                </div>
                <!-- Product info start -->
                <div class="product_d_info mb-40">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="product_d_inner">
                                    <div class="product_info_button">
                                        <ul class="nav" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-bs-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">See Reviews</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                                            <div class="product_info_content">
                                                <p>{{$product->product_desc}}</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                                            <div class="product_d_table">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="first_child">Monitor</td>
                                                            <td>{{$product->monitor}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Sensor</td>
                                                            <td>{{$product->sensor}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Connectivity</td>
                                                            <td>{{$product->Connectivity}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Port</td>
                                                            <td>{{$product->port}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Video</td>
                                                            <td>{{$product->video}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Colors</td>
                                                            <td>{{$product->colors}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="comments" role="tabpanel">
                                            <div class="comment-section">
                                                <div class="comment-form">
                                                    <form action="{{ route('comments.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <textarea name="content" rows="4" placeholder="Enter your comment" class="form-control"></textarea>
                                                        <button type="submit" class="btn btn-primary btn-submit-comment">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="comment-list">
                                                    @if($product->comments->count() > 0)
                                                    @foreach($product->comments as $comment)
                                                    <div class="comment">
                                                        <div class="comment-content">
                                                            <div class="comment-username"> @ {{ $comment->user->name }}</div>
                                                            <div class="comment-text">{{ $comment->content }}</div>
                                                            @if(auth()->check() && auth()->user()->id === $comment->user_id)
                                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-delete-comment">Delete</button>
                                                            </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    <div class="no-comments">No comments yet.</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Comment section end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product info end -->
            </div>
        </div>
    </div>
<!--product details end-->
@endsection