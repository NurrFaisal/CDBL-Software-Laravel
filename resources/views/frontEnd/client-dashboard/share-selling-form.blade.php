@extends('frontEnd.client-dashboard')
@section('title') Selling Share @endsection
@section('mainContent')
    <div class="bo-container">
        <h1 class="profile-heading">Sell Your Share</h1>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem;">
            <form action="{{URL::to('/client/sell-share-save')}}" method="post">
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <input type="hidden" id="commission" value="{{Auth::user()->commission}}">
                <div class="form-group row">
                    <label class="col-md-4">Share Name</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="text" id="share_name" name="share_name" value="{{$client_share->share->name}}" readonly style="text-align: right">
                        <input type="hidden" id="share_id" name="share_id" value="{{$client_share->share->id}}" readonly style="text-align: right">
                        <input type="hidden" id="client_share_id" name="client_share_id" value="{{$client_share->id}}" readonly style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Available Qty</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="text" name="available_qty" id="available_qty" value="{{$client_share->available_qty}}" readonly style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Sell Qty</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="sell_qty" id="sell_qty" onchange="CalTotalPriceNCommission()" onkeyup="CalTotalPriceNCommission()" placeholder="insert Sell Qty"  style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Sell Price</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="sell_price" id="sell_price" onchange="CalTotalPriceNCommission()" onkeyup="CalTotalPriceNCommission()"  placeholder="insert Sell Price"  style="text-align: right">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Sell Total Price</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="sell_total_price" id="sell_total_price" value="0"  readonly  style="text-align: right">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Sell Total Price With Commission</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="sell_total_price_with_commission" id="sell_total_price_with_commission" value="0"  readonly  style="text-align: right">
                    </div>
                </div>
                <div style="text-align: end">
                    <button class="form-submit-btn"  id="shareBuyButton" type="submit" style="margin: 2rem 0rem">SELL</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function CalTotalPriceNCommission(){
            var commission_per = $('#commission').val()
            var current_qty = $('#available_qty').val()
            var qty = $('#sell_qty').val()
            var price = $('#sell_price').val()
            if (parseInt(current_qty) < parseInt(qty)){
                $('#sell_qty').val(current_qty)
                qty = current_qty
            }
            if (qty != '' && price != ''){
                var total = parseInt(qty)*parseInt(price)
                var commission = (parseInt(total)*parseInt(commission_per))/100
                $('#sell_total_price').val(total)
                $('#sell_total_price_with_commission').val(total-commission)
            }else {
                $('#sell_total_price').val(0)
                $('#sell_total_price_with_commission').val(0)
            }

        }
    </script>
@endsection
