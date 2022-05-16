@extends('frontEnd.admin-dashboard')
@section('title') EFT Requests @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">EFT Request List</h1>
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
                        <th scope="col">Bank</th>
                        <th scope="col">Ledger Balance</th>
                        <th scope="col">Mature Balance</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nexkraft Limited</td>
                        <td>500</td>
                        <td>Mutual Trust Bank</td>
                        <td>1200</td>
                        <td>1200</td>
                        <td>30-04-2021</td>
                        <td>
                            <a href="{{URL::to('/admin/EFTServices/review')}}" class="btn btn-success">Review</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
