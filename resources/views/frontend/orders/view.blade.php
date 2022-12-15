@extends('layouts.inc.front')

@section('title')
My Orders
@endsection
@section('content')


 <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
        
       
            <div class="card">
                    <div class="card-header bg-primary">
                    <h4> Order View 
                    <a href="{{url('my-orders')}}" class="btn btn-warning float-end">Back</a>
                    </h4>
                   
                    </div>
                
                <div class="card-body">   
                    
                  <div class="row">
                    <div class="col-md-6">
                            <label for="">Name</label>
                            <div class="border p-2">
                                {{ $orders ->fname}},
                                {{ $orders ->lname}}
                            </div>
                            
                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders ->email}}</div>
                            <label for="">Phone No.</label>
                            <div class="border p-2">{{ $orders ->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders ->address1}},
                                {{ $orders ->address2}},
                                {{ $orders ->city}},
                                {{ $orders ->state}},
                                {{ $orders ->country}}
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{ $orders ->pincode}}</div>
                            
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderd">
                        <thead>
                            <tr>
                            <!-- <th>Order Date</th> -->
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($orders->orderitems as $item)
                         
                         <tr>
                            <td> {{$item->products->name}}</td>
                            <td> {{$item->price}}</td>
                            <td> 
                                <img src="{{ asset('./assets/uploads/products/'.$item->products->image) }}" alt="" width="70px">
                            </td>

                         </tr>
                         @endforeach

                        </tbody>
                        </table> 

                        <h4>
                            Total : {{$orders -> total_price }}
                        </h4>
                    </div>
                  </div>
                          
                </div>

            </div>
       </div>
    </div>
</div>
 

<!-- 
     <h6>hello</h6> -->
@endsection