@extends('auth.layout.index')
@section('title')
@lang('translation.signup')
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('velzon/libs/@simonwep/pickr/themes/classic.min.css') }}" />
<!-- 'classic' theme -->
<link rel="stylesheet" href="{{ URL::asset('velzon/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
<!-- 'monolith' theme -->
<link rel="stylesheet" href="{{ URL::asset('velzon/libs/@simonwep/pickr/themes/nano.min.css') }}" /> <!-- 'nano' theme -->
@endsection
@section('content')
<<<<<<< HEAD
    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden m-0">
                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"
                                            style="background: linear-gradient(to right, #ffffff6e, #02a95cc9); opacity: 0.9;">
                                        </div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="index" class="d-block">
                                                    <img src="{{ URL::asset('velzon/images/logo-satu.svg') }}"
                                                        alt="" height="18">
                                                </a>
=======
<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden m-0">
                        <div class="row justify-content-center g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="index" class="d-block">
                                                <img src="{{ URL::asset('velzon/images/logo-light.png') }}" alt="" height="18">
                                            </a>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="mb-3">
                                                <i class="ri-double-quotes-l display-4 text-success"></i>
>>>>>>> 42dfd729f2e647a38b76d5ea506bbc09c6daee28
                                            </div>

                                            <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner text-center text-white-50 pb-5">
                                                    <div class="carousel-item active">
                                                        <p class="fs-15 fst-italic">" Great! Clean code, clean design,
                                                            easy for customization. Thanks very much! "</p>
                                                    </div>
<<<<<<< HEAD
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">"Pemberdayaan UMKM adalah kunci bagi
                                                                pertumbuhan ekonomi yang berkelanjutan di Indonesia."</p> "
                                                            </p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">"Kerja keras, tekun, dan konsisten
                                                                adalah kunci sukses dalam bisnis."</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">"Saat ini, internet adalah jalan
                                                                terbaik untuk memperkenalkan bisnis Anda. Jadilah hadir di
                                                                sana."</p>
                                                        </div>
=======
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" The theme is really great with an
                                                            amazing customer support."</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" Great! Clean code, clean design,
                                                            easy for customization. Thanks very much! "</p>
>>>>>>> 42dfd729f2e647a38b76d5ea506bbc09c6daee28
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end carousel -->

<<<<<<< HEAD
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Register Account</h5>
                                            <p class="text-muted">
                                                @if (request('as') == 'funder')
                                                    Get your funder account now
                                                @else
                                                    Get your partner account now
                                                @endif
                                            </p>
                                        </div>

                                        <div class="mt-4">
                                            <form method="POST" action="/register" class="needs-validation" novalidate
                                                action="index">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Email <span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control" id="useremail"
                                                        placeholder="Enter email address" required>
                                                    <div class="invalid-feedback">
                                                        Please enter email
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="username" class="form-control"
                                                        id="username" placeholder="Enter username" required>
                                                    <div class="invalid-feedback">
                                                        Please enter username
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" name="password"
                                                        class="form-control pe-5 password-input" onpaste="return false"
                                                        placeholder="Enter password" id="password-input"
                                                        aria-describedby="passwordInput" required>
                                                    <div class="invalid-feedback">
                                                        Please enter password
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password-confirm"
                                                        class="form-label ">{{ __('Confirm Password') }}</label>

                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation"
                                                        placeholder="Enter password confirmation" required
                                                        autocomplete="new-password">

                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="gender-input">Gender <span
                                                            class="text-danger">*</span></label>
                                                    <div id="gender-input">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="male" value="l">
                                                            <label class="form-check-label" for="male">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="female" value="p">
                                                            <label class="form-check-label" for="gender">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address <span
                                                            class="text-danger">*</span></label>
                                                    <input name="address" type="text" class="form-control"
                                                        id="address" placeholder="Enter address">
                                                    <div class="invalid-feedback">
                                                        Please enter address
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dob" class="form-label">Date of Birth <span
                                                            class="text-danger">*</span></label>

                                                    <input class="form-control" type="date" id="dob"
                                                        name="dob">
                                                    <div class="invalid-feedback">
                                                        Please enter Date of Birth
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to
                                                        the Saling Bantu <a href="#"
                                                            class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                                            of Use</a></p>
                                                </div>

                                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                    <h5 class="fs-13">Password must contain:</h5>
                                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8
                                                            characters</b></p>
                                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b>
                                                        letter (a-z)</p>
                                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least
                                                        <b>uppercase</b> letter (A-Z)
                                                    </p>
                                                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b>
                                                        (0-9)</p>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <div class="signin-other-title">
                                                        <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                                    </div>

                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-primary btn-icon waves-effect waves-light"><i
                                                                class="ri-facebook-fill fs-16"></i></button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                                class="ri-google-fill fs-16"></i></button>
                                                        <button type="button"
                                                            class="btn btn-dark btn-icon waves-effect waves-light"><i
                                                                class="ri-github-fill fs-16"></i></button>
                                                        <button type="button"
                                                            class="btn btn-info btn-icon waves-effect waves-light"><i
                                                                class="ri-twitter-fill fs-16"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Already have an account ? <a href="/login"
                                                    class="fw-semibold text-primary text-decoration-underline"> Signin</a>
                                            </p>
=======
>>>>>>> 42dfd729f2e647a38b76d5ea506bbc09c6daee28
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">Register Account</h5>
                                        <p class="text-muted">
                                            @if (request('as') == 'funder')
                                            Get your funder account now
                                            @else
                                            Get your partner account now
                                            @endif
                                        </p>
                                    </div>

                                    <div class="mt-4">
                                        <form method="POST" action="/register" class="needs-validation" novalidate action="index">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter email address" required>
                                                <div class="invalid-feedback">
                                                    Please enter email
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                                                <div class="invalid-feedback">
                                                    Please enter username
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" required>
                                                <div class="invalid-feedback">
                                                    Please enter password
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password-confirm" class="form-label ">{{ __('Confirm Password') }}</label>

                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter password confirmation" required autocomplete="new-password">

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="gender-input">Gender <span class="text-danger">*</span></label>
                                                <div id="gender-input">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="male" value="l">
                                                        <label class="form-check-label" for="male">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="female" value="p">
                                                        <label class="form-check-label" for="gender">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                                <input name="address" type="text" class="form-control" id="address" placeholder="Enter address">
                                                <div class="invalid-feedback">
                                                    Please enter address
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>

                                                <input class="form-control" type="date" id="dob" name="dob">
                                                <div class="invalid-feedback">
                                                    Please enter Date of Birth
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to
                                                    the Velzon <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                                        of Use</a></p>
                                            </div>

                                            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                <h5 class="fs-13">Password must contain:</h5>
                                                <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8
                                                        characters</b></p>
                                                <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b>
                                                    letter (a-z)</p>
                                                <p id="pass-upper" class="invalid fs-12 mb-2">At least
                                                    <b>uppercase</b> letter (A-Z)
                                                </p>
                                                <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b>
                                                    (0-9)</p>
                                            </div>

                                            <!-- input hidden name role, set query param 'as', but only accept partner and funder -->
                                            <input type="hidden" name="role" value="{{ strtolower(request('as')) == 'funder' ? 'funder' : 'partner' }}">

                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <div class="signin-other-title">
                                                    <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                                </div>

                                                <div>
                                                    <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                    <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                    <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p class="mb-0">Already have an account ? <a href="/login" class="fw-semibold text-primary text-decoration-underline"> Signin</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

<<<<<<< HEAD
        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Saling Bantu
                            </p>
                        </div>
=======
    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                            Themesbrand
                        </p>
>>>>>>> 42dfd729f2e647a38b76d5ea506bbc09c6daee28
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
<script src="{{ URL::asset('velzon/libs/@simonwep/pickr/pickr.min.js') }}"></script>
<script src="{{ URL::asset('velzon/js/pages/form-pickers.init.js') }}"></script>
{{-- <script src="{{ URL::asset('velzon/js/app.js') }}"></script> --}}
<script src="{{ URL::asset('velzon/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('velzon/js/pages/passowrd-create.init.js') }}"></script>
@endsection