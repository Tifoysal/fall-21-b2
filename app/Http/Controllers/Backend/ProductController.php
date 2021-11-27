<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productList()
    {
        $products = Product::with('category')->get();
        return view('admin.layouts.product-list',compact('products'));
    }

    public function productCreate()
    {
        $categories = Category::all();
        // dd($categories);
        return view('admin.layouts.product-create',compact('categories'));

    }

    public function productStore(Request $request)
    {
        // dd(date('Ymdhms'));
        // dd($request->all());
        try {

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename= date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file-> storeAs('/uploads',$filename);
                
            }

            // dd("ok");
           Product::create([
               'name' => $request->input('name'),
               'price' => $request->input('price'),
               'description' => $request->input('description'),
               'category_id'=>$request->category,
               'image'=>$filename
           ]);
           return redirect()->route('admin.products')->with('success', 'Product created successfully');
        }catch (\Throwable $throwable){
            // dd($throwable);
            return redirect()->back();
        }
    }



}
