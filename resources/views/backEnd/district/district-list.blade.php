@extends('frontEnd.admin-dashboard')
@section('title') District List @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">District List</h1>
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
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($districts as $district)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$district->name}}</td>
                        <td>{{$district->status == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>
                            <a href="{{URL::to('/admin/edit-district/'.$district->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{URL::to('/admin/delete-district/'.$district->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Branch!!!')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
