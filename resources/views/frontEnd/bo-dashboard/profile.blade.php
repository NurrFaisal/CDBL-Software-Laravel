@extends('frontEnd.bo-dashboard')
@section('title') Dashboard @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Your Profile Details</h1>
        </div>

        <div class="row profile-view-select" style="margin: 0">
            <div class="col-md-10" style="padding: 0" data-toggle="tooltip" data-placement="top" title="CHECK TO VIEW INFO" >
                <h4>First A/C Holder</h4>
                <h4>Joint A/C Holder</h4>
                <h4>Bank Info</h4>
                <h4> Document</h4>
            </div>
            <div class="col-md-2" style="display: flex; flex-direction: column; justify-content: flex-end !important;">
                <input type="checkbox" name="ne" id="firstHolder" class="checkBox" checked>
                <input type="checkbox" name="ne" id="joinHolder" class="checkBox">
                <input type="checkbox" name="ne" id="bankInfo" class="checkBox">
                <input type="checkbox" name="ne" id="document" class="checkBox">
            </div>
        </div>

        <div class="user-profile-details" id="firstAccountHolder">
            <h1 class="profile-heading" style="border-bottom: 2px solid #fff">First Account Holder</h1>
            <div class="profilInfo row">
                <div class="col-md-4 pd">
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Occupation</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->occupation)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Father</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->fathers_name)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Address</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->contact_address)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">City</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">Un Defined</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Mobile</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->mobile)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Nationality</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->nationality)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Gender</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->gender) == 1 ? 'MALE' : 'FEMALE'}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Name of The Stock Exchange/ Listed Company/Brokerage Firm</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">Undefine</label></div>
                    </div>
                </div>
                <div class="col-md-4 pd">
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Account Type</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->type_of_client) == 1 ? 'INDIVIDUAL' : 'JOIN'}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Date of Birth</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->date_of_birth)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Post Code</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->post_code)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Tel</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->tel)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">NID</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->nid)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Residency</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->residency) == 1 ? 'Yes' : 'NO'}}</label></div>
                    </div>
                </div>
                <div class="col-md-4 pd">
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Name</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->first_name.' '.$bo_account->last_name)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Mother</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->mothers_name)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Division</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->division)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Fax</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->fax)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Country</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->country)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">E-mail</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->email)}}</label></div>
                    </div>`
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">TIN</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->tin)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Desired Branch</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">UnDefine</label></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="user-profile-details" id="jointAccountHolder">
            <h1 class="profile-heading" style="border-bottom: 2px solid #fff">Joint Account Holder</h1>
            <div class="profilInfo row">
                <div class="col-md-4 pd">
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Occupation</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_occupation)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Father</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_fathers_name)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Address</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">148 KHANPUR MAIN ROAD</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">City</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper(isset($bo_account->join_bo_city->name))}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Mobile</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_mobile)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Nationality</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->nationality)}}</label></div>
                    </div>
                </div>
                <div class="col-md-4 pd">
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Account Type</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->type_of_client) == 1 ? 'INDIVIDUAL' : 'JOIN'}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Date of Birth</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_date_of_birth)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Post Code</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_post_code)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Tel</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_tel)}}</label></div>
                    </div>
                </div>
                <div class="col-md-4 pd">
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Name</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_first_name.' '.$bo_account->join_last_name)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Mother</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_mothers_name)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Division</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_division)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Fax</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->join_fax)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Country</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->country)}}</label></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="user-profile-details" id="bankInformation">
            <h1 class="profile-heading" style="border-bottom: 2px solid #fff">Bank Information</h1>
            <div class="profilInfo row">
                <div class="col-md-4 pd">
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">City</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper(isset($bo_account->bank_city->name))}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Mobile</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->mobile)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Nationality</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->nationality)}}</label></div>
                    </div>
                </div>
                <div class="col-md-4 pd">
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Account Type</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->type_of_client == 1 ? 'INDIVIDUAL' : 'Join')}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Date of Birth</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->date_of_birth)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Post Code</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->post_code)}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Tel</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper($bo_account->tel)}}</label></div>
                    </div>
                </div>
                <div class="col-md-4 pd">
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Name</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value">{{strtoupper(isset($bo_account->bo_bank->name))}}</label></div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Mother</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value"></label>{{strtoupper($bo_account->mothers_name)}}</div>
                    </div>
                    <div class="infoGroup">
                        <div class="col-md-4 pd"><label class="label-first-child" for="Name">Division</label></div>
                        <div class="col-md-1 pd"><label for="separator">:</label></div>
                        <div class="col-md-7 pd"><label class="label-last-child" for="value"></label>{{strtoupper($bo_account->division)}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="user-profile-details" id="documentDeatils">
            <h1 class="profile-heading" style="border-bottom: 2px solid #fff">Your Uploaded Documents</h1>
            <div class="row documents" style="margin: 0">
                <div class="col-md-3 pd">
                    <div class="profile-document-img-div">
                        <img src="{{$bo_account->ac_holder_image != Null ? asset('public/'.$bo_account->ac_holder_image) : './public/images/no_image.png'}}"/>
                        <div class="documents-description">
                            <h4>First A/C Holder</h4>
                            <p>First A/C Holder Image</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pd">
                    <div class="profile-document-img-div">
                        <img src="{{$bo_account->front_page_nid_image != Null ? asset('public/'.$bo_account->front_page_nid_image) : './public/images/no_image.png'}}"/>
                        <div class="documents-description">
                            <h4>First A/C Holder</h4>
                            <p>Font Page of NID/Passport/Driving Licence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pd">
                    <div class="profile-document-img-div">
                        <img src="{{$bo_account->back_page_nid_image != Null ? asset('public/'.$bo_account->back_page_nid_image) : './public/images/no_image.png'}}" />
                        <div class="documents-description">
                            <h4>First A/C Holder</h4>
                            <p>Back Page of NID/Passport/Driving Licence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pd">
                    <div class="profile-document-img-div">
                        <img src="{{$bo_account->ac_holder_signature != Null ? asset('public/'.$bo_account->ac_holder_signature) : './public/images/no_image.png'}}"/>
                        <div class="documents-description">
                            <h4>First A/C Holder</h4>
                            <p>First A/C Holder Signature</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row documents" style="margin: 0">
                <div class="col-md-3 pd">
                    <div class="profile-document-img-div">
                        <img src="{{$bo_account->join_ac_holder_image != Null ? asset('public/'.$bo_account->join_ac_holder_image) : './public/images/no_image.png'}}" />
                        <div class="documents-description">
                            <h4>Joint A/C Holder</h4>
                            <p>Joint A/C Holder Image</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pd">
                    <div class="profile-document-img-div">
                        <img src="{{$bo_account->join_front_page_nid_image != Null ? asset('public/'.$bo_account->join_front_page_nid_image) : './public/images/no_image.png'}}"/>
                        <div class="documents-description">
                            <h4>Joint A/C Holder</h4>
                            <p>Font Page of NID/Passport/Driving Licence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pd">
                    <div class="profile-document-img-div">
                        <img src="{{$bo_account->join_back_page_nid_image != Null ? asset('public/'.$bo_account->join_back_page_nid_image) : './public/images/no_image.png'}}"/>
                        <div class="documents-description">
                            <h4>Joint A/C Holder</h4>
                            <p>Back Page of NID/Passport/Driving Licence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pd">
                    <div class="profile-document-img-div">
                        <img src="{{$bo_account->join_ac_holder_signature != Null ? asset('public/'.$bo_account->join_ac_holder_signature) : './public/images/no_image.png'}}" />
                        <div class="documents-description">
                            <h4>Joint A/C Holder</h4>
                            <p>Joint A/C Holder Signature</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
