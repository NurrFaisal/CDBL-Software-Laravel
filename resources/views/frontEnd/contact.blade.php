@extends('frontEnd.index')
@section('title') Contact @endsection
@section('mainContent')



    <style>


        .form-overlay {
            width: 0%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            opacity: 0;
            background: #000;
            transition: background 1s, opacity 0.4s, width 0s 0.4s;
        }
        .show-form-overlay .form-overlay {
            width: 100%;
            opacity: 0.7;
            z-index: 999;
            transition: background 1s, opacity 0.4s, width 0s;
        }
        .show-form-overlay.form-submitted .form-overlay {
            background: #119da4;
            transition: background 0.6s;
        }
        #form-container {
            cursor: pointer;
            color: #fff;
            z-index: 9999;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            bottom: 5vh;
            background-color: #f72f4e;
            overflow: hidden;
            border-radius: 50%;
            width: 60px;
            max-width: 60px;
            height: 60px;
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            transition: all 0.2s 0.45s, height 0.2s cubic-bezier(0.4, 0, 0.2, 1) 0.25s, max-width 0.2s cubic-bezier(0.4, 0, 0.2, 1) 0.35s, width 0.2s cubic-bezier(0.4, 0, 0.2, 1) 0.35s;
        }
        #form-container.expand {
            cursor: auto;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.17);
            border-radius: 0;
            width: 70%;
            height: 610px;
            max-width: 610px;
            padding: 0;
            transition: all 0.2s, max-width 0.2s cubic-bezier(0.4, 0, 0.2, 1) 0.1s, height 0.3s ease 0.25s;
            top: 2%;
        }
        #form-close {
            cursor: pointer;
        }
        .icon::before {
            cursor: pointer;
            font-size: 30px;
            line-height: 60px;
            display: block;
            transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .icon:hover::before {
            /*animation: wiggle 0.1s linear infinite;*/
            transform: scale(1.4);
        }
        .fa-pencil::before {
            display: block;
        }
        .fa-close::before {
            display: none;
        }
        .expand.fa-pencil::before {
            display: none;
        }
        .expand.fa-close::before {
            display: block;
            animation: none;
        }
        #form-content {
            font-family: Roboto, sans-serif;
            transform: translateY(150%);
            width: 100%;
            opacity: 0;
            text-align: left;
            transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.2s 0.2s;
        }
        #form-content.expand {
            transform: translateY(0px);
            opacity: 1;
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1) 0.3s, opacity 0s;
        }
        #form-content form {
            color: #fff;
            width: 100%;
            height: 100%;
            padding: 0 20px 20px 20px;
            margin-bottom: 10px;
            box-sizing: border-box;
            text-align: left;
        }
        #form-head {
            font-size: 100%;
            padding: 0;
            margin: 0 20px;
            color: #fff;
            text-align: center;
            transition: all 0.8s 0.6s;
        }
        #form-head h1, #form-head p {
            padding: 0;
            margin: 0;
        }
        #form-head .pre {
            display: block;
        }
        #form-head .post {
            display: none;
        }
        .form-submitted#form-head {
            transform: translateY(250%);
        }
        .form-submitted#form-head .pre {
            display: none;
        }
        .form-submitted#form-head .post {
            display: block;
        }
        .input {
            background: rgba(0, 0, 0, 0.2);
            display: block;
            height: 50px;
            width: 100%;
            margin: 10px 0;
            padding: 0 10px;
            border-width: 0;
            box-sizing: border-box;
            border: none;
            outline: none;
            box-shadow: none;
            transform: translateX(0);
        }
        ::-webkit-input-placeholder {
            /* Safari, Chrome and Opera */
            color: rgba(255, 255, 255, 0.8);
            font-size: 90%;
        }
        /* Firefox 18- */
        :-moz-placeholder {
            color: rgba(255, 255, 255, 0.8);
            font-size: 90%;
        }
        /* Firefox 19+ */
        ::-moz-placeholder {
            color: rgba(255, 255, 255, 0.8);
            font-size: 90%;
        }
        /* IE 10+ */
        :-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.8);
            font-size: 90%;
        }
        /* Edge */
        ::-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.8);
            font-size: 90%;
        }
        /* Default */
        :placeholder-shown {
            color: rgba(255, 255, 255, 0.8);
            font-size: 90%;
        }
        input, select, textarea {
            color: #fff;
        }
        .input.message {
            resize: none;
            height: 150px;
            padding: 10px;
        }
        .input.submit {
            background-color: #fff;
            color: #f72f4e;
            font-size: 120%;
            height: 80px;
            box-shadow: 0 5px rgba(0, 0, 0, 0.5);
            transition: all 0.1s, transform 0s 0.6s;
        }
        .input.submit:active {
            margin-top: 15px;
            box-shadow: 0 0 rgba(0, 0, 0, 0.5);
        }
        .input.form-error {
            animation: error 0.8s ease;
            background: rgba(0, 0, 0, 0.7);
        }
        select option {
            background: #f72f4e;
            color: #fff;
            border: none;
            box-shadow: none;
            outline: none;
        }
        select option:disabled {
            font-style: italic;
            color: rgba(255, 255, 255, 0.9);
            font-size: 90%;
        }
        .input {
            transition: transform 0s 1s;
        }
        .form-submitted .input {
            transform: translateX(150%);
            opacity: 0;
            transition: all 0.5s, transform 0.4s cubic-bezier(0.4, 0, 0.2, 1) 0s;
        }
        .form-submitted .input:nth-child(1) {
            transition-delay: 0.1s;
        }
        .form-submitted .input:nth-child(2) {
            transition-delay: 0.2s;
        }
        .form-submitted .input:nth-child(3) {
            transition-delay: 0.3s;
        }
        .form-submitted .input:nth-child(4) {
            transition-delay: 0.4s;
        }
        .form-submitted .input:nth-child(5) {
            transition-delay: 0.5s;
        }
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px #fff inset;
        }
        @media (max-width: 600px) {
            #form-container.expand {
                height: 100%;
                width: 100%;
                max-width: 100%;
                overflow: initial;
                overflow-x: hidden;
                bottom: 0;
            }
            h1 {
                font-size: 300%;
            }
            .icon:hover::before {
                animation: none;
            }
            .form-overlay {
                display: none;
                transition: none;
            }
        }
        @keyframes error {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-6px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(6px);
            }
        }
        @keyframes wiggle {
            0%, 100% {
                transform: rotate(-15deg);
            }
            50% {
                transform: rotate(15deg);
            }
        }


        .contact-banner-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ececec;
        }
        .hero {

        }
        .contact-banner-container h1 {
            margin: 2rem 0 5rem 0;
            transition: all 0.2s;
            border-top: 5px solid #4b90fe;
            border-bottom: 5px solid #4b90fe;
            padding-top: 20px;
            padding-bottom: 20px;
            font-weight: 700;
            z-index: 1;
            text-shadow: 8px 8px 3px rgb(0 0 0 / 10%);
            text-align: center;
            display: inline-block;
            font-size: 7rem;
        }
        h1:hover {
            transform: scale(1.2) rotateX(-20deg) rotateY(10deg);
        }
        h1:hover :nth-child(even) {
            animation-delay: 0.15s;
        }
        h1:hover span {
            display: inline-block;
            animation-name: wiggle;
            animation-duration: 0.4s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
        }
        @keyframes wiggle {
            0% {
                transform: translate(0, 0px) rotate(-12deg);
                text-shadow: 10px 10px 3px rgba(0, 0, 0, 0.1);
            }
            65% {
                transform: translate(0, 15px) rotate(12deg) scale(1.3);
                text-shadow: -10px -10px 3px rgba(0, 0, 0, 0.1);
            }
            100% {
                transform: translate(0, 0px) rotate(-12deg);
                text-shadow: 10px 10px 3px rgba(0, 0, 0, 0.1);
            }
        }

        footer{
            display: none !important;
        }

        .contact-area{
            display: none !important;
        }

    </style>
    <div class="contact-banner-container" style="height: 100vh">
        <header class="hero">
            <h1 id="title">
                <span>C</span>
                <span>O</span>
                <span>N</span>
                <span>T</span>
                <span>A</span>
                <span>C</span>
                <span>T</span>
                <span> </span>
                <span> </span>
                <span>U</span>
                <span>S</span>
            </h1>
        </header>
    </div>

    <div style="height: 100%">
        <div class="form-overlay"></div>
        <div class="icon fa fa-pencil" id="form-container">
            <span class="icon fa fa-close" id="form-close"></span>
            <div id="form-content">
                <div id="form-head">
                    <h1 class="pre">Get in touch</h1>
                    <p class="pre">with ALHAJ SECURITY</p>
                    <h1 class="post">Thanks!</h1>
                    <p class="post">I'll be in touch ASAP</p>
                </div>
                <form method="post" action="{{URL::to('/send-mail')}}" id="contact-form" enctype="multipart/form-data">
                    @csrf

                    <input class="input name" name="name" placeholder="Full Name" type="text" required>
                    <input class="input email" name="email" placeholder="E-mail" type="text">
                    <input class="input email" name="phone" placeholder="Phone" type="number">
                    <select class="input select" name="subject">
                        <option selected disabled>Select your service</option>
                        <option>Online BO A/C Opening</option>
                        <option>Stock Trading Services</option>
                        <option>Fund Transfer Service (BEFTN)</option>
                        <option>IPO Application Service</option>
                        <option>Reporting Portal</option>
                        <option>Margin Loan Facility</option>
                    </select>
                    <textarea class="input message" name="messageQuery" placeholder="How can I help?"></textarea>
                    <input class="input submit" type="submit" value="Send Message">
                </form>
            </div>
        </div>
    </div>


<script>

    //Closing the form
    $('#form-close, .form-overlay').click(function(e) {
        e.stopPropagation();
        e.preventDefault();
        toggleForm();
        bindFormClick();
    });

    function toggleForm(){
        $(formContainer).toggleClass('expand');
        $(formContainer).children().toggleClass('expand');
        $('body').toggleClass('show-form-overlay');
        $('.form-submitted').removeClass('form-submitted');
    }

    //Form validation
    $('form').submit(function() {
        var form = $(this);
        form.find('.form-error').removeClass('form-error');
        var formError = false;

        form.find('.input').each(function() {
            if ($(this).val() == '') {
                $(this).addClass('form-error');
                $(this).select();
                formError = true;
                return false;
            }
            else if ($(this).hasClass('email') && !isValidEmail($(this).val())) {
                $(this).addClass('form-error');
                $(this).select();
                formError = true;
                return false;
            }
        });

        if (!formError) {
            $('body').addClass('form-submitted');
            $('#form-head').addClass('form-submitted');
            setTimeout(function(){
                $(form).trigger("reset");
            }, 1000);
        }
        return false;
    });

    function isValidEmail(email) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(email);
    };

</script>
@endsection
