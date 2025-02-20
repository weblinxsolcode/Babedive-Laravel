@extends('admin.layouts.app')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">{{ $title }}</h1>
                    @if (@$sub_title != '')
                        <span>{{ $sub_title }}</span>
                    @endif
                </div>
                <!-- End Col -->

            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Users Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center flex-grow-1">
                    <div class="">
                        <form>
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search"
                                    aria-label="Search users">
                            </div>
                        </form>
                    </div>
                    <div>
                        <button class="btn btn-primary rounded-pill" type="button" data-bs-toggle="modal"
                            data-bs-target="#addBanner">
                            <i class="bi bi-plus-circle-fill"></i>
                            Add Benefit
                        </button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable"
                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
               "columnDefs": [{
                  "targets": [1],
                  "orderable": false
                }],
               "order": [],
               "info": {
                 "totalQty": "#datatableWithPaginationInfoTotalQty"
               },
               "search": "#datatableSearch",
               "entries": "#datatableEntries",
               "pageLength": 8,
               "isResponsive": false,
               "isShowPaging": false,
               "pagination": "datatablePagination"
             }'>
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th class="table-column-ps-0">Heading</th>
                            <th class="table-column-ps-0">Text</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($list as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ ucfirst($item->heading) }}</strong></td>
                                <td>
                                    {{ \Illuminate\Support\Str::limit($item->text, 65, $end='...') }}
                                </td>
                                <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                <td>
                                    <button type="button" class="btn btn-white btn-sm btn-outline-success border-success"
                                        data-bs-toggle="modal" data-bs-target="#edit{{ $loop->iteration }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <button type="button" class="btn btn-white btn-sm btn-outline-info border-info"
                                        data-bs-toggle="modal" data-bs-target="#view{{ $loop->iteration }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>

                                    <button type="button" class="btn btn-white btn-sm btn-outline-danger border-danger"
                                        data-bs-toggle="modal" data-bs-target="#deleteBanner{{ $loop->iteration }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Create Coupon Modal -->
                            <div class="modal fade" id="edit{{ $loop->iteration }}" tabindex="-1"
                                aria-labelledby="editUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUserModalLabel">Edit Banner</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <!-- Body -->
                                        <div class="modal-body">
                                            <form action="{{ route('admin.update.benefit', ['id' => $item->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label class="mb-2" for="">Heading</label>
                                                    <input type="text" class="form-control" name="heading"
                                                        placeholder="Enter Text"
                                                        value="{{ old('heading') ?? $item->heading }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-2" for="">Description</label>
                                                    <textarea name="description" class="form-control" placeholder="Please enter description" id="" cols="30"
                                                        rows="10" required>{{ old('description') ?? $item->text }}</textarea>
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <div class="d-flex gap-3">
                                                        <button type="button" class="btn btn-white" data-bs-dismiss="modal"
                                                            aria-label="Close">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Body -->
                                    </div>
                                </div>
                            </div>

                            <!-- Complaint Detail Modal -->
                            <div class="modal fade" id="deleteBanner{{ $loop->iteration }}" tabindex="-1"
                                aria-labelledby="complaintDetailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="complaintDetailModalLabel">Delete Banner</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h4 class="card-title text-danger">
                                                    Are you sure, you want to delete this banner?
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="{{ route('admin.delete.benefit', ['id' => $item->id]) }}"
                                                class="btn btn-primary">
                                                Yes Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="view{{ $key + 1 }}" tabindex="-1"
                                aria-labelledby="complaintDetailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="complaintDetailModalLabel">Benefit Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p><strong>Heading:</strong> {{ ucfirst($item->heading) }}</p>
                                                    <p><strong>Description :</strong>{{ ucfirst($item->text) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table -->
        </div>
        <!-- End Card -->
    </div>

    <!-- Create Coupon Modal -->
    <div class="modal fade" id="addBanner" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Add Benefit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <form action="{{ route('admin.store.benefit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="mb-2" for="">Head</label>
                            <input type="text" class="form-control" name="heading" placeholder="Enter Text"
                                value="{{ old('heading') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-2" for="">Description</label>
                            <textarea name="description" class="form-control" placeholder="Please enter description" id=""
                                cols="30" rows="10" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="d-flex gap-3">
                                <button type="button" class="btn btn-white" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
@endsection
