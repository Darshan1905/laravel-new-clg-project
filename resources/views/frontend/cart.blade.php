@extends('layouts.inc.front')

@section('title')
Cart
@endsection
@section('content')

<div class="container mt-5 mb-5">
    <h1 class="mb-5">Shopping Cart</h1>
    <div class="row">
        @if($cartdata->count() > 0)
        @php
        $total = 0;
        @endphp


        <div class="col-md-8 shadow-lg p-3 mb-5  bg-white rounded"
            style="border:2px solid #000; border-radius:20px !important;">
            @foreach ($cartdata as $prod)

            <div class="row p-2  mt-3 mb-3">
                <div class="col-md-4"> <a href="{{url('product_detail/'.$prod->id)}}"><img
                            src="{{ asset('assets/uploads/products/'.$prod->image)}}" alt="Product image" width="200px">
                    </a></div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-between">
                        <h4>{{ $prod->name }}({{ $prod->small_descrip }})</h4>
                        <h4>₹{{ $prod->selling_price }}</h4>
                    </div>
                    <h6 class="mb-4 mt-3">{{ $prod->meta_descrip }}</h6>
                    <a href="/removeitem/{{$prod->cart_id}}" class="btn btn-danger">Delete</a>


                </div>
            </div>

            @php
            $total += $prod->selling_price ;
            @endphp
            @endforeach

        </div>

        <div class="col-md-4 ">

            <div class=" container shadow-lg p-3 mb-5 bg-white rounded"
                style=" border:2px solid #000; border-radius:20px !important;">
                <div class="">

                    <h3 class="mb-4"> <strong> Total Price:- </strong>₹{{$total}}</h3>
                    <a href="{{ url('checkout')}}" class="btn btn-success">Proceed to Checkout</a>

                </div>
            </div>
        </div>
    </div>
    @else
    <div class="card-body text-center"> 
        <h2> Your Cart is Empty</h2>
        <a href="{{ url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping </a>

        @endif

    </div>
</div>



@endsection