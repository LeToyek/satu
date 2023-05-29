@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.item-details')
@endsection
@section('css')
    <!-- nouisliderribute css -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('velzon/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Campaign
        @endslot
        @slot('title')
            Campaign Details
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="sticky-side-div">
                        <div class="card ribbon-box border shadow-none right">

                            <img src="{{ asset('storage/' . $campaign->images[0]->path) }}" alt=""
                                class="img-fluid rounded">

                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-8">
                    <div>
                        <div class="dropdown float-end">
                            <button class="btn btn-ghost-primary btn-icon dropdown" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-fill align-middle fs-16"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item view-item-btn" href="javascript:void(0);"><i
                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>View</a></li>
                                <li><a class="dropdown-item edit-item-btn" href="#showModal" data-bs-toggle="modal"><i
                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                <li><a class="dropdown-item remove-item-btn" data-bs-toggle="modal"
                                        href="#deleteRecordModal"><i
                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                            </ul>
                        </div>

                        <h4 class="fw-bold">{{ $campaign->title }}</h4>
                        <div class="hstack gap-3 flex-wrap">
                            <div class="text-muted">Pemilik : <a href="#" class="text-primary fw-medium">
                                    {{ $campaign->partner->name }}</a></div>
                            <div class="vr"></div>
                            <div class="text-muted">Status : <span
                                    class="text-body fw-medium">@include('dashboard.components.status_campaign', [
                                        'status' => $campaign->status,
                                    ])</span></div>
                            <div class="vr"></div>
                            <div class="text-muted">Published : <span
                                    class="text-body fw-medium">{{ $campaign->created_at }}</span>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="p-2 border border-dashed rounded text-center">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Target :</p>
                                        <h5 class="fs-17 text-success mb-0"> Rp
                                            {{ number_format($campaign->fund_target, 0, ',', '.') }}</h5>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <!-- end col -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="p-2 border border-dashed rounded text-center">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Tenor</p>
                                        <h5 class="fs-17 mb-0">{{ $campaign->tenor }} Minggu</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="p-2 border border-dashed rounded text-center">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Tanggal Berakhir:</p>
                                        <h5 id="auction-time-1" class="mb-0">{{ $campaign->finish_date }}</h5>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!--end row-->


                        <div class="mt-2">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Pendana</h5>
                                    </div>
                                    <div class="card-body">
                                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Pendana</th>
                                                    <th>Nominal</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($fundings as $funding)
                                                    <tr>
                                                        <td>{{ $funding->id }}</td>
                                                        <td>
                                                            <img class="rounded-circle header-profile-user"
                                                                src="{{ $funding->user->avatar_url }}" height="40"
                                                                alt="">
                                                            {{ $funding->user->name }}
                                                        </td>
                                                        <td>@include('formatting.money', [
                                                            'money' => $funding->fund_nominal,
                                                        ])</td>
                                                        @include('dashboard.components.status_funding', [
                                                            'status' => $funding->status,
                                                        ])
                                                        <td class="text-center">
                                                            @if ($funding->status == 'unclaimed')
                                                                <a href="{{ route('dashboard.fundings.approve', $funding->id) }}"
                                                                    class="btn btn-soft-success btn-sm">Claim</a>
                                                            @else
                                                                -
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="row">
                                <div class="d-flex flex-wrap align-items-start gap-3">
                                    <h5 class="fs-14 fw-bold">Funders </h5>
                                </div>
                                <div class="col-6">


                                    <div class="border border-dashed rounded p-3">

                                        <div id="simple_dount_chart"
                                            data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                                            class="apex-charts" dir="ltr"></div>

                                    </div>
                                </div>
                                <div class="col-12">

                                    <div class="p-2">
                                        <div class="d-flex flex-wrap align-items-start gap-3">
                                            <h5 class="fs-14 fw-bold">Funding Progress</h5>
                                        </div>
                                        <div class="progress animated-progress ">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: {{ $campaign->percentage }}%"
                                                aria-valuenow="{{ $campaign->total_fund }}" aria-valuemin="0"
                                                aria-valuemax="{{ $campaign->fund_target }}"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <h6>@include('formatting.money', [
                                                'money' => $campaign->total_fund,
                                            ])</h6>
                                            <h6>@include('formatting.money', [
                                                'money' => $campaign->fund_target,
                                            ])</h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <!-- end Ratings & Reviews -->
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end card-->
@endsection
@section('script')
    <script src="{{ URL::asset('velzon/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/apexcharts-pie.init.js') }}"></script>
    <script>
        const fundings = @json($campaign->fundings);
        const dataSeries = [];
        const dataLabels = [];

        fundings.forEach(element => {
            dataSeries.push(element.fund_nominal)
        });
        @foreach ($campaign->fundings as $funding)
            dataLabels.push(@json($funding->user->name))
        @endforeach

        var chartDonutBasicColors = getChartColorsArray("simple_dount_chart");
        var options = {
            series: dataSeries,
            labels: dataLabels,
            chart: {
                height: 210,
                type: 'donut',
            },
            legend: {
                show: false,
            },
            plotOptions: {
                pie: {
                    size: 100,
                    offsetX: 0,
                    offsetY: 0,
                    donut: {
                        size: "70%",
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '18px',
                                offsetY: -5,
                            },
                            value: {
                                show: true,
                                fontSize: '20px',
                                color: '#343a40',
                                fontWeight: 500,
                                offsetY: 5,
                                formatter: function(val) {
                                    return "Rp " + val
                                }
                            },
                            total: {
                                show: true,
                                fontSize: '13px',
                                label: 'Dana Terkumpul',
                                color: '#9599ad',
                                fontWeight: 500,
                                formatter: function(w) {
                                    return "Rp " + w.globals.seriesTotals.reduce(function(a, b) {
                                        return a + b
                                    }, 0)
                                }
                            }
                        }
                    },
                },
            },

            dataLabels: {
                enabled: false,
                dropShadow: {
                    enabled: false,
                }
            },
            colors: chartDonutBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#simple_dount_chart"), options);
        chart.render();
    </script>
    <script src="{{ URL::asset('velzon/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/form-input-spin.init.js') }}"></script>
    <!-- input flag init -->
    <script src="{{ URL::asset('velzon/js/pages/flag-input.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/sweetalerts.init.js') }}"></script>

    <script src="{{ URL::asset('velzon/js/pages/apps-nft-item-details.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
