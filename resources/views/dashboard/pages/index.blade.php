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
                <!-- With Indicators -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="sticky-side-div">

                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" role="listbox">

                                    @for ($i = 0; $i < count($topCampaign); $i++)
                                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                            <div class="card ribbon-box border shadow-none explore-box right"
                                                style="width: 100%">
                                                <div class="ribbon-two ribbon-two-success"><span>New</span></div>
                                                <div class="position-relative explore-place-bid-img"
                                                    style="width: 100%; object-fit: contain">
                                                    <img src="{{ asset('storage/' . $topCampaign[$i]->images[0]->path) }}"
                                                        alt="" class="card-img-top explore-img"
                                                        style="height: 300px"
                                                        style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7))">
                                                    <div class="carousel-caption" style="text-align: start">
                                                        <h5 class="fs-32 fw-semibold mb-0 text-white">
                                                            {{ $topCampaign[$i]->title }}</h5>
                                                        <span
                                                            class="fs-16 text-white">{{ $topCampaign[$i]->partner->name }}</span>
                                                        <div class="mt-1">
                                                            {{-- <span class="text-muted float-end">@include('formatting.money',['money' =>$topCampaign[$i]->fund_target])</span> --}}
                                                            <span class="fs-24 text-white">Target:
                                                                @include('formatting.money', [
                                                                    'money' => $topCampaign[$i]->fund_target,
                                                                ])</span>

                                                        </div>
                                                    </div>
                                                    <div class="bg-overlay"></div>
                                                    <div class="place-bid-btn">
                                                        <a href="{{ '/dashboard/marketplace/mitra/' . $topCampaign[$i]->id }}"
                                                            class="btn btn-success">
                                                            @if (auth()->user()->role === 'partner')
                                                                <i class=" ri-eye-fill align-bottom me-1"></i> Lihat Detail
                                                            @else
                                                                <i class="ri-hand-coin-fill align-bottom me-1"></i> Mulai
                                                                Bantu
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor


                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

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
                            <div class="card-body">
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
                            <!-- end card body -->
                        </div>
                        <div class="alert border-dashed alert-danger" role="alert">
                            <div class="d-flex align-items-center">
                                <lord-icon src="https://cdn.lordicon.com/gqdnbnwt.json" trigger="loop"
                                    colors="primary:#121331,secondary:#f06548" style="width:80px;height:80px">
                                </lord-icon>
                                <div class="ms-2">
                                    <h5 class="fs-16 text-danger fw-bold"> Tertarik untuk mendanai?</h5>
                                    <p class="text-black mb-1">Mendanai kampanye akan memberikan kamu keuntungan,
                                        <br />dimulai dari <span class="fw-bold">Rp 100.000</span> saja!
                                    </p>
                                    <a href="{{ url('/dashboard/marketplace/mitra') }}"
                                        class="btn ps-0 btn-sm btn-link text-danger text-uppercase">Mulai Sekarang</a>
                                </div>
                            </div>

                            <!-- end card -->
                        </div>
                    </div>
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
        <script src="{{ URL::asset('velzon/js/pages/apps-nft-auction.init.js') }}"></script>

        <script src="{{ URL::asset('velzon/js/pages/apps-nft-explore.init.js') }}"></script>
        <script src="{{ URL::asset('velzon/js/pages/dashboard-ecommerce.init.js') }}"></script>
        <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
    @endsection
