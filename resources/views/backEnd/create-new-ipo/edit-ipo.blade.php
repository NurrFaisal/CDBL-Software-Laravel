@extends('frontEnd.admin-dashboard')
@section('title')Edit IPO @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Edit IPO</h1>
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
        </div>

        <form action="{{URL::to('/admin/ipo-update')}}" method="post" >
            @csrf
            <div id="container">
                <span class="input">
                    <input type="text" class="input__field" id="company_name" name="company_name" value="{{$ipo->company_name}}" placeholder="Company Name"/>
                    <input type="hidden" class="input__field" id="id" name="id" value="{{$ipo->id}}" placeholder="Company Name"/>
                    <label for="company_name" class="input__label"></label>

                    @if ($errors->has('company_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('company_name') }}</strong>
                        </span>
                    @endif
                </span>

                <span class="input">
                    <input type="text" class="input__field" id="ipo_name" name="ipo_name" value="{{$ipo->ipo_name}}" placeholder="IPO Name"/>
                    <label for="ipo_name" class="input__label"></label>

                    @if ($errors->has('ipo_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('ipo_name') }}</strong>
                        </span>
                    @endif
                </span>

                <span class="input">
                    <input type="text" class="input__field" id="lot_size" name="lot_size" value="{{$ipo->lot_size}}" placeholder="Lot Size"/>
                    <label for="lot_size" class="input__label"></label>

                    @if ($errors->has('lot_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('lot_size') }}</strong>
                        </span>
                    @endif
                </span>

                <span class="input">
                    <input type="text" class="input__field" id="price" name="price" value="{{$ipo->price}}" placeholder="Price"/>
                    <label for="price" class="input__label" ></label>

                    @if ($errors->has('price'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </span>

                <span class="input">
                    <input class="input__field datepicker" id="start_date" name="start_date" value="{{$ipo->start_date}}" placeholder="Start Date"/>
                    <label for="start_date" class="input__label" ></label>

                    @if ($errors->has('start_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('start_date') }}</strong>
                        </span>
                    @endif
                </span>

                <span class="input">
                    <input class="input__field datepicker" id="end_date" name="end_date" value="{{$ipo->end_date}}" placeholder="End Date"/>
                    <label for="end_date" class="input__label" ></label>

                    @if ($errors->has('end_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('end_date') }}</strong>
                        </span>
                    @endif
                </span>

                <span class="input">
                    <input type="text" class="input__field" id="mr_no" name="mr_no" value="{{$ipo->mr_no}}" placeholder="MR No"/>
                    <label for="mr_no" class="input__label" ></label>

                    @if ($errors->has('mr_no'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('mr_no') }}</strong>
                        </span>
                    @endif
                </span>

                <span class="input">
                    <input type="text" class="input__field" id="ac_type" name="ac_type" value="{{$ipo->ac_type}}" placeholder="Ac Type"/>
                    <label for="ac_type" class="input__label" ></label>

                    @if ($errors->has('ac_type'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('ac_type') }}</strong>
                        </span>
                    @endif
                </span>

                <span class="input">
                    <input type="text" class="input__field" id="rcv_type" name="rcv_type" value="{{$ipo->rcv_type}}" placeholder="RCV Type"/>
                    <label for="rcv_type" class="input__label" ></label>

                    @if ($errors->has('rcv_type'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('rcv_type') }}</strong>
                        </span>
                    @endif
                </span>

                <span class="input  radio-input">
                    <select class="select-option" id="status" name="status">
                        <option value="" selected disabled>Status</option>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>

                    @if ($errors->has('status'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                </span>
                <script>
                    document.getElementById('status').value = '{{$ipo->status}}';
                </script>

            </div>
            <div style="text-align: right">
                <button class="form-submit-btn" type="submit">Update and Continue</button>
            </div>
        </form>
    </div>

    <script>flatpickr(".datepicker", {});</script>

@endsection
