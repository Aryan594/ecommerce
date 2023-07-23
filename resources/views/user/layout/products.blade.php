@extends('user.layout.main')
@section('content')
<div style="background-color: skyblue;">
    <h3><u>Searched Products</u></h1>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="product-card" style="background-color: lightblue;">
                    <div class="product-image">
                        <a href="/view-product/{{$product->id}}" class="elevatezoom-gallery active" data-update="" data-image="{{asset($product->product_image)}}" data-zoom-image="{{asset($product->product_image)}}">
                            <img src="{{asset($product->product_image)}}" alt="Product Image" width="200px" height="300px" />
                        </a>
                    </div>
                    <div class="product-details">
                        <h3 class="product-name">{{ $product->product_name }}</h3>
                        <p class="product-desc">{{ $product->product_desc }}</p>
                        <p class="product-price">NPR <span>{{ $product->product_price }}</span></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>
    .product-card {
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    .product-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .product-details {
        margin-top: 10px;
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .product-desc {
        font-size: 14px;
        color: #888;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 16px;
        font-weight: bold;
    }

    .product-price span {
        color: #f00;
    }
</style>
@endsection