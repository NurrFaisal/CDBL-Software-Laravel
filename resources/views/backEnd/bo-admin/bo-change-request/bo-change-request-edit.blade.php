@extends('frontEnd.admin-dashboard')
@section('title') CBDL Change request @endsection
@section('mainContent')

    <style>
        .printInfo{
            margin: 2rem 2rem !important;
            padding: 12px 45px;
        }

        .printInfo:hover{
            text-decoration: none !important;
            padding: 6px 45px !important;
            cursor: pointer;
        }

        .current-change{
            color: green;
        }

        .incoming-change{
            color: red;
        }

/*        .each-row .col-md-4:last-child p{
            color: green;
            font-weight: 600;
        }

        .each-row .col-md-4:nth-child(2) p{
            color: red;
            font-weight: 600;
        }*/
    </style>

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">BO Request list</h1>
        </div>

{{--        <h1 class="profile-heading">User Name<span style="float: right"><input style="border: none; text-align: center" type="text" value="{{$change_request_bo_accounts->user_name}}" disabled></span></h1>--}}

        <div>

        </div>

        <div  style="background: #ececec; border-radius: 5px; padding: 1rem; position: relative">
            <div class="row each-row" style="position: sticky; top: 50px; background: #ffffff; z-index: 1">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <p class="left-p">Requested Change</p>
                </div>
                <div class="col-md-4">
                    <p class="left-p">Current Details</p>
                </div>
            </div>
            <div class="row each-row" @if($change_request_bo_accounts->first_name != $bo_account->first_name) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">First Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->first_name}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->first_name}}</p>
                </div>
            </div>
            <div class="row each-row" @if($change_request_bo_accounts->last_name != $bo_account->last_name) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Last Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->last_name}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->last_name}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->email != $bo_account->email) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Email</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->email}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->email}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->mobile != $bo_account->mobile) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Mobile</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->mobile !=NULL ? $change_request_bo_accounts->mobile : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->mobile !=NULL ? $bo_account->mobile : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->type_of_client != $bo_account->type_of_client) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Account Type</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->type_of_client == 1 ? 'Individual' : 'Join'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->type_of_client == 1 ? 'Individual' : 'Join'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->occupation != $bo_account->occupation) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Occupation</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->occupation !=NULL ? $change_request_bo_accounts->occupation : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->occupation !=NULL ? $bo_account->occupation : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->date_of_birth != $bo_account->date_of_birth) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Date of Birth</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->date_of_birth !=NULL ? $change_request_bo_accounts->date_of_birth : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->date_of_birth !=NULL ? $bo_account->date_of_birth : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->fathers_name != $bo_account->fathers_name) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Father's Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->fathers_name !=NULL ? $change_request_bo_accounts->fathers_name : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->fathers_name !=NULL ? $bo_account->fathers_name : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->mothers_name != $bo_account->mothers_name) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Mother's Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->mothers_name !=NULL ? $change_request_bo_accounts->mothers_name : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->mothers_name !=NULL ? $bo_account->mothers_name : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->contact_address != $bo_account->contact_address) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Contact Address</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->contact_address !=NULL ? $change_request_bo_accounts->contact_address : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->contact_address !=NULL ? $bo_account->contact_address : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->post_code != $bo_account->post_code) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Post Code</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->post_code !=NULL ? $change_request_bo_accounts->post_code : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->post_code !=NULL ? $bo_account->post_code : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->bo_city != $bo_account->bo_city) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">City</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->bo_city != NULL ? $change_request_bo_accounts->bo_city->name : 'Not Defined'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->bo_city != NULL ? $bo_account->bo_city->name : 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->division != $bo_account->division) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Division</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->division !=NULL ? $change_request_bo_accounts->division : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->division !=NULL ? $bo_account->division : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->country != $bo_account->country) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Country</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->country !=NULL ? $change_request_bo_accounts->country : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->country !=NULL ? $bo_account->country : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->nationality != $bo_account->nationality) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Nationality</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->nationality !=NULL ? $change_request_bo_accounts->nationality : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->nationality !=NULL ? $bo_account->nationality : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->nid != $bo_account->nid) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">NID</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->nid !=NULL ? $change_request_bo_accounts->nid : 'Not Define'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->nid !=NULL ? $bo_account->nid : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->bo_branch != $bo_account->bo_branch) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Branch</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->bo_branch != NULL ? $change_request_bo_accounts->bo_branch->name : 'Not Defined'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->bo_branch != NULL ? $bo_account->bo_branch->name : 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->passport_info != $bo_account->passport_info) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Passport Number</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->passport_info != NULL ? $change_request_bo_accounts->passport_info : 'Not Defined'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->passport_info != NULL ? $bo_account->passport_info : 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->visa_info != $bo_account->visa_info) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Visa Number</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->visa_info != NULL ? $change_request_bo_accounts->visa_info : 'Not Defined'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->visa_info != NULL ? $bo_account->visa_info : 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->permit_info != $bo_account->permit_info) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Permit Information</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->permit_info != NULL ? $change_request_bo_accounts->permit_info: 'Not Defined'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->permit_info != NULL ? $bo_account->permit_info: 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row" @if($change_request_bo_accounts->status != $bo_account->status) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                <div class="col-md-4">
                    <p class="left-p">Status</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$change_request_bo_accounts->status == 1 ? 'Approved' : 'Not Approved'}}</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->status == 1 ? 'Approved' : 'Not Approved'}}</p>
                </div>
            </div>

            {{--            Bank Information            --}}

            <div class="profile-init-div">
                <h1 class="profile-heading">Bank Information</h1>
            </div>

            <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                <div class="row each-row" @if($change_request_bo_accounts->bank_name != NULL)  @if($change_request_bo_accounts->bank_name != $bo_account->bank_name) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif @endif>
                    <div class="col-md-4">
                        <p class="left-p">Bank Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->bank_name != NULL ? $change_request_bo_accounts->bank_name : $bo_account->bank_name}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->bank_name}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->bank_district != $bo_account->bank_district) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">District</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->bank_district !=NULL ? $change_request_bo_accounts->bank_district : $bo_account->bank_district}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->bank_district}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->bank_branch != $bo_account->bank_branch) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Branch</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->bank_branch !=NULL ? $change_request_bo_accounts->bank_branch : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->bank_branch !=NULL ? $bo_account->bank_branch : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->bank_routing != $bo_account->bank_routing) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Bank Routing</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->bank_routing}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->bank_routing}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->bank_ac != $bo_account->bank_ac) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Bank A/C</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->bank_ac !=NULL ? $change_request_bo_accounts->bank_ac : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->bank_ac !=NULL ? $bo_account->bank_ac : 'Not Define'}}</p>
                    </div>
                </div>
            </div>

            {{--            Joint A/C Holder Information            --}}

            @if($change_request_bo_accounts->type_of_client !== 1 )
                <div class="profile-init-div">
                    <h1 class="profile-heading">Joint A/C Holder Information</h1>
                </div>

                <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                    <div class="row each-row" @if($change_request_bo_accounts->join_first_name != $bo_account->join_first_name) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Name</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_first_name}} {{$change_request_bo_accounts->join_last_name}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_first_name}} {{$bo_account->join_last_name}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_email != $bo_account->join_email) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Email</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_email}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_email}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_mobile != $bo_account->join_mobile) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Mobile</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_mobile !=NULL ? $change_request_bo_accounts->join_mobile : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_mobile !=NULL ? $bo_account->join_mobile : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_occupation != $bo_account->join_occupation) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Occupation</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_occupation !=NULL ? $change_request_bo_accounts->join_occupation : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_occupation !=NULL ? $bo_account->join_occupation : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_date_of_birth != $bo_account->join_date_of_birth) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Date of Birth</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_date_of_birth !=NULL ? $change_request_bo_accounts->join_date_of_birth : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_date_of_birth !=NULL ? $bo_account->join_date_of_birth : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_fathers_name != $bo_account->join_fathers_name) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Father's Name</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_fathers_name !=NULL ? $change_request_bo_accounts->join_fathers_name : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_fathers_name !=NULL ? $bo_account->join_fathers_name : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_mothers_name != $bo_account->join_mothers_name) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Mother's Name</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_mothers_name !=NULL ? $change_request_bo_accounts->join_mothers_name : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_mothers_name !=NULL ? $bo_account->join_mothers_name : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_contact_address != $bo_account->join_contact_address) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Contact Address</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_contact_address !=NULL ? $change_request_bo_accounts->join_contact_address : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_contact_address !=NULL ? $bo_account->join_contact_address : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_post_code != $bo_account->join_post_code) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Post Code</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_post_code !=NULL ? $change_request_bo_accounts->join_post_code : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_post_code !=NULL ? $bo_account->join_post_code : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_city != $bo_account->join_city) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">City</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_city != NULL ? $change_request_bo_accounts->join_city : 'Not Defined'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_city != NULL ? $bo_account->join_city : 'Not Defined'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_division != $bo_account->join_division) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Division</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_division !=NULL ? $bo_account->join_division : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_division !=NULL ? $bo_account->join_division : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_country != $bo_account->join_country) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Country</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_country !=NULL ? $change_request_bo_accounts->join_country : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_country !=NULL ? $bo_account->join_country : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->join_fax != $bo_account->join_fax) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Fax</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->join_fax !=NULL ? $change_request_bo_accounts->join_fax : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->join_fax !=NULL ? $bo_account->join_fax : 'Not Define'}}</p>
                        </div>
                    </div>
                </div>
            @endif

            {{--            First Nominee Information            --}}

            <div class="profile-init-div">
                <h1 class="profile-heading">First Nominee Information</h1>
            </div>

            <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                <div class="row each-row" @if($change_request_bo_accounts->n1_title != $bo_account->n1_title) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_title}} {{$change_request_bo_accounts->n1_first_name}} {{$change_request_bo_accounts->n1_last_name}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_title}} {{$bo_account->n1_first_name}} {{$bo_account->n1_last_name}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_rel_with_ac_holder != $bo_account->n1_rel_with_ac_holder) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Relationship With A?C Holder</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_rel_with_ac_holder}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_rel_with_ac_holder}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_percentage != $bo_account->n1_percentage) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Nominee Percentage</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_percentage !=NULL ? $change_request_bo_accounts->n1_percentage : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_percentage !=NULL ? $bo_account->n1_percentage : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_residency != $bo_account->n1_residency) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Residency</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_residency !=NULL ? $change_request_bo_accounts->n1_residency : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_residency !=NULL ? $bo_account->n1_residency : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_date_of_birth != $bo_account->n1_date_of_birth) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Date of Birth</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_date_of_birth !=NULL ? $change_request_bo_accounts->n1_date_of_birth : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_date_of_birth !=NULL ? $bo_account->n1_date_of_birth : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_nid != $bo_account->n1_nid) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">NID</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_nid !=NULL ? $change_request_bo_accounts->n1_nid : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_nid !=NULL ? $bo_account->n1_nid : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_fax != $bo_account->n1_fax) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Fax</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_fax !=NULL ? $change_request_bo_accounts->n1_fax : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_fax !=NULL ? $bo_account->n1_fax : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_mobile != $bo_account->n1_mobile) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Mobile</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_mobile !=NULL ? $change_request_bo_accounts->n1_mobile : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_mobile !=NULL ? $bo_account->n1_mobile : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_email != $bo_account->n1_email) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Email</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_email !=NULL ? $change_request_bo_accounts->n1_email : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_email !=NULL ? $bo_account->n1_email : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_address != $bo_account->n1_address) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Contact Address</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_address !=NULL ? $change_request_bo_accounts->n1_address : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_address !=NULL ? $bo_account->n1_address : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_post_code != $bo_account->n1_post_code) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Post Code</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_post_code !=NULL ? $change_request_bo_accounts->n1_post_code : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_post_code !=NULL ? $bo_account->n1_post_code : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_city != $bo_account->n1_city) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">City</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_city != NULL ? $change_request_bo_accounts->n1_city : 'Not Defined'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_city != NULL ? $bo_account->n1_city : 'Not Defined'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_division != $bo_account->n1_division) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Division</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_division !=NULL ? $change_request_bo_accounts->n1_division : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_division !=NULL ? $bo_account->n1_division : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row" @if($change_request_bo_accounts->n1_country != $bo_account->n1_country) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                    <div class="col-md-4">
                        <p class="left-p">Country</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$change_request_bo_accounts->n1_country !=NULL ? $change_request_bo_accounts->n1_country : 'Not Define'}}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1_country !=NULL ? $bo_account->n1_country : 'Not Define'}}</p>
                    </div>
                </div>

            </div>


            {{--            First Nominee Guardian Information            --}}

            @if($change_request_bo_accounts->n1g == 1)
                <div class="profile-init-div">
                    <h1 class="profile-heading">First Nominee Guardian Information</h1>
                </div>

                <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                    <div class="row each-row" @if($change_request_bo_accounts->n1g_title != $bo_account->n1g_title) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Name</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_title}} {{$change_request_bo_accounts->n1g_first_name}} {{$change_request_bo_accounts->n1g_last_name}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_title}} {{$bo_account->n1g_first_name}} {{$bo_account->n1g_last_name}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_rel_with_ac_holder != $bo_account->n1g_rel_with_ac_holder) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Relationship With A/C Holder</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_rel_with_ac_holder}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_rel_with_ac_holder}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_percentage != $bo_account->n1g_percentage) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Nominee Percentage</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_percentage !=NULL ? $change_request_bo_accounts->n1g_percentage : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_percentage !=NULL ? $bo_account->n1g_percentage : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_residency != $bo_account->n1g_residency) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Residency</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_residency !=NULL ? $change_request_bo_accounts->n1g_residency : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_residency !=NULL ? $bo_account->n1g_residency : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_date_of_birth != $bo_account->n1g_date_of_birth) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Date of Birth</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_date_of_birth !=NULL ? $change_request_bo_accounts->n1g_date_of_birth : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_date_of_birth !=NULL ? $bo_account->n1g_date_of_birth : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_nid != $bo_account->n1g_nid) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">NID</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_nid !=NULL ? $change_request_bo_accounts->n1g_nid : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_nid !=NULL ? $bo_account->n1g_nid : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_fax != $bo_account->n1g_fax) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Fax</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_fax !=NULL ? $change_request_bo_accounts->n1g_fax : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_fax !=NULL ? $bo_account->n1g_fax : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_mobile != $bo_account->n1g_mobile) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Mobile</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_mobile !=NULL ? $change_request_bo_accounts->n1g_mobile : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_mobile !=NULL ? $bo_account->n1g_mobile : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_email != $bo_account->n1g_email) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Email</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_email !=NULL ? $change_request_bo_accounts->n1g_email : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_email !=NULL ? $bo_account->n1g_email : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_address != $bo_account->n1g_address) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Contact Address</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_address !=NULL ? $change_request_bo_accounts->n1g_address : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_address !=NULL ? $bo_account->n1g_address : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_post_code != $bo_account->n1g_post_code) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Post Code</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_post_code !=NULL ? $change_request_bo_accounts->n1g_post_code : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_post_code !=NULL ? $bo_account->n1g_post_code : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_city != $bo_account->n1g_city) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">City</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_city != NULL ? $change_request_bo_accounts->n1g_city : 'Not Defined'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_city != NULL ? $bo_account->n1g_city : 'Not Defined'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_division != $bo_account->n1g_division) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Division</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_division !=NULL ? $change_request_bo_accounts->n1g_division : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_division !=NULL ? $bo_account->n1g_division : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n1g_country != $bo_account->n1g_country) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Country</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n1g_country !=NULL ? $change_request_bo_accounts->n1g_country : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n1g_country !=NULL ? $bo_account->n1g_country : 'Not Define'}}</p>
                        </div>
                    </div>

                </div>
            @endif

            {{--            Second Nominee Information            --}}

            @if($change_request_bo_accounts->n2 == 1)
                <div class="profile-init-div">
                    <h1 class="profile-heading">Second Nominee Information</h1>
                </div>

                <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                    <div class="row each-row" @if($change_request_bo_accounts->n2_title != $bo_account->n2_title) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Name</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_title}} {{$change_request_bo_accounts->n2_first_name}} {{$change_request_bo_accounts->n2_last_name}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_title}} {{$bo_account->n2_first_name}} {{$bo_account->n2_last_name}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_rel_with_ac_holder != $bo_account->n2_rel_with_ac_holder) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Relationship With A?C Holder</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_rel_with_ac_holder}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_rel_with_ac_holder}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_percentage != $bo_account->n2_percentage) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Nominee Percentage</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_percentage !=NULL ? $change_request_bo_accounts->n2_percentage : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_percentage !=NULL ? $bo_account->n2_percentage : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_residency != $bo_account->n2_residency) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Residency</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_residency !=NULL ? $change_request_bo_accounts->n2_residency : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_residency !=NULL ? $bo_account->n2_residency : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_date_of_birth != $bo_account->n2_date_of_birth) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Date of Birth</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_date_of_birth !=NULL ? $change_request_bo_accounts->n2_date_of_birth : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_date_of_birth !=NULL ? $bo_account->n2_date_of_birth : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_nid != $bo_account->n2_nid) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">NID</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_nid !=NULL ? $change_request_bo_accounts->n2_nid : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_nid !=NULL ? $bo_account->n2_nid : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_fax != $bo_account->n2_fax) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Fax</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_fax !=NULL ? $change_request_bo_accounts->n2_fax : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_fax !=NULL ? $bo_account->n2_fax : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_mobile != $bo_account->n2_mobile) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Mobile</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_mobile !=NULL ? $change_request_bo_accounts->n2_mobile : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_mobile !=NULL ? $bo_account->n2_mobile : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_email != $bo_account->n2_email) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Email</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_email !=NULL ? $change_request_bo_accounts->n2_email : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_email !=NULL ? $bo_account->n2_email : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_address != $bo_account->n2_address) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Contact Address</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_address !=NULL ? $change_request_bo_accounts->n2_address : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_address !=NULL ? $bo_account->n2_address : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_post_code != $bo_account->n2_post_code) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Post Code</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_post_code !=NULL ? $change_request_bo_accounts->n2_post_code : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_post_code !=NULL ? $bo_account->n2_post_code : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_city != $bo_account->n2_city) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">City</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_city != NULL ? $change_request_bo_accounts->n2_city : 'Not Defined'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_city != NULL ? $bo_account->n2_city : 'Not Defined'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_division != $bo_account->n2_division) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Division</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_division !=NULL ? $change_request_bo_accounts->n2_division : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_division !=NULL ? $bo_account->n2_division : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2_country != $bo_account->n2_country) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Country</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2_country !=NULL ? $change_request_bo_accounts->n2_country : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2_country !=NULL ? $bo_account->n2_country : 'Not Define'}}</p>
                        </div>
                    </div>

                </div>
            @endif



            {{--            Second Nominee Guardian Information            --}}

            @if($change_request_bo_accounts->n2g == 1)
                <div class="profile-init-div">
                    <h1 class="profile-heading">Second Nominee Guardian Information</h1>
                </div>

                <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                    <div class="row each-row" @if($change_request_bo_accounts->n2g_title != $bo_account->n2g_title) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Name</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_title}} {{$change_request_bo_accounts->n2g_first_name}} {{$change_request_bo_accounts->n2g_last_name}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_title}} {{$bo_account->n2g_first_name}} {{$bo_account->n2g_last_name}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_rel_with_ac_holder != $bo_account->n2g_rel_with_ac_holder) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Relationship With A/C Holder</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_rel_with_ac_holder}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_rel_with_ac_holder}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_percentage != $bo_account->n2g_percentage) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Nominee Percentage</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_percentage !=NULL ? $change_request_bo_accounts->n2g_percentage : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_percentage !=NULL ? $bo_account->n2g_percentage : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_residency != $bo_account->n2g_residency) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Residency</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_residency !=NULL ? $change_request_bo_accounts->n2g_residency : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_residency !=NULL ? $bo_account->n2g_residency : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_date_of_birth != $bo_account->n2g_date_of_birth) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Date of Birth</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_date_of_birth !=NULL ? $change_request_bo_accounts->n2g_date_of_birth : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_date_of_birth !=NULL ? $bo_account->n2g_date_of_birth : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_nid != $bo_account->n2g_nid) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">NID</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_nid !=NULL ? $change_request_bo_accounts->n2g_nid : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_nid !=NULL ? $bo_account->n2g_nid : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_fax != $bo_account->n2g_fax) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Fax</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_fax !=NULL ? $change_request_bo_accounts->n2g_fax : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_fax !=NULL ? $bo_account->n2g_fax : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_mobile != $bo_account->n2g_mobile) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Mobile</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_mobile !=NULL ? $change_request_bo_accounts->n2g_mobile : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_mobile !=NULL ? $bo_account->n2g_mobile : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_email != $bo_account->n2g_email) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Email</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_email !=NULL ? $change_request_bo_accounts->n2g_email : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_email !=NULL ? $bo_account->n2g_email : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_address != $bo_account->n2g_address) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Contact Address</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_address !=NULL ? $change_request_bo_accounts->n2g_address : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_address !=NULL ? $bo_account->n2g_address : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_post_code != $bo_account->n2g_post_code) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Post Code</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_post_code !=NULL ? $change_request_bo_accounts->n2g_post_code : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_post_code !=NULL ? $bo_account->n2g_post_code : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_city != $bo_account->n2g_city) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">City</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_city != NULL ? $change_request_bo_accounts->n2g_city : 'Not Defined'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_city != NULL ? $bo_account->n2g_city : 'Not Defined'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_division != $bo_account->n2g_division) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Division</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_division !=NULL ? $change_request_bo_accounts->n2g_division : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_division !=NULL ? $bo_account->n2g_division : 'Not Define'}}</p>
                        </div>
                    </div>

                    <div class="row each-row" @if($change_request_bo_accounts->n2g_country != $bo_account->n2g_country) style="background: red; color: #ffffff !important; margin: 0px -10px 0 -10px;" @endif>
                        <div class="col-md-4">
                            <p class="left-p">Country</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$change_request_bo_accounts->n2g_country !=NULL ? $change_request_bo_accounts->n2g_country : 'Not Define'}}</p>
                        </div>
                        <div class="col-md-4">
                            <p class="right-p">{{$bo_account->n2g_country !=NULL ? $bo_account->n2g_country : 'Not Define'}}</p>
                        </div>
                    </div>
                </div>
            @endif

        </div>

        {{--            Document Attatchment First A/C Holder           --}}


        <div class="profile-init-div">
            <h1 class="profile-heading">Uploaded Documents [A/C Holder]</h1>
        </div>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem">
            <div class="row">
                <div class="col-md-3" @if($image_change_request->ac_holder_image == NULL || $image_change_request->status == 1) style="display: none"  @endif>
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$image_change_request->ac_holder_image)}}"/>
                        <div  class="documents-description">
                            <p>Account Holder Image</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$image_change_request->ac_holder_image))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" @if($image_change_request->ac_holder_front_page_nid_image == NULL || $image_change_request->status == 1) style="display: none"  @endif>
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$image_change_request->ac_holder_front_page_nid_image)}}"/>
                        <div  class="documents-description">
                            <p>Fontside of NID</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$image_change_request->ac_holder_front_page_nid_image))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" @if($image_change_request->ac_holder_back_page_nid_image == NULL || $image_change_request->status == 1) style="display: none"  @endif>
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$image_change_request->ac_holder_back_page_nid_image)}}"/>
                        <div  class="documents-description">
                            <p>Backside of NID</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$image_change_request->ac_holder_back_page_nid_image))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" @if($image_change_request->ac_holder_back_page_nid_image == NULL || $image_change_request->status == 1) style="display: none"  @endif>
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$image_change_request->ac_holder_back_page_nid_image)}}"/>
                        <div  class="documents-description">
                            <p>Signature of Account Holder Image</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$image_change_request->ac_holder_back_page_nid_image))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" @if($image_change_request->ac_holder_cheque_book_leaf == NULL || $image_change_request->status == 1) style="display: none"  @endif>
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$image_change_request->ac_holder_signature)}}"/>
                        <div  class="documents-description">
                            <p>Cheque Book Leaf Image of Account Holder</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$image_change_request->ac_holder_cheque_book_leaf))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--            Document Attatchment Joint A/C Holder           --}}

        @if($change_request_bo_accounts->type_of_client !== 1 )
            <div class="profile-init-div">
                <h1 class="profile-heading">Uploaded Documents [Joint A/C Holder]</h1>
            </div>

            <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                <div class="row">
                    <div class="col-md-3" @if($image_change_request->joint_ac_holder_image == NULL || $image_change_request->status == 1) style="display: none"  @endif>
                        <div class="profile-document-img-div">
                            <img src="{{asset('public/'.$image_change_request->joint_ac_holder_image)}}"/>
                            <div  class="documents-description">
                                <p>Account Holder Image</p>
                            </div>
                            <div class="view-btn-d">
                                <a href="{{URL::to(asset('public/'.$image_change_request->joint_ac_holder_image))}}" target="_blank" class="view-btn">view</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3" @if($image_change_request->joint_ac_holder_front_page_nid_image == NULL || $image_change_request->status == 1) style="display: none"  @endif>
                        <div class="profile-document-img-div">
                            <img src="{{asset('public/'.$image_change_request->joint_ac_holder_front_page_nid_image)}}"/>
                            <div  class="documents-description">
                                <p>Fontside of NID</p>
                            </div>
                            <div class="view-btn-d">
                                <a href="{{URL::to(asset('public/'.$image_change_request->joint_ac_holder_front_page_nid_image))}}" target="_blank" class="view-btn">view</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3" @if($image_change_request->joint_ac_holder_back_page_nid_image == NULL || $image_change_request->status == 1) style="display: none"  @endif>
                        <div class="profile-document-img-div">
                            <img src="{{asset('public/'.$image_change_request->joint_ac_holder_back_page_nid_image)}}"/>
                            <div  class="documents-description">
                                <p>Backside of NID</p>
                            </div>
                            <div class="view-btn-d">
                                <a href="{{URL::to(asset('public/'.$image_change_request->joint_ac_holder_back_page_nid_image))}}" target="_blank" class="view-btn">view</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3" @if($image_change_request->joint_ac_holder_signature == NULL || $image_change_request->status == 1) style="display: none"  @endif>
                        <div class="profile-document-img-div">
                            <img src="{{asset('public/'.$image_change_request->joint_ac_holder_signature)}}"/>
                            <div  class="documents-description">
                                <p>Signature of Account Holder Image</p>
                            </div>
                            <div class="view-btn-d">
                                <a href="{{URL::to(asset('public/'.$image_change_request->joint_ac_holder_signature))}}" target="_blank" class="view-btn">view</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        {{--            Approve Change Request           --}}

        <div class="profile-init-div">
            <h1 class="profile-heading">Approve Request</h1>
        </div>


        {{--            Status Information           --}}


        <div style="background: #ececec; border-radius: 5px; padding: 1rem">
            <div class="row each-row">
                <form action="{{URL::to('/admin/update-bo-change-request')}}" method="post">
                    <input type="hidden" name="id" value="{{$change_request_bo_accounts->id}}">
                    @csrf
                    <div style="text-align: right">
                        <button class="form-submit-btn" type="submit">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function boRequestInfo(boRequestInfo) {
            var printContents = document.getElementById(boRequestInfo).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>


@endsection
