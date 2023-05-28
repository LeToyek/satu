@extends('dashboard.layouts.master')
@section('title')
    @lang('translation.explore-now')
@endsection
@section('css')
    <!-- nouisliderribute css -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('velzon/libs/nouislider/nouislider.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    
    @component('dashboard.components.breadcrumb')
        @slot('li_1')
            Campaign
        @endslot
        @slot('title')
            Campaign
        @endslot
    @endcomponent
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Campaign</h5>
                    <a type="button" href="/dashboard/campaign/create" class="btn btn-soft-secondary"><i
                            class="ri-add-circle-line align-middle me-1"></i>
                        Add Campaign</a>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Fund Target</th>
                                <th>Return Percentage</th>
                                <th>Funding</th>
                                <th>Tenor</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>Finish Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($campaigns as $campaign)
                                <tr>
                                    <td>{{ $campaign->id }}</td>
                                    <td>{{ $campaign->title }}</td>
                                    <td>@include('formatting.money', ['money' => $campaign->fund_target])</td>
                                    <td>{{ $campaign->return_percentage }}</td>
                                    <td>@include('formatting.money', ['money' => $campaign->total_fund])</td>
                                    <td>{{ $campaign->tenor }}</td>
                                    @include('dashboard.components.status_campaign', [
                                        'status' => $campaign->status,
                                    ])
                                    <td>{{ $campaign->start_date }}</td>
                                    <td>{{ $campaign->finish_date }}</td>
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="View">
                                                <a href="{{ url('dashboard/campaign/'.$campaign->slug) }}"
                                                    class="text-primary d-inline-block">
                                                    <i class="ri-eye-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item edit"title="Edit">
                                                <a href="{{ url('dashboard/campaign/' . $campaign->slug . '/edit') }}"
                                                    class="text-primary d-inline-block edit-item-btn">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Remove">
                                                <a type="button" class="text-danger d-inline-block remove-item-btn"
                                                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                </a>
                                                <div class="modal fade bs-example-modal-center" tabindex="-1"
                                                    role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
                                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                    trigger="hover"
                                                                    colors="primary:#f7b84b,secondary:#f06548"
                                                                    style="width:100px;height:100px"></lord-icon>
                                                                <div class="mt-4">
                                                                    <h3 class="mb-3">Apakah anda yakin?</h3>
                                                                    <p class="text-muted mb-4"> Campaign yang dihapus tidak
                                                                        bisa dikembalikan</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <form
                                                                            action="{{ url('dashboard/campaign/' . $campaign->slug) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Hapus</button>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- nouisliderribute js -->
    <script>
        setTimeout(() => {
            var element = document.getElementById("succ-alert");
            element.classList.remove("show");
        }, 3000);
    </script>
    <script src="{{ URL::asset('velzon/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/libs/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/pages/apps-nft-explore.init.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ URL::asset('velzon/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('velzon/js/app.js') }}"></script>
@endsection
