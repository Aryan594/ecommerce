@extends('user.layout.main')
@section('content')
<?php

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

if (auth()->user()) {
    $wishlistItems = Wishlist::where('user_id', Auth::user()->id)->get();
} else {
    $wishlistItems = null;
}
?>
<style>
    .wishlist-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 2px solid #ccc;
    }

    .wishlist-table th,
    .wishlist-table td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ccc;
    }

    .wishlist-table thead {
        background-color: #333;
        color: #fff;
    }

    .wishlist-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .wishlist-remove-btn {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .wishlist-remove-btn:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .wishlist-image {
        width: 90px;
        height: 50px;
    }
        .wishlist_empty {
        margin: 5px 0;
        text-align: center;
        color: white;
        background-color: black;
        padding: 30px;
    }
    
</style>
@if (!empty($wishlistItems) && count($wishlistItems) > 0)
    <table class="table table-striped table-bordered wishlist-table">
        <thead class="thead-dark">
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wishlistItems as $wishlistItem)
                <tr>
                    <td>
                        @if ($wishlistItem->product && $wishlistItem->product->product_image)
                            <img src="{{ $wishlistItem->product->product_image }}" alt="Product Image" class="wishlist-image">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($wishlistItem->product)
                            {{ $wishlistItem->product->product_name }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($wishlistItem->category)
                            {{ $wishlistItem->category->category_name }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($wishlistItem->category)
                            <form action="{{ route('wishlist.remove') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $wishlistItem->product->id }}">
                                <button type="submit" class="btn btn-danger btn-sm wishlist-remove-btn">Remove</button>
                            </form>
                            <a href="{{ route('productview', ['product_id' => $wishlistItem->product->id]) }}" class="btn btn-primary btn-sm wishlist-add-to-cart-btn">Navigate To Cart</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="wishlist_empty">No items found in the wishlist.</p>
@endif

@endsection