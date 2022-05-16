@extends('frontEnd.admin-dashboard')
@section('title') View @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">View User List</h1>
        </div>

        <h1 class="profile-heading">User Name<span style="float: right"><input style="border: none; text-align: center" type="text" value="" disabled></span></h1>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem">
            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->name}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Email</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->email}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Mobile</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->mobile_one.' | '.$user->mobile_two}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Admin Type</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->get_admin_type->name}}</p>
                </div>
            </div>


            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Date of Birth</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->date_of_birth}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Father's Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->fathers_name}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Mother's Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->mothers_name}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Contact Address</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->present_address}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Post Code</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->present_post_code}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">City</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->get_district_name->name}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Division</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->present_division}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Nationality</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->nationality}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">NID</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->nid_passport}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Branch</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$user->get_branch_name->name}}</p>
                </div>
            </div>

        </div>
    </div>

@endsection
