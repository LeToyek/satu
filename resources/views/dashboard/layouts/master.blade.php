<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

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

@section('body')
    @include('dashboard.layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('dashboard.layouts.topbar')
        @include('dashboard.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @include('dashboard.components.message_error')
                    @include('dashboard.components.message_success')
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('dashboard.layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    @include('dashboard.layouts.customizer')

    <!-- JAVASCRIPT -->
    @include('dashboard.layouts.vendor-scripts')
</body>

</html>
