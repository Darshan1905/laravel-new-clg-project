<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product ;
use App\Models\Category ;


class FrontendController extends Controller
{
   public function index()
   {
    return view('layouts.admin');
   }


   public function detail($id)
   {
       $products = Product::find($id);
       return view('frontend.productdetails', compact('products'));
   }

   public function allcategory()
   {
    $category = Category::all();
    return view ('frontend.allcategory', compact('category'));
   }

   public function viewcategory($slug)
   {

    if(Category::where('slug', $slug)->exists())
    {
       $category = Category::where('slug', $slug)->first();
       $products = Product::where('cate_id', $category->id)->where('status','0')->get();
       return view('frontend.products.index',compact('category','products'));
    // $products = Product::
    }
    else{
        return redirect('/')->with('Slug does not exists');
    }

   }
}