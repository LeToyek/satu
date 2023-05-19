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
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
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
                                    <img src="{{ URL::asset('velzon/images/logo-light.png') }}" alt=""
                                        height="20">
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
                                    <h5 class="text-primary">Make Partner Account</h5>
                                    <p class="text-muted">Make a partner account to manage campaign</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation" novalidate method="POST"
                                        action="{{ route('register.partner.post') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Enter Name" required>
                                            <div class="invalid-feedback">
                                                Please enter Name
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                placeholder="Enter Address" required>
                                            <div class="invalid-feedback">
                                                Please enter address
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="found" class="form-label">Found Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="found_at" class="form-control" id="found"
                                                placeholder="Enter found" required>
                                            <div class="invalid-feedback">
                                                Please enter Found date
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sector" class="form-label">Sector <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="sector" class="form-control" id="sector"
                                                placeholder="Enter sector" required>
                                            <div class="invalid-feedback">
                                                Please enter sector
                                            </div>
                                        </div>
                                        <div class="mb-3">

                                            <label for="income" class="form-label">Monthly Income <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="product-price-addon">Rp</span>

                                                <input type="number" name="monthly_income" class="form-control" id="income"
                                                    placeholder="Enter Monthly Income" required>
                                                <div class="invalid-feedback">
                                                    Please enter income
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="fs-14 mb-1">Product Gallery</h5>
                                            <p class="text-muted">Add Product Gallery Images.</p>

                                            <div class="dropzone">
                                                <div class="fallback">
                                                    <input name="pdf_file" type="file" multiple="multiple">
                                                  
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                    </div>

                                                    <h5>Drop files here or click to upload.</h5>
                                                </div>
                                            </div>

                                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                <li class="mt-2" id="dropzone-preview-list">
                                                    <!-- This is used as the file preview template -->
                                                    <div class="border rounded">
                                                        <div class="d-flex p-2">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded">
                                                                    <img data-dz-thumbnail
                                                                        class="img-fluid rounded d-block" src="#"
                                                                        alt="Product-Image" />
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <div class="pt-1">
                                                                    <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                                    <strong class="error text-danger"
                                                                        data-dz-errormessage></strong>
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove
                                                                    class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- end dropzon-preview -->
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Register as a
                                                partner</button>
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
