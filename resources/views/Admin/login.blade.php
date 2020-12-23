@extends('master2')
@section('content')
<div class="container-fluid custom-container login_panel">
    
            <form method="POST" action="login-admin">
            @csrf
            <h1>Login</h1>
            @if($invalid)
                <span class="error">{{ $invalid }}</span>
            @endif
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
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="form-group">
                <a href="register">You are new?</a>
            </div>
            
            </form>
       
</div>
@endsection('content')