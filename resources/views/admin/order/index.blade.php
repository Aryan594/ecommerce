@extends('admin.layouts.main')
@section('content')

@if(session('message'))
<div class="alert alert-success container mt-2">
    {{session('message')}}
</div>
@endif
<style>
    .container {
        background-color: skyblue;
        padding: 20px;
        border: 2px solid black;
    }

    h3 {
        color: #333;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .table {
        background-color: lightcyan;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 2px solid black;
    }

    .table th {
        background-color: lightcyan;
        color: #333;
        font-weight: bold;
        padding: 10px;
        text-align: left;
        border: 2px solid black;
    }

    .table td {
        padding: 10px;
        border: 2px solid black;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        text-decoration: none;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        text-decoration: none;
    }

    .modal-title {
        color: #333;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .header {
        background-color: #f8f9fa;
        color: #333;
        font-weight: bold;
        padding: 10px;
        display: flex;
        justify-content: space-between;
    }

    .item {
        padding: 10px;
        display: flex;
        justify-content: space-between;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    select {
        padding: 5px;
        border-radius: 3px;
    }

    .modal-footer {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        text-decoration: none;
    }

    .btn-primary,
    .btn-secondary {
        margin-left: 10px;
    }
</style>

<div class="container mt-3">
    <h3>Orders</h3>
</div>
<div class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th width="30%">Order Details</th>
                <th>Order Status</th>
                <th>Payment Status</th>
                <th>Order Total Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- loop through table row using orders variable -->
            @foreach($orders as $order)
            <tr>
                <td>
                    <p>Order ID: {{$order->id}}</p>
                    <p>Customer Name: {{$order->customer_name}}</p>
                    <p>Customer Phone Number: {{$order->customer_phone_number}}</p>
                    <p>Customer Address: {{$order->customer_address}}</p>
                    <p>Customer Town City: {{$order->customer_town_city}}</p>
                    <p>Customer Note: {{$order->customer_note}}</p>
                    <p>Order Date: {{$order->created_at->format('d-m-Y')}}</p>
                    <p>Order Payment Method: {{$order->order_payment_type}}</p>
                </td>
                <td>
                    {{$order->order_status}}
                </td>
                <td>
                    {{$order->payment_status}}
                </td>
                <td>
                    NPR &nbsp; {{$order->order_total}}
                </td>
                <td>
                    <a href="/View/{{$order->id}}" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$order->id}}">View Orders</a>
                    <a href="/orders/{{$order->id}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal-{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Order Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="header d-flex justify-content-between">
                                <span>Item</span>
                                <span>Quantity</span>
                                <span>Unit Price</span>
                                <span>Total</span>
                            </div>
                            @foreach($order['order_details'] as $item)
                            <div class="item d-flex justify-content-between">
                                <span>{{ $item->product_name }}</span>
                                <span>{{$item->quantity}}</span>
                                <span>{{$item->unit_price}}</span>
                                <span>{{$item->quantity * $item->unit_price}}</span>
                            </div>
                            @endforeach
                        </div>
                        <form action="/change-order-details/{{$order->id}}" method="post">
                            @csrf
                            <div class="form-group my-3 container">
                                <label for="">Payment Status</label>
                                <select name="payment_status" id="">
                                    <option value="unpaid">Unpaid</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                            <div class="form-group my-3 container">
                                <label for="">Order Status</label>
                                <select name="order_status" id="">
                                    <option value="pending">Pending</option>
                                    <option value="delivering">Delivering</option>
                                    <option value="delivered">Delivered</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

@endsection