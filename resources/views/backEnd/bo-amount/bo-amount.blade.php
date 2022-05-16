@extends('frontEnd.admin-dashboard')
@section('title') Bo Amount And Min Balance@endsection
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
        <h1 class="profile-heading">Bo Amount and Min Balance Update Page</h1>

        <div class="user-profile-details" style="margin-top: 1rem">
            <form action="{{URL::to('/admin/bo-amount-update')}}" method="post">
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">

                    <span class="input">
                        <input type="text" class="input__field " id="boAmount" value="{{$bo_amount->bo_amount}}"  name="boAmount" placeholder="BO Amount" required />
                        <label for="boAmount" class="input__label  @error('boAmount') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('boAmount'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('boAmount') }}</strong>
                            </span>
                        @endif
                   </span>

                    <span class="input">
                        <input type="text" class="input__field " id="minBalance" value="{{$bo_amount->min_balance}}"  name="minBalance" placeholder="Min Balance" required/>
                        <label for="minBalance" class="input__label  @error('minBalance') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('minBalance'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('minBalance') }}</strong>
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
