<?php

namespace App\Http\Controllers;

use App\admin\BoAmount;
use App\admin\ShareRequest;
use App\admin\Transaction;
use App\admin\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;

class ClientWithdrawController extends Controller
{
    public function withdrawAmount(){
        return view('frontEnd.client-dashboard.client-withdraw');
    }
    protected function withdrawValidation($request){
        $validator = Validator::make($request->all(), [
            'amount'          => 'required',
        ]);
        return $validator;
    }
    public function withdrawAmountUpdate(Request $request){
        $validator = $this->withdrawValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $withdraw = new Withdraw();
        $withdraw->client_id = Auth::user()->id;
        $withdraw->amount = $request->amount;
        $withdraw->status = 0;
        $withdraw->save();
        return back()->with('message', 'Withdraw Save Successfully !!!');
    }
    public function withdrawAmountList(){
        $withdraws = Withdraw::orderBy('id', 'desc')->where('status', 0)->paginate(20);
        return view('frontEnd.client-dashboard.withdraw-list', ['withdraws' => $withdraws]);
    }
}
