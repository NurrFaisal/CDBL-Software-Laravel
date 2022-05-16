@extends('frontEnd.client-dashboard')
@section('title') Applied IPO Information @endsection
@section('mainContent')

    <div class="bo-container">
        <h1 class="profile-heading">Applied IPO information</h1>
        @include('frontEnd.includes.balance-info')

        <div class="user-profile-details">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">IPO Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">MR No</th>
                    <th scope="col">AC Type</th>
                    <th scope="col">RCV Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">IPO Result</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($ipo_requests as $ipo_request)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$ipo_request->ipo->company_name}}</td>
                    <td>{{$ipo_request->ipo->ipo_name}}</td>
                    <td>{{$ipo_request->ipo->start_date}}</td>
                    <td>{{$ipo_request->ipo->end_date}}</td>
                    <td>{{$ipo_request->ipo->mr_no}}</td>
                    <td>{{$ipo_request->ipo->ac_type}}</td>
                    <td>{{$ipo_request->ipo->rcv_type}}</td>
                    <td>{{$ipo_request->total_price}}</td>
                    @if($ipo_request->status == 0)
                        <td class="btn-info">Pending</td>
                    @elseif($ipo_request->status == 1)
                        <td class="btn-success">Success</td>
                    @else
                        <td class="btn-danger">Unsuccessful</td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{$ipo_requests->links()}}
        </div>
    </div>

@endsection
