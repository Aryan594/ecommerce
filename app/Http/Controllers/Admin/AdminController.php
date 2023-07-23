<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.index');
    }
    function categories()
    {
        $categories = Categories::latest()->get();
        return view('admin.category.categoryList', compact('categories'));
    }
    function products()
    {
        $categories = Categories::latest()->get();
        $products = Product::latest()->get();
        return view('admin.product.productList', compact('categories', 'products'));
    }
    public function dashboard()
    {
        $totalCustomers = User::where('IsRole', 'customer')->count();
        $totalOrders = Order::count();
        $totalProducts = Product::count();

        return view('admin.index', compact('totalCustomers','totalOrders','totalProducts'));
    }
    public function retrieveUserData()
{
    $users = User::where('isRole', 'customer')->select('name', 'email')->get();

    return Response::json([
        'status' => 'success',
        'data' => $users,
    ]);
}
//chart
public function getNewRegisteredAccounts()
{
    // Get the current year and month in the format 'YYYY-MM'
    $currentYearMonth = date('Y-m');

    $newAccounts = User::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) AS count'))
        ->where(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), $currentYearMonth)
        ->groupBy('month')
        ->get();

    return response()->json([
        'status' => 'success',
        'data' => $newAccounts
    ]);
}
}