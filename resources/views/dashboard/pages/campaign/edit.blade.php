@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.create-project')
@endsection
@section('css')
    <link href="{{ URL::asset('velzon/libs/dropzone/dropzone.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('velzon/libs/@simonwep/pickr/themes/classic.min.css') }}" />
    <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{ URL::asset('velzon/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
    <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ URL::asset('velzon/libs/@simonwep/pickr/themes/nano.min.css') }}" /> <!-- 'nano' theme -->
@endsection
@section('content')
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Campaign
        @endslot
        @slot('title')
            Create Campaign
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <form class="card-body" method="POST" action="{{ '/dashboard/campaign/'.$campaign->slug }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="project-title-input">Title</label>
                        <input type="text" class="form-control" value="{{ old('title',$campaign->title) }}" name="title" id="project-title-input"
                            placeholder="Enter project title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="project-image-preview">Image Preview</label><br>
                        <img id="project-image-preview" src="{{ asset('storage/'.$campaign->images[0]->path) }}" alt="" width="300px" height="300px">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="project-thumbnail-img">Image</label>
                        <input name="image" class="form-control" id="project-thumbnail-img" type="file">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="ckeditor-classic">
                            {{ $campaign->description }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="project-fundtar-input">Fund Target</label>
                        <input type="number" class="form-control" value="{{ old('fund_target',$campaign->fund_target) }}" name="fund_target" id="project-fundtar-input"
                            placeholder="Enter fund target">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="project-retper-input">Return Percentage</label>
                        <input type="number" class="form-control" value="{{ old('return_percentage',$campaign->return_percentage) }}" name="return_percentage" id="project-retper-input"
                            placeholder="Enter return percentage">
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">Tenor</label>
                        <input type="number" class="form-control"value={{ old('tenor',$campaign->tenor) }} name="tenor" placeholder="Enter tenor">
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="mb-3 mb-lg-0">
                                <label class="form-label mb-0">Start Date</label>
                                <input type="date" value="{{ old('start_date',$campaign->start_date) }}" class="form-control" name="start_date" placeholder="Enter start date">

                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="mb-3 mb-lg-0">
                                <label class="form-label mb-0">Finish Date</label>
                                
                                <input type="date" value="{{ old('finish_date',$campaign->finish_date) }}" class="form-control" name="finish_date"
                                placeholder="Enter finish date">
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-success w-sm">Edit</button>
                </form>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <span class="fw-semibold">
                        Information
                    </span>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/gqzfzudq.json" trigger="loop"
                            colors="primary:#08a88a,secondary:#121331" state="loop" style="width:100px;height:100px">
                        </lord-icon>
                        <p>Kampanye yang menarik akan mendapatkan atensi yang lebih besar dari calon pendana</p>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="alert alert-warning">
                <span class="alert-heading fw-semibold">Catatan</span>
                Anda tetap dapat mengubah informasi kampanye setelah kampanye diubah.
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->



    <!-- Modal -->
    <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3 ps-4 bg-soft-success">
                    <h5 class="modal-title" id="inviteMembersModalLabel">Members</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="search-box mb-3">
                        <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                        <i class="ri-search-line search-icon"></i>
                    </div>

                    <div class="mb-4 d-flex align-items-center">
                        <div class="me-2">
                            <h5 class="mb-0 fs-13">Members :</h5>
                        </div>
                        <div class="avatar-group justify-content-center">
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                <div class="avatar-xs">
                                    <img src="{{ URL::asset('velzon/images/users/avatar-3.jpg') }}" alt=""
                                        class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle bg-secondary">
                                        S
                                    </div>
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                <div class="avatar-xs">
                                    <img src="{{ URL::asset('velzon/images/users/avatar-4.jpg') }}" alt=""
                                        class="rounded-circle img-fluid">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                        <div class="vstack gap-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('velzon/images/users/avatar-2.jpg') }}" alt=""
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Nancy Martino</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-soft-danger text-danger rounded-circle">
                                        HB
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Henry Baird</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('velzon/images/users/avatar-3.jpg') }}" alt=""
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Frank Hook</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('velzon/images/users/avatar-4.jpg') }}" alt=""
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Jennifer
                                            Carter</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-soft-success text-success rounded-circle">
                                        AC
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Alexis Clarke</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('velzon/images/users/avatar-7.jpg') }}" alt=""
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Joseph Parker</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                        </div>
                        <!-- end list -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success w-xs">Invite</button>
                </div>
            </div>
            <!-- end modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- end modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('velzon/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/project-create.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/@simonwep/pickr/pickr.min.js') }}"></script>
    
@endsection
