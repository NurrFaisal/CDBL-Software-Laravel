@extends('frontEnd.bo-dashboard')
@section('title') Bank Information @endsection
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
            <h1 class="profile-heading">Your Bank Details</h1>
        </div>
        <div class="user-profile-details" style="margin-top: 1rem">
            <form action="{{URL::to('/bo-dashboard/bank-information-save')}}" method="post">
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
                        <select class="select-option" id="bank_city" name="bank_district" onchange="getBankBranch()">
                            <option value="" selected disabled>Select Your Bank District</option>
                           @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('bank_city').value = '{{$bo_account->bank_district}}';
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
                        <input type="text" class="input__field " id="input-5" name="bank_ac" value="{{$bo_account->bank_ac}}" placeholder="Your Bank Account Number" minlength="13" maxlength="13"/>
                        <label for="input-5" class="input__label @error('bank_ac') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" title="** Bank AC must be 13 digites"></label>
                        @if ($errors->has('bank_ac'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bank_ac') }}</strong>
                            </span>
                        @endif
                   </span>
                </div>
                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Save and Continue</button>
                </div>
            </form>

        </div>
    </div>

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
