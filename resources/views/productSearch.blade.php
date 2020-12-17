@extends('master')
@section('content')
<div class="custom-product">
    <div>
        <div class="col-sm-4">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-4">
            <div class="trending-wrapper">
                <h2>Searched Products</h2>
                @foreach($products as $product)
                <a href="product-details/{{$product['id']}}">
                <div class="searched-item">
                    <img class="trending-image" src="{{$product->gallery}}" alt="{{$product->name}}">
                    <div class="">
                        <h4>{{$product->name}}</h4>
                        <h6>{{$product->description}}</h6>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection('content')