@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>Edit /update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" cols="30" rows="5"
                            class="form-control">{{ $category->description }} </textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $category->status == "1" ? 'checked':'' }} name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="">Popular</label>
                        <input type="checkbox" {{ $category->popular == "1" ? 'checked':'' }} name="popular">
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $category->meta_title }}" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Description</label>
                        <textarea name="meta_descrip" cols="30" rows="5"
                            class="form-control">{{ $category->meta_descrip }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Keywords</label>
                        <input type="text" value="{{ $category->meta_keywords }}" class="form-control"
                            name="meta_keywords">
                    </div>
                    @if($category->image)
                    <img src="{{ asset('assets/uploads/category/'.$category->image)}}" alt="cat-img">
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