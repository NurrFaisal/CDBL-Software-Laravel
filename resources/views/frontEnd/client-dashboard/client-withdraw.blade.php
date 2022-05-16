@extends('frontEnd.client-dashboard')
@section('title') Client Withdraw @endsection
@section('mainContent')

    <style>

        /* Reset Select */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;
            background: #4b90fe87;
            background-image: none;
        }
        /* Remove IE arrow */
        select::-ms-expand {
            display: none;
        }
        /* Custom Select */
        .select {
            position: relative;
            display: flex;
            width: 20em;
            height: 3em;
            line-height: 3;
            background: #4b90fe87;
            overflow: hidden;
            border-radius: .25em;
        }
        select {
            flex: 1;
            padding: 0 .5em;
            color: #fff;
            cursor: pointer;
        }
        /* Arrow */
        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 0 1em;
            /*background: #34495e;*/
            cursor: pointer;
            pointer-events: none;
            -webkit-transition: .25s all ease;
            -o-transition: .25s all ease;
            transition: .25s all ease;
        }
        /* Transition */
        .select:hover::after {
            color: #ffffff;
        }

        #slct option{
            font-size: 1.7rem;
        }

    </style>

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Withdraw Amount</h1>
            @include('frontEnd.includes.balance-info')
        </div>

        <form action="{{URL::to('/client/withdraw-amount-update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <div style="display: flex; justify-content: center; background: #ececec; padding: 10rem; ">
                <div>
                    <h1 style="margin: 10px;">Your Amount</h1>
                </div>

                <input type="number" id="withdrawAmount" name="amount" onkeyup="matureBalanceValidation()"  style="margin-left: 3rem;" placeholder="Enter Withdraw Amount"/>
                @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $errors->first('amount') }}</strong>
                    </span>
                @endif

                <button id="withdrawButton" class="btn-danger" disabled  type="submit" style="margin-left: 3rem; width: 130px; border: none; color: #ffffff; font-weight: 600;">Transfer</button>
            </div>

        </form>
    </div>


<script>
    function matureBalanceValidation(){
        var mature_balance = $('#mature_balance').val()
        var withdrawAmount = $('#withdrawAmount').val()
        var min_balance = $('#min_balance').val()

        var current_balance = mature_balance - min_balance;
        if(current_balance >= withdrawAmount){
            $('#withdrawButton').prop("disabled",false)
            $('#withdrawButton').css("background", '#5cb85c')
        }else {
            $('#withdrawButton').prop("disabled",true)
            $('#withdrawButton').css("background", '#d9534f')
        }
        if(withdrawAmount == ''){
            $('#withdrawButton').prop("disabled",true)
            $('#withdrawButton').css("background", '#d9534f')
        }


    }
</script>
@endsection
