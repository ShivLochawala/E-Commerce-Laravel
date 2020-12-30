@extends('master')
@section('content')
<div class="custom-product">
    <div>
        <div class="col-sm-10">
            <div class="trending-wrapper">
                @if(session()->has('user'))
                    @if($cartCount > 0)
                    <h2>Add To Cart Products</h2>
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
                            <form action="/remove-to-cart" method="post">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{$CartList->cart_id}}">
                                <button class="btn btn-warning">Remove to Cart</button>
                            </form>
                            
                        </div>
                    </div>
                    @endforeach
                    <a href="/order-now" class="btn btn-success">Order Now</a><br><br>
                    @else 
                        <h4>You are not add any product into cart list</h4>
                    @endif
                @else
                    <h4>You are not login</h4>
                    <a href='/login'>You want login?</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection('content')