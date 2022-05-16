<?php

namespace App\Http\Controllers;

use App\admin\DseXml;
use App\admin\Share;
use Illuminate\Http\Request;
use Validator;

class ShareAdminController extends Controller
{
    public function addShare(){
        return view('backEnd.share.add-share');
    }
    protected function shareValidation($request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'qty'          => 'required | integer',
            'bo_isn'          => 'required',
            'group'          => 'required',
            'marginable'          => 'required',
            'price'          => 'required',
            'status'          => 'required',
        ]);
        return $validator;
    }
    public function getSharePrice(){
        $boisn = $_GET['boisn'];
        $getPriceSql = DseXml::where('isin', $boisn) ->first();
        return response()->json($getPriceSql);
    }
    public function _shareBasic($request, $share){
        $share->name   = $request->name;
        $share->qty    = $request->qty;
        $share->bo_isn    = $request->bo_isn;
        $share->group    = $request->group;
        $share->marginable    = $request->marginable;
        $share->price  = $request->price;
        $share->status = $request->status;
    }
    public function addShareSave(Request $request){
        $validator = $this->shareValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $share = new Share();
        $this->_shareBasic($request, $share);
        $share->save();
        return back()->with('message', 'New Share Added Successfully !');
    }
    public function shareList(){
        $shares = Share::orderBy('id', 'desc')->paginate(20);
        return view('backEnd.share.share-list', ['shares' => $shares]);
    }
    public function shareEdit($id){
        $share = Share::where('id', $id)->first();
        return view('backEnd.share.edit-share', ['share' => $share]);
    }
    public function shareUpdate(Request $request){
        $validator = $this->shareValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $share = Share::where('id', $request->id)->first();
        $this->_shareBasic($request, $share);
        $share->update();
        return back()->with('message', 'Share Update Successfully !');
    }
    public function shareDelete($id){
        $share = Share::where('id', $id)->first();
        $share->delete();
        return back()->with('message', 'Share Deleted Successfully !');
    }
}
