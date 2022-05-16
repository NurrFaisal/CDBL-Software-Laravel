@extends('frontEnd.client-dashboard')
@section('title') Client Portfolio @endsection
@section('mainContent')
    @php
        $my_number_format = new \App\Http\Controllers\MyNumberFormat();
    @endphp

    <style>
        th{
            /*white-space: nowrap;*/
        }
        th, td{
            /*white-space: nowrap;*/
            border: 1px solid black !important;
            vertical-align: middle !important;
            text-align: right;
        }
    </style>
    <div class="bo-container">
        <h1 class="profile-heading">Client Portfolio</h1>
        <div  class="user-profile-details" style="padding: 1rem">
            <form action="{{URL::to('/client/portfolio')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <div class="col-md-4 p0">
                                    <label class="form-control" style="white-space: nowrap" id="fromDate">From Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control datepicker" required @error('fromDate') is-invalid-input @enderror value="{{old('fromDate')}}" for="fromDate" name="fromDate" placeholder="From Date"/>
                                    @if ($errors->has('fromDate'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('fromDate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <div class="col-md-4 p0">
                                    <label class="form-control" style="white-space: nowrap" id="toDate">To Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control datepicker" required value="{{old('toDate')}}" for="todate" name="toDate" placeholder="To Date"/>
                                    @if ($errors->has('toDate'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('toDate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" name="btn" value="1" class="btn btn-default">View</button>
                            {{--                            <button  onclick="clientLedger('clientLedger')"  class="btn btn-primary">Print</button>--}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if(isset($job_xmls))
        <div class="user-profile-details" style="overflow: auto; margin-top: 3rem; padding: 10px">
            <div>
                <h1 class="transition-period">Transaction Period : <span>From <i>{{isset($from_date) ? $from_date : '0000-00-00'}}</i> To <i>{{isset($to_date) ? $to_date : '0000-00-00'}}</i></span></h1>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th rowspan="2">SL</th>
                    <th rowspan="2">Instarument</th>
                    <th colspan="3" style="text-align: center">Quantity</th>
                    <th rowspan="2">Avg. Rate</th>
                    <th rowspan="2">Total Cost</th>
                    <th rowspan="2">Market Rate</th>
                    <th rowspan="2">Market Value</th>
                    <th rowspan="2">Un Realised Capital gain/loss </th>
                    <th rowspan="2">% of Gain/L </th>
                    <th rowspan="2"><b>PE Ratio</b></th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th>Free</th>
                    <th>Lock/Pledge</th>
                </tr>
                </thead>
                <tbody>

                @php
                    $i = 1;
                    $m_sub_total_cost = 0;
                    $m_profit_loss = 0;
                    $m_market_value = 0;
                    $m_lock = 0;
                @endphp
                @foreach($job_xmls as $key => $jx)
                    @php
                    if(isset($job_xmls[$key][0]['get_pe_ratio']->ratio)){
                        $ration = $job_xmls[$key][0]['get_pe_ratio']->ratio;
                        }else{
                            $ration = 0;
                        }

                    @endphp
                    @if($ration < 40 && $ration > 0)
                        @php
                        $bonus_receivable = \App\admin\BonusReceivable::where('security_code', $key)->where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('amount');
                        $bonus = \App\admin\Bonus::where('security_code', $key)->where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('amount');
                        $m_lock = $bonus_receivable - $bonus;
                        @endphp
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$key}}</td>
                    @php
                        $total_buy_quantity = 0;
                        $total_sale_quantity = 0;
                        $total_buy_value = 0;
                        $total_sale_value = 0;
                        $total_quantity = 0;
                        $total_value = 0;

                        $abn_date_quantity = 0;
                        $z_date_quantity = 0;
                        $unfree_qunantity = 0;
                    @endphp
                    @foreach ($job_xmls[$key] as $data)
                        @if($data->side == 'B')
                            @php    $total_buy_quantity += (integer) $data->quantity @endphp
                            @php    $total_buy_value += (integer) $data->value @endphp
                        @else
                            @php    $total_sale_quantity += (integer) $data->quantity @endphp
                            @php    $total_sale_value += (integer) $data->value @endphp
                        @endif
                        @if($data->category == 'A' || $data->category == 'B' || $data->category == 'N')
                            @if($data->date > $abn_date || $data->date == $to_date)
                                @php $abn_date_quantity += $data->quantity  @endphp
                            @endif
                        @else
                            @if($data->date > $z_date || $data->date == $to_date)
                                @php $z_date_quantity += $data->quantity  @endphp
                            @endif
                        @endif
                    @endforeach
                    @php $total_quantity = $total_buy_quantity - $total_sale_quantity @endphp
                    @php $total_value = $total_buy_value - $total_sale_value @endphp
                    @php $unfree_qunantity = $abn_date_quantity - $z_date_quantity @endphp

                    <td>{{$my_number_format->money_format($total_quantity + $m_lock)}}</td>
                    <td>{{$my_number_format->money_format($total_quantity - $unfree_qunantity)}}</td>
                    <td>{{$my_number_format->money_format($m_lock)}}</td>
                    <td>{{$my_number_format->money_format((float)($total_value/$total_quantity))}}</td>
                    <td>{{$my_number_format->money_format($total_value)}}</td>
                    <td>{{$my_number_format->money_format($job_xmls[$key][0]->get_dse->close)}}</td>
                    <td>{{$my_number_format->money_format($market_value = $job_xmls[$key][0]->get_dse->close*$total_quantity)}}</td>
                    <td>{{$my_number_format->money_format($profit_loss = ($job_xmls[$key][0]->get_dse->close*$total_quantity)-$total_value)}}</td>
                    <td>{{$my_number_format->money_format($pl_percentage = round(($profit_loss*100)/$total_value, 2))}}</td>
                    <td>{{$job_xmls[$key][0]['get_pe_ratio']->ratio}}</td>
                </tr>
                @php $m_sub_total_cost += $total_value @endphp
                @php $m_market_value += $market_value @endphp
                @php $m_profit_loss += $profit_loss @endphp
                    @endif
                @endforeach
                <tr style="font-weight: bold">
                    <td colspan="2">Sub-total</td>
                    <td colspan="5" style="text-align: right">{{$my_number_format->money_format($m_sub_total_cost)}}</td>
                    <td colspan="2" style="text-align: right">{{$my_number_format->money_format($m_market_value)}}</td>
                    <td>{{$my_number_format->money_format($m_profit_loss)}}</td>
                    <td colspan="2"></td>
                </tr>
                <td colspan="12" style="font-weight: bold; padding-left: 5px; text-align: left">Non-Marginable</td>
                @php
                    $i = 1;
                    $nm_sub_total_cost = 0;
                    $nm_market_value = 0;
                    $nm_profit_loss = 0;
                    $nm_lock = 0;
                @endphp
                @foreach($job_xmls as $key => $jx)
                    @php
                        if(isset($job_xmls[$key][0]['get_pe_ratio']->ratio)){
                            $ration = $job_xmls[$key][0]['get_pe_ratio']->ratio;
                            }else{
                                $ration = 0;
                            }

                    @endphp
                    @if($ration > 40 || $ration == 0)
                        @php
                            $bonus_receivable = \App\admin\BonusReceivable::where('security_code', $key)->where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('amount');
                            $bonus = \App\admin\Bonus::where('security_code', $key)->where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('amount');
                            $nm_lock = $bonus_receivable - $bonus;
                        @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$key}}</td>
                            @php
                                $total_buy_quantity = 0;
                                $total_sale_quantity = 0;
                                $total_buy_value = 0;
                                $total_sale_value = 0;
                                $total_quantity = 0;
                                $total_value = 0;

                                $abn_date_quantity = 0;
                                $z_date_quantity = 0;
                                $unfree_qunantity = 0;
                            @endphp
                            @foreach ($job_xmls[$key] as $data)
                                @if($data->side == 'B')
                                    @php    $total_buy_quantity += (integer) $data->quantity @endphp
                                    @php    $total_buy_value += (integer) $data->value @endphp
                                @else
                                    @php    $total_sale_quantity += (integer) $data->quantity @endphp
                                    @php    $total_sale_value += (integer) $data->value @endphp
                                @endif
                            @if($data->category == 'A' || $data->category == 'B' || $data->category == 'N')
                                @if($data->date > $abn_date || $data->date == $to_date)
                                    @php $abn_date_quantity += $data->quantity  @endphp
                                @endif
                            @else
                                @if($data->date > $z_date || $data->date == $to_date)
                                    @php $z_date_quantity += $data->quantity  @endphp
                                @endif
                            @endif

                            @endforeach
                            @php $total_quantity = $total_buy_quantity - $total_sale_quantity @endphp
                            @php $total_value = $total_buy_value - $total_sale_value @endphp
                            @php $unfree_qunantity = $abn_date_quantity - $z_date_quantity @endphp

                            <td>{{$my_number_format->money_format($total_quantity + $nm_lock)}}</td>
                            <td>{{$my_number_format->money_format($total_quantity - $unfree_qunantity)}}</td>
                            <td>{{$my_number_format->money_format($nm_lock)}}</td>
                            <td>{{$my_number_format->money_format((float)($total_value/$total_quantity))}}</td>
                            <td>{{$my_number_format->money_format($total_value)}}</td>
                            @php
                                if (isset($job_xmls[$key][0]->get_dse->close)){
                                                $close = $job_xmls[$key][0]->get_dse->close;
                                    }else{
                                         $close = '0';
                                    }
                            @endphp

                            <td>{{$my_number_format->money_format($close)}}</td>
                            <td>{{$my_number_format->money_format($market_value = $close*$total_quantity)}}</td>
                            <td>{{$my_number_format->money_format($profit_loss = ($close*$total_quantity)-$total_value)}}</td>
                            <td>{{$my_number_format->money_format($pl_percentage =  round(($profit_loss*100)/$total_value, 2))}}</td>
                            <td>{{$ration}}</td>
                        </tr>
                        @php $nm_sub_total_cost += $total_value @endphp
                        @php $nm_market_value += $market_value @endphp
                        @php $nm_profit_loss += $profit_loss @endphp
                    @endif
                @endforeach
                <tr style="font-weight: bold">
                    <td colspan="2">Sub-total</td>
                    <td colspan="5" style="text-align: right">{{$my_number_format->money_format($nm_sub_total_cost)}}</td>
                    <td colspan="2" style="text-align: right">{{$my_number_format->money_format($nm_market_value)}}</td>
                    <td>{{$my_number_format->money_format($nm_profit_loss)}}</td>
                    <td colspan="2"></td>
                </tr>
                <tr style="font-weight: bold">
                    <td colspan="2">Grand-total</td>
                    <td colspan="5" style="text-align: right">{{$my_number_format->money_format($nm_sub_total_cost + $m_sub_total_cost)}}</td>
                    <td colspan="2" style="text-align: right">{{$my_number_format->money_format($nm_market_value + $m_market_value)}}</td>
                    <td>{{$my_number_format->money_format($nm_profit_loss + $m_profit_loss)}}</td>
                    <td colspan="2"></td>
                </tr>
                </tbody>
            </table>

            <div class="col-md-12">
                <div class="col-md-4">

                    {{--        Fund Status            --}}

                    <div class="row" style="margin-top: 2rem">
                        <div class="col-md-6">
                            <p>Matured Fund</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($balance['mature_balance'])}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Receivable</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($balance['ledger_balance'] - $balance['mature_balance'])}}</p>
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid black">
                        <div class="col-md-6">
                            <p>Ledger Balance</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($balance['ledger_balance'])}}</p>
                        </div>
                    </div>
                    <div class="row" style="font-weight: bold; ">
                        <div class="col-md-6">
                            <p style="text-decoration: underline; margin-top: 5px">Fund Satus</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right"></p>
                        </div>
                    </div>

                    {{--        Total Deposit            --}}

                    <div class="row" style="margin-top: 2rem">
                        <div class="col-md-6">
                            <p>Deposit</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($diposites)}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Security Deposit</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">N/A</p>
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid black">
                        <div class="col-md-6">
                            <p>Realised Gain/(Loss)</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($realised_gain_loss)}}</p>
                        </div>
                    </div>
                    <div class="row" style="font-weight: bold; ">
                        <div class="col-md-6">
                            <p style="text-decoration: underline; margin-top: 5px">Total Deposit</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($realised_gain_loss + $diposites)}}</p>
                        </div>
                    </div>


                    {{--        Total Withdraw            --}}

                    <div class="row" style="margin-top: 2rem">
                        <div class="col-md-6">
                            <p>Withdraw</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($withdraws)}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Security Withdraw</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">N/A</p>
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid black">
                        <div class="col-md-6">
                            <p>Charges & Fees</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($charge)}}</p>
                        </div>
                    </div>
                    <div class="row" style="font-weight: bold; ">
                        <div class="col-md-6">
                            <p style="text-decoration: underline; margin-top: 5px">Total Withdraw</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($charge+$withdraws)}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="row" style="margin-top: 3rem">
                        <div class="col-md-8">
                            <p>Market Value of Security</p>
                        </div>
                        <div class="col-md-4">
                            <p class="align-text-right">{{$my_number_format->money_format($nm_market_value + $m_market_value)}}</p>
                        </div>
                    </div>

                    <div class="row" style="font-weight: bold">
                        <div class="col-md-8">
                            <p>Equity (ALl Instrument)</p>
                        </div>
                        <div class="col-md-4">
                            <p class="align-text-right">{{$my_number_format->money_format(($nm_market_value + $m_market_value) - ($balance['ledger_balance'] + $accrued_charge))}}</p>
                        </div>
                    </div>

                    <div class="row" style="font-weight: bold; border-bottom: 1px solid black">
                        <div class="col-md-8">
                            <p>Equity (Marginable Instrument)</p>
                        </div>
                        <div class="col-md-4">
                            <p class="align-text-right">{{$my_number_format->money_format(($m_market_value) - ($balance['ledger_balance'] + $accrued_charge))}}</p>
                        </div>
                    </div>

                    <div class="row" style="font-weight: bold; ">
                        <div class="col-md-6">
                            <p style="text-decoration: underline; margin-top: 5px">Capital Gain/(Loss)</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right"></p>
                        </div>
                    </div>

                    {{--            Total Capital Gain/ Loss            --}}

                    <div class="row" style="margin-top: 2rem">
                        <div class="col-md-8">
                            <p>Realised</p>
                        </div>
                        <div class="col-md-4">
                            <p class="align-text-right">{{$my_number_format->money_format($realised_gain_loss)}}</p>
                        </div>
                    </div>

                    <div class="row" style="border-bottom: 1px solid black">
                        <div class="col-md-8">
                            <p>Un Realised</p>
                        </div>
                        <div class="col-md-4">
                            <p class="align-text-right">{{$my_number_format->money_format($nm_profit_loss + $m_profit_loss)}}</p>
                        </div>
                    </div>

                    <div class="row" style="font-weight: bold; ">
                        <div class="col-md-6">
                            <p style="text-decoration: underline; margin-top: 5px">Total Capital Gain/(Loss)</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format(($nm_profit_loss + $m_profit_loss) + $realised_gain_loss)}}</p>
                        </div>
                    </div>

                    {{--            Purchase Power            --}}

                    <div class="row" style="margin-top: 2rem">
                        <div class="col-md-8">
                            <p>Accrued Chages</p>
                        </div>
                        <div class="col-md-4">
                            <p class="align-text-right">{{$my_number_format->money_format($accrued_charge)}}</p>
                        </div>
                    </div>

                    <div class="row" style="border-bottom: 1px solid black">
                        <div class="col-md-8">
                            <p>Maximum Margin Limit</p>
                        </div>
                        <div class="col-md-4">
                            <p class="align-text-right">{{$my_number_format->money_format($margin_loan)}}</p>
                        </div>
                    </div>

                    <div class="row" style="font-weight: bold; ">
                        <div class="col-md-6">
                            <p style="text-decoration: underline; margin-top: 5px">Power Purchased</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($margin_loan - $accrued_charge - $balance['ledger_balance'] )}}</p>
                        </div>
                    </div>

                    {{--            Debt Equity Ratio            --}}

                    <div class="row" style="margin-top: 2rem">
                        <div class="col-md-8">
                            <p>Marin Ratio (used) Marginable Instrument</p>
                        </div>
                        <div class="col-md-4">
                            <p class="align-text-right">{{$my_number_format->money_format($balance['ledger_balance']/($m_market_value == 0 ? 1 :  $m_market_value) )}}</p>
                        </div>
                    </div>

                    <div class="row" style="border-bottom: 1px solid black">
                        <div class="col-md-8">
                            <p>Margin Ratio (used) All Instrument</p>
                        </div>
                        <div class="col-md-4">
                            @php
                                $m_and_nm_market_value = $m_market_value + $nm_market_value;
                            if($m_and_nm_market_value == 0){
                                $m_and_nm_market_value = 1;
                            }
                            @endphp
                            <p class="align-text-right">{{$my_number_format->money_format($balance['ledger_balance']/$m_and_nm_market_value)}}</p>
                        </div>
                    </div>

                    <div class="row" style="font-weight: bold; ">
                        <div class="col-md-6">
                            <p style="text-decoration: underline; margin-top: 5px">Debut Equity Ratio</p>
                        </div>
                        <div class="col-md-6">
                            <p class="align-text-right">{{$my_number_format->money_format($balance['ledger_balance']/ ($m_market_value - ($balance['ledger_balance'] + $accrued_charge)))}}</p>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
        <div style="text-align: right">
            <button class="form-submit-btn" type="submit" onclick="clientPortfolio('clientPortfolio')">Print</button>
        </div>

        <div class="bo-container" id="clientPortfolio" style="display: none !important; overflow: auto">
            <style type="text/css" media="print">
                /*@page { size: landscape}*/
            </style>
            <div class="row" style="display: flex; width: 100%">
                <div class="col-md-7" style="width: 70%">
                    <label>Print Date : <?php  echo date("Y-m-d "); ?> <span style="margin-left: 15px"><?php  echo date("h:i:sa"); ?></span></label>
                    <h1 style="text-decoration: underline; font-size: 1.7rem; font-weight: 700; ">AL-HAJ SECURITY & STOCKS LTD</h1>
                    <p>TRDEC # 093, Room #306, DSE Building, Ph : 9576120, 9576121, 01733-080401, 01733-080418 </p>
                    <p>Tel : 9576120, 95762121</p>

{{--                    <h1 style="text-decoration: underline; font-size: 1.4rem; font-weight: 700; ">Ledger: from <b>{{isset($from_date) ? $from_date : '0000-00-00'}} to <b>{{isset($to_date) ? $to_date : '0000-00-00'}}</b></b></h1>

                    <h1 style="font-size: 1.4rem; font-weight: 700; "><span>Name</span> : {{$user_info->name}} <span style="margin-left: 20px">Account-no</span> : {{$user_info->get_bo_account_info->bank_ac}}</h1>
                    <h1 style="font-size: 1.4rem; font-weight: 700; "><span>BO-ID</span> : {{$user_info->get_bo_account_info->user_name}}</h1>

                    <p>{{$user_info->present_address}}</p>--}}
                </div>
                <div class="col-md-5" style="width: 20%; text-align: center">
                    <fieldset>
                        <h1 style="font-weight: 700; border: 1px solid #000000; ">Portfolio</h1>
                    </fieldset>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th rowspan="2">SL</th>
                    <th rowspan="2">Instarument</th>
                    <th colspan="3" style="text-align: center">Quantity</th>
                    <th rowspan="2">Avg. Rate</th>
                    <th rowspan="2">Total Cost</th>
                    <th rowspan="2">Market Rate</th>
                    <th rowspan="2">Market Value</th>
                    <th rowspan="2">Un Realised Capital gain/loss </th>
                    <th rowspan="2">% of Gain/L </th>
                    <th rowspan="2"><b>PE Ratio</b></th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th>Free</th>
                    <th>Lock/Pledge</th>
                </tr>
                </thead>
                <tbody>

                @php
                    $i = 1;
                    $m_sub_total_cost = 0;
                    $m_profit_loss = 0;
                    $m_market_value = 0;
                    $m_lock = 0;
                @endphp
                @foreach($job_xmls as $key => $jx)
                    @php
                    if(isset($job_xmls[$key][0]['get_pe_ratio']->ratio)){
                            $ration = $job_xmls[$key][0]['get_pe_ratio']->ratio;
                        }else{
                            $ration = 0;
                        }

                     @endphp
                    @if($ration < 40 && $ration > 0)
                        @php
                            $bonus_receivable = \App\admin\BonusReceivable::where('security_code', $key)->where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('amount');
                            $bonus = \App\admin\Bonus::where('security_code', $key)->where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('amount');
                            $m_lock = $bonus_receivable - $bonus;
                        @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$key}}</td>
                            @php
                                $total_buy_quantity = 0;
                                $total_sale_quantity = 0;
                                $total_buy_value = 0;
                                $total_sale_value = 0;
                                $total_quantity = 0;
                                $total_value = 0;

                                $abn_date_quantity = 0;
                                $z_date_quantity = 0;
                                $unfree_qunantity = 0;
                            @endphp
                            @foreach ($job_xmls[$key] as $data)
                                @if($data->side == 'B')
                                    @php    $total_buy_quantity += (integer) $data->quantity @endphp
                                    @php    $total_buy_value += (integer) $data->value @endphp
                                @else
                                    @php    $total_sale_quantity += (integer) $data->quantity @endphp
                                    @php    $total_sale_value += (integer) $data->value @endphp
                                @endif
                                @if($data->category == 'A' || $data->category == 'B' || $data->category == 'N')
                                    @if($data->date > $abn_date || $data->date == $to_date)
                                        @php $abn_date_quantity += $data->quantity  @endphp
                                    @endif
                                @else
                                    @if($data->date > $z_date || $data->date == $to_date)
                                        @php $z_date_quantity += $data->quantity  @endphp
                                    @endif
                                @endif
                            @endforeach
                            @php $total_quantity = $total_buy_quantity - $total_sale_quantity @endphp
                            @php $total_value = $total_buy_value - $total_sale_value @endphp
                            @php $unfree_qunantity = $abn_date_quantity - $z_date_quantity @endphp

                            <td>{{$my_number_format->money_format($total_quantity + $m_lock)}}</td>
                            <td>{{$my_number_format->money_format($total_quantity - $unfree_qunantity)}}</td>
                            <td>{{$my_number_format->money_format($m_lock)}}</td>
                            <td>{{$my_number_format->money_format((float)($total_value/$total_quantity))}}</td>
                            <td>{{$my_number_format->money_format($total_value)}}</td>
                            <td>{{$my_number_format->money_format($job_xmls[$key][0]->get_dse->close)}}</td>
                            <td>{{$my_number_format->money_format($market_value = $job_xmls[$key][0]->get_dse->close*$total_quantity)}}</td>
                            <td>{{$my_number_format->money_format($profit_loss = ($job_xmls[$key][0]->get_dse->close*$total_quantity)-$total_value)}}</td>
                            <td>{{$my_number_format->money_format($pl_percentage = round(($profit_loss*100)/$total_value, 2))}}</td>
                            <td>{{$job_xmls[$key][0]['get_pe_ratio']->ratio}}</td>
                        </tr>
                        @php $m_sub_total_cost += $total_value @endphp
                        @php $m_market_value += $market_value @endphp
                        @php $m_profit_loss += $profit_loss @endphp
                    @endif
                @endforeach
                <tr style="font-weight: bold">
                    <td colspan="2">Sub-total</td>
                    <td colspan="5" style="text-align: right">{{$my_number_format->money_format($m_sub_total_cost)}}</td>
                    <td colspan="2" style="text-align: right">{{$my_number_format->money_format($m_market_value)}}</td>
                    <td>{{$my_number_format->money_format($m_profit_loss)}}</td>
                    <td colspan="2"></td>
                </tr>
                <td colspan="12" style="font-weight: bold; padding-left: 5px; text-align: left">Non-Marginable</td>
                @php
                    $i = 1;
                    $nm_sub_total_cost = 0;
                    $nm_market_value = 0;
                    $nm_profit_loss = 0;
                    $nm_lock = 0;
                @endphp
                @foreach($job_xmls as $key => $jx)
                    @php
                        if(isset($job_xmls[$key][0]['get_pe_ratio']->ratio)){
                                $ration = $job_xmls[$key][0]['get_pe_ratio']->ratio;
                            }else{
                                $ration = 0;
                            }

                    @endphp
                    @if($ration > 40 || $ration == 0)
                        @php
                            $bonus_receivable = \App\admin\BonusReceivable::where('security_code', $key)->where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('amount');
                            $bonus = \App\admin\Bonus::where('security_code', $key)->where('bo_id', auth()->user()->dse_bo_id)->whereBetween('date', [$from_date, $to_date])->sum('amount');
                            $nm_lock = $bonus_receivable - $bonus;
                        @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$key}}</td>
                            @php
                                $total_buy_quantity = 0;
                                $total_sale_quantity = 0;
                                $total_buy_value = 0;
                                $total_sale_value = 0;
                                $total_quantity = 0;
                                $total_value = 0;

                                $abn_date_quantity = 0;
                                $z_date_quantity = 0;
                                $unfree_qunantity = 0;
                            @endphp
                            @foreach ($job_xmls[$key] as $data)
                                @if($data->side == 'B')
                                    @php    $total_buy_quantity += (integer) $data->quantity @endphp
                                    @php    $total_buy_value += (integer) $data->value @endphp
                                @else
                                    @php    $total_sale_quantity += (integer) $data->quantity @endphp
                                    @php    $total_sale_value += (integer) $data->value @endphp
                                @endif
                                @if($data->category == 'A' || $data->category == 'B' || $data->category == 'N')
                                    @if($data->date > $abn_date || $data->date == $to_date)
                                        @php $abn_date_quantity += $data->quantity  @endphp
                                    @endif
                                @else
                                    @if($data->date > $z_date || $data->date == $to_date)
                                        @php $z_date_quantity += $data->quantity  @endphp
                                    @endif
                                @endif

                            @endforeach
                            @php $total_quantity = $total_buy_quantity - $total_sale_quantity @endphp
                            @php $total_value = $total_buy_value - $total_sale_value @endphp
                            @php $unfree_qunantity = $abn_date_quantity - $z_date_quantity @endphp

                            <td>{{$my_number_format->money_format($total_quantity + $nm_lock)}}</td>
                            <td>{{$my_number_format->money_format($total_quantity - $unfree_qunantity)}}</td>
                            <td>{{$my_number_format->money_format($nm_lock)}}</td>
                            <td>{{$my_number_format->money_format((float)($total_value/$total_quantity))}}</td>
                            <td>{{$my_number_format->money_format($total_value)}}</td>
                            @php
                                if(isset($job_xmls[$key][0]->get_dse->close)){
                                        $close = $job_xmls[$key][0]->get_dse->close;
                                    }else{
                                            $close = 0;
                                    }
                                @endphp

                            <td>{{$my_number_format->money_format($close)}}</td>
                            <td>{{$my_number_format->money_format($market_value = $close*$total_quantity)}}</td>
                            <td>{{$my_number_format->money_format($profit_loss = ($close*$total_quantity)-$total_value)}}</td>
                            <td>{{$my_number_format->money_format($pl_percentage =  round(($profit_loss*100)/$total_value, 2))}}</td>
                            <td>{{$my_number_format->money_format($ration)}}</td>
                        </tr>
                        @php $nm_sub_total_cost += $total_value @endphp
                        @php $nm_market_value += $market_value @endphp
                        @php $nm_profit_loss += $profit_loss @endphp
                    @endif
                @endforeach
                <tr style="font-weight: bold">
                    <td colspan="2">Sub-total</td>
                    <td colspan="5" style="text-align: right">{{$my_number_format->money_format($nm_sub_total_cost)}}</td>
                    <td colspan="2" style="text-align: right">{{$my_number_format->money_format($nm_market_value)}}</td>
                    <td>{{$my_number_format->money_format($nm_profit_loss)}}</td>
                    <td colspan="2"></td>
                </tr>
                <tr style="font-weight: bold">
                    <td colspan="2">Grand-total</td>
                    <td colspan="5" style="text-align: right">{{$my_number_format->money_format($nm_sub_total_cost + $m_sub_total_cost)}}</td>
                    <td colspan="2" style="text-align: right">{{$my_number_format->money_format($nm_market_value + $m_market_value)}}</td>
                    <td>{{$my_number_format->money_format($nm_profit_loss + $m_profit_loss)}}</td>
                    <td colspan="2"></td>
                </tr>
                </tbody>
            </table>

            <div style="width: 100%; display: flex">
                <div style="width: 30%; margin-top: -1rem">
                    <div style="width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Matured Fund</p>
                        </div>
                        <div style="width: 40%;">
                            <p style="text-align: right;">{{$my_number_format->money_format($balance['mature_balance'])}}</p>
                        </div>
                    </div>
                    <div style="width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Receivable</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right;">{{$my_number_format->money_format($balance['ledger_balance'] - $balance['mature_balance'])}}</p>
                        </div>
                    </div>
                    <div style="border-bottom: 1px solid black; width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Ledger Balance</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right;">{{$my_number_format->money_format($balance['ledger_balance'])}}</p>
                        </div>
                    </div>
                    <div style="font-weight: bold; width: 100%; display: flex; margin-top: 5px ">
                        <div style="width: 60%">
                            <p style="text-decoration: underline;">Fund Satus</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right;"></p>
                        </div>
                    </div>


                    {{--        Total Deposit            --}}

                    <div style="width: 100%; display: flex;">
                        <div style="width: 60%">
                            <p>Deposit</p>
                        </div>
                        <div style="width: 40%">
                            <p class="align-text-right">{{$my_number_format->money_format($diposites)}}</p>
                        </div>
                    </div>
                    <div style="width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Security Deposit</p>
                        </div>
                        <div style="width: 40%">
                            <p class="align-text-right">N/A</p>
                        </div>
                    </div>
                    <div style="width: 100%; display: flex; border-bottom: 1px solid black">
                        <div style="width: 60%">
                            <p>Realised Gain/(Loss)</p>
                        </div>
                        <div style="width: 40%">
                            <p class="align-text-right">{{$my_number_format->money_format($realised_gain_loss)}}</p>
                        </div>
                    </div>
                    <div style="font-weight: bold; width: 100%; display: flex; margin-top: 5px">
                        <div style="width: 60%">
                            <p style="text-decoration: underline;">Total Deposit</p>
                        </div>
                        <div style="width: 40%">
                            <p class="align-text-right">{{$my_number_format->money_format($realised_gain_loss + $diposites)}}</p>
                        </div>
                    </div>

                    {{--        Total Withdraw            --}}

                    <div style="display: flex; width: 100%">
                        <div style="width: 60%">
                            <p>Withdraw</p>
                        </div>
                        <div style="width: 40%">
                            <p class="align-text-right">{{$my_number_format->money_format($withdraws)}}</p>
                        </div>
                    </div>
                    <div style="width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Security Withdraw</p>
                        </div>
                        <div style="width: 40%">
                            <p class="align-text-right">N/A</p>
                        </div>
                    </div>
                    <div style="border-bottom: 1px solid black; width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Charges & Fees</p>
                        </div>
                        <div style="width: 40%">
                            <p class="align-text-right">{{$my_number_format->money_format($charge)}}</p>
                        </div>
                    </div>
                    <div style="font-weight: bold; width: 100%; display: flex; margin-top: 5px">
                        <div style="width: 60%">
                            <p style="text-decoration: underline;">Total Withdraw</p>
                        </div>
                        <div style="width: 40%">
                            <p class="align-text-right">{{$my_number_format->money_format($charge+$withdraws)}}</p>
                        </div>
                    </div>
                </div>
                <div style="width: 20%"></div>
                <div style="width: 50%; margin-top: -1rem">
                    <div style="width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Market Value of Security</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format($nm_market_value + $m_market_value)}}</p>
                        </div>
                    </div>

                    <div style="font-weight: bold; width: 100%; display: flex;">
                        <div style="width: 60%">
                            <p>Equity (ALl Instrument)</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format(($nm_market_value + $m_market_value) - ($balance['ledger_balance'] + $accrued_charge))}}</p>
                        </div>
                    </div>

                    <div style="font-weight: bold; border-bottom: 1px solid black; width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Equity (Marginable Instrument)</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format(($m_market_value) - ($balance['ledger_balance'] + $accrued_charge))}}</p>
                        </div>
                    </div>

                    <div style="font-weight: bold; width: 100%; display: flex;">
                        <div style="width: 60%">
                            <p style="text-decoration: underline; margin-top: 5px">Capital Gain/(Loss)</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right"></p>
                        </div>
                    </div>


                    {{--            Total Capital Gain/ Loss            --}}

                    <div style="width: 100%; display: flex;">
                        <div style="width: 60%">
                            <p>Realised</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format($realised_gain_loss)}}</p>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid black; width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Un Realised</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format($nm_profit_loss + $m_profit_loss)}}</p>
                        </div>
                    </div>

                    <div style="font-weight: bold; width: 100%; display: flex">
                        <div style="width: 60%">
                            <p style="text-decoration: underline; margin-top: 5px">Total Capital Gain/(Loss)</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format(($nm_profit_loss + $m_profit_loss) + $realised_gain_loss)}}</p>
                        </div>
                    </div>

                    {{--            Purchase Power            --}}

                    <div style="width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Accrued Charges</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format($accrued_charge)}}</p>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid black; width: 100%; display: flex">
                        <div  style="width: 60%">
                            <p>Maximum Margin Limit</p>
                        </div>
                        <div  style="width: 40%">
                            <p class="align-text-right">{{$my_number_format->money_format($margin_loan)}}</p>
                        </div>
                    </div>

                    <div style="font-weight: bold; width: 100%; display: flex">
                        <div style="width: 60%">
                            <p style="text-decoration: underline; margin-top: 5px">Power Purchased</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format($margin_loan - $accrued_charge - $balance['ledger_balance'] )}}</p>
                        </div>
                    </div>

                    {{--            Debt Equity Ratio            --}}

                    <div style="width: 100%; display: flex">
                        <div style="width: 70%">
                            <p>Marin Ratio (used) Marginable Instrument</p>
                        </div>
                        <div  style="width: 30%">
                            <p class="align-text-right">{{$my_number_format->money_format($balance['ledger_balance']/($m_market_value == 0 ? 1 : $m_market_value ))}}</p>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid black; width: 100%; display: flex">
                        <div style="width: 60%">
                            <p>Margin Ratio(used)All Instrument</p>
                        </div>
                        @php
                        $m_and_nm_market_value = $m_market_value + $nm_market_value;
                            if($m_and_nm_market_value == 0){
                                $m_and_nm_market_value = 1;
                            }
                        @endphp
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format($balance['ledger_balance']/$m_and_nm_market_value)}}</p>
                        </div>
                    </div>

                    <div style="font-weight: bold; width: 100%; display: flex">
                        <div style="width: 60%">
                            <p style="text-decoration: underline; margin-top: 5px">Debut Equity Ratio</p>
                        </div>
                        <div style="width: 40%">
                            <p style="text-align: right">{{$my_number_format->money_format($balance['ledger_balance']/ ($m_market_value - ($balance['ledger_balance'] + $accrued_charge)))}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endif
    </div>

    <script>flatpickr(".datepicker", {});</script>
    <script>

        function clientPortfolio(portfolioPrint) {
            var printContents = document.getElementById(portfolioPrint).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

@endsection
