@extends('frontEnd.client-dashboard')
@section('title') Sell Share @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Sell Share</h1>
        @include('frontEnd.includes.balance-info')

        <div class="user-profile-details">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Share Name</th>
                    <th scope="col">Purchase Qty</th>
                    <th scope="col">Sell Qty</th>
                    <th scope="col">Available Qty</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($client_shares as $client_shares)
                    <tr>
                        <td>{{$client_shares->share->name}}</td>
                        <td>{{$client_shares->purchase_qty}}</td>
                        <td>{{$client_shares->sell_qty}}</td>
                        <td>{{$client_shares->available_qty}}</td>
                        <td><a href="{{URL::to('/client/selling-share/'.$client_shares->id)}}" class="btn btn-success">SELL</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
