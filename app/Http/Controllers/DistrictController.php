<?php

namespace App\Http\Controllers;

use App\admin\District;
use Illuminate\Http\Request;
use Validator;

class DistrictController extends Controller
{
    public function index(){
        $districts = District::orderBy('id', 'desc')->get();
        return view('backEnd.district.district-list', ['districts' => $districts]);
    }
    public function addDistrict(){
        return view('backEnd.district.add-district');
    }
    protected function districtValidation($request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required |unique:districts',
            'status'          => 'required',
        ]);
        return $validator;
    }
    public function addDistrictSave(Request $request){
        $validator = $this->districtValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $district = new District();
        $district->name = $request->name;
        $district->status = $request->status;
        $district->save();
        return back()->with('message', 'New District Added Successfully !');
    }
    public function editDistrict($id){
        $district = District::where('id', $id)->first();
        return view('backEnd.district.edit-district', ['district' => $district]);
    }
    public function updateDistrict(Request $request){
        $validator = $this->districtValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $district = District::where('id', $request->id)->first();
        $district->name = $request->name;
        $district->status = $request->status;
        $district->update();
        return back()->with('message', 'District Updated Successfully !');
    }
    public function deleteDistrict($id){
        $district = District::where('id', $id)->first();
        $district->delete();
        return back()->with('message', 'District Deleted Successfully !');
    }
}
