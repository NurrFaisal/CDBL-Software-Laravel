@extends('frontEnd.client-dashboard')
@section('title') Share Sell Request List @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Share Sell Request List</h1>
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
                        <th scope="col">Share Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Total Price [With Commission]</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($share_sell_requests as $share_sell_request)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$share_sell_request->share->name}}</td>
                            <td>{{$share_sell_request->sell_qty}}</td>
                            <td>{{$share_sell_request->sell_price}}</td>
                            <td>{{$share_sell_request->sell_total_price}}</td>
                            <td>{{$share_sell_request->sell_total_price_with_commission}}</td>
                            <td>{{$share_sell_request->status == 1 ? 'Approved' : 'Pending'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="text-align: center;">
                {{$share_sell_requests->links()}}
            </div>
        </div>
    </div>


@endsection
