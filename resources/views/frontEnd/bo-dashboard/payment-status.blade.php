@extends('frontEnd.bo-dashboard')
@section('title') Payment Status @endsection
@section('mainContent')

    <div class="bo-container">
        <h1 class="profile-heading">Your Payment Status</h1>

        <div class="user-profile-details">
            <h1 class="profile-heading" style="border-bottom: 2px solid #fff">Status of Your Payment</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Payment ID</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Pay Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Approved</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($bo_payment))
                <tr>
                    <td>{{$bo_payment->id}}</td>
                    <td>{{$bo_payment->amount}}</td>
                    <td>{{$bo_payment->transaction_id}}</td>
                    <td>{{$bo_payment->created_at->format('d-m-Y')}}</td>
                    <td>{{$bo_payment->status == 1 ? 'Paid' : 'Unpaid'}}</td>
                    <td>{{$bo_payment->approved == 1 ? 'Approved' : 'Pending'}}</td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
