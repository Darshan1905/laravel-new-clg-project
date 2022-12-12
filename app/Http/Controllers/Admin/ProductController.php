<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product ;
use App\Models\Category;
use Illuminate\Support\Facades\File;




class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
       return view('admin.products.index',compact('products'));

    }

    public function add()
    {
        $category = Category::all();
        return view('admin.products.add',compact('category'));

    }

    public function edit($id)
    {
       $products = Product::find($id);
       return view('admin.products.edit',compact('products'));

    }


    public function insert(Request $req)
    {
        $products = new Product();
        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/',$filename);
            $products->image = $filename;
        }
        $products->cate_id = $req->input('cate_id');
        $products->name = $req->input('name');
        $products->slug = $req->input('slug');
        $products->small_descrip = $req->input('small_descrip');
        $products->description = $req->input('description');
        $products->original_price = $req->input('original_price');
        $products->selling_price = $req->input('selling_price');
        $products->tax = $req->input('tax');
        $products->qty = $req->input('qty');
        $products->status = $req->input('status') == TRUE ? '1' : '0';
        $products->trending = $req->input('trending')  == TRUE ? '1' : '0';
        $products->meta_title = $req->input('meta_title');
        $products->meta_keywords = $req->input('meta_keywords');
        $products->meta_descrip = $req->input('meta_descrip');
        $products->save();
        return redirect('products')->with('status',"Product Added Successfully");


    }


    public function update(Request $req ,$id)
    {
       $products = Product::find($id);
       if($req->hasFile('image'))
        {
            
            $path = 'assets/uploads/products/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $products->image = $filename;
            
        }
        $products->name = $req->input('name');
        $products->slug = $req->input('slug');
        $products->small_descrip = $req->input('small_descrip');
        $products->description = $req->input('description');
        $products->original_price = $req->input('original_price');
        $products->selling_price = $req->input('selling_price');
        $products->tax = $req->input('tax');
        $products->qty = $req->input('qty');
        $products->status = $req->input('status') == TRUE ? '1' : '0';
        $products->trending = $req->input('trending')  == TRUE ? '1' : '0';
        $products->meta_title = $req->input('meta_title');
        $products->meta_keywords = $req->input('meta_keywords');
        $products->meta_descrip = $req->input('meta_descrip');
        $products->update();
        return redirect('products')->with('status',"Product Updated Successfully");
    }

    public function destroy($id)
    {
       $products = Product::find($id);

       if($products->image)
       {
        $path = 'assets/uploads/products/'.$products->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
       }
       $products->delete();
       return redirect('products')->with('status',"Product Deleted Successfully");

    }



}