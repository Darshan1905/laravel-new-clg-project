<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product ;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
   {
    // $featured_products = Product::where('trending', '1')->take(15)->get();
    $products = Product::all();
    return view('frontend.index', compact('products'));
   }

   public function home()
   {
    return view ('home');
   }
}