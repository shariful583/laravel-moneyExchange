<?php

namespace App\Http\Controllers\User;

use App\Models\Buyrate;
use App\Models\Method;use App\Models\Sellrate;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        return view('User.home');
    }

    public function showSell()
    {
        $data = [];

        $data['sellMethod'] = Method::where('role','receive_dollar')->get();
        $data['buyMethod'] = Method::where('role','receive_bdt')->get();

        return view('User.sell')->with($data);
    }

    public function showBuy()
    {
        $data = [];

        $data['buyMethod'] = Method::where('role','receive_dollar')->get();
        $data['sellMethod'] = Method::where('role','receive_bdt')->get();
        return view('User.buy')->with($data);
    }

    public function fetchDollarSellRate(Request $request)
    {
        $id = $request->rate;
        $rate = Sellrate::where('method_id',$id)->get();
        return response()->json($rate);
    }
    public function fetchDollarBuyRate(Request $request)
    {
        $id = $request->rate;
        $rate = Buyrate::where('method_id',$id)->get();
        return response()->json($rate);
    }

    public function sellTransaction(Request $request)
    {
        $transaction = new Transaction;
        $rule = [
            'sendMethodSelect' => 'required',
            'receiveMethodSelect' => 'required',
            'sendAmountInput' => 'required',
            'receiveAmountInput' => 'required',
            'sendAcNumberInput' => 'required',
            'receiveAcNumberInput' => 'required',
            'contactNumber' => 'required'
        ];
        $message=[
            'sendMethodSelect.required' => 'Select a send method',
            'receiveMethodSelect.required' => 'Select a receive method',
            'sendAmountInput.required' => 'We need your send amount',
            'receiveAmountInput.required' => 'Need this input',
            'sendAcNumberInput.required' => 'We need your send Account number',
            'receiveAcNumberInput.required' => 'We need your receive Account number',
            'contactNumber.required' => 'We need your contact number'
        ];
        $validator = Validator::make($request->all(),$rule,$message);
        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $user_id = Auth::guard('web')->user()->id;
            $transaction->user_id = $user_id;
            $transaction->role = 'sell';
            $transaction->send_method = $request->input('sendMethodSelect');
            $transaction->receive_method = $request->input('receiveMethodSelect');
            $transaction->amount_dollar = $request->input('sendAmountInput');
            $transaction->amount_BDT = $request->input('receiveAmountInput');
            $transaction->user_money_send_ac = $request->input('sendAcNumberInput');
            $transaction->user_money_rec_ac = $request->input('receiveAcNumberInput');
            $transaction->user_contact = $request->input('contactNumber');
            $transaction->save();
            return redirect()->route('user.buy');

        } catch (\Exception $exception){
            return redirect()->back();
        }

    }

    public function buyTransaction(Request $request)
    {
        $transaction = new Transaction;
        $rule = [
            'sendMethodSelect' => 'required',
            'receiveMethodSelect' => 'required',
            'sendAmountInput' => 'required',
            'receiveAmountInput' => 'required',
            'sendAcNumberInput' => 'required',
            'receiveAcNumberInput' => 'required',
            'contactNumber' => 'required',
            'trxid' => 'required'
        ];
        $message=[
            'sendMethodSelect.required' => 'Select a send method',
            'receiveMethodSelect.required' => 'Select a receive method',
            'sendAmountInput.required' => 'We need your send amount',
            'receiveAmountInput.required' => 'Need this input',
            'sendAcNumberInput.required' => 'We need your send Account number',
            'receiveAcNumberInput.required' => 'We need your receive Account number',
            'contactNumber.required' => 'We need your contact number',
            'trxid.required' => 'We need your transaction number'
        ];
        $validator = Validator::make($request->all(),$rule,$message);
        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $user_id = Auth::guard('web')->user()->id;
            $transaction->user_id = $user_id;
            $transaction->role = 'buy';
            $transaction->send_method = $request->input('sendMethodSelect');
            $transaction->receive_method = $request->input('receiveMethodSelect');
            $transaction->amount_dollar = $request->input('sendAmountInput');
            $transaction->amount_BDT = $request->input('receiveAmountInput');
            $transaction->user_money_send_ac = $request->input('sendAcNumberInput');
            $transaction->user_money_rec_ac = $request->input('receiveAcNumberInput');
            $transaction->trx_id = $request->input('trxid');
            $transaction->user_contact = $request->input('contactNumber');
            $transaction->save();
            return redirect()->route('user.sell');

        } catch (\Exception $exception){
            return redirect()->back();
        }
    }
}
