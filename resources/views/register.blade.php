@extends('master2')
@section('content')
<div class="container-fluid custom-container login_panel">
    <form method="POST" action="register-user">
    @csrf
    <h1>Registration</h1>
    <div class="form-group">
        <!--<label for="exampleInputEmail1">Email ID</label>-->
        <input type="text" class="form-control" name="name" id="Name" aria-describedby="nameHelp" placeholder="Name" value="{{old('name')}}">
        @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <!--<label for="exampleInputEmail1">Email ID</label>-->
        <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp" placeholder="Email ID" value="{{old('email')}}">
        @if ($errors->has('email'))
            <span class="error">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" id="Password" placeholder="Password" value="{{old('password')}}">
        @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class="form-group">
        <a href="login">You are already exist?</a>
    </div>
    
    </form>
       
</div>
@endsection('content')