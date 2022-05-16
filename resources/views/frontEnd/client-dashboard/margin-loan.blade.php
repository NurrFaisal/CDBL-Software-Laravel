@extends('frontEnd.client-dashboard')
@section('title') Margin Loan @endsection
@section('mainContent')


    <div class="bo-container">
        <h1 class="profile-heading">Margin Loan</h1>

        <div class="user-profile-details" style="margin-top: 1rem">
            <form action="{{URL::to('/client/margin-loan-save')}}" method="post">
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">
                    <span class="input">
                        <input type="number" class="input__field " id="amount" value=""  name="amount" placeholder="Enter Amount" required/>
                        <label for="amount" class="input__label  @error('amount') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('amount'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif
                   </span>
                    <div style="text-align: right; padding: 12px 0">
                        <button class="form-submit-btn" type="submit">Apply</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection
