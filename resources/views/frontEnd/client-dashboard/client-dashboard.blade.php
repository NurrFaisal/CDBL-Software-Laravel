@extends('frontEnd.client-dashboard')
@section('title') Client Dashboard @endsection
@section('mainContent')


    <style>
        .user-details{
            display: flex;
            justify-content: center;
            margin: 20px;
        }
        .user-details-inner-d{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .user-details-inner-d p{
            text-align: center;
            margin-bottom: 2px;
        }
        .personal-info{

        }
        .p_i__h{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: start;
            border-bottom: 1px solid;
            width: 40%;
            font-size: 2.2rem;
            color: #4b90fe;
        }
        .p_i__h label{
            margin: 0;
            margin-left: 5px;
        }

        .personal-info {
            margin: 15px;
            border-radius: 20px;
            padding: 15px;
            box-shadow: 0 1px 12px 0 rgb(75 144 254);
        }

        .printInfo{
            margin: 2rem 2rem !important;
            padding: 12px 45px;
        }
    </style>

    <div class="bo-container">
        <div class="user-details">
            <div class="user-details-inner-d">
                <img src="../public/images/user.png" alt="user" width="100px">
                <p>{{strtoupper($bo_account->first_name)}}</p>
                <p>{{$bo_account->get_user->dse_bo_id}}</p>
                <p style="color: blue">{{strtoupper($bo_account->email)}}</p>
                <p>{{strtoupper($bo_account->mobile)}}</p>
            </div>
        </div>
        <div class="personal-info">
            <div class="p_i__h">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                <label>Personal Info</label>
            </div>
            <div class="detail-ps-info">
                <div class="container" style="width: 80%">
                    <div class="" style="padding: 2rem; width: 100%; display: flex">
                        <div style="width: 50%">
                            <ul class="left-ul">
{{--                                <li>BO ID</li>--}}
{{--                                <li>BO Type</li>--}}
{{--                                <li>BO Category</li>--}}
                                <li>Name of the First Holder</li>
                                <li>Company</li>
                                <li>Second Joint Holder</li>
                                <li>Third Joint Holder</li>
                                <li>Contact Person</li>
{{--                                <li>Sex Code</li>--}}
                                <li>Date of Birth / Registration</li>
                                <li>Registration Number</li>
                                <li>Father / Husbands Name</li>
                                <li>Mothers Name</li>
                                <li>Occupation</li>
                                <li>Residency Flag</li>
{{--                                <li>Citizen Of</li>--}}
                                <li>Address</li>
                                <li>City</li>
                                <li>State/Division</li>
                                <li>Country</li>
                                <li>Postal Code</li>
{{--                                <li>Mobile</li>--}}
{{--                                <li>Email</li>--}}
{{--                                <li>Fax</li>--}}
{{--                                <li>Passport No.</li>--}}
{{--                                <li>Visa No.</li>--}}
{{--                                <li>Permit No.</li>--}}
{{--                                <li>Statement Cycle Code</li>--}}
{{--                                <li>First Holder National ID</li>--}}
{{--                                <li>Second Holder National ID</li>--}}
{{--                                <li>Third Holder National ID</li>--}}
                            </ul>
                        </div>
                        <div style="width: 50%">
                            <ul class="right-ul">
{{--                                <li>{{$bo_account->get_user->dse_bo_id}}</li>--}}
{{--                                <li>{{$bo_account->type_of_client == 1 ? 'INDIVIDUAL' : 'JOIN'}}</li>--}}
{{--                                <li>UNDEFINE</li>--}}
                                <li>{{strtoupper($bo_account->first_name." ". $bo_account->last_name)}}</li>
                                <li>UNDEFINE</li>
                                <li>{{strtoupper($bo_account->join_first_name.' '.$bo_account->join_last_name)}}</li>
                                <li>Undefine</li>
                                <li>undefine</li>
{{--                                <li>{{$bo_account->gender == 1 ? 'MALE' : 'FEMALE'}}</li>--}}
                                <li>{{strtoupper($bo_account->date_of_birth)}}</li>
                                <li>UNDEFINE</li>
                                <li>{{strtoupper($bo_account->fathers_name)}}</li>
                                <li>{{strtoupper($bo_account->mothers_name)}}</li>
                                <li>{{strtoupper($bo_account->occupation)}}</li>
{{--                                <li>{{$bo_account->residency == 1 ? "RESIDENT" : 'NOT RESIDENT'}}</li>--}}
                                <li>{{strtoupper($bo_account->nationality)}}</li>
                                <li>{{strtoupper($bo_account->contact_address)}}, </li>
                                <li>{{strtoupper($bo_account->bo_city->name)}}</li>
                                <li>{{strtoupper($bo_account->division)}}</li>
                                <li>{{strtoupper($bo_account->country)}}</li>
                                <li>{{strtoupper($bo_account->post_code)}}</li>
{{--                                <li>{{strtoupper($bo_account->mobile)}}</li>--}}
{{--                                <li>{{strtoupper($bo_account->email)}}</li>--}}
{{--                                <li>{{strtoupper($bo_account->fax)}}</li>--}}
{{--                                <li>{{strtoupper($bo_account->passport_info)}}</li>--}}
{{--                                <li>{{strtoupper($bo_account->visa_info)}}</li>--}}
{{--                                <li>{{strtoupper($bo_account->permit_info)}}</li>--}}
{{--                                <li>End of Month</li>--}}
{{--                                <li>{{strtoupper($bo_account->nid)}}</li>--}}
{{--                                <li>{{strtoupper($bo_account->join_nid)}}</li>--}}
{{--                                <li>Undefine</li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="personal-info">
            <div class="p_i__h">
                <i class="fa fa-ticket" aria-hidden="true"></i>
                <label>Passport Info</label>
            </div>
            <div class="detail-ps-info">
                <div class="container" style="width: 80%">
                    <div class="" style="padding: 2rem; width: 100%; display: flex">
                        <div style="width: 50%">
                            <ul class="left-ul">
                                <li>Passport No.</li>
                                <li>Passport Issue Date</li>
                                <li>Passport Expiry Date</li>
                                <li>Passport Issue Place</li>
                            </ul>
                        </div>
                        <div style="width: 50%">
                            <ul class="right-ul">
                                <li>undefine</li>
                                <li>undefine</li>
                                <li>undefine</li>
                                <li>undefine</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="personal-info">
            <div class="p_i__h">
                <i class="fa fa-ticket" aria-hidden="true"></i>
                <label>Bank Info</label>
            </div>
            <div class="detail-ps-info">
                <div class="container" style="width: 80%">
                    <div class="" style="padding: 2rem; width: 100%; display: flex">
                        <div style="width: 50%">
                            <ul class="left-ul">
                                <li>Routing Number</li>
                                <li>Bank Name</li>
                                <li>Branch Name</li>
                                <li>Bank A/C No.</li>
                                <li>Bank Identifier Code (BIC)</li>
                                <li>International Bank A/C No. (IBAN)</li>
                                <li>SWIFT Code</li>
                                <li>Electronic Dividend</li>
                            </ul>
                        </div>
                        <div style="width: 50%">
                            <ul class="right-ul">
                                <li>{{strtoupper($bo_account->bank_routing)}}</li>
                                <li>{{strtoupper($bo_account->bo_bank->name)}}</li>
                                <li>{{strtoupper($bo_account->bank_branch_name->name)}}</li>
                                <li>{{strtoupper($bo_account->bank_ac)}}</li>
                                <li>undefine</li>
                                <li>undefine</li>
                                <li>undefine</li>
                                <li>undefine</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="personal-info">
            <div class="p_i__h">
                <i class="fa fa-ticket" aria-hidden="true"></i>
                <label>TAX Info</label>
            </div>
            <div class="detail-ps-info">
                <div class="container" style="width: 80%">
                    <div class="" style="padding: 2rem; width: 100%; display: flex">
                        <div style="width: 50%">
                            <ul class="left-ul">
                                <li>Tax Exemption</li>
                                <li>Tax Identification No</li>
                            </ul>
                        </div>
                        <div style="width: 50%">
                            <ul class="right-ul">
                                <li>No</li>
                                <li>196303817903</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="personal-info">
            <div class="p_i__h">
                <i class="fa fa-ticket" aria-hidden="true"></i>
                <label>EXCHANGE  Info</label>
            </div>
            <div class="detail-ps-info">
                <div class="container" style="width: 80%">
                    <div class="" style="padding: 2rem; width: 100%; display: flex">
                        <div style="width: 50%">
                            <ul class="left-ul">
                                <li>Exchange Name</li>
                                <li>Trading ID</li>
                            </ul>
                        </div>
                        <div style="width: 50%">
                            <ul class="right-ul">
                                <li>Primary</li>
                                <li>IDDN4423</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="client-dashboard-bg-img" id="print">
            <div style="position: absolute; top: 25%; display: flex; justify-content: center; width: 96%;">
--}}{{--                <img src="../public/images/ASSL-logo.png" alt="">--}}{{--
            </div>
            <div style="width: 80%; margin: auto; position: relative">
                <div class="heading-details">
                    <h1>Alhaj Securities and Stocks Ltd</h1>
                    <div>
                        <p>Dhaka Stock Exchange Building, Room # 306, 9/F Motijheel C/A, Dhaka-1000. TREC No. 093. </p>
                        <p>Tel : 01733080401, Email : info@alhajsecurities.com</p>
                    </div>
                </div>

                <div class="ps-details">
                    <p>PERSONAL DETAILS</p>
                </div>

                <div class="detail-ps-info">
                    <div class="container" style="width: 80%">
                        <div class="" style="padding: 2rem; width: 100%; display: flex">
                            <div style="width: 50%">
                                <ul class="left-ul">
                                    <li>BO ID</li>
                                    <li>BO Type</li>
                                    <li>BO Category</li>
                                    <li>Name of the First Holder</li>
                                    <li>Company</li>
                                    <li>Second Joint Holder</li>
                                    <li>Third Joint Holder</li>
                                    <li>Contact Person</li>
                                    <li>Sex Code</li>
                                    <li>Date of Birth / Registration</li>
                                    <li>Registration Number</li>
                                    <li>Father / Husbands Name</li>
                                    <li>Mothers Name</li>
                                    <li>Occupation</li>
                                    <li>Residency Flag</li>
                                    <li>Citizen Of</li>
                                    <li>Address</li>
                                    <li>City</li>
                                    <li>State/Division</li>
                                    <li>Country</li>
                                    <li>Postal Code</li>
                                    <li>Mobile</li>
                                    <li>Email</li>
                                    <li>Fax</li>
                                    <li>Passport No.</li>
                                    <li>Visa No.</li>
                                    <li>Permit No.</li>
                                    <li>Statement Cycle Code</li>
                                    <li>First Holder National ID</li>
                                    <li>Second Holder National ID</li>
                                    <li>Third Holder National ID</li>
                                </ul>
                            </div>
                            <div style="width: 50%">
                                <ul class="right-ul">
                                    <li>{{$bo_account->get_user->dse_bo_id}}</li>
                                    <li>{{$bo_account->type_of_client == 1 ? 'INDIVIDUAL' : 'JOIN'}}</li>
                                    <li>UNDEFINE</li>
                                    <li>{{strtoupper($bo_account->first_name." ". $bo_account->last_name)}}</li>
                                    <li>UNDEFINE</li>
                                    <li>{{strtoupper($bo_account->join_first_name.' '.$bo_account->join_last_name)}}</li>
                                    <li>Undefine</li>
                                    <li>undefine</li>
                                    <li>{{$bo_account->gender == 1 ? 'MALE' : 'FEMALE'}}</li>
                                    <li>{{strtoupper($bo_account->date_of_birth)}}</li>
                                    <li>UNDEFINE</li>
                                    <li>{{strtoupper($bo_account->fathers_name)}}</li>
                                    <li>{{strtoupper($bo_account->mothers_name)}}</li>
                                    <li>{{strtoupper($bo_account->occupation)}}</li>
                                    <li>{{$bo_account->residency == 1 ? "RESIDENT" : 'NOT RESIDENT'}}</li>
                                    <li>{{strtoupper($bo_account->nationality)}}</li>
                                    <li>{{strtoupper($bo_account->contact_address)}}, </li>
                                    <li>{{strtoupper($bo_account->bo_city->name)}}</li>
                                    <li>{{strtoupper($bo_account->division)}}</li>
                                    <li>{{strtoupper($bo_account->country)}}</li>
                                    <li>{{strtoupper($bo_account->post_code)}}</li>
                                    <li>{{strtoupper($bo_account->mobile)}}</li>
                                    <li>{{strtoupper($bo_account->email)}}</li>
                                    <li>{{strtoupper($bo_account->fax)}}</li>
                                    <li>{{strtoupper($bo_account->passport_info)}}</li>
                                    <li>{{strtoupper($bo_account->visa_info)}}</li>
                                    <li>{{strtoupper($bo_account->permit_info)}}</li>
                                    <li>End of Month</li>
                                    <li>{{strtoupper($bo_account->nid)}}</li>
                                    <li>{{strtoupper($bo_account->join_nid)}}</li>
                                    <li>Undefine</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ps-details">
                    <p>SHORT NAME</p>
                </div>

                <div class="detail-ps-info">
                    <div class="container" style="width: 80%">
                        <div class="" style="padding: 2rem; width: 100%; display: flex">
                            <div style="width: 50%">
                                <ul class="left-ul">
                                    <li>First Holder</li>
                                    <li>Second Holder</li>
                                    <li>Third Holder</li>
                                </ul>
                            </div>
                            <div style="width: 50%">
                                <ul class="right-ul">
                                    <li>{{strtoupper($bo_account->first_name.' '.$bo_account->last_name)}}</li>
                                    <li>{{strtoupper($bo_account->join_first_name.' '. $bo_account->join_last_name)}}</li>
                                    <li>Undefine</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ps-details">
                    <p>PASSPORT DETAILS</p>
                </div>

                <div class="detail-ps-info">
                    <div class="container" style="width: 80%">
                        <div class="" style="padding: 2rem; width: 100%; display: flex">
                            <div style="width: 50%">
                                <ul class="left-ul">
                                    <li>Passport No.</li>
                                    <li>Passport Issue Date</li>
                                    <li>Passport Expiry Date</li>
                                    <li>Passport Issue Place</li>
                                </ul>
                            </div>
                            <div style="width: 50%">
                                <ul class="right-ul">
                                    <li>undefine</li>
                                    <li>undefine</li>
                                    <li>undefine</li>
                                    <li>undefine</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ps-details">
                    <p>BANK DETAILS</p>
                </div>

                <div class="detail-ps-info">
                    <div class="container" style="width: 80%">
                        <div class="" style="padding: 2rem; width: 100%; display: flex">
                            <div style="width: 50%">
                                <ul class="left-ul">
                                    <li>Routing Number</li>
                                    <li>Bank Name</li>
                                    <li>Branch Name</li>
                                    <li>Bank A/C No.</li>
                                    <li>Bank Identifier Code (BIC)</li>
                                    <li>International Bank A/C No. (IBAN)</li>
                                    <li>SWIFT Code</li>
                                    <li>Electronic Dividend</li>
                                </ul>
                            </div>
                            <div style="width: 50%">
                                <ul class="right-ul">
                                    <li>{{strtoupper($bo_account->bank_routing)}}</li>
                                    <li>{{strtoupper($bo_account->bo_bank->name)}}</li>
                                    <li>{{strtoupper($bo_account->bank_branch_name->name)}}</li>
                                    <li>{{strtoupper($bo_account->bank_ac)}}</li>
                                    <li>undefine</li>
                                    <li>undefine</li>
                                    <li>undefine</li>
                                    <li>undefine</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ps-details">
                    <p>TAX DETAILS</p>
                </div>

                <div class="detail-ps-info">
                    <div class="container" style="width: 80%">
                        <div class="" style="padding: 2rem; width: 100%; display: flex">
                            <div style="width: 50%">
                                <ul class="left-ul">
                                    <li>Tax Exemption</li>
                                    <li>Tax Identification No</li>
                                </ul>
                            </div>
                            <div style="width: 50%">
                                <ul class="right-ul">
                                    <li>No</li>
                                    <li>196303817903</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ps-details">
                    <p>EXCHANGE DETAILS</p>
                </div>

                <div class="detail-ps-info">
                    <div class="container" style="width: 80%">
                        <div class="" style="padding: 2rem; width: 100%; display: flex">
                            <div style="width: 50%">
                                <ul class="left-ul">
                                    <li>Exchange Name</li>
                                    <li>Trading ID</li>
                                </ul>
                            </div>
                            <div style="width: 50%">
                                <ul class="right-ul">
                                    <li>Primary</li>
                                    <li>IDDN4423</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}

        <div style="text-align: right; padding-top: 15px">
            <a  class="form-submit-btn printInfo" href="{{url('/print/client-dashboard/'.$bo_account->id)}}" style="margin: 2rem 2rem" >Export to PDF</a>
{{--            <button class="form-submit-btn" type="submit" onclick="window.open('{{url('')}}')">Print</button>--}}
        </div>

    </div>
@endsection
