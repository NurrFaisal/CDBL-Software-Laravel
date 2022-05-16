@extends('frontEnd.client-dashboard')
@section('title') Client Dashboard @endsection
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
        .deposit{
            /*display: none;*/
        }

    </style>

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Deposit In Your Account</h1>
        </div>

        @include('frontEnd.includes.balance-info')

        <form action="{{URL::to('/client/deposit-in-your-account-update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <div style="display: flex; justify-content: center; background: #ececec; padding: 10rem; ">
                <div class="select">
                    <select id="depositSelector" name="payment_type">
                        <option disabled selected>Deposit Method</option>
                        <option value="online">ONLINE</option>
                        <option value="bank">BANK</option>
                        <option value="beftn">BEFTN</option>
                    </select>
                </div>
                @if ($errors->has('payment_type'))
                    <span class="invalid-feedback" role="alert" style="top: 70%">
                                <strong style="color: red">{{ $errors->first('payment_type') }}</strong>
                    </span>
                @endif
                <input type="text" id="depositAmount" name="amount" value="" style="margin-left: 3rem; width: 120px;" placeholder="Deposit Amount"/>
                @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert" style="top: 73%">
                                <strong style="color: red">{{ $errors->first('amount') }}</strong>
                            </span>
                @endif

                <button type="submit" style="margin-left: 3rem; width: 50px; background: #62a3f9; border: none; color: #ffffff; font-weight: 600;">GO</button>
            </div>

            <div id="online" class="deposit">

                <div class="profile-init-div">
                    <h1 class="profile-heading">Online Deposit</h1>
                </div>

                <div style="display: flex; justify-content: center; background: #ececec; border-radius: 5px">
                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div" style="display: grid; place-items: center; height: 70px;">
                            <input type='text' name="online_referance" placeholder="Online Refarance" style="height: 45px; width: 255px"/>
                            @if ($errors->has('online_referance'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('online_referance') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div id="bank" class="deposit">

                <div class="profile-init-div">
                    <h1 class="profile-heading">Bank Deposit</h1>
                </div>

                <div style="display: flex; justify-content: center; background: #ececec; border-radius: 5px">
                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div">
                            <img id="bank_slip" src="../public/images/no_image.png"/>
                            <div class="documents-description">
                                <h4>Image of Bank Slip</h4>
                            </div>
                            <input type='file' name="bank_attachment" onchange="preview_bank_slip()"/>
                            @if ($errors->has('bank_attachment'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bank_attachment') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div id="beftn" class="deposit">

                <div class="profile-init-div">
                    <h1 class="profile-heading">BEFTN Deposit</h1>
                </div>

                <div style="display: flex; justify-content: center; background: #ececec; border-radius: 5px">
                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div">
                            <img id="beftn_slip" src="../public/images/no_image.png"/>
                            <div class="documents-description">
                                <h4>Image of BEFTN Slip</h4>
                            </div>
                            <input type='file' name="beftn_attachment" onchange="preview_beftn_slip()"/>
                            @if ($errors->has('beftn_attachment'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('beftn_attachment') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <script>
        $(document).ready(function(){
            $('.deposit').hide();
            $(function() {
                $('#depositSelector').change(function(){
                    $('.deposit').hide();
                    $('#' + $(this).val()).show();
                });
            });
        })
    </script>


@endsection
