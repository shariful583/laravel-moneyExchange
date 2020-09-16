<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buyrate;
use App\Models\Method;
use App\Models\Sellrate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showSellRate()
    {
        $methods = Method::where('role','receive_dollar')->get();
        return view('Admin.addsellRate')->with('methods',$methods);
    }

    public function showBuyRate()
    {
        $methods = Method::where('role','receive_dollar')->get();
        return view('Admin.addbuyRate')->with('methods',$methods);
    }

    public function addSellRate(Request $request)
    {
        $request->validate([
            'method_id' => 'required|unique:sellrates'
        ]);
        try {
            $sellRate = new Sellrate();
            $sellRate->method_id = $request->input('method_id');
            $sellRate->sell_rate = $request->input('sellRate');
            $sellRate->min_sell = $request->input('minSell');
            $sellRate->max_sell = $request->input('maxSell');
            $sellRate->save();
            return redirect()->route('admin.rate');
        } catch (\Exception $e){

        }

    }

    public function showUpdateSellRate($id)
    {
        $data = [];
        $data['methods'] = Method::where('role','receive_dollar')->get();
        $data['sellRate'] = Sellrate::where('id',$id)->first();
        if (!empty($data)){
            return view('Admin.editsellrate')->with($data);
        } else{
            return view('Admin.rate');
        }
    }

    public function updateSellRate(Request $request,$id)
    {
        try {

            Sellrate::where('id',
                $id)->update([
                'sell_rate'=>$request->input('sellRate'),
                'min_sell'=>$request->input('minSell'),
                'max_sell'=>$request->input('maxSell')]);
            return redirect()->route('admin.rate');
        } catch (\Exception $exception){
            return redirect()->back();
        }

    }

    public function addBuyRate(Request $request)
    {
        $request->validate([
            'method_id' => 'required|unique:buyrates'
        ]);
        try {
            $buyRate = new Buyrate();
            $buyRate->method_id = $request->input('method_id');
            $buyRate->buy_rate = $request->input('buyRate');
            $buyRate->min_buy = $request->input('minBuy');
            $buyRate->max_buy = $request->input('maxBuy');
            $buyRate->save();
            return redirect()->route('admin.rate');
        } catch (\Exception $e){

        }
    }

    public function showUpdateBuyRate($id)
    {
        $data = [];
        $data['methods'] = Method::where('role','receive_dollar')->get();
        $data['buyRate'] = Buyrate::where('id',$id)->first();
        if (!empty($data)){
            return view('Admin.editbuyrate')->with($data);
        } else{
            return view('Admin.rate');
        }
    }

    public function updateBuyRate(Request $request,$id)
    {
        try {

            Buyrate::where('id',
                $id)->update([
                'buy_rate'=>$request->input('buyRate'),
                'min_buy'=>$request->input('minBuy'),
                'max_buy'=>$request->input('maxBuy')]);
            return redirect()->route('admin.rate');
        } catch (\Exception $exception){
            return redirect()->back();
        }

    }

    public function deleteSellRate($id)
    {
        Sellrate::destroy($id);
        return redirect()->route('admin.rate');
    }

    public function deleteBuyRate($id)
    {
        Buyrate::destroy($id);
        return redirect()->route('admin.rate');
    }
}
