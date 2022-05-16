@extends('frontEnd.index')
@section('title') Services @endsection
@section('mainContent')

    <style>

        .each-accordion{
            width: 100%;
        }
        .accordion-bral {
            padding-top: 150px;
            width: 80% !important;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            min-width: 220px;
            height: 100%;
            background-color: #FFF;
        }
        .accordion-bral .ac-label {
            font-family: Arial, sans-serif;
            padding: 5px 20px;
            position: relative;
            display: block;
            height: auto;
            cursor: pointer;
            color: #ffffff;
            line-height: 33px;
            font-size: 19px;
            background: #921b1d;
            border: 1px solid #CCC;
        }
        .accordion-bral .ac-label:hover {
            background: #BBB;
        }
        .accordion-bral input + .ac-label  {
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .accordion-bral input:checked + .ac-label,
        .accordion-bral input:checked + .ac-label:active {
            background-color: #921b1d;
            color: #FFF;
            box-shadow: 0px 0px 0px 1px rgba(155, 155, 155, 0.3), 0px 2px 2px rgba(0, 0, 0, 0.1);
        }
        .accordion-bral input.ac-input {
            display: none;
        }
        .accordion-bral .article {
            background: rgb(240, 240, 240);
            overflow: hidden;
            height: 0px;
            max-height: auto;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .accordion-bral .article p {
            color: #777;
            line-height: 23px;
            font-size: 14px;
            padding: 20px;
        }
        .accordion-bral input:checked ~ .article i {
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }
        .accordion-bral input:checked ~ .article.ac-content {
            height: auto;
            padding: 14px;
        }

        .accordion-bral i {
            position: absolute;
            transform: translate(-30px, 0);
            margin-top: 16px;
            right: 0;
        }
        .accordion-bral input:checked ~ .ac-label i:before {
            transform: translate(2px, 0) rotate(-45deg);
        }
        .accordion-bral input:checked ~ .ac-label i:after {
            transform: translate(-2px, 0) rotate(45deg);
        }
        .accordion-bral i:before, .accordion-bral i:after {
            content: "";
            position: absolute;
            background-color: #808080;
            width: 3px;
            height: 9px;
        }
        .accordion-bral i:before, .accordion-bral i:after {
            content: "";
            position: absolute;
            background-color: #ffffff;
            width: 3px;
            height: 9px;
        }
        .accordion-bral i:before {
            transform: translate(-2px, 0) rotate(-45deg);
        }
        .accordion-bral i:after {
            transform: translate(2px, 0) rotate(45deg);
        }
        ul.ac-list {
            padding-left: 40px;
            list-style-type: disc;
        }

        table.ac-table {
            margin: 20px 0 20px 20px;
        }
        table.ac-table th{
            text-align: left;
        }

        @media (max-width: 550px) {
            .accordion-bral .ac-label {
                font-family: Arial, sans-serif;
                padding: 5px 20px;
                position: relative;
                display: block;
                height: auto;
                padding-right: 40px;
                cursor: pointer;
                color: #ffffff;
                line-height: 33px;
                font-size: 19px;
                background: #921b1d;
                border: 1px solid #CCC;
            }
            .accordion-bral i {
                position: absolute;
                transform: translate(-30px, 0);
                margin-top: 2%;
                right: 0;
            }
        }
    </style>

    <div class="accordion-bral">
        <div class="each-accordion">
            <!-- accordion item 1 -- start -->
            <input class="ac-input" id="ac-1" name="accordion-1" type="checkbox" checked/>
            <label class="ac-label" for="ac-1">Online BO A/C Opening<i></i></label>
            <div class="article ac-content">
                <h2>Requirements for opening Single Account</h2>
                <ul>
                    <li>
                        Passport Size Photo (Lab Print):
                        <ol>
                            <li>Account Holder (2 Copies) and </li>
                            <li>Nominee (1 Copy – Attested by Account holder)</li>
                        </ol>
                    </li>
                    <li>
                        NID/Passport/Driving License Copy:
                        <ol>
                            <li>Account Holder & Nominee </li>
                        </ol>
                    </li>
                    <li>Cheque Book Leaf Copy</li>
                </ul>

                <h2>Requirements for opening Joint Account</h2>
                <ul>
                    <li>
                        Passport Size Photo (Lab Print):
                        <ol>
                            <li>Account Holder (2 Copies)</li>
                            <li>Joint Account Holder (2 Copies)</li>
                            <li>Nominee (1 Copy – Attested by Both Account holder)</li>
                        </ol>
                    </li>
                    <li>
                        NID/Passport/Driving License Copy:
                        <ol>
                            <li>Account Holder, Joint Account Holder & Nominee </li>
                        </ol>
                    </li>
                    <li>Cheque Book Leaf Copy</li>
                </ul>

                <h2>Requirements for opening Company Account (Proprietorship):</h2>
                <ul>
                    <li>
                        Passport Size Photo (Lab Print):
                        <ol>
                            <li>Account Holder (2 Copies)</li>
                            <li>Nominee (1 Copy – Attested by Account holder)</li>
                        </ol>
                    </li>
                    <li>
                        NID/Passport/Driving License Copy:
                        <ol>
                            <li>Account Holder & Nominee </li>
                        </ol>
                    </li>
                    <li>Cheque Book Leaf Copy (Company Bank Account)</li>
                    <li>Update Trade License Copy</li>
                    <li>TIN Certificate Copy</li>
                </ul>

                <h2>Requirements for opening Company Account (Limited Company):</h2>
                <ul>
                    <li>
                        Passport Size Photo (Lab Print):
                        <ol>
                            <li>Account Holder (2 Copies)</li>
                            <li>Nominee (1 Copy – Attested by Account holder)</li>
                        </ol>
                    </li>
                    <li>
                        NID/Passport/Driving License Copy:
                        <ol>
                            <li>Account Holder & Nominee </li>
                        </ol>
                    </li>
                    <li>Cheque Book Leaf Copy (Company Bank Account)</li>
                    <li>Update Trade License Copy</li>
                    <li>Copy of Article of Association, Memorandum of Association, Incorporation Certificate</li>
                    <li>TIN Certificate Copy</li>
                    <li>Board Resolution copy</li>
                </ul>

                <h2>Requirements for opening link Account: </h2>
                <ul>
                    <li>Previous Documents as per BO Accounts types</li>
                    <li>Previous BO Acknowledgement copy</li>
                </ul>

                <p style="font-size: 1.25rem; margin-top: 25px; font-style: italic; font-weight: 600;">N.B: One person can open one single and one joint account only. One Bank Account number can be use in one single and one joint account only. If provide TIN Certificate, you can get 5% tax rebate.  </p>
            </div>
        </div>
        <!-- accordion item 1 -- end -->

        <div class="each-accordion">
            <!-- accordion item 2 -- start -->
            <input class="ac-input" id="ac-2" name="accordion-1" type="checkbox"/>
            <label class="ac-label" for="ac-2">Stock Trading Services<i></i></label>
            <div class="article ac-content">
                <h2>Buy/Sell stocks easily and conveniently.</h2>
            </div>
        </div>
        <!-- accordion item 2 -- end -->

        <div class="each-accordion">
            <!-- accordion item 3 -- start -->
            <input class="ac-input" id="ac-3" name="accordion-1" type="checkbox" />
            <label class="ac-label" for="ac-3">Fund Transfer Service (BEFTN): <i></i></label>
            <div class="article ac-content">
                <ul>
                    <li>Bangladesh Electronic Funds Transfer Network (BEFTN) is a system of transferring money from one bank to another bank without money changing hands.</li>
                    <li>No additional charges required</li>
                    <li>Transfer within 48 hours.</li>
                    <li>Supported by all banks in Bangladesh.</li>
                </ul>
            </div>
        </div>
        <!-- accordion item 3 -- end -->

        <div class="each-accordion">
            <!-- accordion item 4 -- start -->
            <input class="ac-input" id="ac-4" name="accordion-1" type="checkbox" />
            <label class="ac-label" for="ac-4">IPO Application Service<i></i></label>
            <div class="article ac-content">
                <h2>
                    Initial Public Offering (IPO) is a process for a company to float or go public i.e. to become a public company from a privately held company. Apply for IPO quickly and easily.
                </h2>
            </div>
        </div>
        <!-- accordion item 4 -- end -->

        <div class="each-accordion">
            <!-- accordion item 5 -- start -->
            <input class="ac-input" id="ac-5" name="accordion-1" type="checkbox" />
            <label class="ac-label" for="ac-5">Reporting Portal<i></i></label>
            <div class="article ac-content">
                <h2>
                    Get daily updates of your portfolio on your mail.
                </h2>
            </div>
        </div>
        <!-- accordion item 5 -- end -->

        <div class="each-accordion">
            <!-- accordion item 6 -- start -->
            <input class="ac-input" id="ac-6" name="accordion-1" type="checkbox" />
            <label class="ac-label" for="ac-6">Margin Loan Facility<i></i></label>
            <div class="article ac-content">
                <h2>
                    A margin loan is a type of investment loan that lets you borrow money to invest in shares.
                </h2>
            </div>
        </div>
        <!-- accordion item 5 -- end -->
    </div>

    <div style="padding-top: 50px; width: 80%; margin: auto; margin-bottom: 50px">
        <div class="wrap-fix" style="padding-bottom: 50px;">
            <h1 class="all-heading pd-b-3" style="text-align: center; color: #2C4A5E; border-bottom: 1px solid #2C4A5E;">Overview</h1>
{{--            <div class="all-subtitle flex-display">--}}
{{--                <p style="width: 750px; text-align: center">Besides its client-focused objectives, Alhaj Securities & Stocks Ltd is committed to implementing the rules and regulations prescribed by the DSE and SEC in every aspect of its business.</p>--}}
{{--            </div>--}}
        </div>

        <p>
            Alhaj Securities & Stocks Ltd is one of the oldest and among the most esteemed brokerage houses operating in Bangladesh today.
            In 2006, as per DSE regulations, the company became a full-fledged private company under the companies act of 1994 and was renamed
            Alhaj Securities & Stocks Ltd. Established in 1982, we have been proudly serving the Capital Market with over 38 years of trading
            service for our clients.
        </p>
        <p>
            In 2006, Alhaj Securities & Stocks Ltd opened its first branch office in Narayanganj. Since then, the company has opened 7 more branches
            in different parts of the city with more plans to expand and open more branches country-wide. As a DSE member for over three decades,
            Alhaj Securities & Stocks Ltd has been providing services to its clients with its dedicated team of experts in every branch who ensure
            that their customers receive the best and most personalized services. Clients can go and trade at their nearest branch, and can thus
            directly get benefited from the services provided by the company. As a client focused financial institution, it has always been and will
            remain dedicated to meet its clients’ needs. Over the years, Alhaj Securities & Stocks Ltd has been successfully able to meet the challenges
            faced by a fast growing and ever-changing stock market.
        </p>
    </div>

@endsection
