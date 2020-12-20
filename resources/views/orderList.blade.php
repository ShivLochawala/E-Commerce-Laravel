@extends('master')
@section('content')
<div class="custom-product">
    <div>
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h2>My Order Product Details</h2><br>
                @if(session()->has('user'))
                @foreach($OrderLists as $OrderList)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="product-details/{{$OrderList->id}}">
                        <img class="trending-image" src="{{$OrderList->gallery}}" alt="{{$OrderList->name}}">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <h4>Name: {{$OrderList->name}}</h4>
                            <h6>Address: {{$OrderList->address}}</h6>
                            <h6>Delivery Status: {{$OrderList->status}}</h6>
                            <h6>Payment Method: {{$OrderList->payment_method}}</h6>
                            <h6>Payment Status: {{$OrderList->payment_status}}</h6>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        
                        
                    </div>
                </div>
                @endforeach
                @else
                    <h4>You are not login</h4>
                    <a href='/login'>You want login?</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection('content')