<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buyrate;
use App\Models\Sellrate;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        return view('Admin.dashboard');
    }

    public function dollarRate()
    {
        $data =[];
        $data['sellRates'] = Sellrate::all();
        $data['buyRates'] = Buyrate::all();
        return view('Admin.rate')->with($data);
    }
}
