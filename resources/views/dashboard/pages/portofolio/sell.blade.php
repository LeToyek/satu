@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.checkout')
@endsection
@section('css')
    <style>
        .nav-link.done {
            color: rgba(var(103, 177, 115), var(--vz-text-opacity)) !important;
        }
    </style>
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Ecommerce
        @endslot
        @slot('title')
            Checkout
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body checkout-tab">

                    <form action="{{ url('dashboard/portofolio/' . $funding->id) }}" method="POST">
                        @csrf
                        <div class="step-arrow-nav mt-n3 mx-n3 mb-3">
                            <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3 @if (!session()->has('success')) show active @endif"
                                        id="pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-info"
                                        type="button" role="tab" aria-controls="pills-bill-info"
                                        aria-selected="true"><i
                                            class=" ri-price-tag-3-line fs-16 p-2 bg-soft-primary text-success rounded-circle align-middle me-2"></i>
                                        Harga Jual</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3" id="pills-bill-address-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-bill-address" type="button" role="tab"
                                        aria-controls="pills-bill-address" aria-selected="false"><i
                                            class=" ri-article-line fs-16 p-2 bg-soft-primary text-success rounded-circle align-middle me-2"></i>
                                        Obligasi Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3 @if (session()->has('success')) active @endif"
                                        disabled id="pills-finish-tab" data-bs-toggle="pill" data-bs-target="#pills-finish"
                                        type="button" role="tab" aria-controls="pills-finish" aria-selected="false"><i
                                            class="ri-checkbox-circle-line fs-16 p-2 bg-soft-primary text-success rounded-circle align-middle me-2"></i>Finish</button>
                                </li>
                            </ul>
                        </div>
                        {{-- @dd($funding) --}}
                        <div class="tab-content">
                            <div class="tab-pane fade @if (!session()->has('success')) show active @endif"
                                id="pills-bill-info" role="tabpanel" aria-labelledby="pills-bill-info-tab">
                                <div>
                                    <h5 class="mb-1">Harga Obligasi</h5>
                                    <p class="text-muted mb-4">Mohon mengisi harga obligasi di bawah ini</p>
                                </div>

                                <div>

                                    <div class="mb-3">
                                        <label for="billinginfo-price" class="form-label">Harga</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="cleave-numeral">Rp</span>
                                            <input type="number" class="form-control" id="cleave-numeral" name="price"
                                                placeholder="Masukkan Harga yang sesuai">
                                        </div>
                                        <div class="d-flex mt-2" style="justify-content: space-between !important">
                                            <p class="muted"> min: @include('formatting.money', ['money' => $funding->min_price])</p>
                                            <p class="muted"> max: @include('formatting.money', ['money' => $funding->max_price])</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start gap-3 mt-3">
                                        <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                            data-nexttab="pills-bill-address-tab"><i
                                                class=" ri-price-tag-3-fill label-icon align-middle fs-16 ms-2"></i>Proses
                                            Harga</button>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="pills-bill-address" role="tabpanel"
                                aria-labelledby="pills-bill-address-tab">
                                <div>
                                    <h5 class="mb-1">Detail Obligasi</h5>
                                    <p class="text-muted mb-4">Berikut adalah obligasi yang akan anda jual</p>
                                </div>

                                <div class="mt-4">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 bg-light rounded p-1" style="width: 80px">
                                            <img src="{{ URL::asset('storage/' . $funding->campaign->images[0]->path) }}"
                                                alt="" class="img-fluid d-block">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="fs-16"><a
                                                    href="{{ url('dashboard/funding->campaign/' . $funding->campaign->slug) }}"
                                                    class="link-primary">{{ $funding->campaign->title }}</a></h5>
                                            <p class="text-muted mb-0">Pemilik: <span
                                                    class="fw-medium">{{ $funding->campaign->partner->name }}
                                                    minggu</span></p>
                                            <p class="text-muted mb-0">Tenor: <span
                                                    class="fw-medium">{{ $funding->campaign->tenor }} minggu</span>
                                            </p>
                                            <p class="text-muted mb-0">Return Percentage: <span
                                                    class="fw-medium">{{ $funding->campaign->return_percentage }}%</span>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previoustab"
                                        data-previous="pills-bill-info-tab"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Kembali ke
                                        harga jual</button>
                                    <button type="submit" class="btn btn-primary btn-label right ms-auto"><i
                                            class="  ri-checkbox-circle-line label-icon align-middle fs-16 ms-2"></i>Konfirmasi
                                    </button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                aria-labelledby="pills-payment-tab">
                                <div>
                                    <h5 class="mb-1">Payment Selection</h5>
                                    <p class="text-muted mb-4">Please select and enter your billing
                                        information</p>
                                </div>

                                <div class="row g-4">
                                    <div class="col-lg-4 col-sm-6">
                                        <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse.show"
                                            aria-expanded="false" aria-controls="paymentmethodCollapse">
                                            <div class="form-check card-radio">
                                                <input id="paymentMethod01" name="paymentMethod" type="radio"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="paymentMethod01">
                                                    <span class="fs-16 text-muted me-2"><i
                                                            class="ri-paypal-fill align-bottom"></i></span>
                                                    <span class="fs-14 text-wrap">Paypal</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse"
                                            aria-expanded="true" aria-controls="paymentmethodCollapse">
                                            <div class="form-check card-radio">
                                                <input id="paymentMethod02" name="paymentMethod" type="radio"
                                                    class="form-check-input" checked>
                                                <label class="form-check-label" for="paymentMethod02">
                                                    <span class="fs-16 text-muted me-2"><i
                                                            class="ri-bank-card-fill align-bottom"></i></span>
                                                    <span class="fs-14 text-wrap">Credit / Debit
                                                        Card</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6">
                                        <div data-bs-toggle="collapse" data-bs-target="#paymentmethodCollapse.show"
                                            aria-expanded="false" aria-controls="paymentmethodCollapse">
                                            <div class="form-check card-radio">
                                                <input id="paymentMethod03" name="paymentMethod" type="radio"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="paymentMethod03">
                                                    <span class="fs-16 text-muted me-2"><i
                                                            class="ri-money-dollar-box-fill align-bottom"></i></span>
                                                    <span class="fs-14 text-wrap">Cash on
                                                        Delivery</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="collapse show" id="paymentmethodCollapse">
                                    <div class="card p-4 border shadow-none mb-0 mt-4">
                                        <div class="row gy-3">
                                            <div class="col-md-12">
                                                <label for="cc-name" class="form-label">Name on
                                                    card</label>
                                                <input type="text" class="form-control" id="cc-name"
                                                    placeholder="Enter name">
                                                <small class="text-muted">Full name as displayed on
                                                    card</small>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="cc-number" class="form-label">Credit card
                                                    number</label>
                                                <input type="text" class="form-control" id="cc-number"
                                                    placeholder="xxxx xxxx xxxx xxxx">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cc-expiration" class="form-label">Expiration</label>
                                                <input type="text" class="form-control" id="cc-expiration"
                                                    placeholder="MM/YY">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cc-cvv" class="form-label">CVV</label>
                                                <input type="text" class="form-control" id="cc-cvv"
                                                    placeholder="xxx">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-muted mt-2 fst-italic">
                                        <i data-feather="lock" class="text-muted icon-xs"></i> Your
                                        transaction is secured with SSL encryption
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="pills-bill-address-tab"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back
                                        to Shipping</button>
                                    <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                        data-nexttab="pills-finish-tab"><i
                                            class="ri-shopping-basket-line label-icon align-middle fs-16 ms-2"></i>Complete
                                        Order</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade @if (session()->has('success')) show active @endif"
                                id="pills-finish" role="tabpanel" aria-labelledby="pills-finish-tab">
                                <div class="text-center py-5">

                                    <div class="mb-4">
                                        <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                            colors="success:#0ab39c,secondary:#405189" style="width:120px;height:120px">
                                        </lord-icon>
                                    </div>
                                    <h5>Terima Kasih! Obligasi Anda Telah Dijual</h5>
                                    <p class="text-muted">Selamat menunggu notifikasi pembelian obligasi anda</p>
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Histori</h5>
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
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- removeItemModal -->
    <div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="success:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure You want to remove this Address ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger ">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- editItemModal -->
    <div id="addAddressModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="addAddressModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="addaddress-Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="addaddress-Name" placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label for="addaddress-textarea" class="form-label">Address</label>
                            <textarea class="form-control" id="addaddress-textarea" placeholder="Enter address" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="addaddress-Name" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="addaddress-Name"
                                placeholder="Enter phone no.">
                        </div>

                        <div class="mb-3">
                            <label for="state" class="form-label">Address Type</label>
                            <select class="form-select" id="state" data-choices data-choices-search-false>
                                <option value="homeAddress">Home (7am to 10pm)</option>
                                <option value="officeAddress">Office (11am to 7pm)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('velzon/libs/cleave.js/cleave.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/form-masks.init.js') }}"></script>

    <script src="{{ URL::asset('velzon/js/pages/ecommerce-product-checkout.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
