@extends('frontEnd.admin-dashboard')
@section('title') Add New User @endsection
@section('mainContent')

    <style>
        .profile-heading{
            border-bottom: 2px solid #ffffff;
        }
    </style>


    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Add New User</h1>
        </div>

        <div class="user-profile-details" style="margin-top: 1rem" id="individual">
            <form action="{{URL::to('/admin/add-user-registration')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">

                    <h1 class="profile-heading">Personal Details</h1>

                    <span class="input">
                          <input type="text" class="input__field" id="name" value="{{old('name')}}" name="name" placeholder="Name"/>
                          <label for="name" class="input__label"></label>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </span>
                    <span class="input">
                        <input type="text" class="input__field" id="fatherName" value="{{old('fathers_name')}}" name="fathers_name" placeholder="Father's Name"/>
                        <label for="fatherName" class="input__label"></label>
                        @if ($errors->has('fathers_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('fathers_name') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="motherName" value="{{old('mothers_name')}}" name="mothers_name" placeholder="Mother Name"/>
                        <label for="motherName" class="input__label"></label>
                        @if ($errors->has('mothers_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('mothers_name') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="mobile" value="{{old('mobile_one')}}" name="mobile_one" placeholder="Mobile One"/>
                        <label for="mobile" class="input__label" ></label>
                        @if ($errors->has('mobile_one'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('mobile_one') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="phone" value="{{old('mobile_two')}}" name="mobile_two" placeholder="Mobile Two"/>
                        <label for="phone" class="input__label" ></label>
                        @if ($errors->has('mobile_two'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('mobile_two') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="email" class="input__field" id="mail" value="{{old('email')}}" name="email" placeholder="E-mail"/>
                        <label for="mail" class="input__label" ></label>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input class="input__field datepicker" name="date_of_birth" id="dateBirth" placeholder="Date of Birth"/>
                        <label for="dateBirth" class="input__label" ></label>
                    </span>
                    @if ($errors->has('date_of_birth'))
                        <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('date_of_birth') }}</strong>
                            </span>
                    @endif
                    <span class="input radio-input">
                        <select class="select-option" id="gender" name="gender">
                            <option value="" selected disabled>Gender</option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('gender').value = '{{old('gender')}}';
                    </script>

                    <span class="input">
                        <input type="text" class="input__field" id="nid-passport" value="{{old('nid_passport')}}" name="nid_passport" placeholder="NID/Passport Number"/>
                        <label for="nid-passport" class="input__label" ></label>
                        @if ($errors->has('nid_passport'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('nid_passport') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="input-10" value="{{old('nationality')}}" name="nationality" placeholder="Nationality"/>
                        <label for="input-10" class="input__label" ></label>
                        @if ($errors->has('nationality'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('nationality') }}</strong>
                            </span>
                        @endif
                    </span>


                    <div class="clearfix"></div>
                    <h1 class="profile-heading">Present Address Details</h1>


                    <span class="input">
                        <input type="text" class="input__field" id="present-address" value="{{old('present_address')}}" name="present_address" placeholder="Address"/>
                        <label for="present-address" class="input__label" ></label>
                        @if ($errors->has('present_address'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('present_address') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="present_division" value="{{old('present_division')}}" name="present_division" placeholder="Present Division"/>
                        <label for="present_division" class="input__label" ></label>
                        @if ($errors->has('present_division'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('present_division') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input radio-input">
                        <select class="select-option" id="present_district" name="present_district">
                            <option value="" selected disabled>District</option>
                            @foreach($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('present_district'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('present_district') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('present_district').value = '{{old('present_district')}}';
                    </script>

                    <span class="input">
                        <input type="text" class="input__field" id="presentPostCode" value="{{old('present_post_code')}}" name="present_post_code" placeholder="Post Code"/>
                        <label for="presentPostCode" class="input__label" ></label>
                        @if ($errors->has('present_post_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('present_post_code') }}</strong>
                            </span>
                        @endif
                    </span>


                    <div class="clearfix"></div>
                    <h1 class="profile-heading">Permanent Address Details</h1>


                    <span class="input">
                        <input type="text" class="input__field" id="permanentAddress" value="{{old('permanent_address')}}" name="permanent_address" placeholder="Permanent Address"/>
                        <label for="permanentAddress" class="input__label" ></label>
                        @if ($errors->has('permanent_address'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('permanent_address') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="permanent_division" value="{{old('permanent_division')}}" name="permanent_division" placeholder="Permanent Division"/>
                        <label for="permanent_division" class="input__label" ></label>
                        @if ($errors->has('permanent_division'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('permanent_division') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input radio-input">
                        <select class="select-option" id="permanent_district" name="permanent_district">
                            <option value="" selected disabled>District</option>
                            @foreach($districts as $district)
                            <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('permanent_district'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('permanent_district') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('permanent_district').value = '{{old('permanent_district')}}';
                    </script>

                    <span class="input">
                        <input type="text" class="input__field" id="permanentPostCode" value="{{old('permanent_post_code')}}" name="permanent_post_code" placeholder="Permanent Post Code"/>
                        <label for="permanentPostCode" class="input__label" ></label>
                        @if ($errors->has('permanent_post_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('permanent_post_code') }}</strong>
                            </span>
                        @endif
                    </span>


                    <div class="clearfix"></div>
                    <h1 class="profile-heading">User Qualification & Designation</h1>


                    <span class="input">
                        <input type="text" class="input__field" id="last_qualification" value="{{old('last_qualification')}}" name="last_qualification" placeholder="Last Qualification"/>
                        <label for="last_qualification" class="input__label" ></label>
                        @if ($errors->has('last_qualification'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('last_qualification') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" id="employeeId" value="{{old('employee_id')}}" name="employee_id" placeholder="Employee Id"/>
                        <label for="employeeId" class="input__label" ></label>
                        @if ($errors->has('employee_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('employee_id') }}</strong>
                            </span>
                        @endif
                    </span>
                    <span class="input">
                        <input type="text" class="input__field" id="designation" value="{{old('designation')}}" name="designation" placeholder="Designation"/>
                        <label for="designation" class="input__label" ></label>
                        @if ($errors->has('designation'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('designation') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input radio-input">
                        <select class="select-option" id="branch" name="branch">
                            <option value="">Choose Branch</option>
                            @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('branch'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('branch') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('branch').value = '{{old('branch')}}';
                    </script>


                    <span class="input radio-input">
                        <select class="select-option" id="admin_type" name="admin_type" onchange="administatorDiv()">
                            <option value="">Admin Type</option>
                            @foreach($admin_types as $admin_type)
                            <option value="{{$admin_type->id}}">{{$admin_type->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('admin_type'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('admin_type') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('admin_type').value = '{{old('admin_type')}}';
                    </script>
                    <div class="clearfix"></div>
                    <h1 id="administator_heading" style="display: {{old('admin_type') == 4 ? '' : 'none'}} " class="profile-heading">Administator</h1>
                    <div id="administator_body" style="width: 100%;display: flex;justify-content: center; display: {{old('admin_type') == 4 ? '' : 'none'}}">
                        <span class="input radio-input">
                        <select class="select-option" id="operation_admin" name="operation_admin">
                            <option value="">Oparation Admin</option>
                            @foreach($users as $user)
                                @if($user->admin_type == 2)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                            @if ($errors->has('operation_admin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('operation_admin') }}</strong>
                                </span>
                            @endif

                    </span>
                        <script>
                            document.getElementById('operation_admin').value = '{{old('operation_admin')}}';
                        </script>
                        <span class="input radio-input">
                        <select class="select-option" id="account_admin" name="account_admin">
                            <option value="">Account Admin</option>
                            @foreach($users as $user)
                                @if($user->admin_type == 1)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                         @if ($errors->has('account_admin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('account_admin') }}</strong>
                                </span>
                            @endif
                    </span>

                        <script>
                            document.getElementById('account_admin').value = '{{old('account_admin')}}';
                        </script>
                        <span class="input radio-input">
                        <select class="select-option" id="marketing_admin" name="marketing_admin">
                            <option value="">Marketing Admin</option>
                            @foreach($users as $user)
                                @if($user->admin_type == 3)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                         @if ($errors->has('marketing_admin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $errors->first('marketing_admin') }}</strong>
                                </span>
                            @endif
                    </span>
                        <script>
                            document.getElementById('marketing_admin').value = '{{old('marketing_admin')}}';
                        </script>
                    </div>


                    <div class="clearfix"></div>
                    <h1 class="profile-heading">Create Password</h1>


                    <span class="input">
                        <input type="password" class="input__field" id="password" value="{{old('password')}}" name="password" placeholder="Enter Password"/>
                        <label for="password" class="input__label" ></label>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input">
                        <input type="password" class="input__field" id="confirmPassword" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="Confirm Password"/>
                        <label for="confirmPassword" class="input__label" ></label>
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </span>


                    <div class="clearfix"></div>
                    <h1 class="profile-heading">Attachment</h1>


                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div">
                            <img id="last_degree_attachment" src="../public/images/no_image.png"/>
                            <div class="documents-description">
                                <h4>Last Degree Attachment</h4>
                            </div>
                            <input type='file' name="last_degree_attachment"  onchange="preview_last_degree_attachment()"/>
                            @if ($errors->has('last_degree_attachment'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('last_degree_attachment') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div">
                            <img id="user_photo_attachment" src="../public/images/no_image.png"/>
                            <div class="documents-description">
                                <h4>User Photo Attachment</h4>
                            </div>
                            <input type='file' name="photo"  onchange="preview_user_photo_attachment()"/>
                            @if ($errors->has('photo'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('photo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                </div>

                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Save and Continue</button>
                </div>


            </form>
        </div>
    </div>


    <script>flatpickr(".datepicker", {});</script>

    <script>
        function administatorDiv(){
            var value = $('#admin_type').val();
            if(value == 4){
                $('#administator_heading').show();
                $('#administator_heading').css('display', 'flex');
                $('#administator_body').show();
                $('#administator_body').css('display', 'flex');
            }else {
                $('#administator_heading').hide();
                $('#administator_body').hide();
            }
        }
    </script>
@endsection
