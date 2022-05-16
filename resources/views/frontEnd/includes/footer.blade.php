

<style>

    .footer{
        background:#000;
        padding:30px 0px;
        font-family: 'Play', sans-serif;
        text-align:center;
    }

    .footer .row{
        width:100%;
        margin:1% 0%;
        padding:0.6% 0%;
        color:gray;
        font-size:0.8em;
    }

    .footer .row a{
        text-decoration:none;
        color:gray;
        transition:0.5s;
    }

    .footer .row a:hover{
        color:#fff;
    }

    .footer .row ul{
        width:100%;
    }

    .footer .row ul li{
        display:inline-block;
        margin:0px 30px;
    }

    .footer .row a i{
        font-size:2em;
        margin:0% 1%;
    }

    @media (max-width:720px){
        .footer{
            text-align:left;
            padding:5%;
        }
        .footer .row ul li{
            display:block;
            margin:10px 0px;
            text-align:left;
        }
        .footer .row a i{
            margin:0% 3%;
        }
    }
</style>


<footer>
    <div class="footer">
        <div class="row">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </div>

        <div class="row">
            <ul>
                <li><a href="{{URL::to('/contact')}}">Contact us</a></li>
                <li><a href="#">Our Services</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Career</a></li>
            </ul>
        </div>

        <div class="row">
            Copyright © 2021 Al-haj Securities - All rights reserved || Made with <b style="color: red">&#x2764</b> by <a href="https://nexkraft.com/" target="_blank">NEXKRAFT</a>
        </div>
    </div>
</footer>
