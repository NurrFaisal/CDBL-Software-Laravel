<?php

namespace App\Http\Controllers;

use App\admin\AccruedCharge;
use App\admin\Bonus;
use App\admin\BonusReceivable;
use App\admin\Charge;
use App\admin\PeRatio;
use App\Imports\PeRatioImport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Validator;



class XlController extends Controller
{
    public function peRatio(){

        return view('backEnd.csv.pe_ratio');
    }
    public function peRatioSave(Request $request){
        if($request->hasFile('name'))
        {
            $file = $request->name->getClientOriginalName();
            $file_name=explode('.',$file)[0];
            if($file_name == "PE"){
                $extension = File::extension($request->name->getClientOriginalName());
                if ($extension == "xlsx" || $extension == "xls" ) {
                    $file = $request->file('name');
                    $theArray = Excel::toArray(new \stdClass(), $file);
                    foreach ($theArray[0] as $key => $data){
                        if ($key > 2){
                            if ($data[0] !== NULL){
                                $pe_ratio = PeRatio::where('security_code', $data[1])->first();
                                if($pe_ratio == null){
                                    $pe_ratio = new PeRatio();
                                }
                                $pe_ratio->security_code = $data[1];
                                if($data[4] === 'n/a' || $data[4] === '-' || $data[4] === null){
                                    $pe_ratio->ratio = 0;
                                }else{
                                    $pe_ratio->ratio = $data[4];
                                }
                                $pe_ratio->save();
                            }else{
                                break;
                            }
                        }
                    }
                }else {
                    return back()->with('message', 'Please upload exact file');
                }
            }else{
                return back()->with('message', 'File name not Match..');
            }

        }
        return back()->with('message', 'PE Ratio File Uploaded Successfully !!! ');
    }

    public function bonusReceivable(){
        return view('backEnd.csv.bonus_receivable');
    }
    public function bonusReceivableSave(Request $request){
        if($request->hasFile('name'))
        {
            $file = $request->name->getClientOriginalName();
            $file_name=explode('.',$file)[0];
            if($file_name == "Bonus Receivable"){
                $extension = File::extension($request->name->getClientOriginalName());
                if ($extension == "xlsx" || $extension == "xls" ) {
                    $file = $request->file('name');
                    $theArray = Excel::toArray(new \stdClass(), $file);
                    $security_code = $theArray[0][8][6];
                    $EXCEL_DATE = $theArray[0][10][2];
                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
                    $date = gmdate("Y-m-d", $UNIX_DATE);
                    foreach (array_slice($theArray[0], 21) as $key => $data){
                        if($key % 2 == 0){
                            $bo_id = $data[0];
                            if ($bo_id === NULL){
                                break;
                            }
                            $name = $data[2];
                            $value = $data[7];
                        }else{
                            $amount = $data[7];
                            $bonus_receivable = new BonusReceivable();
                            $bonus_receivable->date = $date;
                            $bonus_receivable->bo_id = $bo_id;
                            $bonus_receivable->name = $name;
                            $bonus_receivable->security_code = $security_code;
                            $bonus_receivable->value = $value;
                            $bonus_receivable->amount = $amount;
                            $bonus_receivable->save();
                        }
                    }
                }else {
                    return back()->with('message', 'Please upload exact file');
                }
            }else{
                return back()->with('message', 'File name not match...');
            }
        }
        return back()->with('message', 'Bonus Receivable File Uploaded Successfully !!! ');
    }

    public function bonus(){
        return view('backEnd.csv.bonus');
    }
    public function bonusSave(Request $request){
        if($request->hasFile('name'))
        {
            $file = $request->name->getClientOriginalName();
            $file_name=explode('.',$file)[0];
            if($file_name == "Bonus"){
                $extension = File::extension($request->name->getClientOriginalName());
                if ($extension == "xlsx" || $extension == "xls" ) {
                    $file = $request->file('name');
                    $theArray = Excel::toArray(new \stdClass(), $file);
                    $security_code = $theArray[0][8][6];
                    $EXCEL_DATE = $theArray[0][10][6];
                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
                    $date = gmdate("Y-m-d", $UNIX_DATE);
                    $i = 1;
                    foreach (array_slice($theArray[0], 22) as $key => $data){
                        if($i == 1){
                            if ($data[0] == NULL){
                                break;
                            }
                            $bo_id = $data[0];
                            $name = $data[3];
                            $i++;
                        }elseif ($i == 2){
                            $pre_amount = $data[2];
                            $i++;
                        }elseif ($i == 3){
                            $i++;
                        }elseif ($i == 4){
                            $amount = $data[2];
                            $i++;
                        }elseif ($i == 5){
                            $bonus = new Bonus();
                            $bonus->date = $date;
                            $bonus->bo_id = $bo_id;
                            $bonus->name = $name;
                            $bonus->security_code = $security_code;
                            $bonus->pre_amount = $pre_amount;
                            $bonus->amount = $amount;
                            $bonus->save();
                            $i = 1;
                        }
                    }
                }else {
                    return back()->with('message', 'Please upload exact file');
                }
            }else{
                return back()->with('message', 'File name not match...');
            }
        }
        return back()->with('message', 'Bonus File Uploaded Successfully !!! ');
    }
    public function accruedCharge(){
        return view('backEnd.csv.accrued_charge');
    }
    public function accruedChargeSave(Request $request){
        if($request->hasFile('name'))
        {
            $file = $request->name->getClientOriginalName();
            $file_name=explode('.',$file)[0];
            if($file_name == "Accrued Charge"){
                $extension = File::extension($request->name->getClientOriginalName());
                if ($extension == "xlsx" || $extension == "xls" ) {
                    $file = $request->file('name');
                    $theArray = Excel::toArray(new \stdClass(), $file);
                    $EXCEL_DATE = $theArray[0][0][6];
                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
                    $date = gmdate("Y-m-d", $UNIX_DATE);
                    foreach (array_slice($theArray[0], 2) as $key => $data){
                        if($data[1] == NULL){
                            break;
                        }
                        $accrued_charge = new AccruedCharge();
                        $accrued_charge->date = $date;
                        $accrued_charge->bo_id = $data[1];
                        $accrued_charge->name = $data[2];
                        $accrued_charge->charge = $data[5];
                        $accrued_charge->save();

                    }
                }else {
                    return back()->with('message', 'Please upload exact file');
                }
            }else{
                return back()->with('message', 'File name not Match..');
            }

        }
        return back()->with('message', 'Accrued Charge File Uploaded Successfully !!! ');
    }

    public function charge(){
        return view('backEnd.csv.charge');
    }
    public function chargeSave(Request $request){
        if($request->hasFile('name'))
        {
            $file = $request->name->getClientOriginalName();
            $file_name=explode('.',$file)[0];
            if($file_name == "Charge"){
                $extension = File::extension($request->name->getClientOriginalName());
                if ($extension == "xlsx" || $extension == "xls" ) {
                    $file = $request->file('name');
                    $theArray = Excel::toArray(new \stdClass(), $file);
                    $EXCEL_DATE = $theArray[0][1][0];
                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
                    $date = gmdate("Y-m-d", $UNIX_DATE);
                    foreach (array_slice($theArray[0], 12) as $key => $data){
                        if($data[1] == NULL){
                            break;
                        }
                        $charge = new Charge();
                        $charge->date = $date;
                        $charge->code = $data[1];
                        $charge->bo_id = $data[2];
                        $charge->name = $data[3];
                        $charge->amount = $data[4];
                        $charge->save();
                    }
                }else {
                    return back()->with('message', 'Please upload exact file');
                }
            }else{
                return back()->with('message', 'File name not Match..');
            }

        }
        return back()->with('message', 'Charge File Uploaded Successfully !!! ');
    }

}
