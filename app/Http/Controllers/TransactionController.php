<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show transactions list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions_list = Transaction::paginate(10);
        return view('transactions', ['transactions_list' => $transactions_list]);
    }

}
