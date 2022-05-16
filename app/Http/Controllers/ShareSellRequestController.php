<?php

namespace App\Http\Controllers;

use App\ShareSellRequest;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ShareSellRequestController extends Controller
{
    protected function sellShareValidation($request){
        $validator = Validator::make($request->all(), [
            'share_name'                           => 'required',
            'share_id'                             => 'required',
            'client_share_id'                     => 'required',
            'sell_qty'                             => 'required',
            'sell_price'                           => 'required',
            'sell_total_price'                     => 'required',
            'sell_total_price_with_commission'     => 'required',
        ]);
        return $validator;
    }
    public function sellShareSave(Request $request){
        $validator = $this->sellShareValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $share_sell_request = new ShareSellRequest();
        $share_sell_request->share_id = $request->share_id;
        $share_sell_request->client_share_id = $request->client_share_id;
        $share_sell_request->client_id = Auth::user()->id;
        $share_sell_request->sell_qty = $request->sell_qty;
        $share_sell_request->sell_price = $request->sell_price;
        $share_sell_request->sell_total_price = $request->sell_total_price;
        $share_sell_request->sell_total_price_with_commission = $request->sell_total_price_with_commission;
        $share_sell_request->status = 0;
        $share_sell_request->save();
        return redirect('/client/sell-share-list')->with('message', 'Share Sell Request Submitted Successfully !!!');
    }
    public function sellShareList(){
        $share_sell_requests = ShareSellRequest::with('share')->where('client_id', Auth::user()->id)->where('status', 0)->paginate(20);
        return view('frontEnd.client-dashboard.share-request-sell-list', ['share_sell_requests' => $share_sell_requests]);
    }
}
