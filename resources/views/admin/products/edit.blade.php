@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id" aria-label="Default select example">
                            <option value="">{{ $products->category?->name}}</option>

                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" value="{{ $products->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $products->slug }}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12">
                        <label for="">Small Description</label>
                        <textarea name="small_descrip" cols="30" rows="5"
                            class="form-control">{{ $products->small_descrip }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" cols="30" rows="5"
                            class="form-control">{{ $products->description }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Original Price</label>
                        <input type="number" value="{{ $products->original_price }}" class="form-control"
                            name="original_price">
                    </div>
                    <div class="col-md-6">
                        <label for="">Quantity</label>
                        <input type="number" value="{{ $products->qty }}" class="form-control" name="qty">
                    </div>
                    <div class="col-md-6">
                        <label for="">Selling Price</label>
                        <input type="number" value="{{ $products->selling_price }}" class="form-control"
                            name="selling_price">
                    </div>
                    <div class="col-md-6">
                        <label for="">Tax</label>
                        <input type="number" value="{{ $products->tax }}" class="form-control" name="tax">
                    </div>

                    <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $products->status == "1" ? 'checked':'' }} name="status">

                    </div>
                    <div class="col-md-6">
                        <label for="">Trending</label>
                        <input type="checkbox" {{ $products->trending == "1" ? 'checked':'' }} name="trending">
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $products->meta_title }}" class="form-control" name="meta_title">
                    </div>

                    <div class="col-md-6">
                        <label for="">Meta Keywords</label>
                        <input type="text" value="{{ $products->meta_keywords }}" class="form-control"
                            name="meta_keywords">
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta Description</label>
                        <textarea name="meta_descrip" cols="30" rows="5"
                            class="form-control">{{ $products->meta_descrip }}</textarea>
                    </div>
                    @if($products->image)
                    <img src="{{ asset('assets/uploads/products/'.$products->image)}}" alt="cat-img">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection