@extends('frontEnd.client-dashboard')
@section('title') Client Withdraw List @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Withdraw Request List</h1>
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
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($withdraws as $withdraw)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$withdraw->amount}}</td>
                            <td>{{$withdraw->status == 1 ? 'Approved' : 'Pending'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="text-align: center;">
                {{$withdraws->links()}}
            </div>
        </div>
    </div>


@endsection
