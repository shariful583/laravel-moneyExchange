@extends('User.Layout.authlayout')

@section('content')
{{--    <div class="alert alert-success">--}}
{{--        {{$message}}--}}
{{--    </div>--}}
    <form method="POST" action="{{route('user.login')}}">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
