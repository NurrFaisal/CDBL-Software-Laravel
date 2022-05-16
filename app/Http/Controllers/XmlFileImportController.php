<?php

namespace App\Http\Controllers;

use App\admin\DseXml;
use App\admin\JobXml;
use App\admin\Share;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

class XmlFileImportController extends Controller
{
    public function tradersJob(){
        return view('backEnd.xml.traders_job');
    }
    protected function dateFormate($date){
        $arr1 = str_split($date, 2);
        $result = '';
        foreach ($arr1 as $key => $a){
            if($key > 1){
                $result .= "-".$a;
            }else{
                $result .= $a;
            }
        }
        return $result;
    }
    public function dataFormateToJSON($request){
        $xmlDataString = file_get_contents($request->file('name'));
        $xmlObject = simplexml_load_string($xmlDataString);
        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true);
        return $phpDataArray;
    }
    public function tradersJobImport(Request $request){
        $file_name = $request->file('name')->getClientOriginalName();
        if (stripos($file_name, "JOB") === false) {
            return back()->with('message', 'Please Upload Proper File !!');
        }
        $arr1 = str_split($file_name, 8);
        $date = $arr1[0];
        $formated_date = $this->dateFormate($date);
        $job_xml_count = JobXml::where('date', $formated_date)->count();
        if($job_xml_count > 0){
            return back()->with('message', 'This file already exit !!');
        }
        $validator = Validator::make($request->all(), [
            'name'          => 'required|mimes:application/xml,xml',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $phpDataArray = $this->dataFormateToJSON($request);
        foreach ($phpDataArray['Detail'] as $data){
            $job_xml = new JobXml();
            $job_xml->action = $data['@attributes']['Action'];
            $job_xml->status = $data['@attributes']['Status'];
            $job_xml->isin = $data['@attributes']['ISIN'];
            $job_xml->asset_class = $data['@attributes']['AssetClass'];
            $job_xml->order_id = $data['@attributes']['OrderID'];
            $job_xml->ref_order_id = $data['@attributes']['RefOrderID'];
            $job_xml->side = $data['@attributes']['Side'];
            $job_xml->bo_id = $data['@attributes']['BOID'];
            $job_xml->security_code = $data['@attributes']['SecurityCode'];
            $job_xml->board = $data['@attributes']['Board'];
            $date_formate = $this->dateFormate($data['@attributes']['Date']);
            $job_xml->date = $date_formate;
            $job_xml->time = $data['@attributes']['Time'];
            $job_xml->quantity = $data['@attributes']['Quantity'];
            $job_xml->price = $data['@attributes']['Price'];
            $job_xml->value = $data['@attributes']['Value'];
            $job_xml->exec_id = $data['@attributes']['ExecID'];
            $job_xml->session = $data['@attributes']['Session'];
            $job_xml->fill_type = $data['@attributes']['FillType'];
            $job_xml->category = $data['@attributes']['Category'];
            $job_xml->compulsory_spot = $data['@attributes']['CompulsorySpot'];
            $job_xml->client_code = $data['@attributes']['ClientCode'];
            $job_xml->trader_dealer_id = $data['@attributes']['TraderDealerID'];
            $job_xml->owner_dealer_id = $data['@attributes']['OwnerDealerID'];
            $job_xml->trade_report_type = $data['@attributes']['TradeReportType'];
            $job_xml->save();
        }
        return back()->with('message', 'File uploaded successfully !!!');
    }

    public function eodTickers(){
        return view('backEnd.xml.eod_tickers');
    }
    public function eodTickersImport(Request $request){
        $file_name = $request->file('name')->getClientOriginalName();
        if (stripos($file_name, "DSE") === false) {
            return back()->with('message', 'Please Upload Proper File !!');
        }
        $arr1 = str_split($file_name, 8);
        $date = $arr1[0];
        $formated_date = $this->dateFormate($date);
        $dse_xml_count = DseXml::where('trade_date', $formated_date)->count();
        if($dse_xml_count > 0){
            return back()->with('message', 'This file already exit !!');
        }
        $validator = Validator::make($request->all(), [
            'name'          => 'required|mimes:application/xml,xml',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $phpDataArray = $this->dataFormateToJSON($request);
        foreach ($phpDataArray['Ticker'] as $data){
            $dse_xml = new DseXml();
            $dse_xml->security_code = $data['@attributes']['SecurityCode'];
            $dse_xml->isin = $data['@attributes']['ISIN'];
            if(isset($data['@attributes']['Category'])){
                $dse_xml->category = $data['@attributes']['Category'];
            }
            if(isset($data['@attributes']['AssetClass'])){
                $dse_xml->asset_class = $data['@attributes']['AssetClass'];
            }
            if(isset($data['@attributes']['Sector'])){
                $dse_xml->sector = $data['@attributes']['Sector'];
            }
            if(isset($data['@attributes']['CompulsorySpot'])){
                $dse_xml->compulsory_spot = $data['@attributes']['CompulsorySpot'];
            }
            if(isset($data['@attributes']['TradeDate'])){
                $date_formate = $this->dateFormate($data['@attributes']['TradeDate']);
                $dse_xml->trade_date = $date_formate;
            }
            if(isset($data['@attributes']['Close'])){
                $dse_xml->close = $data['@attributes']['Close'];
            }
            if(isset($data['@attributes']['Open'])){
                $dse_xml->open = $data['@attributes']['Open'];
            }
            if(isset($data['@attributes']['High'])){
                $dse_xml->high = $data['@attributes']['High'];
            }
            if(isset($data['@attributes']['Low'])){
                $dse_xml->low = $data['@attributes']['Low'];
            }
            if(isset($data['@attributes']['Var'])){
                $dse_xml->var = $data['@attributes']['Var'];
            }
            if(isset($data['@attributes']['VarPercent'])){
                $dse_xml->var_percent = $data['@attributes']['VarPercent'];
            }
            $dse_xml->save();

            $share = Share::where('bo_isn', $dse_xml->isin)->first();
            if($share){
                if ($dse_xml->close != null){
                    $share->price = $dse_xml->close;
                    $share->update();
                }
            }
        }
        return back()->with('message', 'File uploaded successfully !!!');
    }










}
