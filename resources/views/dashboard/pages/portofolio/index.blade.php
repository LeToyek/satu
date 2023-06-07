@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.order-details')
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Main
        @endslot
        @slot('title')
            Portofolio
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Portofolio</h5>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col">Detail Kampanye</th>
                                    <th scope="col">Target Dana</th>
                                    <th scope="col">Nominal Dana</th>
                                    <th scope="col">Harga Jual</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                    {{-- <th scope="col" class="text-end">Total Amount</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($fundings as $funding)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    <img src="{{ URL::asset('storage/' . $funding->campaign->images[0]->path) }}"
                                                        alt="" class="img-fluid d-block">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-16"><a
                                                            href="{{ url('dashboard/campaign/' . $funding->campaign->slug) }}"
                                                            class="link-primary">{{ $funding->campaign->title }}</a></h5>
                                                    <p class="text-muted mb-0">Pemilik: <span
                                                            class="fw-medium">{{ $funding->campaign->partner->name }}
                                                        </span></p>
                                                    <p class="text-muted mb-0">Tenor: <span
                                                            class="fw-medium">{{ $funding->campaign->tenor }} minggu</span>
                                                    </p>
                                                    <p class="text-muted mb-0">Return Percentage: <span
                                                            class="fw-medium">{{ $funding->campaign->return_percentage }}%</span>
                                                    </p>

                                                </div>
                                            </div>
                                        </td>
                                        <td>Rp {{ number_format($funding->campaign->fund_target, 0, ',', '.') }}</td>
                                        <td>@include('formatting.money', ['money' => $funding->fund_nominal])</td>
                                        <td>
                                            @if ($funding->status == 'on_sell')
                                                @include('formatting.money', ['money' => $funding->price])
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @include('dashboard.components.status_funding', [
                                            'status' => $funding->status,
                                        ])
                                        <td><a href="{{ url('dashboard/portofolio/' . $funding->id) }}"
                                                class="btn btn-soft-danger btn-sm @if ($funding->status != 'on_going') disabled @endif">Sell</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="card py-4 text-center" style="height: 100%" id="noresult">
                                        <div class="card-body">

                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                                            </lord-icon>
                                            <h5 class="mt-4">Anda tidak memiliki obligasi</h5>
                                            <p>Silakan membeli obligasi atau mendanai mitra terlebih dahulu</p>
                                            <a type="button" href="{{ url('dashboard/marketplace/mitra') }}"
                                                class="btn btn-outline-warning">
                                                <span class="icon-on"><i class=" ri-store-2-line"></i> Mitra</span>
                                            </a>
                                            <a type="button" href="{{ url('dashboard/marketplace/obligasi') }}"
                                                class="btn btn-outline-info">
                                                <span class="icon-on"><i class=" ri-file-list-3-line"></i> Obligasi</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0"><i class="mdi mdi-cash-fast text-muted"></i> Log Aktifitas</h5>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge badge-soft-primary fs-12">
                                {{ auth()->user()->role }}
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
                        <p class="align-middle max-w-50 text-muted">{{ $transaction->description }}</p>
                    </span>
                @empty
                    <span class="dropdown-item btn">
                        <i class=""></i>
                        <span class="align-middle">Tidak ada transaksi</span></span>
                @endforelse
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
