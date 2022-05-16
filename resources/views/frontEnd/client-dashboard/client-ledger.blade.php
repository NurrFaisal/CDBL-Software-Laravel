@extends('frontEnd.client-dashboard')
@section('title') Client Ledger @endsection
@section('mainContent')
    @php
        $my_number_format = new \App\Http\Controllers\MyNumberFormat();
    @endphp

    <div class="bo-container">
        <h1 class="profile-heading">Client Ledger </h1>

        <div  class="user-profile-details" style="padding: 1rem">
            <form action="{{URL::to('/client/client-ledger')}}" method="post">
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
                            <button  onclick="clientLedger('clientLedger')"  class="btn btn-primary">Print</button>
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

        <div class="user-profile-details" style="margin-top: 3rem">
            <div>
                <h1 class="transition-period">Transaction Period : <span>From <i>{{isset($from_date) ? $from_date : '0000-00-00'}}</i> To <i>{{isset($to_date) ? $to_date : '0000-00-00'}}</i></span></h1>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Date</th>
                    <th scope="col">Voucher No</th>
                    <th scope="col">Type</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Credit</th>
                    <th scope="col">Balance</th>
                </tr>
                </thead>
                @if(isset($pre_balance))
                <tbody>
                @php
                    $i = 1;
                    $balance = $pre_balance;
                @endphp
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$transaction->trans_date}}</td>
                        <td>{{$transaction->voucher_no}}</td>
                        <td>{{$transaction->type}}</td>
                        <td>{{$transaction->narration}}</td>
                        <td>{{$my_number_format->money_format( $transaction->debit)}}</td>
                        <td>{{$my_number_format->money_format( $transaction->credit)}}</td>
                        @php
                            $balance = $balance + $transaction->debit;
                            $balance = $balance - $transaction->credit;
                        @endphp
                        <td>{{$my_number_format->money_format( $balance)}}</td>
                    </tr>
                @endforeach
                </tbody>
                    @endif
            </table>
        </div>


        <div class="user-profile-details" style="margin-top: 3rem; display: none !important;" id="clientLedger">
            <div class="row" style="display: flex; width: 100%">
                <div class="col-md-7" style="width: 70%">
                    <label>Print Date : <?php  echo date("Y-m-d "); ?> <span style="margin-left: 15px"><?php  echo date("h:i:sa"); ?></span></label>
                    <h1 style="text-decoration: underline; font-size: 1.7rem; font-weight: 700; ">AL-HAJ SECURITY & STOCKS LTD</h1>
                    <p>TREC # 093, Room #306, DSE Building, Ph : 9576120, 9576121, 01733-080401, 01733-080418 </p>
                    <p>Tel : 9576120, 95762121</p>

                    <h1 style="text-decoration: underline; font-size: 1.4rem; font-weight: 700; ">Ledger: from <b>{{isset($from_date) ? $from_date : '0000-00-00'}} to <b>{{isset($to_date) ? $to_date : '0000-00-00'}}</b></b></h1>

                    <h1 style="font-size: 1.4rem; font-weight: 700; "><span>Name</span> : {{$user_info->name}} <span style="margin-left: 20px">Account-no</span> : {{$user_info->get_bo_account_info->bank_ac}}</h1>
                    <h1 style="font-size: 1.4rem; font-weight: 700; "><span>BO-ID</span> : {{$user_info->get_bo_account_info->user_name}}</h1>

                    <p>{{$user_info->present_address}}</p>
                </div>
                <div class="col-md-5" style="width: 30%; text-align: right">
                    <label>Account Type : Cash</label>
                    <p>STATUS: Active</p>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Date</th>
                    <th scope="col">Voucher No</th>
                    <th scope="col">Type</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Credit</th>
                    <th scope="col">Balance</th>
                </tr>
                </thead>
                @if(isset($pre_balance))
                    <tbody>
                    @php
                        $i = 1;
                        $balance = $pre_balance;
                    @endphp
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$transaction->trans_date}}</td>
                            <td>{{$transaction->voucher_no}}</td>
                            <td>{{$transaction->type}}</td>
                            <td>{{$transaction->narration}}</td>
                            <td>{{$my_number_format->money_format( $transaction->debit)}}</td>
                            <td>{{$my_number_format->money_format( $transaction->credit)}}</td>
                            @php
                                $balance = $balance + $transaction->debit;
                                $balance = $balance - $transaction->credit;
                            @endphp
                            <td>{{$my_number_format->money_format( $balance)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>


    <script>flatpickr(".datepicker", {});</script>
    <script>
        function clientLedger(ledgerPrint) {
            var printContents = document.getElementById(ledgerPrint).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>


@endsection

