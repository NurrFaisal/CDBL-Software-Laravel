@extends('frontEnd.bo-dashboard')
@section('title') Document Upload @endsection
@section('mainContent')

    <div class="bo-container">
        <h1 class="profile-heading">Upload Documents</h1>
        <div class="row profile-view-select" style="margin: 0;">
            <div class="col-md-10" style="padding: 0" data-toggle="tooltip" data-placement="top" title="CHECK TO VIEW INFO" >
                <h4>First A/C Holder</h4>
                <h4>Joint A/C Holder</h4>
            </div>
            <div class="col-md-2" style="display: flex; flex-direction: column; justify-content: flex-end !important;">
                <input type="checkbox" name="ne" id="firstHolderDocument" class="checkBox" checked>
                <input type="checkbox" name="ne" id="joinHolderDocument" class="checkBox">
            </div>
        </div>

        <div class="user-profile-details" style="margin-top: 2rem;">
            <div id="documentDetailsFirstAC" style="padding-bottom: 5rem">
                <div class="row documents" style="margin: 0">
                    <form action="{{URL::to('/bo-dashboard/first-ac-holder-image')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="ac_image_holder" src="{{$bo_account->ac_holder_image != Null ? asset('public/'.$bo_account->ac_holder_image) : './public/images/no_image.png'}}"/>
                                <div class="documents-description">
                                    <h4>First A/C Holder</h4>
                                    <p>First A/C Holder Image</p>
                                </div>
                                <input type='file' name="first_ac_holder_image" onchange="preview_ac_image_holder()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{URL::to('/bo-dashboard/front-page-nid-image')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="pass_driving_img_font" src="{{$bo_account->front_page_nid_image != Null ? asset('public/'.$bo_account->front_page_nid_image) : './public/images/no_image.png'}}"/>
                                <div class="documents-description">
                                    <h4>First A/C Holder</h4>
                                    <p>Font Page of NID/Passport/Driving Licence</p>
                                </div>
                                <input type='file' name="front_page_nid_image" onchange="preview_pass_driving_img_font()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{URL::to('/bo-dashboard/back-page-nid-image')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div">
                            <img id="pass_driving_img_font_back" src="{{$bo_account->back_page_nid_image != Null ? asset('public/'.$bo_account->back_page_nid_image) : './public/images/no_image.png'}}" />
                            <div class="documents-description">
                                <h4>First A/C Holder</h4>
                                <p>Back Page of NID/Passport/Driving Licence</p>
                            </div>
                            <input type='file' name="back_page_nid_image" onchange="preview_pass_driving_img_back()"/>
                            <div class="document-btn">
                                <button type="reset">Clear</button>
                                <button type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form action="{{URL::to('/bo-dashboard/ac-holder-signature-image')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div">
                            <img id="holder_signature" src="{{$bo_account->ac_holder_signature != Null ? asset('public/'.$bo_account->ac_holder_signature) : './public/images/no_image.png'}}"/>
                            <div class="documents-description">
                                <h4>First A/C Holder</h4>
                                <p>First A/C Holder Signature</p>
                            </div>
                            <input type='file' name="ac_holder_signature" onchange="preview_holder_signature()"/>
                            <div class="document-btn">
                                <button type="reset">Clear</button>
                                <button type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form action="{{URL::to('/bo-dashboard/ac_holder_cheque_book_leaf')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-3 pd">
                            <div class="profile-document-img-div">
                                <img id="holder_cheque_book_leaf" src="{{$bo_account->ac_holder_cheque_book_leaf != Null ? asset('public/'.$bo_account->ac_holder_cheque_book_leaf) : './public/images/no_image.png'}}"/>
                                <div class="documents-description">
                                    <h4>First A/C Holder</h4>
                                    <p>First A/C Holder Cheque Book Leaf</p>
                                </div>
                                <input type='file' name="ac_holder_cheque_book_leaf" onchange="preview_holder_cheque_book_leaf()"/>
                                <div class="document-btn">
                                    <button type="reset">Clear</button>
                                    <button type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="documentDetailsJointAC" style="margin-top: 2rem; padding-bottom: 5rem">
                <div class="row documents" style="margin: 0">
                    <form action="{{URL::to('/bo-dashboard/join-ac-holder-image')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div">
                            <input type="hidden" id="imageValueCheck" value="{{$bo_account->join_ac_holder_image}}"/>
                            <img id="joint_holder_img" src="{{$bo_account->join_ac_holder_image != Null ? asset('public/'.$bo_account->join_ac_holder_image) : './public/images/no_image.png'}}" />
                            <div class="documents-description">
                                <h4>Joint A/C Holder</h4>
                                <p>Joint A/C Holder Image</p>
                            </div>
                            <input type='file' name="join_ac_holder_image" onchange="preview_joint_holder_img()"/>
                            <div class="document-btn">
                                <button type="reset">Clear</button>
                                <button type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form action="{{URL::to('/bo-dashboard/join-front-page-nid-image')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div">
                            <img id="joint_pass_driving_font" src="{{$bo_account->join_front_page_nid_image != Null ? asset('public/'.$bo_account->join_front_page_nid_image) : './public/images/no_image.png'}}"/>
                            <div class="documents-description">
                                <h4>Joint A/C Holder</h4>
                                <p>Font Page of NID/Passport/Driving Licence</p>
                            </div>
                            <input type='file' name="join_front_page_nid_image" onchange="preview_joint_pass_driving_font()"/>
                            <div class="document-btn">
                                <button type="reset">Clear</button>
                                <button type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form action="{{URL::to('/bo-dashboard/join-back-page-nid-image')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="col-md-3 pd">
                        <div id="joint_pass_driving_back" class="profile-document-img-div">
                            <img id="joint_pass_driving_back_image" src="{{$bo_account->join_back_page_nid_image != Null ? asset('public/'.$bo_account->join_back_page_nid_image) : './public/images/no_image.png'}}"/>
                            <div class="documents-description">
                                <h4>Joint A/C Holder</h4>
                                <p>Back Page of NID/Passport/Driving Licence</p>
                            </div>
                            <input type='file' name="join_back_page_nid_image" onchange="preview_joint_pass_driving_back()"/>
                            <div class="document-btn">
                                <button type="reset">Clear</button>
                                <button type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form action="{{URL::to('/bo-dashboard/join-ac-holder-signature')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="col-md-3 pd">
                        <div class="profile-document-img-div">
                            <img id="joint_signature" src="{{$bo_account->join_ac_holder_signature != Null ? asset('public/'.$bo_account->join_ac_holder_signature) : './public/images/no_image.png'}}" />
                            <div class="documents-description">
                                <h4>Joint A/C Holder</h4>
                                <p>Joint A/C Holder Signature</p>
                            </div>
                            <input type='file' name="join_ac_holder_signature" onchange="preview_joint_signature()"/>
                            <div class="document-btn">
                                <button type="reset">Clear</button>
                                <button type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
