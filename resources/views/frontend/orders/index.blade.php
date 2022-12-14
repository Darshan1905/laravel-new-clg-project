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
                <h4> Order View</h4>
                </div>
                <div class="card-body">


            <table class="table table-borderd">
                <thead>
                    <tr>
                    <!-- <th>Order Date</th> -->
                        <th>Tracking Number</th>
                        <th>Total price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $items)
                    <tr>
                    <!-- <td>{{ $items->created_at}}</td> -->
                        <td>{{ $items->tracking_no}}</td>
                        <td>{{ $items->price}}</td>
                        <td>{{ $items->status == '0' ? 'Pending' : 'completed'}}</td>

                        <td>
                            <a href="{{ url('view-order/'.$items->id) }}" class="btn btn-primary"> View </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
                    </table>        
              </div>

            </div>
</div>
        </div>
    </div>
</div>

@endsection