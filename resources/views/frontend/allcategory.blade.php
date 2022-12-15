@extends('layouts.inc.front')

@section('title')
Welcome to Estore
@endsection
@section('content')

<div class="container">
    <h1 class="mt-5 mb-5">All Categories</h1>
    <div class="row">
        @foreach ($category as $prod)
        <div class="col-md-3">
            <a href="{{url('view-category/'.$prod->slug)}}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/category/'.$prod->image)}}" alt="Category image">
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