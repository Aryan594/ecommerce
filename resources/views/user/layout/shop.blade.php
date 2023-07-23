@extends('user.layout.main')
@section('content')
<?php
use App\Models\Product;
use App\Models\Categories;
$categories = Categories::latest()->get();
$products = Product::latest()->get();
?>
<style>
    .containerr{
        background-color: black;
        padding: 20px;
        border-radius: 5px;
    }
    .form-control option{
        background-color: black;
        color: white;
    }
    .gray-bg{
        background-color: lightblue;
    }
        .section-title {
            margin-bottom: 30px;
        }

        .section-title h2 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .single-tranding {
            background-color: lightcyan;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .single-tranding:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .tranding-pro-img img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .tranding-pro-title h3 {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .tranding-pro-title h4 {
            font-size: 14px;
            color: black;
            margin-bottom: 15px;
        }

        .tranding-pro-price .price_box {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .tranding-pro-price .current_price {
            display: inline-block;
            margin-right: 10px;
        }
    .shipping_area {
            background-color: black;
            padding: 10px 0;
        }

        .single_shipping {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        .shipping_icone img {
            max-width: 80px;
            height: auto;
            margin-bottom: 20px;
        }

        .shipping_content h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .shipping_content p {
            font-size: 16px;
            color: #555;
            margin-bottom: 0;
        }
        .current_price{
            background-color: lightcoral;
            border-radius: 10px;
            border: 2px solid black;
            padding: 2px;
        }
        .category_namee{
            background-color: orange;
            border-radius: 5px;
            padding: 5px;
        }
</style>
<div class="containerr">
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="form-group">
            <form action="" method="get">
                @csrf
                <select class="form-control" name="category" onchange="this.form.submit()">
                    <option value=""  @if(!isset($_GET['category'])) selected @endif>All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(isset($_GET['category']) && $_GET['category'] == $category->id) selected @endif>
                            {{$category->category_name}}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Tranding product -->
<section class="pt-60 pb-30 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2>Our Products</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($products as $product)
                @if(isset($_GET['category']) && $_GET['category'] != '' && $product->category_id != $_GET['category'])
                    @continue
                @endif

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4" data-category="{{$product->category_id}}">
                <div class="single-tranding">
                    <a href="/view-product/{{$product->id}}">
                        <div class="tranding-pro-img">
                            <img src="{{asset($product->product_image)}}" alt="">
                        </div>
                        <div class="tranding-pro-title">
                            <h3>{{$product->product_name}}</h3>
                            <h4> <span class="category_namee">{{$product->category['category_name']}}</span></h4>
                        </div>
                        <div class="tranding-pro-price">
                            <div class="price_box">
                                <span class="current_price">NPR {{$product->product_price}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Tranding product -->
@endsection