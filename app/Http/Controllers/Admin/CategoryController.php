<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
       return view('admin.category.index',compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');

    }

    public function edit($id)
    {
       $category = Category::find($id);
       return view('admin.category.edit',compact('category'));

    }


    public function destroy($id)
    {
       $category = Category::find($id);

       if($category->image)
       {
        $path = 'assets/uploads/category/'.$category->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
       }
       $category->delete();
       return redirect('categories')->with('status',"Category Deleted Successfully");

    }


    

    public function update(Request $req ,$id)
    {
       $category = Category::find($id);
       if($req->hasFile('image'))
        {
            
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
            
        }
        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status') == TRUE ? '1' : '0';
        $category->popular = $req->input('popular')  == TRUE ? '1' : '0';
        $category->meta_title = $req->input('meta_title');
        $category->meta_descrip = $req->input('meta_descrip');
        $category->meta_keywords = $req->input('meta_keywords');
        $category->update();
        return redirect('categories')->with('status',"Category updated Successfully");
    }


    public function insert(Request $req)
    {

        $category = new Category();
        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }

        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status') == TRUE ? '1' : '0';
        $category->popular = $req->input('popular')  == TRUE ? '1' : '0';
        $category->meta_title = $req->input('meta_title');
        $category->meta_descrip = $req->input('meta_descrip');
        $category->meta_keywords = $req->input('meta_keywords');
        $category->save();
        return redirect('categories')->with('status',"Category Added Successfully");

    }

  

       

}