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
                <a href="{{URL::to('/')}}" style="text-decoration: none"><p style="font-size: 2.5rem; padding: 6px; margin: 0;">Client Dashboard</p></a>
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
        <div style="background: #ececec; width: 100%; padding: 0; overflow-x: hidden; margin-top: 5rem ">
            <div style="padding: 8px 10px; display: grid; place-content: center">
                <img src="{{URL::to('public/alhaj/images/logo/alhaj-logo.png')}}" width="150px">
                <div class="col-md-12" style="padding-top: 2rem;">
                    <h5>User Name: <span>{{Auth::user()->name}}</span></h5>
                    <h5>User ID: <span>{{Auth::user()->email}}</span></h5>
                </div>
            </div>
            <ul style="margin-top: 4rem;">

                <li class="left-menu">
                    <a href="{{'#'}}" id="left-menu1">CBDL<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li ><a href="{{URL::to('/client/dashboard')}}">CBDL Info</a></li>
                            <li><a href="{{URL::to('/client/cbdl-change-request')}}">CBDL Change Request</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a href="{{url('#')}}" id="left-menu2">Online Deposit<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li><a href="{{URL::to('/client/deposit-in-your-account')}}">Deposit in Your Account</a></li>
                            <li><a href="{{URL::to('/client/deposit-in-your-account-list')}}">Deposit List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a href="{{url('#')}}" id="left-menu2">Share Buy<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li><a href="{{URL::to('/client/buy-share')}}">Buy Share</a></li>
                            <li><a href="{{URL::to('/client/buy-share-list')}}">Buy Share List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a href="{{url('#')}}" id="left-menu2">Share Sell<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li><a href="{{URL::to('/client/sell-share')}}">Sell Share</a></li>
                            <li><a href="{{URL::to('/client/sell-share-list')}}">Sell Share List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a id="left-menu3">Reports<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li><a href="{{URL::to('/client/portfolio')}}">PortFolio</a></li>
{{--                            <li><a href="{{URL::to('/client/live-portfolio')}}">Live PortFolio</a></li>--}}
                            <li><a href="{{URL::to('/client/client-ledger')}}">Client Ledger</a></li>
                            <li><a href="{{URL::to('/client/client-confirmation')}}">Client Confirmation</a></li>
                            <li><a href="{{URL::to('/client/receipt-payment')}}">Receipt/Payment</a></li>
                            <li><a href="{{URL::to('/client/profit-loss-pl')}}">Profit & Loss(P/L)</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a id="left-menu4">IPO Services<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li><a href="{{URL::to('/client/apply-ipo')}}">Apply Online IPO</a></li>
{{--                            <li><a href="#">IPO Genie Registration</a></li>--}}
                            <li><a href="{{URL::to('/client/applied-ipo-information')}}">Applied IPO Information</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a href="{{url('#')}}" id="left-menu2">EFT Services<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li><a href="{{URL::to('/client/withdraw-amount')}}">Submit Requisition</a></li>
                            <li><a href="{{URL::to('/client/withdraw-amount-list')}}">EFT Status</a></li>
                        </ul>
                    </div>
                </li>
                <li class="left-menu">
                    <a href="{{URL::to('/client/support')}}" id="left-menu6">Trading Services</a>
                </li>
                <li class="left-menu">
                    <a id="left-menu7">Margin Loan<i class="fa fa-angle-down client-icon-dashboard"></i></a>
                    <div class="custom-dropdown-client-dashboard">
                        <ul class="client-dropdown-menu">
                            <li><a href="{{URL::to('/client/margin-loan')}}">Margin Loan Apply</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    var theToggle = document.getElementById('toggle');

    // based on Todd Motto functions
    // https://toddmotto.com/labs/reusable-js/

    // hasClass
    function hasClass(elem, className) {
        return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
    }
    // addClass
    function addClass(elem, className) {
        if (!hasClass(elem, className)) {
            elem.className += ' ' + className;
        }
    }
    // removeClass
    function removeClass(elem, className) {
        var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
        if (hasClass(elem, className)) {
            while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
                newClass = newClass.replace(' ' + className + ' ', ' ');
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, '');
        }
    }
    // toggleClass
    function toggleClass(elem, className) {
        var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';
        if (hasClass(elem, className)) {
            while (newClass.indexOf(" " + className + " ") >= 0 ) {
                newClass = newClass.replace( " " + className + " " , " " );
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, '');
        } else {
            elem.className += ' ' + className;
        }
    }

    theToggle.onclick = function() {
        toggleClass(this, 'on');
        return false;
    }
</script>
