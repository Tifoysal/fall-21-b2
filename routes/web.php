<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin');
});


Route::group(['prefix'=>'admin-portal'],function(){
    Route::get('/', function () {
        return view('admin.master');
    })->name('admin');
    Route::get('/orders',[OrderController::class,'orderList'])->name('admin.orders');
    Route::get('/products',[ProductController::class,'productList'])->name('admin.products');
    Route::get('/products/create',[ProductController::class,'productCreate'])->name('admin.products.create');
    Route::post('/products/store',[ProductController::class,'productStore'])->name('admin.products.store');

    // Category

    Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');
    Route::get('/category/form',[CategoryController::class,'form'])->name('category.form');
    Route::post('/category/add',[CategoryController::class,'add'])->name('category.add');
});
