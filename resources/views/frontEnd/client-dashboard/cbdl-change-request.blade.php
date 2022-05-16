@extends('frontEnd.client-dashboard')
@section('title') CBDL Change Request @endsection
@section('mainContent')

    @if($bo_account->type_of_client == 2)
        <style>
            #joint{
                display: block;
            }
        </style>
    @else
        <style>
            #joint{
                display: none;
            }
        </style>
    @endif

    <style>
        .is-invalid{
            border-top: 2px solid red;
            border-bottom: 2px solid red;
        }
        .is-invalid-input{
            color: red;
        }
        .is-invalid-input::before, .is-invalid-input:after{
            background:red;
        }
    </style>

    @if($bo_account->n1g == 0)
        <style>
            #firstNomineeMinor{
                display: none;
            }
        </style>
    @else
        <style>
            #firstNomineeMinor{
                display: block;
            }
        </style>
    @endif
    @if($bo_account->n2 == 0)
        <style>
            #secondNominee{
                display: none;
            }
        </style>
    @else
        <style>
            #secondNominee{
                display: block;
            }
        </style>
    @endif

    @if($bo_account->n2g == 0)
        <style>
            #secondNomineeMinor{
                display: none;
            }
        </style>
    @else
        <style>
            #secondNomineeMinor{
                display: block;
            }
        </style>
    @endif


    {{--    <form action="{{URL::to('/bo-dashboard/add-account-holder-save')}}" method="post">--}}

    <form action="{{URL::to('/client/add-account-holder-save')}}" method="post">
        <input type="hidden" name="id" value="{{$bo_account->id}}">
        <div class="bo-container">
            <div class="profile-init-div">
                <h1 class="profile-heading">Your Profile Details</h1>
            </div>
            <div class="row profile-view-select" style="margin: 0">
                <div class="col-md-10" style="padding: 0" data-toggle="tooltip" data-placement="top" title="CHECK TO VIEW INFO" >
                    <h4>Individual</h4>
                    <h4>Joint</h4>
                </div>
                <div class="col-md-2" style="display: flex; flex-direction: column; justify-content: flex-end !important;">
                    <input type="checkbox" name="type_of_client" value="1" id="individualChecked" class="checkBox" checked>
                    <input type="checkbox" name="type_of_client" value="2" id="jointCheck" class="checkBox" {{$bo_account->type_of_client == 2 ? 'checked' : ''}}>
                    <input type="hidden"  name="id" value="{{$bo_account->id}}"/>
                </div>
            </div>

            <div class="user-profile-details" style="margin-top: 1rem" id="individual">
                <h1 class="profile-heading" style="border-bottom: 2px solid #fff">First Applicant</h1>

                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">
                    <span class="input">
                          <input type="text" class="input__field" id="first_name" name="first_name" value="{{$bo_account->first_name}}" placeholder="First Name"/>
                          <label for="first_name" class="input__label"></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="last_name" name="last_name" value="{{$bo_account->last_name}}" placeholder="Last Name"/>
                        <label for="last_name" class="input__label"></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="occupation" name="occupation" value="{{$bo_account->occupation}}" placeholder="Occupation"/>
                        <label for="occupation" class="input__label"></label>
                    </span>

                    <span class="input">
                        <input class="input__field datepicker" id="date_of_birth" name="date_of_birth" value="{{$bo_account->date_of_birth}}" placeholder="Date Of Birth"/>
                        <label for="date_of_birth" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="fathers_name" name="fathers_name" value="{{$bo_account->fathers_name}}" placeholder="Father's/Husband Name"/>
                        <label for="fathers_name" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="mothers_name" name="mothers_name" value="{{$bo_account->mothers_name}}" placeholder="Mother's Name"/>
                        <label for="mothers_name" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="contact_address" name="contact_address" value="{{$bo_account->contact_address}}" placeholder="Address"/>
                        <label for="contact_address" class="input__label" ></label>
                    </span>
                    <span class="input radio-input" >
                        <select class="select-option" id="bo_city_update" onchange="bo_city_upate_change()"  name="city">
                            <option value="" selected disabled>Chose Branch</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('bo_city_update').value = '{{$bo_account->city}}';
                        </script>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="post_code" name="post_code" value="{{$bo_account->post_code}}" placeholder="Post Code"/>
                        <label for="post_code" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="division" name="division" value="{{$bo_account->division}}" placeholder="Division"/>
                        <label for="division" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="country" name="country" value="{{$bo_account->country}}" placeholder="Country"/>
                        <label for="country" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="mobile" name="mobile" readonly style="background-color: #cecece;" value="{{$bo_account->mobile}}" placeholder="Mobile"/>
                        <label for="mobile" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="tel" name="tel" value="{{$bo_account->tel}}" placeholder="Tel"/>
                        <label for="tel" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="fax" name="fax" value="{{$bo_account->fax}}"  placeholder="Fax"/>
                        <label for="fax" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="email" name="email" readonly style="background-color: #cecece;" value="{{$bo_account->email}}" placeholder="E-mail"/>
                        <label for="email" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="nationality" name="nationality" value="{{$bo_account->nationality}}" placeholder="Nationality"/>
                        <label for="nationality" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="nid" name="nid" value="{{$bo_account->nid}}" placeholder="NID"/>
                        <label for="nid" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="tin" name="tin" value="{{$bo_account->tin}}" placeholder="TIN"/>
                        <label for="tin" class="input__label" ></label>
                    </span>

                    <span class="input radio-input" style="display: flex">
                        <div style="padding-right: 5rem">
                            <input type="radio" id="male" name="gender" value="1" {{$bo_account->gender == 1 ? 'checked' : ''}} >
                            <label for="male">Male</label>
                        </div>
                        <div>
                            <input type="radio" id="female" name="gender" value="0" {{$bo_account->gender == 0 ? 'checked' : ''}}>
                            <label for="female">Female</label>
                        </div>
                    </span>

                    <span class="input radio-input" style="display: flex">
                        <div style="padding-right: 5rem">
                            <input type="radio" id="resident" name="residency" value="1" {{$bo_account->residency == 1 ? 'checked' : ''}}>
                            <label for="resident">Resident</label>
                        </div>
                        <div>
                            <input type="radio" id="nonresident" name="residency" value="0" {{$bo_account->residency == 0 ? 'checked' : ''}}>
                            <label for="residency">Not Resident</label>
                        </div>
                    </span>

                    <span class="input radio-input" >
                        <select class="select-option" name="branch" id="bo_branch_update" >
                            <option value="" selected disabled>Chose Branch</option>
                            @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('bo_branch_update').value = '{{$bo_account->branch}}';
                        </script>
                    </span>

                    <span class="input non-resident-check">
                        <input type="text" class="input__field" id="passport_info" name="passport_info" value="{{$bo_account->passport_info}}"  placeholder="Passport Number"/>
                        <label for="passport_info" class="input__label" ></label>
                    </span>

                    <span class="input non-resident-check">
                        <input type="text" class="input__field" id="visa_info" name="visa_info"  value="{{$bo_account->visa_info}}" placeholder="Visa Number"/>
                        <label for="visa_info" class="input__label" ></label>
                    </span>

                    <span class="input non-resident-check">
                        <input type="text" class="input__field" id="permit_info" name="permit_info" value="{{$bo_account->permit_info}}" placeholder="Permit details"/>
                        <label for="permit_info" class="input__label" ></label>
                    </span>
                </div>
                <div style="width: 100%; background: #ffffff; height: 5px; border-radius: 5px"></div>
                <div class="user-profile-details" style="margin-top: 1rem;"  id="joint" >
                    <h1 class="profile-heading" style="border-bottom: 2px solid #fff">Joint Account [2nd Second Account Holder]</h1>

                    <div id="container">
                    <span class="input">
                          <input type="text" class="input__field" id="fstName" name="join_first_name" value="{{$bo_account->join_first_name}}" placeholder="First Name"/>
                          <label for="fstName" class="input__label"></label>
                    </span>
                        <span class="input">
                        <input type="text" class="input__field" id="lstName" name="join_last_name" value="{{$bo_account->join_last_name}}" placeholder="Last Name"/>
                        <label for="lstName" class="input__label"></label>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_occupation" name="join_occupation" value="{{$bo_account->join_occupation}}" placeholder="Occupation"/>
                        <label for="join_occupation" class="input__label"></label>
                    </span>

                        <span class="input">
                        <input class="input__field datepicker" id="join_date_of_birth" name="join_date_of_birth" value="{{$bo_account->join_date_of_birth}}" placeholder="Date Of Birth"/>
                        <label for="join_date_of_birth" class="input__label" ></label>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_fathers_name" name="join_fathers_name" value="{{$bo_account->join_fathers_name}}" placeholder="Father's/Husband Name"/>
                        <label for="join_fathers_name" class="input__label" ></label>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_mothers_name" name="join_mothers_name" value="{{$bo_account->join_mothers_name}}" placeholder="Mother's Name"/>
                        <label for="join_mothers_name" class="input__label" ></label>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_contact_address" name="join_contact_address" value="{{$bo_account->join_contact_address}}" placeholder="Address"/>
                        <label for="join_contact_address" class="input__label" ></label>
                    </span>
                        <span class="input radio-input" >
                        <select class="select-option" id="bo_join_city_update"  name="join_city">
                            <option value="" selected disabled>Chose Branch</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('bo_join_city_update').value = '{{$bo_account->join_city}}';
                        </script>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_post_code" name="join_post_code" value="{{$bo_account->join_post_code}}" placeholder="Post Code"/>
                        <label for="join_post_code" class="input__label" ></label>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_division" name="join_division" value="{{$bo_account->join_division}}" placeholder="Division"/>
                        <label for="join_division" class="input__label" ></label>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_country" name="join_country" value="{{$bo_account->join_country}}" placeholder="Country"/>
                        <label for="join_country" class="input__label" ></label>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_mobile" name="join_mobile" value="{{$bo_account->join_mobile}}" placeholder="Mobile"/>
                        <label for="join_mobile" class="input__label" ></label>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_tel" name="join_tel" value="{{$bo_account->join_tel}}" placeholder="Tel"/>
                        <label for="join_tel" class="input__label" ></label>
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="join_fax" name="join_fax" value="{{$bo_account->join_fax}}" placeholder="Fax"/>
                        <label for="join_fax" class="input__label" ></label>
                    </span>

                        <span class="input">
                        <input type="email" class="input__field" id="join_email" name="join_email" value="{{$bo_account->join_email}}" placeholder="E-mail"/>
                        <label for="join_email" class="input__label" ></label>
                    </span>
                    </div>
                </div>
                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Update Account Holder Info</button>
                </div>
            </div>
        </div>
    </form>
    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Your Bank Details</h1>
        </div>
        <div class="user-profile-details" style="margin-top: 1rem">
            <form action="{{URL::to('/client/bank-information-save')}}" method="post">
                {{--            <form action="{{URL::to('/bo-dashboard/bank-information-save')}}" method="post">--}}
                <input type="hidden" class="input__field " id="id" value="{{$bo_account->id}}" readonly name="id" />
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">
                    <span class="input radio-input @error('bank_name') is-invalid @enderror">
                        <select class="select-option " id="bank_name"  name="bank_name">
                            <option value="" >Select Your Bank</option>
                            @foreach($banks as $bank)
                                <option value="{{$bank->id}}">{{$bank->name}}</option>
                            @endforeach
                        </select>
                         <script>
                            document.getElementById('bank_name').value = '{{$bo_account->bank_name}}';
                        </script>
                        @if ($errors->has('bank_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bank_name') }}</strong>
                            </span>
                        @endif
                    </span>
                    <span class="input radio-input @error('bank_district') is-invalid @enderror">
                        <select class="select-option" id="bank_district" name="bank_district" onchange="getBankBranch()">
                            <option value="" selected disabled>Select Your Bank District</option>
                           @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('bank_district').value = '{{$bo_account->bank_district}}';
                        </script>
                        @if ($errors->has('bank_district'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bank_district') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input radio-input @error('bank_branch') is-invalid @enderror">
                        <select class="select-option" id="bank_branch" name="bank_branch" onchange="getBrankBranchRoutingNo()">
                            <option value="" selected disabled>Select Your Bank Branch</option>
                            @foreach($district_bank_baranchs as $dbb)
                                <option value="{{$dbb->id}}" >{{$dbb->name}}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('bank_branch').value = '{{$bo_account->bank_branch}}';
                        </script>
                        @if ($errors->has('bank_branch'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bank_branch') }}</strong>
                            </span>
                        @endif
                    </span>
                    <span class="input">
                        <input type="text" class="input__field " id="bank_branch_routing_no" value="{{$bo_account->bank_routing}}" readonly name="bank_routing" placeholder="Rounting Number" />
                        <label for="bank_branch_routing_no" class="input__label  @error('bank_routing') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('bank_routing'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bank_routing') }}</strong>
                            </span>
                        @endif
                   </span>

                    <span class="input ">
                        <input type="text" class="input__field " id="bank_ac" name="bank_ac" value="{{$bo_account->bank_ac}}" placeholder="Your Bank Account Number" />
                        <label for="bank_ac" class="input__label @error('bank_ac') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" title="** Bank AC must be 13 digites"></label>
                        @if ($errors->has('bank_ac'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bank_ac') }}</strong>
                            </span>
                        @endif
                   </span>
                </div>
                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Update Bank Info</button>
                </div>
            </form>

        </div>
    </div>



    // Nomineee


    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Your Nominee Details</h1>
        </div>

        <div class="user-profile-details" style="margin-top: 1rem" id="firstNominee">
            <h1 class="profile-heading" style="border-bottom: 2px solid #fff">First Nominee</h1>
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            {{--            <form action="{{URL::to('/bo-dashboard/nominee-info-save')}}" method="post">--}}
            <form action="{{URL::to('/client/nominee-info-save')}}" method="post">
                <input type="hidden" class="input__field"  name="id" value="{{$bo_account->id}}"/>
                @csrf
                <div id="container">
                    <span class="input radio-input">
                        <select class="select-option" id="n1_title" name="n1_title">
                            <option value="" selected disabled>Select Title</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Ms">Ms</option>
                            <option value="Dr">Dr</option>
                        </select>
                        @if ($errors->has('n1_title'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_title') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('n1_title').value = '{{$bo_account->n1_title}}';
                    </script>

                    <span class="input">
                          <input type="text" class="input__field" id="n1_first_name" name="n1_first_name" value="{{$bo_account->n1_first_name}}" placeholder="First Name"/>
                          <label for="n1_first_name" class="input__label"></label>
                        @if ($errors->has('n1_first_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_first_name') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_last_name" name="n1_last_name" value="{{$bo_account->n1_last_name}}" placeholder="Last Name"/>
                        <label for="n1_last_name" class="input__label"></label>
                        @if ($errors->has('n1_last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_last_name') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_rel_with_ac_holder" name="n1_rel_with_ac_holder" value="{{$bo_account->n1_rel_with_ac_holder}}" placeholder="Relationship With A/C Holder"/>
                        <label for="n1_rel_with_ac_holder" class="input__label"></label>
                        @if ($errors->has('n1_rel_with_ac_holder'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_rel_with_ac_holder') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_percentage" name="n1_percentage" value="{{$bo_account->n1_percentage}}" placeholder="Percentage(%)"/>
                        <label for="n1_percentage" class="input__label" ></label>
                        @if ($errors->has('n1_percentage'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_percentage') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input radio-input">
                        <select class="select-option" id="n1_residency" name="n1_residency" >
                            <option value="" selected disabled>Select Resident</option>
                            <option value="1">Resident</option>
                            <option value="0">Non-Resident</option>
                        </select>
                        @if ($errors->has('n1_residency'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_residency') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('n1_residency').value = '{{$bo_account->n1_residency}}';
                    </script>

                    <span class="input">
                        <input class="input__field datepicker" id="n1_date_of_birth" name="n1_date_of_birth" value="{{$bo_account->n1_date_of_birth}}" placeholder="Date of Birth"/>
                        <label for="n1_date_of_birth" class="input__label" ></label>
                        @if ($errors->has('n1_date_of_birth'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_date_of_birth') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_nid" name="n1_nid" value="{{$bo_account->n1_nid}}" placeholder="NID"/>
                        <label for="n1_nid" class="input__label" ></label>
                        @if ($errors->has('n1_nid'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_nid') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_address" name="n1_address" value="{{$bo_account->n1_address}}" placeholder="Address"/>
                        <label for="n1_address" class="input__label" ></label>
                        @if ($errors->has('n1_address'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_address') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input radio-input">
                        <select class="select-option" id="n1_city" name="n1_city" >
                            <option value="" >Select N1 City</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('n1_city'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_city') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('n1_city').value = '{{$bo_account->n1_city}}';
                    </script>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_post_code" name="n1_post_code" value="{{$bo_account->n1_post_code}}" placeholder="Post Code"/>
                        <label for="n1_post_code" class="input__label" ></label>
                        @if ($errors->has('n1_post_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_post_code') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_division" name="n1_division" value="{{$bo_account->n1_division}}" placeholder="Division"/>
                        <label for="n1_division" class="input__label" ></label>
                        @if ($errors->has('n1_division'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_division') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_country" name="n1_country" value="{{$bo_account->n1_country}}" placeholder="Country"/>
                        <label for="n1_country" class="input__label" ></label>
                        @if ($errors->has('n1_country'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_country') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_mobile" name="n1_mobile" value="{{$bo_account->n1_mobile}}" placeholder="Mobile"/>
                        <label for="n1_mobile" class="input__label" ></label>
                        @if ($errors->has('n1_mobile'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_mobile') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_tel" name="n1_tel" value="{{$bo_account->n1_tel}}" placeholder="Tel"/>
                        <label for="n1_tel" class="input__label" ></label>
                        @if ($errors->has('n1_tel'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_tel') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_fax" name="n1_fax" value="{{$bo_account->n1_fax}}" placeholder="Fax"/>
                        <label for="n1_fax" class="input__label" ></label>
                        @if ($errors->has('n1_fax'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_fax') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="n1_email" name="n1_email" value="{{$bo_account->n1_email}}" placeholder="E-mail"/>
                        <label for="n1_email" class="input__label" ></label>
                        @if ($errors->has('n1_email'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_email') }}</strong>
                            </span>
                        @endif
                    </span>
                </div>
                <div style="display: flex; padding: 1rem; border: 1px solid #ffffff; margin: 1rem">
                    <div style="width: 88%">
                        <h2>Do you want to Add First Nominee Guardian (If Nominee is A Minor)?</h2>
                    </div>
                    <div style="width: 12%; display: flex; padding-top: 12px">
                        <label class="radio-label"><input class="radio-input-btn" type="radio" name="n1g" value="1" id="firstNomineeYesMinor" {{$bo_account->n1g == 1 ? 'checked' : ''}} ><span>YES</span></label>
                        <label class="radio-label"><input class="radio-input-btn" type="radio" name="n1g" value="0" id="firstNomineeNotMinor" {{$bo_account->n1g == 0 ? 'checked' : ''}}><span>NO</span></label>
                    </div>
                </div>


                <div class="user-profile-details" style="margin-top: 1rem" id="firstNomineeMinor">
                    <div style="width: 100%; background: #ffffff; height: 5px; border-radius: 5px"></div>
                    <h1 class="profile-heading" style="border-bottom: 2px solid #fff">First Nominee Guardian [If Nominee is A Minor]</h1>

                    <div id="container">
                        <span class="input radio-input">
                            <select class="select-option" id="n1g_title" name="n1g_title">
                                <option value="" selected disabled>Select Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Ms">Ms</option>
                                <option value="Dr">Dr</option>
                            </select>
                            @if ($errors->has('n1g_title'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_title') }}</strong>
                            </span>
                            @endif
                        </span>
                        <script>
                            document.getElementById('n1g_title').value = '{{$bo_account->n1g_title}}';
                        </script>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_first_name" name="n1g_first_name" value="{{$bo_account->n1g_first_name}}" placeholder="First Name"/>
                            <label for="n1g_first_name" class="input__label"></label>
                            @if ($errors->has('n1g_first_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_first_name') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_last_name" name="n1g_last_name" value="{{$bo_account->n1g_last_name}}" placeholder="Last Name"/>
                            <label for="n1g_last_name" class="input__label"></label>
                            @if ($errors->has('n1g_last_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_last_name') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_rel_with_ac_holder" name="n1g_rel_with_ac_holder" value="{{$bo_account->n1g_rel_with_ac_holder}}" placeholder="Relationship With A/C Holder"/>
                            <label for="n1g_rel_with_ac_holder" class="input__label"></label>
                            @if ($errors->has('n1g_rel_with_ac_holder'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_rel_with_ac_holder') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_percentage" name="n1g_percentage" value="{{$bo_account->n1g_percentage}}" placeholder="Percentage(%)"/>
                            <label for="n1g_percentage" class="input__label" ></label>
                            @if ($errors->has('n1g_percentage'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_percentage') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input radio-input">
                            <select class="select-option" id="n1g_residency" name="n1g_residency">
                                <option value="" selected disabled>Select Resident</option>
                                <option value="1">Resident</option>
                                <option value="0">Non-Resident</option>
                            </select>
                             @if ($errors->has('n1g_residency'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_residency') }}</strong>
                            </span>
                            @endif
                        </span>
                        <script>
                            document.getElementById('n1g_residency').value = '{{$bo_account->n1g_residency}}';
                        </script>

                        <span class="input">
                            <input class="input__field datepicker" id="n1g_date_of_birth" name="n1g_date_of_birth" value="{{$bo_account->n1g_date_of_birth}}" placeholder="Date of Birth"/>
                            <label for="n1g_date_of_birth" class="input__label" ></label>
                            @if ($errors->has('n1g_date_of_birth'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_date_of_birth') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_nid" name="n1g_nid" value="{{$bo_account->n1g_nid}}" placeholder="NID"/>
                            <label for="n1g_nid" class="input__label" ></label>
                            @if ($errors->has('n1g_nid'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_nid') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_address" name="n1g_address" value="{{$bo_account->n1g_address}}" placeholder="Address"/>
                            <label for="n1g_address" class="input__label" ></label>
                            @if ($errors->has('n1g_address'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_address') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input radio-input">
                        <select class="select-option" id="n1g_city" name="n1g_city" >
                            <option value="" >Select N1G City</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                            @if ($errors->has('n1g_city'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_city') }}</strong>
                            </span>
                            @endif
                    </span>
                        <script>
                            document.getElementById('n1g_city').value = '{{$bo_account->n1g_city}}';
                        </script>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_post_code" name="n1g_post_code" value="{{$bo_account->n1g_post_code}}" placeholder="Post Code"/>
                            <label for="n1g_post_code" class="input__label" ></label>
                            @if ($errors->has('n1g_post_code'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_post_code') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_division" name="n1g_division" value="{{$bo_account->n1g_division}}" placeholder="Division"/>
                            <label for="n1g_division" class="input__label" ></label>
                            @if ($errors->has('n1g_division'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_division') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_division" name="n1g_country" value="{{$bo_account->n1g_country}}" placeholder="Country"/>
                            <label for="n1g_division" class="input__label" ></label>
                            @if ($errors->has('n1g_country'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_country') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_mobile" name="n1g_mobile" value="{{$bo_account->n1g_mobile}}" placeholder="Mobile"/>
                            <label for="n1g_mobile" class="input__label" ></label>
                            @if ($errors->has('n1g_mobile'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_mobile') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_tel" name="n1g_tel" value="{{$bo_account->n1g_tel}}" placeholder="Phone"/>
                            <label for="n1g_tel" class="input__label" ></label>
                            @if ($errors->has('n1g_tel'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_tel') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_fax" name="n1g_fax" value="{{$bo_account->n1g_fax}}" placeholder="Fax"/>
                            <label for="n1g_fax" class="input__label" ></label>
                            @if ($errors->has('n1g_fax'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_fax') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="n1g_email" name="n1g_email" value="{{$bo_account->n1g_email}}" placeholder="E-mail"/>
                            <label for="n1g_email" class="input__label" ></label>
                            @if ($errors->has('n1g_email'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_email') }}</strong>
                            </span>
                            @endif
                        </span>
                    </div>
                </div>
                {{--Second Nominee Add--}}

                <div style="display: flex; padding: 1rem; border: 1px solid #ffffff; margin: 1rem">
                    <div style="width: 88%">
                        <h2>Do you want to Add Second Nominee? </h2>
                    </div>
                    <div style="width: 12%; display: flex; padding-top: 12px">
                        <label class="radio-label"><input class="radio-input-btn" type="radio" name="n2" value="1" id="SecondNomineeYes" {{$bo_account->n2 == 1 ? 'checked' : ''}} ><span>YES</span></label>
                        <label class="radio-label"><input class="radio-input-btn" type="radio" name="n2" value="0" id="SecondNomineeNot" {{$bo_account->n2 == 0 ? 'checked' : ''}} ><span>NO</span></label>
                    </div>
                </div>

                {{--            Second Nominee Form         --}}

                <div id="secondNominee">
                    <div style="width: 100%; background: #ffffff; height: 5px; border-radius: 5px"></div>
                    <h1 class="profile-heading" style="border-bottom: 2px solid #fff">Second Nominee</h1>
                    <div id="container">
                    <span class="input radio-input">
                        <select class="select-option" id="n2_title" name="n2_title">
                            <option value="" selected disabled>Select Title</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Ms">Ms</option>
                            <option value="Dr">Dr</option>
                        </select>
                        @if ($errors->has('n2_title'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_title') }}</strong>
                            </span>
                        @endif
                    </span>
                        <script>
                            document.getElementById('n2_title').value = '{{$bo_account->n2_title}}';
                        </script>

                        <span class="input">
                          <input type="text" class="input__field" id="n2_first_name" name="n2_first_name" value="{{$bo_account->n2_first_name}}" placeholder="First Name"/>
                          <label for="n2_first_name" class="input__label"></label>
                            @if ($errors->has('n2_first_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_first_name') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_last_name" name="n2_last_name" value="{{$bo_account->n2_last_name}}" placeholder="Last Name"/>
                        <label for="n2_last_name" class="input__label"></label>
                            @if ($errors->has('n2_last_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_last_name') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_rel_with_ac_holder" name="n2_rel_with_ac_holder" value="{{$bo_account->n2_rel_with_ac_holder}}" placeholder="Relationship With A/C Holder"/>
                        <label for="n2_rel_with_ac_holder" class="input__label"></label>
                            @if ($errors->has('n2_rel_with_ac_holder'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_rel_with_ac_holder') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_percentage" name="n2_percentage" value="{{$bo_account->n2_percentage}}" placeholder="Percentage(%)"/>
                        <label for="n2_percentage" class="input__label" ></label>
                            @if ($errors->has('n2_percentage'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_percentage') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input radio-input">
                        <select class="select-option" id="n2_residency" name="n2_residency">
                            <option value="" selected disabled>Select Resident</option>
                            <option value="1">Resident</option>
                            <option value="0">Non-Resident</option>
                        </select>
                            @if ($errors->has('n2_residency'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_residency') }}</strong>
                            </span>
                            @endif
                    </span>
                        <script>
                            document.getElementById('n2_residency').value = '{{$bo_account->n2_residency}}';
                        </script>

                        <span class="input">
                        <input class="input__field datepicker" id="n2_date_of_birth" name="n2_date_of_birth" value="{{$bo_account->n2_date_of_birth}}" placeholder="Date of Birth"/>
                        <label for="n2_date_of_birth" class="input__label" ></label>
                            @if ($errors->has('n2_date_of_birth'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_date_of_birth') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_nid" name="n2_nid" value="{{$bo_account->n2_nid}}" placeholder="NID"/>
                        <label for="n2_nid" class="input__label" ></label>
                            @if ($errors->has('n2_nid'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_nid') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_address" name="n2_address" value="{{$bo_account->n2_address}}" placeholder="Address"/>
                        <label for="n2_address" class="input__label" ></label>
                            @if ($errors->has('n2_address'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_address') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input radio-input">
                        <select class="select-option" id="n2_city" name="n2_city" >
                            <option value="" >Select N1 City</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                            @if ($errors->has('n2_city'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_city') }}</strong>
                            </span>
                            @endif
                    </span>
                        <script>
                            document.getElementById('n2_city').value = '{{$bo_account->n2_city}}';
                        </script>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_post_code" name="n2_post_code" value="{{$bo_account->n2_post_code}}" placeholder="Post Code"/>
                        <label for="n2_post_code" class="input__label" ></label>
                            @if ($errors->has('n2_post_code'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_post_code') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_division" name="n2_division" value="{{$bo_account->n2_division}}" placeholder="Division"/>
                        <label for="n2_division" class="input__label" ></label>
                             @if ($errors->has('n2_division'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_division') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_country" name="n2_country" value="{{$bo_account->n2_country}}" placeholder="Country"/>
                        <label for="n2_country" class="input__label" ></label>
                            @if ($errors->has('n2_country'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_country') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_mobile" name="n2_mobile" value="{{$bo_account->n2_mobile}}" placeholder="Mobile"/>
                        <label for="n2_mobile" class="input__label" ></label>
                            @if ($errors->has('n2_mobile'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_mobile') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_tel" name="n2_tel" value="{{$bo_account->n2_tel}}" placeholder="Phone"/>
                        <label for="n2_tel" class="input__label" ></label>
                             @if ($errors->has('n2_tel'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_tel') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_fax" name="n2_fax" value="{{$bo_account->n2_fax}}" placeholder="Fax"/>
                        <label for="n2_fax" class="input__label" ></label>
                            @if ($errors->has('n2_fax'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_fax') }}</strong>
                            </span>
                            @endif
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_email" name="n2_email" value="{{$bo_account->n2_email}}" placeholder="E-mail"/>
                        <label for="n2_email" class="input__label" ></label>
                            @if ($errors->has('n2_email'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_email') }}</strong>
                            </span>
                            @endif
                    </span>
                    </div>
                    <div style="display: flex; padding: 1rem; border: 1px solid #ffffff; margin: 1rem">
                        <div style="width: 88%">
                            <h2>Do you want to Add Nominee 1 Guardian (If Nominee is A Minor))?</h2>
                        </div>
                        <div style="width: 12%; display: flex; padding-top: 12px">
                            <label class="radio-label"><input class="radio-input-btn" type="radio" name="n2g" value="1" id="secondNomineeYesMinor" {{$bo_account->n2g == 1 ? 'checked' : ''}} ><span>YES</span></label>
                            <label class="radio-label"><input class="radio-input-btn" type="radio" name="n2g" value="0" id="secondNomineeNotMinor" {{$bo_account->n2g == 0 ? 'checked' : ''}} ><span>NO</span></label>
                        </div>
                    </div>

                    <div style="width: 100%; background: #ffffff; height: 5px; border-radius: 5px"></div>
                    <div class="user-profile-details" style="margin-top: 1rem" id="secondNomineeMinor">
                        <h1 class="profile-heading" style="border-bottom: 2px solid #fff">Second Nominee Guardian [If Nominee is A Minor]</h1>

                        <div id="container">
                        <span class="input radio-input">
                            <select class="select-option" id="n2g_title" name="n2g_title">
                                <option value="" selected disabled>Select Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Ms">Ms</option>
                                <option value="Dhaka">Dr</option>
                            </select>
                            @if ($errors->has('n2g_title'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_title') }}</strong>
                            </span>
                            @endif
                        </span>
                            <script>
                                document.getElementById('n2g_title').value = '{{$bo_account->n2g_title}}';
                            </script>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_first_name" name="n2g_first_name" value="{{$bo_account->first_name}}" placeholder="First Name"/>
                            <label for="n2g_first_name" class="input__label"></label>
                                @if ($errors->has('n2g_first_name'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_first_name') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_last_name" name="n2g_last_name" value="{{$bo_account->n2g_last_name}}" placeholder="Last Name"/>
                            <label for="n2g_last_name" class="input__label"></label>
                                @if ($errors->has('n2g_last_name'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_last_name') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_rel_with_ac_holder" name="n2g_rel_with_ac_holder" value="{{$bo_account->n2g_rel_with_ac_holder}}" placeholder="Relationship With A/C Holder"/>
                            <label for="n2g_rel_with_ac_holder" class="input__label"></label>
                                @if ($errors->has('n2g_rel_with_ac_holder'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_rel_with_ac_holder') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_percentage" name="n2g_percentage" value="{{$bo_account->n2g_percentage}}" placeholder="Percentage(%)"/>
                            <label for="n2g_percentage" class="input__label" ></label>
                                @if ($errors->has('n2g_percentage'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_percentage') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input radio-input">
                            <select class="select-option" id="n2g_residency" name="n2g_residency">
                                <option value="" selected disabled>Select Resident</option>
                                <option value="1">Resident</option>
                                <option value="0">Non-Resident</option>
                            </select>
                                @if ($errors->has('n2g_residency'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_residency') }}</strong>
                            </span>
                                @endif
                        </span>
                            <script>
                                document.getElementById('n2g_residency').value = '{{$bo_account->n2g_residency}}';
                            </script>

                            <span class="input">
                            <input class="input__field datepicker" id="n2g_date_of_birth" name="n2g_date_of_birth" value="{{$bo_account->n2g_date_of_birth}}" placeholder="Date of Birth"/>
                            <label for="n2g_date_of_birth" class="input__label" ></label>
                                @if ($errors->has('n2g_date_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_date_of_birth') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_nid" name="n2g_nid" value="{{$bo_account->n2g_nid}}" placeholder="NID"/>
                            <label for="n2g_nid" class="input__label" ></label>
                                @if ($errors->has('n2g_nid'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_nid') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_address" name="n2g_address" value="{{$bo_account->n2g_address}}" placeholder="Address"/>
                            <label for="n2g_address" class="input__label" ></label>
                                @if ($errors->has('n2g_address'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_address') }}</strong>
                            </span>
                                @endif
                        </span>


                            <span class="input radio-input">
                                <select class="select-option" id="n2g_city" name="n2g_city" >
                                    <option value="" >Select N2G City</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('n2g_city'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_city') }}</strong>
                            </span>
                                @endif
                            </span>
                            <script>
                                document.getElementById('n2g_city').value = '{{$bo_account->n2g_city}}';
                            </script>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_post_code" name="n2g_post_code" value="{{$bo_account->n2g_post_code}}" placeholder="Post Code"/>
                            <label for="n2g_post_code" class="input__label" ></label>
                                @if ($errors->has('n2g_post_code'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_post_code') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_division" name="n2g_division" value="{{$bo_account->n2g_division}}" placeholder="Division"/>
                            <label for="n2g_division" class="input__label" ></label>
                                @if ($errors->has('n2g_division'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_division') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_country" name="n2g_country" value="{{$bo_account->n2g_country}}" placeholder="Country"/>
                            <label for="n2g_country" class="input__label" ></label>
                                @if ($errors->has('n2g_country'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_country') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_mobile" name="n2g_mobile" value="{{$bo_account->n2g_mobile}}" placeholder="Mobile"/>
                            <label for="n2g_mobile" class="input__label" ></label>
                                @if ($errors->has('n2g_mobile'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_mobile') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_tel" name="n2g_tel" value="{{$bo_account->n2g_tel}}" placeholder="Phone"/>
                            <label for="n2g_tel" class="input__label" ></label>
                                @if ($errors->has('n2g_tel'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_tel') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_fax" name="n2g_fax" value="{{$bo_account->n2g_fax}}" placeholder="Fax"/>
                            <label for="n2g_fax" class="input__label" ></label>
                                @if ($errors->has('n2g_fax'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_fax') }}</strong>
                            </span>
                                @endif
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_email" name="n2g_email" value="{{$bo_account->n2g_email}}" placeholder="E-mail"/>
                            <label for="n2g_email" class="input__label" ></label>
                                @if ($errors->has('n2g_email'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_email') }}</strong>
                            </span>
                                @endif
                        </span>
                        </div>
                    </div>
                </div>
                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Save and Continue</button>
                </div>
            </form>
        </div>
    </div>

    // Document Upload

    <div class="bo-container">
        <h1 class="profile-heading">Upload Documents</h1>
        <div class="row profile-view-select" style="margin: 0;">
            <div class="col-md-10" style="padding: 0" data-toggle="tooltip" data-placement="top" title="CHECK TO VIEW INFO" >
                <h4>First A/C Holder</h4>
                <h4>Joint A/C Holder</h4>
            </div>
            <div class="col-md-2" style="display: flex; flex-direction: column; justify-content: flex-end !important;">
                <input type="checkbox" name="ne" id="firstHolderDocument" class="checkBox" checked>
                <input type="checkbox" name="ne" id="joinHolderDocument" class="checkBox">
            </div>
        </div>

        <div class="user-profile-details" style="margin-top: 2rem;">
            <div id="documentDetailsFirstAC" style="padding-bottom: 5rem">
                <div class="row documents" style="margin: 0">
                    {{--                    <form action="{{URL::to('/bo-dashboard/first-ac-holder-image')}}" method="post" enctype="multipart/form-data">--}}
                    <form action="{{URL::to('/client/first-ac-holder-image-change-request')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bo_id" value="{{$bo_account->id}}">
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="ac_image_holder" src="{{$bo_account->ac_holder_image != Null ? asset('public/'.$bo_account->ac_holder_image) : './public/images/no_image.png'}}"/>
                                <div class="documents-description">
                                    <h4>First A/C Holder</h4>
                                    <p>First A/C Holder Image</p>
                                </div>
                                <input type='file' name="first_ac_holder_image" onchange="preview_ac_image_holder()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--                    <form action="{{URL::to('/bo-dashboard/front-page-nid-image')}}" method="post" enctype="multipart/form-data">--}}
                    <form action="{{URL::to('/client/first-ac-holder-front-page-nid-image-change-request')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bo_id" value="{{$bo_account->id}}">
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="pass_driving_img_font" src="{{$bo_account->front_page_nid_image != Null ? asset('public/'.$bo_account->front_page_nid_image) : './public/images/no_image.png'}}"/>
                                <div class="documents-description">
                                    <h4>First A/C Holder</h4>
                                    <p>Font Page of NID/Passport/Driving Licence</p>
                                </div>
                                <input type='file' name="ac_holder_front_page_nid_image" onchange="preview_pass_driving_img_font()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--                    <form action="{{URL::to('/bo-dashboard/back-page-nid-image')}}" method="post" enctype="multipart/form-data">--}}
                    <form action="{{URL::to('/client/first-ac-holder-back-page-nid-image-change-request')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bo_id" value="{{$bo_account->id}}">
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="pass_driving_img_font_back" src="{{$bo_account->back_page_nid_image != Null ? asset('public/'.$bo_account->back_page_nid_image) : './public/images/no_image.png'}}" />
                                <div class="documents-description">
                                    <h4>First A/C Holder</h4>
                                    <p>Back Page of NID/Passport/Driving Licence</p>
                                </div>
                                <input type='file' name="ac_holder_back_page_nid_image" onchange="preview_pass_driving_img_back()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--                    <form action="{{URL::to('/bo-dashboard/ac-holder-signature-image')}}" method="post" enctype="multipart/form-data">--}}
                    <form action="{{URL::to('/client/first-ac-holder-signature-image-change-request')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bo_id" value="{{$bo_account->id}}">
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="holder_signature" src="{{$bo_account->ac_holder_signature != Null ? asset('public/'.$bo_account->ac_holder_signature) : './public/images/no_image.png'}}"/>
                                <div class="documents-description">
                                    <h4>First A/C Holder</h4>
                                    <p>First A/C Holder Signature</p>
                                </div>
                                <input type='file' name="ac_holder_signature" onchange="preview_holder_signature()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="documentDetailsJointAC" style="margin-top: 2rem; padding-bottom: 5rem">
                <div class="row documents" style="margin: 0">
                    {{--                    <form action="{{URL::to('/bo-dashboard/join-ac-holder-image')}}" method="post" enctype="multipart/form-data">--}}
                    <form action="{{URL::to('/client/joint-ac-holder-image-change-request')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bo_id" value="{{$bo_account->id}}">
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="joint_holder_img" src="{{$bo_account->join_ac_holder_image != Null ? asset('public/'.$bo_account->join_ac_holder_image) : './public/images/no_image.png'}}" />
                                <div class="documents-description">
                                    <h4>Joint A/C Holder</h4>
                                    <p>Joint A/C Holder Image</p>
                                </div>
                                <input type='file' name="joint_ac_holder_image" onchange="preview_joint_holder_img()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--                    <form action="{{URL::to('/bo-dashboard/join-front-page-nid-image')}}" method="post" enctype="multipart/form-data">--}}
                    <form action="{{URL::to('/client/joint-ac-holder-front-page-nid-image-change-request')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bo_id" value="{{$bo_account->id}}">
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="joint_pass_driving_font" src="{{$bo_account->join_front_page_nid_image != Null ? asset('public/'.$bo_account->join_front_page_nid_image) : './public/images/no_image.png'}}"/>
                                <div class="documents-description">
                                    <h4>Joint A/C Holder</h4>
                                    <p>Font Page of NID/Passport/Driving Licence</p>
                                </div>
                                <input type='file' name="joint_ac_holder_front_page_nid_image" onchange="preview_joint_pass_driving_font()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--                    <form action="{{URL::to('/bo-dashboard/join-back-page-nid-image')}}" method="post" enctype="multipart/form-data">--}}
                    <form action="{{URL::to('/client/joint-ac-holder-back-page-nid-image-change-request')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bo_id" value="{{$bo_account->id}}">
                        <div class="col-md-3 pd">
                            <div id="joint_pass_driving_back" class="profile-document-img-div">
                                <img id="joint_pass_driving_back_image" src="{{$bo_account->join_back_page_nid_image != Null ? asset('public/'.$bo_account->join_back_page_nid_image) : './public/images/no_image.png'}}"/>
                                <div class="documents-description">
                                    <h4>Joint A/C Holder</h4>
                                    <p>Back Page of NID/Passport/Driving Licence</p>
                                </div>
                                <input type='file' name="joint_ac_holder_back_page_nid_image" onchange="preview_joint_pass_driving_back()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--                    <form action="{{URL::to('/bo-dashboard/join-ac-holder-signature')}}" method="post" enctype="multipart/form-data">--}}
                    <form action="{{URL::to('/client/joint-ac-holder-signature-image-change-request')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bo_id" value="{{$bo_account->id}}">
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="joint_signature" src="{{$bo_account->join_ac_holder_signature != Null ? asset('public/'.$bo_account->join_ac_holder_signature) : './public/images/no_image.png'}}" />
                                <div class="documents-description">
                                    <h4>Joint A/C Holder</h4>
                                    <p>Joint A/C Holder Signature</p>
                                </div>
                                <input type='file' name="joint_ac_holder_signature" onchange="preview_joint_signature()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>flatpickr(".datepicker", {});</script>

    <script>
        function bo_city_upate_change(){
            var bo_city_id = $('#bo_city_update').val();
            var op= " ";
            op +='<option value="0">--Chose Branch--</option>';
            $.ajax({
                type:'get',
                url: '{!! URL::to('/bo-account/get-cities') !!}',
                data:{'id':bo_city_id},
                success:function (data) {
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('#bo_branch_update').html(op);
                }
            });

        }
    </script>
    <script>
        $(".non-resident-check").hide;

        $('input[type="radio"]').click(function () {
            if ($(this).attr("value") == "1") {
                $(".non-resident-check").hide();
            }
            if ($(this).attr("value") == "0") {
                $(".non-resident-check").show();

            }
        });

        $('input[type="radio"]').trigger('click');
    </script>

@endsection
