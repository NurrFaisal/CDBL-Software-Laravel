@extends('frontEnd.admin-dashboard')
@section('title') BO Request List @endsection
@section('mainContent')

    <style>
        th, td{
            white-space: nowrap;
        }
        .user-profile-details{
            overflow: auto;
        }
    </style>

    <div class="bo-container">
        <h1 class="profile-heading">BO Request List</h1>
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
                    <th scope="col">Payment Status</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($request_bo_accounts as $request_bo_account)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$request_bo_account->user_name}}</td>
                        <td>{{$request_bo_account->first_name.' '.$request_bo_account->last_name}}</td>
                        <td>{{$request_bo_account->email}}</td>
                        <td>{{$request_bo_account->mobile}}</td>
                        <td>{{$request_bo_account->type_of_client == 1 ? 'Individual' : 'Join'}}</td>
                        <td>{{$request_bo_account->bo_city != NULL ? $request_bo_account->bo_city->name : 'Not Defined'}}</td>
                        <td>{{$request_bo_account->bo_branch != NULL ? $request_bo_account->bo_branch->name : 'Not Defined'}}</td>
                        <td>{{$request_bo_account->payment_status == 1 ? 'Succeed' : 'Pending'}}</td>
                        <td>{{$request_bo_account->admin_approved == 1 ? 'Approved' : 'Not Approved'}}</td>
                        <td>
                            <a href="{{URL::to('/admin/bo-details/view/'.$request_bo_account->id)}}"><i class="fa fa-eye action-icon"></i></a>
                            <a href="{{URL::to('/admin/bo-details/edit/'.$request_bo_account->id)}}"><i class="fa fa-edit action-icon"></i></a>
                            <a href="{{URL::to('/admin/bo-details/delete/'.$request_bo_account->id)}}" onclick="return delete_confirm()"><i class="fa fa-trash action-icon"></i></a>
{{--                            <a href="{{URL::to('/admin/edit-district/'.$request_bo_account->id)}}" class="btn btn-info">Edit</a>--}}
{{--                            <a href="{{URL::to('/admin/delete-district/'.$request_bo_account->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Branch!!!')" class="btn btn-danger">Delete</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{$request_bo_accounts->links()}}
        </div>
    </div>


    <script>
        function delete_confirm() {
            return confirm('Do you want to delete BO-Account ?')
        }
    </script>
@endsection
