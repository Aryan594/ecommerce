<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        //eee
        $product->sensor = $request->sensor;
        $product->monitor = $request->monitor;
        $product->Connectivity = $request->Connectivity;
        $product->port = $request->port;
        $product->video = $request->video;
        $product->colors = $request->colors;


        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('product/images/', $image_new_name);
            // storing name
            $product->product_image = 'product/images/' . $image_new_name;
        } else {
            $product->product_image = 'product/images/default.jpg';
        }
        $product->save();

        return back()->with('message', 'Product Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.productView', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Categories::latest()->get();
        return view('admin.product.productEdit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        //eee
        $product->sensor = $request->sensor;
        $product->monitor = $request->monitor;
        $product->connectivity = $request->connectivity;
        $product->port = $request->port;
        $product->video = $request->video;
        $product->colors = $request->colors;


        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('product/images/', $image_new_name);
            // storing name
            $product->product_image = 'product/images/' . $image_new_name;
        } else {
            $product->product_image = 'product/images/default.jpg';
        }
        $product->update();

        return redirect('products')->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('message', 'Product Deleted Successfully');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = DB::table('products')->where('product_name', 'like', '%' . $searchTerm . '%')->get();

        return view('user.layout.products', compact('products'));
    }
    public function showwishlist(Request $request, $product_id)
    {
        // Retrieve the product details based on the provided $product_id
        $product = Product::findOrFail($product_id);

        // Pass the product details and the product_id to the productView.blade.php view
        return view('user.productView', ['product' => $product, 'id' => $product_id]);
    }
}
