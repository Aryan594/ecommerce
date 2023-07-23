<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index(){
        return view('user.index');
    }
    function viewProduct($id){
        return view('user.productView',compact('id'));
    }

    function cart(){
        return view('user.layout.cart');
    }
    
}
