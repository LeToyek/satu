@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.profile')
@endsection
@section('css')
    <link href="{{ URL::asset('velzon/libs/dropzone/dropzone.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('velzon/libs/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show" role="alert"
            id="succ-alert" style="position: absolute;z-index: 9999;bottom: 0;right: 0;margin: 0px 24px 24px 0px">
            <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ $user->details?->image?->url }}" alt="" class="profile-wid-img" />
        </div>
    </div>

    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto d-flex justify-content-center align-items-center">
                <div class="">
                    <img src="{{ $user->avatar_url }}" alt="user-img" class="img-thumbnail rounded-circle" />
                    {{-- <img src="@if (Auth::user()->avatar != '') {{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('velzon/images/users/avatar-1.jpg') }} @endif"
                alt="
                user-img" class="img-thumbnail rounded-circle" /> --}}
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ $user->name }}</h3>
                    <p class="text-white-75">{{ $user->role }}</p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i
                                class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-bottom"></i>{{ $user->address }}
                        </div>

                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-12 col-lg-auto order-last order-lg-0">
                <div class="row text text-white-50 text-center">
                    <div class="col-lg-6 col-4">
                        <div class="p-2">
                            <h4 class="text-white mb-1">{{ $user->details->grade }}</h4>
                            <p class="fs-15 mb-0">Grade</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Documents</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">
                        <a href="{{ url('/dashboard/profile/' . $user->id . '/edit') }}" class="btn btn-warning @if(!$isUser) d-none @endif"><i
                                class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Info</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="ps-0" scope="row">Full Name :</th>
                                                <td class="text-muted">{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Mobile :</th>
                                                <td class="text-muted">{{ $user->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">E-mail :</th>
                                                <td class="text-muted">{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Location :</th>
                                                <td class="text-muted">{{ $user->address }}</td>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Joining Date</th>
                                                <td class="text-muted">{{ $user->created_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <!--end card-->

                        <!--end row-->
                    </div>
                    <div class="tab-pane fade" id="documents" role="tabpanel">

                        <div class="card">
                            <div class="card-body">

                                <div class="text-center">


                                    @php
                                        $documents = auth()->user()->details->documents;
                                    @endphp


                                    @forelse ($documents as $document)
                                        {{-- div row --}}
                                        <div class="container">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <img src="{{ URL::asset('velzon/images/new-document.png') }}"
                                                            alt="document" class="img-fluid" />
                                                    </div>
                                                    <div class="mt-4">
                                                        <h5 class="mb-3">{{ $document->title }}</h5>
                                                        <a href="{{ $document->url }}" target="_blank"
                                                            class="btn btn-outline-danger custom-toggle">
                                                            <i class="ri-download-2-line align-bottom me-1"></i>Download
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div>
                                    @empty
                                        <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="loop"
                                            colors="primary:#242424,secondary:#e83a30" style="width:100px;height:100px">
                                        </lord-icon>
                                        <div class="mt-4">
                                            <h3 class="mb-3">Dokumen tidak ditemukan</h3>
                                            <p class="text-muted mb-4"> Anda belum memiliki dokumen yang diunggah.
                                            </p>
                                            <div class="hstack gap-2 justify-content-center">
                                                <a type="button" class="btn btn-outline-danger custom-toggle"
                                                    data-bs-toggle="modal" data-bs-target=".add-document">
                                                    <i class="ri-file-add-line align-bottom me-1"></i>Tambah Dokumen
                                                </a>
                                                <div class="modal fade add-document" tabindex="-1" role="dialog"
                                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-5">
                                                                <!-- end dropzon-preview -->

                                                                <form action="{{ url('dashboard/partner') }}"
                                                                    method="POST" enctype="multipart/form-data"
                                                                    class="mt-4">
                                                                    @csrf
                                                                    <p class="text-muted">DropzoneJS is an open source
                                                                        library
                                                                        that
                                                                        provides drag’n’drop file uploads with image
                                                                        previews.
                                                                    </p>
                                                                    <div class="dropzone">

                                                                        <div class="fallback">
                                                                            <input type="file" name="files" multiple>
                                                                        </div>
                                                                        <div class="dz-message needsclick">
                                                                            <div class="mb-3">
                                                                                <i
                                                                                    class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                                            </div>

                                                                            <h4>Drop files here or click to upload.</h4>
                                                                        </div>
                                                                    </div>


                                                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                                        <li class="mt-2" id="dropzone-preview-list">
                                                                            <!-- This is used as the file preview template -->
                                                                            <div class="border rounded">
                                                                                <div class="d-flex p-2">
                                                                                    <div class="flex-shrink-0 me-3">
                                                                                        <div
                                                                                            class="avatar-sm bg-light rounded">
                                                                                            <img data-dz-thumbnail
                                                                                                class="img-fluid rounded d-block"
                                                                                                src="{{ URL::asset('velzon/images/new-document.png') }}"
                                                                                                alt="Dropzone-Image" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="pt-1">
                                                                                            <h5 class="fs-14 mb-1"
                                                                                                data-dz-name>
                                                                                                &nbsp;</h5>
                                                                                            <p class="fs-13 text-muted mb-0"
                                                                                                data-dz-size></p>
                                                                                            <strong
                                                                                                class="error text-danger"
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
                                                                    {{-- <input class="mb-3" name="documents[]"
                                                                    class="form">Apakah anda yakin?</input> --}}
                                                                    <div class="hstack gap-2 justify-content-center mt-4">

                                                                        <button type="button" class="btn btn-light"
                                                                            data-bs-dismiss="modal">Close</button>

                                                                        <button type="submit"
                                                                            class="btn btn-outline-danger custom-toggle">
                                                                            <i
                                                                                class=" ri-upload-cloud-line align-bottom me-1"></i>Unggah
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse

                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <!--end card-->
                        <!--end row-->
                    </div>

                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('velzon/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/form-file-upload.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/profile.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
