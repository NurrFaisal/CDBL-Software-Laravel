@extends('frontEnd.admin-dashboard')
@section('title') Branch List @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Branch List</h1>
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
                    <th scope="col">District</th>
                    <th scope="col">Division</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($branches as $branch)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$branch->name}}</td>
                        <td>{{$branch->get_district_name->name}}</td>
                        <td>{{$branch->division}}</td>
                        <td>{{$branch->status == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>
                            <a href="{{URL::to('/admin/edit-branch/'.$branch->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{URL::to('/admin/delete-branch/'.$branch->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Branch!!!')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{$branches->links()}}
        </div>
    </div>


@endsection
