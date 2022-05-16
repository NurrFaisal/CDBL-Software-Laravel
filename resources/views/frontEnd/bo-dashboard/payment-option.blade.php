@extends('frontEnd.bo-dashboard')
@section('title') Payment Option @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Payment Option</h1>

        <div class="user-profile-details" style="margin-top: 1rem" id="individual">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <form action="{{URL::to('/bo-dashboard/bo-payment')}}" method="post">
                @csrf
                <div id="container">
                    <span class="input">
                          <input type="text" class="input__field" id="input-1" name="bo_user_name" readonly value="{{Session::get('bo_user_name')}}" placeholder="Tracking No"/>
                          <label for="input-1" class="input__label"></label>
                    </span>

                    <span class="input">
                        <input type="text" class="input__field" readonly name="amount" id="input-2" value="{{$bo_amount->bo_amount}}" placeholder="Amount"/>
                        <label for="input-2" class="input__label"></label>
                    </span>
                </div>
                @if($bo_account->payment_amount == Null)
                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Pay Now</button>
                </div>
                @endif
            </form>

        </div>
    </div>


@endsection
