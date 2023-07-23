<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    function viewwishlist(){
        $wishlistItems= Wishlist::where('user_id',Auth::id())->get();
        return view('user.layout.wishlist',compact('wishlistItems'));
    }
    public function addToWishlist(Request $request)
    {
        if (Auth::user()) {
        $user = $request->user();
        $productId = $request->input('product_id');
        $categoryId = $request->input('category_id');

        // Check if the product is already in the wishlist
        if ($user->wishlist->where('product_id', $productId)->first()) {
            return back()->with('message','Product already in the wishlist');
        }

        // Add the product to the wishlist
        $wishlist = new Wishlist();
        $wishlist->user_id = $user->id;
        $wishlist->product_id = $productId;
        $wishlist->category_id = $categoryId;
        $wishlist->save();

        return back()->with('message','Product added to the wishlist');
    }else{
        return redirect('/login');
    }
    }

    public function removeFromWishlist(Request $request)
    {
        $user = $request->user();
        $productId = $request->input('product_id');

        // Find the wishlist item to remove
        $wishlistItem = $user->wishlist->where('product_id', $productId)->first();

        if (!$wishlistItem) {
            return back()->with('message','Product not found in the wishlist');
        }

        // Remove the product from the wishlist
        $wishlistItem->delete();

        return back()->with('message','Product removed from the wishlist');
    }
}
