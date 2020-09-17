@extends('Admin.Layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Transaction</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Send Method</th>
                                    <th>Receive Method</th>
                                    <th>Role</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody id="table-body">
                                @foreach($pending as $pen)
                                <tr>
                                    <td>{{$pen->user->name}}</td>
                                    <td>{{$pen->method}}</td>
                                    <td>{{$pen->receive_method}}</td>
                                    <td>{{$pen->role}}</td>
                                    <td>{{$pen->user_contact}}</td>
                                    <td>{{$pen->status}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-header">
                            <h3 class="card-title">Transaction</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sell</th>
                                    <th>Buy</th>
                                    <th>Role</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody id="table-body">

                                @foreach($success as $pen)
                                    <tr>
                                        <td>{{$pen->user->name}}</td>
                                        <td>{{$pen->method}}</td>
                                        <td>{{$pen->receive_method}}</td>
                                        <td>{{$pen->role}}</td>
                                        <td>{{$pen->user_contact}}</td>
                                        <td>{{$pen->status}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                         <div class="card-header">
                            <h3 class="card-title">Transaction</h3>
                        </div>

                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sell</th>
                                    <th>Buy</th>
                                    <th>Role</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody id="table-body">

                                @foreach($cancel as $pen)
                                    <tr>
                                        <td>{{$pen->user->name}}</td>
                                        <td>{{$pen->method}}</td>
                                        <td>{{$pen->receive_method}}</td>
                                        <td>{{$pen->role}}</td>
                                        <td>{{$pen->user_contact}}</td>
                                        <td>{{$pen->status}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

