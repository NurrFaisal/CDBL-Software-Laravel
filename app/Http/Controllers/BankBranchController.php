<?php

namespace App\Http\Controllers;

use App\admin\Bank;
use App\admin\BankBranch;
use App\admin\District;
use Illuminate\Http\Request;
use Validator;

class BankBranchController extends Controller
{
    public function index(){
        $bank_branches = BankBranch::with('get_bank_name', 'get_district_name')->orderBy('id', 'desc')->paginate(20);
        return view('backEnd.bank-branch.bank-branch-list', ['bank_branches' => $bank_branches]);
    }
    public function addBankBranch(){
        $banks = Bank::where('status', 1)->orderBy('name', 'asc')->get();
        $districts = District::where('status', 1)->orderBy('name', 'asc')->get();
        return view('backEnd.bank-branch.add-bank-branch', ['banks' => $banks, 'districts' => $districts]);
    }
    protected function bankBranchValidation($request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'bank_id'          => 'required',
            'bank_routing'          => 'required',
            'district_id'          => 'required',
            'status'          => 'required',
        ]);
        return $validator;
    }
    protected function _bankBranchInfo($request, $bank_branch){
        $bank_branch->name = $request->name;
        $bank_branch->bank_id = $request->bank_id;
        $bank_branch->bank_routing = $request->bank_routing;
        $bank_branch->district_id = $request->district_id;
        $bank_branch->status = $request->status;
    }
    public function addBankBranchSave(Request $request){
        $validator = $this->bankBranchValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $bank_branch = new BankBranch();
        $this->_bankBranchInfo($request, $bank_branch);
        $bank_branch->save();
        return back()->with('message', 'New Bank Branch Added Successfully !');
    }
    public function editBankBranch($id){
        $banks = Bank::where('status', 1)->orderBy('name', 'asc')->get();
        $districts = District::where('status', 1)->orderBy('name', 'asc')->get();
        $bank_branch = BankBranch::where('id', $id)->first();
        return view('backEnd.bank-branch.edit-bank-branch', ['bank_branch' => $bank_branch, 'banks' => $banks, 'districts' => $districts]);
    }
    public function updateBankBranch(Request $request){
        $validator = $this->bankBranchValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $bank_branch = BankBranch::where('id', $request->id)->first();
        $this->_bankBranchInfo($request, $bank_branch);
        $bank_branch->save();
        return back()->with('message', 'Bank Branch Updated Successfully !');
    }
    public function deleteBankBranch($id){
        $bank_branch = BankBranch::where('id', $id)->first();
        $bank_branch->delete();
        return back()->with('message', 'Bank Branch Deleted Successfully !');
    }
}
