@extends('User.Layout.authlayout')

@section('content')
    <form method="POST" action="/signup">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
            @error('name')
            <small id="nameErr" class="form-text alert-danger" >{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{old('email')}}">
            @error('email')
            <small id="nameErr" class="form-text alert-danger" >{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
            @error('password')
            <small id="nameErr" class="form-text alert-danger" >{{$message}}</small>
            @enderror
        </div>
        <div class="form-check">
            <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">terms & Condition</label>
        </div>
        <button id="signup" type="submit" class="btn btn-primary">Sign Up</button>

    </form>
@endsection
