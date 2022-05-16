@extends('frontEnd.admin-dashboard')
@section('title') Edit Bank @endsection
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

        .list-btn{
            padding: 1.2rem 3rem;
            border: none;
            min-width: 200px;
            height: 40px;
            margin: 2rem 9rem;
            background-image: linear-gradient(
                45deg
                , #3c7ab7a6, #ec1c1c7a);
            color: #ffffff;
            font-size: 1.5rem;
            border-radius: 5px;
            outline: none;
            margin-left: 0;
        }

        .list-btn:hover{
            text-decoration: none !important;
            color: #ffffff;
        }
        .list-btn:focus{
            color: #ffffff;
            text-decoration: none;
        }

    </style>
    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Edit Bank</h1>
        </div>
        <div class="user-profile-details" style="margin-top: 1rem">
            <form action="{{URL::to('/admin/update-bank')}}" method="post">
                <input type="hidden"  id="id" value="{{$bank->id}}"  name="id" />
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">

                    <span class="input">
                        <input type="text" class="input__field " id="name" value="{{$bank->name}}"  name="name" placeholder="Enter Bank Name" />
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
                            <option value="1" {{$bank->status == 1 ? 'Selected' : ''}} >Active</option>
                            <option value="0" {{$bank->status == 0 ? 'Selected' : ''}} >Not Active</option>

                        </select>

                        @if ($errors->has('status'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </span>
                </div>
                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit" style="margin-right: 10px">Update</button>
                    <a class="list-btn" href="{{URL::to('/admin/bank-list')}}">Bank List</a>
                </div>
            </form>

        </div>
    </div>



@endsection
