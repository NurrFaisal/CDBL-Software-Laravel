<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>BO-Form</title>
</head>
<body>
<style>
    * {
        box-sizing: border-box;
    }

    @media print{
        .no-print, .no-print *{
            display: none !important;
        }
        .print-m-0{
            margin: 0 !important;
        }
    }
    .row{
        width: 100%;
        display: flex;
        justify-content: space-between;
    }
    .header-d-one{
        width: 25%;

    }
    .header-d-two{
        width: 50%;
        margin-left: 25%;
        text-align: center;
    }
    .header-d-three{
        width: 25%;
        margin-left: 75%;
    }
    .header-d-two p{
        margin: 0;
        font-size: 11.5px;
    }
</style>

<div class="toolbar no-print">
    <div class="row">
        <div class="header-d-one">
            <div style="border: 1px solid; margin: 14px;height: 100px; width: 100%">
                <img src="{{URL::to('/public/alhaj/images/logo/alhaj-logo.png')}}" width="100%">
            </div>
        </div>
        <div class="header-d-two">
            <div style="margin: 14px; width: 100%">
                <p>FORM-II</p>
                <p>[see rule 5(2)(e)]</p>
                <p style="font-weight: 800; color: #921b1d">ALHAJ SECURITIES AND STOCKS LTD</p>
                <p>TREC Holder of Dhaka Stock Exchange Ltd.</p>
                <p>Room no. 306, Dhaka Stock Exchange Building, 9/F Motijheel C/A, Dhaka.</p>
                <p>Tel: 9576120, 9576121, Email: alhajsecuritiesltd@gmail.com</p>
            </div>
            <div style="border: 1px solid #921b1d; padding: 5px; margin-top: 25px">
                <p style="font-size: 10px; font-weight: 800; color: #921b1d">CUSTOMER ACCOUNT OPENING FORM</p>
            </div>
        </div>
        <div class="header-d-three">
            <div style="border: 1px solid; margin: 14px;height: 100px; width: 100%">
                <p style="font-size: 8px; padding: 20px">Photograph of MD/CEO with attestation of the Introducer.</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
