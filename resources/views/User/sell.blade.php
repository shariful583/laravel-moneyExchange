@extends('User.Layout.layout')
@section('title', 'Sell Dollar')

@section('content')
    <div class="container">
        <div class="sell">

                <form action="{{route('user.sellTransaction')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <label for="sendMethodLabel" class="col-sm-2 col-form-label">Send Method</label>
                        <div class="col-sm-6">
                            <select name="sendMethodSelect" class="form-control select-option" id="sendMethodSelect">
                                <option value="">Select a method</option>
                                @foreach($sellMethod as $sell )
                                <option value="{{$sell->id}}">{{$sell['name']}}</option>
                                @endforeach
                            </select>
                            @error('sendMethodSelect')
                            <small id="methodErr" class="form-text alert-danger" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <label for="receiveMethodLabel" class="col-sm-2 col-form-label">Receive Method</label>
                        <div class="col-sm-6">
                            <select name="receiveMethodSelect" class="form-control select-option" id="receiveMethodSelect">
                                <option value="">Select a method</option>
                                @foreach($buyMethod as $buy )
                                    <option value="{{$buy->id}}">{{$buy['name']}}</option>
                                @endforeach
                            </select>
                            @error('receiveMethodSelect')
                            <small id="methodErr" class="form-text alert-danger" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <label for="sendAmountLabel" class="col-sm-2 col-form-label">Send Amount ($)</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" value="" name="sendAmountInput" id="sendAmountInput">
                            @error('sendAmountInput')
                            <small id="methodErr" class="form-text alert-danger" >{{$message}}</small>
                            @enderror
                            <span id="info" style="color:green;display:none">
                             Rate:<span id="rate"></span><br>
                             Min Buy:<span id="infomin"></span><br>
                             Max Buy:<span id="infomax"></span><br>
                                Total: <span id="amount"></span></span>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <label for="receiveAmountLabel" class="col-sm-2 col-form-label" >Receive Amount (BDT)</label>
                        <div class="col-sm-6">
                            <input type="number" readonly class="form-control" value="" name="receiveAmountInput" id="receiveAmountInput">
                            @error('receiveAmountInput')
                            <small id="methodErr" class="form-text alert-danger" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <label for="sendAcNumber" class="col-sm-2 col-form-label" id="sendAcNumberLabel">Email
                            <strong style="color:green">(Your Send Account)</strong></label></label>

                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="sendAcNumberInput" value="" name="sendAcNumberInput">
                            @error('sendAcNumberInput')
                            <small id="methodErr" class="form-text alert-danger" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <label for="receiveAcNumber" class="col-sm-2 col-form-label" id="receiveAcNumberLabel">Number
                            <strong style="color:green">(Your Receive Account)</strong></label>

                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="receiveAcNumberInput" value="" name="receiveAcNumberInput">
                            @error('receiveAcNumberInput')
                            <small id="methodErr" class="form-text alert-danger" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <label for="contactNumber" class="col-sm-2 col-form-label">Your Contact Number</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="" name="contactNumber">
                            @error('contactNumber')
                            <small id="methodErr" class="form-text alert-danger" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="alert alert-success" style="display:none" id="dynamicdiv">

                        Our <strong id="method"></strong> Number is <strong id="number"></strong>(Personal). After send money click submit button
                    </div><br>
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                        <div class="col-sm-4"></div>

                    </div>

                </form>
        </div>
    </div>

    <script>
        $(document).ready(function (){
            let id;
            let response={};
            let amount;
            $(".select-option").on('change',function (){
                if ($("#sendMethodSelect").text()!= ''){
                    if ($("#sendMethodSelect option:selected").text().match(/Web/g)){
                        document.querySelector('#sendAcNumberLabel').innerHTML = 'Web Money <strong style="color:green">(Your Send Account)</strong>';
                    }
                    if ($("#sendMethodSelect option:selected").text().match(/Skrill/g)){
                        document.querySelector('#sendAcNumberLabel').innerHTML = 'Skrill Email <strong style="color:green">(Your Send Account)</strong>';
                    }
                    if ($("#sendMethodSelect option:selected").text().match(/Neteller/g)){
                        document.querySelector('#sendAcNumberLabel').innerHTML = 'Neteller <strong style="color:green">(Your Send Account)</strong>';
                    }
                    if ($("#sendMethodSelect option:selected").text().match(/Perfect/g)){
                        document.querySelector('#sendAcNumberLabel').innerHTML = 'Perfect Money ID<strong style="color:green">(Your Send Account)</strong>';
                    }
                    if ($("#receiveMethodSelect option:selected").text().match(/Bkash/g)){
                        document.querySelector('#receiveAcNumberLabel').innerHTML = 'Bkash <strong style="color:green">(Your Receive Account)</strong>';
                    }
                    if ($("#receiveMethodSelect option:selected").text().match(/Rocket/g)){
                        document.querySelector('#receiveAcNumberLabel').innerHTML = 'Rocket <strong style="color:green">(Your Receive Account)</strong>';
                    }
                    if ($("#receiveMethodSelect option:selected").text().match(/Nagad/g)){
                        document.querySelector('#receiveAcNumberLabel').innerHTML = 'Nagad <strong style="color:green">(Your Receive Account)</strong>';
                    }
                }
            });
            $("#sendMethodSelect").on('change',function (){
                id = $("#sendMethodSelect").val();
                $.ajax({
                    method: 'GET',
                    async: false,
                    url: '/dollar-sell-rate',
                    dataType: 'json',
                    data: {rate: id},
                    success: function (data) {
                        response = data;
                    }
                });
                if ($("#sendAmountInput").val()!= ''){
                    $("#receiveAmountInput").val(response[0].sell_rate*$("#sendAmountInput").val());
                    amount = response[0].sell_rate*$("#sendAmountInput").val();
                    $("#rate").text(response[0].sell_rate);
                    $("#infomin").text(response[0].min_sell);
                    $("#infomax").text(response[0].max_sell);
                    $("#amount").text(amount);
                }
            });
            $("#sendAmountInput").on('input',function(){
                let sellRate = response[0].sell_rate;
                let sendAmount = $("#sendAmountInput").val();
                amount = response[0].sell_rate*$("#sendAmountInput").val();
                $("#receiveAmountInput").val(sellRate*sendAmount);
                $("#info").css("display","block");
                $("#rate").text(response[0].sell_rate);
                $("#infomin").text(response[0].min_sell);
                $("#infomax").text(response[0].max_sell);
                $("#amount").text(amount);

            });
        });

    </script>

@endsection
