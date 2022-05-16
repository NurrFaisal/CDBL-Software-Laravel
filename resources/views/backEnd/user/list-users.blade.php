@extends('frontEnd.admin-dashboard')
@section('title') Admin User List @endsection
@section('mainContent')

    <div class="bo-container">
        <h1 class="profile-heading">User List</h1>
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
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Employee Id</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Nationality</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($users as $user)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile_one}}</td>
                        <td>{{$user->employee_id}}</td>
                        <td>{{$user->designation}}</td>
                        <td>{{$user->gender == 1 ? 'Male' : 'Femail'}}</td>
                        <td>{{$user->date_of_birth}}</td>
                        <td>{{$user->nationality}}</td>
                        <td>
                            <a href="{{URL::to('/admin/user-view/'.$user->id)}}"><i class="fa fa-eye action-icon"></i></a>
                            <a href="{{URL::to('/admin/user-edit/'.$user->id)}}"><i class="fa fa-edit action-icon"></i></a>
{{--                            <a href="{{URL::to('#')}}"><i class="fa fa-trash action-icon"></i></a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{$users->links()}}
        </div>
    </div>

@endsection
