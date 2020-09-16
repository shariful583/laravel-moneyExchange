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
                        <form role="form" method="POST" action="{{route('admin.updateSellRate',['id'=>$sellRate->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select a method</label>
                                    <select class="custom-select" name="method_id" disabled="true">
                                        <option value="{{$sellRate['method_id']}}">{{(!empty($sellRate))?$sellRate->method->name:''}}</option>
                                        @foreach($methods as $method)
                                            @if($method['name']==$sellRate->method->name)
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
                                    <label>Sell Rate</label>
                                    <input type="text" class="form-control" placeholder="Sell Rate" name="sellRate" value="{{(!empty($sellRate))?$sellRate['sell_rate']:''}}">
                                </div>
                                <div class="form-group">
                                    <label>Min Sell Amount</label>
                                    <input type="text" class="form-control" placeholder="Min Sell" name="minSell" value="{{(!empty($sellRate))?$sellRate['min_sell']:''}}">
                                </div>
                                <div class="form-group">
                                    <label>Max Sell Amount</label>
                                    <input type="text" class="form-control" placeholder="Max Sell" name="maxSell" value="{{(!empty($sellRate))?$sellRate['max_sell']:''}}">
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
