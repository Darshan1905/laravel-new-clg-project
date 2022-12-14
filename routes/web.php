<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;




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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/' ,[FrontendController::class ,'index']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::get('product_detail/{id}', [FrontendController::class, 'detail']);

Route::get('category', [FrontendController::class, 'allcategory']);

Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);


Route::middleware(['auth'])->group(function (){
   Route::post('add-to-cart',[CartController::class, 'addProduct']);
   Route::get('checkout',[CheckoutController::class, 'index']);
});

Route::get('cart', [CartController::class, 'cartList']);

Route::get('removeitem/{id}', [CartController::class, 'removeItem']);





 Route::middleware(['auth', 'isAdmin'])->group(function (){
    
    Route::get('dashboard', [FrontendController::class, 'index']);

    Route::get('categories', [CategoryController::class, 'index']);

    Route::get('add-category', [CategoryController::class, 'add']);

    Route::post('insert-category', [CategoryController::class, 'insert']);

    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);

    Route::put('update-category/{id}', [CategoryController::class, 'update']);

    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);


    Route::get('products', [ProductController::class, 'index']);
    
    Route::get('add-products', [ProductController::class, 'add']);

    Route::post('insert-product', [ProductController::class, 'insert']);

    Route::get('edit-product/{id}', [ProductController::class, 'edit']);

    Route::put('update-product/{id}', [ProductController::class, 'update']);

    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);


    




 });