<?php

namespace App\Http\Controllers;

use App\admin\Bank;
use App\admin\BankBranch;
use App\admin\BoAmount;
use App\admin\BoPayment;
use App\admin\Branch;
use App\admin\District;
use App\BoAccount;
use Illuminate\Http\Request;
use Image;
use Validator;
use Session;

class BoAccountController extends Controller
{

    protected function registerBoAccountValidation($request){
        $validator = Validator::make($request->all(), [
            'first_name'          => 'required',
            'last_name'           => 'required',
            'mobile'               => 'required |unique:bo_accounts',
            'email'               => 'required |unique:bo_accounts'
        ]);
        return $validator;
    }
    protected function loginBoAccountValidation($request){
        $validator = Validator::make($request->all(), [
            'user_name'          => 'required',
            'password'           => 'required'
        ]);
        return $validator;
    }

    public function registerBoAccount(Request $request){
        $password =  mt_rand(111111, 999999);
        $validator = $this->registerBoAccountValidation($request);
        if ($validator->fails()) {
            return redirect('/open-bo-account')
                ->withErrors($validator)
                ->withInput();
        }
        $bo_account = new BoAccount();
        $bo_account->first_name = $request->first_name;
        $bo_account->last_name = $request->last_name;
        $bo_account->mobile = $request->mobile;
        $bo_account->email = $request->email;
        $bo_account->user_name = 'BO-'.$request->mobile;
        $bo_account->password = bcrypt(123456);
        $bo_account->save();
        return back()->with('message', 'Bo Account Created Successfully');
    }
    public function loginBoAccount(Request $request){
        $validator = $this->loginBoAccountValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $bo_account = BoAccount::select('id','user_name', 'password', 'first_name', 'last_name')
            ->where('user_name', $request->user_name)->where('admin_approved', '!=', 1)->first();
        if($bo_account){
            if (password_verify($request->password, $bo_account->password)){
                Session::put('bo_id', $bo_account->id);
                Session::put('bo_user_name', $bo_account->user_name);
                Session::put('bo_full_name', $bo_account->first_name.' '.$bo_account->last_name);
                return redirect('/bo-dashboard');
            }else{
                return back()->with('message-login', 'Invalid Password !!!')->withInput();
            }
        }else{
            return back()->with('message-login', 'Invalid User Name !!!')->withInput();
        }
    }
    public function logoutBOAccount(){
        Session::forget('bo_id');
        Session::forget('bo_user_name');
        Session::forget('bo_full_name');
        return redirect('/open-bo-account');
    }

    // Client Dashboard Start
    public function boDashboard(){
        $bo_id = Session::get('bo_id');
        $bo_account = BoAccount::with('bo_city', 'join_bo_city', 'bo_bank', 'bank_city')->where('id', $bo_id)->first();
        return view('frontEnd.bo-dashboard.profile', ['bo_account' => $bo_account]);
    }
    public function accountHolders(){
        $bo_id = Session::get('bo_id');
        $cities = District::where('status', 1)->orderBy('name', 'asc')->get();
        $bo_account = BoAccount::where('id', $bo_id)->first();
        $branches = Branch::where('district_id', $bo_account->city)->where('status', 1)->orderBy('name', 'asc')->get();
        return view('frontEnd.bo-dashboard.account-holders', ['bo_account' => $bo_account, 'cities' => $cities, 'branches' => $branches]);
    }
    public function bankInformation(){
        $bo_id = Session::get('bo_id');
        $bo_account = BoAccount::where('id', $bo_id)->first();
        $banks = Bank::where('status', 1)->orderBy('name', 'asc')->get();
        $cities = District::where('status', 1)->orderBy('name', 'asc')->get();
        $district_bank_baranchs = BankBranch::where('district_id', $bo_account->bank_district)->get();
        return view('frontEnd.bo-dashboard.bank-info', ['bo_account' => $bo_account, 'banks' => $banks, 'cities' => $cities, 'district_bank_baranchs' => $district_bank_baranchs]);
    }
    public function nomineeInformation(){
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $cities = District::where('status', 1)->orderBy('name', 'asc')->get();
        return view('frontEnd.bo-dashboard.nominee-info', ['bo_account' => $bo_account, 'cities' => $cities]);
    }
    public function documentUpload(){
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        return view('frontEnd.bo-dashboard.document-upload', ['bo_account' => $bo_account]);
    }
    protected function _imageUpload($image, $image_url){
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url_public_path = public_path($image_url);
        Image::make($image)->resize(253, 158)->save($image_url_public_path.$image_name);
        $image_path = $image_url.$image_name;
        return $image_path;
    }
    protected function ac_holder_image($request){
        $image = $request->file('first_ac_holder_image');
        $image_url = 'alhaj/assets/bo-image/ac-holder-image/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;

    }
    public function firstACHolderImage(Request $request){
        $request->validate([
            'first_ac_holder_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $image_path = $this->ac_holder_image($request);
        if($request->file('first_ac_holder_image')){
            if(file_exists(public_path($bo_account->ac_holder_image)) && $bo_account->ac_holder_image != NUll ){
                unlink(public_path($bo_account->ac_holder_image));
            }
        }
        $bo_account->ac_holder_image = $image_path;
        $bo_account->update();
        return back()->with('message', 'First AC Holder Image Uploaded Successfully !!!');
    }

    protected function front_page_nid_image($request){
        $image = $request->file('front_page_nid_image');
        $image_url = 'alhaj/assets/bo-image/front-page-nid-image/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }
    public function frontPageNIDImage(Request  $request){
        $request->validate([
            'front_page_nid_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $image_path = $this->front_page_nid_image($request);
        if($request->file('front_page_nid_image')){
            if(file_exists(public_path($bo_account->front_page_nid_image)) && $bo_account->front_page_nid_image != NUll){
                unlink(public_path($bo_account->front_page_nid_image));
            }
        }
        $bo_account->front_page_nid_image = $image_path;
        $bo_account->update();
        return back()->with('message', 'Front Page NID/DL Image Uploaded Successfully !!!');
    }

    protected function back_page_nid_image($request){
        $image = $request->file('back_page_nid_image');
        $image_url = 'alhaj/assets/bo-image/back-page-nid-image/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function backPageNIDImage(Request $request){
        $request->validate([
            'back_page_nid_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $image_path = $this->back_page_nid_image($request);
        if($request->file('back_page_nid_image')){
            if(file_exists(public_path($bo_account->back_page_nid_image)) && $bo_account->back_page_nid_image != NUll){
                unlink(public_path($bo_account->back_page_nid_image));
            }
        }
        $bo_account->back_page_nid_image = $image_path;
        $bo_account->update();
        return back()->with('message', 'Back Page NID/DL Image Uploaded Successfully !!!');
    }


    protected function ac_holder_signature_image($request){
        $image = $request->file('ac_holder_signature');
        $image_url = 'alhaj/assets/bo-image/ac-holder-signature/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }
    public function acHolderSignatureImage(Request $request){
        $request->validate([
            'ac_holder_signature' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $image_path = $this->ac_holder_signature_image($request);
        if($request->file('ac_holder_signature')){
            if(file_exists(public_path($bo_account->ac_holder_signature)) && $bo_account->ac_holder_signature != NUll){
                unlink(public_path($bo_account->ac_holder_signature));
            }
        }
        $bo_account->ac_holder_signature = $image_path;
        $bo_account->update();
        return back()->with('message', 'AC Holder Signature Image Uploaded Successfully !!!');
    }

    protected function ac_holder_cheque_book_leaf_image($request){
        $image = $request->file('ac_holder_cheque_book_leaf');
        $image_url = 'alhaj/assets/bo-image/ac-holder-cheque-book-leaf/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }
    public function acHolderChequeBookLeaf(Request $request){
        $request->validate([
            'ac_holder_cheque_book_leaf' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $image_path = $this->ac_holder_cheque_book_leaf_image($request);
        if($request->file('ac_holder_cheque_book_leaf')){
            if(file_exists(public_path($bo_account->ac_holder_cheque_book_leaf)) && $bo_account->ac_holder_cheque_book_leaf != NUll){
                unlink(public_path($bo_account->ac_holder_cheque_book_leaf));
            }
        }
        $bo_account->ac_holder_cheque_book_leaf = $image_path;
        $bo_account->update();
        return back()->with('message', 'AC Holder Cheque Book Leaf Image Uploaded Successfully !!!');
    }

    protected function join_ac_holder_image($request){
        $image = $request->file('join_ac_holder_image');
        $image_url = 'alhaj/assets/bo-image/join-ac-holder-image/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function joinAcHolderImage(Request $request){
        $request->validate([
            'join_ac_holder_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $image_path = $this->join_ac_holder_image($request);
        if($request->file('join_ac_holder_image')){
            if(file_exists(public_path($bo_account->join_ac_holder_image)) && $bo_account->join_ac_holder_image != NUll){
                unlink(public_path($bo_account->join_ac_holder_image));
            }
        }
        $bo_account->join_ac_holder_image = $image_path;
        $bo_account->update();
        return back()->with('message', 'Join AC Holder Image Uploaded Successfully !!!');
    }

    protected function join_front_page_nid_image($request){
        $image = $request->file('join_front_page_nid_image');
        $image_url = 'alhaj/assets/bo-image/join-front-page-nid-image/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function joinFrontPageNIDImage(Request $request){
        $request->validate([
            'join_front_page_nid_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $image_path = $this->join_front_page_nid_image($request);
        if($request->file('join_front_page_nid_image')){
            if(file_exists(public_path($bo_account->join_front_page_nid_image)) && $bo_account->join_front_page_nid_image != NUll){
                unlink(public_path($bo_account->join_front_page_nid_image));
            }
        }
        $bo_account->join_front_page_nid_image = $image_path;
        $bo_account->update();
        return back()->with('message', 'Join AC Holder Front Page Image Uploaded Successfully !!!');
    }

    protected function join_back_page_nid_image($request){
        $image = $request->file('join_back_page_nid_image');
        $image_url = 'alhaj/assets/bo-image/join-back-page-nid-image/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function joinBackPageNIDImage(Request $request){
        $request->validate([
            'join_back_page_nid_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $image_path = $this->join_back_page_nid_image($request);
        if($request->file('join_back_page_nid_image')){
            if(file_exists(public_path($bo_account->join_back_page_nid_image)) && $bo_account->join_back_page_nid_image != NUll){
                unlink(public_path($bo_account->join_back_page_nid_image));
            }
        }
        $bo_account->join_back_page_nid_image = $image_path;
        $bo_account->update();
        return back()->with('message', 'Join AC Holder Back Page Image Uploaded Successfully !!!');
    }

    protected function join_ac_holder_signature($request){
        $image = $request->file('join_ac_holder_signature');
        $image_url = 'alhaj/assets/bo-image/join-ac-holder-signature/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }
    public function joinAcHolderSignature(Request $request){
        $request->validate([
            'join_ac_holder_signature' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $image_path = $this->join_ac_holder_signature($request);
        if($request->file('join_ac_holder_signature')){
            if(file_exists(public_path($bo_account->join_ac_holder_signature)) && $bo_account->join_ac_holder_signature != NUll){
                unlink(public_path($bo_account->join_ac_holder_signature));
            }
        }
        $bo_account->join_ac_holder_signature = $image_path;
        $bo_account->update();
        return back()->with('message', 'Join AC Holder Signature Image Uploaded Successfully !!!');
    }


    public function paymentOption(){
        $bo_amount = BoAmount::where('id', 1)->first();
        $bo_account = BoAccount::select('id', 'payment_amount')->where('id', Session::get('bo_id'))->first();
        return view('frontEnd.bo-dashboard.payment-option', [
            'bo_amount' => $bo_amount,
            'bo_account' => $bo_account
        ]);
    }
    public function boPayment(Request $request){
        $request->validate([
            'bo_user_name' => 'required',
            'amount' => 'required'
        ]);
       $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
       $bo_account->payment_amount = $request->amount;
       $bo_account->payment_status = 1;
       $bo_account->status = 1;
       $bo_account->update();
       $bo_payment = new BoPayment();
       $bo_payment->bo_id = $bo_account->id;
       $bo_payment->amount = $bo_account->payment_amount;
       $bo_payment->transaction_id = 'BO-'.$bo_account->id;
       $bo_payment->status = 1;
       $bo_payment->save();
//       return back()->with('message', 'BO Payment Paid Successfully !!!');
       return redirect('/payment-status')->with('message', 'BO Payment Paid Successfully !!!');
    }
    public function paymentStatus(){
        $bo_payment = BoPayment::where('bo_id', Session::get('bo_id'))->first();
        return view('frontEnd.bo-dashboard.payment-status', ['bo_payment' => $bo_payment]);
    }
    public function addAccountHolder(){
        return 'This is add account holder ';
    }
    protected function addAccountHolderValidation($request){
        $validator = Validator::make($request->all(), [
            'type_of_client'          => 'required',
            'mobile'          => 'required',
            'email'          => 'required',
        ]);
        return $validator;
    }
    protected function _accountHolderInfo($request, $bo_account){
        $bo_account->first_name = $request->first_name;
        $bo_account->last_name = $request->last_name;
        $bo_account->occupation = $request->occupation;
        $bo_account->date_of_birth = $request->date_of_birth;
        $bo_account->fathers_name = $request->fathers_name;
        $bo_account->mothers_name = $request->mothers_name;
        $bo_account->contact_address = $request->contact_address;
        $bo_account->city = $request->city;
        $bo_account->post_code = $request->post_code;
        $bo_account->division = $request->division;
        $bo_account->country = $request->country;
        $bo_account->mobile = $request->mobile;
        $bo_account->tel = $request->tel;
        $bo_account->fax = $request->fax;
        $bo_account->email = $request->email;
        $bo_account->nationality = $request->nationality;
        $bo_account->nid = $request->nid;
        $bo_account->tin = $request->tin;
        $bo_account->gender = $request->gender;
        $bo_account->residency = $request->residency;
        $bo_account->branch = $request->branch;
        $bo_account->passport_info = $request->passport_info;
        $bo_account->visa_info = $request->visa_info;
        $bo_account->permit_info = $request->permit_info;
    }
    public function _accountHolderJoinInfo($request, $bo_account){
        $bo_account->join_first_name = $request->join_first_name;
        $bo_account->join_last_name = $request->join_last_name;
        $bo_account->join_occupation = $request->join_occupation;
        $bo_account->join_date_of_birth = $request->join_date_of_birth;
        $bo_account->join_fathers_name = $request->join_fathers_name;
        $bo_account->join_mothers_name = $request->join_mothers_name;
        $bo_account->join_contact_address = $request->join_contact_address;
        $bo_account->join_city = $request->join_city;
        $bo_account->join_post_code = $request->join_post_code;
        $bo_account->join_division = $request->join_division;
        $bo_account->join_country = $request->join_country;
        $bo_account->join_mobile = $request->join_mobile;
        $bo_account->join_tel = $request->join_tel;
        $bo_account->join_fax = $request->join_fax;
        $bo_account->join_email = $request->join_email;
    }
    public function addAccountHolderSave(Request $request){
        $validator = $this->addAccountHolderValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $bo_account = BoAccount::where('id', $request->id)->first();
        $this->_accountHolderInfo($request, $bo_account);
        if($request->type_of_client == 2){
            $this->_accountHolderJoinInfo($request, $bo_account);
        }
        $bo_account->type_of_client = $request->type_of_client;
        $bo_account->update();
//        return back()->with('message', 'Account Holder Info Updated Successfully !');
        return redirect('/bank-information')->with('message', 'Account Holder Info Updated Successfully !');
    }
    protected function bankInfoSaveValidation($request){
        $validator = Validator::make($request->all(), [
            'bank_name'          => 'required',
            'bank_district'          => 'required',
            'bank_branch'          => 'required',
            'bank_routing'          => 'required',
            'bank_ac'          => 'required',
        ]);
        return $validator;
    }
    public function bankInfoSave(Request $request){
        $validator = $this->bankInfoSaveValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $bo_account->bank_name = $request->bank_name;
        $bo_account->bank_district = $request->bank_district;
        $bo_account->bank_branch = $request->bank_branch;
        $bo_account->bank_routing = $request->bank_routing;
        $bo_account->bank_ac = $request->bank_ac;
        $bo_account->update();
//        return back()->with('message', 'Bank Account Information Updated Successfully !');
        return redirect('/nominee-information')->with('message', 'Bank Account Information Updated Successfully !');
    }

    protected function nomineeOneValidation($request){
        $validator = Validator::make($request->all(), [
            'n1_title'          => 'required',
            'n1_first_name'          => 'required',
            'n1_last_name'          => 'required',
            'n1_rel_with_ac_holder'          => 'required',
            'n1_percentage'          => 'required',
            'n1_residency'          => 'required',
            'n1_date_of_birth'          => 'required',
            'n1_nid'          => 'required',
            'n1_address'          => 'required',
            'n1_city'          => 'required',
            'n1_post_code'          => 'required',
            'n1_division'          => 'required',
            'n1_country'          => 'required',
            'n1_mobile'          => 'required',
            'n1_tel'          => 'required',
            'n1_fax'          => 'required',
            'n1_email'          => 'required',
        ]);
        return $validator;
    }
    protected function nomineeOneGValidation($request){
        $validator = Validator::make($request->all(), [
            'n1g'          => 'required',
            'n1g_title'          => 'required',
            'n1g_first_name'          => 'required',
            'n1g_last_name'          => 'required',
            'n1g_rel_with_ac_holder' => 'required',
            'n1g_percentage'          => 'required',
            'n1g_residency'          => 'required',
            'n1g_date_of_birth'          => 'required',
            'n1g_nid'          => 'required',
            'n1g_address'          => 'required',
            'n1g_city'          => 'required',
            'n1g_post_code'          => 'required',
            'n1g_division'          => 'required',
            'n1g_country'          => 'required',
            'n1g_mobile'          => 'required',
            'n1g_tel'          => 'required',
            'n1g_fax'          => 'required',
            'n1g_email'          => 'required',
        ]);
        return $validator;
    }
    protected function nomineeTwoValidation($request){
        $validator = Validator::make($request->all(), [
            'n2'          => 'required',
            'n2_title'          => 'required',
            'n2_first_name'          => 'required',
            'n2_last_name'          => 'required',
            'n2_rel_with_ac_holder'          => 'required',
            'n2_percentage'          => 'required',
            'n2_residency'          => 'required',
            'n2_date_of_birth'          => 'required',
            'n2_nid'          => 'required',
            'n2_address'          => 'required',
            'n2_city'          => 'required',
            'n2_post_code'          => 'required',
            'n2_division'          => 'required',
            'n2_country'          => 'required',
            'n2_mobile'          => 'required',
            'n2_tel'          => 'required',
            'n2_fax'          => 'required',
            'n2_email'          => 'required',
        ]);
        return $validator;
    }
    protected function nomineeTwoGValidation($request){
        $validator = Validator::make($request->all(), [
            'n2g'          => 'required',
            'n2g_title'          => 'required',
            'n2g_first_name'          => 'required',
            'n2g_last_name'          => 'required',
            'n2g_rel_with_ac_holder'          => 'required',
            'n2g_percentage'          => 'required',
            'n2g_residency'          => 'required',
            'n2g_date_of_birth'          => 'required',
            'n2g_nid'          => 'required',
            'n2g_address'          => 'required',
            'n2g_city'          => 'required',
            'n2g_post_code'          => 'required',
            'n2g_division'          => 'required',
            'n2g_country'          => 'required',
            'n2g_mobile'          => 'required',
            'n2g_tel'          => 'required',
            'n2g_fax'          => 'required',
            'n2g_email'          => 'required',
        ]);
        return $validator;
    }

    protected function nomineeData($bo_account, $request){
        $bo_account->n1_title = $request->n1_title;
        $bo_account->n1_first_name = $request->n1_first_name;
        $bo_account->n1_last_name = $request->n1_last_name;
        $bo_account->n1_rel_with_ac_holder = $request->n1_rel_with_ac_holder;
        $bo_account->n1_percentage = $request->n1_percentage;
        $bo_account->n1_residency = $request->n1_residency;
        $bo_account->n1_date_of_birth = $request->n1_date_of_birth;
        $bo_account->n1_nid = $request->n1_nid;
        $bo_account->n1_address = $request->n1_address;
        $bo_account->n1_city = $request->n1_city;
        $bo_account->n1_post_code = $request->n1_post_code;
        $bo_account->n1_division = $request->n1_division;
        $bo_account->n1_country = $request->n1_country;
        $bo_account->n1_mobile = $request->n1_mobile;
        $bo_account->n1_tel = $request->n1_tel;
        $bo_account->n1_fax = $request->n1_fax;
        $bo_account->n1_email = $request->n1_email;
    }

    protected function nomineeGData($bo_account, $request){
        $bo_account->n1g_title = $request->n1g_title;
        $bo_account->n1g_first_name = $request->n1g_first_name;
        $bo_account->n1g_last_name = $request->n1g_last_name;
        $bo_account->n1g_rel_with_ac_holder = $request->n1g_rel_with_ac_holder;
        $bo_account->n1g_percentage = $request->n1g_percentage;
        $bo_account->n1g_residency = $request->n1g_residency;
        $bo_account->n1g_date_of_birth = $request->n1g_date_of_birth;
        $bo_account->n1g_nid = $request->n1g_nid;
        $bo_account->n1g_address = $request->n1g_address;
        $bo_account->n1g_city = $request->n1g_city;
        $bo_account->n1g_post_code = $request->n1g_post_code;
        $bo_account->n1g_division = $request->n1g_division;
        $bo_account->n1g_country = $request->n1g_country;
        $bo_account->n1g_mobile = $request->n1g_mobile;
        $bo_account->n1g_tel = $request->n1g_tel;
        $bo_account->n1g_fax = $request->n1g_fax;
        $bo_account->n1g_email = $request->n1g_email;
    }
    protected function nomineeTwoData($bo_account, $request){
        $bo_account->n2_title = $request->n2_title;
        $bo_account->n2_first_name = $request->n2_first_name;
        $bo_account->n2_last_name = $request->n2_last_name;
        $bo_account->n2_rel_with_ac_holder = $request->n2_rel_with_ac_holder;
        $bo_account->n2_percentage = $request->n2_percentage;
        $bo_account->n2_residency = $request->n2_residency;
        $bo_account->n2_date_of_birth = $request->n2_date_of_birth;
        $bo_account->n2_nid = $request->n2_nid;
        $bo_account->n2_address = $request->n2_address;
        $bo_account->n2_city = $request->n2_city;
        $bo_account->n2_post_code = $request->n2_post_code;
        $bo_account->n2_division = $request->n2_division;
        $bo_account->n2_country = $request->n2_country;
        $bo_account->n2_mobile = $request->n2_mobile;
        $bo_account->n2_tel = $request->n2_tel;
        $bo_account->n2_fax = $request->n2_fax;
        $bo_account->n2_email = $request->n2_email;
    }

    protected function nomineeTwoGData($bo_account, $request){
        $bo_account->n2g_title = $request->n2g_title;
        $bo_account->n2g_first_name = $request->n2g_first_name;
        $bo_account->n2g_last_name = $request->n2g_last_name;
        $bo_account->n2g_rel_with_ac_holder = $request->n2g_rel_with_ac_holder;
        $bo_account->n2g_percentage = $request->n2g_percentage;
        $bo_account->n2g_residency = $request->n2g_residency;
        $bo_account->n2g_date_of_birth = $request->n2g_date_of_birth;
        $bo_account->n2g_nid = $request->n2g_nid;
        $bo_account->n2g_address = $request->n2g_address;
        $bo_account->n2g_city = $request->n2g_city;
        $bo_account->n2g_post_code = $request->n2g_post_code;
        $bo_account->n2g_division = $request->n2g_division;
        $bo_account->n2g_country = $request->n2g_country;
        $bo_account->n2g_mobile = $request->n2g_mobile;
        $bo_account->n2g_tel = $request->n2g_tel;
        $bo_account->n2g_fax = $request->n2g_fax;
        $bo_account->n2g_email = $request->n2g_email;
    }

    public function nomineeInfoSave(Request $request){
        $validator = $this->nomineeOneValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $bo_account = BoAccount::where('id', Session::get('bo_id'))->first();
        $this->nomineeData($bo_account, $request);
        if($request->n1g == 1){
            $validator = $this->nomineeOneGValidation($request);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $this->nomineeGData($bo_account, $request);
        }
        $bo_account->n1g = $request->n1g;

        if($request->n2 == 1){
            $validator = $this->nomineeTwoValidation($request);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $this->nomineeTwoData($bo_account, $request);
        }
        $bo_account->n2 = $request->n2;
        if($request->n2g == 1){
            $validator = $this->nomineeTwoGValidation($request);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $this->nomineeTwoGData($bo_account, $request);
        }
        $bo_account->n2g = $request->n2g;
        $bo_account->update();
//        return back()->with('message', 'Nominee Info Updated Successfully !');
        return redirect('/document-upload')->with('message', 'Nominee Info Updated Successfully !');
    }

    // Client Dashboard End


    // Ajax Start
    public function getCities(Request $request){
        $branchs = Branch::where('district_id', $request->id)->get();
        return $branchs;
    }
    public function getBankBranch(Request $request){
        $bank_branches = BankBranch::where('district_id', $request->bank_branch_district_id)->get();
        return $bank_branches;
    }
    // Ajax End

}
