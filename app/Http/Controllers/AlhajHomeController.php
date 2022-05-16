<?php

namespace App\Http\Controllers;

use App\BoAccount;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class AlhajHomeController extends Controller
{
    public function index(){
        return view('frontEnd.home.home');
    }
    public function openBoAccount(){
        return view('frontEnd.open-bo.open-bo');
    }
    public function whyAlhaj(){
        return view('frontEnd.why-alhaj');
    }
    public function services(){
        return view('frontEnd.services');
    }
    public function boDownload(){
        return view('frontEnd.bo-form');
//        $pdf = PDF::loadView('frontEnd.bo-form');
//        return $pdf->download('bo-form.pdf');
    }
    public function contact(){
        return view('frontEnd.contact');
    }
    public function guidelines(){
        return view('frontEnd.guidelines');
    }
    public function sendmail(Request $request){

//        var_dump($request);
//        die();
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'messageQuery' => $request->messageQuery,
        );

//        Local Test
        Mail::to('rana@nexkraft.com')->send(new sendMail($data));

//        Live

        return redirect('/');
    }
}
