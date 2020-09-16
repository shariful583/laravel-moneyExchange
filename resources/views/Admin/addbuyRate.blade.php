@extends('Admin.Layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Buy Rate</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.addBuyRate')}}" method="POSt">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select a method</label>
                                    <select class="custom-select" name="method_id">
                                        <option value="">None</option>
                                        @foreach($methods as $method)
                                            <option value="{{$method['id']}}">{{$method['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('method_id')
                                    <small class="form-text text-muted">{{$message}}</small>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Buy Rate</label>
                                    <input type="text" class="form-control" placeholder="Buy Rate" name="buyRate">
                                </div>
                                <div class="form-group">
                                    <label>Min Buy Amount</label>
                                    <input type="text" class="form-control" placeholder="Min Buy" name="minBuy">
                                </div>
                                <div class="form-group">
                                    <label>Max Buy Amount</label>
                                    <input type="text" class="form-control" placeholder="Max Buy" name="maxBuy">
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
