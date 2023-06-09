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
            Marketplace
        @endslot
        @slot('title')
            Obligasi
        @endslot
    @endcomponent
    @if (count($campaigns) !== 0)
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
                                        autocomplete="off" id="the-filter">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-grow-1">
                        <p class="text-muted fs-14 mb-0">Result: <span id="counter">{{ count($campaigns) }}</span></p>
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

        <div class="row" id="the-list">
            @foreach ($campaigns as $campaign)
                <div id="the-item" class="col-xxl-3 col-lg-4 col-md-6 product-item upto-15">
                    <div class="card explore-box card-animate">
                        <div class="position-relative rounded overflow-hidden explore-place-bid-img ">
                            <img src="{{ asset('storage/' . $campaign->images[0]->path) }}" alt=""
                                class="card-img-top explore-img">
                            <div class="bg-overlay"></div>
                            <div class="place-bid-btn">
                                <a href="{{ '/dashboard/marketplace/obligasi/' . $campaign->id }}"
                                    class="btn btn-success"><i class=" ri-search-2-line align-bottom me-1"></i> Cari Obligasi</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="badge bg-info float-end">{{ $campaign->status }} </span>
                            <h5 class="text-success"> @include('formatting.money', ['money' => $campaign->fund_target])</h5>
                            <h6 class="fs-16 mb-3"><a href="apps-nft-item-details"
                                    class="link-dark">{{ $campaign->title }}</a></h6>
                            <div>
                                {{-- <span class="text-mutedz float-end">@include('formatting.money',['money' =>$campaign->fund_target])</span> --}}
                                <span class="text-muted">Dana: @include('formatting.money', ['money' => $campaign->total_fund])</span>
                                <div class="progress progress-sm mt-2">

                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                        style="width: {{ $campaign->percentage }}%;" aria-valuenow="67" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    @else
        <div class="card py-4 text-center" style="height: 100%" id="noresult">
            <div class="card-body">

                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                    colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px"></lord-icon>
                <h5 class="mt-4">Sorry! No Result Found</h5>
            </div>
        </div>
    @endif
    <div class="card py-4 text-center" style="height: 100%;display: none" id="noresult">
        <div class="card-body">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px"></lord-icon>
            <h5 class="mt-4">Sorry! No Result Found</h5>
        </div>
    </div>
    <!-- end row -->

    </div>
@endsection
@section('script')
    {{-- search --}}
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var theFilter = document.getElementById('the-filter');
            var theList = document.getElementById('the-list');
            var theItem = document.getElementById('the-item');
            var noResult = document.getElementById('noresult');
            var counter = document.getElementById('counter');
            var count = 0;

            theFilter.addEventListener('keyup', filterItems);

            function filterItems(e) {
                var text = e.target.value.toLowerCase();
                var items = theList.querySelectorAll('.product-item');
                var item = theItem.querySelectorAll('.product-item');
                var x = 0;
                items.forEach(function(i) {
                    var itemName = i.querySelector('.card-body h6').textContent.toLowerCase();

                    if (itemName.indexOf(text) != -1) {
                        i.style.display = 'block';
                    } else {
                        i.style.display = 'none';
                        x++;
                    }
                });
                counter.innerHTML = items.length - x;
                if (items.length === x) {
                    noResult.style.display = 'block';
                } else {
                    noResult.style.display = 'none';
                }
            }
        });
    </script>
    <!-- nouisliderribute js -->
    <script src="{{ URL::asset('velzon/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/apps-nft-auction.init.js') }}"></script>

    <script src="{{ URL::asset('velzon/js/pages/apps-nft-explore.init.js') }}"></script>


    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
