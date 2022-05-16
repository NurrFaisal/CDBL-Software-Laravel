@extends('frontEnd.admin-dashboard')
@section('title') Bank Branch List List @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Bank Branch List</h1>
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
                    <th scope="col">Name</th>
                    <th scope="col">Bank Name</th>
                    <th scope="col">Routing</th>
                    <th scope="col">District</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($bank_branches as $bank_branch)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$bank_branch->name}}</td>
                        <td>{{$bank_branch->get_bank_name->name}}</td>
                        <td>{{$bank_branch->bank_routing}}</td>
                        <td>{{$bank_branch->get_district_name->name}}</td>
                        <td>{{$bank_branch->status == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>
                            <a href="{{URL::to('/admin/edit-bank-branch/'.$bank_branch->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{URL::to('/admin/delete-bank-branch/'.$bank_branch->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Bank Branch!!!')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{$bank_branches->links()}}
        </div>
    </div>


@endsection
