<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-layout-style="default" data-layout-position="fixed" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover" data-layout-width="fluid">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | SaTu - Saling Bantu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/header_logo.svg')}}">
    @include('dashboard.layouts.head-css')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

     @include('dashboard.layouts.topbar')
     @include('dashboard.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>
            @include('dashboard.layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('dashboard.layouts.customizer')
    <!-- END Right Sidebar -->

    @include('dashboard.layouts.vendor-scripts')
</body>

</html>
