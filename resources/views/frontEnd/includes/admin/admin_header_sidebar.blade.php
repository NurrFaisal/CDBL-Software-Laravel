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


    #adminMenuScroll::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    #adminMenuScroll::-webkit-scrollbar
    {
        width: 6px;
        background-color: #F5F5F5;
    }

    #adminMenuScroll::-webkit-scrollbar-thumb
    {
        background-color: #921b1d;
        border-radius: 14px;
    }


</style>

<div>
    <div class="fixed-header">
        <div class="row">
            <div class="col-md-5" style="padding: 2px 2.2rem">
                <a href="{{URL::to('/')}}" style="text-decoration: none"><p style="font-size: 2.5rem; padding: 6px; margin: 0;">Admin Dashboard</p></a>
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
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            Logout<i class="fa fa-sign-out"></i>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
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
        <div style="background: #ececec; width: 100%; padding: 0; overflow-y: auto; overflow-x: hidden; margin-top: 5rem " id="adminMenuScroll">
            <div style="padding: 8px 10px; display: grid; place-content: center">
                <img src="{{URL::to('public/alhaj/images/logo/alhaj-logo.png')}}" style="width: 200px">
                <div class="col-md-12" style="padding-top: 2rem;">
                    <h5>User Name: <span>{{Auth::user()->name}}</span></h5>
                    <h5>User ID: <span>{{Auth::user()->email}}</span></h5>
                </div>
            </div>
            <ul style="margin-top: 4rem;">
                <li class="left-menu">
                    <a id="left-menu1">BO Account<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/bo-request-list')}}">BO Request List</a></li>
                            <li><a href="{{URL::to('/admin/bo-change-request-list')}}">BO Change Request</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a id="left-menu1">Bank<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/add-bank')}}">Add New Bank</a></li>
                            <li><a href="{{URL::to('/admin/bank-list')}}">List of Bank</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a id="left-menu1">Bank Branch<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/add-bank-branch')}}">Add New Bank Branch</a></li>
                            <li><a href="{{URL::to('/admin/bank-branch-list')}}">List of Bank Branch</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a id="left-menu1">District<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/add-district')}}">Add District</a></li>
                            <li><a href="{{URL::to('/admin/district-list')}}">List of District</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a id="left-menu1">Users<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/new-user')}}">Add New User</a></li>
                            <li><a href="{{URL::to('/admin/user-list')}}">List of User</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a href="{{'#'}}" id="left-menu1">Branch<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/add-branch')}}">Add New Branch</a></li>
                            <li><a href="{{URL::to('/admin/branch-list')}}">List Branch</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a href="{{'#'}}" id="left-menu1">Share<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/add-share')}}">Add Share</a></li>
                            <li><a href="{{URL::to('/admin/share-list')}}">Share List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a href="{{'#'}}" id="left-menu1">Client Share Request<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/client-share-buy-request')}}">Share Buy Request</a></li>
                            <li><a href="{{URL::to('/admin/client-share-sell-request')}}">Share Sell Request</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a href="{{'#'}}" id="left-menu1">IPO<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/new-ipo')}}">Create New IPO</a></li>
                            <li><a href="{{URL::to('/admin/ipo-list')}}">IPO List</a></li>
                        </ul>
                    </div>
                </li>

                <li class="left-menu">
                    <a href="{{'#'}}" id="left-menu1">Margin Loan<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/margin-loan-request')}}">Margin Loan Request List</a></li>
                            <li ><a href="{{URL::to('/admin/margin-loan-approved-list')}}">Margin Loan Approved List</a></li>
                        </ul>
                    </div>
                </li>

                <li class="left-menu">
                    <a href="{{URL::to('/admin/ipo-requests')}}" id="left-menu1">IPO Request</a>
                </li>
                <li class="left-menu">
                    <a href="{{URL::to('/admin/client-withdraw-request')}}" id="left-menu1">EFT Request</a>
                </li>
                <li class="left-menu">
                    <a href="{{URL::to('/admin/bo-amount')}}" id="left-menu1">BO Amount | Min Balance</a>
                </li>
                <li class="left-menu">
                    <a href="{{URL::to('/admin/client-deposit-request')}}" id="left-menu1">Client Deposite Request</a>
                </li>
                <li class="left-menu">
                    <a href="{{'#'}}" id="left-menu1">XML File Import<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/traders-job')}}">Traders Job</a></li>
                            <li><a href="{{URL::to('/admin/eod-tickers')}}">EOD Tickers</a></li>
                        </ul>
                    </div>
                </li>
                <?php  {?>
                <li class="left-menu">
                    <a href="{{'#'}}" id="left-menu1">CSV File Import<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/admin/pe-ratio')}}">PE Ratio</a></li>
                            <li><a href="{{URL::to('/admin/bonus-receivable')}}">Bonus Receivable</a></li>
                            <li><a href="{{URL::to('/admin/bonus')}}">Bonus</a></li>
                            <li><a href="{{URL::to('/admin/accrued-charge')}}">Accrued Charge</a></li>
                            <li><a href="{{URL::to('/admin/charge')}}">Charge</a></li>
                        </ul>
                    </div>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>
