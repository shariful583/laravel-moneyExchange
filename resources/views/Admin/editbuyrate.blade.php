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
                        <form role="form" method="POST" action="{{route('admin.updateBuyRate',['id'=>$buyRate->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select a method</label>
                                    <select class="custom-select" name="method_id" disabled="true">
                                        <option value="{{$buyRate['method_id']}}">{{(!empty($buyRate))?$buyRate->method->name:''}}</option>
                                        @foreach($methods as $method)
                                            @if($method['name']==$buyRate->method->name)
                                                @continue
                                            @endif
                                                <option value="{{$method['id']}}">{{$method['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('method_id')
                                    <small class="form-text text-muted">{{$message}}</small>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Buy Rate</label>
                                    <input type="text" class="form-control" placeholder="Buy Rate" name="buyRate" value="{{(!empty($buyRate))?$buyRate['buy_rate']:''}}">
                                </div>
                                <div class="form-group">
                                    <label>Min Buy Amount</label>
                                    <input type="text" class="form-control" placeholder="Min Buy" name="minBuy" value="{{(!empty($buyRate))?$buyRate['min_buy']:''}}">
                                </div>
                                <div class="form-group">
                                    <label>Max Buy Amount</label>
                                    <input type="text" class="form-control" placeholder="Max Buy" name="maxBuy" value="{{(!empty($buyRate))?$buyRate['max_buy']:''}}">
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
