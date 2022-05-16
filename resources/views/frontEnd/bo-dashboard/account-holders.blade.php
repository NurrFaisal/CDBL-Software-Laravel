@extends('frontEnd.bo-dashboard')
@section('title') Account Holders @endsection
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


    <form action="{{URL::to('/bo-dashboard/add-account-holder-save')}}" method="post">
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
                          <input type="text" class="input__field" id="input-1" name="first_name" value="{{$bo_account->first_name}}" placeholder="First Name"/>
                          <label for="input-1" class="input__label"></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-2" name="last_name" value="{{$bo_account->last_name}}" placeholder="Last Name"/>
                        <label for="input-2" class="input__label"></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-3" name="occupation" value="{{$bo_account->occupation}}" placeholder="Occupation"/>
                        <label for="input-3" class="input__label"></label>
                    </span>

                    <span class="input">
                        <input type="date" class="input__field datepicker" id="input-4" name="date_of_birth" value="{{$bo_account->date_of_birth}}" placeholder="Date Of Birth"/>
                        <label for="input-4" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-5" name="fathers_name" value="{{$bo_account->fathers_name}}" placeholder="Father's/Husband Name"/>
                        <label for="input-5" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-6" name="mothers_name" value="{{$bo_account->mothers_name}}" placeholder="Mother's Name"/>
                        <label for="input-6" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-7" name="contact_address" value="{{$bo_account->contact_address}}" placeholder="Address"/>
                        <label for="input-7" class="input__label" ></label>
                    </span>

{{--                    <span class="input">--}}
{{--                        <input type="text" class="input__field" id="input-8" name="city" value="{{$bo_account->city}}" placeholder="City"/>--}}
{{--                        <label for="input-8" class="input__label" ></label>--}}
{{--                    </span>--}}
                    <span class="input radio-input" >
                        <select class="select-option" id="bo_city_update" onchange="bo_city_upate_change()"  name="city">
                            <option value="" selected disabled>District Name</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('bo_city_update').value = '{{$bo_account->city}}';
                        </script>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-9" name="post_code" value="{{$bo_account->post_code}}" placeholder="Post Code"/>
                        <label for="input-9" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-10" name="division" value="{{$bo_account->division}}" placeholder="Division"/>
                        <label for="input-10" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-11" name="country" value="{{$bo_account->country}}" placeholder="Country"/>
                        <label for="input-11" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-12" name="mobile" readonly style="background-color: #cecece;" value="{{$bo_account->mobile}}" placeholder="Mobile"/>
                        <label for="input-12" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-13" name="tel" value="{{$bo_account->tel}}" placeholder="Tel"/>
                        <label for="input-13" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-14" name="fax" value="{{$bo_account->fax}}"  placeholder="Fax"/>
                        <label for="input-14" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-15" name="email" readonly style="background-color: #cecece;" value="{{$bo_account->email}}" placeholder="E-mail"/>
                        <label for="input-15" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-16" name="nationality" value="{{$bo_account->nationality}}" placeholder="Nationality"/>
                        <label for="input-16" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-17" name="nid" value="{{$bo_account->nid}}" placeholder="NID"/>
                        <label for="input-17" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-18" name="tin" value="{{$bo_account->tin}}" placeholder="TIN"/>
                        <label for="input-18" class="input__label" ></label>
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
                          <input type="text" class="input__field" id="fstName" name="join_first_name" value="{{$bo_account->join_first_name}}" placeholder="First Name" />
                          <label for="fstName" class="input__label"></label>
                    </span>
                    <span class="input">
                        <input type="text" class="input__field" id="lstName" name="join_last_name" value="{{$bo_account->join_last_name}}" placeholder="Last Name"/>
                        <label for="lstName" class="input__label"></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="occupation" name="join_occupation" value="{{$bo_account->join_occupation}}" placeholder="Occupation" />
                        <label for="occupation" class="input__label"></label>
                    </span>

                    <span class="input">
                        <input type="date" class="input__field datepicker" id="date" name="join_date_of_birth" value="{{$bo_account->join_date_of_birth}}" placeholder="Date Of Birth"/>
                        <label for="date" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="F'name" name="join_fathers_name" value="{{$bo_account->join_fathers_name}}" placeholder="Father's/Husband Name"/>
                        <label for="F'name" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="M'name" name="join_mothers_name" value="{{$bo_account->join_mothers_name}}" placeholder="Mother's Name"/>
                        <label for="M'name" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="address" name="join_contact_address" value="{{$bo_account->join_contact_address}}" placeholder="Address"/>
                        <label for="address" class="input__label" ></label>
                    </span>
                   <span class="input radio-input" >
                        <select class="select-option" id="bo_join_city_update"  name="join_city">
                            <option value="" selected disabled>District Name</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('bo_join_city_update').value = '{{$bo_account->join_city}}';
                        </script>
                   </span>

                    <span class="input">
                        <input type="text" class="input__field" id="pCode" name="join_post_code" value="{{$bo_account->join_post_code}}" placeholder="Post Code"/>
                        <label for="pCode" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="division" name="join_division" value="{{$bo_account->join_division}}" placeholder="Division"/>
                        <label for="division" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="country" name="join_country" value="{{$bo_account->join_country}}" placeholder="Country"/>
                        <label for="country" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="mobile" name="join_mobile" value="{{$bo_account->join_mobile}}" placeholder="Mobile"/>
                        <label for="mobile" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="phone" name="join_tel" value="{{$bo_account->join_tel}}" placeholder="Tel"/>
                        <label for="phone" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="fax" name="join_fax" value="{{$bo_account->join_fax}}" placeholder="Fax"/>
                        <label for="fax" class="input__label" ></label>
                    </span>

                    <span class="input">
                        <input type="email" class="input__field" id="eMail" name="join_email" value="{{$bo_account->join_email}}" placeholder="E-mail"/>
                        <label for="eMail" class="input__label" ></label>
                    </span>
                    </div>
                </div>
                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Save and Continue</button>
                </div>
        </div>
    </div>
    </form>

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
    <script>
        flatpickr(".datepicker", {
            allowInput: true
        });
    </script>

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

    // Bank Info

    <script>
        function getBankBranch(){
            $('#bank_branch_routing_no').val('')
            var bank_city_id = $('#bank_city').val();
            var op= " ";
            op +='<option value="0">Select Your Bank Branch</option>';
            $.ajax({
                type:'get',
                url: '{!! URL::to('/bo-account/get-bank-branch') !!}',
                data:{'bank_branch_district_id':bank_city_id},
                success:function (data) {
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('#bank_branch').html(op);
                    mydata = data
                }
            });
        }
    </script>
    <script>
        function getBrankBranchRoutingNo(){
            var bank_branch_id = $('#bank_branch').val();
            var bank_routing = mydata[0].bank_routing
            $('#bank_branch_routing_no').val(bank_routing)

        }
    </script>

@endsection
