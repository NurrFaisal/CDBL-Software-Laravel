@extends('frontEnd.admin-dashboard')
@section('title') IPO Request Review @endsection
@section('mainContent')

    <div class="bo-container">
        <h1 class="profile-heading">IPO Request Review</h1>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem;">
            <form action="{{URL::to('/admin/ipo-request-review-approval')}}" method="post">
                <input type="hidden" name="id" value="{{$ipo_request->id}}"/>
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Company Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->ipo->company_name}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">IPO Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->ipo->ipo_name}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Lot Size</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->ipo->lot_size}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Price</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->ipo->price}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Start Date</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->ipo->start_date}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">End Date</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->ipo->end_date}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Total Price</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->total_price}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Apply Date</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{date('Y-m-d', strtotime($ipo_request->created_at))}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">MR No</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->ipo->mr_no}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">AC Type</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->ipo->ac_type}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">RCV Type</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">{{$ipo_request->ipo->rcv_type}}</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Status</p>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" id="status" name="status">
                            <option selected disabled>Select Action</option>
                            <option value="1">Accept</option>
                            <option value="-1">Decline</option>
                        </select>
                    </div>
                </div>

                <div style="text-align: end">
                    <button class="form-submit-btn"  id="shareBuyButton" type="submit" style="margin: 2rem 0rem">Update and Approve</button>
                </div>
            </form>
        </div>
    </div>

@endsection
