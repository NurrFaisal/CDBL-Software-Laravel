@extends('frontEnd.admin-dashboard')
@section('title') Edit Bank Branch@endsection
@section('mainContent')


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
    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Edit Bank Branch</h1>
        </div>
        <div class="user-profile-details" style="margin-top: 1rem">
            <form action="{{URL::to('/admin/update-bank-branch')}}" method="post">
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">

                    <span class="input">
                        <input type="hidden" id="id" value="{{$bank_branch->id}}"  name="id" />
                        <input type="text" class="input__field " id="name" value="{{$bank_branch->name}}"  name="name" placeholder="Enter Bank Branch Name" />
                        <label for="name" class="input__label  @error('name') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                   </span>


                    <span class="input radio-input @error('bank_id') is-invalid @enderror">
                        <select class="select-option " id="bank_id"  name="bank_id">
                            <option value="" >Choose Bank</option>
                            @foreach($banks as $bank)
                                <option value="{{$bank->id}}" >{{$bank->name}}</option>
                            @endforeach

                        </select>

                        @if ($errors->has('bank_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bank_id') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('bank_id').value = '{{$bank_branch->bank_id}}';
                    </script>
                    <span class="input">
                        <input type="text" class="input__field " id="bank_routing" value="{{$bank_branch->bank_routing}}"  name="bank_routing" placeholder="Enter Bank Branch Name" />
                        <label for="bank_routing" class="input__label  @error('bank_routing') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('bank_routing'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bank_routing') }}</strong>
                            </span>
                        @endif
                   </span>
                    <span class="input radio-input @error('district_id') is-invalid @enderror">
                        <select class="select-option " id="district_id"  name="district_id">
                            <option value="" >Choose District</option>
                            @foreach($districts as $district)
                                <option value="{{$district->id}}" >{{$district->name}}</option>
                            @endforeach

                        </select>

                        @if ($errors->has('district_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('district_id') }}</strong>
                            </span>
                        @endif
                    </span>
                    <script>
                        document.getElementById('district_id').value = '{{$bank_branch->district_id}}';
                    </script>
                    <span class="input radio-input @error('status') is-invalid @enderror">
                        <select class="select-option " id="status"  name="status">
                            <option value="" >Activation Status</option>
                            <option value="1" {{$bank_branch->status == 1 ? 'Selected' : ''}} >Active</option>
                            <option value="0" {{$bank_branch->status == 0 ? 'Selected' : ''}} >Not Active</option>
                        </select>

                        @if ($errors->has('status'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </span>
                </div>
                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>



@endsection
