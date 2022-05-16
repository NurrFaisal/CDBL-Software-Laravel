<?php

namespace App\Http\Controllers;

use App\admin\Transaction;
use App\admin\Withdraw;
use Illuminate\Http\Request;

class WithdrawAdminController extends Controller
{
    public function clientWithdrawAdminRequest(){
        $withdraw_requests = Withdraw::with(['user' => function($q){ $q->select('id', 'name');}])->where('status', 0)->paginate(20);
        return view('backEnd.withdraw-request.withdraw-request', ['withdraw_requests' => $withdraw_requests]);
    }
    public function clientWithdrawAdminRequestApproved($id){
        $withdraw = Withdraw::where('id', $id)->first();;
        $withdraw->status = 1;
        $withdraw->update();
        $transaction = new Transaction();
        $transaction->status = 1;
        $transaction->type = 'Withdraw';
        $transaction->trans_id = $withdraw->id;
        $transaction->client_id = $withdraw->client_id;
        $transaction->voucher_no = 'WIT-'.$withdraw->id;
        $transaction->trans_date = date('Y-m-d');
        $transaction->credit = $withdraw->amount;
        $transaction->save();
        return back()->with('message', 'Withdraw Request Approved Successfully !!!');
    }
}
