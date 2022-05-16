@extends('frontEnd.index')
@section('title') Home @endsection
@section('mainContent')

    <div class="untitled">
        <div class="untitled__slides">
            <div class="untitled__slide">
                <div class="untitled__slideBg"></div>
                <div class="untitled__slideContent">
                    <span>Your Gateway to Success</span>
                    <a class="button" href="{{URL::to('/open-bo-account')}}" target="/black">Open BO</a>
                </div>
            </div>
            <div class="untitled__slide">
                <div class="untitled__slideBg"></div>
                <div class="untitled__slideContent">

                    <span>Grow your finance</span>
                    <span>With us</span>
                    <span></span>
                    <a class="button" href="{{URL::to('/open-bo-account')}}" target="/black">Open BO</a>
                </div>
            </div>
            <div class="untitled__slide">
                <div class="untitled__slideBg"></div>
                <div class="untitled__slideContent">
                    <span>Expending wealth</span>
                    <span>since 1982</span>
                    <a class="button" href="{{URL::to('/open-bo-account')}}" target="/black">Open BO</a>
                </div>
            </div>
            <div class="untitled__slide">
                <div class="untitled__slideBg"></div>
                <div class="untitled__slideContent">
                    <span>Alhaj Securities &</span>
                    <span>Stocks</span>
                    <a class="button" href="{{URL::to('/open-bo-account')}}" target="/black">Open BO</a>
                </div>
            </div>
        </div>
        <div class="untitled__shutters"></div>
    </div>

    <!--            Second Section          -->

    <div class="pd-b-3 pd-t-3" style="width: 100%; background: #ececec">
        <div class="wrap-fix">
            <h1 class="all-heading pd-b-3" style="text-align: center; color: #2C4A5E; border-bottom: 1px solid #2C4A5E;">Alhaj Securities & Stocks Ltd</h1>
            <div class="all-subtitle flex-display">
                <p style="width: 750px; text-align: center">Besides its client-focused objectives, Alhaj Securities & Stocks Ltd is committed to implementing the rules and regulations prescribed by the DSE and SEC in every aspect of its business.</p>
            </div>
        </div>

        <div class="container pd-t-3" id="SelfAssessment">
            <div class="row container-custom">
                <div class="col-md-6"  data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="card-custom">
                        <div class="imgBx">
                            <h3 class="card-custom-text">Mission</h3>
                        </div>
                        <span></span>
                        <div class="content-custom">
                            <h3 id="mission">Mission</h3>
                            <p>To provide the best market experience, through excellence and perseverance.</p>

                            <h5>
                                Our mission is to provide you the best trading experience by ensuring top-quality services. As for foreign clients, we are very flexible
                                and always updating our technology to reach clients all over the world and make trading easier, convenient and safer for them.
                            </h5>

                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="zoom-in-left" data-aos-duration="1000">
                    <div class="card-custom">
                        <div class="imgBx">
                            <h3 class="card-custom-text">Vision</h3>
                        </div>
                        <div class="content-custom">
                            <h3 id="vission">Vision</h3>
                            <p>To be the top financial brand of the country.</p>
                            <h5>
                                We understand that every customer has different requirements and we make sure each of our customer’s requirements are fulfilled on a
                                personalized basis.
                            </h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--            Our Service Start           -->

    <div class="container">
        <h1 class="all-heading pd-b-3" style="text-align: center; color: #2C4A5E; border-bottom: 1px solid #2C4A5E;">Services</h1>
        <div class="service-container">
            <div class="service-card" data-aos="zoom-in-right" data-aos-duration="1000">
                <div class="face face1">
                    <div class="content">
                        <span class="stars"></span>
                        <h2>Online BO A/C Opening</h2>
                        <p>Open your BO Account through your phone and computer.</p>
                        <h3 style="font-size: 2rem">Requirements: </h3>
                        <ul>
                            <li>2 passport size photos of Account Holder</li>
                            <li>NID/Passport of Account Holder</li>
                            <li>1 photo of Bank Cheque</li>
                            <li>1 photo of Nominee</li>
                            <li>NID of Nominee</li>
                            <li>BO A/C Opening Fee: 500</li>
                        </ul>
                    </div>
                </div>
                <div class="face face2">
                    <img class="initial-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-1.png')}}"/>
                    <img class="hover-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-1-w.png')}}"/>
                    <h2>Online BO A/C Opening</h2>
                </div>
            </div>

            <div class="service-card" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="face face1">
                    <div class="content">
                        <span class="stars"></span>
                        <h2>Stock Trading Services</h2>
                        <p>Buy/Sell stocks easily and conveniently</p>
                    </div>
                </div>
                <div class="face face2">
                    <img class="initial-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-2.png')}}"/>
                    <img class="hover-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-2-w.png')}}"/>
                    <h2>Stock Trading Services</h2>
                </div>
            </div>

            <div class="service-card" data-aos="zoom-in-left" data-aos-duration="1000">
                <div class="face face1">
                    <div class="content">
                        <span class="stars"></span>
                        <h2 class="cSharp">Fund Transfer Service (BEFTN)</h2>
                        <p>Bangladesh Electronic Funds Transfer Network (BEFTN) is a system of transferring money from one bank to another bank without money changing hands.</p>
                        <p>No additional charges required</p>
                        <p>Transfer within 48 hours.</p>
                        <p>Supported by all banks in Bangladesh.</p>
                    </div>
                </div>
                <div class="face face2">
                    <img class="initial-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-3.png')}}"/>
                    <img class="hover-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-3-w.png')}}"/>
                    <h2>Fund Transfer Service (BEFTN)</h2>
                </div>
            </div>
        </div>

        <div class="service-container">
            <div class="service-card" data-aos="zoom-in-right" data-aos-duration="1000">
                <div class="face face1">
                    <div class="content">
                        <span class="stars"></span>
                        <h2>IPO Application Service</h2>
                        <p>Initial Public Offering (IPO) is a process for a company to float or go public i.e. to become a public company from a privately held company. Apply for IPO quickly and easily. </p>
                    </div>
                </div>
                <div class="face face2">
                    <img class="initial-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-4.png')}}"/>
                    <img class="hover-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-4-w.png')}}"/>
                    <h2>IPO Application Service</h2>
                </div>
            </div>

            <div class="service-card"data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="face face1">
                    <div class="content">
                        <span class="stars"></span>
                        <h2>Reporting Portal</h2>
                        <p>Get daily updates of your portfolio on your mail.</p>
                    </div>
                </div>
                <div class="face face2">
                    <img class="initial-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-5.png')}}"/>
                    <img class="hover-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-5-w.png')}}"/>
                    <h2>Reporting Portal</h2>
                </div>
            </div>

            <div class="service-card" data-aos="zoom-in-left" data-aos-duration="1000">
                <div class="face face1">
                    <div class="content">
                        <span class="stars"></span>
                        <h2>Margin Loan Facility</h2>
                        <p>A margin loan is a type of investment loan that lets you borrow money to invest in shares. </p>
                    </div>
                </div>
                <div class="face face2">
                    <img class="initial-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-6.png')}}"/>
                    <img class="hover-s" src="{{URL::to('public/alhaj/images/home/services/alhaj-s-6-w.png')}}"/>
                    <h2>Margin Loan Facility</h2>
                </div>
            </div>
        </div>
    </div>

    <!--            Our Service End           -->




    <!--            Overview            -->

    <div id="pset" style="overflow: hidden">
        <header class="header-design">
            <div class="listar-map-button">
                <div class="listar-map-button-text" style="display: inline-block; opacity: 1;">
      <span class="icon-map2">
        Overview</span>
                </div>
            </div>

            <div class="footer-wave"></div>
        </header>
        <div class="pset">
            <div class="container">
                <div class="row listar-feature-items">

                    <div class="col-xs-12 col-sm-6 col-md-4 listar-feature-item-wrapper listar-feature-with-image listar-height-changed" data-aos="fade-zoom-in" data-aos-group="features" data-line-height="25.2px">
                        <div class="listar-feature-item listar-feature-has-link">
                            <a href="{{URL::to('/services')}}"></a>
                            <div class="listar-feature-item-inner">
                                <div class="listar-feature-right-border"></div>
                                <div class="listar-feature-block-content-wrapper">
                                    <div class="listar-feature-icon-wrapper">
                                        <div class="listar-feature-icon-inner">
                                            <div>
                                                <img alt="Businesses" class="listar-image-icon" src="{{URL::to('public/alhaj/images/home/overview/alhaj-o-1.png')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listar-feature-content-wrapper" style="padding-top: 0px;">
                                        <div class="listar-feature-item-title listar-feature-counter-added">
                                            <span>
                                                <span>01</span>
                                                Businesses
                                            </span>
                                        </div>
                                        <div class="listar-feature-item-excerpt">
                                            Start publish listings to show everyone the details and goodies of your establishment.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listar-feature-fix-bottom-padding listar-fix-feature-arrow-button-height"></div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 listar-feature-item-wrapper listar-feature-with-image listar-height-changed" data-aos="fade-zoom-in" data-aos-group="features" data-line-height="25.2px">
                        <div class="listar-feature-item listar-feature-has-link">
                            <a href="{{URL::to('/services')}}"></a>
                            <div class="listar-feature-item-inner">
                                <div class="listar-feature-right-border"></div>
                                <div class="listar-feature-block-content-wrapper">
                                    <div class="listar-feature-icon-wrapper">
                                        <div class="listar-feature-icon-inner">
                                            <div>
                                                <img alt="Customers" class="listar-image-icon" src="{{URL::to('public/alhaj/images/home/overview/alhaj-o-2.png')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="listar-feature-content-wrapper" style="padding-top: 0px;">
                                        <div class="listar-feature-item-title listar-feature-counter-added">
                                          <span>
                                            <span>02</span>
                                            Customers
                                          </span>
                                        </div>
                                        <div class="listar-feature-item-excerpt">
                                            Easily find interesting places by local experts, save time by checking listing features.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listar-feature-fix-bottom-padding listar-fix-feature-arrow-button-height"></div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 listar-feature-item-wrapper listar-feature-with-image listar-height-changed" data-aos="fade-zoom-in" data-aos-group="features" data-line-height="25.2px">
                        <div class="listar-feature-item listar-feature-has-link">
                            <a href="{{URL::to('/services')}}"></a>
                            <div class="listar-feature-item-inner">
                                <div class="listar-feature-right-border"></div>
                                <div class="listar-feature-block-content-wrapper">
                                    <div class="listar-feature-icon-wrapper">
                                        <div class="listar-feature-icon-inner">
                                            <div>
                                                <img alt="Feedback" class="listar-image-icon" src="{{URL::to('public/alhaj/images/home/overview/alhaj-o-3.png')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listar-feature-content-wrapper" style="padding-top: 0px;">
                                        <div class="listar-feature-item-title listar-feature-counter-added">
                                            <span><span>03</span>
                                            Feedback </span>
                                        </div>
                                        <div class="listar-feature-item-excerpt">
                                            Visitors discuss listings to share experiences, so businesses get reputation consolidated.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listar-feature-fix-bottom-padding listar-fix-feature-arrow-button-height"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
