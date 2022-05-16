@extends('frontEnd.admin-dashboard')
@section('title') Approve Share Sell Request @endsection
@section('mainContent')

    <div class="bo-container">
        <h1 class="profile-heading">Review Share Sell Request</h1>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem;">
            <form action="{{URL::to('/admin/client-share-sell-request-approved-submit')}}" method="post">
                <input type="hidden" name="id" value="{{$share_sell_request->id}}">
                <input type="hidden" name="commission" id="commission" value="{{$share_sell_request->client->commission}}">
                <input type="hidden" name="share_id" id="share_id" value="{{$share_sell_request->share->id}}">
                <input type="hidden" name="client_id" id="client_id" value="{{$share_sell_request->client->id}}">
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="form-group row">
                    <label class="col-md-4">Client Name</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="text" id="client_name" name="client_name" value="{{$share_sell_request->client->name}}" readonly style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Share Name</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="text" id="share_name" name="share_name" value="{{$share_sell_request->share->name}}" readonly style="text-align: right">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Available Quantity</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="available_qty" id="available_qty" readonly value="{{$client_share->available_qty}}" style="text-align: right">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Sell Quantity</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="sell_qty" id="sell_qty" onchange="CalTotalPriceNCommission()" onkeyup="CalTotalPriceNCommission()" value="{{$share_sell_request->sell_qty}}"  style="text-align: right">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Sell Price</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="sell_price" id="sell_price"  onchange="CalTotalPriceNCommission()" onkeyup="CalTotalPriceNCommission()" value="{{$share_sell_request->sell_price}}" style="text-align: right">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Total Price</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="sell_total_price" id="sell_total_price" value="{{$share_sell_request->sell_total_price}}" readonly  style="text-align: right">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Total Price With Commission</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="sell_total_price_with_commission" id="sell_total_price_with_commission" value="{{$share_sell_request->sell_total_price_with_commission}}" readonly  style="text-align: right">
                    </div>
                </div>
                <div style="text-align: end">
                    <button class="form-submit-btn"  id="shareBuyButton" type="submit" style="margin: 2rem 0rem">Update and Approve</button>
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
