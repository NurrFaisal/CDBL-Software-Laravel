<style>
    .profile-dropdown {
        display: inline-block;
        position: relative;
        background: transparent;
        margin: auto;
        font-weight: bold;
        font-size: 1.3rem;
        /*border-radius: 3px;*/
        -webkit-user-select: none;
        /* Chrome all / Safari all */
        -moz-user-select: none;
        /* Firefox all */
        -ms-user-select: none;
        /* IE 10+ */
        user-select: none;
        /* Likely future */
        padding: 15px 6px;
    }
    .profile-dropdown * {
        -webkit-user-select: none;
        /* Chrome all / Safari all */
        -moz-user-select: none;
        /* Firefox all */
        -ms-user-select: none;
        /* IE 10+ */
        user-select: none;
        /* Likely future */
    }
    .profile-dropdown input[type="checkbox"] {
        display: none;
    }
    .profile-dropdown input[type="checkbox"]:checked ~ ul {
        display: block;
        animation: pulse 0.5s;
    }
    .profile-dropdown input[type="checkbox"]:checked ~ img {
        background: orange;
    }
    .profile-dropdown input[type="checkbox"]:checked ~ label {
        background: orange;
    }
    .profile-dropdown input[type="checkbox"]:checked ~ label i {
        color: #f2f2f2;
    }
    .profile-dropdown input[type="checkbox"]:checked ~ label:after {
        content: '';
        position: absolute;
        top: 100%;
        right: calc(50% - 10px);
        display: block;
        border-style: solid;
        border-width: 7px 10px 0 10px;
        border-color: orange transparent transparent transparent;
        width: 0;
        height: 0;
    }
    .profile-dropdown img {
        display: inline-block;
        background: #d9d9d9;
        height: 2.5rem;
        vertical-align: middle;
        margin-right: 1rem;
        margin: 0.5rem 0.75rem 0.5rem 0.5rem;
        border-radius: 50%;
    }
    .profile-dropdown span {
        display: inline-block;
        vertical-align: sub;
        width: 125px;
        margin-right: 2rem;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        color: #ffffff;
    }
    #profile2{
        transition-duration: 2s;
    }
    .profile-dropdown ul {
        display: none;
        list-style: none;
        padding: 0;
        background: #636363;
        position: absolute;
        top: 100%;
        right: 0;
        width: 100%;
        text-align: left;
        margin-top: 2px;
        width: 170px;
        margin-right: 2px;
        transition-duration: 2s;
    }
    .profile-dropdown ul li a {
        display: block;
        padding: 0.75rem 1rem;
        text-decoration: none;
        color: #000000a6;
        font-size: 1.2rem;
        border-bottom: 1px solid #fdf4f4;
        color: #ffffff;
    }
    .profile-dropdown ul li a i {
        font-size: 1.3rem;
        vertical-align: middle;
        /*margin: 0 0.75rem 0 -0.25rem;*/
        float: right;
    }
    .profile-dropdown ul li a:hover {
        background: #e5e5e5;
        color: #000000;
    }
    .profile-dropdown ul li:first-child a:hover {
        border-radius: 3px 3px 0 0;
    }
    .profile-dropdown ul li:last-child a:hover {
        border-radius: 0 0 3px 3px;
    }
    .profile-dropdown > label {
        position: relative;
        height: 3.5rem;
        display: block;
        text-decoration: none;
        background: transparent;
        color: #333;
        box-sizing: border-box;
        padding: 0.9rem;
        float: right;
        border-radius: 0 3px 3px 0;
    }
    .profile-dropdown > label i {
        color: #b2b2b2;
        font-size: 1.75rem;
    }
    .profile-dropdown:after {
        content: '';
        display: table;
        clear: both;
    }

    .container-profile {
        display: flex;
        justify-content: flex-end;
        /*margin-right: 10px;*/
    }
    .container-profile .half {
        width: 50%;
        float: left;
        margin-bottom: 2rem;
    }
    .container-profile:after {
        content: '';
        display: table;
        clear: both;
    }
    p.subtitle {
        color: rgba(0, 0, 0, .5);
        font-weight: bold;
        text-align: center;
        margin: 0.5rem 0 2rem;
        letter-spacing: 0.1rem;
    }

</style>

<div>
    <div class="fixed-header">
        <div class="row">
            <div class="col-md-5" style="padding: 2px 2.2rem">
                <a href="{{URL::to('/')}}" style="text-decoration: none"><p style="font-size: 2.5rem; padding: 6px; margin: 0;">Online BO Opening</p></a>
            </div>
            <div class="col-md-7">
                <div style="text-align: right">
                    <div class="container-profile">
                        <div class="half">
                            <label for="profile2" class="profile-dropdown">
                                <input type="checkbox" id="profile2">
                                <i class="fa fa-user" style="font-size: 2.5rem; color: #4b90fe;"></i>
                                {{--                                <i class="fa fa-chevron-down" style="font-size: 1.5rem; color: #ffffff"></i>--}}
                                <ul>
                                    <li><a href="#">Account<i class="fa fa-user-circle"></i></a></li>
                                    <li><a href="#">Settings<i class="fa fa-cog"></i></a></li>
                                    <li>
                                        <a class="dropdown-item" onclick="return confirm('Are you want to logout BO Account ?')" href="{{ URL::to('/bo-logout') }}">
                                            Logout<i class="fa fa-sign-out"></i>
                                        </a>

                                    </li>
                                </ul>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style=" height: 100%;  position: fixed; top: 0; display: flex; width: 20%">
        <div style="background: #ececec; width: 100%; display: grid; place-content: center; padding: 0; overflow-x: hidden; ">
            <div style="padding: 8px 10px;">
                <img src="{{URL::to('public/alhaj/images/logo/alhaj-logo.png')}}" width="100%">
                <div class="col-md-12" style="padding-top: 2rem;">
                    <h5>User Name: <span>{{Session::get('bo_full_name')}}</span></h5>
                    <h5>User ID: <span>{{Session::get('bo_user_name')}}</span></h5>
                </div>
            </div>
            <ul>
                <li class="left-menu"><a href="{{url('/bo-dashboard')}}" id="left-menu1"><i class="fa fa-id-badge custom-icon-dashboard"></i>Profile</a></li>
                <li class="left-menu"><a href="{{url('/account-holders')}}" id="left-menu2"><i class="fa fa-user-circle custom-icon-dashboard"></i>Add Account Holder(s)</a></li>
                <li class="left-menu"><a href="{{url('/bank-information')}}" id="left-menu3"><i class="fa fa-university custom-icon-dashboard"></i>Add Bank A/C Info</a></li>
                <li class="left-menu"><a href="{{url('/nominee-information')}}" id="left-menu4"><i class="fa fa-users custom-icon-dashboard"></i>Add Nominee Info</a></li>
                <li class="left-menu"><a href="{{url('/document-upload')}}" id="left-menu5"><i class="fa fa-file custom-icon-dashboard"></i>Upload Documents</a></li>
                <li class="left-menu"><a href="{{url('/payment-option')}}" id="left-menu6"><i class="fa fa-credit-card custom-icon-dashboard"></i>Payment Option</a></li>
                <li class="left-menu"><a href="{{url('/payment-status')}}" id="left-menu7"><i class="fa fa-credit-card custom-icon-dashboard"></i>Payment Status</a></li>
            </ul>
        </div>
    </div>
</div>
