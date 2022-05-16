<?php

namespace App\Http\Controllers;

use App\admin\BoAmount;
use Illuminate\Http\Request;
use Validator;

class BoAmountController extends Controller
{
    protected function boAmountValidation($request){
        $validator = Validator::make($request->all(), [
            'boAmount'          => 'required',
            'minBalance'          => 'required',
        ]);
        return $validator;
    }
    public function boAmountUpdate(Request $request){
        $validator = $this->boAmountValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $bo_amount = BoAmount::where('id', 1)->first();
        $bo_amount->bo_amount = $request->boAmount;
        $bo_amount->min_balance = $request->minBalance;
        $bo_amount->update();
        return back()->with('message', 'BO Amount And Min Balance Updated Successfully !');
    }

    public function boAmount(){
        $bo_amount = BoAmount::where('id', 1)->first();
        return view('backEnd.bo-amount.bo-amount', ['bo_amount' => $bo_amount]);
    }
}
