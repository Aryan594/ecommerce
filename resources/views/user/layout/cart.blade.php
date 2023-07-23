@extends('user.layout.main')
@section('content')
<style>
/* Add custom styles for the shopping cart area */

.shopping_cart_area {
  background-color: rgb(166, 224, 240);
  padding: 40px 0;
}

.cart_page table {
  width: 100%;
  border-collapse: collapse;
}

.cart_page th,
.cart_page td {
  padding: 15px;
  text-align: center;
  vertical-align: middle;
}

.cart_page th {
  background-color: rgb(239, 227, 227);
  font-weight: bold;
}

.cart_page td.product_thumb img {
  max-width: 80px;
}

.cart_page td.product_name {
  text-align: left;
}

.cart_page td.product_total {
  font-weight: bold;
}

.cart_page td.product_remove a {
  color: red;
  font-weight: bold;
}

.cart_page .order_button {
  text-align: center;
  margin-top: 20px;
}

/* Add additional styles for visual appeal */

.table_desc {
  background-color: lightcyan;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.cart_page th,
.cart_page td {
  color: #333333;
}

.order_button button {
  padding: 10px 20px;
  background-color: blue;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

.order_button button:hover {
  background-color: #ff5500;
}


</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--shopping cart area start -->
<div class="shopping_cart_area mt-1 mb-1">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc mt-5">
                        <div class="cart_page table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                        <th class="product_remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $totalPrice = 0; ?> <!-- Initialize total price variable -->

                                    @foreach($cartitems as $item)
                                    <tr>
                                        <td class="product_thumb"><a href="#"><img src="{{ $item->products->product_image }}" alt=""></a></td>
                                        <td class="product_name"><a href="#">{{ $item->products->product_name }}</a></td>
                                        <td class="product-price">{{ $item->unit_price }}</td>
                                        <td class="product_quantity">
                                            <label>Quantity</label>
                                            <input class="form-control" min="1" max="100" value="{{ $item->quantity }}" type="number" data-itemid="{{ $item->id }}">
                                        </td>
                                        <td class="product_total">
                                            <?php $productTotal = $item->unit_price * $item->quantity; ?> <!-- Calculate product total -->
                                            NPR{{ $productTotal }}
                                            <?php $totalPrice += $productTotal; ?> <!-- Add to total price -->
                                        </td>
                                        <td class="product_remove">
                                            <a href="/cart/{{$item->id}}"><i class="ion-android-close"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    <!-- Add the row for total price -->
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total Price:</strong></td>
                                        <td class="text-center">NPR{{ $totalPrice }}</td>
                                        <td>
                                            <div class="order_button">
                                                <a href="{{route('checkout')}}"><button class="btn btn-primary" type="button">Proceed to Checkout</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!--shopping cart area end -->


@endsection