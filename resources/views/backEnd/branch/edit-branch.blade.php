@extends('frontEnd.admin-dashboard')
@section('title') Add New Bank Branch@endsection
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
            <h1 class="profile-heading">Add New Bank Branch</h1>
        </div>
        <div class="user-profile-details" style="margin-top: 1rem">
            <form action="{{URL::to('/admin/update-branch')}}" method="post">
                <input type="hidden"  id="id" value="{{$branch->id}}"  name="id" />
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">

                    <span class="input">
                        <input type="text" class="input__field " id="name" value="{{$branch->name}}"  name="name" placeholder="Enter Bank Branch Name" />
                        <label for="name" class="input__label  @error('name') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('name') }}</strong>
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
                        document.getElementById('district_id').value = '{{$branch->district_id}}';
                    </script>
                    <span class="input">
                        <input type="text" class="input__field " id="division" value="{{$branch->division}}" name="division" placeholder="Enter Division Name" />
                        <label for="division" class="input__label  @error('division') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('division'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('division') }}</strong>
                            </span>
                        @endif
                   </span>
                    <span class="input radio-input @error('status') is-invalid @enderror">
                        <select class="select-option " id="status"  name="status">
                            <option value="" >Activation Status</option>
                            <option value="1" {{$branch->status == 1 ? 'Selected' : ''}} >Active</option>
                            <option value="0" {{$branch->status == 0 ? 'Selected' : ''}} >Not Active</option>
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
