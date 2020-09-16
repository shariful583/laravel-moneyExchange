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
        return view('Admin.transaction');
    }

    public function transactionFetch()
    {
        $pending = Transaction::with('method')->where('status','pending')->get();
        $success = Transaction::where('status','succeed')->get();
        $cancel = Transaction::where('status','cancelled')->get();

        return response()->json([
            'pending'=>$pending,
            'success'=>$success,
            'cancel'=>$cancel
        ]);
    }
}
