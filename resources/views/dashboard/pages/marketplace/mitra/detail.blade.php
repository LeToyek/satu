@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.item-details')
@endsection
@section('css')
    <link href="{{ URL::asset('velzon/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('title')
            Item Details
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-lg-4">
                    {{-- <div class="sticky-side-div"> --}}
                    <div class="card ribbon-box border shadow-none right">
                        
                        <img src="{{ asset('storage/' . $campaign->images[0]->path) }}" alt=""
                            class="img-fluid rounded">
                        <div class="position-absolute bottom-0 p-3">
                            <div class="position-absolute top-0 end-0 start-0 bottom-0 bg-white opacity-25"></div>
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <img src="{{ URL::asset('velzon/images/nft/img-02.jpg') }}" alt=""
                                        class="img-fluid rounded">
                                </div>
                                <div class="col-3">
                                    <img src="{{ URL::asset('velzon/images/nft/img-03.jpg') }}" alt=""
                                        class="img-fluid rounded">
                                </div>
                                <div class="col-3">
                                    <img src="https://img.themesbrand.com/velzon/images/img-3.gif" alt=""
                                        class="img-fluid rounded h-100 object-cover">
                                </div>
                                <div class="col-3">
                                    <img src="{{ URL::asset('velzon/images/nft/img-06.jpg') }}" alt=""
                                        class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ '/dashboard/marketplace/mitra/' . $campaign->id }}" method="POST">
                        @csrf
                        <div class="input-step step-primary full-width mb-3">
                            <button type="button" class="minus">–</button>
                            <input type="number" name="amount" class="product-quantity" value="100000" min="100000"
                                max="{{ $campaign->fund_target }}" readonly>
                            <button type="button" class="plus">+</button>
                        </div>
                        <div class="hstack gap-2">
                            <a type="button" class="btn btn-success w-100" data-bs-toggle="modal"
                                data-bs-target=".bs-example-modal-center">
                                Modalin
                            </a>
                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center p-5">
                                            <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
                                                colors="primary:#121331,secondary:#02a95c" style="width:100px;height:100px">
                                            </lord-icon>
                                            <div class="mt-4">
                                                <h3 class="mb-3">Apakah anda yakin ?</h3>
                                                <p class="text-muted mb-4">Setelah Anda mendanai, dana akan diproses untuk
                                                    diteruskan</p>
                                                <div class="hstack gap-2 justify-content-center">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Batal</button>

                                                    <button class="btn btn-success" type="submit">Yakin</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                        </div>
                    </form>
                    {{-- </div> --}}
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
                        <span class="badge badge-soft-info mb-3 fs-12"><i class="ri-eye-line me-1 align-bottom"></i> 8,634
                            people views this</span>
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
                                        <h5 class="fs-17 text-success mb-0">Rp
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
                        <div class="mt-4 text-muted">
                            <h5 class="fs-14 fw-bold">Description :</h5>
                            {!! $campaign->description !!}
                        </div>
                        <div class="mt-5">
                            @if (count($campaign->fundings) === 0)
                                <div class="card py-4 text-center" style="height: 100%" id="noresult">
                                    <div class="card-body">
                                        <lord-icon src="https://cdn.lordicon.com/gqdnbnwt.json" trigger="loop"
                                            colors="primary:#121331,secondary:#02a95c" style="width:100px;height:100px">
                                        </lord-icon>
                                        <h5 class="mt-4">Belum ada pendana pada kampanye ini</h5>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="d-flex flex-wrap align-items-start gap-3">
                                        <h5 class="fs-14 fw-bold">Funders </h5>
                                    </div>
                                    <div class="col-6">
                                        <div class="border border-dashed rounded p-3">

                                            @foreach ($campaign->fundings as $funding)
                                                <div class="d-flex align-items-center py-3 border-bottom">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="{{ $funding->user->avatar_url }}" alt=""
                                                            class="img-fluid rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="fs-15 mb-1">{{ $funding->user->name }}</h5>
                                                            <p class="text-muted mb-0">@include('formatting.money', [
                                                                'money' => $funding->fund_nominal,
                                                            ])
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
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
                            @endif
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
                                fontSize: '16px',
                                color: '#343a40',
                                fontWeight: 500,
                                offsetY: 5,
                                formatter: function(val) {
                                    return "Rp " + val
                                }
                            },
                            total: {
                                show: true,
                                fontSize: '11px',
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
