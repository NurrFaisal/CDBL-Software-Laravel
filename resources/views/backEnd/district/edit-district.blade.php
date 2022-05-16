@extends('frontEnd.admin-dashboard')
@section('title') Edit District@endsection
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
            <h1 class="profile-heading">Edit District</h1>
        </div>
        <div class="user-profile-details" style="margin-top: 1rem">
            <form action="{{URL::to('/admin/update-district')}}" method="post">
                <input type="hidden" id="id" value="{{$district->id}}"  name="id" />
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">

                    <span class="input">
                        <input type="text" class="input__field " id="name" value="{{$district->name}}"  name="name" placeholder="Enter District Name" />
                        <label for="name" class="input__label  @error('name') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                   </span>
                    <span class="input radio-input @error('status') is-invalid @enderror">
                        <select class="select-option " id="status"  name="status">
                            <option value="" >Activation Status</option>
                            <option value="1" {{$district->status == 1 ? 'Selected' : ''}}>Active</option>
                            <option value="0" {{$district->status == 0 ? 'Selected' : ''}} >Not Active</option>
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
