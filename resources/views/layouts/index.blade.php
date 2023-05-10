<html>

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--====== Title ======-->
    <title> SaTu - Saling Bantu </title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="img/png" />
    <!--====== Animate Css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
    <!--====== Flaticon css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" />
    <!--====== Slick Css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}" />
    <!--====== Lity Css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/lity.min.css') }}" />
    <!--====== Main css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
</head>

<body>

    @include('layouts.navbar')
    @yield('container')
    @include('layouts.footer')

    <!--====== jquery js ======-->
    <script src="{{ 'assets/js/jquery.min.js' }}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{ 'assets/js/bootstrap.min.js' }}"></script>
    <!--====== Inview js ======-->
    <script src="{{ 'assets/js/jquery.inview.min.js' }}"></script>
    <!--====== Slick js ======-->
    <script src="{{ 'assets/js/slick.min.js' }}"></script>
    <!--====== Lity js ======-->
    <script src="{{ 'assets/js/lity.min.js' }}"></script>
    <!--====== Wow js ======-->
    <script src="{{ 'assets/js/wow.min.js' }}"></script>
    <!--====== Main js ======-->
    <script src="{{ 'assets/js/main.js' }}"></script>

</body>

</html>
