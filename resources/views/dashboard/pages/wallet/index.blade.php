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
        <div class="col-xxl-12">
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
                                <a type="button" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Keuntungan yang didapat dari pendanaan">
                                    <i class="fs-16 ri-question-line text-info"></i>
                                </a>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info rounded fs-3">
                                        <i class="bx bx-dollar-circle text-info"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ps-3">
                                    <h5 class="text-muted text-uppercase fs-13 mb-0">Total Keuntungan</h5>
                                </div>
                            </div>
                            <div class="mt-4 pt-1">
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0">Rp <span class="counter-value"
                                        data-target="{{ $keuntungan }}"></span></h4>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <!-- tooltip -->
                            <div class="float-end">
                                <a type="button" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Estimasi keuntungan yang didapat dari pendanaan">
                                    <i class="fs-16 ri-question-line text-info"></i>
                                </a>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8">
                    @if (auth()->user()->role == 'partner')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Grafik Pendapatan</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="line_chart_datalabel" data-colors='["--vz-primary", "--vz-success"]'
                                    class="apex-charts" dir="ltr"></div>
                            </div><!-- end card-body -->
                        </div>
                    @elseif(auth()->user()->role == 'funder')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Basic Bar Chart</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="stacked_bar"
                                    data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                                    class="apex-charts" dir="ltr"></div>
                            </div>
                        </div><!-- end card -->
                    @endif
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0"><i class="mdi mdi-cash-fast text-muted"></i>
                                    Histori</h5>
                                <div class="flex-shrink-0">
                                    <a href="javascript:void(0);" class="badge badge-soft-primary fs-12">
                                        {{ ucfirst(auth()->user()->role) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="max-height: 300px;overflow: scroll;overflow-x: hidden">
                            @forelse (auth()->user()->wallet->transactions->sortByDesc('created_at') as $transaction)
                                <span class="dropdown-item">
                                    <i
                                        class="mdi {{ $transaction->from_wallet_id == auth()->user()->wallet->id ? 'mdi-arrow-up text-danger' : 'mdi-arrow-down text-success' }}  fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Rp.
                                        {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </span>
                                    <span class="align-middle">({{ $transaction->type }})</span>
                                    <p class="align-middle max-w-50 text-muted"
                                        style="word-wrap: break-word; white-space: normal;">
                                        {{ $transaction->description }}</p>
                                </span>
                            @empty
                                <span class="dropdown-item btn">
                                    <i class=""></i>
                                    <span class="align-middle">Tidak ada transaksi</span></span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            {{-- @dd($fundings[46],$fundings[46]->campaign) --}}
        </div>
        <!--end col-->
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('velzon/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script>
        function getChartColorsArray(chartId) {
            if (document.getElementById(chartId) !== null) {
                var colors = document.getElementById(chartId).getAttribute("data-colors");
                colors = JSON.parse(colors);
                return colors.map(function(value) {
                    var newValue = value.replace(" ", "");
                    if (newValue.indexOf(",") === -1) {
                        var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                        if (color) return color.trim();
                        else return newValue;;
                    } else {
                        var val = value.split(',');
                        if (val.length == 2) {
                            var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                            rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                            return rgbaColor;
                        } else {
                            return newValue;
                        }
                    }
                });
            }
        }
        const dataArr = []
        console.log("testt");
        @foreach ($fundings as $funding)
            dataArr.push({
                name: @json($funding->campaign->title),
                nominal: @json($funding->fund_nominal),
                estimation: @json(($funding->campaign->return_percentage / 100) * $funding->fund_nominal)
            })
        @endforeach
        console.log(dataArr);

        var chartStackedBarColors = getChartColorsArray("stacked_bar");
        if (chartStackedBarColors) {
            var options = {
                series: [{
                    name: 'Nominal Pendanaan',
                    data: dataArr.map((item) => item.nominal)
                }, {
                    name: 'Estimasi Pendapatan',
                    data: dataArr.map((item) => item.estimation)
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,

                    toolbar: {
                        show: true,
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        distributed: false,

                    },
                },
                stroke: {
                    width: 1,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: dataArr.map((item) => item.name),
                },
                yaxis: {
                    title: {
                        text: undefined
                    },
                },
                fill: {
                    opacity: 1
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetX: 40
                },
                colors: chartStackedBarColors
            };

            var chart = new ApexCharts(document.querySelector("#stacked_bar"), options);
            chart.render();
        }
    </script>


    <script>
        function getChartColorsArray(chartId) {
            if (document.getElementById(chartId) !== null) {
                var colors = document.getElementById(chartId).getAttribute("data-colors");
                if (colors) {
                    colors = JSON.parse(colors);
                    return colors.map(function(value) {
                        var newValue = value.replace(" ", "");
                        if (newValue.indexOf(",") === -1) {
                            var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                            if (color) return color.trim();
                            else return newValue;;
                        } else {
                            var val = value.split(',');
                            if (val.length == 2) {
                                var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                                rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                                return rgbaColor;
                            } else {
                                return newValue;
                            }
                        }
                    });
                }
            }
        }
        var linechartDatalabelColors = getChartColorsArray("line_chart_datalabel");
        if (linechartDatalabelColors) {
            var options = {
                chart: {
                    height: 380,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: linechartDatalabelColors,
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: [3, 3],
                    curve: 'straight'
                },
                series: [{
                    name: "Pendapatan",
                    data: [26, 24, 32, 36, 33, 31, 33]
                }, ],
                grid: {
                    row: {
                        colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.2
                    },
                    borderColor: '#f1f1f1'
                },
                markers: {
                    style: 'inverted',
                    size: 6
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    title: {
                        text: 'Tanggal'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Nominal Pendapatan'
                    },
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            toolbar: {
                                show: false
                            }
                        },
                        legend: {
                            show: false
                        },
                    }
                }]
            }

            var chart = new ApexCharts(
                document.querySelector("#line_chart_datalabel"),
                options
            );
            chart.render();
        }
    </script>

    <script src="{{ URL::asset('velzon/js/pages/form-input-spin.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/apps-nft-item-details.init.js') }}"></script>


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
