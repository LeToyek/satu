@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.explore-now')
@endsection
@section('css')
    <!-- nouisliderribute css -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('velzon/libs/nouislider/nouislider.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Obligasi
        @endslot
        @slot('title')
            Table Obligasi
        @endslot
    @endcomponent
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="marketList">
                <div class="card-header border-bottom-dashed">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <h5 class="card-title mb-0">Markets</h5>
                        </div>
                        <!--end col-->
                        <div class="col-auto ms-auto">
                            <div class="d-flex gap-2">
                                <button class="btn btn-success"><i class="ri-equalizer-line align-bottom me-1"></i>
                                    Filters</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-header-->
                <div class="card-body p-0 border-bottom border-bottom-dashed">
                    <div class="search-box">
                        <input type="text" class="form-control search border-0 py-3" placeholder="Search to currency...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="sort" data-sort="name" scope="col">Nama</th>
                                    <th class="sort" data-sort="current_value" scope="col">Nominal Pendanaan</th>
                                    <th class="sort" data-sort="pairs" scope="col">Harga Obligasi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <!--end thead-->
                            <tbody class="list form-check-all">
                                
                                @forelse ($fundings as $funding)
                                    <tr>
                                        <td>
                                            <img class="rounded-circle header-profile-user"
                                                src="{{ $funding->user->avatar_url }}" height="40" alt="">
                                            {{ $funding->user->name }}
                                        </td>
                                        <td>
                                            @include('formatting.money',['money' => $funding->fund_nominal])
                                        </td>
                                        <td>
                                            @include('formatting.money',['money' => $funding->price])
                                            
                                        </td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"
                                                type="button" class="btn btn-sm btn-soft-info">Beli Obligasi</a>
                                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center p-5">
                                                            <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"
                                                                trigger="loop" colors="primary:#121331,secondary:#02a95c"
                                                                style="width:100px;height:100px">
                                                            </lord-icon>
                                                            <form class="mt-4" action="{{ url('dashboard/marketplace/obligasi/buy') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="funding_id"
                                                                    value="{{ $funding->id }}">
                                                                <input type="hidden" name="from_id"
                                                                    value="{{ $funding->user->id }}">
                                                                <h3 class="mb-3">Apakah anda yakin ?</h3>
                                                                <p class="text-muted mb-4">Obligasi yang anda beli tidak
                                                                    bisa dikembalikan pada penjual</p>
                                                                <h6 class="text-start">Kampanye</h6>
                                                                <div class="d-flex">
                                                                    <div
                                                                        class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                                        <img src="{{ URL::asset('storage/' . $funding->campaign->images[0]->path) }}"
                                                                            alt="" height="60">
                                                                    </div>
                                                                    <div class="flex-grow-1 ms-3 mb-3 text-start">
                                                                        <h5 class="fs-14"><a
                                                                                href="{{ url('dashboard/campaign/' . $funding->campaign->slug) }}"
                                                                                class="link-primary">{{ $funding->campaign->title }}</a>
                                                                        </h5>
                                                                        <p class=" text-muted mb-0">Pemilik: <span
                                                                                class="fw-medium">{{ $funding->campaign->partner->name }}
                                                                                minggu</span></p>
                                                                        <p class=" text-muted mb-0">Tenor: <span
                                                                                class="fw-medium">{{ $funding->campaign->tenor }}
                                                                                minggu</span>
                                                                        </p>
                                                                        <p class=" text-muted mb-0">Return Percentage:
                                                                            <span
                                                                                class="fw-medium">{{ $funding->campaign->return_percentage }}%</span>
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                                <h6 class="text-start">Detail Obligasi</h6>
                                                                <table class="table align-middle table-nowrap"
                                                                    id="customerTable">
                                                                    <thead class="table-light text-muted">
                                                                        <tr>
                                                                            <th>Penjual</th>
                                                                            <th>Nominal Pendanaan</th>
                                                                            <th>Harga Obligasi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="list form-check-all">
                                                                        <td>
                                                                            <img class="rounded-circle header-profile-user"
                                                                                src="{{ $funding->user->avatar_url }}"
                                                                                height="40" alt="">
                                                                            {{ $funding->user->name }}
                                                                        </td>
                                                                        <td>
                                                                            
                                                                            @include('formatting.money',['money' => $funding->fund_nominal])
                                                                        </td>
                                                                        <td>
                                                                            @include('formatting.money',['money' => $funding->price])
                                            
                                                                        </td>
                                                                    </tbody>
                                                                </table>
                                                                <div class="hstack gap-2 justify-content-center">
                                                                    <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal">Batal</button>

                                                                    <button class="btn btn-success"
                                                                        type="submit">Yakin</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                <div class="noresult">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Obligasi Tidak Ditemukan</h5>
                                        <p class="text-muted mb-0">Belum ada obligasi yang dijual pada kampanye ini</p>
                                    </div>
                                </div>
                                
                                @endforelse
                            </tbody>
                        </table>
                        <!--end table-->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Maaf pencarian tidak ditemukan</h5>
                                <p class="text-muted mb-0">Kami telah mencari data obligasi sebanyak
                                    {{ count($fundings) }}
                                    data, namun tidak menemukan data yang anda cari</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>
@endsection
@section('script')
    <!-- nouisliderribute js -->
    <script src="{{ URL::asset('velzon/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/crypto-buy-sell.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
