@extends('admin.master')
@section('content')
<div class="trending-wrapper">
    
    <form method="POST" action="adding-product" enctype="multipart/form-data">
    @csrf
    <h2>Add Product</h2>
    @if($successmsg)
        <span class="" style="color:green">{{ $successmsg }}</span>
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}">
        @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{old('price')}}">
        @if ($errors->has('price'))
            <span class="error">{{ $errors->first('price') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Category</label>
        <input type="text" class="form-control" name="category" id="category" placeholder="Category" value="{{old('category')}}">
        @if ($errors->has('category'))
            <span class="error">{{ $errors->first('category') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea class="form-control" name="description" id="description" rows="4" placeholder="Description">
        {{old('description')}}
        </textarea>
        @if ($errors->has('description'))
            <span class="error">{{ $errors->first('description') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Product Image</label>
        <input type="file" class="form-control" name="gallery" id="gallery" placeholder="Gallery" value="{{old('gallery')}}">
        @if ($errors->has('gallery'))
            <span class="error">{{ $errors->first('gallery') }}</span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
    
    </form>
</div>
@endsection('content')