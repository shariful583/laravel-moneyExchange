<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Method;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showTransaction()
    {
        $data = [];
        $data['pending'] = Transaction::with('method')->where('status','pending')->get();
        $data['success'] = Transaction::where('status','succeed')->get();
        $data['cancel'] = Transaction::where('status','cancelled')->get();
        return view('Admin.transaction')->with($data);
    }

}
