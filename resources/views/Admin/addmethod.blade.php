@extends('Admin.Layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Method</h3>
                        </div>
                        <p>Example: Skrill,Web Money, Bkash etc</p>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.addMethod')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Method Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Method Name">
                                    @error('name')
                                    <small id="methodErr" class="form-text alert-danger" >{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input type="text" name="account" class="form-control" placeholder="Account Number">
                                </div>

                                <div class="form-group">
                                    <label> Account Role</label>
                                    <select class="form-control" name="role">
                                        <option value="">None</option>
                                        <option value="receive_dollar">Receive Dollar</option>
                                        <option value="receive_bdt">Receive Taka</option>
                                    </select>
                                    @error('role')
                                    <small id="roleErr" class="form-text alert-danger" >{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
