@extends('frontEnd.client-dashboard')
@section('title') Client Dashboard @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Pending Deposit List</h1>
            @include('frontEnd.includes.balance-info')
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="user-profile-details">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Payment Type</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($deposits as $deposit)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$deposit->payment_type}}</td>
                            <td>{{$deposit->amount}}</td>
                            @if($deposit->bank_attachment != null)
                                <td><img width="40px" id="bank_slip" src="{{asset('public/'.$deposit->bank_attachment)}}"/></td>
                            @elseif($deposit->beftn_attachment != Null)
                                <td><img width="40px" id="bank_slip" src="{{asset('public/'.$deposit->beftn_attachment)}}"/></td>
                            @else
                            <td><img width="40px" id="bank_slip" src="../public/images/no_image.png"/></td>
                            @endif
                            <td>{{$deposit->status == 1 ? 'Approved' : 'Pending'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="text-align: center;">
                {{$deposits->links()}}
            </div>
        </div>
    </div>


@endsection
