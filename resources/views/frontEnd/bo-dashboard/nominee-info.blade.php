@extends('frontEnd.bo-dashboard')
@section('title') Nominee Information @endsection
@section('mainContent')

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

    <style>
        .dropdown-error{
            top: 100% !important;
            margin-top: 5px;
        }
    </style>




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
            <form action="{{URL::to('/bo-dashboard/nominee-info-save')}}" method="post">
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
                            <span class="invalid-feedback dropdown-error" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_title') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('n1_title').value = '{{$bo_account->n1_title}}';
                    </script>

                    <span class="input">
                          <input type="text" class="input__field" id="input-1" name="n1_first_name" value="{{$bo_account->n1_first_name}}" placeholder="First Name"/>
                          <label for="input-1" class="input__label"></label>
                        @if ($errors->has('n1_first_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_first_name') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-2" name="n1_last_name" value="{{$bo_account->n1_last_name}}" placeholder="Last Name"/>
                        <label for="input-2" class="input__label"></label>
                        @if ($errors->has('n1_last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_last_name') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-3" name="n1_rel_with_ac_holder" value="{{$bo_account->n1_rel_with_ac_holder}}" placeholder="Relationship With A/C Holder"/>
                        <label for="input-3" class="input__label"></label>
                        @if ($errors->has('n1_rel_with_ac_holder'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_rel_with_ac_holder') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-4" name="n1_percentage" value="{{$bo_account->n1_percentage}}" placeholder="Percentage(%)"/>
                        <label for="input-4" class="input__label" ></label>
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
                            <span class="invalid-feedback dropdown-error" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_residency') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('n1_residency').value = '{{$bo_account->n1_residency}}';
                    </script>

                    <span class="input">
                        <input type="date" class="input__field datepicker" id="input-6" name="n1_date_of_birth" value="{{$bo_account->n1_date_of_birth}}" placeholder="Date of Birth"/>
                        <label for="input-6" class="input__label" ></label>
                        @if ($errors->has('n1_date_of_birth'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_date_of_birth') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-7" name="n1_nid" value="{{$bo_account->n1_nid}}" placeholder="NID"/>
                        <label for="input-7" class="input__label" ></label>
                        @if ($errors->has('n1_nid'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_nid') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-8" name="n1_address" value="{{$bo_account->n1_address}}" placeholder="Address"/>
                        <label for="input-8" class="input__label" ></label>
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
                            <span class="invalid-feedback dropdown-error" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_city') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('n1_city').value = '{{$bo_account->n1_city}}';
                    </script>

                    <span class="input">
                        <input type="text" class="input__field" id="input-9" name="n1_post_code" value="{{$bo_account->n1_post_code}}" placeholder="Post Code"/>
                        <label for="input-9" class="input__label" ></label>
                        @if ($errors->has('n1_post_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_post_code') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-10" name="n1_division" value="{{$bo_account->n1_division}}" placeholder="Division"/>
                        <label for="input-10" class="input__label" ></label>
                        @if ($errors->has('n1_division'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_division') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-11" name="n1_country" value="{{$bo_account->n1_country}}" placeholder="Country"/>
                        <label for="input-11" class="input__label" ></label>
                        @if ($errors->has('n1_country'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_country') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-12" name="n1_mobile" value="{{$bo_account->n1_mobile}}" placeholder="Mobile"/>
                        <label for="input-12" class="input__label" ></label>
                        @if ($errors->has('n1_mobile'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_mobile') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-13" name="n1_tel" value="{{$bo_account->n1_tel}}" placeholder="Tel"/>
                        <label for="input-13" class="input__label" ></label>
{{--                        @if ($errors->has('n1_tel'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_tel') }}</strong>
                            </span>
                        @endif--}}
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-14" name="n1_fax" value="{{$bo_account->n1_fax}}" placeholder="Fax"/>
                        <label for="input-14" class="input__label" ></label>
{{--                        @if ($errors->has('n1_fax'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_fax') }}</strong>
                            </span>
                        @endif--}}
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-15" name="n1_email" value="{{$bo_account->n1_email}}" placeholder="E-mail"/>
                        <label for="input-15" class="input__label" ></label>
{{--                        @if ($errors->has('n1_email'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1_email') }}</strong>
                            </span>
                        @endif--}}
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
                                <span class="invalid-feedback dropdown-error" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_title') }}</strong>
                            </span>
                            @endif
                        </span>
                        <script>
                            document.getElementById('n1g_title').value = '{{$bo_account->n1g_title}}';
                        </script>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor1" name="n1g_first_name" value="{{$bo_account->n1g_first_name}}" placeholder="First Name"/>
                            <label for="firstNomineeMinor1" class="input__label"></label>
                            @if ($errors->has('n1g_first_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_first_name') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor2" name="n1g_last_name" value="{{$bo_account->n1g_last_name}}" placeholder="Last Name"/>
                            <label for="firstNomineeMinor2" class="input__label"></label>
                            @if ($errors->has('n1g_last_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_last_name') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor3" name="n1g_rel_with_ac_holder" value="{{$bo_account->n1g_rel_with_ac_holder}}" placeholder="Relationship With A/C Holder"/>
                            <label for="firstNomineeMinor3" class="input__label"></label>
                            @if ($errors->has('n1g_rel_with_ac_holder'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_rel_with_ac_holder') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor4" name="n1g_percentage" value="{{$bo_account->n1g_percentage}}" placeholder="Percentage(%)"/>
                            <label for="firstNomineeMinor4" class="input__label" ></label>
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
                            <input type="date" class="input__field datepicker" id="firstNomineeMinor5" name="n1g_date_of_birth" value="{{$bo_account->n1g_date_of_birth}}" placeholder="Date of Birth"/>
                            <label for="firstNomineeMinor5" class="input__label" ></label>
                            @if ($errors->has('n1g_date_of_birth'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_date_of_birth') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor6" name="n1g_nid" value="{{$bo_account->n1g_nid}}" placeholder="NID"/>
                            <label for="firstNomineeMinor6" class="input__label" ></label>
                            @if ($errors->has('n1g_nid'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_nid') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor7" name="n1g_address" value="{{$bo_account->n1g_address}}" placeholder="Address"/>
                            <label for="firstNomineeMinor7" class="input__label" ></label>
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
                            <input type="text" class="input__field" id="firstNomineeMinor9" name="n1g_post_code" value="{{$bo_account->n1g_post_code}}" placeholder="Post Code"/>
                            <label for="firstNomineeMinor9" class="input__label" ></label>
                            @if ($errors->has('n1g_post_code'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_post_code') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor10" name="n1g_division" value="{{$bo_account->n1g_division}}" placeholder="Division"/>
                            <label for="firstNomineeMinor10" class="input__label" ></label>
                            @if ($errors->has('n1g_division'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_division') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor11" name="n1g_country" value="{{$bo_account->n1g_country}}" placeholder="Country"/>
                            <label for="firstNomineeMinor11" class="input__label" ></label>
                            @if ($errors->has('n1g_country'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_country') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor12" name="n1g_mobile" value="{{$bo_account->n1g_mobile}}" placeholder="Mobile"/>
                            <label for="firstNomineeMinor12" class="input__label" ></label>
                            @if ($errors->has('n1g_mobile'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_mobile') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor13" name="n1g_tel" value="{{$bo_account->n1g_tel}}" placeholder="Phone"/>
                            <label for="firstNomineeMinor13" class="input__label" ></label>
                            @if ($errors->has('n1g_tel'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_tel') }}</strong>
                            </span>
                            @endif
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor14" name="n1g_fax" value="{{$bo_account->n1g_fax}}" placeholder="Fax"/>
                            <label for="firstNomineeMinor14" class="input__label" ></label>
{{--                            @if ($errors->has('n1g_fax'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_fax') }}</strong>
                            </span>
                            @endif--}}
                        </span>

                        <span class="input">
                            <input type="text" class="input__field" id="firstNomineeMinor15" name="n1g_email" value="{{$bo_account->n1g_email}}" placeholder="E-mail"/>
                            <label for="firstNomineeMinor15" class="input__label" ></label>
{{--                            @if ($errors->has('n1g_email'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n1g_email') }}</strong>
                            </span>
                            @endif--}}
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
                        <input type="date" class="input__field datepicker" id="n2_date_of_birth" name="n2_date_of_birth" value="{{$bo_account->n2_date_of_birth}}" placeholder="Date of Birth"/>
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
{{--                             @if ($errors->has('n2_tel'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_tel') }}</strong>
                            </span>
                            @endif--}}
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_fax" name="n2_fax" value="{{$bo_account->n2_fax}}" placeholder="Fax"/>
                        <label for="n2_fax" class="input__label" ></label>
{{--                            @if ($errors->has('n2_fax'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_fax') }}</strong>
                            </span>
                            @endif--}}
                    </span>

                        <span class="input">
                        <input type="text" class="input__field" id="n2_email" name="n2_email" value="{{$bo_account->n2_email}}" placeholder="E-mail"/>
                        <label for="n2_email" class="input__label" ></label>
{{--                            @if ($errors->has('n2_email'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2_email') }}</strong>
                            </span>
                            @endif--}}
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
                            <input type="text" class="input__field" id="n2g_first_name" name="n2g_first_name" value="{{$bo_account->n2g_first_name}}" placeholder="First Name"/>
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
                            <input type="date" class="input__field datepicker" id="n2g_date_of_birth" name="n2g_date_of_birth" value="{{$bo_account->n2g_date_of_birth}}" placeholder="Date of Birth"/>
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
{{--                                @if ($errors->has('n2g_tel'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_tel') }}</strong>
                            </span>
                                @endif--}}
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_fax" name="n2g_fax" value="{{$bo_account->n2g_fax}}" placeholder="Fax"/>
                            <label for="n2g_fax" class="input__label" ></label>
{{--                                @if ($errors->has('n2g_fax'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_fax') }}</strong>
                            </span>
                                @endif--}}
                        </span>

                            <span class="input">
                            <input type="text" class="input__field" id="n2g_email" name="n2g_email" value="{{$bo_account->n2g_email}}" placeholder="E-mail"/>
                            <label for="n2g_email" class="input__label" ></label>
{{--                                @if ($errors->has('n2g_email'))
                                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('n2g_email') }}</strong>
                            </span>
                                @endif--}}
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



    <script>
        flatpickr(".datepicker", {
            allowInput: true
        });
    </script>
@endsection
