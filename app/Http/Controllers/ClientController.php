<?php

namespace App\Http\Controllers;

use App\admin\AccruedCharge;
use App\admin\Bank;
use App\admin\BankBranch;
use App\admin\BoAmount;
use App\admin\Branch;
use App\admin\Charge;
use App\admin\Diposite;
use App\admin\District;
use App\admin\JobXml;
use App\admin\Share;
use App\admin\ShareRequest;
use App\admin\Transaction;
use App\admin\Withdraw;
use App\BoAccount;
use App\ChangeRequest;
use App\ClientShare;
use App\ImageChangeRequest;
use App\IpoRequest;
use App\MarginLoan;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use Image;
use PDF;

class ClientController extends Controller
{
    public function clientDashboard(){
        $bo_account = BoAccount::with(['bo_bank', 'bank_branch_name', 'get_user' => function($q){$q->select('id', 'bo_id', 'dse_bo_id');}])->where('id', Auth::user()->bo_id)->first();
        return view('frontEnd.client-dashboard.client-dashboard', ['bo_account' => $bo_account]);
    }
    public function CBDLChangeRequest(){
        $bo_account = BoAccount::with('bo_city', 'bo_branch', 'join_bo_city', 'bo_bank', 'bank_city', 'bank_branch_name')->where('id', Auth::user()->bo_id)->first();
        $cities = District::where('status', 1)->orderBy('name', 'asc')->get();
        $branches = Branch::where('district_id', $bo_account->city)->where('status', 1)->orderBy('name', 'asc')->get();
        $banks = Bank::where('status', 1)->orderBy('name', 'asc')->get();
        $district_bank_baranchs = BankBranch::where('district_id', $bo_account->bank_district)->get();
        return view('frontEnd.client-dashboard.cbdl-change-request', [
            'bo_account' => $bo_account,
            'cities' => $cities,
            'branches' => $branches,
            'banks' => $banks,
            'district_bank_baranchs' => $district_bank_baranchs
        ]);
    }
    protected function addAccountHolderSaveValidation($request){
        $validator = Validator::make($request->all(), [
            'type_of_client'          => 'required',
            'mobile'          => 'required',
            'email'          => 'required',
        ]);
        return $validator;
    }

    public function _changeRequestData($request, $change_request){
        $change_request->bo_id = auth()->user()->bo_id;
        $change_request->type_of_client = $request->type_of_client;
        $change_request->first_name = $request->first_name;
        $change_request->last_name = $request->last_name;
        $change_request->occupation = $request->occupation;
        $change_request->date_of_birth = $request->date_of_birth;
        $change_request->fathers_name = $request->fathers_name;
        $change_request->mothers_name = $request->mothers_name;
        $change_request->contact_address = $request->contact_address;
        $change_request->city = $request->city;
        $change_request->post_code = $request->post_code;
        $change_request->division = $request->division;
        $change_request->country = $request->country;
        $change_request->mobile = $request->mobile;
        $change_request->tel = $request->tel;
        $change_request->fax = $request->fax;
        $change_request->email = $request->email;
        $change_request->nationality = $request->nationality;
        $change_request->nid = $request->nid;
        $change_request->tin = $request->tin;
        $change_request->gender = $request->gender;
        $change_request->residency = $request->residency;
        $change_request->branch = $request->branch;
        $change_request->passport_info = $request->passport_info;
        $change_request->visa_info = $request->visa_info;
        $change_request->permit_info = $request->permit_info;

        $change_request->join_first_name = $request->join_first_name;
        $change_request->join_last_name = $request->join_last_name;
        $change_request->join_occupation = $request->join_occupation;
        $change_request->join_date_of_birth = $request->join_date_of_birth;
        $change_request->join_fathers_name = $request->join_fathers_name;
        $change_request->join_mothers_name = $request->join_mothers_name;
        $change_request->join_contact_address = $request->join_contact_address;
        $change_request->join_city = $request->join_city;
        $change_request->join_post_code = $request->join_post_code;
        $change_request->join_division = $request->join_division;
        $change_request->join_country = $request->join_country;
        $change_request->join_mobile = $request->join_mobile;
        $change_request->join_tel = $request->join_tel;
        $change_request->join_fax = $request->join_fax;
        $change_request->join_email = $request->join_email;
    }

    public function addAccountHolderSave(Request $request){
        $validator = $this->addAccountHolderSaveValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $change_request = ChangeRequest::where('bo_id', $request->id)->first();
        if(!empty($change_request ) && $change_request->status == 0) {
            $change_request = ChangeRequest::where('bo_id', $request->id)->first();
            $this->_changeRequestData($request, $change_request);
            $change_request->update();
            return back()->with('message', 'Account Holder Info Updated Successfully !');
        }else{
            $change_request = new ChangeRequest();
            $this->_changeRequestData($request, $change_request);
            $change_request->save();
            return back()->with('message', 'Account Holder Info Updated Successfully !');
        }
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
    protected function _bankInfoBasic($request, $bo_account){
        $bo_account->bank_name = $request->bank_name;
        $bo_account->bank_district = $request->bank_district;
        $bo_account->bank_branch = $request->bank_branch;
        $bo_account->bank_routing = $request->bank_routing;
        $bo_account->bank_ac = $request->bank_ac;
    }

    public function bankInfoSave(Request $request){
        $validator = $this->bankInfoSaveValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $change_request = ChangeRequest::where('bo_id', $request->id)->first();

        if (!empty($change_request) && $change_request->status == 0){
            $this->_bankInfoBasic($request, $change_request);
            $change_request->update();
        }

        return back()->with('message', 'Bank Account Information Updated Successfully !');
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
/*            'n1_tel'          => 'required',
            'n1_fax'          => 'required',
            'n1_email'          => 'required',*/
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
/*            'n1g_tel'          => 'required',
            'n1g_fax'          => 'required',
            'n1g_email'          => 'required',*/
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
/*            'n2_tel'          => 'required',
            'n2_fax'          => 'required',
            'n2_email'          => 'required',*/
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
/*            'n2g_tel'          => 'required',
            'n2g_fax'          => 'required',
            'n2g_email'          => 'required',*/
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
        $change_request = ChangeRequest::where('bo_id', $request->id)->first();
        $this->nomineeData($change_request, $request);

        if (!empty($change_request) && $change_request->status == 0){
            if($request->n1g == 1){
                $validator = $this->nomineeOneGValidation($request);
                if ($validator->fails()) {
                    return back()
                        ->withErrors($validator)
                        ->withInput();
                }
                $this->nomineeGData($change_request, $request);
            }
            $change_request->n1g = $request->n1g;

            if($request->n2 == 1){
                $validator = $this->nomineeTwoValidation($request);
                if ($validator->fails()) {
                    return back()
                        ->withErrors($validator)
                        ->withInput();
                }
                $this->nomineeTwoData($change_request, $request);
            }
            $change_request->n2 = $request->n2;
            if($request->n2g == 1){
                $validator = $this->nomineeTwoGValidation($request);
                if ($validator->fails()) {
                    return back()
                        ->withErrors($validator)
                        ->withInput();
                }
                $this->nomineeTwoGData($change_request, $request);
            }
            $change_request->n2g = $request->n2g;
            $change_request->update();
            return back()->with('message', 'Nominee Info Updated Successfully !');
        }
    }

    public function depositInYourAccount(){
        return view('frontEnd.client-dashboard.deposit-in-your-account');
    }
    public function withdrawAmount(){
        return view('frontEnd.client-dashboard.withdraw-amount');
    }
    public function clientProtfolio(){
        return view('frontEnd.client-dashboard.protfolio');
    }
    public function clientProtfolioView(Request $request){
        $validator = $this->clientLedgerValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $from_date = $request->fromDate;
        $to_date = $request->toDate;
        $abn_date = date("Y-m-d", strtotime('-3 days', strtotime($to_date)));
        $z_date = date("Y-m-d", strtotime('-5 days', strtotime($to_date)));
        $job_xml = JobXml::with(['get_dse' => function($q) use ($to_date){$q->where('trade_date', '<=', $to_date)->orderBy('trade_date', 'desc');}, 'get_pe_ratio'])
            ->where('bo_id', auth()->user()->dse_bo_id)
            ->where('action', 'EXEC')
            ->whereBetween('date', [$from_date, $to_date])
            ->orderBy('id', 'asc')
            ->get();
        $job_xmls = $job_xml->groupBy('security_code');
        $balance = $this->ledgerAndMatureBalance();
        $diposites = Diposite::where('client_id', auth()->user()->id)->where('status', 1)->whereBetween('created_at', [$from_date, $to_date])->sum('amount');
        $withdraws = Withdraw::where('client_id', auth()->user()->id)->where('status', 1)->whereBetween('created_at', [$from_date, $to_date])->sum('amount');
        $charge = Charge::where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('amount');
        $realised_gain_loss = $this->realisedGainLoss($job_xmls);
        $accrued_charge = AccruedCharge::where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('charge');
        $margin_loan = MarginLoan::where('status', 1)->where('dse_bo_id', auth()->user()->dse_bo_id)->sum('approved_amount');
        return view('frontEnd.client-dashboard.protfolio', [
            'job_xmls' => $job_xmls,
            'from_date' => $request->fromDate,
            'to_date'  => $request->toDate,
            'abn_date' => $abn_date,
            'z_date'  => $z_date,
            'balance' => $balance,
            'diposites' => $diposites,
            'withdraws' => $withdraws,
            'realised_gain_loss' => $realised_gain_loss,
            'charge' => $charge,
            'accrued_charge' => $accrued_charge,
            'margin_loan' => $margin_loan
        ]);
    }
    private function realisedGainLoss($job_xmls){
        $total_realised_gain = 0;
        foreach ($job_xmls as $key => $jx){
            $buy_quantity = 0;
            $buy_cost = 0;
            $sale_quantity = 0;
            $sale_cost = 0;
            $gain_rate = 0;
            $buy_qty_d = 0;
            $sale_qty_d = 0;
            $realised_gain = 0;
            foreach ($job_xmls[$key] as $data){
                if($data == 'B'){
                    $buy_quantity += (integer) $data->quantity;
                    $buy_cost += (integer) $data->value;
                }else{
                    $sale_quantity += (integer) $data->quantity;
                    $sale_cost += (integer) $data->value;
                }
            }
            if ($buy_quantity == 0){
                $buy_qty_d = 1;
            }else{
                $buy_qty_d = $buy_quantity;
            }

            if ($sale_quantity == 0){
                $sale_qty_d = 1;
            }else{
                $sale_qty_d = $sale_quantity;
            }


            $buy_rate = $buy_cost/$buy_qty_d;
            $sale_rate = $sale_cost/$sale_qty_d;
            $gain_rate = $buy_rate - $sale_rate;
            $realised_gain = $gain_rate * $sale_qty_d;
            $total_realised_gain += $realised_gain;
        }
        return $total_realised_gain;
    }
    private function ledgerAndMatureBalance(){
        $ledger_balance = Transaction::select(DB::raw('sum(debit - credit) as total'))->where('client_id', Auth::user()->id)->get();
        $withdraw_pending =  Withdraw::where('client_id', Auth::user()->id)->where('status', 0)->sum('amount');
        $share_request_pending = ShareRequest::where('client_id', Auth::user()->id)->where('status', 0)->sum('total_price_with_commission');
        $ipo_request_pending = IpoRequest::where('client_id', Auth::user()->id)->where('status', 0)->sum('total_price');

        $ledger_balance = $ledger_balance[0]['total'];
        $mature_balance = $ledger_balance - $withdraw_pending;
        $mature_balance -= $share_request_pending;
        $mature_balance -= $ipo_request_pending;

        $balance['ledger_balance'] = $ledger_balance;
        $balance['mature_balance'] = $mature_balance;

        return $balance;
    }
    public function clientLiveProtfolio(){
        return view('frontEnd.client-dashboard.live-protfolio');
    }
    protected function clientLedgerValidation($request){
        $validator = Validator::make($request->all(), [
            'fromDate'          => 'required',
            'toDate'          => 'required',
        ]);
        return $validator;
    }
    public function clientLedger(){
        $user_info = User::with(['get_bo_account_info' => function($q){ $q->select('id', 'bank_ac', 'user_name');}])
            ->select('id', 'bo_id', 'name', 'fathers_name', 'mothers_name', 'present_address', 'dse_bo_id')
            ->where('id', auth()->user()->id)
            ->first();
        return view('frontEnd.client-dashboard.client-ledger', [
            'user_info' => $user_info
        ]);
    }
    public function clientLedgerView(Request $request){
        $validator = $this->clientLedgerValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
//        $pre_balance = Transaction::select(DB::raw('sum(debit - credit) as total'))
//            ->whereDate('trans_date', '<', $request->fromDate)
//            ->where('status', 1)
//            ->orderBy('id', 'asc')
//            ->get();
        $pre_balances = Transaction::select('id', 'trans_date', 'status','debit', 'credit')
            ->whereDate('trans_date', '<', $request->fromDate)
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
        $pre_balance_debit = 0;
        $pre_balance_credit = 0;
        $pre_balance = 0;
        foreach ($pre_balances as $pb){
            $pre_balance_debit += $pb->debit;
            $pre_balance_credit += $pb->credit;
        }
        $pre_balance = $pre_balance_debit - $pre_balance_credit;

        $transactions = Transaction::whereBetween('trans_date', [$request->fromDate, $request->toDate])->orderBy('id', 'asc')->get();
        $user_info = User::with(['get_bo_account_info' => function($q){ $q->select('id', 'bank_ac', 'user_name');}])
            ->select('id', 'bo_id', 'name', 'fathers_name', 'mothers_name', 'present_address', 'dse_bo_id')
            ->where('id', auth()->user()->id)
            ->first();

        return view('frontEnd.client-dashboard.client-ledger', [
            'pre_balance' => $pre_balance,
            'transactions' => $transactions,
            'fromDate' => $request->fromDate,
            'toDate' => $request->toDate,
            'user_info' => $user_info,
            'from_date' => $request->fromDate,
            'to_date'   => $request->toDate
        ]);
    }
    public function clientConfirmation(){
        $user_info = User::with(['get_bo_account_info' => function($q){ $q->select('id', 'bank_ac', 'user_name');}])
            ->select('id', 'bo_id', 'name', 'fathers_name', 'mothers_name', 'present_address', 'dse_bo_id')
            ->where('id', auth()->user()->id)
            ->first();
        return view('frontEnd.client-dashboard.client-confirmation', ['user_info' => $user_info]);
    }
    protected function clientConfirmationViewValidation($request){
        $validator = Validator::make($request->all(), [
            'tradeDate'          => 'required',
        ]);
        return $validator;
    }
    public function clientConfirmationView(Request $request){
        $validator = $this->clientConfirmationViewValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $user_info = User::with(['get_bo_account_info' => function($q){ $q->select('id', 'bank_ac', 'user_name');}])
            ->select('id', 'bo_id', 'name', 'fathers_name', 'mothers_name', 'present_address', 'dse_bo_id')
            ->where('id', auth()->user()->id)
            ->first();
        $date = $request->tradeDate;
        $job_xml = JobXml::with(['get_dse' => function($q) use ($date){$q->where('trade_date', $date);}])
            ->where('bo_id', auth()->user()->dse_bo_id)
            ->where('action', 'EXEC')
            ->orderBy('id', 'asc')
            ->get();
        $job_xmls = $job_xml->groupBy('security_code');
//        return $job_xmls;
        $ledger_pre_balance = Transaction::select(DB::raw('sum(debit - credit) as total'))
            ->where('client_id', Auth::user()->id)
            ->where('trans_date', '<', $request->tradeDate)
            ->get();
        $payment = Diposite::where('client_id', Auth::user()->id)->where('status', 1)->whereDate('created_at', '<', $request->tradeDate)->sum('amount');
        $received = Withdraw::where('client_id', Auth::user()->id)->where('status', 1)->whereDate('created_at', '<', $request->tradeDate)->sum('amount');
        return view('frontEnd.client-dashboard.client-confirmation', [
            'user_info' => $user_info,
            'job_xmls' => $job_xmls,
            'ledger_pre_balance' => $ledger_pre_balance[0]->total,
            'payment' => $payment,
            'received' => $received
        ]);
    }
    public function receiptPayment(){
        $user_info = User::with(['get_bo_account_info' => function($q){ $q->select('id', 'bank_ac', 'user_name');}])
            ->select('id', 'bo_id', 'name', 'fathers_name', 'mothers_name', 'present_address', 'dse_bo_id')
            ->where('id', auth()->user()->id)
            ->first();
        return view('frontEnd.client-dashboard.receipt-payment', ['user_info' => $user_info]);
    }
    public function receiptPaymentView(Request $request){
        $validator = $this->clientLedgerValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $transactions = Transaction::whereBetween('trans_date', [$request->fromDate, $request->toDate])->orderBy('id', 'asc')->get();
        $user_info = User::with(['get_bo_account_info' => function($q){ $q->select('id', 'bank_ac', 'user_name');}])
            ->select('id', 'bo_id', 'name', 'fathers_name', 'mothers_name', 'present_address', 'dse_bo_id')
            ->where('id', auth()->user()->id)
            ->first();
//        return $transactions;
        return view('frontEnd.client-dashboard.receipt-payment', [
            'transactions' => $transactions,
            'fromDate' => $request->fromDate,
            'toDate' => $request->toDate,
            'user_info' => $user_info,
            'from_date' => $request->fromDate,
            'to_date'   => $request->toDate
        ]);
    }


    public function protfolioDetailsPl(){
        return view('frontEnd.client-dashboard.profit-loss-pl');
    }
    public function protfolioDetailsPlView(Request $request){
        $validator = $this->clientLedgerValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $user_info = User::with(['get_bo_account_info' => function($q){ $q->select('id', 'bank_ac', 'user_name');}])
            ->select('id', 'bo_id', 'name', 'fathers_name', 'mothers_name', 'present_address', 'dse_bo_id')
            ->where('id', auth()->user()->id)
            ->first();
        $from_date = $request->fromDate;
        $to_date  = $request->toDate;
        $job_xml = JobXml::with(['get_dse' => function($q) use ($to_date){$q->where('trade_date', '<=', $to_date)->orderBy('trade_date', 'desc');}])
            ->where('bo_id', auth()->user()->dse_bo_id)
            ->where('action', 'EXEC')
            ->where('date', '>=', $from_date)
            ->where('date', '<=', $to_date)
            ->orderBy('id', 'asc')
            ->get();
        $job_xmls = $job_xml->groupBy('security_code');
        $ledger_balance_current = Transaction::select(DB::raw('sum(debit - credit) as total'))
            ->where('client_id', Auth::user()->id)
            ->where('trans_date', '<=', $to_date)
            ->get();
        $payment = Diposite::where('client_id', Auth::user()->id)
            ->where('status', 1)
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->sum('amount');
        $received = Withdraw::where('client_id', Auth::user()->id)
            ->where('status', 1)
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->sum('amount');
//        return $job_xmls;
        return view('frontEnd.client-dashboard.profit-loss-pl', [
            'job_xmls' => $job_xmls,
            'ledger_balance_current' => $ledger_balance_current[0]->total,
            'payment' => $payment,
            'received' => $received,
            'user_info' => $user_info,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }
    public function printClientDashboard(){
        $bo_account = BoAccount::with('bo_bank', 'bank_branch_name')->where('id', Auth::user()->bo_id)->first();
        $pdf = PDF::loadView('frontEnd.client-dashboard.print', [
            'bo_account' => $bo_account
        ]);

        $bo_account_id = $bo_account['user_name'];
/*              var_dump($bo_account_id);
                die();*/

        return $pdf->download(''.$bo_account_id.'.pdf');
//        return view('pdf.bo-account-pdf');
    }

    public function BuyShare(){
        $ledger_balance = Transaction::select(DB::raw('sum(debit - credit) as total'))->where('client_id', Auth::user()->id)->get();
        // Pending Request for Calculate Mature Balance (Start)

        $withdraw_pending =  Withdraw::where('client_id', Auth::user()->id)->where('status', 0)->sum('amount');
        $mature_balance = $ledger_balance[0]['total'] - $withdraw_pending;
        $share_request_pending = ShareRequest::where('client_id', Auth::user()->id)->where('status', 0)->sum('total_price_with_commission');
        $mature_balance -= $share_request_pending;


        // Pending Request for Calculate Mature Balance (Start)
        $bo_amount = BoAmount::where('id', 1)->first();
        $shares = Share::where('status', 1)->orderBy('name', 'asc')->get();
        return view('frontEnd.client-dashboard.share-buy', [
            'shares' => $shares,
            'mature_balance' => $mature_balance,
            'bo_amount' => $bo_amount,
        ]);
    }
    public function clientSellShare(){
        $client_shares = ClientShare::with('share')->where('client_id', Auth::user()->id)->get();
        return view('frontEnd.client-dashboard.share-sell', ['client_shares' => $client_shares]);
    }
    public function clientSellingShare($id){
        $client_share = ClientShare::with(['client' => function($q){$q->select('id', 'name');}, 'share'])->where('id', $id)->first();
        return view('frontEnd.client-dashboard.share-selling-form', ['client_share' => $client_share]);
    }
    public function dseMobileApp(){
        return view('frontEnd.client-dashboard.dse-app');
    }
    public function chatbox(){
        return view('frontEnd.client-dashboard.chatbox');
    }
    public function support(){
        return view('frontEnd.client-dashboard.support');
    }

    // Request to change uploaded file

    // Image Upload
    protected function _imageUpload($image, $image_url){
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url_public_path = public_path($image_url);
        Image::make($image)->resize(253, 158)->save($image_url_public_path.$image_name);
        $image_path = $image_url.$image_name;
        return $image_path;
    }

    protected function ac_holder_image_change_request($request){
        $image = $request->file('first_ac_holder_image');
        $image_url = 'alhaj/assets/bo-image/ac-holder-image-change-request/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;

    }

    public function firstACHolderImageChangeRequest(Request $request){
    $request->validate([
        'first_ac_holder_image' => 'mimes:jpeg,jpg,png,gif|required'
    ]);
        $image_path = $this->ac_holder_image_change_request($request);
        $image_change_request_c = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
        if($image_change_request_c == NULL){

            $image_change_request = new ImageChangeRequest();
            if($request->file('first_ac_holder_image')){
                $image_change_request->bo_id = $request->bo_id;
                $image_change_request->ac_holder_image = $image_path;
                $image_change_request->save();
                return back()->with('message', 'First AC Holder Image Uploaded Successfully !!!');
            }
        }else{
            $image_change_request = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
            if(file_exists(public_path($image_change_request->ac_holder_image)) && $image_change_request->ac_holder_image != NUll){
                unlink(public_path($image_change_request->ac_holder_image));
            }
            $image_change_request->ac_holder_image = $image_path;
            $image_change_request->update();
            return back()->with('message', 'First AC Holder Image Updated Successfully !!!');
        }

    }


    protected function front_page_nid_image_change_request($request){
        $image = $request->file('ac_holder_front_page_nid_image');
        $image_url = 'alhaj/assets/bo-image/front-page-nid-image-change-request/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function firstACHolderFrontNidImageChangeRequest(Request $request){
        $request->validate([
            'ac_holder_front_page_nid_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $image_path = $this->front_page_nid_image_change_request($request);
        $image_change_request_c = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
        if($image_change_request_c == NULL){

            $image_change_request = new ImageChangeRequest();
            if($request->file('ac_holder_front_page_nid_image')){
                $image_change_request->bo_id = $request->bo_id;
                $image_change_request->ac_holder_front_page_nid_image = $image_path;
                $image_change_request->save();
                return back()->with('message', 'First AC Holder Image Uploaded Successfully !!!');
            }
        }else{
            $image_change_request = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
            if(file_exists(public_path($image_change_request->ac_holder_front_page_nid_image)) && $image_change_request->ac_holder_front_page_nid_image != NUll){
                unlink(public_path($image_change_request->ac_holder_front_page_nid_image));
            }
            $image_change_request->ac_holder_front_page_nid_image = $image_path;
            $image_change_request->update();
            return back()->with('message', 'First AC Holder Nid Image Updated Successfully !!!');
        }
    }


    protected function back_page_nid_image_change_request($request){
        $image = $request->file('ac_holder_back_page_nid_image');
        $image_url = 'alhaj/assets/bo-image/back-page-nid-image-change-request/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function firstACHolderBackNidImageChangeRequest(Request $request){
        $request->validate([
            'ac_holder_back_page_nid_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $image_path = $this->back_page_nid_image_change_request($request);
        $image_change_request_c = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
        if($image_change_request_c == NULL){

            $image_change_request = new ImageChangeRequest();
            if($request->file('ac_holder_back_page_nid_image')){
                $image_change_request->bo_id = $request->bo_id;
                $image_change_request->ac_holder_back_page_nid_image = $image_path;
                $image_change_request->save();
                return back()->with('message', 'First AC Holder Image Uploaded Successfully !!!');
            }
        }else{
            $image_change_request = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
            if(file_exists(public_path($image_change_request->ac_holder_back_page_nid_image)) && $image_change_request->ac_holder_back_page_nid_image != NUll){
                unlink(public_path($image_change_request->ac_holder_back_page_nid_image));
            }
            $image_change_request->ac_holder_back_page_nid_image = $image_path;
            $image_change_request->update();
            return back()->with('message', 'First AC Holder Nid Image Updated Successfully !!!');
        }
    }


    protected function ac_holder_signature_image_change_request($request){
        $image = $request->file('ac_holder_signature');
        $image_url = 'alhaj/assets/bo-image/ac-holder-signature-image-change/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function firstACHolderSignatureImageChangeRequest(Request $request){
        $request->validate([
            'ac_holder_signature' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $image_path = $this->ac_holder_signature_image_change_request($request);
        $image_change_request_c = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
        if($image_change_request_c == NULL){

            $image_change_request = new ImageChangeRequest();
            if($request->file('ac_holder_signature')){
                $image_change_request->bo_id = $request->bo_id;
                $image_change_request->ac_holder_signature = $image_path;
                $image_change_request->save();
                return back()->with('message', 'First AC Holder Image Uploaded Successfully !!!');
            }
        }else{
            $image_change_request = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
            if(file_exists(public_path($image_change_request->ac_holder_signature)) && $image_change_request->ac_holder_signature != NUll){
                unlink(public_path($image_change_request->ac_holder_signature));
            }
            $image_change_request->ac_holder_signature = $image_path;
            $image_change_request->update();
            return back()->with('message', 'First AC Holder Nid Image Updated Successfully !!!');
        }
    }


    protected function joint_ac_holder_image_change_request($request){
        $image = $request->file('joint_ac_holder_image');
        $image_url = 'alhaj/assets/bo-image/join-ac-holder-image-change-request/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function jointACHolderImageChangeRequest(Request $request){
        $request->validate([
            'joint_ac_holder_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $image_path = $this->joint_ac_holder_image_change_request($request);
        $image_change_request_c = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
        if($image_change_request_c == NULL){

            $image_change_request = new ImageChangeRequest();
            if($request->file('joint_ac_holder_image')){
                $image_change_request->bo_id = $request->bo_id;
                $image_change_request->joint_ac_holder_image = $image_path;
                $image_change_request->save();
                return back()->with('message', 'Joint AC Holder Image Uploaded Successfully !!!');
            }
        }else{
            $image_change_request = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
            if(file_exists(public_path($image_change_request->joint_ac_holder_image)) && $image_change_request->joint_ac_holder_image != NUll){
                unlink(public_path($image_change_request->joint_ac_holder_image));
            }
            $image_change_request->joint_ac_holder_image = $image_path;
            $image_change_request->update();
            return back()->with('message', 'Joint AC Holder Nid Image Updated Successfully !!!');
        }
    }


    protected function joint_front_page_nid_image_change_request($request){
        $image = $request->file('joint_ac_holder_front_page_nid_image');
        $image_url = 'alhaj/assets/bo-image/join-front-page-nid-image-change-request/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function jointACHolderFrontNidImageChangeRequest(Request $request){
        $request->validate([
            'joint_ac_holder_front_page_nid_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $image_path = $this->joint_front_page_nid_image_change_request($request);
        $image_change_request_c = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
        if($image_change_request_c == NULL){

            $image_change_request = new ImageChangeRequest();
            if($request->file('joint_ac_holder_front_page_nid_image')){
                $image_change_request->bo_id = $request->bo_id;
                $image_change_request->joint_ac_holder_front_page_nid_image = $image_path;
                $image_change_request->save();
                return back()->with('message', 'First AC Holder Image Uploaded Successfully !!!');
            }
        }else{
            $image_change_request = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
            if(file_exists(public_path($image_change_request->joint_ac_holder_front_page_nid_image)) && $image_change_request->joint_ac_holder_front_page_nid_image != NUll){
                unlink(public_path($image_change_request->joint_ac_holder_front_page_nid_image));
            }
            $image_change_request->joint_ac_holder_front_page_nid_image = $image_path;
            $image_change_request->update();
            return back()->with('message', 'First AC Holder Nid Image Updated Successfully !!!');
        }
    }


    protected function joint_back_page_nid_image_change_request($request){
        $image = $request->file('joint_ac_holder_back_page_nid_image');
        $image_url = 'alhaj/assets/bo-image/back-page-nid-image-change-request/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function jointACHolderBackNidImageChangeRequest(Request $request){
        $request->validate([
            'joint_ac_holder_back_page_nid_image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $image_path = $this->joint_back_page_nid_image_change_request($request);
        $image_change_request_c = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
        if($image_change_request_c == NULL){

            $image_change_request = new ImageChangeRequest();
            if($request->file('joint_ac_holder_back_page_nid_image')){
                $image_change_request->bo_id = $request->bo_id;
                $image_change_request->joint_ac_holder_back_page_nid_image = $image_path;
                $image_change_request->save();
                return back()->with('message', 'First AC Holder Image Uploaded Successfully !!!');
            }
        }else{
            $image_change_request = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
            if(file_exists(public_path($image_change_request->joint_ac_holder_back_page_nid_image)) && $image_change_request->joint_ac_holder_back_page_nid_image != NUll){
                unlink(public_path($image_change_request->joint_ac_holder_back_page_nid_image));
            }
            $image_change_request->joint_ac_holder_back_page_nid_image = $image_path;
            $image_change_request->update();
            return back()->with('message', 'First AC Holder Nid Image Updated Successfully !!!');
        }
    }


    protected function joint_ac_holder_signature_image_change_request($request){
        $image = $request->file('joint_ac_holder_signature');
        $image_url = 'alhaj/assets/bo-image/join-ac-holder-signature-image-change/';
        $image_path = $this->_imageUpload($image, $image_url);
        return $image_path;
    }

    public function jointACHolderSignatureImageChangeRequest(Request $request){
        $request->validate([
            'joint_ac_holder_signature' => 'mimes:jpeg,jpg,png,gif|required'
        ]);
        $image_path = $this->joint_ac_holder_signature_image_change_request($request);
        $image_change_request_c = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
        if($image_change_request_c == NULL){

            $image_change_request = new ImageChangeRequest();
            if($request->file('joint_ac_holder_signature')){
                $image_change_request->bo_id = $request->bo_id;
                $image_change_request->joint_ac_holder_signature = $image_path;
                $image_change_request->save();
                return back()->with('message', 'Joint AC Holder Image Uploaded Successfully !!!');
            }
        }else{
            $image_change_request = ImageChangeRequest::where('bo_id', $request->bo_id)->first();
            if(file_exists(public_path($image_change_request->joint_ac_holder_signature)) && $image_change_request->joint_ac_holder_signature != NUll){
                unlink(public_path($image_change_request->joint_ac_holder_signature));
            }
            $image_change_request->joint_ac_holder_signature = $image_path;
            $image_change_request->update();
            return back()->with('message', 'Joint AC Holder Nid Image Updated Successfully !!!');
        }
    }
}
