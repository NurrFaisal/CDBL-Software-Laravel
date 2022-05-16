@extends('frontEnd.admin-dashboard')
@section('title') Share List @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Share List</h1>
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
                    <th scope="col">Qty</th>
                    <th scope="col">BO ISN</th>
                    <th scope="col">Group</th>
                    <th scope="col">Marginable</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($shares as $share)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$share->name}}</td>
                        <td>{{$share->qty}}</td>
                        <td>{{$share->bo_isn}}</td>
                        <td>{{$share->group}}</td>
                        <td>{{$share->marginable == 1 ? 'Marginable' : 'Non-Marginable'}}</td>
                        <td>{{$share->price}}</td>
                        <td>{{$share->status == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>
                            <a href="{{URL::to('/admin/share-edit/'.$share->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{URL::to('/admin/share-delete/'.$share->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Branch!!!')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{$shares->links()}}
        </div>
    </div>


@endsection
