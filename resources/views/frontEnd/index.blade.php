
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title></title>
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="RrHx34rB5v65b0tp9nU0hjIpOq3AipAttgvo7jyFfmAx44uKwo6vs4BffQOlIn7EAX9qgIXn9HSAQbisaNBNOg==">

    <link href="{{asset('/public/alhaj/css/')}}/bootstrap.css" rel="stylesheet">
    <link href="{{asset('/public/alhaj/css/')}}/site.css" rel="stylesheet">
    <link href="{{asset('/public/alhaj/css/')}}/banner.css" rel="stylesheet">
    <link href="{{asset('/public/alhaj/css/')}}/aos.css" rel="stylesheet">
    <link href="{{asset('/public/alhaj/css/')}}/dashboard.css" rel="stylesheet">
</head>
<body>


<div class="wrap">
    <!--        Header Section          -->
    <!--    -->
    @include('frontEnd.includes.header')
    <!--            Banner Section          -->
    @yield('mainContent')
    <!--            Footer Section          -->
    @include('frontEnd.includes.content-area')
    <!-- =============== 1.9 Contact Area End ====================-->
    <!-- =============== 1.9 Footer Area Start ====================-->
    @include('frontEnd.includes.footer')

</div>

</body>

    <script src="{{asset('/public/alhaj/js/')}}/jquery.js"></script>
    <script src="{{asset('/public/alhaj/js/')}}/yii.js"></script>
    <script src="{{asset('/public/alhaj/js/')}}/site.js"></script>
    <script src="{{asset('/public/alhaj/js/')}}/aos.js"></script>
<script>
    AOS.init();
</script>
</html>
