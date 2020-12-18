@extends('master')
@section('content')
<div class="custom-product">
    <div class="container">
        <a href="/home"> << Go Back</a>
        <div class="row">
            <div class="col-sm-6">
                <img class="productDetail-img" src="{{$productDetail->gallery}}" alt="">
            </div>
            <div class="col-sm-6">
                <h2> <b>{{$productDetail->name}}</b> </h2>
                <h3><b>Price :</b> Rs.{{$productDetail->price}}</h3>
                <h4><b>Details :</b> {{$productDetail->description}}</h4>
                <h4><b>Category:</b> {{$productDetail->category}}</h4>
                <br>
                <form action="/add-to-cart" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$productDetail->id}}">
                    <button class="btn btn-primary">Add To Cart</button>
                </form>
                <button class="btn btn-success">Buy Now</button>
            </div>
        </div>
    </div>
</div>
@endsection('content')