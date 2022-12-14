@extends('layouts.inc.front')

@section('title')
Cart
@endsection
@section('content')

<div class="container">
    <div class="row">
        @if($cartdata->count() > 0)
        @php
        $total = 0;
        @endphp

        @foreach ($cartdata as $prod)
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
            <a href="/removeitem/{{$prod->cart_id}}" class="btn btn-danger">Delete</a>

        </div>
        @php
        $total += $prod->selling_price ;
        @endphp
        @endforeach
    </div>

    <div class="card-footer">
        <h6>Total Price {{$total}}</h6>
        <a href="{{ url('checkout')}}" class="btn btn-success">Proceed to Checkout</a>
    </div>
    @else
    <div class="card-body text-center"> 
        <h2> Your Cart is Empty</h2>
        <a href="{{ url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping </a>

        @endif

    </div>
</div>



@endsection