@extends('layouts.inc.front')

@section('title')
Welcome to Estore
@endsection
@section('content')

<div class="container productdetail">
    <div class="row align-items-center">
        <div class="col-lg-5">
            <div class="pro-img mt-5">
                <img src="{{ asset('assets/uploads/products/'.$products->image)}}" alt="" style="width:100%">
            </div>
        </div>
        <div class="col-lg-7 product_data ">
            <ul class="mt-5">
                <li>
                    <h1>{{$products->name}}({{$products->small_descrip}})</h1>
                </li>

                <li>
                    <h3 class="mt-3"> <strong> ₹{{$products->selling_price}}</strong></h3>
                </li>
                <li>
                    <h4 class="mt-3" style="white-space:pre-wrap">{{$products->meta_descrip}}</h4>
                </li>

                @if($products->qty > 0)
                <label class="badge bg-success">In Stock</label>
                @else
                <label class="badge bg-danger">Out of Stock</label>
                @endif
                <div class="col-md-4">

                    <input type="hidden" value="{{ $products->id }}" class="prod_id">

                    <button class="btn btn-dark btn-lg addToCartBtn mt-5"> Add to cart</button>

                </div>
            </ul>
        </div>
    </div>

</div>

<div class="container mt-5">
    <h2 class="text-center">About this item</h2>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h5 class="mt-3" style="white-space:pre-wrap;">{{$products->description}}</h5>

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






<!-- 
Returns Policy

You may return most new, unopened items within 2 days of delivery for a full refund. We'll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.)..

You should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).

If you need to return an item, simply login to your account, view the order using the "Complete Orders" link under the My Account menu and click the Return Item(s) button. We'll notify you via e-mail of your refund once we've received and processed the returned item..


Shipping

We can ship to virtually any address in the world. Note that there are restrictions on some products, and some products cannot be shipped to international destinations..

When you place an order, we will estimate shipping and delivery dates for you based on the availability of your items and the shipping options you choose. Depending on the shipping provider you choose, shipping date estimates may appear on the shipping quotes page.

Please also note that the shipping rates for many items we sell are weight-based. The weight of any such item can be found on its detail page. To reflect the policies of the shipping companies we use, all weights will be rounded up to the next full pound.. -->