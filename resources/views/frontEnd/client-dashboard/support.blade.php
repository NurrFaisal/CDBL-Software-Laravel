@extends('frontEnd.client-dashboard')
@section('title') Support @endsection
@section('mainContent')


    <style>

        /*          Right Contact Form          */


        #contact {
            background: #fff;
            position: relative;
            width: 400px;
            margin: 0 auto;
            box-shadow: 0 10px 20px rgba(0,0,0,.1)
        }

        .js #contact {
            position: absolute;
            top: 3em;
            display: none;
            left:0; right:0;
        }

        input, select {
            border: 0;
            margin: 1em 40px;
            width: 300px;
            padding: 10px;
            border-bottom: 2px solid #3333ff;
            background: none;
            font-family: 'Fontawesome', 'Source Sans Pro', sans-serif;
            display: block;
            color: #3333ff;
        }

        textarea{
            border: 0;
            width: 300px;
            height: 100px;
            display: block;
            margin-left: 40px;
            background: none;
            padding: 10px;
            font-family: 'Fontawesome', 'Source Sans Pro', sans-serif;
            border-bottom: 2px solid #3333ff;
            color: #3333ff;
        }

        #submit {
            margin: 3em auto 4em;
            border: 2px solid #3333ff;
            color: #3333ff;
        }
        #submit:hover {color: #fff}

        .btn{
            background: none;
            border: 2px solid #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            margin: 15em auto;
            padding: 1.2em 2em;
            color: #ffffff;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
            transition: ease all .3s;
            display: block;
        }

        .btn:hover{background: #3333ff; color: #fff; border: #3333ff solid 2px;}
        .btn:active{background: #3333aa; color: #fff; border: #3333aa solid 2px;}

        .close {
            position: absolute;
            right: 20px;
            top: -10px;
            cursor: pointer;
            font-weight: 400;
            font-size: 3em;
            color: #911b1d;
            opacity: 1;
            font-size: 2.2rem;
            margin: 12px -9px;
        }

        .c-icon{
            font-size: 2rem;
            border: 1px solid #ffffff;
            border-radius: 50%;
            margin: 15px;
            width: 50px;
            height: 50px;
            display: grid;
            place-content: center;
        }
        .c-icon:hover{
            background: #ffffff;
            text-decoration: none !important;
        }
        .connect-dse{
            text-decoration: none;
            text-transform: uppercase;
            width: 145px;
            padding: 8px;
            margin-top: 7rem;
            margin-bottom: 7rem;
        }
        .connect-dse:hover{
            color: #ffffff !important;
        }
    </style>

    <div class="bo-container">
        <div class="section-padding">
            <div style="background: red; width: 100%; height: 100%">
                <div class="row">
                    <div class="col-md-7">
                        <div style="background: black; margin: 0; padding: 0; height: 100vh; display: flex; justify-content: center; align-items: center; flex-direction: column">
                            <div>
                                <a href="https://play.google.com/store/apps/details?id=com.flextrade.dsemogo" target="_blank">
                                    <img src="../public/images/playstore.png" width="210px"/>
                                </a>
                            </div>
                            <div class="social-links">
                                <a href="https://www.facebook.com/AlhajSecuritiesAndStocksLtd" target="_blank" >
                                    <i class="fab fa fa-facebook-f c-icon"></i>
                                </a>
                            </div>
                            <div>
                                <a class="a-glow connect-dse" href="https://investor.dsetrade.com/Cstfwsrv2012/html/MainHome.aspx" target="_blank">Connect with DSE</a>
                            </div>
                            <ul style="color: #ffffff !important; text-align: center; margin-top: 2rem">
                                <li>
                                    <div class="text">
                                        <p>Corporate Member no: 093, Room no: 306, Dhaka Stock Exchange Building,<br>  9/F Motijheel C/A, Dhaka â€“ 1000</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p>+88027176021 <br> +889551534</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <p><a href="mailto:info@alhajsecurities.com" >info@alhajsecurities.com</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5" style="display: flex; justify-content: center; align-items: center; height: 100vh">
                        <button type="button" class="btn" id="c-btn">Open Contact Form</button>
                        <div id="contact">
                            <form method="post" action="{{URL::to('/send-mail')}}" id="contact-form" enctype="multipart/form-data">
                                @csrf
                                <ul>
{{--                                    <h1>Al-haj Securities and Stocks</h1>--}}
                                    <li>
                                        <input type="text" name="name" id="name" placeholder="&#xf2c0; Full name">
                                        <input type="email" name="email" id="email" placeholder="&#xf003; Email">
                                        <input type="number" name="phone" id="phone" placeholder="&#xf095; phone">
                                    </li>
                                    <li>
                                        <select name="subject">
                                            <option selected disabled>Select your service</option>
                                            <option>Online BO A/C Opening</option>
                                            <option>Stock Trading Services</option>
                                            <option>Fund Transfer Service (BEFTN)</option>
                                            <option>IPO Application Service</option>
                                            <option>Reporting Portal</option>
                                            <option>Margin Loan Facility</option>
                                        </select>
                                    </li>
                                    <li>
                                        <textarea name="messageQuery" id="message" placeholder="&#xf040; Your message"></textarea>
                                    </li>
                                    <li>
                                        <input type="submit" value="Send message" class="btn" id="submit">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Contact Address Area-->
    </div>


    <script>
        (function(){
            $('html').addClass('js');

            var contactForm = {
                container: $('#contact'),
                config: {
                    effect: 'slideToggle',
                    speed: 200
                },

                init: function(config){
                    $.extend(this.config, config);

                    $('#c-btn').on('click', this.show);
                },

                show: function(){
                    var cf = contactForm,
                        container = cf.container,
                        config = cf.config;


                    if(container.is(':hidden')){
                        cf.close.call(container);
                        container[config.effect]
                        (config.speed);
                    }
                },

                close: function(){
                    var $this = $('#contact');

                    if($this.find('span.close').length) return;

                    $('<span class=close>x</span>')
                        .prependTo(this)
                        .on('click', function(){
                            $this[contactForm.config.effect](contactForm.config.speed);
                        })
                }
            };

            contactForm.init({
                effect: 'fadeToggle',
                speed: 200
            });
        })();
    </script>


@endsection
