<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        $category = new Categories();
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->back();
    }

    
    public function edit(string $id){
        $category = Categories::find($id);
        return view('admin.category.categoryEdit',compact('category'));

    }
    public function update(Request $request, string $id){
        $category= Categories::find($id);
        $category->category_name=$request->category_name;
        $category->update();
        return redirect('/categories')->with('message','Category update successfully');
    }
    public function destroy(string $id){
        $category= Categories::find($id);
        $category->delete();

        return back()->with('message','Category deleted successfully');
    }
    public function shop(){
        $categories = Categories::latest()->get();

        return view('user.layout.shop', compact('categories'));   
    }
}
