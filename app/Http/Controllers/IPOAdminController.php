<?php

namespace App\Http\Controllers;

use App\admin\Ipo;
use App\IpoRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\admin\Transaction;

class IPOAdminController extends Controller
{
    public function newIPO(){
        return view('backEnd.create-new-ipo.create-new-ipo');
    }
    protected function IPOValidation($request){
        $validator = Validator::make($request->all(), [
            'company_name'      => 'required',
            'ipo_name'          => 'required',
            'lot_size'          => 'required',
            'price'             => 'required',
            'start_date'        => 'required',
            'end_date'          => 'required',
            'mr_no'             => 'required',
            'ac_type'           => 'required',
            'rcv_type'          => 'required',
            'status'            => 'required',
        ]);
        return $validator;
    }
    protected function _ipoBasic($request, $ipo){
        $ipo->company_name = $request->company_name;
        $ipo->ipo_name     = $request->ipo_name;
        $ipo->lot_size     = $request->lot_size;
        $ipo->price        = $request->price;
        $ipo->start_date   = $request->start_date;
        $ipo->end_date     = $request->end_date;
        $ipo->mr_no        = $request->mr_no;
        $ipo->ac_type      = $request->ac_type;
        $ipo->rcv_type     = $request->rcv_type;
        $ipo->status       = $request->status;
    }
    public function newIPOSave(Request $request){
        $validator = $this->IPOValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $ipo = new Ipo();
        $this->_ipoBasic($request, $ipo);
        $ipo->save();
        return back()->with('message', 'New IPO added Successfully !!!');
    }
    public function ipoList(){
        $ipos = Ipo::orderBy('id', 'desc')->paginate(20);
        return view('backEnd.create-new-ipo.ipo-list', ['ipos' => $ipos]);
    }
    public function editIpo($id){
        $ipo = Ipo::where('id', $id)->first();
        return view('backEnd.create-new-ipo.edit-ipo', ['ipo' => $ipo]);
    }
    public function ipoUpdate(Request $request){
        $ipo = Ipo::where('id', $request->id)->first();
        $this->_ipoBasic($request, $ipo);
        $ipo->update();
        return back()->with('message', 'IPO Updated Successfully !!!');
    }

    public function ipoRequest(){
        $ipo_requests = IpoRequest::with(['ipo', 'client' => function($Q){$Q->select('id', 'name');}])->where('status', 0)->paginate(20);
        return view('backEnd.ipo-request.ipo-request', ['ipo_requests' => $ipo_requests]);
    }
    public function ipoRequestReview($id){
        $ipo_request = IpoRequest::with(['ipo', 'client' => function($Q){$Q->select('id', 'name');}])->first();
        return view('backEnd.ipo-request.ipo-request-review', ['ipo_request' => $ipo_request]);
    }
    public function ipoRequestReviewApproval(Request $request){
        $request->validate([
            'id' => 'required',
            'status' => 'required'
        ]);
        if($request->status == 1){
            $ipo_request = IpoRequest::where('id', $request->id)->first();
            $ipo_request->status = 1;
            $ipo_request->update();

            $transaction = new Transaction();
            $transaction->status = 1;
            $transaction->type = 'IPO-BUY';
            $transaction->trans_id = $ipo_request->id;
            $transaction->client_id = $ipo_request->client_id;
            $transaction->voucher_no = 'IPO-'.$ipo_request->id;
            $transaction->trans_date = date('Y-m-d');
            $transaction->credit = $ipo_request->total_price;
            $transaction->save();
            return redirect('/admin/ipo-requests')->with('message', 'IPO Request Approved Successfully !!');
        }else{
            $ipo_request = IpoRequest::where('id', $request->id)->first();
            $ipo_request->status = -1;
            $ipo_request->update();
            return redirect('/admin/ipo-requests')->with('message', 'IPO Request Decline Successfully !!!');
        }
    }
}
