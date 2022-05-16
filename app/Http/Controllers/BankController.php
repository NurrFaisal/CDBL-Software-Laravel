<?php

namespace App\Http\Controllers;

use App\admin\Bank;
use Illuminate\Http\Request;
use Validator;

class BankController extends Controller
{
    public function index(){
        $banks = Bank::orderBy('id', 'desc')->paginate(20);
        return view('backEnd.bank.bank-list', ['banks' => $banks]);
    }
    public function addBank(){
        return view('backEnd.bank.add-bank');
    }
    protected function bankValidation($request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required |unique:banks',
            'status'          => 'required',
        ]);
        return $validator;
    }
    public function addBankSave(Request $request){
        $validator = $this->bankValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $bank = new Bank();
        $bank->name = $request->name;
        $bank->status = $request->status;
        $bank->save();
        return back()->with('message', 'New Bank Added Successfully !');
    }

    public function editBank($id){
        $bank = Bank::where('id', $id)->first();
        $bank->update();
        return view('backEnd.bank.edit-bank', ['bank' => $bank]);
    }
    public function updateBank(Request $request){
        $validator = $this->bankValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $bank = Bank::where('id', $request->id)->first();
        $bank->name = $request->name;
        $bank->status = $request->status;
        $bank->update();
        return back()->with('message', 'Bank updated Successfully !');
    }
    public function deleteBank($id){
        $bank = Bank::where('id', $id)->first();
        $bank->delete();
        return back()->with('message', 'Bank Deleted Successfully !');
    }


}
