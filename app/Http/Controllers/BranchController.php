<?php

namespace App\Http\Controllers;

use App\admin\Branch;
use App\admin\District;
use Illuminate\Http\Request;
use Validator;

class BranchController extends Controller
{
    public function index(){
        $branches = Branch::with('get_district_name')->orderBy('id', 'desc')->paginate(20);
        return view('backEnd.branch.branch-list', ['branches' => $branches]);
    }
    public function addBranch(){
        $districts  = District::where('status', 1)->orderBy('name', 'asc')->get();
        return view('backEnd.branch.add-branch', ['districts' => $districts]);
    }
    protected function branchValidation($request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required |unique:branches',
            'district_id'          => 'required',
            'division'          => 'required',
            'status'          => 'required',
        ]);
        return $validator;
    }
    protected function _branchBasic($request, $branch){
        $branch->name = $request->name;
        $branch->district_id = $request->district_id;
        $branch->division = $request->division;
        $branch->status = $request->status;
    }
    public function addBranchSave(Request $request){
        $validator = $this->branchValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $branch = new Branch();
        $this->_branchBasic($request, $branch);
        $branch->save();
        return back()->with('message', 'New Branch Added Successfully !');
    }
    public function editBranch($id){
        $branch = Branch::where('id', $id)->first();
        $districts  = District::where('status', 1)->orderBy('name', 'asc')->get();
        return view('backEnd.branch.edit-branch', ['branch' => $branch, 'districts' => $districts]);
    }
    public function updateBranch(Request $request){
        $validator = $this->branchValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $branch = Branch::where('id', $request->id)->first();
        $this->_branchBasic($request, $branch);
        $branch->update();
        return back()->with('message', 'Branch Updated Successfully !');
    }
    public function deleteBranch($id){
        $branch = Branch::where('id', $id)->first();
        $branch->delete();
        return back()->with('message', 'Branch Deleted Successfully !');
    }

}
