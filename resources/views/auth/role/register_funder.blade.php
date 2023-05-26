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
        <div class="bg-overlay" style="background: linear-gradient(to bottom, #ffffff6e, #02a95cc9); opacity: 0.9;"></div>
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
                                <img src="{{ URL::asset('assets/img/logo-satu.svg') }}" alt="" height="24">
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
                                <h5 class="text-primary">Buat akun Pendana</h5>
                                <p class="text-muted">Buat akun pendana untuk memulai investasi</p>
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
                                <form class="needs-validation" novalidate method="POST" action="{{ route('register.funder.post') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nomor KSEI<span class="text-danger">*</span></label>
                                        <input type="number" name="ksei_number" class="form-control" id="name" placeholder="Enter KSEI number" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan nomor KSEI
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Daftar Sebagai Pendana</button>
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
                            </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                            Themesbrand
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