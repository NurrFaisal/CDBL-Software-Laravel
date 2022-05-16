<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Client Info</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

</head>
<body>
<style>

    .custom-dropdown-client-dashboard{
        /*position: absolute;*/
        /*display: none;*/
        border-radius: 5px;
        background: #ececec;
        padding: 1rem;
        height: auto;
        left: 50px;
        margin: 0 9px 10px;
    }

    .custom-dropdown-client-dashboard ul li a{
        color: #000000 !important;
    }
    .left-menu:hover .custom-dropdown-client-dashboard .client-dropdown-menu li a{
        color: #000000 !important;
    }
    .left-menu .custom-dropdown-client-dashboard .client-dropdown-menu li:hover{
        background: red;
        border-radius: 5px;
    }
    .left-menu .custom-dropdown-client-dashboard .client-dropdown-menu li:hover a{
        color: #ffffff !important;
    }
    .icon-rotate{
        transform: rotate(180deg);
    }


    .client-dashboard-bg-img{
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        /*min-height: 100vh;*/
        /*box-shadow: 1px 0px 8px 3px #0000ff42;*/
        margin-top: 3rem;
    }
    .heading-details{
        text-align: center;
        padding: 5px;
    }
    .heading-details h1{
        font-size: 2rem;
        font-weight: bold;
        letter-spacing: 1px;
        line-height: 1;
        margin: 0;
    }
    .heading-details p{
        font-size: 1rem;
        font-weight: 600;
        line-height: 1;
        margin: 5px;
    }

    .ps-details{
        text-align: center;
        background-color: #ececec;
        height: 30px;
    }

    .ps-details p{
        font-weight: 800;
        letter-spacing: 1px;
        padding: 6px;
        font-size: 1rem;
        margin: 0;
    }
    .left-ul li{
        font-size: .75rem;
        letter-spacing: 1px;
        color: #000000;
        border-bottom: 1px solid #ececec;
        list-style: none;
    }
    .right-ul li{
        font-size: .75rem;
        letter-spacing: 1px;
        color: #000000;
        border-bottom: 1px solid #ececec;
        list-style: none;
    }

</style>
<div class="wrapper container" style="width: 100%">
    <div class="bo-container" style="width: 100%; margin: auto">
        <div class="client-dashboard-bg-img" id="print" style="position: relative;">
            <img src="../public/images/ASSL-logo.png" alt="" style="justify-content: center; width: 100%; position: absolute; top: 10%; z-index: -1">
            <div style="position: absolute; width: 100%">
                <div style="width: 100%; margin: auto;">
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
                        <div class="container" style="width: 100%">
                            <div class="" style="padding: 0; width: 80%; display: flex; margin: auto">
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
                                        <li>Statement Cycle Code</li>
                                        <li>First Holder National ID</li>
                                        <li>Second Holder National ID</li>
                                        <li>Third Holder National ID</li>
                                    </ul>
                                </div>
                                <div style="width: 50%; float: right">
                                    <ul class="right-ul">
                                        <li>{{$bo_account->id}}</li>
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
                        <div class="container" style="width: 100%">
                            <div class="" style="padding: 0; width: 80%; display: flex; margin: auto">
                                <div style="width: 50%">
                                    <ul class="left-ul">
                                        <li>First Holder</li>
                                        <li>Second Holder</li>
                                        <li>Third Holder</li>
                                    </ul>
                                </div>
                                <div style="width: 50%; float: right">
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
                        <div class="container" style="width: 100%">
                            <div class="" style="padding: 0; width: 80%; display: flex; margin: auto">
                                <div style="width: 50%">
                                    <ul class="left-ul">
                                        <li>Passport No.</li>
                                        <li>Passport Issue Date</li>
                                        <li>Passport Expiry Date</li>
                                        <li>Passport Issue Place</li>
                                    </ul>
                                </div>
                                <div style="width: 50%; float: right">
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

                    <style>
                        .page-break {
                            page-break-after: always;
                        }
                    </style>

                    <div class="page-break"></div>

                    <div class="ps-details">
                        <p>BANK DETAILS</p>
                    </div>

                    <div class="detail-ps-info">
                        <div class="container" style="width: 100%">
                            <div class="" style="padding: 0; width: 80%; display: flex; margin: auto">
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
                                <div style="width: 50%; float: right">
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
                        <div class="container" style="width: 100%">
                            <div class="" style="padding: 0; width: 80%; display: flex; margin: auto">
                                <div style="width: 50%">
                                    <ul class="left-ul">
                                        <li>Tax Exemption</li>
                                        <li>Tax Identification No</li>
                                    </ul>
                                </div>
                                <div style="width: 50%; float: right">
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
                        <div class="container" style="width: 100%">
                            <div class="" style="padding: 0; width: 80%; display: flex; margin: auto">
                                <div style="width: 50%">
                                    <ul class="left-ul">
                                        <li>Exchange Name</li>
                                        <li>Trading ID</li>
                                    </ul>
                                </div>
                                <div style="width: 50%; float: right">
                                    <ul class="right-ul">
                                        <li>Primary</li>
                                        <li>IDDN4423</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


{{--

<script>
    window.print();
</script>
--}}
