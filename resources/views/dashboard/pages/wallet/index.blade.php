@extends('dashboard.layouts.master')
@section('title')
    NFT Dashboard
@endsection
@section('css')
    <!--Swiper slider css-->
    <link href="{{ URL::asset('velzon/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- jsvectormap css -->
    <link href="{{ URL::asset('velzon/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Wallet
        @endslot
    @endcomponent

    <div class="row dash-nft">
        <div class="col-xxl-9">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card overflow-hidden">
                        <div class="card-body bg-marketplace d-flex">
                            <div class="flex-grow-1">
                                <h4 class="fs-14 lh-base fw-semibold mb-0">Nikmati pembayaran dengan <span
                                        class="text-success">Satu Wallet.</span> </h4>
                                <h5 class="text-muted text-uppercase fs-13 mb-2">Satu Wallet ID #ST{{ $wallet->id }} </h4>

                                    <div class="mt-3">
                                        <h2 class="fw-bold ff-secondary mb-0">Rp <span class="counter-value"
                                                data-target="{{ $wallet->balance }}"></span> </h4>
                                    </div>
                                    <p class="mb-0 mt-2 pt-1 text-muted">Platform urun dana paling oke.</p>

                                    <div class="d-flex gap-3 mt-4">
                                        <div class="hstack gap-2">
                                            <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-center">
                                                Isi wallet
                                            </a>
                                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ url('dashboard/wallet/topup') }}" method="POST"
                                                            class="modal-body text-center p-5">
                                                            @csrf
                                                            <h4 class="fs-24 lh-base fw-bold mb-0">Topup Wallet</h4>
                                                            <h5 class="text-muted text-uppercase fs-13 mb-2">Satu Wallet ID
                                                                #ST{{ $wallet->id }} </h4>

                                                                <lord-icon src="https://cdn.lordicon.com/vaeagfzc.json"
                                                                    trigger="loop" delay="2000"
                                                                    colors="primary:#121331,secondary:#02a95c"
                                                                    style="width:100px;height:100px">
                                                                </lord-icon>
                                                                <p class="mb-2 pt-1 text-muted">Harap masukkan nominal
                                                                    uang yang ingin ditambahkan ke wallet dengan benar</p>
                                                                <div class="input-step step-success full-width mb-3">
                                                                    <button type="button"
                                                                        class="minus btn btn-success">–</button>
                                                                    <input type="number" name="amount"
                                                                        class="product-quantity" value="0">
                                                                    <button type="button"
                                                                        class="plus btn btn-success">+</button>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <button type="submit"
                                                                        class="btn btn-success">Topup</button>
                                                                </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="float-end">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-18"><i
                                                class="mdi mdi-dots-vertical align-middle"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Current Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info rounded fs-3">
                                        <i class="bx bx-dollar-circle text-info"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ps-3">
                                    <h5 class="text-muted text-uppercase fs-13 mb-0">Total Revenue</h5>
                                </div>
                            </div>
                            {{-- <div class="mt-4 pt-1">
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0">$<span class="counter-value"
                                        data-target="559526.564"></span> </h4>
                                <p class="mt-4 mb-0 text-muted"><span class="badge bg-soft-danger text-danger mb-0 me-1"> <i
                                            class="ri-arrow-down-line align-middle"></i> 3.96 % </span> vs. previous month
                                </p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="float-end">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-18"><i
                                                class="mdi mdi-dots-vertical align-middle"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Current Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info rounded fs-3">
                                        <i class="bx bx-wallet text-info"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ps-3">
                                    <h5 class="text-muted text-uppercase fs-13 mb-0">Estimated</h5>
                                </div>
                            </div>
                            <div class="mt-4 pt-1">
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0">Rp <span class="counter-value"
                                        data-target="{{ $estimations }}"></span></h4>
                                <p class="mt-4 mb-0 text-muted"><span class="badge bg-soft-success text-success mb-0"> <i
                                            class="ri-arrow-up-line align-middle"></i> 16.24 % </span> vs. previous month
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

        </div>
        <!--end col-->
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('velzon/js/pages/form-input-spin.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/apps-nft-item-details.init.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ URL::asset('velzon/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ URL::asset('velzon/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ URL::asset('velzon/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- Countdown js -->
    <script src="{{ URL::asset('velzon/js/pages/coming-soon.init.js') }}"></script>

    <!-- Marketplace init -->
    <script src="{{ URL::asset('velzon/js/pages/dashboard-nft.init.js') }}"></script>

    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
