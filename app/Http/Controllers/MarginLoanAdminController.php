<?php

namespace App\Http\Controllers;

use App\MarginLoan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class MarginLoanAdminController extends Controller
{
    public function marginLoanRequest(){
        $marginLoans = MarginLoan::with(['get_user_name' => function($q){$q->select('id', 'name');}])
            ->where('status', 0)
            ->orderBy('id', 'desc')
            ->paginate(20);
//        return $marginLoans;
        return view('backEnd.margin-loan.margin-loan-request', [
            'marginLoans' => $marginLoans
        ]);
    }
    public function marginLoanApproved(){
        $marginLoans = MarginLoan::with(['get_user_name' => function($q){$q->select('id', 'name');}])
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(20);
//        return $marginLoans;
        return view('backEnd.margin-loan.margin_loan_approved_list', [
            'marginLoans' => $marginLoans
        ]);
    }
    public function marginLoanRequestEdit($id){
        $marginLoan = MarginLoan::with(['get_user_name' => function($q){$q->select('id', 'name');}])
        ->where('id',$id)
        ->first();
        return view('backEnd.margin-loan.margin-loan-edit', ['marginLoan' => $marginLoan]);
    }
    public function marginLoanValidation($request){
        $validator = Validator::make($request->all(), [
            'interest_rate'          => 'required',
            'approved_amount'          => 'required',
            'status'          => 'required',
        ]);
        return $validator;
    }
    public function marginLoanRequestUpdate(Request $request){
        $validator = $this->marginLoanValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $marginLoan = MarginLoan::where('id', $request->id)->first();
        $marginLoan->approved_amount = $request->approved_amount;
        $marginLoan->interest_rate = $request->interest_rate;
        $marginLoan->status = $request->status;
        $marginLoan->update();
        return redirect('/admin/margin-loan-request')->with('message', 'Margin Loan Request Updated Successfully !!!');
    }
}
