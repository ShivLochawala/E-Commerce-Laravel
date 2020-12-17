@extends('master')
@section('content')
<div class="custom-product">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php $count = 0;?>
            @foreach($products as $product)
            <div class="item {{$product['id']==1?'active':''}}">
            <a href="product-details/{{$product['id']}}">
            <img class="slider-img" src="{{$product->gallery}}" alt="{{$product->name}}">
            <div class="carousel-caption slider-text">
                <h3>{{$product->name}}</h3>
                <p>{{$product->description}}</p>
            </div>
            </a>
            </div>
            <?php $count++;?>
            @endforeach
        </div>

        <!-- Indicators -->
        <ol class="carousel-indicators">
            @for($i=0;$i<$count;$i++)
            <li data-target="#myCarousel" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}"></li>
            <!--<li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>-->
            @endfor
        </ol>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="trending-wrapper">
        <h3>Trending Products</h3>
        @foreach($products as $product)
        <a href="product-details/{{$product['id']}}">
        <div class="trending-item">
            <img class="trending-image" src="{{$product->gallery}}" alt="{{$product->name}}">
            <div class="">
                <h4>{{$product->name}}</h4>
            </div>
        </div>
        </a>
        @endforeach
    </div>
</div>
@endsection('content')