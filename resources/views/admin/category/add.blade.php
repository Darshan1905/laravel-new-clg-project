@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input required type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input required type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <input required type="checkbox" name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="">Popular</label>
                        <input required type="checkbox" name="popular">
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Title</label>
                        <input required type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Description</label>
                        <textarea name="meta_descrip" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Keywords</label>
                        <input required type="text" class="form-control" name="meta_keywords">
                    </div>
                    <div class="col-md-12">
                        <input required type="file" name="image" class="form-control">
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