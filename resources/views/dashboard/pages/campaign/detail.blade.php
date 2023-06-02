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

                        @if ($campaign->status == 'waiting_for_disbursement')
                            <button type="button" class="btn btn-success btn-block mt-3 w-100" data-bs-toggle="modal"
                                data-bs-target="#disburseModal">Cairkan Dana Terkumpul</button>
                        @endif
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
                                        <h5 class="card-title mb-0">Saldo</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="card overflow-hidden">
                                            <div class="card-body bg-marketplace d-flex">
                                                <div class="flex-grow-1">
                                                    <h4 class="fs-14 lh-base fw-semibold mb-0">Saldo Kampanye, target
                                                        pengembalian:
                                                        <span class="text-success">Rp.
                                                            {{ number_format($campaign->return_target, 0, ',', '.') }}</span>
                                                    </h4>
                                                    <h5 class="text-muted text-uppercase fs-13 mb-2">Satu Wallet ID
                                                        #ST{{ $campaign->wallet->id }} </h4>

                                                        <div class="mt-3">
                                                            <h2 class="fw-bold ff-secondary mb-0">Rp <span
                                                                    class="counter-value"
                                                                    data-target="{{ $campaign->wallet->balance }}"></span>
                                                            </h2>

                                                            @php
                                                                $lunas = $campaign->return_target - $campaign->wallet->balance <= 0;
                                                            @endphp

                                                            <span
                                                                class="@if ($lunas) text-success @else text-danger @endif text-xs">
                                                                @if (!$lunas)
                                                                    (Rp.
                                                                    {{ number_format($campaign->wallet->balance - $campaign->return_target, 0, ',', '.') }})
                                                                @else
                                                                    LUNAS
                                                                @endif
                                                            </span>
                                                        </div>

                                                        @if (auth()->user()->id == $campaign->partner->user_id)
                                                            @if ($campaign->status == 'on_going' && !$lunas)
                                                                <div class="d-flex gap-3 mt-4">
                                                                    <div class="hstack gap-2">
                                                                        <a type="button" class="btn btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target=".bs-example-modal-center">
                                                                            Refund
                                                                        </a>
                                                                        <div class="modal fade bs-example-modal-center"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="mySmallModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered">
                                                                                <div class="modal-content">
                                                                                    <form
                                                                                        action="{{ route('campaign.refund', $campaign->slug) }}"
                                                                                        method="POST"
                                                                                        class="modal-body text-center p-5">
                                                                                        @csrf
                                                                                        <h4
                                                                                            class="fs-24 lh-base fw-bold mb-0">
                                                                                            Topup Wallet</h4>
                                                                                        <h5
                                                                                            class="text-muted text-uppercase fs-13 mb-2">
                                                                                            Satu Wallet ID
                                                                                            #ST{{ $campaign->wallet->id }}
                                                                                        </h5>

                                                                                        <lord-icon
                                                                                            src="https://cdn.lordicon.com/vaeagfzc.json"
                                                                                            trigger="loop" delay="2000"
                                                                                            colors="primary:#121331,secondary:#02a95c"
                                                                                            style="width:100px;height:100px">
                                                                                        </lord-icon>
                                                                                        <p class="mb-2 pt-1 text-muted">
                                                                                            Harap
                                                                                            masukkan nominal
                                                                                            uang yang ingin ditambahkan ke
                                                                                            wallet dengan benar</p>
                                                                                        <div
                                                                                            class="input-step step-success full-width mb-3">
                                                                                            <button type="button"
                                                                                                class="minus btn btn-success">–</button>
                                                                                            <input type="number"
                                                                                                name="amount"
                                                                                                class="product-quantity"
                                                                                                value="0"
                                                                                                min="1"
                                                                                                max="{{ $campaign->return_target - $campaign->wallet->balance }}">
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
                                                            @elseif($lunas)
                                                                <div class="d-flex gap-3 mt-4">
                                                                    <div class="hstack gap-2">
                                                                        <a type="button" class="btn btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#bs-modal-close-campaign">
                                                                            Tutup Kampanye
                                                                        </a>
                                                                        <div class="modal fade"
                                                                            id="bs-modal-close-campaign" tabindex="-1"
                                                                            role="dialog"
                                                                            aria-labelledby="mySmallModalLabel"
                                                                            aria-hidden="true">
                                                                            <div
                                                                                class="modal-dialog modal-dialog-centered">
                                                                                <div class="modal-content">
                                                                                    <form
                                                                                        action="{{ route('campaign.close', $campaign->slug) }}"
                                                                                        method="POST"
                                                                                        class="modal-body text-center p-5">
                                                                                        @csrf
                                                                                        <h4
                                                                                            class="fs-24 lh-base fw-bold mb-0">
                                                                                            Tutup Kampanye?</h4>
                                                                                        <h5
                                                                                            class="text-muted text-uppercase fs-13 mb-2">
                                                                                            Dana akan dikembalikan ke
                                                                                            Pendana sesuai dengan proporsi
                                                                                            pinjaman yang diberikan
                                                                                        </h5>

                                                                                        <table
                                                                                            class="table table-bordered my-4">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">
                                                                                                        Pendana</th>
                                                                                                    <th scope="col">
                                                                                                        Pendanaan</th>
                                                                                                    <th scope="col">
                                                                                                        Pengembalian</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($campaign->fundings as $funding)
                                                                                                    <tr>
                                                                                                        <td><img class="rounded-circle mr-2"
                                                                                                                width="30px"
                                                                                                                height="30px"
                                                                                                                src="{{ $funding->user->avatar_url }}">
                                                                                                            {{ $funding->user->name }}
                                                                                                        </td>
                                                                                                        <td>@include(
                                                                                                            'formatting.money',
                                                                                                            [
                                                                                                                'money' =>
                                                                                                                    $funding->fund_nominal,
                                                                                                            ]
                                                                                                        )
                                                                                                        </td>
                                                                                                        <td>@include(
                                                                                                            'formatting.money',
                                                                                                            [
                                                                                                                'money' =>
                                                                                                                    $funding->expected_return,
                                                                                                            ]
                                                                                                        )
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                                <tr>
                                                                                                    <th colspan="2">
                                                                                                        Total</th>
                                                                                                    <th>@include(
                                                                                                        'formatting.money',
                                                                                                        [
                                                                                                            'money' =>
                                                                                                                $campaign->return_target,
                                                                                                        ]
                                                                                                    )
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>

                                                                                        <div class="mb-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-light mr-1"
                                                                                                data-bs-dismiss="modal">Batal</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-success ml-1">Konfirmasi</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div><!-- /.modal-content -->
                                                                            </div><!-- /.modal-dialog -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mt-2">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Pendana</h5>
                                    </div>
                                    <div class="card-body">
                                        <table id="scroll-horizontal" class="table nowrap align-middle"
                                            style="width:100%">
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

    {{-- modal --}}
    <div class="modal fade" id="disburseModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
                        colors="primary:#121331,secondary:#02a95c" style="width:100px;height:100px">
                    </lord-icon>
                    <div class="mt-4">
                        <h3 class="mb-3">Apakah anda yakin ?</h3>
                        <p class="text-muted mb-4">Dana yang dicairkan akan dikirim ke akun anda.</p>
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>

                            <a class="btn btn-success" href="{{ route('campaign.disburse', $campaign->slug) }}">Yakin</a>

                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
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
