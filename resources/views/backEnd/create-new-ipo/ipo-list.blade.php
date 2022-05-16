@extends('frontEnd.admin-dashboard')
@section('title')IPO List @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">IPO List</h1>
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
        </div>

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
                    <th scope="col">MR No</th>
                    <th scope="col">AC Type</th>
                    <th scope="col">RCV Type</th>
                    <th scope="col">Apply From</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($ipos as $ipo)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$ipo->company_name}}</td>
                    <td>{{$ipo->ipo_name}}</td>
                    <td>{{$ipo->lot_size}}</td>
                    <td>{{$ipo->price}}</td>
                    <td>{{$ipo->start_date}}</td>
                    <td>{{$ipo->end_date}}</td>
                    <td>{{$ipo->mr_no}}</td>
                    <td>{{$ipo->ac_type}}</td>
                    <td>{{$ipo->rcv_type}}</td>
                    <td>{{$ipo->status == 1 ? 'Active' : 'Inactive'}}</td>
                    <td>
                        <a href="{{URL::to('/admin/edit-ipo/'.$ipo->id)}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{$ipos->links()}}
        </div>
    </div>

@endsection
