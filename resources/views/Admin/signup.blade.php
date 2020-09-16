@extends('Admin.Layout.authlayout');
@section('login')
    <form id="loginform" class="form-horizontal" role="form">

        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" name="name" value="" placeholder="Name or email">
        </div>

        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
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
                <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

            </div>
        </div>


        <div class="form-group">
            <div class="col-md-12 control">
                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                    Don't have an account!
                    <a href="{{route('admin.signup')}}">
                        Sign Up Here
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
