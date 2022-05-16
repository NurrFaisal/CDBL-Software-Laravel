@extends('frontEnd.admin-dashboard')
@section('title') Lock Pledge Import@endsection
@section('mainContent')


    <style>
        .is-invalid{
            border-top: 2px solid red;
            border-bottom: 2px solid red;
        }
        .is-invalid-input{
            color: red;
        }
        .is-invalid-input::before, .is-invalid-input:after{
            background:red;
        }


        .et_pb_contact_form_label {
            display: block;
            color: black;
            font-weight: bold;
            letter-spacing: 1.2px;
            font-size: 18px;
            padding-bottom: 5px;
        }
        input[id="et_pb_contact_brand_file_request_0"] {
            display: none;
        }
        label[for="et_pb_contact_brand_file_request_0"] {
            background: #fff;
            height: 145px;
            background-image: url('https://image.flaticon.com/icons/svg/126/126477.svg');
            background-repeat: no-repeat;
            background-position: top 18px center;
            /*position: absolute;*/
            background-size: 7%;
            color: transparent;
            margin: auto;
            width: 450px;
            /*top: 50%;*/
            left: 0;
            right: 0;
            transform: translateY(0%);
            border: 1px solid #a2a1a7;
            box-sizing: border-box;
        }
        label[for="et_pb_contact_brand_file_request_0"]:before {
            content: "Drag and Drop a file here";
            display: block;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: #202020;
            font-weight: 400;
            left:0;
            right:0;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        label[for="et_pb_contact_brand_file_request_0"]:after {
            display: block;
            content: 'Browse';
            background: #16a317;
            width: 86px;
            height: 27px;
            line-height: 27px;
            position: absolute;
            bottom: 19px;
            font-size: 14px;
            color: white;
            font-weight: 500;
            left:0;
            right:0;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        label[for="et_pb_contact_brand_request_0"]:after {
            content: " (Provide link or Upload files if you already have guidelines)";
            font-size: 12px;
            letter-spacing: -0.31px;
            color: #7a7a7a;
            font-weight: normal;
        }
        label[for="et_pb_contact_design_request_0"]:after {
            content: " (Provide link or Upload design files)";
            font-size: 12px;
            letter-spacing: -0.31px;
            color: #7a7a7a;
            font-weight: normal;
        }
        label[for="et_pb_contact_brand_file_request_0"].changed, label[for="et_pb_contact_brand_file_request_0"]:hover {
            background-color: #e3f2fd;
        }
        label[for="et_pb_contact_brand_file_request_0"] {
            cursor: pointer;
            transition: 400ms ease;
        }
        .file_names {
            display: block;
            position: absolute;
            color: black;
            left: 0;
            bottom: -30px;
            font-size: 13px;
            font-weight: 300;
        }
        .file_names {
            text-align: center;
        }

    </style>
    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Bonus Receivable</h1>
        </div>
        <div class="user-profile-details" style="margin-top: 1rem; padding: 5rem 0rem">
            @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <form action="{{URL::to('/admin/bonus-receivable')}}" method="post" enctype="multipart/form-data" onsubmit="return Validate(this)">
                @csrf
                <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label">Enter</label>
                <input type="file" id="et_pb_contact_brand_file_request_0" name="name" class="file-upload" required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                            </span>
                @endif

                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Import</button>
                </div>
            </form>
        </div>
    </div>


@endsection
