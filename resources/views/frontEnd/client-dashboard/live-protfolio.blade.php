@extends('frontEnd.client-dashboard')
@section('title') Live Protfolio @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Live Portfolio</h1>
        @include('frontEnd.includes.balance-info')

        <div class="user-profile-details">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Total Buy Cost</th>
                    <th scope="col">Matured Balance</th>
                    <th scope="col">Sale Reciveable</th>
                    <th scope="col">Ledger Balance</th>
                    <th scope="col">Accrued Charges</th>
                    <th scope="col">Charges & Fees</th>
                    <th scope="col">Market Value</th>
                    <th scope="col">Equity(All Instrument)</th>
                    <th scope="col">Realised Gain/Loss </th>
                    <th scope="col">Un Realised Capital gain/loss </th>
                    <th scope="col"><b>Total Capital Gain/Loss</b></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection
