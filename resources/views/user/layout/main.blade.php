<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

if (auth()->user()) {
    $carts = Cart::where('user_id', Auth::user()->id)->get();
} else {
    $carts = null;
}
?>
<!doctype html>
<html class="no-js" lang="en">

<!--   03:20:39 GMT -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CameraBazzar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- CSS -->
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/plugins.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <style>
        html,
        body {
            overflow-x: hidden;
            font-family: Arial, sans-serif;
        }

        /* login register css start */
        .header_top {
            background-color: black;
            padding: 10px 0;
        }

        .header_top .top_right ul li {
            display: inline-block;
            margin-left: 10px;
        }

        .header_top .top_right ul li a {
            color: lightblue;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .header_top .top_right ul li a:hover {
            color: #ff4081;
        }

        .header_top .top_right ul li a.logout {
            color: #ff4081;
        }

        .header_top .top_right ul li a.logout:hover {
            color: #333;
        }

        /* login register css end */



        /* header middle start css */
        .header_middle {
            background-color: lightblue;
            padding: 15px 0;
        }

        .logo img {
            max-width: 100%;
        }

        .search_container .input-group {
            margin-top: 5px;
            width: 50%;
            border: 2px solid blue;
            border-radius: 6px;

        }

        .search_container .middel_right_info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .middel_right_info a {
            color: #333;
            transition: color 0.3s ease;
        }

        .mini_cart_wrapper {
            position: relative;
        }

        .cart_quantity {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ff4081;
            color: #fff;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .mini_cart {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #fff;
            min-width: 300px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 999;
        }

        .mini_cart.active {
            display: block;
        }

        .mini_cart p {
            margin: 5px 0;
        }

        .cart_item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .cart_img img {
            max-width: 60px;
            max-height: 60px;
        }

        .cart_info {
            margin-left: 10px;
        }

        .cart_info a {
            color: #333;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .cart_info a:hover {
            color: #ff4081;
        }

        .cart_remove a {
            color: red;
            transition: color 0.3s ease;
            margin-left: 10px;
        }

        .cart_remove a:hover {
            color: #ff4081;
        }

        .mini_cart_table .cart_total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .price {
            font-weight: bold;
            color: #ff4081;
        }

        /* header middle css end*/
        .dropdown-toggle:hover+.dropdown-menu,
        .dropdown-menu:hover {
            display: block;
        }

        .breadcrumbs_area {
            background-color: skyblue;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid black;
        }

        .breadcrumb_content ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .breadcrumb_content ul li {
            display: inline;

        }

        .breadcrumb_content ul li a {
            color: white;
            background-color: black;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .breadcrumb_content ul li a:hover {
            background-color: blueviolet;
        }

        .breadcrumb_content ul li:last-child {
            font-weight: bold;
            color: #000;
        }

        .widgets_container {
            margin-left: 20px;
        }

        .wishlist-icon {
            color: #ff4081;
            /* Set the desired color */
            font-size: 24px;
            /* Adjust the font size */
            /* Add any additional styling as per your preference */
            margin-right: 15px;
            /* Add right margin */

        }
    </style>
    <style>
        .mini_cart_wrapper {
            margin-left: 10px;
            position: relative;
            z-index: 1000;
            /* Adjust the z-index as needed */
        }

        .mini_cart_popup {
            position: absolute;
            top: 100%;
            left: 50%;
            width: 300px;
            transform: translateX(-70%);
            background-color: lightcyan;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            padding: 10px;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s;
        }

        .mini_cart_wrapper:hover .mini_cart_popup {
            visibility: visible;
            opacity: 1;
        }

        .mini_cart_footer {
            text-align: center;
        }

        .mini_cart_footer .cart_button_i a,
        .mini_cart_footer .cart_button_j a {
            color: white;
        }

        .cart_button_i {
            background-color: blue;
            padding: 20px;
            margin-bottom: 2px;
        }

        .cart_button_j {
            background-color: blue;
            padding: 20px;

        }
        .mini_cart_footer{
            background-color: lightcyan;

        }
        .mini_cart_footer .cart_button_log a{
            color: white;
        }
        .cart_button_log{
            background-color: blue;
            padding: 20px;
        }
    </style>
    <script>
        // Get the dropdown toggle element
        const dropdownToggle = document.querySelector('.dropdown-toggle');

        // Get the dropdown menu element
        const dropdownMenu = document.querySelector('.dropdown-menu');

        // Add event listeners
        dropdownToggle.addEventListener('mouseover', toggleDropdown);
        dropdownMenu.addEventListener('mouseover', toggleDropdown);
        dropdownToggle.addEventListener('mouseout', toggleDropdown);
        dropdownMenu.addEventListener('mouseout', toggleDropdown);

        // Function to toggle the dropdown menu
        function toggleDropdown() {
            dropdownMenu.classList.toggle('show');
        }
    </script>
</head>

<body>

    <!--header area start-->
    <header>
        <div class="main_header">
            <!--header top start-->
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right">
                                <ul class="list-inline">
                                    @if(auth()->user())
                                    <li class="list-inline-item"><a href="#">Hello {{auth()->user()->name}}</a></li>
                                    <li class="list-inline-item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    @else
                                    <li class="list-inline-item"><a href="/login">Login</a></li>
                                    <li class="list-inline-item"><a href="/register">Register</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--header top start-->
            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="logo">
                                <img src="{{asset('user/assets/img/logo/logocamera.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                    <form action="{{route('search')}}" method="GET">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Search product..." name="search" type="text">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </form>
                                    <div class="middel_right_info">
                                        <a href="{{route('wishlist')}}">
                                            
                                            <i class="fa-sharp fa-solid fa-bookmark wishlist-icon"></i>
                                        </a>
                                        <div class="header_wishlist">
                                            <a href="#"><img src="{{asset('user/assets/img/user.png')}}" alt=""></a>
                                        </div>
                                        <div class="mini_cart_wrapper">
                                            <a href="javascript:void(0)">
                                                <img src="{{asset('user/assets/img/shopping-bag.png')}}" alt="">
                                            </a>
                                            @if($carts == null)
                                            <span class="cart_quantity">0</span>
                                            @else
                                            <span class="cart_quantity">{{$carts->count()}}</span>
                                            @endif

                                            <div class="mini_cart_popup">
                                                <!-- Mini cart content -->
                                                <?php
                                                $total = 0;
                                                ?>
                                                @if($carts == null)
                                                <p>Please Login To View Your Cart</p>
                                                <div class="mini_cart_footer">
                                                    <div class="cart_button_log">
                                                        <a href="{{ route('login') }}">Login</a>
                                                    </div>
                                                </div>
                                                @else
                                                @foreach($carts as $cart)
                                                <div class="cart_item">
                                                    <div class="cart_img">
                                                        <a href="#"><img src="{{ $cart->products->product_image }}" alt=""></a>
                                                    </div>
                                                    <div class="cart_info">
                                                        <a href="#">{{ $cart->products->product_name }}</a>
                                                        <p>Qty: {{$cart->quantity}} X <span>NPR {{$cart->unit_price}} </span></p>
                                                    </div>
                                                    <div class="cart_remove">
                                                        <a href="/cart/{{$cart->id}}"><i class="ion-android-close"></i></a>
                                                    </div>
                                                </div>
                                                <?php
                                                $total += $cart->quantity * $cart->unit_price;
                                                ?>
                                                @endforeach
                                                <div class="mini_cart_table">
                                                    <div class="cart_total mt-10">
                                                        <span>Total:</span>
                                                        <span class="price">NPR {{$total}}</span>
                                                    </div>
                                                </div>

                                                <div class="mini_cart_footer">
                                                    <div class="cart_button_i">
                                                        <a href="{{ route('cart') }}">View All cart</a>
                                                    </div>
                                                    <div class="cart_button_j">
                                                        <a href="{{ route('checkout') }}">Proceed TO Checkout</a>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- mini cart end-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--header middel end-->
            <!--header bottom satrt-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="{{route('home')}}">CameraBazzar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('shop')}}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('cart')}}">Cart</a>
                            </li>
                            <li class="nav-item dropdown" id="ordersDropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Orders
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('checkout')}}">CheckOut</a></li>
                                    <li><a class="dropdown-item" href="{{route('userOrder')}}">OrderDetails</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('about')}}">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--header bottom end-->
        </div>
    </header>
    <!--header area end-->


    <!-- content -->
    @yield('content')

    <!-- content ends -->


    <!--footer area start-->
    <style>
        .footer_widgets {
            background-color: black;
            color: black;
            padding: 30px 0;
        }

        .footer_top {
            background-color: lightblue;
            padding: 30px 0;
        }

        .maincontainer {
            margin-left: auto;
            margin-right: auto;
            max-width: 1170px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .footer_logo img {
            max-width: 150px;
            height: auto;
            margin-bottom: 30px;
        }

        .footer_contact p {
            font-size: 16px;
            color: black;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .footer_social_link ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer_social_link ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .footer_social_link ul li a {
            color: black;
            font-size: 20px;
            line-height: 1;
        }

        .footer_menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer_menu ul li {
            margin-bottom: 10px;
        }

        .footer_menu ul li a {
            color: black;
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="maincontainer">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <img src="{{asset('user/assets/img/logo/logocamera.jpg')}}" alt="">
                            </div>
                            <div class="footer_contact">
                                <p><b>Welcome to the best online site for camera enthusiasts! We are proud to introduce you to our premier e-commerce site for all things camera. Whether you are a professional photographer, a passionate amateur photographer, or a beginner who wants to capture life's most precious moments, our website is your ultimate destination.</b></p>
                                <p><b>CameraBazzar offers a wide range of cameras, lenses, accessories and everything you need to enhance your photography experience. Our carefully selected collections include the latest models from name brands, ensuring you have access to the latest technology and innovations.</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container newsletter">
                            <h3>Follow Us</h3>
                            <div class="footer_social_link">
                                <ul>
                                    <li><a class="facebook" href="#" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    <li><a class="linkedin" href="#" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="{{route('about')}}">About Us</a></li>
                                    <li><a href="blog.html">Delivery Information</a></li>
                                    <li><a href="contact.html">Privacy Policy</a></li>
                                    <li><a href="services.html">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
    <!-- JS
============================================ -->



    <!-- Plugins JS -->
    <script src="{{asset('user/assets/js/plugins.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('user/assets/js/main.js')}}"></script>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!--   03:22:07 GMT -->

</html>