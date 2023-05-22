@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('content')
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('velzon/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file"
                            class="profile-foreground-img-file-input">
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="{{ $user->avatar_url }}"
                                class="rounded-circle avatar-xl img-thumbnail user-profile-image" id="img-preview"
                                alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="mb-1">{{ $user->name }}</h5>
                        <p class="text-muted mb-0">{{ $user->role }}</p>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#experience" role="tab">
                                <i class="far fa-envelope"></i>
                                Partner
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="{{ url('dashboard/profile/' . $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input id="profile-img-file-input" name="avatar" type="file"
                                    class="profile-img-file-input d-none" id="image">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">
                                                Nama</label>
                                            <input type="text" class="form-control" name="name" id="firstnameInput"
                                                placeholder="Enter your firstname" value="{{ old('name', $user->name) }}">
                                        </div>
                                    </div>

                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Nomor HP</label>
                                            <input type="text" class="form-control" id="phonenumberInput" name="no_hp"
                                                placeholder="Enter your phone number"
                                                value="{{ old('no_hp', $user->no_hp) }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="emailInput" name="email"
                                                placeholder="Enter your email" value="{{ old('email', $user->email) }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="zipcodeInput" class="form-label">Jenis Kelamin</label>
                                            <select class="form-control" name="gender" id="skillsInput">
                                                @if ($user->gender == 'p')
                                                    <option value="p" selected>Perempuan</option>
                                                    <option value="l">Laki-laki</option>
                                                @else
                                                    <option value="l" selected>Laki-laki</option>
                                                    <option value="p">Perempuan</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="zipcodeInput" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" name="address" id="zipcodeInput"
                                                placeholder="Enter zipcode" value="{{ old('address', $user->address) }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <a type="button" class="btn btn-primary d-inline-block "
                                                data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                Ubah
                                            </a>
                                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center p-5">
                                                            <lord-icon src="https://cdn.lordicon.com/puvaffet.json"
                                                                trigger="loop" colors="primary:#16c79e,secondary:#e8b730"
                                                                style="width:100px;height:100px">
                                                            </lord-icon>
                                                            <div class="mt-4">
                                                                <h3 class="mb-3">Apakah anda yakin?</h3>
                                                                <p class="text-muted mb-4"> Data pengguna anda akan diubah
                                                                </p>
                                                                <div class="hstack gap-2 justify-content-center">
                                                                    <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal">Close</button>

                                                                    <button type="submit"
                                                                        class="btn btn-warning">Ubah</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>

                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="experience" role="tabpanel">
                            <form>
                                <div id="newlink">
                                    <div id="1">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="jobTitle" class="form-label">Nama Mitra</label>
                                                    <input type="text" class="form-control" id="jobTitle" name="name"
                                                        placeholder="Job title" value="{{ $user->details->name }}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="found_at" class="form-label">Didirikan Pada</label>
                                                    <input type="date" name="found_at" class="form-control"
                                                        id="found_at" placeholder="Didirikan pada"
                                                        value="{{ $user->details->found_at }}">

                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="found_at" class="form-label">Sektor</label>
                                                    <input type="text" name="sektor" class="form-control"
                                                        id="found_at" placeholder="sektor"
                                                        value="{{ $user->details->sector }}">

                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="found_at" class="form-label">Pendapatan Perbulan</label>
                                                    <input type="number" name="monthly_income" class="form-control"
                                                        step="100000" min="100000" id="found_at"
                                                        placeholder="Pendapatan Perbulan"
                                                        value="{{ $user->details->monthly_income }}">
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="companyName" class="form-label">Address</label>
                                                    <input type="text" name="partner_address" class="form-control"
                                                        id="companyName" placeholder="Nama Mitra"
                                                        value="{{ $user->details->address }}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                                <div id="newForm" style="display: none;">

                                </div>
                                <div class="col-lg-12">
                                    <div class="hstack gap-2">
                                        <a type="button" class="btn btn-info d-inline-block " data-bs-toggle="modal"
                                            data-bs-target=".partner">
                                            Ubah
                                        </a>
                                        <div class="modal fade partner" tabindex="-1" role="dialog"
                                            aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <lord-icon
                                                        src="https://cdn.lordicon.com/wloilxuq.json"
                                                        trigger="loop"
                                                        colors="primary:#16c79e,secondary:#e8b730"
                                                        style="width:100px;height:100px">
                                                    </lord-icon>
                                                        <div class="mt-4">
                                                            <h3 class="mb-3">Apakah anda yakin?</h3>
                                                            <p class="text-muted mb-4"> Data mitra anda akan diubah</p>
                                                            <div class="hstack gap-2 justify-content-center">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Close</button>

                                                                <button type="submit"
                                                                    class="btn btn-warning">Ubah</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                    <!--end col-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    <!--end row-->
@endsection
@section('script')
    <script>
        const previewImage = () => {
            const image = document.querySelector('#image')
            const imagePreview = document.querySelector('#img-preview')

            imagePreview.style.display = 'block'

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
    <script src="{{ URL::asset('velzon/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
