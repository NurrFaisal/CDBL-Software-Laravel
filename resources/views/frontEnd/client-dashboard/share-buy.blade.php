@extends('frontEnd.client-dashboard')
@section('title') Buy Share @endsection
@section('mainContent')


    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Buy Share</h1>
            @include('frontEnd.includes.balance-info')
        </div>
{{--        <h1 class="profile-heading">Mature Balance <span style="float: right"><input id="mature_balance_withdraw" style="border: none; text-align: center" type="text" value="{{$mature_balance}} " disabled></span></h1>--}}
        <div style="background: #ececec; border-radius: 5px; padding: 1rem;">
            <form action="{{URL::to('/client/buy-share-save')}}" method="post">
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="form-group row">
                    <label class="col-md-4">Share Name</label>
                    <div class="col-md-8" style="text-align: right">
                        <select id="share" name="share_id" onchange="sharePrice()">
                            <option value=""  selected disabled>Select your Share</option>
                            @foreach($shares as $key => $share)
                                <option value="{{$share->id}}">{{$share->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Share Price(Approx)</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="text" id="share_price_approx" name="share_price_approx" value="0" readonly style="text-align: right">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Current Price</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="text" onkeyup="shareTotalPrice()" onchange="shareTotalPrice()" name="share_price" id="share_price"  style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Share Quantity</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" onkeyup="shareTotalPrice()" onchange="shareTotalPrice()" id="share_qty" name="share_qty" value="1" placeholder="Insert Quantuty"  style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Total Amount</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number"  id="share_total_amount" name="share_total_amount" readonly  placeholder="Total amount" style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Total Amount [With Commission]</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="text" readonly id="total_price_with_commission" name="total_price_with_commission"  placeholder="Total amount" style="text-align: right">
                    </div>
                </div>

            <div style="text-align: end">
                <button class="form-submit-btn" disabled id="shareBuyButton" type="submit" style="margin: 2rem 0rem">BUY</button>
            </div>
            </form>
        </div>

    </div>
    <script>
        function sharePrice(){
            var share = $('#share').val()
            $.ajax({
                type:'get',
                url: '{!! URL::to('/client/buy-share-price') !!}',
                data:{'share_id':share},
                success:function (data) {
                    $('#share_price_approx').val(data)
                    shareTotalPrice()
                }
            });

        }
        function shareTotalPrice(){
            var commission = '{{Auth::user()->commission}}'
            var share_qty = $('#share_qty').val()
            var share_price = $('#share_price').val()
            if(share_qty > 0 && share_price > 0){
                total_price = parseFloat(share_price)*parseInt(share_qty);
            }else {
                total_price = 0
            }
            var total_commission = (total_price * parseInt(commission)) / 100
            var total_price_with_commission = total_price + total_commission

            $('#share_total_amount').val(total_price)
            $('#total_price_with_commission').val(total_price_with_commission)
            this.matureBalanceValidation()
        }

        function matureBalanceValidation() {
            var min_balance_string = '{{$bo_amount->min_balance}}';
            var min_balance = parseInt(min_balance_string);
            var mature_balance = $('#mature_balance').val()

            var total_price_with_commission = $('#total_price_with_commission').val()
            var total_price_with_commission_int = parseInt(total_price_with_commission)
            var current_balance = mature_balance - min_balance;
            console.log(mature_balance)

            if (current_balance >= total_price_with_commission_int) {
                $('#shareBuyButton').prop("disabled", false)
                $('#shareBuyButton').css("background", '#5cb85c')
            } else {
                $('#shareBuyButton').prop("disabled", true)
                $('#shareBuyButton').css("background", '#d9534f')
            }
            if (total_price_with_commission == '') {
                $('#shareBuyButton').prop("disabled", true)
                $('#shareBuyButton').css("background", '#d9534f')
            }
        }
    </script>

@endsection
