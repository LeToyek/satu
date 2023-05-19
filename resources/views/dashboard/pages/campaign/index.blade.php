@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.explore-now')
@endsection
@section('css')
    <!-- nouisliderribute css -->
    <link href="{{ URL::asset('velzon/libs/nouislider/nouislider.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            NFT Marketplace
        @endslot
        @slot('title')
            Explore Now
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Explore Product</h5>
                        <div>
                            <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseExample"><i
                                    class="ri-filter-2-line align-bottom"></i> Filters</a>
                        </div>
                    </div>
                    <div class="collaps show" id="collapseExample">
                        <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1 mt-3 g-3">
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">Search</h6>
                                <input type="text" class="form-control" placeholder="Search product name"
                                    autocomplete="off" id="searchProductList">
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">Select Category</h6>
                                <select class="form-control" data-choices name="select-category" data-choices-search-false
                                    id="select-category">
                                    <option value="">Select Category</option>
                                    <option value="Artwork">Artwork</option>
                                    <option value="3d Style">3d Style</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Collectibles">Collectibles</option>
                                    <option value="Crypto Card">Crypto Card</option>
                                    <option value="Games">Games</option>
                                    <option value="Music">Music</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex align-items-center mb-4">
                <div class="flex-grow-1">
                    <p class="text-muted fs-14 mb-0">Result: 8745</p>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown">
                        <a class="text-muted fs-14 dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            All View
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
        <div class="col list-element">
            <div class="card explore-box card-animate">
                <div class="explore-place-bid-img"> <input type="hidden" class="form-control" id="1">
                    <div class="d-none">undefined</div> <img src="https://img.themesbrand.com/velzon/images/img-3.gif"
                        alt="" class="card-img-top explore-img">
                    <div class="bg-overlay"></div>
                    <div class="place-bid-btn"> <a href="#!" class="btn btn-success"><i
                                class="ri-auction-fill align-bottom me-1"></i> Place Bid</a> </div>
                </div>
                <div class="bookmark-icon position-absolute top-0 end-0 p-2"> <button type="button"
                        class="btn btn-icon active" data-bs-toggle="button" aria-pressed="true"><i
                            class="mdi mdi-cards-heart fs-16"></i></button> </div>
                <div class="card-body">
                    <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i> 37.41k </p>
                    <h5 class="mb-1"><a href="apps-nft-item-details">Walking On Air</a></h5>
                    <p class="text-muted mb-0">Artwork</p>
                </div>
                <div class="card-footer border-top border-top-dashed">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 fs-14"> <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i>
                            Highest: <span class="fw-medium">10.35ETH</span> </div>
                        <h5 class="flex-shrink-0 fs-14 text-primary mb-0">14.167ETH</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="py-4 text-center" id="noresult" style="display: none;">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c"
            style="width:72px;height:72px"></lord-icon>
        <h5 class="mt-4">Sorry! No Result Found</h5>
    </div>
    <div class="text-center mb-3">
        <button class="btn btn-link text-success mt-2" id="loadmore"><i
                class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load More </button>
    </div>
    </div>
@endsection
@section('script')
    <!-- nouisliderribute js -->
    <script src="{{ URL::asset('velzon/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/wnumb/wNumb.min.js') }}"></script>

    <script src="{{ URL::asset('velzon/js/pages/apps-nft-explore.init.js') }}"></script>

    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
