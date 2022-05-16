@extends('frontEnd.admin-dashboard')
@section('title') Share Buy Request @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Share Buy Request List</h1>
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
                        <th scope="col">Current Qty</th>
                        <th scope="col">Request Qty</th>
                        <th scope="col">Share Price</th>
                        <th scope="col">Request Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Total With Commission</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($share_buy_requsts as $share_buy_requst)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$share_buy_requst->client->name}}</td>
                            <td>{{$share_buy_requst->share->name}}</td>
                            <td>{{$share_buy_requst->share->qty}}</td>
                            <td>{{$share_buy_requst->qty}}</td>
                            <td>{{$share_buy_requst->share->price}}</td>
                            <td>{{$share_buy_requst->price}}</td>
                            <td>{{$share_buy_requst->total_price}}</td>
                            <td>{{$share_buy_requst->total_price_with_commission}}</td>
                            <td>{{$share_buy_requst->status == 1 ? 'Approved' : 'Pending'}}</td>
                            <td>
                                <a href="{{URL::to('/admin/client-share-buy-request-approved/'.$share_buy_requst->id)}}" class="btn btn-success">Review</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="text-align: center;">
                {{$share_buy_requsts->links()}}
            </div>
        </div>
    </div>


@endsection
