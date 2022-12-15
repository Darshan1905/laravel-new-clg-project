@extends('layouts.inc.front')

@section('title')
Checkout
@endsection
@section('content')

<div class="container">
    <form action="{{ url('place-order') }}" method="POST">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <div class="row">
                        <div class="col-md-6 pt-4">
                            <label for="">First name</label>
                            <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="fname">
                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="">Last name</label>
                            <input type="text" value="{{ Auth::user()->lname }}" class="form-control" name="lname">
                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="">Email</label>
                            <input type="email" value="{{ Auth::user()->email }}" class="form-control" name="email">

                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="">Phone number</label>
                            <input type="number" value="{{ Auth::user()->phone }}" class="form-control" name="phone">
                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="">Address 1</label>
                            <input type="text" value="{{ Auth::user()->address1 }}" class="form-control" name="address1">
                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="">Address 2</label>
                            <input type="text" value="{{ Auth::user()->address2 }}" class="form-control" name="address2">
                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="">City</label>
                            <input type="text" value="{{ Auth::user()->city }}" class="form-control" name="city">
                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="">State</label>
                            <input type="text" value="{{ Auth::user()->state }}" class="form-control" name="state">
                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="">Country</label>
                            <input type="text" value="{{ Auth::user()->country }}" class="form-control" name="country">
                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="">Pincode</label>
                            <input type="number" value="{{ Auth::user()->pincode }}" class="form-control" name="pincode">
                        </div>
                        <!-- <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order Details</h6>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartitems as $item)
                            <tr>
                                <td>
                                    {{$item->products->name}}
                                </td>
                                <!-- <td>
                            {{$item->prod_qty}}

                        </td> -->
                                <td>
                                    Rs. {{$item->products->selling_price}}/-
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-primary float-end"> Place Order</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@endsection