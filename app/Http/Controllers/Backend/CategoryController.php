<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){
        $categories = Category::all();
        return view('admin.layouts.category.category-list', compact('categories'));
    }

    public function form(){
        return view('admin.layouts.category.category-create');
    }

    public function add(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'details'=>'required'
        ]);
        
        Category::create([
            'name'=>$request->name,
            'details'=>$request->details
        ]);

        return redirect()->route('category.list');

    }
}
