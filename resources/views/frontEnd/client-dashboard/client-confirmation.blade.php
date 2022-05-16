@extends('frontEnd.client-dashboard')
@section('title') Client Confirmation @endsection
@section('mainContent')
    @php
        $my_number_format = new \App\Http\Controllers\MyNumberFormat();
    @endphp

    <style>
        th{
            text-align: right;
        }
        tr:nth-last-child(3){
            border-bottom: 2px solid black;
        }
        .align-text-right{
            text-align: right;
        }
        #clientConfirmation{
            display: none !important;
        }
    </style>
    <div class="bo-container">
        <h1 class="profile-heading">Client Confirmation </h1>

        <div  class="user-profile-details" style="padding: 1rem">
            <form action="{{URL::to('/client/client-confirmation')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <div class="col-md-4" style="padding: 0">
                                    <label class="form-control" id="tradeDate" style="white-space: nowrap">Trade Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control datepicker" for="tradeDate" value="{{old('fromDate')}}" name="tradeDate" placeholder="Trade Date"/>
                                    @if ($errors->has('tradeDate'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('tradeDate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-default">View</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="ledger-main-d">
            <div class="row" style="height: 100%">
                <div class="col-md-6 ledger-info-d">
                    <h2>Account Holder Name</h2>
                    <h2>Account No</h2>
                    <h2>BOID</h2>
                    <h2>Father's Name</h2>
                    <h2>Mothers's Name</h2>
                    <h2>Address</h2>
                </div>
                <div class="col-md-6">
                    <h2>{{$user_info->name}}</h2>
                    <h2>{{$user_info->get_bo_account_info->bank_ac}}</h2>
                    <h2>{{$user_info->dse_bo_id}}</h2>
                    <h2>{{$user_info->fathers_name}}</h2>
                    <h2>{{$user_info->mothers_name}}</h2>
                    <h2>{{$user_info->present_address}}</h2>
                </div>
            </div>
        </div>

        @if(isset($job_xmls))
        <div class="user-profile-details" style="margin-top: 3rem">
            <table class="table">
                <thead>
                <tr>
                    <th>Instrument</th>
                    <th>Buy Qty</th>
                    <th>Buy Rate</th>
                    <th>Buy Amt</th>
                    <th>Sale Qty</th>
                    <th>Sale Rate</th>
                    <th>Sale Amt</th>
                    <th>Bal Qty</th>
                    <th>Com(B+S)</th>
                    <th>Balance</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <b style="text-decoration: underline">DSE</b>
                    </td>
                </tr>
                @php
                    $total_buy_amt = 0;
                    $total_sale_amt = 0;
                    $total_com_buy_and_sale = 0;
                    $total_balance = 0;
                @endphp
                @foreach($job_xmls as $key => $jx)
                <tr style="text-align: right">
                    <td>{{$key}}</td>
                    @php
                        $buy_quantity = 0;
                        $buy_value = 0;
                        $sale_quantity = 0;
                        $sale_value = 0;
                        $commission = 0;
                        $balance = 0;
                    @endphp
                    @foreach ($job_xmls[$key] as $data)
                        @if($data->side == 'B')
                        @php    $buy_quantity += (integer) $data->quantity @endphp
                        @php    $buy_value += (integer) $data->value @endphp
                        @else
                            @php    $sale_quantity += (integer) $data->quantity @endphp
                            @php    $sale_value += (integer) $data->value @endphp
                        @endif
                    @endforeach
                    @if($buy_quantity == 0)
                        @php $buy_quantity_d = 1; @endphp
                    @else
                        @php $buy_quantity_d = $buy_quantity; @endphp
                    @endif
                    @if($sale_quantity == 0)
                        @php $sale_quantity_d = 1; @endphp
                    @else
                        @php $sale_quantity_d = $sale_quantity; @endphp
                    @endif


                    <td>{{$buy_quantity}}</td>
                    <td>{{$my_number_format->money_format($buy_value/$buy_quantity_d)}}</td>
                    <td>{{$my_number_format->money_format($buy_value)}}</td>
                    <td>{{$sale_quantity}}</td>
                    <td>{{$my_number_format->money_format($sale_value/$sale_quantity_d)}}</td>
                    <td>{{$my_number_format->money_format($sale_value)}}</td>
                    <td>{{$my_number_format->money_format($buy_quantity - $sale_quantity)}}</td>
                    <td>{{$my_number_format->money_format($commission = (($buy_value+$sale_value)* Auth::user()->commission)/100) }}</td>
                    <td>{{$my_number_format->money_format($balance =  $sale_value - $buy_value - ((($buy_value+$sale_value)* Auth::user()->commission)/100))}}</td>
                </tr>
                @php
                    $total_buy_amt += $buy_value;
                    $total_sale_amt += $sale_value;
                    $total_com_buy_and_sale += $commission;
                    $total_balance += $balance;
                @endphp
                @endforeach
                <tr>
                    <td><b>Sub Total</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_buy_amt)}}</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_sale_amt)}}</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_com_buy_and_sale)}}</b></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_balance)}}</b></td>
                </tr>
                <tr>
                    <td><b>Grand Total</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_buy_amt)}}</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_sale_amt)}}</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_com_buy_and_sale)}}</b></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_balance)}}</b></td>
                </tr>
                </tbody>
            </table>
            <div>
                <div class="col-md-6 p0"></div>
                <div class="col-md-6 p0">
                    <div class="col-md-8">
                        <ul>
                            <li>Ledger balance before trading</li>
                            <li>Add: Receipt</li>
                            <li>Less: Payment</li>
                            <li>Net Amount of Trading</li>
                            <li style="padding-top: 5px">Closing Balance of the day</li>
                        </ul>
                    </div>
                    <div class="col-md-4 p0 align-text-right" style="padding-right: 8px; margin-bottom: 5rem">
                        <ul>
                            <li>{{$my_number_format->money_format($ledger_pre_balance)}}</li>
                            <li>{{$my_number_format->money_format($received)}}</li>
                            <li>{{$my_number_format->money_format($payment)}}</li>
                            <li style="border-bottom: 2px solid black">{{$my_number_format->money_format($total_balance)}}</li>
                            <li style="border-bottom: 2px solid black; padding-top: 5px">{{$my_number_format->money_format(($ledger_pre_balance + $received) - ($total_balance + $payment))}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: right">
            <button class="form-submit-btn" style="margin-right: 0" type="submit" onclick="clientConfirmation('clientConfirmation')">Print</button>
        </div>

        <div class="user-profile-details" id="clientConfirmation" style="margin-top: 3rem">
            <style type="text/css" media="print">
                @page { size: landscape; }
            </style>
            <div class="row" style="display: flex; width: 100%">
                <div class="col-md-7" style="width: 100%">
                    <label>Print Date : <?php  echo date("Y-m-d "); ?> <span style="margin-left: 15px"><?php  echo date("h:i:sa"); ?></span></label>
                    <h1 style="text-decoration: underline; font-size: 1.7rem; font-weight: 700; ">AL-HAJ SECURITY & STOCKS LTD</h1>
                    <p>TREC # 093, Room #306, DSE Building, Ph : 9576120, 9576121, 01733-080401, 01733-080418 </p>
                    <p>Tel : 9576120, 95762121</p>
                </div>
                <div class="col-md-5" style="width: 50%; text-align: right">
                    <label style="border: 2px solid black; padding: 5px">Trading Date : 01 June 2021</label>
                </div>
            </div>
            <h1 style="font-size: 1.4rem; font-weight: 700; text-align: center; width: 100% ">CONFIRMATION NOTE OF SECURITY  |BUYING/SELLING|</h1>
            <h1 style="font-size: 1.4rem; font-weight: 700; margin-top: 5px">To Mrs. MANJAN AHMMED CHOWDHURY (ID : 2568) <span style="padding-left: 10px">Joint Holder : </span></h1>
            <h1 style="font-size: 1.4rem; margin-top: 5px">BOID : 4561232454896</h1>
            <i style="font-family: cursive; letter-spacing: -1px">With reference to your order as started below dated 01 june 2021, we have purchased / sold the following Instrument(s).</i>
            <table class="table">
                <thead style="border-bottom: 2px solid black">
                <tr>
                    <th style="white-space: nowrap">Instrument</th>
                    <th style="white-space: nowrap">Buy Qty</th>
                    <th style="white-space: nowrap">Buy Rate</th>
                    <th style="white-space: nowrap">Buy Amt</th>
                    <th style="white-space: nowrap">Sale Qty</th>
                    <th style="white-space: nowrap">Sale Rate</th>
                    <th style="white-space: nowrap">Sale Amt</th>
                    <th style="white-space: nowrap">Bal Qty</th>
                    <th style="white-space: nowrap">Com(B+S)</th>
                    <th style="white-space: nowrap">Balance</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <b style="text-decoration: underline">DSE</b>
                    </td>
                </tr>
                @php
                    $total_buy_amt = 0;
                    $total_sale_amt = 0;
                    $total_com_buy_and_sale = 0;
                    $total_balance = 0;
                @endphp
                @foreach($job_xmls as $key => $jx)
                    <tr style="text-align: right">
                        <td>{{$key}}</td>
                        @php
                            $buy_quantity = 0;
                            $buy_value = 0;
                            $sale_quantity = 0;
                            $sale_value = 0;
                            $commission = 0;
                            $balance = 0;
                        @endphp
                        @foreach ($job_xmls[$key] as $data)
                            @if($data->side == 'B')
                                @php    $buy_quantity += (integer) $data->quantity @endphp
                                @php    $buy_value += (integer) $data->value @endphp
                            @else
                                @php    $sale_quantity += (integer) $data->quantity @endphp
                                @php    $sale_value += (integer) $data->value @endphp
                            @endif
                        @endforeach
                        @if($buy_quantity == 0)
                            @php $buy_quantity_d = 1; @endphp
                        @else
                            @php $buy_quantity_d = $buy_quantity; @endphp
                        @endif
                        @if($sale_quantity == 0)
                            @php $sale_quantity_d = 1; @endphp
                        @else
                            @php $sale_quantity_d = $sale_quantity; @endphp
                        @endif


                        <td>{{$buy_quantity}}</td>
                        <td>{{$my_number_format->money_format($buy_value/$buy_quantity_d)}}</td>
                        <td>{{$my_number_format->money_format($buy_value)}}</td>
                        <td>{{$sale_quantity}}</td>
                        <td>{{$my_number_format->money_format($sale_value/$sale_quantity_d)}}</td>
                        <td>{{$my_number_format->money_format($sale_value)}}</td>
                        <td>{{$my_number_format->money_format($buy_quantity - $sale_quantity)}}</td>
                        <td>{{$my_number_format->money_format((($commission = $buy_value+$sale_value)* Auth::user()->commission)/100) }}</td>
                        <td>{{$my_number_format->money_format($balance = $sale_value - $buy_value - ((($buy_value+$sale_value)* Auth::user()->commission)/100))}}</td>
                    </tr>
                    @php
                        $total_buy_amt += $buy_value;
                        $total_sale_amt += $sale_value;
                        $total_com_buy_and_sale += $commission;
                        $total_balance += $balance;
                    @endphp
                @endforeach
                <tr>
                    <td><b>Sub Total</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_buy_amt)}}</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_sale_amt)}}</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_com_buy_and_sale)}}</b></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_balance)}}</b></td>
                </tr>
                <tr>
                    <td><b>Grand Total</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_buy_amt)}}</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_sale_amt)}}</b></td>
                    <td class="align-text-right"></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_com_buy_and_sale)}}</b></td>
                    <td class="align-text-right"><b>{{$my_number_format->money_format($total_balance)}}</b></td>
                </tr>
                </tbody>
            </table>
            <div class="col-md-12 p0" style="padding-bottom: 3rem">
                <div class="col-md-6 p0"></div>
                <div class="col-md-6 p0" style="display: flex; justify-content: flex-end">
                    <div class="col-md-8">
                        <ul>
                            <li>Ledger balance before trading</li>
                            <li>Add: Receipt</li>
                            <li>Less: Payment</li>
                            <li>Net Amount of Trading</li>
                            <li style="padding-top: 5px">Closing Balance of the day</li>
                        </ul>
                    </div>
                    <div class="col-md-4 p0 align-text-right" style="padding-right: 8px">
                        <ul>
                            <li>{{$my_number_format->money_format($ledger_pre_balance)}}</li>
                            <li>{{$my_number_format->money_format($received)}}</li>
                            <li>{{$my_number_format->money_format($payment)}}</li>
                            <li style="border-bottom: 2px solid black">{{$my_number_format->money_format($total_balance)}}</li>
                            <li style="border-bottom: 2px solid black; padding-top: 5px">{{$my_number_format->money_format(($ledger_pre_balance + $received) - ($total_balance + $payment))}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="width: 100%; display: flex">
                <div style="width: 50%">
                    <h1 style="border-top: 2px solid black; width: 65%; text-align: center; padding-top: 5px;">
                        Client's Signature
                    </h1>
                </div>
                <div style="width: 50%; text-align: right; display: flex; justify-content: flex-end">
                    <h1 style="border-top: 2px solid black; width: 65%; text-align: center; padding-top: 5px;">
                        Authorised Signature
                    </h1>
                </div>
            </div>
        </div>
            @endif
    </div>

    <script>flatpickr(".datepicker", {});</script>
    <script>
        function clientConfirmation(clientConfirmationPrint) {
            var printContents = document.getElementById(clientConfirmationPrint).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>


@endsection
