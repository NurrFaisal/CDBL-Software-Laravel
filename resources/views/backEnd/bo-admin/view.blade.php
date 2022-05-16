@extends('frontEnd.admin-dashboard')
@section('title') View @endsection
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
    </style>

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">BO Request list</h1>
        </div>

        <h1 class="profile-heading">User Name<span style="float: right"><input style="border: none; text-align: center" type="text" id="boId" value="{{$bo_account->user_name}}" disabled></span></h1>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem">
            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->first_name}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Email</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->email}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Mobile</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->mobile !=NULL ? $bo_account->mobile : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Account Type</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->type_of_client == 1 ? 'Individual' : 'Join'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Occupation</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->occupation !=NULL ? $bo_account->occupation : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Date of Birth</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->date_of_birth !=NULL ? $bo_account->date_of_birth : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Father's Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->fathers_name !=NULL ? $bo_account->fathers_name : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Mother's Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->mothers_name !=NULL ? $bo_account->mothers_name : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Contact Address</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->contact_address !=NULL ? $bo_account->contact_address : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Post Code</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->post_code !=NULL ? $bo_account->post_code : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">City</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->bo_city != NULL ? $bo_account->bo_city->name : 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Division</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->division !=NULL ? $bo_account->division : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Country</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->country !=NULL ? $bo_account->country : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Nationality</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->nationality !=NULL ? $bo_account->nationality : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">NID</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->nid !=NULL ? $bo_account->nid : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Branch</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->bo_branch != NULL ? $bo_account->bo_branch->name : 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Passport Number</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->passport_info != NULL ? $bo_account->passport_info : 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Visa Number</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->visa_info != NULL ? $bo_account->visa_info : 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Permit Information</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->permit_info != NULL ? $bo_account->permit_info: 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Status</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->status == 1 ? 'Approved' : 'Not Approved'}}</p>
                </div>
            </div>
        </div>

        {{--            Bank Information            --}}

        <div class="profile-init-div">
            <h1 class="profile-heading">Bank Information</h1>
        </div>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem">
            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Bank Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->bank_name}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">District</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->bank_district}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Branch</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->bank_branch !=NULL ? $bo_account->bank_branch : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Bank Routing</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->bank_routing}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Bank A/C</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->bank_ac !=NULL ? $bo_account->bank_ac : 'Not Define'}}</p>
                </div>
            </div>
        </div>

        {{--            Joint A/C Holder Information            --}}

        @if($bo_account->type_of_client !== 1 )
            <div class="profile-init-div">
                <h1 class="profile-heading">Joint A/C Holder Information</h1>
            </div>

            <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_first_name}} {{$bo_account->join_last_name}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Email</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_email}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Mobile</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_mobile !=NULL ? $bo_account->join_mobile : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Occupation</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_occupation !=NULL ? $bo_account->join_occupation : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Date of Birth</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_date_of_birth !=NULL ? $bo_account->join_date_of_birth : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Father's Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_fathers_name !=NULL ? $bo_account->join_fathers_name : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Mother's Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_mothers_name !=NULL ? $bo_account->join_mothers_name : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Contact Address</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_contact_address !=NULL ? $bo_account->join_contact_address : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Post Code</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_post_code !=NULL ? $bo_account->join_post_code : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">City</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_city != NULL ? $bo_account->join_city : 'Not Defined'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Division</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_division !=NULL ? $bo_account->join_division : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Country</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->join_country !=NULL ? $bo_account->join_country : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Fax</p>
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
            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Name</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_title}} {{$bo_account->n1_first_name}} {{$bo_account->n1_last_name}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Relationship With A?C Holder</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_rel_with_ac_holder}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Nominee Percentage</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_percentage !=NULL ? $bo_account->n1_percentage : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Residency</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_residency !=NULL ? $bo_account->n1_residency : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Date of Birth</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_date_of_birth !=NULL ? $bo_account->n1_date_of_birth : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">NID</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_nid !=NULL ? $bo_account->n1_nid : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Fax</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_fax !=NULL ? $bo_account->n1_fax : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Mobile</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_mobile !=NULL ? $bo_account->n1_mobile : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Email</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_email !=NULL ? $bo_account->n1_email : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Contact Address</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_address !=NULL ? $bo_account->n1_address : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Post Code</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_post_code !=NULL ? $bo_account->n1_post_code : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">City</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_city != NULL ? $bo_account->n1_city : 'Not Defined'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Division</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_division !=NULL ? $bo_account->n1_division : 'Not Define'}}</p>
                </div>
            </div>

            <div class="row each-row">
                <div class="col-md-8">
                    <p class="left-p">Country</p>
                </div>
                <div class="col-md-4">
                    <p class="right-p">{{$bo_account->n1_country !=NULL ? $bo_account->n1_country : 'Not Define'}}</p>
                </div>
            </div>

        </div>


        {{--            First Nominee Guardian Information            --}}

        @if($bo_account->n1g == 1)
            <div class="profile-init-div">
                <h1 class="profile-heading">First Nominee Guardian Information</h1>
            </div>

            <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_title}} {{$bo_account->n1g_first_name}} {{$bo_account->n1g_last_name}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Relationship With A/C Holder</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_rel_with_ac_holder}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Nominee Percentage</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_percentage !=NULL ? $bo_account->n1g_percentage : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Residency</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_residency !=NULL ? $bo_account->n1g_residency : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Date of Birth</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_date_of_birth !=NULL ? $bo_account->n1g_date_of_birth : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">NID</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_nid !=NULL ? $bo_account->n1g_nid : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Fax</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_fax !=NULL ? $bo_account->n1g_fax : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Mobile</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_mobile !=NULL ? $bo_account->n1g_mobile : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Email</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_email !=NULL ? $bo_account->n1g_email : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Contact Address</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_address !=NULL ? $bo_account->n1g_address : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Post Code</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_post_code !=NULL ? $bo_account->n1g_post_code : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">City</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_city != NULL ? $bo_account->n1g_city : 'Not Defined'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Division</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_division !=NULL ? $bo_account->n1g_division : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Country</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n1g_country !=NULL ? $bo_account->n1g_country : 'Not Define'}}</p>
                    </div>
                </div>

            </div>
        @endif

        {{--            Second Nominee Information            --}}

        @if($bo_account->n2 == 1)
            <div class="profile-init-div">
                <h1 class="profile-heading">Second Nominee Information</h1>
            </div>

            <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_title}} {{$bo_account->n2_first_name}} {{$bo_account->n2_last_name}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Relationship With A?C Holder</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_rel_with_ac_holder}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Nominee Percentage</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_percentage !=NULL ? $bo_account->n2_percentage : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Residency</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_residency !=NULL ? $bo_account->n2_residency : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Date of Birth</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_date_of_birth !=NULL ? $bo_account->n2_date_of_birth : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">NID</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_nid !=NULL ? $bo_account->n2_nid : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Fax</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_fax !=NULL ? $bo_account->n2_fax : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Mobile</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_mobile !=NULL ? $bo_account->n2_mobile : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Email</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_email !=NULL ? $bo_account->n2_email : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Contact Address</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_address !=NULL ? $bo_account->n2_address : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Post Code</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_post_code !=NULL ? $bo_account->n2_post_code : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">City</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_city != NULL ? $bo_account->n2_city : 'Not Defined'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Division</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_division !=NULL ? $bo_account->n2_division : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Country</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2_country !=NULL ? $bo_account->n2_country : 'Not Define'}}</p>
                    </div>
                </div>

            </div>
        @endif



        {{--            Second Nominee Guardian Information            --}}

        @if($bo_account->n2g == 1)
            <div class="profile-init-div">
                <h1 class="profile-heading">Second Nominee Guardian Information</h1>
            </div>

            <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_title}} {{$bo_account->n2g_first_name}} {{$bo_account->n2g_last_name}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Relationship With A/C Holder</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_rel_with_ac_holder}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Nominee Percentage</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_percentage !=NULL ? $bo_account->n2g_percentage : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Residency</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_residency !=NULL ? $bo_account->n2g_residency : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Date of Birth</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_date_of_birth !=NULL ? $bo_account->n2g_date_of_birth : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">NID</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_nid !=NULL ? $bo_account->n2g_nid : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Fax</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_fax !=NULL ? $bo_account->n2g_fax : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Mobile</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_mobile !=NULL ? $bo_account->n2g_mobile : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Email</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_email !=NULL ? $bo_account->n2g_email : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Contact Address</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_address !=NULL ? $bo_account->n2g_address : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Post Code</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_post_code !=NULL ? $bo_account->n2g_post_code : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">City</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_city != NULL ? $bo_account->n2g_city : 'Not Defined'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Division</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_division !=NULL ? $bo_account->n2g_division : 'Not Define'}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Country</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$bo_account->n2g_country !=NULL ? $bo_account->n2g_country : 'Not Define'}}</p>
                    </div>
                </div>
            </div>
        @endif


        {{--            Document Attatchment First A/C Holder           --}}


        <div class="profile-init-div">
            <h1 class="profile-heading">Uploaded Documents [A/C Holder]</h1>
        </div>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem">
            <div class="row">
                <div class="col-md-3">
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$bo_account->ac_holder_image)}}"/>
                        <div  class="documents-description">
                            <p>Account Holder Image</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$bo_account->ac_holder_image))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$bo_account->front_page_nid_image)}}"/>
                        <div  class="documents-description">
                            <p>Fontside of NID</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$bo_account->front_page_nid_image))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$bo_account->back_page_nid_image)}}"/>
                        <div  class="documents-description">
                            <p>Backside of NID</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$bo_account->back_page_nid_image))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$bo_account->ac_holder_signature)}}"/>
                        <div  class="documents-description">
                            <p>Signature of Account Holder Image</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$bo_account->ac_holder_signature))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="profile-document-img-div">
                        <img src="{{asset('public/'.$bo_account->ac_holder_cheque_book_leaf)}}"/>
                        <div  class="documents-description">
                            <p>Cheque Book Leaf Image of Account Holder</p>
                        </div>
                        <div class="view-btn-d">
                            <a href="{{URL::to(asset('public/'.$bo_account->ac_holder_cheque_book_leaf))}}" target="_blank" class="view-btn">view</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--            Document Attatchment Joint A/C Holder           --}}

        @if($bo_account->type_of_client !== 1 )
            <div class="profile-init-div">
                <h1 class="profile-heading">Uploaded Documents [Joint A/C Holder]</h1>
            </div>

            <div style="background: #ececec; border-radius: 5px; padding: 1rem">
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-document-img-div">
                            <img src="{{asset('public/'.$bo_account->join_ac_holder_image)}}"/>
                            <div  class="documents-description">
                                <p>Account Holder Image</p>
                            </div>
                            <div class="view-btn-d">
                                <a href="{{URL::to(asset('public/'.$bo_account->join_ac_holder_image))}}" target="_blank" class="view-btn">view</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="profile-document-img-div">
                            <img src="{{asset('public/'.$bo_account->join_front_page_nid_image)}}"/>
                            <div  class="documents-description">
                                <p>Fontside of NID</p>
                            </div>
                            <div class="view-btn-d">
                                <a href="{{URL::to(asset('public/'.$bo_account->join_front_page_nid_image))}}" target="_blank" class="view-btn">view</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="profile-document-img-div">
                            <img src="{{asset('public/'.$bo_account->join_back_page_nid_image)}}"/>
                            <div  class="documents-description">
                                <p>Backside of NID</p>
                            </div>
                            <div class="view-btn-d">
                                <a href="{{URL::to(asset('public/'.$bo_account->join_back_page_nid_image))}}" target="_blank" class="view-btn">view</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="profile-document-img-div">
                            <img src="{{asset('public/'.$bo_account->join_ac_holder_signature)}}"/>
                            <div  class="documents-description">
                                <p>Signature of Account Holder Image</p>
                            </div>
                            <div class="view-btn-d">
                                <a href="{{URL::to(asset('public/'.$bo_account->join_ac_holder_signature))}}" target="_blank" class="view-btn">view</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        {{--            Trader Commission Information           --}}

        <div class="profile-init-div">
            <h1 class="profile-heading">Trader Commission</h1>
        </div>


        {{--            Status Information           --}}


        <div style="background: #ececec; border-radius: 5px; padding: 1rem">

            <div class="row each-row">
                <form action="{{URL::to('/admin/bo-account-approved')}}" method="post">
                    <input type="hidden" name="bo_id" value="{{$bo_account->id}}">
                    @csrf
                    <div style="display: flex; justify-content: center">
                        <span class="input">
                            <input type="text" class="input__field" id="dse_bo_id" name="dse_bo_id"  placeholder="DSE BOID"/>
                            <label for="dse_bo_id" class="input__label" ></label>
                                @if ($errors->has('dse_bo_id'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('dse_bo_id') }}</strong>
                            </span>
                            @endif
                        </span>
                        <span class="input radio-input @error('status') is-invalid @enderror">
                            <select class="select-option "  name="traders">
                                <option value="" >-Select Traders-</option>
                                @foreach($traders as $trader)
                                    <option value="{{$trader->id}}" >{{$trader->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('traders'))
                                                        <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('traders') }}</strong>
                                </span>
                            @endif
                        </span>
                        <span class="input">
                            <input type="text" class="input__field" id="commission" name="commission"  placeholder="Commission"/>
                            <label for="commission" class="input__label" ></label>
                                @if ($errors->has('commission'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('commission') }}</strong>
                            </span>
                            @endif
                        </span>

                    </div>
                    <div style="display:flex; justify-content: end; align-items: center">
                        <div>
                            <button class="form-submit-btn" style="margin: 2rem 2rem" type="submit">Approved</button>
                            <a  class="form-submit-btn printInfo" href="{{url('admin/pdf/admin-bo-account/'.$bo_account->id)}}">Export to PDF</a>
{{--                            <a class="form-submit-btn printInfo" onclick="boRequestInfo('content')">Print</a>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>



@endsection
