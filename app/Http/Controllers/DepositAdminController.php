<?php

namespace App\Http\Controllers;

use App\admin\Diposite;
use App\admin\Transaction;
use Illuminate\Http\Request;

class DepositAdminController extends Controller
{
    public function clientDepositRequest(){
        $deposits = Diposite::with(['user' => function($q){ $q->select('id', 'name');}])->where('status', 0)->paginate(20);
        return view('backEnd.deposit-request.deposit-request', ['deposits' => $deposits]);
    }
    public function clientDepositRequestApproved($id){
        $deposit = Diposite::where('id', $id)->first();
        $deposit->status = 1;
        $deposit->update();
        $transaction = new Transaction();
        $transaction->status = 1;
        $transaction->type = 'Deposit';
        $transaction->trans_id = $deposit->id;
        $transaction->client_id = $deposit->client_id;
        $transaction->voucher_no = 'DEP-'.$deposit->id;
        $transaction->trans_date = date('Y-m-d');
        $transaction->debit = $deposit->amount;
        $transaction->save();
        return back()->with('message', 'Deposit Request Approved Successfully !!!');
    }
}
