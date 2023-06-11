@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.details')
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Obligasi
        @endslot
        @slot('title')
            Invoice Details
        @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <div class="card" id="demo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header border-bottom-dashed p-4">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <img src="{{ URL::asset('assets/img/logo-satu.svg') }}" class="card-logo card-logo-dark"
                                        alt="logo dark" height="24">
                                    <img src="{{ URL::asset('assets/img/logo-satu.svg') }}"
                                        class="card-logo card-logo-light" alt="logo light" height="24">
                                    <div class="mt-sm-5 mt-4">
                                        <h6 class="text-muted fw-semibold">Alamat UMKM</h6>

                                        <p class="text-muted mb-1" id="address-details">{{ $invoice->from->address }}</p>

                                    </div>
                                </div>
                                <div class="flex-shrink-0 mt-sm-0 mt-3">
                                    <h6><span class="text-muted fw-normal">No Pendaftaran:</span>
                                        <span id="legal-register-no">{{ $invoice->from->id }}</span>
                                    </h6>
                                    <h6><span class="text-muted fw-normal">Email:</span>
                                        <span id="email">{{ $invoice->from->email }}</span>
                                    </h6>

                                    <h6 class="mb-0"><span class="text-muted fw-normal">Nomor HP: </span><span
                                            id="contact-no">{{ $invoice->from->no_hp }}</span></h6>
                                </div>
                            </div>
                        </div>
                        <!--end card-header-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-2 text-uppercase fw-semibold fs-13">Invoice No</p>
                                    <h5 class="fs-15 mb-0">#SATU<span id="invoice-no">{{ $invoice->id }}</span></h5>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-2 text-uppercase fw-semibold fs-13">Tanggal</p>
                                    <h5 class="fs-15 mb-0"><span
                                            id="invoice-date">{{ date('D, m, Y', strtotime($invoice->created_at)) }}</span>
                                        <small class="text-muted"
                                            id="invoice-time">{{ $invoice->created_at->format('H:i') }}</small>
                                    </h5>
                                </div>
                                <!--end col-->
                                
                                <!--end col-->
                                <div class="col-lg-3 col-6">
                                    @if ($type == "mitra")
                                    <p class="text-muted mb-2 text-uppercase fw-semibold fs-13">Total Pendanaan</p>
                                    <h5 class="fs-15 mb-0"><span id="total-amount">@include('formatting.money', ['money' => $invoice->funding->fund_nominal])</span></h5>
                                    @elseif($type == "obligasi")
                                    <p class="text-muted mb-2 text-uppercase fw-semibold fs-13">Total Pembelian</p>
                                    <h5 class="fs-15 mb-0"><span id="total-amount">@include('formatting.money', ['money' => $invoice->funding->price])</span></h5>
                                    @endif
                                </div>
                                <!--end col-->
                                <div class="col-lg-3 col-6">
                                    
                                        <h6 class="text-muted text-uppercase fw-semibold mb-3 fs-13">Alamat Pembeli</h6>
                                        <p class="fw-medium mb-2" id="billing-name">{{ $invoice->to->name }}</p>
                                        <p class="text-muted mb-1" id="billing-address-line-1">{{ $invoice->to->address }}</p>
                                        <p class="text-muted mb-1"><span>Phone: </span><span
                                                id="billing-phone-no">{{ $invoice->to->no_hp }}</span></p>
    
                                    
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end col-->
                   
                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="card-body p-4">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light text-muted">
                                    <tr>
                                        @if ($type == "obligasi")
                                        <th>Pemilik Obligasi</th>
                                        @elseif($type == "mitra")
                                        <th>Pemilik Kampanye</th>
                                        @endif
                                        <th>Nama Kampanye</th>
                                        <th>Nominal Pendanaan</th>
                                        @if ($type == "obligasi")
                                            
                                        <th>Harga Obligasi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <td>
                                        @if ($type == "obligasi")
                                            {{ $invoice->from->name }}
                                        @elseif($type == "mitra")
                                            {{ $invoice->to->name }}
                                            
                                        @endif
                                        
                                    </td>
                                    <td>
                                        {{ $invoice->funding->campaign->title }}
                                    </td>
                                    <td>
                                        @include('formatting.money', [
                                            'money' => $invoice->funding->fund_nominal,
                                        ])
                                    </td>
                                    @if ($type == "obligasi")
                                        
                                    <td>
                                        @include('formatting.money', ['money' => $invoice->funding->price])
                                    </td>
                                    @endif
                                </tbody>
                            </table>
                            <div class="mt-3">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3 fs-13">Detail Pembayaran:</h6>
                                <p class="text-muted mb-1">Metode Pembayaran: <span class="fw-medium"
                                    id="payment-method">Satu Wallet</span></p>
                                    <p class="text-muted mb-1">Pemilik Wallet: <span class="fw-medium" id="card-holder-name">{{ auth()->user()->name }}</span></p>
                                    <p class="text-muted mb-1">ID Wallet: <span class="fw-medium" id="card-number">{{ auth()->user()->wallet->id }}</span></p>
                                    <p class="text-muted">Total Amount: <span class="fw-medium" id=""></span><span
                                        
                                        id="card-total-amount">
                                        @if ($type == "mitra")
                                        @include('formatting.money', ['money' => $invoice->funding->fund_nominal])
                                        @elseif($type == "obligasi")
                                        @include('formatting.money', ['money' => $invoice->funding->price])
                                        @endif
                                    </span></p>
                            </div>
                            <div class="mt-4">
                                <div class="alert alert-info">
                                    <p class="mb-0"><span class="fw-semibold">Catatan:</span>
                                        <span id="note">Harap diperhatikan bahwa kewajiban untuk membayar obligasi ini
                                            harus dipenuhi tepat waktu. Jika terjadi keterlambatan dalam pembayaran, kami
                                            akan mengenakan biaya sesuai dengan jumlah yang telah disepakati. Untuk mencegah
                                            biaya tambahan dan masalah hukum yang mungkin timbul, harap pastikan untuk
                                            melunasi pembayaran dalam waktu yang ditentukan.

                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                <a href="javascript:window.print()" class="btn btn-success"><i
                                        class="ri-printer-line align-bottom me-1"></i> Print</a>
                                
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        @endsection
        @section('script')
            <script src="{{ URL::asset('build/js/pages/invoicedetails.js') }}"></script>
            <script src="{{ URL::asset('build/js/app.js') }}"></script>
        @endsection
