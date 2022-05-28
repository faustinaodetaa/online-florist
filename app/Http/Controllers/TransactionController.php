<?php

namespace App\Http\Controllers;


use App\Transactiondetail;
use App\Transactionheader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function history(Request $request){
        $headers = Transactionheader::all();
        return view('history', compact('headers'));
    }


}
