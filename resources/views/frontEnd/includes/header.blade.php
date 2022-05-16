<header>
    <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
        <div class="container navbar-container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::to('/')}}" style="width: 180px; height: 95px; object-fit: contain; display: flex; justify-content: center;">
                    <img src="{{URL::to('public/alhaj/images/logo/alhaj-logo.png')}}" width="100%">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="dropdown">
                        <a id="whyAlhaj">Why AlHaj<span><i class="fa fa-angle-down custom-icon" id="rotateW"></i></span></a>
                        <div class="custom-dropdown" id="whyAlhajDropdown">
                            <ul class="custom-dropdown-menu">
                                <li><a href="{{URL::to('/')}}">Corporate Profile</a></li>
                                <li><a href="{{URL::to('/')}}">Board of Directors</a></li>
                                <li><a href="{{URL::to('/')}}">Executives</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a id="services">Services<span><i class="fa fa-angle-down custom-icon" id="rotateS"></i></span></a>
                        <div class="custom-dropdown" id="servicesDropdown">
                            <ul class="custom-dropdown-menu">
                                <li><a href="{{URL::to('/services')}}">Online BO A/C Opening</a></li>
                                <li><a href="{{URL::to('/services')}}">Fund Deposit</a></li>
                                <li><a href="{{URL::to('/services')}}">EFT (Electronic Fund Transfer)</a></li>
                                <li><a href="{{URL::to('/services')}}">IPO Service</a></li>
                                <li><a href="{{URL::to('/services')}}">Online Trading</a></li>
                                <li><a href="{{URL::to('/services')}}">Reporting Portal</a></li>
                                <li><a href="{{URL::to('/services')}}">Margin Loan Facility</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{URL::to('/')}}">Download</a></li>
                    <li class="dropdown">
                        <a id="guidelines">Guidelines<span><i class="fa fa-angle-down custom-icon" id="rotateG"></i></span></a>
                        <div class="custom-dropdown" id="guidelinesDropdown">
                            <ul class="custom-dropdown-menu">
                                <li><a href="{{URL::to('/guidelines#section-1')}}">Basic of Investing</a></li>
                                <li><a href="{{URL::to('/guidelines#section-2')}}">Why Investing</a></li>
                                <li><a href="{{URL::to('/guidelines#section-3')}}">Start Investing</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{URL::to('/contact')}}">Contact</a></li>
                </ul>
            </div>
            <div class="top-social">
                <ul id="top-social-menu">
                    <li class="open-account"><a href="{{URL::to('/open-bo-account')}}" style="color: #ffffff; font-size: 1.3rem; font-weight: 600; padding: 10px 15px">Open BO Account </a></li>
                    <li class="open-account"><a href="{{URL::to('/login')}}" style="color: #ffffff; font-size: 1.3rem; font-weight: 600; padding: 10px 15px">Login/Register </a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Research</a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-blog"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
{{--<div id="backdrop" class=""></div>--}}
