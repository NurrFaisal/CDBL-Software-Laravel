<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BO-Account</title>

    <link href="{{asset('/public/alhaj/css/')}}/bootstrap.css" type = "text/css" rel="stylesheet" media="screen, print">
{{--    <link href="{{URL::to('/public/alhaj/css/bootstrap.css')}}" type = "text/css" rel="stylesheet" media="screen">--}}
    <link href="{{asset('/public/alhaj/css/')}}/site.css" type = "text/css" rel="stylesheet" media="print">
    <link href="{{asset('/public/alhaj/css/')}}/banner.css" type = "text/css" rel="stylesheet" media="print">
    <link href="{{asset('/public/alhaj/css/')}}/aos.css" type = "text/css" rel="stylesheet" media="print">
    <link href="{{asset('/public/alhaj/css/')}}/dashboard.css" type = "text/css" rel="stylesheet" media="print">

</head>
<body>

<style type = "text/css">
    @media print {
        html, body {
            border: 1px solid red;
            height: 99%;
            page-break-after: avoid;
            page-break-before: avoid;
        }
    }
    @media screen, print {
        .header-mid-content{
            text-align: center;
        }

        .header-mid-content p{
            margin: 0;
            font-size: .875rem;
        }

        .header-mid-content h3{
            font-size: 1rem;
            color: #921b1d;
            border: 1px solid #921b1d;
            padding: 3px;
            margin: 0;
            margin-top: 30px;
        }

        .header-img{
            width: 100%;
            height: 100px;
        }
        .header-img img{
            object-fit: contain !important;
        }
        .client-img img{
            height: 140px;
            object-fit: contain !important;
        }
        .m-0{
            margin: 0;
        }
        .field-container{
            width: 100%;
        }
        .each-field{
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            direction: ltr;
            justify-content: space-between;
        }
        .one{
            left: 0;
        }
        .two{
            left: 25%;
        }
        .three{
            left: 50%;
        }
        .four{
            left: 75%;
        }
        .each-field p{
            border-bottom: 1px dotted #000000;
            margin-left: 7px;
            min-width: 70px;
        }

        .dflx{
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            direction: ltr;
        }
        .dash-border{
            border-bottom: 1px dashed #000000 !important;
            font-weight: 400;
        }
        td{
            border-top: none !important;
        }

        #nominee td{
            border-top: 1px solid #000000 !important;
        }
        #nominee{
            border: 1px solid #000000 !important;
            padding: 3px;
        }
        .w-100{
            width: 80px;
        }

        td label{
            white-space: nowrap !important;
        }
    }
</style>

<div style="position: relative; height: 160px">
    <div style="width: 24%; position: absolute; left: 0; top: 0">
        <div class="header-img">
            <img src="{{URL::to('/public/alhaj/images/logo/alhaj-logo.png')}}" width="100%"/>
        </div>
    </div>
    <div style="width: 49%; position: absolute; left: 25%; top: 0">
        <div class="header-mid-content">
            <p>FORM-II</p>
            <p>[see rule 5(2)(e)]</p>
            <p style="font-weight: 800; color: #921b1d">ALHAJ SECURITIES AND STOCKS LTD</p>
            <p>TREC Holder of Dhaka Stock Exchange Ltd.</p>
            <p>Room no. 306, Dhaka Stock Exchange Building, 9/F Motijheel C/A, Dhaka.</p>
            <p>Tel: 9576120, 9576121, Email: alhajsecuritiesltd@gmail.com</p>
            <h3>CUSTOMER ACCOUNT OPENING FORM</h3>
        </div>
    </div>
    <div style="width: 24%; position: absolute; left: 75%; top: 0;">
        <div class="header-img client-img">
            @if($bo_account->ac_holder_image == null)
                <p style="font-size: 8px; padding: 20px">Photograph of MD/CEO with attestation of the Introducer.</p>
            @else
                {{--                        <img src="{{asset('public/'.$bo_account->ac_holder_image)}}" width="100%"/>--}}
                <img src="{{URL::to('/public/alhaj/images/logo/user.png')}}" width="100%"/>
            @endif
        </div>
    </div>
</div>

    <div style="width: 100%">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 50%">
                    <label>Client Code No:</label>
                    <label class="dash-border">	&nbsp;12345678</label>
                </td>
                <td style="width: 50%; text-align: right">
                    <label>Date:</label>
                    <label class="dash-border">	&nbsp;{{$bo_account->created_at}}</label>
                </td>
            </tr>
        </table>
    </div>

<table style="margin-bottom: 10px; width: 100%">
    <tr style="width: 100%">
        <td>
            <label>BO Account No:</label>
            <label class="dash-border">	&nbsp;{{$bo_account->user_name}}</label>
        </td>
        <td>
            <label>Account Type:</label>
            <label class="dash-border">	&nbsp;{{$bo_account->type_of_client == 1 ? 'Individual' : 'Join'}}</label>
        </td>
        <td>
            <label>Cash:</label>
            <label class="dash-border w-100"></label>
        </td>
        <td>
            <label>Margin:</label>
            <label class="dash-border w-100"></label>
        </td>
    </tr>
    <tr>
        <td>
            <label>Citizenship status :</label><label class="dash-border">&nbsp;{{$bo_account->nationality !=NULL ? $bo_account->nationality : 'Not Define'}}</label>
        </td>
    </tr>
</table>
<div>
    <div style="width: 100%">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Name of the First Applicant</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->first_name}}</label>
                </td>
            </tr>
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Profession</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->occupation !=NULL ? $bo_account->occupation : 'Not Define'}}</label>
                </td>
            </tr>
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Father's Name</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->fathers_name !=NULL ? $bo_account->fathers_name : 'Not Define'}}</label>
                </td>
            </tr>
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Mother's Name</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->mothers_name !=NULL ? $bo_account->mothers_name : 'Not Define'}}</label>
                </td>
            </tr>
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Spouse’s Name: </label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->spouse_name !=NULL ? $bo_account->mothers_name : 'Not Define'}}</label>
                </td>
            </tr>
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Present/Contact Address</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->contact_address !=NULL ? $bo_account->contact_address : 'Not Define'}}</label>
                </td>
            </tr>
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Permanent Address</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->contact_address !=NULL ? $bo_account->contact_address : 'Not Define'}}</label>
                </td>
            </tr>
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Nationality</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->nationality !=NULL ? $bo_account->nationality : 'Not Define'}}</label>
                </td>
            </tr>
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">National ID</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->nid !=NULL ? $bo_account->nid : 'Not Define'}}</label>
                </td>
            </tr>
        </table>
    </div>
    <div style="width: 100%">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Date of Birth</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->date_of_birth !=NULL ? $bo_account->date_of_birth : 'Not Define'}}</label>
                </td>

                <td style="width: 40%">
                    <label style="white-space: nowrap">Sex</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->gender == 0 ? 'Male' : 'Female'}}</label>
                </td>
            </tr>
        </table>
    </div>
    <div style="width: 100%">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Phone No </label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->mobile !=NULL ? $bo_account->mobile : 'Not Define'}}</label>
                </td>

                <td style="width: 40%">
                    <label style="white-space: nowrap">E-mail Address </label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->email !=NULL ? $bo_account->email : 'Not Define'}}</label>
                </td>
            </tr>
        </table>
    </div>

    {{--            JOin Account Information            --}}

        <div style="width: 100%; padding-top: 20px">
            <table width="100%">
                <tr style="width: 100%">
                    <td style="width: 40%">
                        <label style="white-space: nowrap">Name of the Second Applicant</label>
                    </td>
                    <td style="width: 60%">
                        <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->join_first_name}} {{$bo_account->join_last_name}}</label>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 40%">
                        <label style="white-space: nowrap">Profession</label>
                    </td>
                    <td style="width: 60%">
                        <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->join_occupation !=NULL ? $bo_account->join_occupation : 'Not Define'}}</label>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 40%">
                        <label style="white-space: nowrap">Father's Name</label>
                    </td>
                    <td style="width: 60%">
                        <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->join_fathers_name !=NULL ? $bo_account->join_fathers_name : 'Not Define'}}</label>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 40%">
                        <label style="white-space: nowrap">Mother's Name</label>
                    </td>
                    <td style="width: 60%">
                        <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->join_mothers_name !=NULL ? $bo_account->join_mothers_name : 'Not Define'}}</label>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 40%">
                        <label style="white-space: nowrap">Spouse’s Name: </label>
                    </td>
                    <td style="width: 60%">
                        <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->spouse_name !=NULL ? $bo_account->mothers_name : 'Not Define'}}</label>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 40%">
                        <label style="white-space: nowrap">Present/Contact Address</label>
                    </td>
                    <td style="width: 60%">
                        <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->join_contact_address !=NULL ? $bo_account->join_contact_address : 'Not Define'}}</label>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 40%">
                        <label style="white-space: nowrap">Permanent Address</label>
                    </td>
                    <td style="width: 60%">
                        <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->join_post_code !=NULL ? $bo_account->join_post_code : 'Not Define'}}</label>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 40%">
                        <label style="white-space: nowrap">Nationality</label>
                    </td>
                    <td style="width: 60%">
                        <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->nationality !=NULL ? $bo_account->nationality : 'Not Define'}}</label>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 40%">
                        <label style="white-space: nowrap">National ID</label>
                    </td>
                    <td style="width: 60%">
                        <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->nid !=NULL ? $bo_account->nid : 'Not Define'}}</label>
                    </td>
                </tr>
            </table>
        </div>

    <div style="width: 100%">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Date of Birth</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->join_date_of_birth !=NULL ? $bo_account->join_date_of_birth : 'Not Define'}}</label>
                </td>

                <td style="width: 40%">
                    <label style="white-space: nowrap">Sex</label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->gender == 0 ? 'Male' : 'Female'}}</label>
                </td>
            </tr>
        </table>
    </div>
    <div style="width: 100%">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 40%">
                    <label style="white-space: nowrap">Phone No </label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->join_mobile !=NULL ? $bo_account->join_mobile : 'Not Define'}}</label>
                </td>

                <td style="width: 40%">
                    <label style="white-space: nowrap">E-mail Address </label>
                </td>
                <td style="width: 60%">
                    <label class="dash-border" style="width: 100%">&nbsp;{{$bo_account->email !=NULL ? $bo_account->email : 'Not Define'}}</label>
                </td>
            </tr>
        </table>
    </div>

    <p style="padding-top: 10px">
        Whether the applicant is Officer or Sponsor/Director of any Broker/Dealer/Exchange/ Depository/Clearing & Settlement Company/Listed Company?
    </p>

    <div style="width: 100%">
        <table style="width: 50%">
            <tr style="width: 50%">
                <td style="width: 20%">
                    <label style="white-space: nowrap">Yes</label>
                </td>
                <td style="width: 30%">
                    <label class="dash-border w-100" style="width: 100%">&nbsp;</label>
                </td>

                <td style="width: 20%">
                    <label style="white-space: nowrap">No</label>
                </td>
                <td style="width: 30%">
                    <label class="dash-border" style="width: 100%">&nbsp;</label>
                </td>
            </tr>
        </table>
    </div>

    <p style="padding-top: 10px">
        If yes, please mention the name & address of the Broker/Dealer/Exchange/Depository/ Clearing & Settlement Company/Listed Company with designation of the said officer or sponsor or director: .......................................
    </p>

    <h4>Nominee Details:</h4>

    <div style="width: 100%; position: relative">
        <div style="width: 85%">
            <table class="table table-bordered" id="nominee" style="width: 85%">
                <thead>
                <tr>
                    <th>Particulars</th>
                    <th>Nominee-1</th>
                    <th style="white-space: nowrap">Nominee-2 (if any)</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{$bo_account->n1_title}} {{$bo_account->n1_first_name}} {{$bo_account->n1_last_name}}</td>
                        <td>{{$bo_account->n2_title}} {{$bo_account->n2_first_name}} {{$bo_account->n2_last_name}}</td>
                    </tr>
{{--                <tr>
                    <td>Profession</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Father’s Name</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Mother’s Name</td>
                    <td></td>
                    <td></td>
                </tr>--}}
                <tr>
                    <td>Permanent Address</td>
                    <td>{{$bo_account->n1_address !=NULL ? $bo_account->n1_address : 'Not Define'}}</td>
                    <td>{{$bo_account->n2_address !=NULL ? $bo_account->n2_address : 'Not Define'}}</td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td>{{$bo_account->n1_mobile !=NULL ? $bo_account->n1_mobile : 'Not Define'}}</td>
                    <td>{{$bo_account->n2_mobile !=NULL ? $bo_account->n2_mobile : 'Not Define'}}</td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>{{$bo_account->n1_email !=NULL ? $bo_account->n1_email : 'Not Define'}}</td>
                    <td>{{$bo_account->n2_email !=NULL ? $bo_account->n2_email : 'Not Define'}}</td>
                </tr>
                <tr>
                    <td>NID/Birth Certificate/Passport Number</td>
                    <td>{{$bo_account->n1_nid !=NULL ? $bo_account->n1_nid : 'Not Define'}}</td>
                    <td>{{$bo_account->n2_nid !=NULL ? $bo_account->n2_nid : 'Not Define'}}</td>
                </tr>
                <tr>
                    <td>Relation with the Customer(s) </td>
                    <td>{{$bo_account->n1_rel_with_ac_holder}}</td>
                    <td>{{$bo_account->n2_rel_with_ac_holder}}</td>
                </tr>
                <tr>
                    <td>Percentage (%) of Nomination </td>
                    <td>{{$bo_account->n1_percentage !=NULL ? $bo_account->n1_percentage : 'Not Define'}}</td>
                    <td>{{$bo_account->n2_percentage !=NULL ? $bo_account->n2_percentage : 'Not Define'}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 30%; position: absolute; right: 0; top: 0">
            <div style="width: 80%; height: 150px; border: 1px solid #000000; margin-left: 40px">
                <p style="font-size: .875rem; text-align: center; padding: 20px">
                    Photograph(s)
                    of Nominee(s)
                    with attestation
                    of the
                    Customer(s)
                </p>
            </div>
            <p style="font-size: .875rem; text-align: center">Nominee-1</p>
        </div>
        <div style="width: 30%; position: absolute; right: 0; top: 170px">
            <div style="width: 80%; height: 150px; border: 1px solid #000000; margin-left: 40px">
                <p style="font-size: .875rem; text-align: center; padding: 20px">
                    Photograph(s)
                    of Nominee(s)
                    with attestation
                    of the
                    Customer(s)
                </p>
            </div>
            <p style="font-size: .875rem; text-align: center">Nominee-2</p>
        </div>
    </div>

    <h4>Authorized Person Details (if any):</h4>

    <div style="width: 100%; position: relative">
        <div style="width: 85%">
            <table class="table table-bordered" id="nominee" style="width: 85%">
                <tbody>
                <tr>
                    <td>Name</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Permanent Address</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td></td>
                </tr>
                <tr>
                    <td>NID/Birth Certificate/Passport Number</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Present/Contact Address </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 30%; position: absolute; right: 0; top: 0">
            <div style="width: 80%; height: 150px; border: 1px solid #000000; margin-left: 40px">
                <p style="font-size: .875rem; text-align: center; padding: 20px">
                    Photograph of
                    authorized
                    Person
                    attestation of
                    the Customer(s
                </p>
            </div>
        </div>
    </div>

    <p style="padding-top: 20px">Source of Fund details............................................................................................................................................</p>

    <h4 style="padding-top: 20px">Bank Account Details:</h4>

    <div style="width: 100%; position: relative">
        <div style="width: 100%">
            <table class="table table-bordered" id="nominee" style="width: 100%">
                <tbody>
                <tr>
                    <td>Account Number</td>
                    <td>{{$bo_account->bank_ac !=NULL ? $bo_account->bank_ac : 'Not Define'}}</td>
                </tr>
                <tr>
                    <td>Bank Name</td>
                    <td>{{$bo_account->bank_name}}</td>
                </tr>
                <tr>
                    <td>Branch Name and Routing No. </td>
                    <td>{{$bo_account->bank_branch !=NULL ? $bo_account->bank_branch : 'Not Define'}} and {{$bo_account->bank_routing}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h4 style="padding-top: 20px">Introducer Details:</h4>

    <div style="width: 100%; position: relative">
        <div style="width: 100%">
            <table class="table table-bordered" id="nominee" style="width: 100%">
                <tr style="width: 100%">
                    <td style="width: 50%">Name</td>
                    <td style="width: 50%"></td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 50%">Account Number</td>
                    <td style="width: 50%"></td>
                </tr>
                <tr style="width: 100%">
                    <td style="width: 50%">Mobile Number</td>
                    <td style="width: 50%"></td>
                </tr>
            </table>
        </div>
    </div>
    <p style="padding-top: 10px">Signature of the Introducer with date............................................................................................</p>

    <p style="padding-top: 20px"><i>Account operating instruction:(1) Singly operated; (2) Jointly operated; (3) others (specify)</i></p>

    <h4>Have any other Customer Account with any Stock Broker(s)? </h4>

    <p>Yes.........No......... If yes, give details: ............................................................</p>

    <table class="table table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>Client Code No.</th>
                <th>BO Account No.</th>
                <th>Name of Broker</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </thead>
    </table>

    <table style="width: 100%; margin-bottom: 20px">
        <tr style="padding-top: 70px">
            <td>
                <p style="border-top: 1px dashed #000000 !important; text-align: center; margin: 10px">Signature of MD/CEO with date</p>
            </td>
            <td>
                <p style="border-top: 1px dashed #000000 !important; text-align: center; margin: 10px">Signature of the Authorized Person/signatory-1 (if any) with date</p>
            </td>
            <td>
                <p  style="border-top: 1px dashed #000000 !important; text-align: center; margin: 10px">Signature of the Authorized Person/signatory-2 (if any) with date</p>
            </td>
        </tr>
    </table>

    <div style="page-break-after: always">
        <table style="width: 100%">
            <tr>
                <td>Processed by:</td>
                <td>Checked by:</td>
                <td>Approved by:</td>
            </tr>
            <tr>
                <td>Name:...............................</td>
                <td>Name:...............................</td>
                <td>Name:...............................</td>
            </tr>
            <tr>
                <td>Designation:........................</td>
                <td>Designation:........................</td>
                <td>Designation:........................</td>
            </tr>
            <tr>
                <td>Signature:..........................</td>
                <td>Signature:..........................</td>
                <td>Signature:..........................</td>
            </tr>
            <tr>
                <td>Date:	</td>
                <td>Date:	</td>
                <td>Date:	</td>
            </tr>
        </table>
    </div>

    <table style="width: 100%">
        <tr style="width: 100%">
            <td style="width: 50%">CDBL Bye Laws</td>
            <td style="width: 50%; text-align: right">Form 02</td>
        </tr>
    </table>

    <h4 style="text-align: center; color: red; margin: 0">BO Account Opening Form</h4>
    <p style="text-align: center; margin: 0; font-size: 1.25rem; font-weight: 600">(Bye Law 7.3.3 (b))</p>
    <p>
        Please complete all details in CAPITAL letters. <b>Please fill all names correctly</b>. All communication shall be sent <b>only</b> to the First Named Account Holder’s correspondence address.
    </p>

    <table style="width: 100%">
        <tr style="width: 100%">
            <td style="width: 50%">Application No ................................</td>
            <td style="width: 50%; text-align: right">Date (DDMMYYYY) ................................</td>
        </tr>
    </table>

    <p style="font-size: 1.25rem; margin: 0; padding-top: 4px">Please Tick whichever is applicable</p>

    <style>
        @media screen, print {
            .box{
                padding: 0 15px;
                width: 5px;
                border: 1px solid #000000;
            }
            .bo-ac label{
                font-weight: 400;
            }
        }
    </style>

    <div class="bo-ac" style="width: 100%; border: 1px solid #000000;  padding: 15px">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 50%; padding: 5px 0px 0px 3px">
                    <label>BO Category: Regular &nbsp;<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                    <label>Omnibus &nbsp;<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                    <label>Clearing &nbsp;<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                </td>
                <td style="width: 50%; padding: 5px 0px 0px 0px">
                    <label>BO Type : Individual &nbsp;<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                    <label>Company &nbsp;<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                    <label>Joint Holder &nbsp;<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                </td>
            </tr>
        </table>
    </div>

    <div class="bo-ac" style="width: 100%; margin-top: 15px; border: 1px solid #000000; padding: 15px">
        <label style="font-size: 1rem; padding-left: 3px"> <b style="color: red; font-size: 1.2rem; margin-bottom: -5px">ALHAJ SECURITIES AND STOCKS LTD.</b></label>

        <p style="font-size: 1rem; margin-top: 5px; width: 100%">Name of CDBL Participant (Up to 99 Characters) </p>
        <p style="border-bottom: 1px dashed #000000 !important; width: 100%"></p>
        <table style="width: 100%">
            <tr>
                <td>CDBL Participant ID</td>
                <td>BO ID</td>
            </tr>
            <tr>
                <td>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
                <td>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Date Account Opened (DDMMYYYY)</td>
                <td>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>
    </div>
    <h4 style="padding-top: 20px">I / We request you to open a Depository Account in my / our name as per the following details:</h4>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">1. First Applicant</label>
    <div style="width: 100%; border: 1px solid #000000; padding: 15px">
        <p style="font-size: 1rem; margin-top: 5px; width: 100%">Name in Full of Account Holder (Up to 99 Characters) </p>
        <p style="border-bottom: 1px dashed #000000 !important; width: 100%">{{$bo_account->first_name}}</p>
        <p style="font-size: 1rem; margin-top: 5px">Short Name of Account Holder ( Insert full name starting with Title i.e. Mr. / Mrs. / Ms / Dr, abbreviate only if over 30 characters) &nbsp;&nbsp; Title i.e. Mr./Mrs./Ms./Dr.</p>
        <div>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
        <p style="font-size: 1rem; margin-top: 5px">(<b>In case of a Company/Firm/Statutory Body)</b> Name of Contact Person  .........................................................................................................................</p>
        <table class="bo-ac" style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 50%">
                    <label>In Case of Individual &nbsp;&nbsp;&nbsp; Male <span class="box" >&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp; Female <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                </td>
                <td style="width: 50%">
                    <p style="font-size: 1rem; margin-top: 5px">(Occupation (30Characters) .................................................................</p>
                </td>
            </tr>
        </table>
        <p>Father’s / Husband’s Name..............................................................................................................................</p>
        <p>Mother's Name..................................................................................................................................................</p>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">2. Contact Details</label>
    <div style="width: 100%; border: 1px solid #000000; padding: 15px">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 20%">Address</td>
                <td style="width: 80%; border-bottom: 1px dashed !important;"></td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td>city.............</td>
                <td>Post Code.............</td>
                <td>State/Division.............</td>
                <td>Country.............</td>
                <td>Telephone............</td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td>Mobile..................</td>
                <td>Phone..................</td>
                <td>Fax..................</td>
                <td>E-mail..................</td>
            </tr>
        </table>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px;">3. Passport Details:</label>
    <div style="width: 100%; border: 1px solid #000000; padding: 15px; page-break-after: always">
        <table style="width: 100%">
            <tr>
                <td>Passport No...............</td>
                <td>Issue Place...............</td>
                <td>Issue Date...............</td>
                <td>Expiry Date...............</td>
            </tr>
        </table>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">4. Bank Details</label>
    <div style="width: 100%; border: 1px solid #000000; padding: 15px">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 20%">Routing Number</td>
                <td style="width: 80%; border-bottom: 1px dashed !important;"></td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 30%">Bank Account Number </td>
                <td style="width: 70%; border-bottom: 1px dashed !important;"></td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td>Bank Name........................</td>
                <td>Branch  Name........................</td>
                <td>District Name........................</td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td style="white-space: nowrap;">Bank Identifier Code (BIC)..................</td>
                <td style="white-space: nowrap;">SWIFT Code ...................</td>
                <td style="white-space: nowrap;">International Bank A/C No.(IBAN).....................</td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td>Electronic Dividend Credit: Yes <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;No <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                <td>Tax Exemption if any: Yes <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;No <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                <td>TIN/Tax ID: ................ </td>
            </tr>
        </table>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">5. Others Information</label>
    <div class="bo-ac" style="width: 100%; border: 1px solid #000000; padding: 15px">
        <table width="100%">
            <td>Residency: Resident <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> Non Resident<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> Nationality...................................</td>
            <td>Date of Birth
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </td>
        </table>
        <table width="100%">
            <td>Statement Cycle Code Daily <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> Weekly <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> Fortnightly<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> Monthly<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            <td>Other (Please Specify) ..............................................</td>
        </table>
        <p>Internal Ref. No (To be filled in by CDBL Participant) ..............................................</p>

        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 50%">National ID Card Number:</td>
                <td style="padding: 15px; width: 50%; border: 1px solid #000000"></td>
            </tr>
        </table>
        <label><b>In Case of Company:</b></label>
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 40%">
                    Registration No
                </td>
                <td style="width: 60%; border-bottom: 1px dashed #000000 !important;"></td>
            </tr>
            <tr>
                <td>
                    <i>Date of Registration (DDMMYYYY)</i>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td>
                    Date of Registration (DDMMYYYY)
                </td>
                <td>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>
    </div>


    <label style="width: 100%; background-color: #ececec; margin-top: 10px">6. Joint Applicant (Second Account Holder)</label>
    <div style="width: 100%; border: 1px solid #000000; padding: 15px">
        <p style="font-size: 1rem; margin-top: 5px">Name in Full (Up to 99 Characters) ....................................................................................................................................................</p>
        <p style="font-size: 1rem; margin-top: 5px">Short Name of Account Holder ( Insert full name starting with Title i.e. Mr. / Mrs. / Ms / Dr, abbreviate only if over 30 characters) &nbsp;&nbsp; Title i.e. Mr./Mrs./Ms./Dr.</p>
        <div>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">7. Account Link Request</label>

    <table style="width: 100%">
        <tr>
            <td>Would you like to create a link to your existing Depository Account? Yes <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> &nbsp;&nbsp;&nbsp;&nbsp; No<span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td>
                <p>If yes, then please provide the Depository BO 0Account Code (8 Digits):</p>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </td>
        </tr>
    </table>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">8. Nominees/ Heirs</label>
    <p>
        If account holder(s) wish to nominate person(s) who will be entitled to receive securities outstanding in the account in the event of the death
        of the sole account holder / all the joint account holders, a separate nomination Form - 23 must be fiiled up and signed by all account holders
        and the nominees giving names of nominees , relationship with first account holder, percentage distribution and contact details. If any nominee
        is a minor, guardian’s name, address, relationship with nominee has also to be provided.
    </p>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">9. Power of Attorney (POA)</label>
    <p style="page-break-after: always">
        If account holder(s) wish to give a Power of Attorney (POA) to someone to operate the account, a separate Form - 20 must be fiiled up
        and signed by all account holders giving the name, contact details etc. of the POA holder and a POA document lodged with the form.
    </p>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">10. To be filled in by the Stock Broker / Stock Exchange in case the application is for opening a Clearing Account</label>

    <div style="border: 1px solid #000000; padding: 15px">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td>Exchange Name DSE <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                <td>Trading ID.....................</td>
                <td>CSE <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                <td>Trading ID.....................</td>
            </tr>
        </table>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">11.Photograph</label>

    <div style="width: 100%; border: 1px solid #000000;">
        <table width="100%">
            <tr style="width: 100%">
                <td style="width: 33%">
                    <div style="height: 150px; width: 100%; padding: 10px">
                        <div style="width: 100%; height: 150px; border: 1px solid #000000; "></div>
                    </div>
                </td>
                <td style="width: 33%">
                    <div style="height: 150px; width: 100%; padding: 10px">
                        <div style="width: 100%; height: 150px; border: 1px solid #000000; "></div>
                    </div>
                </td>
                <td style="width: 33%">
                    <div style="height: 150px; width: 100%; padding: 10px">
                        <div style="width: 100%; height: 150px; border: 1px solid #000000; "></div>
                    </div>
                </td>
            </tr>

            <tr style="width: 100%">
                <td style="width: 33%; text-align: center">
                    <p style="font-size: .875rem; margin: 0">1st Applicant or Authorized Signatory in case of Ltd Co.</p>
                </td>
                <td style="width: 33%; text-align: center">
                    <p style="font-size: .875rem; margin: 0">2nd Applicant or Authorized Signatory in case of Ltd Co.</p>
                </td>
                <td style="width: 33%; text-align: center">
                    <p style="font-size: .875rem; margin: 0">Authorized Signatory in case of Ltd Co. Only</p>
                </td>
            </tr>
        </table>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">12.Standing Instructions</label>

    <table style="width: 100%">
        <tr>
            <td>I/We authorize you to receive facsimile (fax) transfer instructions for delivery.&nbsp;&nbsp; Yes <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> No <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> </td>
        </tr>
    </table>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">13.DECLARATION</label>
    <p>
        The rules and regulations of the Depository and CDBL Participant pertaining to an account which are in force now have been read by me/us and I/we have
        understood the same and I/we agree to abide by and to be bound by the rules as are in force from time to time for such accounts. I/We also declare that
        the particulars given by me/us are true to the best of my/our knowledge as on the date of making such application. I/We further agree that any false/misleading
        information given by me/us or suppression of any material fact will render my/our account liable for termination and further action.
    </p>

    <table class="table-bordered" style="width: 100%">
        <tr>
            <th>Applicants</th>
            <th>Name of applicants / Authorized signatories in case of ltd Co.</th>
            <th>Signature with date</th>
        </tr>
        <tr>
            <td>First Applicant</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Second Applicant</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3rd Signatory (Ltd Co. only)</td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">14.Special Instructions on operation of Joint Account</label>
    <table style="width: 100%;">
        <tr>
            <td><span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="white-space: nowrap">Either or Survivor.</span></td>
            <td><span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="white-space: nowrap">Any one Can operate</span></td>
            <td><span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="white-space: nowrap">Any two will operate jointly</span></td>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%"><span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span> Account will be operated by </td>
            <td style="width: 70%">................................................with any one of the others.</td>
        </tr>
    </table>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px; page-break-after: always">15.Introduction</label>
    <div class="bo-ac" style="width: 100%; margin-top: 15px; border: 1px solid #000000; padding: 15px; page-break-after: always">
        <label style="font-size: 1rem; text-align: center"><b style="color: red; font-size: 1.2rem; margin-bottom: -5px; text-align: center">ALHAJ SECURITIES AND STOCKS LTD.</b></label>
        <i style="text-align: center; font-size: .1rem">(Depository Participant’s Name)</i>

        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 50%; font: 1rem">I confirm the identity, occupation and address of the applicant(s)</td>
                <td style="width: 50%; border-bottom: 1px dashed #000000"></td>
            </tr>
        </table>
        <table style="width: 100%; padding-top: 10px">
            <tr style="width: 100%">
                <td style="width: 30%">
                    <p>.................................Account ID</p>
                    <i style="font-size: .8rem">(Signature of Introducer)</i>
                </td>
                <td style="width: 70%">
                    <i style="font-size: .8rem">Introducer's Name</i>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>
    </div>


    {{--            Form 23         --}}

    <table style="width: 100%">
        <tr style="width: 100%">
            <td style="width: 50%">CDBL Bye Laws</td>
            <td style="width: 50%; text-align: right">Form 23</td>
        </tr>
    </table>

    <h4 style="text-align: center; color: red; margin: 0">BO Account Opening Form</h4>
    <p>
        Please complete all details in CAPITAL letters. <b>Please fill all names correctly</b>. All communication shall be sent <b>only</b> to the First Named Account Holder’s correspondence address.
    </p>

    <table style="width: 100%">
        <tr style="width: 100%; padding-bottom: 14px">
            <td style="width: 50%">Application No ................................</td>
            <td style="width: 50%; text-align: right">Date (DDMMYYYY) ................................</td>
        </tr>
    </table>

    <div style="width: 100%; border: 1px solid #000000; padding: 15px">
        <label style="font-size: 1rem; padding-left: 3px; text-align: center; width: 100%"><b style="color: red; font-size: 1.2rem; margin-bottom: -5px">ALHAJ SECURITIES AND STOCKS LTD.</b></label>
        <p style="margin: 0">Name of CDBL Participant (Up to 99 Characters)</p>
        <table style="width: 100%; margin-bottom: 10px">
            <tr style="width: 100%">
                <td style="width: 80%;">
                    <span style="border-bottom: 1px dashed #000000; width: 100%"></span>
                </td>
                <td style="width: 20%">
                    <p style="font-size: 1rem; text-align: center; margin-bottom: 0">CDBL</p>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 20%">Account holder’s </td>
                <td style="width: 80%">
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <span style="font: .9rem">Name of Account Holder <b>(Insert full name starting with Title i.e. Mr. / Mrs. / Ms / Dr, abbreviate only</b> </span><br/>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>
    </div>
    <span><b>I / We nominate the following person(s) who is/are entitled to receive securities outstanding in my/our account in the event of the death of the sole holder / all the joint holders.</b></span>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px; text-align: left">1.Nominee / Heirs Details</label>

    <div style="width: 100%; border: 1px solid #000000; padding: 15px; page-break-after: always">
        <span><b>Nominne 1</b></span>
        <p>Name in Full</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000"></p>
        <table>
            <tr>
                <td>
                    <span style="font: .9rem">Short Name of Nominee (Insert full name starting with Title i.e. Mr. / Mrs. / Ms / Dr, abbreviate only if over 30 characters) &nbsp;&nbsp;<i>Title i.e. Mr. / Mrs</i></span><br/>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td>Relationship with A/C Holder..................................</td>
                <td>Percentage (%) ..................................</td>
            </tr>
        </table>
        <p>Address</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000; margin-bottom: 14px"></p>
        <div style="width: 100%; margin-bottom: 12px; margin-top: 14px; height: 25px;">
            <span>City...........................</span>
            <span>Post Code...........................</span>
            <span>State / Division ...........................</span>
            <span>Country...........................</span>
        </div>
        <div style="width: 100%; margin-bottom: 12px; height: 25px;">
            <span>Telephone...........................</span>
            <span>Mobile/Phone...........................</span>
            <span>Fax ...........................</span>
            <span>E-mail...........................</span>
        </div>
        <div style="width: 100%; margin-bottom: 12px; height: 25px;">
            <span>Passport No...........................</span>
            <span>Issue Place...........................</span>
            <span>Issue Date ...........................</span>
            <span>Expiry Date...........................</span>
        </div>
        <div style="width: 100%; padding-bottom: 12px; height: 25px;">
            <b>Residency: </b>
            <span>Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Non Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
            <span>Nationality...........................</span>
            <span>Date Of Birth (DDMMYYYY)...........................</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>

        <span><b>Guardian’s Details (if Nominee is a Minor)</b></span>
        <p>Name in Full</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000"></p>

        <table>
            <tr>
                <td>
                    <span style="font: .9rem">Short Name of Nominee (Insert full name starting with Title i.e. Mr. / Mrs. / Ms / Dr, abbreviate only if over 30 characters) &nbsp;&nbsp;<i>Title i.e. Mr. / Mrs</i></span><br/>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>

        <p>Address</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000; margin-bottom: 14px"></p>
        <div style="width: 100%; margin-bottom: 12px; margin-top: 14px; height: 25px;">
            <span>City...........................</span>
            <span>Post Code...........................</span>
            <span>State / Division ...........................</span>
            <span>Country...........................</span>
        </div>
        <div style="width: 100%; margin-bottom: 12px; height: 25px;">
            <span>Telephone...........................</span>
            <span>Mobile/Phone...........................</span>
            <span>Fax ...........................</span>
            <span>E-mail...........................</span>
        </div>
        <div style="width: 100%; margin-bottom: 12px; height: 25px;">
            <span>Passport No...........................</span>
            <span>Issue Place...........................</span>
            <span>Issue Date ...........................</span>
            <span>Expiry Date...........................</span>
        </div>
        <div style="width: 100%; padding-bottom: 12px; height: 25px;">
            <b>Residency: </b>
            <span>Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Non Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
            <span>Nationality...........................</span>
            <span>Date Of Birth (DDMMYYYY)...........................</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
    </div>
    <div style="width: 100%; border: 1px solid #000000; padding: 15px;">
        <span><b>Nominne 2</b></span>
        <p>Name in Full</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000"></p>
        <table>
            <tr>
                <td>
                    <span style="font: .9rem">Short Name of Nominee (Insert full name starting with Title i.e. Mr. / Mrs. / Ms / Dr, abbreviate only if over 30 characters) &nbsp;&nbsp;<i>Title i.e. Mr. / Mrs</i></span><br/>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td>Relationship with A/C Holder..................................</td>
                <td>Percentage (%) ..................................</td>
            </tr>
        </table>
        <p>Address</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000; margin-bottom: 14px"></p>
        <div style="width: 100%; margin-bottom: 12px; margin-top: 14px; height: 25px;">
            <span>City...........................</span>
            <span>Post Code...........................</span>
            <span>State / Division ...........................</span>
            <span>Country...........................</span>
        </div>
        <div style="width: 100%; margin-bottom: 12px; height: 25px;">
            <span>Telephone...........................</span>
            <span>Mobile/Phone...........................</span>
            <span>Fax ...........................</span>
            <span>E-mail...........................</span>
        </div>
        <div style="width: 100%; margin-bottom: 12px; height: 25px;">
            <span>Passport No...........................</span>
            <span>Issue Place...........................</span>
            <span>Issue Date ...........................</span>
            <span>Expiry Date...........................</span>
        </div>
        <div style="width: 100%; padding-bottom: 12px; height: 25px;">
            <b>Residency: </b>
            <span>Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Non Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
            <span>Nationality...........................</span>
            <span>Date Of Birth (DDMMYYYY)...........................</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>

        <span><b>Guardian’s Details (if Nominee is a Minor)</b></span>
        <p>Name in Full</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000"></p>

        <table>
            <tr>
                <td>
                    <span style="font: .9rem">Short Name of Nominee (Insert full name starting with Title i.e. Mr. / Mrs. / Ms / Dr, abbreviate only if over 30 characters) &nbsp;&nbsp;<i>Title i.e. Mr. / Mrs</i></span><br/>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>

        <p>Address</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000; margin-bottom: 14px"></p>
        <div style="width: 100%; margin-bottom: 12px; margin-top: 14px; height: 25px;">
            <span>City...........................</span>
            <span>Post Code...........................</span>
            <span>State / Division ...........................</span>
            <span>Country...........................</span>
        </div>
        <div style="width: 100%; margin-bottom: 12px; height: 25px;">
            <span>Telephone...........................</span>
            <span>Mobile/Phone...........................</span>
            <span>Fax ...........................</span>
            <span>E-mail...........................</span>
        </div>
        <div style="width: 100%; margin-bottom: 12px; height: 25px;">
            <span>Passport No...........................</span>
            <span>Issue Place...........................</span>
            <span>Issue Date ...........................</span>
            <span>Expiry Date...........................</span>
        </div>
        <div style="width: 100%; padding-bottom: 12px; height: 25px;">
            <b>Residency: </b>
            <span>Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Non Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
            <span>Nationality...............................</span>
            <span>Date Of Birth (DDMMYYYY)...........................</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">2.Photograph</label>

    <div style="width: 100%; border: 1px solid #000000;">
        <table width="100%">
            <tr style="width: 100%">
                <td style="width: 25%">
                    <div style="height: 150px; width: 100%; padding: 10px">
                        <div style="width: 100%; height: 150px; border: 1px solid #000000; "></div>
                    </div>
                </td>
                <td style="width: 25%">
                    <div style="height: 150px; width: 100%; padding: 10px">
                        <div style="width: 100%; height: 150px; border: 1px solid #000000; "></div>
                    </div>
                </td>
                <td style="width: 25%">
                    <div style="height: 150px; width: 100%; padding: 10px">
                        <div style="width: 100%; height: 150px; border: 1px solid #000000; "></div>
                    </div>
                </td>
                <td style="width: 25%">
                    <div style="height: 150px; width: 100%; padding: 10px">
                        <div style="width: 100%; height: 150px; border: 1px solid #000000; "></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">Nominee / Heir 1</td>
                <td style="text-align: center">Nominee / Heir 2</td>
                <td style="text-align: center">Guardian 1</td>
                <td style="text-align: center">Guardian 2</td>
            </tr>
        </table>
    </div>

    <table class="table-bordered" style="width: 100%; padding-top: 14px; page-break-after: always">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Signature</th>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%">Nominee / Heir 1</td>
            <td style="width: 35%"></td>
            <td style="width: 35%"></td>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%">Guardian 1</td>
            <td style="width: 35%"></td>
            <td style="width: 35%"></td>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%">Nominee / Heir 2</td>
            <td style="width: 35%"></td>
            <td style="width: 35%"></td>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%">Guardian 2</td>
            <td style="width: 35%"></td>
            <td style="width: 35%"></td>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%">First Account Holder</td>
            <td style="width: 35%"></td>
            <td style="width: 35%"></td>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%">Second Account Holder</td>
            <td style="width: 35%"></td>
            <td style="width: 35%"></td>
        </tr>
    </table>



    {{--            Form 20            --}}

    <table style="width: 100%">
        <tr style="width: 100%">
            <td style="width: 50%">CDBL Bye Laws</td>
            <td style="width: 50%; text-align: right">Form 23</td>
        </tr>
    </table>

    <h4 style="text-align: center; color: red; margin: 0; width: 100%">Power of Attorney (POA) Form</h4>
    <p>
        Please complete all details in CAPITAL letters. <b>Please fill all names correctly.</b> All communications shall be sent to the correspondence address of only the First Named Account Holder as specified in BO Account Opening Form -02.
    </p>

    <table style="width: 100%">
        <tr style="width: 100%; padding-bottom: 14px">
            <td style="width: 50%">Application No ................................</td>
            <td style="width: 50%; text-align: right">Date (DDMMYYYY) ................................</td>
        </tr>
    </table>

    <div style="width: 100%; border: 1px solid #000000; padding: 15px">
        <label style="font-size: 1rem; padding-left: 3px; text-align: center; width: 100%"><b style="color: red; font-size: 1.2rem; margin-bottom: -5px">ALHAJ SECURITIES AND STOCKS LTD.</b></label>
        <p style="margin: 0">Name of CDBL Participant (Up to 99 Characters)</p>
        <table style="width: 100%; margin-bottom: 10px">
            <tr style="width: 100%">
                <td style="width: 80%;">
                    <span style="border-bottom: 1px dashed #000000; width: 100%"></span>
                </td>
                <td style="width: 20%">
                    <p style="font-size: 1rem; text-align: center; margin-bottom: 0">CDBL</p>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 20%">Account holder’s </td>
                <td style="width: 80%">
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <span style="font: .9rem">Name of Account Holder <b>(Insert full name starting with Title i.e. Mr. / Mrs. / Ms / Dr, abbreviate only</b> </span><br/>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>
    </div>
    <div style="height: 10px"></div>
    <div style="width: 100%; border: 1px solid #000000; padding: 15px;">
        <p>Name in Full</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000"></p>
        <table style="width: 100%">
            <tr>
                <td>
                    <span style="font: .8rem">Short Name of Power of Attorney Holder (Insert full name starting with Title i.e. Mr. / Mrs. / Ms / Dr, abbreviate <b/>only if</span><span>Title i.e. </span><br/>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="box" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </td>
            </tr>
        </table>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">1.Power of Attorney Holder’s Contact Details</label>

    <div style="width: 100%; border: 1px solid #000000; padding: 10px">
        <p>Address</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000; margin-bottom: 14px"></p>
        <div style="width: 100%; margin-bottom: 12px; margin-top: 14px; height: 25px;">
            <span>City...........................</span>
            <span>Post Code...........................</span>
            <span>State / Division ...........................</span>
            <span>Country...........................</span>
        </div>
        <div style="width: 100%; margin-bottom: 12px; height: 25px;">
            <span>Telephone...........................</span>
            <span>Mobile/Phone...........................</span>
            <span>Fax ...........................</span>
            <span>E-mail...........................</span>
        </div>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">2.Power of Attorney Holder’s Passport Details</label>

    <div style="width: 100%; border: 1px solid #000000; padding: 15px">
        <p>Address</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000; margin-bottom: 14px"></p>
        <div style="width: 100%; margin-bottom: 12px; margin-top: 14px;">
            <span>Passport No..............................</span>
            <span>Issue Place.............................</span>
            <span>Issue Date .............................</span>
            <span>Expiry Date.............................</span>
        </div>
    </div>

    <label style="width: 100%; background-color: #ececec; margin-top: 10px">3.Others Information of  Power of Attorney Holder</label>

    <div style="width: 100%; border: 1px solid #000000; padding: 15px">
        <div style="width: 100%; padding-bottom: 12px; height: 25px;">
            <b>Residency: </b>
            <span>Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Non Resident <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
            <span>Nationality..................................</span>
            <span>Date Of Birth (DDMMYYYY)...........................</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="box">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
    </div>

    <div style="height: 10px"></div>

    <div style="width: 100%; border: 1px solid #000000; padding: 10px; page-break-after: always">
        <p>Remarks (Insert reference to POA document i.e. Specific POA or General POA etc.)</p>
        <p style="width: 100%; border-bottom: 1px dashed #000000; margin-bottom: 14px"></p>
    </div>




    {{--            Agreement           --}}

    <h4 style="text-align: center; width: 100%">Central Depository Bangladesh Limited (CDBL) Depository Account (BO Account) opened with CDBL Participant</h4>
    <label style="width: 100%; text-align: center">Terms & Conditions – Bye Laws 7.3.3(c)</label>

    <p>CDBL Participant, Dhaka / Chittagong / Sylhet, </p>
    <p>Bangladesh Dear Sir,</p>
    <p>Please open a Depository account (BO Account) in my/our names(s) on the terms and conditions set out below in consideration of</p><br/>
    <p style="width: 100%; border-bottom: 1px dashed #000000"></p>
    <p>
        Participant”) opening the account providing depository account facilities to me/us, I/we have signed the BO Account Opening Form as a
        token of acceptance of the terms and conditions set out bellow.
    </p>
    <p>
        <b>1.</b>	I/we agree to be bound by The Depositories Act, 1999, Depositories Regulations, 2000, The Depository (User) Regulations 2003,
        and abide by the Bye Laws and Operating Instructions issued from time to time by CDBL.
    </p>
    <p>
        <b>2.</b>	CDBL shall allocate a unique identification number to me/us (Account Holder BO ID) for the CDBL Participant to maintain a separate
        Account for me/us, unless the I/we instructs the CDBL Participant to keep the securities in an Omnibus Account of the CDBL Participant.
        The CDBL Participant shall however ensure that my/our securities shall not be mixed with the CDBL Participant’s own securities.
    </p>
    <p>
        <b>3.</b>	I/we agree to pay such fees, charges and deposits to the CDBL Participant, as may be mutually agreed upon, for the purpose of opening
        and maintaining my/our account, for carrying out the instructions and for rendering such other services as are incidental or consequential
        to my/our holding securities in and transacting through the said depository account with the CDBL Participant.
    </p>
    <p>
        <b>4.</b>	I/we shall be responsible for:
    </p>
    <ol style="list-style: lower-alpha">
        <li>The veracity of all statements and particulars set out in the account opening form, supporting or accompanying documents;</li>
        <li>
            The authenticity and genuineness of all certificates and/or documents submitted to the CDBL Participant along with or in
            support of the account opening form or subsequently for dematerialization;
        </li>
        <li>
            Title to the securities submitted to the CDBL Participant from time to time for dematerialization;
        </li>
        <li>
            Ensuring at all times that the securities to the credit of my/our account are sufficient to meet the
            instructions issued to the CDBL Participant for effecting any transaction / transfer;
        </li>
        <li>
            Informing the CDBL Participant at the earliest of any changes in my/our account particulars such as address, bank details, status, authorizations,
            mandates, nomination, signature, etc.;
        </li>
        <li>
            Furnishing accurate identification details whilst subscribing to any issue of securities.
        </li>
    </ol>
    <p>
        <b>5.</b>	I/we shall notify the CDBL Participant of any change in the particulars set out in the application form submitted to the CDBL Participant at the time of
        opening the account or furnished to the CDBL Participant from time to time at the earliest. The CDBL Participant shall not be liable or responsible for any
        loss that may be caused to me/us by reason of my/our failure to intimate such change to the CDBL Participant at the earliest.
    </p>
    <p>
        6.	Where I/we have executed a BO Account Nomination Form
    </p>
    <ol style="list-style: lower-alpha">
        <li>
            In the event of my/our death, the nominee shall receive/draw the securities held in my/our account
        </li>
        <li>
            In the event, the nominee so authorised remains a minor at the time of my/our death, the legal guardian is authorised to receive/draw the securities held
            in my/our account.
        </li>
        <li>
            The nominee so authorised, shall be entitled to all my/our account to the exclusion of all other persons i.e., my/our heirs, executors and administrators
            and all other persons claiming through or under me/us and delivery of securities to the nominee in pursuance of this authority shall be binding on all other
            persons.
        </li>
    </ol>
    <p>
        7.	I/we may at any time call upon the CDBL Participant to close my/our account with the CDBL Participant provided no instructions remain pending or unexecuted
        and no fees or charges remain payable by me/us to the CDBL Participant. In such event I/we may close my/our account by executing the Account Closing Form if no
        balances are standing to my/our credit in the account. In case any balances of securities exist in the account the account may be closed by me/us in one of the
        following ways:
    </p>
    <ol style="list-style: lower-alpha">
        <li>By rematerialization of all existing balances in my/our account;</li>
        <li>
            By transfer of all existing balances in my/our account to one or more of my/our other account(s) held with any other CDBL Participant(s);
        </li>
        <li>
            By rematerialization of a part of the existing balances in my/our account and by transferring the rest to one or more of my /our other account(s) with any other CDBL Participant(s);
        </li>
    </ol>
    <p>
        8.	CDBL Participant covenants that it shall
    </p>
    <ol style="list-style: lower-alpha">
        <li>
            act only on the instructions or mandate of the Account Holder or that of such person(s) as may have been duly authorized by the Account Holder in that behalf .
        </li>
        <li>
            not effect any debit or credit to and from the account of the Account Holder without appropriate instructions from the Account Holder.
        </li>
        <li>
            maintain adequate audit trail of the execution of the instructions of the Account Holder.
        </li>
        <li>
            not honour or act upon any instructions for effecting any debit to the account of the Account Holder in respect of any securities unless:
            <ol style="list-style: lower-roman">
                <li>
                    Such instructions are issued by the Account Holder under his signature or that of his/its constituted attorney duly authorized in that behalf;
                </li>
                <li>
                    The CDBL Participant is satisfied that the signature of the Account Holder under which instructions are issued matches with the specimen of the Account Holder or his / its constituted attorney available on the records of the CDBL Participant;
                </li>
                <li>
                    The balance of clear securities available in the Account Holder’s account are sufficient to honour the Account Holder’s instructions.
                </li>
            </ol>
        </li>
        <li>
            e)	furnish to the Account Holder a statement of account at the end of every month if there has been even a single  entry or transaction during that month,
            and in any event once at the end of each financial year. The CDBL Participant shall furnish such statements at such shorter periods as may be required by the
            Account Holder on payment of such charges by the Account Holder as may be specified by the CDBL Participant. The Account Holder shall scrutinize every statement
            of account received from the CDBL Participant for the accuracy and  veracity thereof and shall promptly bring to the notice of the CDBL Participant any mistakes,
            inaccuracies or discrepancies  in such statements.
        </li>
        <li>
            f)	promptly attend to all grievances / complaints of the Account Holder and shall resolve all such grievances / complaints as it relate to matters exclusively
            within the domain of the CDBL Participant within one month of the same being brought to the notice of the CDBL Participant and shall forthwith forward to and
            follow up with CDBL all other grievances / complaints of the Account Holder on the same being brought to the notice of the CDBL Participant and shall endeavour
            to resolve the same at the earliest.
        </li>
    </ol>
    <p>
        9.	The CDBL Participant shall be entitled to terminate the account relationship in the event of the Account Holder:
    </p>
    <ol style="list-style: lower-alpha">
        <li>
            Failing to pay the fees or charges as may be mutually agreed upon within a period of one month from the date of demand made in that behalf;
        </li>
        <li>
            Submitting for dematerialization any certificates or other documents of title which are forged, fabricated, counterfeit or stolen or have been obtained by forgery
            or the transfer whereof is restrained or prohibited by any direction, order or decree of any court or the Securities and Exchange Commission;
        </li>
        <li>
            Commits or participates in any fraud or other act of moral turpitude in his / its dealings with the CDBL Participant;
        </li>
        <li>
            Otherwise misconducts himself in any manner.
        </li>
    </ol>
    <p>
        10.	Declaration and Signature<br/>
        I/we hereby acknowledge that I/we have read and understood the aforesaid terms and conditions for operating Depository Account (BO Account) with CDBL Participant and agree to comply with them
    </p>

    <table class="table table-bordered" style="width: 100%">
        <tr>
            <th>Applicants</th>
            <th>Name of applicants / Authorized signatories in case of ltd Co.</th>
            <th>Signature with date</th>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%">First Applicant</td>
            <td style="width: 35%"></td>
            <td style="width: 35%"></td>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%">Second Applicant</td>
            <td style="width: 35%"></td>
            <td style="width: 35%"></td>
        </tr>
        <tr style="width: 100%">
            <td style="width: 30%">3rd Signatory (Ltd Co. only)</td>
            <td style="width: 35%"></td>
            <td style="width: 35%"></td>
        </tr>
    </table>

</div>
</body>

<script src="{{asset('/public/alhaj/js/')}}/jquery.js"></script>
<script src="{{asset('/public/alhaj/js/')}}/yii.js"></script>
<script src="{{asset('/public/alhaj/js/')}}/site.js"></script>
<script src="{{asset('/public/alhaj/js/')}}/aos.js"></script>
</html>



