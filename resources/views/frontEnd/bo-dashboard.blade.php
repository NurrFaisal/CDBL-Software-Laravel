<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>

    <link href="{{asset('/public/alhaj/css/')}}/bootstrap.css" rel="stylesheet">
    <link href="{{asset('/public/alhaj/css/')}}/site.css" rel="stylesheet">
    <link href="{{asset('/public/alhaj/css/')}}/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <script src="{{asset('/public/alhaj/js/')}}/jquery.js"></script>
    <script src="{{asset('/public/alhaj/js/')}}/yii.js"></script>
    <script src="{{asset('/public/alhaj/js/')}}/site.js"></script>
    <script src="{{asset('/public/alhaj/js/')}}/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>



<div class="wrap">

    @include('frontEnd.includes.client.header_and_sidebar')
    @yield('mainContent')

    <div/>

<script>
    AOS.init();
</script>

<script>
    $(document).ready(function(){
        // Show hide popover
        $(".dropdown").click(function(){
            $(this).find(".left-side-menu-custom-dropdown").slideToggle("300");
        });
    });
    $(document).on("click", function(event){
        var $trigger = $(".dropdown");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(this).find(".left-side-menu-custom-dropdown").slideUp("300");
        }
    });


    $("#left-menu1").click(function () {
        $("#servicesDropdown").hide()
        $("#guidelinesDropdown").hide()
    })

    $(".left-side-menu-custom-dropdown").hide()
</script>
</body>
</html>
