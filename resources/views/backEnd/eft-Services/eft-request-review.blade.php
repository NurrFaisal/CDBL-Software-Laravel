@extends('frontEnd.admin-dashboard')
@section('title') EFT Request Review @endsection
@section('mainContent')

    <div class="bo-container">
        <h1 class="profile-heading">EFT Request Review</h1>

        <div style="background: #ececec; border-radius: 5px; padding: 1rem;">
            <form method="post">
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Client Name</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">Nexkraft Limited</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Amount</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">500</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Bank</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">Mutual Trust Bank</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Ledger Balance</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">1200</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Mature Balance</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">1200</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Date</p>
                    </div>
                    <div class="col-md-4">
                        <p class="right-p">20-04-2021</p>
                    </div>
                </div>

                <div class="row each-row">
                    <div class="col-md-8">
                        <p class="left-p">Status</p>
                    </div>
                    <div class="col-md-4">
                        <select>
                            <option selected disabled>Select Action</option>
                            <option>Accept</option>
                            <option>Decline</option>
                        </select>
                    </div>
                </div>

                <div style="text-align: end">
                    <button class="form-submit-btn" disabled id="shareBuyButton" type="submit" style="margin: 2rem 0rem">Update and Approve</button>
                </div>
            </form>
        </div>
    </div>

@endsection
