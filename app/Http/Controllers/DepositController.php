<?php

namespace App\Http\Controllers;

use App\admin\Diposite;
use App\admin\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Image;

class DepositController extends Controller
{
    protected function depositOnlineValidation($request){
        $validator = Validator::make($request->all(), [
            'payment_type'    => 'required',
            'amount'          => 'required',
            'online_referance'          => 'required',
        ]);
        return $validator;
    }
    protected function depositBankValidation($request){
        $validator = Validator::make($request->all(), [
            'payment_type'    => 'required',
            'amount'          => 'required',
            'bank_attachment' => 'required',
        ]);
        return $validator;
    }
    protected function depositBEFTNValidation($request){
        $validator = Validator::make($request->all(), [
            'payment_type'    => 'required',
            'amount'          => 'required',
            'beftn_attachment' => 'required',
        ]);
        return $validator;
    }
    public function depositInYourAccountUpdate(Request $request){
        $deposit = new Diposite();
        $validator = $this->depositOnlineValidation($request);
        if($request->payment_type == 'online'){
            $validator = $this->depositOnlineValidation($request);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $deposit->online_referance = $request->online_referance;
        }
        if($request->payment_type == 'bank'){
            $validator = $this->depositBankValidation($request);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            return $request;

            $bank_attachment_path = $this->bankAttachment($request);
            $deposit->bank_attachment = $bank_attachment_path;
        }
        if($request->payment_type == 'beftn'){
            $validator = $this->depositBEFTNValidation($request);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $beftn_attachment_path = $this->beftnAttachment($request);
            $deposit->beftn_attachment = $beftn_attachment_path;
        }
        $deposit->client_id = Auth::user()->id;
        $deposit->payment_type = $request->payment_type;
        $deposit->amount = $request->amount;
        $deposit->status = 0;
        $deposit->save();
        //Transaction
        return back()->with('message', 'Deposit Save Successfully !!!');
    }
    protected function _imageUpload($image, $image_url){
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url_public_path = public_path($image_url);
        Image::make($image)->resize(253, 158)->save($image_url_public_path.$image_name);
        $image_path = $image_url.$image_name;
        return $image_path;
    }
    protected function bankAttachment($request){
        $image = $request->file('bank_attachment');
        $image_url = 'alhaj/assets/deposit-image/bank/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }
    protected function beftnAttachment($request){
        $image = $request->file('beftn_attachment');
        $image_url = 'alhaj/assets/deposit-image/beftn/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }
    public function depositInYourAccountList(){
        $deposits = Diposite::where('client_id', Auth::user()->id)->where('status', 0)->orderBy('id', 'desc')->paginate(20);
        return view('frontEnd.client-dashboard.deposit-list', ['deposits' => $deposits]);
    }
}
