@extends('frontEnd.admin-dashboard')
@section('title') Withdraw Request @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Withdraw Request List</h1>
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
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($withdraw_requests as $withdraw_request)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$withdraw_request->user->name}}</td>
                            <td>{{$withdraw_request->amount}}</td>
                            <td>{{$withdraw_request->status == 1 ? 'Approved' : 'Pending'}}</td>
                            <td>
                                <a href="{{URL::to('/admin/client-withdraw-request-approved/'.$withdraw_request->id)}}" onclick="return confirm('Are you sure ? you want to approved this request !!!')" class="btn btn-success">Approved</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="text-align: center;">
                {{$withdraw_requests->links()}}
            </div>
        </div>
    </div>


@endsection
