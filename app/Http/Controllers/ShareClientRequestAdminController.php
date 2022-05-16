<?php

namespace App\Http\Controllers;

use App\admin\Share;
use App\admin\ShareRequest;
use App\admin\Transaction;
use App\ClientShare;
use App\ShareSellRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

class ShareClientRequestAdminController extends Controller
{
    public function cllientShareBuyRequest(){
        $share_buy_requsts = ShareRequest::with('share', 'client')->where('status', 0)->paginate(20);
        return view('backEnd.share-buy-request.share-buy-request', ['share_buy_requsts' => $share_buy_requsts]);
    }
    public function cllientShareBuyRequestApproved($id){
        $share_buy_requst = ShareRequest::with('share', 'client')->where('id', $id)->first();
        return view('backEnd.share-buy-request.share-buy-request-approve', ['share_buy_requst'=>$share_buy_requst]);
    }
    protected function shareBuyRequestApprovedValidation($request){
        $validator = Validator::make($request->all(), [
            'share_request_id'            => 'required',
            'request_qty'                 => 'required',
            'share_price'                 => 'required',
            'total_price'                 => 'required',
            'total_price_with_commission' => 'required',
            'share_id'                    => 'required',
        ]);
        return $validator;
    }
    public function cllientShareBuyRequestApprovedSubmit(Request $request){
        $validator = $this->shareBuyRequestApprovedValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $share_request_for_buy = ShareRequest::where('id', $request->share_request_id)->first();

        $client_share = ClientShare::where('client_id', $share_request_for_buy->client_id)->where('share_id', $share_request_for_buy->share_id)->first();

        if(empty($client_share)){
           $client_share_new = new ClientShare();
           $client_share_new->share_id = $share_request_for_buy->share_id;
           $client_share_new->client_id = $share_request_for_buy->client_id;
           $client_share_new->purchase_qty = $request->request_qty;
           $client_share_new->available_qty = $request->request_qty;
           $client_share_new->save();
        }else{
            $client_share->purchase_qty += $request->request_qty;
            $client_share->available_qty += $request->request_qty;
            $client_share->update();
        }

        $share_request_for_buy->qty = $request->request_qty;
        $share_request_for_buy->price = $request->share_price;
        $share_request_for_buy->total_price = $request->total_price;
        $share_request_for_buy->total_price_with_commission = $request->total_price_with_commission;
        $share_request_for_buy->status = 1;
        $share_request_for_buy->update();

        $share = Share::where('id', $request->share_id)->first();
        $share->qty = $share->qty - $request->request_qty;
        $share->update();

        $transaction = new Transaction();
        $transaction->status = 1;
        $transaction->type = 'ShareBuy';
        $transaction->trans_id = $share_request_for_buy->id;
        $transaction->client_id = $share_request_for_buy->client_id;
        $transaction->voucher_no = 'SB-'.$share_request_for_buy->id;
        $transaction->trans_date = date('Y-m-d');
        $transaction->credit = $share_request_for_buy->total_price_with_commission;
        $transaction->save();
        return redirect('/admin/client-share-buy-request')->with('message', 'Share Buy Request Approved Successfully !!!');
    }
    public function cllientShareSellRequest(){
        $share_sell_requests = ShareSellRequest::where('status', 0)->paginate(20);
        return view('backEnd.share-sell-request.share-sell-request', ['share_sell_requests' => $share_sell_requests]);
    }
    public function cllientShareSellRequestApproved($id){
        $share_sell_request = ShareSellRequest::with('share', 'client')->where('id', $id)->first();
        $client_share = ClientShare::where('share_id', $share_sell_request->share_id)->where('client_id', $share_sell_request->client_id)->first();
        return view('backEnd.share-sell-request.share-sell-request-approved', [
            'share_sell_request' => $share_sell_request,
            'client_share' => $client_share
        ]);
    }
    protected function shareSellRequestApprovedValidation($request){
        $validator = Validator::make($request->all(), [
            'id'                               => 'required',
            'share_id'                         => 'required',
            'client_id'                        => 'required',
            'client_name'                      => 'required',
            'share_name'                       => 'required',
            'available_qty'                    => 'required',
            'sell_qty'                         => 'required',
            'sell_price'                       => 'required',
            'sell_total_price'                 => 'required',
            'sell_total_price_with_commission' => 'required',
        ]);
        return $validator;
    }
    public function cllientShareSellRequestApprovedSubmit(Request $request){
        $validator = $this->shareSellRequestApprovedValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $share_sell_request = ShareSellRequest::where('id', $request->id)->first();
        $share_sell_request->sell_qty = $request->sell_qty;
        $share_sell_request->sell_price = $request->sell_price;
        $share_sell_request->sell_total_price = $request->sell_total_price;
        $share_sell_request->sell_total_price_with_commission = $request->sell_total_price_with_commission;
        $share_sell_request->status = 1;
        $share_sell_request->update();

        $client_share = ClientShare::where('id', $share_sell_request->client_share_id)->first();
        $client_share->sell_qty = $share_sell_request->sell_qty;
        $client_share->available_qty = $client_share->purchase_qty - $client_share->sell_qty;
        $client_share->update();

        $transaction = new Transaction();
        $transaction->status = 1;
        $transaction->type = 'ShareSell';
        $transaction->trans_id = $share_sell_request->id;
        $transaction->client_id = $share_sell_request->client_id;
        $transaction->voucher_no = 'SS-'.$share_sell_request->id;
        $transaction->trans_date = date('Y-m-d');
        $transaction->debit = $share_sell_request->sell_total_price_with_commission;
        $transaction->save();
        return redirect('/admin/client-share-sell-request')->with('message', 'Share Sell Request Approved Successfully');
    }
}
