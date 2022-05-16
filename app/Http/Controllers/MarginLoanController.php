<?php

namespace App\Http\Controllers;

use App\MarginLoan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class MarginLoanController extends Controller
{
    public function marginLoan (){
        return view('frontEnd.client-dashboard.margin-loan');
    }
    public function marginLoanValidation($request){
        $validator = Validator::make($request->all(), [
            'amount'          => 'required',
        ]);
        return $validator;
    }
    public function marginLoanSave(Request $request){
        $validator = $this->marginLoanValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $marginLoan = new MarginLoan();
        $marginLoan->client_id = auth()->user()->id;
        $marginLoan->dse_bo_id = auth()->user()->dse_bo_id;
        $marginLoan->amount = $request->amount;
        $marginLoan->save();
        return back()->with('message', 'Margin loan request successfully submitted !');
    }

}
