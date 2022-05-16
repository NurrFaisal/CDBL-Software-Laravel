@extends('frontEnd.admin-dashboard')
@section('title') BO Assign List @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">BO Assign List</h1>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Account Type</th>
                    <th scope="col">City</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($assign_bo_accounts as $assign_bo_account)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$assign_bo_account->user_name}}</td>
                        <td>{{$assign_bo_account->first_name.' '.$assign_bo_account->last_name}}</td>
                        <td>{{$assign_bo_account->email}}</td>
                        <td>{{$assign_bo_account->mobile}}</td>
                        <td>{{$assign_bo_account->type_of_client}}</td>
                        <td>{{$assign_bo_account->city}}</td>
                        <td>{{$assign_bo_account->branch}}</td>
                        <td>{{$assign_bo_account->status == 1 ? 'Approved' : 'Not Approved'}}</td>
                        <td>
                            {{--                            <a href="{{URL::to('/admin/edit-district/'.$request_bo_account->id)}}" class="btn btn-info">Edit</a>--}}
                            {{--                            <a href="{{URL::to('/admin/delete-district/'.$request_bo_account->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Branch!!!')" class="btn btn-danger">Delete</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
