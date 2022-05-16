@extends('frontEnd.index')
@section('title') Home @endsection
@section('mainContent')

    <style>

        .login-wrap{
            width:100%;
            margin:auto;
            max-width:525px;
            min-height:550px;
            position:relative;
            background-image:url(https://cdn.pixabay.com/photo/2018/01/12/16/16/growth-3078543_960_720.png);
            box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
            background-size: contain;
            background-position: center center;
            background-repeat: no-repeat;
            border-radius: 30px;
        }
        .login-html{
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 90px 70px 50px 70px;
            background: linear-gradient(
                145deg
                , rgba(255,255,255,0.4) 0%, rgba(255,255,255,0.1) 100%);
            backdrop-filter: blur(6px);
            border-radius: 30px;
        }
        .login-html .sign-in-htm,
        .login-html .sign-up-htm{
            top:0;
            left:0;
            right:0;
            bottom:0;
            position:absolute;
            transform:rotateY(180deg);
            backface-visibility:hidden;
            transition:all .4s linear;
        }
        .login-html .sign-in,
        .login-html .sign-up,
        .login-form .group .check{
            display:none;
        }
        .login-html .tab,
        .login-form .group .label,
        .login-form .group .button{
            text-transform:uppercase;
        }
        .login-html .tab{
            font-size:18px;
            margin-right:15px;
            padding-bottom:5px;
            margin:0 15px 10px 0;
            display:inline-block;
            border-bottom:2px solid transparent;
        }
        .login-html .sign-in:checked + .tab,
        .login-html .sign-up:checked + .tab{
            color:#fff;
            border-color:#1161ee;
        }
        .login-form{
            min-height:300px;
            position:relative;
            perspective:1000px;
            transform-style:preserve-3d;
            margin-top: 2rem;
        }
        .login-form .group{
            margin-bottom:15px;
            margin-left: -27px;
        }
        .login-form .group .label,
        .login-form .group .input-bo-account,
        .login-form .group .button{
            width:100%;
            color:#fff;
            display:block;
        }
        .login-form .group .input-bo-account,
        .login-form .group .button{
            border:none;
            padding:10px 20px;
            border-radius:25px;
            background: rgb(53 44 44 / 34%);
        }
        .login-form .group input[data-type="password"]{
            text-security:circle;
            -webkit-text-security:circle;
        }
        .login-form .group .label{
            color:#aaa;
            font-size:12px;
        }
        .login-form .group .button{
            background:#1161ee;
        }
        .login-form .group label .icon{
            width:15px;
            height:15px;
            border-radius:2px;
            position:relative;
            display:inline-block;
            background:rgba(255,255,255,.1);
        }
        .login-form .group label .icon:before,
        .login-form .group label .icon:after{
            content:'';
            width:10px;
            height:2px;
            background:#fff;
            position:absolute;
            transition:all .2s ease-in-out 0s;
        }
        .login-form .group label .icon:before{
            left:3px;
            width:5px;
            bottom:6px;
            transform:scale(0) rotate(0);
        }
        .login-form .group label .icon:after{
            top:6px;
            right:0;
            transform:scale(0) rotate(0);
        }
        .login-form .group .check:checked + label{
            color:#fff;
        }
        .login-form .group .check:checked + label .icon{
            background:#1161ee;
        }
        .login-form .group .check:checked + label .icon:before{
            transform:scale(1) rotate(45deg);
        }
        .login-form .group .check:checked + label .icon:after{
            transform:scale(1) rotate(-45deg);
        }
        .login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
            transform:rotate(0);
        }
        .login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
            transform:rotate(0);
        }

        /*.hr{*/
        /*    height:2px;*/
        /*    margin:60px 0 50px 0;*/
        /*    background:rgba(255,255,255,.2);*/
        /*}*/
        .foot-lnk{
            text-align:center;
        }

        ::placeholder {
            color: #ffffff;
            opacity: 1;
            letter-spacing: 2px;
        }

        .bo-account-create{
            padding-top: 15rem;
            padding-bottom: 5rem;
            background-image: url("public/alhaj/images/loginBg/bo-log-bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top center;
        }
    </style>


    <div class="bo-account-create">
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up" checked=""><label for="tab-2" class="tab">Open Your BO Account Now</label>
                <div class="login-form">
                    <div class="sign-in-htm">
                        @if(Session::has('message-login'))
                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message-login') }}</p>
                        @endif
                        <form action="{{URL::to('/login-bo-account')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                        <div class="group">
                            <!--                        <label for="user" class="label">Username</label>-->
                            <input id="user" type="text" class="input-bo-account" value="{{ old('user_name') }}" name="user_name" placeholder="Username" >
                        </div>
                            @if ($errors->has('user_name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('user_name') }}</strong>
                                </span>
                            @endif
                        <div class="group">
                            <!--                        <label for="pass" class="label">Password</label>-->
                            <input id="pass" type="password" class="input-bo-account" data-type="password" name="password" value="{{ old('password') }}" placeholder="Password">
                        </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked="">
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group" style="display: flex; justify-content: flex-end">
                            <input type="submit" class="button" value="Sign In" style="width: 135px">
                        </div>
                        </form>
                        <div class="hr"></div>
{{--                        <div class="foot-lnk">--}}
{{--                            <a href="#forgot">Forgot Password?</a>--}}
{{--                        </div>--}}
                    </div>
                    <div class="sign-up-htm">
                        @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                        @endif
                        <form action="{{URL::to('/register-bo-account')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="group">
                                <!--                        <label for="firstName" class="label">First Name</label>-->
                                <input id="firstName" type="text" name="first_name" class="input-bo-account"  value="{{ old('first_name') }}" placeholder="First Name">
                            </div>
                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                            <div class="group">
                                <!--                        <label for="lastName" class="label">Last Name</label>-->
                                <input id="lastName" type="text" name="last_name" class="input-bo-account" value="{{old('last_name')}}" placeholder="Last Name">
                            </div>
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                            <div class="group">
                                <!--                        <label for="mobile" class="label">Mobile</label>-->
                                <input id="mobile" type="text" name="mobile" class="input-bo-account" value="{{old('mobile')}}"  placeholder="Mobile">
                            </div>
                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                            <div class="group">
                                <!--                        <label for="email" class="label">Email Address</label>-->

                                <input id="email" type="email" name="email" class="input-bo-account" value="{{old('email')}}" placeholder="Email Address">
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <div class="group" style="display: flex; justify-content: flex-end">
                                <input type="submit" class="button" value="Sign Up" style="width: 135px"><!--                        <input type="submit" class="button" value="Continue to registration">-->
                            </div>
                        </form>
                        <div class="hr"></div>
                        <div class="foot-lnk" style="margin: 4rem">
                            <label for="tab-1" style="color: #ffffff; font-size: 1.5rem; cursor: pointer">Already Registered?<b style="color: #fff">SIGN IN</b></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
