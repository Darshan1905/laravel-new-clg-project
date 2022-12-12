@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>All Products</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($products as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category?->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->selling_price}}</td>

                        <td><img src="{{ asset('assets/uploads/products/'.$item->image) }}" alt="img" width="90px">
                        </td>
                        <td>
                            <a href="{{ url('edit-product/'.$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete-product/'.$item->id)}}" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection