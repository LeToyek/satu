@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('velzon/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('velzon/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">Wellcome, {{ auth()->user()->name }}!</h4>
                                <p class="text-muted mb-0">Berikut adalah data anda</p>
                            </div>
                            <div class="mt-3 mt-lg-0">
                                <div class="row g-3 mb-0 align-items-center">

                                    <!--end col-->
                                    @if (auth()->user()->role === 'partner')
                                        
                                    <div class="col-auto">
                                        <a type="button" href="/dashboard/campaign/create"
                                            class="btn btn-soft-secondary"><i
                                                class="ri-add-circle-line align-middle me-1"></i>
                                            Tambahkan Kampanye</a>
                                    </div>
                                    @endif
                                    <!--end col-->
                                    <div class="col-auto">
                                        <button type="button"
                                            class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i
                                                class="ri-pulse-line"></i></button>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                {{-- @include('dashboard.components.card_campaign_detail') --}}
                {{-- @include('dashboard.components.page_create_campaign') --}}
                {{-- @include('dashboard.components.table_campaign') --}}
                {{-- @include('dashboard.components.page_explore_campaign') --}}
                @if (auth()->user()->role === 'partner')
                    @include('dashboard.components.dashboard_partner')

                @elseif (auth()->user()->role === 'funder')
                    @include('dashboard.components.dashboard_funder')
                @else

                @endif
            </div> <!-- end .h-100-->

        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('velzon/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/swiper/swiper-bundle.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('velzon/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
