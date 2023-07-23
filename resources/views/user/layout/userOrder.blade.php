@extends('user.layout.main')
@section('content')
<style>
    /* Styling for the modal body */
    .login-section {
        background-color: lightblue;
        padding: 20px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        border: 2px solid black;
    }

    .login-section__content {
        text-align: center;
    }

    .login-section__text {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 10px;
        color: #333;
    }

    .login-section__footer {
        display: flex;
        justify-content: center;
    }

    .login-section__button {
        background-color: #ff7f50;
        padding: 10px 20px;
        border-radius: 3px;
    }

    .login-section__link {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
    }

    .login-section__link:hover {
        text-decoration: underline;
    }
    .modal-custom {
    max-width: 400px;
    max-height: 400px;
  }

  .header {
    background-color: #0d6efd;
    color: white;
    font-weight: bold;
  }

  .header-item {
    flex-basis: 25%;
  }

  .item {
    flex-wrap: wrap;
    align-items: center;
  }

  .item p {
    flex-basis: 25%;
    margin: 0;
  }
  .item:nth-child(odd) {
    background-color: lavender;
  }

  .item:nth-child(even) {
    background-color: #e9ecef;
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
                        <li>Orders Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
@if(auth()->user())
<div class="container mt-4">
  <table class="table table-striped">
    <thead>
      <tr class="bg-primary text-white">
        <th width="30%">Order Details</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>Order Total Amount</th>
        <th>View Orders</th>
      </tr>
    </thead>
    <tbody>
      <!-- loop through table rows using orders variable -->
      @foreach($orders as $order)
      <tr>
        <td>
          <p>Customer Name: {{ $order->customer_name }}</p>
          <p>Customer Phone Number: {{ $order->customer_phone_number }}</p>
          <p>Customer Address: {{ $order->customer_address }}</p>
          <p>Customer Town City: {{ $order->customer_town_city }}</p>
          <p>Customer Note: {{ $order->customer_note }}</p>
          <p>Order Date: {{ $order->created_at->format('d-m-Y') }}</p>
          <p>Order Payment Method: {{ $order->order_payment_type }}</p>
        </td>
        <td>
          {{ $order->order_status }}
        </td>
        <td>
          {{ $order->payment_status }}
        </td>
        <td>
          NPR &nbsp; {{ $order->order_total }}
        </td>
        <td>
          <button type="button" class="btn btn-primary btn-sm view-orders-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $order->id }}">View Orders</button>
        </td>
      </tr>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal-{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-custom">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Order Details</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="header d-flex justify-content-between bg-info text-white px-3 py-2">
                <p class="header-item">Item</p>
                <p class="header-item">Quantity</p>
                <p class="header-item">Unit Price (NPR)</p>
                <p class="header-item">Total</p>
              </div>
              @foreach($order->order_details as $item)
              <div class="item d-flex justify-content-between border-bottom py-2">
                <p>{{ $item->product_name }}</p>
                <p>{{ $item->quantity }}</p>
                <p>{{ $item->unit_price }}</p>
                <p>{{ $item->quantity * $item->unit_price }}</p>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
</div>
@else
<div class="login-section">
    <div class="login-section__content">
        <p class="login-section__text"><b>Please Log in to view your order</b></p>
        <div class="login-section__button">
            <a class="login-section__link" href="/login">Login</a>
        </div>
    </div>
</div>
@endif

@endsection