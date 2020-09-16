@extends('Admin.Layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dollar Sell Rate</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Method</th>
                                    <th>Rate</th>
                                    <th>Min Sell</th>
                                    <th>Max Sell</th>
                                    <th>More</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sellRates as $sellRate)
                                    <tr>
                                        <td></td>
                                        <td>{{$sellRate->method->name}}</td>
                                        <td>{{$sellRate->sell_rate}}</td>
                                        <td>{{$sellRate->min_sell}}</td>
                                        <td>{{$sellRate->max_sell}}</td>
                                        <td>
                                            <a href="{{route('admin.showSellRate',['id'=>$sellRate->id])}}" class="text-muted">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="delete" style="display: inline-block" action="{{route('admin.deleteSellRate',['id'=>$sellRate['id']])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border: none;background-color: white"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a class="btn badge-info" href="{{route('admin.sellRate')}}">Add Sell Rate</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dollar Buy Rate</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Method</th>
                                    <th>Rate</th>
                                    <th>Min Sell</th>
                                    <th>Max Sell</th>
                                    <th>More</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($buyRates as $buyRate)
                                <tr>
                                    <td></td>
                                    <td>{{$buyRate->method->name}}</td>
                                    <td>{{$buyRate->buy_rate}}</td>
                                    <td>{{$buyRate->min_buy}}</td>
                                    <td>{{$buyRate->max_buy}}</td>
                                    <td>
                                        <a href="{{route('admin.showBuyRate',['id'=>$buyRate->id])}}" class="text-muted">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="delete" style="display: inline-block" action="{{route('admin.deleteBuyRate',['id'=>$buyRate['id']])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none;background-color: white"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a class="btn badge-info" href="{{route('admin.buyRate')}}">Add Buy Rate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



