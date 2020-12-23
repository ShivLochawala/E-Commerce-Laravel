@extends('admin.master')
@section('content')
<div class="">
    <h3>All Product Details</h3>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Gallery</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td class="trending-image"><img class="trending-image" src="{{$product->gallery}}" alt="{{$product->name}}"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->description}}</td>
            <td>
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button class="btn btn-primary">Edit</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button class="btn btn-danger">Delete</button> 
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    
</div>
@endsection('content')