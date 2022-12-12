<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart ;
use App\Models\Product ;
use App\Models\User ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\DB;




class CartController extends Controller
{
    public function addProduct(Request $req)
    {

        $product_id = $req->input('prod_id');

        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check)
            {

                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                return response()->json(['status' => $prod_check -> name. "Already Added to cart "]);
                }

                else{
                $cartItem = new Cart();
                $cartItem-> prod_id = $product_id;
                $cartItem-> user_id = Auth::id();
                $cartItem->save();
                return response()->json(['status' => $prod_check -> name. "Added to cart "]);
            }
        }

        }
        else{
            return response()->json(['status' => "Login ot Continue"]);
        }

    }


    function cartList(Request $req)
    {
        if(Auth::check())
        {
            $data = DB::table('carts')
            ->join('products','carts.prod_id','products.id')
            ->select('products.*','carts.id as cart_id') 
            ->where('carts.user_id',Auth::id())
            ->get();
        return view ('frontend.cart',['cartdata'=>$data]);

    
        }else{
            return redirect('/');
        }
        
    }

    function removeItem($id){

        Cart::destroy($id);
        return redirect('/cart');
    }

}