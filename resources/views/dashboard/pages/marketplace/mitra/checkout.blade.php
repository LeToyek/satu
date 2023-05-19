@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.order-details')
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Marketplace
        @endslot
        @slot('title')
            Checkout
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order {{ $funding->id }}</h5>
                        <div class="flex-shrink-0">
                            <a href="apps-invoices-details" class="btn btn-success btn-sm"><i
                                    class="ri-download-2-fill align-middle me-1"></i> Invoice</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col">Campaign Details</th>
                                    <th scope="col">Fund Target</th>
                                    <th scope="col">Fund Nominal</th>
                                    {{-- <th scope="col" class="text-end">Total Amount</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                <img src="{{ URL::asset('storage/' . $funding->campaign->images[0]->path) }}"
                                                    alt="" class="img-fluid d-block">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="fs-16"><a
                                                        href="{{ url('dashboard/marketplace/mitra/' . $funding->campaign->id) }}"
                                                        class="link-primary">{{ $funding->campaign->title }}</a></h5>
                                                <p class="text-muted mb-0">Pemilik: <span
                                                        class="fw-medium">{{ $funding->campaign->partner->name }}
                                                        minggu</span></p>
                                                <p class="text-muted mb-0">Tenor: <span
                                                        class="fw-medium">{{ $funding->campaign->tenor }} minggu</span></p>
                                                <p class="text-muted mb-0">Return Percentage: <span
                                                        class="fw-medium">{{ $funding->campaign->return_percentage }}%</span>
                                                </p>

                                            </div>
                                        </div>
                                    </td>
                                    <td>Rp {{ number_format($funding->campaign->fund_target, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($funding->fund_nominal, 0, ',', '.') }}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Funding Status</h5>
                        <div class="flex-shrink-0 mt-2 mt-sm-0">

                            <a href="javasccript:void(0;)" class="btn btn-soft-danger btn-sm mt-2 mt-sm-0"><i
                                    class="mdi mdi-archive-remove-outline align-middle me-1"></i> Cancel Funding</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="profile-timeline">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingOne">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                        href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-0 fw-semibold">Funding requested - <span
                                                        class="fw-normal">{{ $funding->created_at }}</span></h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="mb-1">A funding request has been sent</h6>
                                        <p class="text-muted">{{ $funding->created_at }}</p>
                                        <h6 class="mb-1">Seller has proccessed your order.</h6>
                                        <p class="text-muted mb-0">Thu, 16 Dec 2021 - 5:48AM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingTwo">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="d-flex align-items-center">
                                            @if ($funding->status == 'on_going')
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-light text-success rounded-circle">
                                                    <i class="mdi mdi-gift-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-1 fw-semibold">Paid </h6>
                                            </div>
                                            @else
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="mdi mdi-gift-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-1 fw-semibold">Paid - <span class="fw-normal">Thu,
                                                        {{ $funding->updated_at }}</span></h6>
                                            </div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="mb-1">Your Item has been picked up by courier patner</h6>
                                        <p class="text-muted mb-0">Fri, 17 Dec 2021 - 9:45AM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end accordion-->
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
                        <h5 class="card-title flex-grow-1 mb-0"><i class="mdi mdi-cash-fast text-muted"></i> Payment
                            Method</h5>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge badge-soft-primary fs-12">Track Order</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop"
                            colors="primary:#405189,secondary:#0ab39c" style="width:80px;height:80px"></lord-icon>
                        <h5 class="fs-16 mt-2">RQK Logistics</h5>
                        <p class="text-muted mb-0">ID: MFDS1400457854</p>
                        <p class="text-muted mb-0">Payment Mode : Debit Card</p>
                    </div>
                </div>
            </div>
            <!--end card-->

            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0">Partner Details</h5>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="link-secondary">View Profile</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 vstack gap-3">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ URL::asset('velzon/images/users/avatar-3.jpg') }}" alt=""
                                        class="avatar-sm rounded">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-1">{{ $funding->campaign->partner->name }}</h6>
                                    <p class="text-muted mb-0">Partner</p>
                                </div>
                            </div>
                        </li>
                        <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $funding->campaign->partner->user->email }}</li>
                        <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>+(256) 245451 441</li>
                    </ul>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Billing
                        Address</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-14 mb-0">
                        <li class="fw-semibold fs-15">{{ $funding->campaign->partner->user->name }}</li>
                        <li>+(256) 245451 451</li>
                        <li>{{ $funding->campaign->partner->user->address }}</li>
                    </ul>
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
