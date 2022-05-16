<?php

namespace App\Http\Controllers;

use App\admin\Ipo;
use App\IpoRequest;
use Illuminate\Http\Request;
use Auth;

class IPOController extends Controller
{
   public function applyIPO(){
       $apply_ipo_array = [];
       $ipo_requests = IpoRequest::select('ipo_id', 'client_id')->where('client_id', Auth::user()->id)->get();
       foreach ($ipo_requests as $key => $ipo_request){
           $apply_ipo_array[$key] = $ipo_request->ipo_id;
       }
       $ipos = Ipo::where('status', 1)->orderBy('id', 'desc')->paginate(20);
       return view('frontEnd.client-dashboard.apply-ipo', [
           'ipos' => $ipos,
           'apply_ipo_array' => $apply_ipo_array
       ]);
   }
   public function ipoApplySubmit($id){
       $ipo = Ipo::select('id', 'lot_size', 'price')->where('id', $id)->first();
       $ipo_request = new IpoRequest();
       $ipo_request->ipo_id = $ipo->id;
       $ipo_request->client_id = Auth::user()->id;
       $ipo_request->total_price = $ipo->lot_size * $ipo->price;
       $ipo_request->status = 0;
       $ipo_request->save();
       return back()->with('message', 'IPO Request Submitted Successfully !!!');
   }

   public function appliedIPOInfo(){
       $ipo_requests = IpoRequest::with('ipo')->where('client_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(20);
       return view('frontEnd.client-dashboard.applied-ipo-info', ['ipo_requests' => $ipo_requests]);
   }
}
