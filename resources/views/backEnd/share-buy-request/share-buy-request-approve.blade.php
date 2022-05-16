@extends('frontEnd.admin-dashboard')
@section('title') Approve Share Buy Request @endsection
@section('mainContent')

    <div class="bo-container">
        <h1 class="profile-heading">Review Share Buy Request</h1>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem;">
            <form action="{{URL::to('/admin/client-share-buy-request-approved-submit')}}" method="post">
                <input type="hidden" name="share_request_id" value="{{$share_buy_requst->id}}"/>
                <input type="hidden" id="commission" value="{{$share_buy_requst->client->commission}}"/>
                <input type="hidden" name="share_id" value="{{$share_buy_requst->share->id}}"/>
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="form-group row">
                    <label class="col-md-4">Client Name</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="text" id="client_name" name="client_name" value="{{$share_buy_requst->client->name}}" readonly style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Share Name</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="text" id="share_name" name="share_name" value="{{$share_buy_requst->share->name}}" readonly style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Current Quantity</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="current_qty" id="current_qty" value="{{$share_buy_requst->share->qty}}" readonly style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Requested Quantity</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="request_qty" id="request_qty" onchange="CalTotalPriceNCommission()" onkeyup="CalTotalPriceNCommission()" value="{{$share_buy_requst->qty}}"  style="text-align: right">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-md-4">Requested Price</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="share_price" id="share_price" onchange="CalTotalPriceNCommission()" onkeyup="CalTotalPriceNCommission()" value="{{$share_buy_requst->price}}"   style="text-align: right">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Total Price</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="total_price" id="total_price" value="{{$share_buy_requst->total_price}}" readonly  style="text-align: right">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Total Price With Commission</label>
                    <div class="col-md-8" style="text-align: right">
                        <input type="number" name="total_price_with_commission" id="total_price_with_commission" value="{{$share_buy_requst->total_price_with_commission}}" readonly  style="text-align: right">
                    </div>
                </div>
                <div style="text-align: end">
                    <button class=""  id="shareBuyButton" type="submit" style="margin: 2rem 0rem">Update and Approve</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function CalTotalPriceNCommission(){
            var commission_per = $('#commission').val()
            var current_qty = $('#current_qty').val()
            var qty = $('#request_qty').val()
            var price = $('#share_price').val()
            if (parseInt(current_qty) < parseInt(qty)){
                $('#request_qty').val(current_qty)
                qty = current_qty
            }
            if (qty != '' && price != ''){
                var total = parseInt(qty)*parseInt(price)
                var commission = (parseInt(total)*parseInt(commission_per))/100
                $('#total_price').val(total)
                $('#total_price_with_commission').val(total+commission)
            }else {
                $('#total_price').val(0)
                $('#total_price_with_commission').val(0)
            }

        }
    </script>

@endsection
