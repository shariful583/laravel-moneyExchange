@extends('Admin.Layout.authlayout');
@section('login')
    <form method="POST" id="loginform" class="form-horizontal" action="{{route('admin.login')}}">
        @csrf
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email">
        </div>

        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
        </div>

        <div class="input-group">
            <div class="checkbox">
                <label>
                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                </label>
            </div>
        </div>

        <div style="margin-top:10px" class="form-group">
            <!-- Button -->

            <div class="col-sm-12 controls">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>

    </form>
@endsection
