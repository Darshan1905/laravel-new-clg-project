@extends('layouts.inc.front')

@section('title')
Welcome to Estore
@endsection
@section('content')

@include('layouts.inc.slider')

<div class="container-fluid text-start">
    <div class="row g-0">
        <div class="col-lg-3 col-md-6"><img src="assets/images/earbud.avif" alt="" style="width:100%"></div>
        <div class="col-lg-3 col-md-6">
            <div class="ps-3">
                <h3 class="mt-4">EARBUDS</h3>
                <h6>Best in class driver & chipset for deep bass and PRO audio.</h6>
                <div class="btn btn-dark text-white">Shop Now</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6"><img src="assets/images/samsung.avif" alt="" style="width:100%"></div>
        <div class="col-lg-3 col-md-6">
            <div class="ps-3">
                <h3 class="mt-4">GALAXY S22 ULTRA</h3>
                <h6>Our smoothest scrolling screen with Super Smooth 120 Hz</h6>
                <div class="btn btn-dark text-white">Shop Now</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ps-3">
                <h3 class="mt-4">BEATS SOLO</h3>
                <h6>Elevate Your Music. Buy the Beats By Dre urBeats Wired In-Ear Headphone</h6>
                <div class="btn btn-dark text-white">Shop Now</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6"><img src="assets/images/beats-headphone.avif" alt="" style="width:100%"></div>
        <div class="col-lg-3 col-md-6">
            <div class="ps-3">
                <h3 class="mt-4">SMART WATCH</h3>
                <h6>The World's First Smart Band With Body Temperature</h6>
                <div class="btn btn-dark text-white">Shop Now</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6"><img src="assets/images/smartwatch.avif" alt="" style="width:100%"></div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($products as $prod)
            <div class="col-md-3">
                <a href="{{url('product_detail/'.$prod->id)}}">
                    <div class="card product_data">
                        <img src="{{ asset('assets/uploads/products/'.$prod->image)}}" alt="Product image">
                        <div class="card-body ">
                            <h4>{{ $prod->name }}</h4>
                            <h6 class="mb-4">({{ $prod->small_descrip }})</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Rs. {{ $prod->selling_price }}</h5>
                                <div>

                                    <input type="hidden" value="{{ $prod->id }}" class="prod_id">
                                    <button class="btn btn-dark addToCartBtn"> Add to cart</button>

                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            @endforeach
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