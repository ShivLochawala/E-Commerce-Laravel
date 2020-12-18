@extends('master')
@section('content')
<div class="custom-product">
    <div>
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h2>Add To Cart Products</h2>
                @if(session()->has('user'))
                @foreach($CartLists as $CartList)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="product-details/{{$CartList->id}}">
                        <img class="trending-image" src="{{$CartList->gallery}}" alt="{{$CartList->name}}">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <h4>{{$CartList->name}}</h4>
                            <h6>{{$CartList->description}}</h6>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-warning">Remove to Cart</button>
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