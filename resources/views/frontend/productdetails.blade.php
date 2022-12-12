@extends('layouts.inc.front')

@section('title')
Welcome to Estore
@endsection
@section('content')

<div class="container productdetail">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mt-5">
                <img src="{{ asset('assets/uploads/products/'.$products->image)}}" alt="" style="width:100%">
            </div>
        </div>
        <div class="col-lg-7 product_data ">
            <ul class="mt-5">
                <li>
                    <h1>{{$products->name}}</h1>
                </li>
                <li>
                    <h3 class="mt-3"> {{$products->small_descrip}}</h3>
                </li>
                <li>
                    <h3 class="mt-3"> Rs. {{$products->selling_price}}</h3>
                </li>
                <li>
                    <h3 class="mt-3">{{$products->description}}</h3>
                </li>

                @if($products->qty > 0)
                <label class="badge bg-success">In Stock</label>
                @else
                <label class="badge bg-danger">Out of Stock</label>
                @endif
                <div class="col-md-4">

                    <input type="hidden" value="{{ $products->id }}" class="prod_id">

                    <button class="btn btn-primary addToCartBtn"> Add to cart</button>

                </div>
            </ul>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $('.addToCartBtn').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        // alert(product_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'prod_id': product_id,
            },
            datatype: "dataType",
            success: function(response) {

                alert(response.status);

            }
        });
    });
})
</script>