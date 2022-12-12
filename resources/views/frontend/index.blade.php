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
</div>

@endsection