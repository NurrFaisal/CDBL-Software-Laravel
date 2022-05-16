@extends('frontEnd.client-dashboard')
@section('title') Share Request List @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Share Request List</h1>
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
                    @foreach($shares as $share)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$share->share->name}}</td>
                            <td>{{$share->qty}}</td>
                            <td>{{$share->price}}</td>
                            <td>{{$share->total_price}}</td>
                            <td>{{$share->total_price_with_commission}}</td>
                            <td>{{$share->status == 1 ? 'Approved' : 'Pending'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
