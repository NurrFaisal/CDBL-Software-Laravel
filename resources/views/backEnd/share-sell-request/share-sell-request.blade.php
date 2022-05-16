@extends('frontEnd.admin-dashboard')
@section('title') Share Sell Request @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Share Sell Request List</h1>
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
                        <th scope="col">Client Name</th>
                        <th scope="col">Share Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Total With Commission</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($share_sell_requests as $share_sell_request)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$share_sell_request->client->name}}</td>
                            <td>{{$share_sell_request->share->name}}</td>
                            <td>{{$share_sell_request->sell_qty}}</td>
                            <td>{{$share_sell_request->sell_price}}</td>
                            <td>{{$share_sell_request->sell_total_price}}</td>
                            <td>{{$share_sell_request->sell_total_price_with_commission}}</td>
                            <td>{{$share_sell_request->status == 0 ? 'Pending' : 'Approved'}}</td>
                            <td>
                                <a href="{{URL::to('/admin/client-share-sell-request-approved/'.$share_sell_request->id)}}" class="btn btn-success">Review</a>
                            </td>
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
