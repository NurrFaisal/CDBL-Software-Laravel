@extends('frontEnd.admin-dashboard')
@section('title') Margin Loan Request @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Margin Loan Request List</h1>
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
                    <th scope="col">User Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
                @foreach($marginLoans as $marginLoan)
                <tr>
                    <td>{{$i++}}</td>
                    <td style="width: 230px">{{$marginLoan->get_user_name->name}}</td>
                    <td>{{$marginLoan->amount}}</td>
                    <td>{{$marginLoan->status == 0 ? 'Pending' : 'Success'}}</td>
                    <td>
                        <a href="{{URL::to('/admin/margin-loan-request-edit/'.$marginLoan->id)}}" class="btn btn-info">Edit</a>
{{--                        <a href="#" onclick="return confirm('Are You Sure? You Want To Delete This Bank !!!')" class="btn btn-danger">Delete</a>--}}
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{$marginLoans->links()}}
    </div>


@endsection
