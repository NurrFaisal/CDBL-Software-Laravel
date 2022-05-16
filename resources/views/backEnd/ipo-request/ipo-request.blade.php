@extends('frontEnd.admin-dashboard')
@section('title') IPO Requests @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">IPO Request List</h1>
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
                        <th scope="col">Company Name</th>
                        <th scope="col">IPO Name</th>
                        <th scope="col">Lot Size</th>
                        <th scope="col">Price</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Apply Date</th>
                        <th scope="col">MR No</th>
                        <th scope="col">AC Type</th>
                        <th scope="col">RCV Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($ipo_requests as $ipo_request)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$ipo_request->ipo->company_name}}</td>
                        <td>{{$ipo_request->ipo->ipo_name}}</td>
                        <td>{{$ipo_request->ipo->lot_size}}</td>
                        <td>{{$ipo_request->ipo->price}}</td>
                        <td>{{$ipo_request->ipo->start_date}}</td>
                        <td>{{$ipo_request->ipo->end_date}}</td>
                        <td>{{$ipo_request->total_price}}</td>
                        <td>{{date('Y-m-d', strtotime($ipo_request->created_at))}}</td>
                        <td>{{$ipo_request->ipo->mr_no}}</td>
                        <td>{{$ipo_request->ipo->ac_type}}</td>
                        <td>{{$ipo_request->ipo->rcv_type}}</td>
                        <td>Pending</td>
                        <td>
                            <a href="{{URL::to('/admin/ipo-request-review/'.$ipo_request->id)}}" class="btn btn-success">Review</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="text-align: center;">
                {{$ipo_requests->links()}}
            </div>
        </div>
    </div>


@endsection
