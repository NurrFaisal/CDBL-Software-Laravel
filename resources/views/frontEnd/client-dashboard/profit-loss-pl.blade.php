@extends('frontEnd.client-dashboard')
@section('title') Profit Loss PL @endsection
@section('mainContent')
    @php
        $my_number_format = new \App\Http\Controllers\MyNumberFormat();
    @endphp
    <style>
        th, td{
            white-space: nowrap;
            border: 1px solid black !important;
            vertical-align: middle !important;
        }
    </style>
    <div class="bo-container">
        <h1 class="profile-heading">Profit Loss Details </h1>

{{--        <h3 class="profile-heading">IPO Shares : <span style="margin-left: 18%">Bonus Shares : </span> <span style="float: right">Right Shares : </span></h3>--}}

        <div  class="user-profile-details" style="padding: 1rem">
            <form action="{{URL::to('/client/profit-loss-pl')}}" method="post">
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
                    <th rowspan=2>SL</th>
                    <th rowspan=2>Instrument</th>
                    <th rowspan=2>Bought Qty</th>
                    <th rowspan=2>Bought Cost</th>
                    <th rowspan=2>Sold Qty.</th>
                    <th rowspan=2>Sold Cost</th>
                    <th rowspan=2>Realised Gain</th>
                    <th colspan="3" style="text-align: center">Balance</th>
                    <th rowspan=2>Market Rate</th>
                    <th rowspan=2>Market Amounnt</th>
                    <th rowspan=2>Unrealised Gain</th>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                    $total_buy_cost = 0;
                    $total_sale_cost = 0;
                    $total_realised_gain = 0;
                    $total_balance_amt = 0;
                    $total_market_amt = 0;
                    $total_unlealised_gain = 0;
                @endphp
                @foreach($job_xmls as $key => $jx)
                <tr class="align-text-right">
                    <td>{{$i++}}</td>
                    <td>{{$key}}</td>

                    @php
                        $buy_qty = 0;
                        $buy_cost = 0;
                        $sale_qty = 0;
                        $sale_cost = 0;
                        $buy_rate = 0;
                        $sale_rate = 0;
                        $gain_rate = 0;
                        $market_rate = 0;
                    @endphp
                    @foreach ($job_xmls[$key] as $data)
                        @if($data->side == 'B')
                        @php    $buy_qty += (integer) $data->quantity @endphp
                        @php    $buy_cost += (integer) $data->value @endphp
                        @else
                            @php    $sale_qty += (integer) $data->quantity @endphp
                            @php    $sale_cost += (integer) $data->value @endphp
                            @php    $market_rate =  $data->get_dse->close @endphp
                        @endif

                    @endforeach

                    @if($buy_qty == 0)
                        @php $buy_qty_d = 1 @endphp
                    @else
                        @php $buy_qty_d = $buy_qty @endphp
                    @endif

                    @if($sale_qty == 0)
                        @php $sale_qty_d = 1 @endphp
                    @else
                        @php $sale_qty_d = $sale_qty @endphp
                    @endif
                    @php
                    $buy_rate = $buy_cost/$buy_qty_d;
                    $sale_rate = $sale_cost/$sale_qty_d;
                    $gain_rate = $buy_rate - $sale_rate;
                    @endphp

                    <td>{{$my_number_format->money_format($buy_qty)}}</td>
                    <td>{{$my_number_format->money_format($buy_cost)}}</td>
                    <td>{{$my_number_format->money_format($sale_qty)}}</td>
                    <td>{{$my_number_format->money_format($sale_cost)}}</td>
                    <td>{{$my_number_format->money_format($realised_gain = $gain_rate * $sale_qty)}}</td>
                    <td>{{$my_number_format->money_format($balance_qty = $buy_qty - $sale_qty)}}</td>
                    <td>{{$my_number_format->money_format($buy_rate)}}</td>
                    <td>{{$my_number_format->money_format($balance_amt =  $balance_qty * ($buy_rate == 0 ? 1 : $buy_rate))}}</td>
                    <td>{{$my_number_format->money_format($market_rate)}}</td>
                    <td>{{$my_number_format->money_format($market_amt = $balance_qty*$market_rate)}}</td>
                    <td>{{$my_number_format->money_format($unlealised_gain = $market_amt - $balance_amt)}}</td>
                </tr>
                    @php
                        $total_buy_cost +=$buy_cost;
                        $total_sale_cost +=$sale_cost;
                        $total_realised_gain +=$realised_gain;
                        $total_balance_amt +=$balance_amt;
                        $total_market_amt +=$market_amt;
                        $total_unlealised_gain +=$unlealised_gain;
                    @endphp
                @endforeach
                <tr style="text-align: right">
                    <td style="border: 1px solid black" colspan="4">{{$my_number_format->money_format($total_buy_cost)}}</td>
                    <td style="border: 1px solid black" colspan="2">{{$my_number_format->money_format($total_sale_cost)}}</td>
                    <td style="border: 1px solid black">{{$my_number_format->money_format($total_realised_gain)}}</td>
                    <td style="border: 1px solid black" colspan="3">{{$my_number_format->money_format($total_balance_amt)}}</td>
                    <td style="border: 1px solid black" colspan="2">{{$my_number_format->money_format($total_market_amt)}}</td>
                    <td style="border: 1px solid black">{{$my_number_format->money_format($total_unlealised_gain)}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 900px; display: flex; justify-content: center">
            <div style="justify-content: center; border: 1px solid; width: 60%; margin-top: 2rem">
                <ul style="padding: 15px">
                    <li>Ledger Balance<span style="float: right">{{$my_number_format->money_format($ledger_balance_current)}}</span></li>
                    <li>Portfolio Value Market Price<span style="float: right">{{$my_number_format->money_format($total_market_amt)}}</span></li>
                    <li>Portfolio Value Cost Price<span style="float: right">{{$my_number_format->money_format($total_balance_amt)}}</span></li>
                    <li>Deposit<span style="float: right">{{$my_number_format->money_format($payment)}}</span></li>
                    <li>Withdraw Amount<span style="float: right">{{$my_number_format->money_format($received)}}</span></li>
                    <li>Charges<span style="float: right">0.00</span></li>
                    <li>New Deposit<span style="float: right">0.00</span></li>
                    <li style="margin-top: 10px"><b>Realised Capital Gain/Loss<span style="float: right">{{$my_number_format->money_format($total_realised_gain)}}</span></b></li>
                </ul>
            </div>
        </div>
        <div style="text-align: right">
            <button class="form-submit-btn" style="margin-right: 0" type="submit" onclick="profitLossPrint('profitLoss')">Print</button>
        </div>

        <div class="user-profile-details" id="profitLoss" style="overflow: auto; display: none">
            <style type="text/css" media="print">
                @page { size: landscape; }
            </style>
            <div class="row" style="display: flex; width: 100%">
                <div class="col-md-7" style="width: 100%">
                    <label>Print Date : <?php  echo date("Y-m-d "); ?> <span style="margin-left: 15px"><?php  echo date("h:i:sa"); ?></span></label>
                    <h1 style="text-decoration: underline; font-size: 1.7rem; font-weight: 700; ">AL-HAJ SECURITY & STOCKS LTD</h1>
                    <p>TREC # 093, Room #306, DSE Building, Ph : 9576120, 9576121, 01733-080401, 01733-080418 </p>
                    <p>Tel : 9576120, 95762121</p>
                    <h1 style="font-size: 1.4rem; font-weight: 700; margin-top: 5px">Transaction Period {{$from_date}} to {{$to_date}} </h1>
                </div>
            </div>
            <h1 style="font-size: 1.4rem; font-weight: 700; text-align: center; width: 100% ">TO WHOM IT MAY CONCERN</h1>
            <div style="width: 100%; display: flex">
                <div style="width: 60%">
                    <div style="width: 100%; display: flex">
                        <div style="width: 40%">
                            <p>Account Holder Name :</p>
                            <p>Account No :</p>
                            <p>Address :</p>
                        </div>
                        <div style="width: 60%">
                            <p> Name : {{$user_info->name}}</p>
                            <p>{{$user_info->get_bo_account_info->bank_ac}}<span style="padding-left: 30px">BOID: <span style="padding-left: 20px">{{$user_info->dse_bo_id}}</span></span></p>
                            <p>{{$user_info->present_address}}</p>
                        </div>
                    </div>
                </div>
                <div style="width: 40%">
                    <div style="width: 100%; display: flex">
                        <div style="width: 50%">
                            <p>Father's Name :</p>
                            <p>Mother's Name :</p>
                        </div>
                        <div style="width: 50%">
                            <p>{{$user_info->fathers_name}}</p>
                            <p>{{$user_info->mothers_name}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr style="white-space: nowrap;">
                    <th rowspan=2 style="border: 1px solid black">SL</th>
                    <th rowspan=2 style="border: 1px solid black">Instrument</th>
                    <th rowspan=2 style="border: 1px solid black">Bought Qty</th>
                    <th rowspan=2 style="border: 1px solid black">Bought Cost</th>
                    <th rowspan=2 style="border: 1px solid black">Sold Qty.</th>
                    <th rowspan=2 style="border: 1px solid black">Sold Cost</th>
                    <th rowspan=2 style="border: 1px solid black">Realised Gain</th>
                    <th colspan="3" style="text-align: center; border: 1px solid black">Balance</th>
                    <th rowspan=2 style="border: 1px solid black">Market Rate</th>
                    <th rowspan=2 style="border: 1px solid black">Market Amounnt</th>
                    <th rowspan=2 style="border: 1px solid black">Unrealised Gain</th>
                </tr>
                <tr>
                    <th style="border: 1px solid black">Quantity</th>
                    <th style="border: 1px solid black">Rate</th>
                    <th style="border: 1px solid black">Amount</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                    $total_buy_cost = 0;
                    $total_sale_cost = 0;
                    $total_realised_gain = 0;
                    $total_balance_amt = 0;
                    $total_market_amt = 0;
                    $total_unlealised_gain = 0;
                @endphp
                @foreach($job_xmls as $key => $jx)
                    <tr class="align-text-right">
                        <td>{{$i++}}</td>
                        <td>{{$key}}</td>

                        @php
                            $buy_qty = 0;
                            $buy_cost = 0;
                            $sale_qty = 0;
                            $sale_cost = 0;
                            $buy_rate = 0;
                            $sale_rate = 0;
                            $gain_rate = 0;
                            $market_rate = 0;
                        @endphp
                        @foreach ($job_xmls[$key] as $data)
                            @if($data->side == 'B')
                                @php    $buy_qty += (integer) $data->quantity @endphp
                                @php    $buy_cost += (integer) $data->value @endphp
                            @else
                                @php    $sale_qty += (integer) $data->quantity @endphp
                                @php    $sale_cost += (integer) $data->value @endphp
                                @php    $market_rate =  $data->get_dse->close @endphp
                            @endif

                        @endforeach

                        @if($buy_qty == 0)
                            @php $buy_qty_d = 1 @endphp
                        @else
                            @php $buy_qty_d = $buy_qty @endphp
                        @endif

                        @if($sale_qty == 0)
                            @php $sale_qty_d = 1 @endphp
                        @else
                            @php $sale_qty_d = $sale_qty @endphp
                        @endif
                        @php
                            $buy_rate = $buy_cost/$buy_qty_d;
                            $sale_rate = $sale_cost/$sale_qty_d;
                            $gain_rate = $buy_rate - $sale_rate;
                        @endphp

                        <td>{{$my_number_format->money_format($buy_qty)}}</td>
                        <td>{{$my_number_format->money_format($buy_cost)}}</td>
                        <td>{{$my_number_format->money_format($sale_qty)}}</td>
                        <td>{{$my_number_format->money_format($sale_cost)}}</td>
                        <td>{{$my_number_format->money_format($realised_gain = $gain_rate * $sale_qty)}}</td>
                        <td>{{$my_number_format->money_format($balance_qty = $buy_qty - $sale_qty)}}</td>
                        <td>{{$my_number_format->money_format($buy_rate)}}</td>
                        <td>{{$my_number_format->money_format($balance_amt =  $balance_qty * ($buy_rate == 0 ? 1 : $buy_rate))}}</td>
                        <td>{{$my_number_format->money_format($market_rate)}}</td>
                        <td>{{$my_number_format->money_format($market_amt = $balance_qty*$market_rate)}}</td>
                        <td>{{$my_number_format->money_format($unlealised_gain = $market_amt - $balance_amt)}}</td>
                    </tr>
                    @php
                        $total_buy_cost +=$buy_cost;
                        $total_sale_cost +=$sale_cost;
                        $total_realised_gain +=$realised_gain;
                        $total_balance_amt +=$balance_amt;
                        $total_market_amt +=$market_amt;
                        $total_unlealised_gain +=$unlealised_gain;
                    @endphp
                @endforeach
                <tr style="text-align: right">
                    <td style="border: 1px solid black" colspan="4">{{$my_number_format->money_format($total_buy_cost)}}</td>
                    <td style="border: 1px solid black" colspan="2">{{$my_number_format->money_format($total_sale_cost)}}</td>
                    <td style="border: 1px solid black">{{$my_number_format->money_format($total_realised_gain)}}</td>
                    <td style="border: 1px solid black" colspan="3">{{$my_number_format->money_format($total_balance_amt)}}</td>
                    <td style="border: 1px solid black" colspan="2">{{$my_number_format->money_format($total_market_amt)}}</td>
                    <td style="border: 1px solid black">{{$my_number_format->money_format($total_unlealised_gain)}}</td>
                </tr>
                </tbody>
            </table>
            <div style="width: 900px; display: flex; justify-content: center">
                <div style="justify-content: center; border: 1px solid; width: 60%; margin-top: 2rem">
                    <ul style="padding: 15px">
                        <li>Ledger Balance<span style="float: right">{{$my_number_format->money_format($ledger_balance_current)}}</span></li>
                        <li>Portfolio Value Market Price<span style="float: right">{{$my_number_format->money_format($total_market_amt)}}</span></li>
                        <li>Portfolio Value Cost Price<span style="float: right">{{$my_number_format->money_format($total_balance_amt)}}</span></li>
                        <li>Deposit<span style="float: right">{{$my_number_format->money_format($payment)}}</span></li>
                        <li>Withdraw Amount<span style="float: right">{{$my_number_format->money_format($received)}}</span></li>
                        <li>Charges<span style="float: right">0.00</span></li>
                        <li>New Deposit<span style="float: right">0.00</span></li>
                        <li style="margin-top: 10px"><b>Realised Capital Gain/Loss<span style="float: right">{{$my_number_format->money_format($total_realised_gain)}}</span></b></li>
                    </ul>
                </div>
            </div>
        </div>
            @endif
    </div>

    <script>flatpickr(".datepicker", {});</script>
    <script>
        function profitLossPrint(profitLoss) {
            var printContents = document.getElementById(profitLoss).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

@endsection
