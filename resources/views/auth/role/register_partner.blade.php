@extends('auth.layout.index')
@section('title')
@lang('translation.signup')
@endsection
@section('css')
<link href="{{ URL::asset('velzon/libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay" style="background: linear-gradient(to left, #ffffff6e, #02a95cc9); opacity: 0.9;"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index" class="d-inline-block auth-logo">
                                <img src="{{ URL::asset('velzon/images/logo-light.png') }}" alt="" height="20">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">Crowdfunding platform to help each other</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Buat akun Mitra</h5>
                                <p class="text-muted">Buat akun mitra untuk memulai membuat kampanye</p>
                            </div>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <br />
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="p-2 mt-4">
                                <form class="needs-validation" novalidate method="POST" action="{{ route('register.partner.post') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Usaha<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan nama usaha
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Alamat<span class="text-danger">*</span></label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan alamat usaha
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="found" class="form-label">Tanggal Pendirian<span class="text-danger">*</span></label>
                                        <input type="date" name="found_at" class="form-control" id="found" placeholder="Enter found" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan tanggal pendirian
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sector" class="form-label">Sektor<span class="text-danger">*</span></label>
                                        <input type="text" name="sector" class="form-control" id="sector" placeholder="Enter sector" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan sektor usaha
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="income" class="form-label">Pendapatan Bulanan<span class="text-danger">*</span></label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="product-price-addon">Rp</span>

                                            <input type="number" name="monthly_income" class="form-control" id="income" placeholder="Enter Monthly Income" required>
                                            <div class="invalid-feedback">
                                                Harap masukkan pendapatan bulanan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Foto Usaha<span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control" id="image" placeholder="Enter image" accept="image/*" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan foto usaha
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bussines_permit" class="form-label">Izin Usaha<span class="text-danger">*</span></label>
                                        <input type="file" name="bussines_permit" class="form-control" id="bussines_permit" placeholder="Enter image" required>
                                        <div class="invalid-feedback">
                                            Harap dokumen masukkan izin usaha
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="npwp" class="form-label">NPWP<span class="text-danger">*</span></label>
                                        <input type="file" name="npwp" class="form-control" id="npwp" placeholder="Enter image" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan NPWP
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Daftar Sebagai Mitra</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>


                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Saling Bantu
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->
@endsection
@section('script')
<script src="{{ URL::asset('velzon/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('velzon/libs/particles.js/particles.js') }}"></script>
<script src="{{ URL::asset('velzon/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('velzon/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('velzon/js/pages/passowrd-create.init.js') }}"></script>
@endsection