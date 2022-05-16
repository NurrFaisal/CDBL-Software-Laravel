@extends('frontEnd.client-dashboard')
@section('title') Client Ledger @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Client Ledger </h1>

        <div  class="user-profile-details" style="padding: 1rem">
            <form action="{{URL::to('/client/client-ledger-view')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <label class="form-control" id="fromDate">From Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" @error('fromDate') is-invalid-input @enderror value="{{old('fromDate')}}" for="fromDate" name="fromDate"/>
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
                                <div class="col-md-4">
                                    <label class="form-control" id="toDate">To Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" value="{{old('toDate')}}" for="todate" name="toDate"/>
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
                            <button type="submit" onclick="event.preventDefault()" name="btn" value="0" class="btn btn-primary">Print</button>
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
                    <h2>{{$user_info->get_bo_account_info->user_name}}</h2>
                    <h2>{{$user_info->fathers_name}}</h2>
                    <h2>{{$user_info->mothers_name}}</h2>
                    <h2>{{$user_info->present_address}}</h2>
                </div>
            </div>
        </div>

        <div class="user-profile-details" style="margin-top: 3rem">
            <div>
                <h1 class="transition-period">Transaction Period : <span>From <i>{{$fromDate}}</i> To <i>{{$toDate}}</i></span></h1>
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
                    <td>{{$transaction->debit}}</td>
                    <td>{{$transaction->credit}}</td>
                    @php
                        $balance = $balance + $transaction->debit;
                        $balance = $balance - $transaction->credit;
                    @endphp
                    <td>{{$balance}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

