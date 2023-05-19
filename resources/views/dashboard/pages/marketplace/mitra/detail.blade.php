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
                    <div class="sticky-side-div">
                        <div class="card ribbon-box border shadow-none right">
                            <div class="ribbon-two ribbon-two-danger"><span><i class="ri-fire-fill align-bottom"></i>
                                    Hot</span></div>
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
                                <button class="btn btn-success w-100" type="submit">Modalin</button>
                            </div>
                        </form>
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
                        <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                            <div class="text-muted fs-16">
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                                <span class="mdi mdi-star text-warning"></span>
                            </div>
                            <div class="text-muted">( 5.50k Customer Review )</div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="p-2 border border-dashed rounded text-center">
                                    <div>
                                        <p class="text-muted fw-medium mb-1">Target :</p>
                                        <h5 class="fs-17 text-success mb-0"><i class="mdi mdi-ethereum me-1"></i> Rp
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
                            <div>
                                <h5 class="fs-14 fw-bold mb-3">Ratings & Reviews</h5>
                            </div>
                            <div class="row gy-4 gx-0">
                                <div class="col-lg-4">
                                    <div>
                                        <div class="pb-3">
                                            <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <div class="fs-16 align-middle text-warning">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-half-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h6 class="mb-0">4.8 out of 5</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-muted">Total <span class="fw-medium">7.32k</span> reviews
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">5 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 50.16%" aria-valuenow="50.16"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">2758</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">4 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 19.32%" aria-valuenow="19.32"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">1063</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">3 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 18.12%" aria-valuenow="18.12"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">997</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">2 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 7.42%" aria-valuenow="7.42"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">408</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0">1 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-2">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 4.98%" aria-valuenow="4.98"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-2">
                                                        <h6 class="mb-0 text-muted">274</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-8">
                                    <div class="ps-lg-4">
                                        <div class="d-flex flex-wrap align-items-start gap-3">
                                            <h5 class="fs-14 fw-bold">Reviews: </h5>
                                        </div>

                                        <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                            <ul class="list-unstyled mb-0">
                                                <li class="py-2">
                                                    <div class="border border-dashed rounded p-3">
                                                        <div class="d-flex align-items-start mb-3">
                                                            <div class="hstack gap-3">
                                                                <div class="badge rounded-pill bg-success mb-0">
                                                                    <i class="mdi mdi-star"></i> 4.2
                                                                </div>
                                                                <div class="vr"></div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-0"> Superb sweatshirt. I loved
                                                                        it. It is for winter.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-grow-1 gap-2 mb-3">
                                                            <a href="#" class="d-block">
                                                                <img src="{{ URL::asset('velzon/images/small/img-12.jpg') }}"
                                                                    alt=""
                                                                    class="avatar-sm rounded object-cover" />
                                                            </a>
                                                            <a href="#" class="d-block">
                                                                <img src="{{ URL::asset('velzon/images/small/img-11.jpg') }}"
                                                                    alt=""
                                                                    class="avatar-sm rounded object-cover" />
                                                            </a>
                                                            <a href="#" class="d-block">
                                                                <img src="{{ URL::asset('velzon/images/small/img-10.jpg') }}"
                                                                    alt=""
                                                                    class="avatar-sm rounded object-cover" />
                                                            </a>
                                                        </div>

                                                        <div class="d-flex align-items-end">
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-0">Henry</h5>
                                                            </div>

                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted fs-13 mb-0">12 Jul, 21</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="py-2">
                                                    <div class="border border-dashed rounded p-3">
                                                        <div class="d-flex align-items-start mb-3">
                                                            <div class="hstack gap-3">
                                                                <div class="badge rounded-pill bg-success mb-0">
                                                                    <i class="mdi mdi-star"></i> 4.0
                                                                </div>
                                                                <div class="vr"></div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-0"> Great at this price,
                                                                        Product quality and look is awesome.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end">
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-0">Nancy</h5>
                                                            </div>

                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted fs-13 mb-0">06 Jul, 21</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="py-2">
                                                    <div class="border border-dashed rounded p-3">
                                                        <div class="d-flex align-items-start mb-3">
                                                            <div class="hstack gap-3">
                                                                <div class="badge rounded-pill bg-success mb-0">
                                                                    <i class="mdi mdi-star"></i> 4.2
                                                                </div>
                                                                <div class="vr"></div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-0">Good product. I am so happy.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end">
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-0">Joseph</h5>
                                                            </div>

                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted fs-13 mb-0">06 Jul, 21</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="py-2">
                                                    <div class="border border-dashed rounded p-3">
                                                        <div class="d-flex align-items-start mb-3">
                                                            <div class="hstack gap-3">
                                                                <div class="badge rounded-pill bg-success mb-0">
                                                                    <i class="mdi mdi-star"></i> 4.1
                                                                </div>
                                                                <div class="vr"></div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-0">Nice Product, Good Quality.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end">
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-0">Jimmy</h5>
                                                            </div>

                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted fs-13 mb-0">24 Jun, 21</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
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
    <script src="{{ URL::asset('velzon/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/form-input-spin.init.js') }}"></script>
    <!-- input flag init -->
    <script src="{{ URL::asset('velzon/js/pages/flag-input.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/sweetalerts.init.js') }}"></script>

    <script src="{{ URL::asset('velzon/js/pages/apps-nft-item-details.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
