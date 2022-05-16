<?php

namespace App\Http\Controllers;

use App\admin\Share;
use App\admin\ShareRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ShareRequestController extends Controller
{
    public function buySharePrice(Request $request){
        $share = Share::where('id', $request->share_id)->first();
        return $share->price;
    }
    protected function total_price_with_commission($request){
        $commission = (($request->share_qty * $request->share_price) * Auth::user()->commission)/100;
        $total_price_with_commission = ($request->share_qty * $request->share_price) + $commission;
        return $total_price_with_commission;
    }
    protected function shareBuyValidation($request){
        $validator = Validator::make($request->all(), [
            'share_id'            => 'required|integer',
            'share_price_approx'  => 'required',
            'share_price'  => 'required',
            'share_qty'  => 'required',
            'share_total_amount'  => 'required',
            'total_price_with_commission'  => 'required',
        ]);
        return $validator;
    }
    public function buyShareSave(Request $request){
        $validator = $this->shareBuyValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $total_price_with_commission = $this->total_price_with_commission($request);
        $share_request = new ShareRequest();
        $share_request->share_id = $request->share_id;
        $share_request->client_id = Auth::user()->id;
        $share_request->qty = $request->share_qty;
        $share_request->price = $request->share_price;
        $share_request->total_price = $request->share_qty * $request->share_price;
        $share_request->total_price_with_commission = $total_price_with_commission;
        $share_request->status = 0;
        $share_request->save();
        return back()->with('message', 'Share Buy Request Submit Successfully !!!');
    }
    public function buyShareList(){
        $shares = ShareRequest::with('share')->where('client_id', Auth::user()->id)->where('status', 0)->get();
        return view('frontEnd.client-dashboard.share-request-list', ['shares' => $shares]);
    }
}
