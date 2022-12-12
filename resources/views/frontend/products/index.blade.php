@extends('layouts.inc.front')

@section('title')
Products
@endsection
@section('content')

<div class="container">
    <div class="row">
        <h2>{{$category->name}}</h2>
        @foreach ($products as $prod)
        <div class="col-md-3">
            <a href="{{url('product_detail/'.$prod->id)}}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/products/'.$prod->image)}}" alt="Product image">
                    <div class="card-body">
                        <h4>{{ $prod->name }}</h4>
                        <h6>{{ $prod->selling_price }}</h6>
                        <h6>{{ $prod->small_descrip }}</h6>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection