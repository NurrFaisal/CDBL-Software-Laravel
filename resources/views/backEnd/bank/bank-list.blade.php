@extends('frontEnd.admin-dashboard')
@section('title') Bank List @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Bank List</h1>
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
                @foreach($banks as $bank)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$bank->name}}</td>
                    <td>{{$bank->status == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>
                        <a href="{{URL::to('/admin/edit-bank/'.$bank->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{URL::to('/admin/delete-bank/'.$bank->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Bank !!!')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{$banks->links()}}
        </div>
    </div>


@endsection
