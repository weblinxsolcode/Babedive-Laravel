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

                <h1 class="page-header-title">List of {{ $title }}</h1>
                @if (@$sub_title != '')
                <span>{{ $sub_title }}</span>
                @endif
            </div>
            <!-- End Col -->

            <div class="col-sm-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMembershipModal">
                    <i class="bi-cash-coin me-1"></i> Create Membership
                </button>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Page Header -->

    <!-- Users Card -->
    <div class="card">

        <!-- Date Range Filter -->
        <div class="card-header">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-sm-auto">
                    <div class="row align-items-center gx-0">
                        <div class="col-auto">
                            <span class="text-secondary me-2">Select Dates:</span>
                        </div>
                        <form action="" method="GET" class="col-auto">
                            <div class="input-group">
                                <input class="form-control border-0" value="{{ request('date') }}" id="datePicker" type="text" name="date" placeholder="Select dates to filter data">
                                @if (request('date'))
                                <div class="input-group-append">
                                    <a href="{{ route('admin.membership.index') }}"><span class="input-group-text border-0 fs-3">x</span></a>
                                </div>
                                @endif
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-auto">
                    <!-- Dropdown -->
                    <div class="dropdown me-2">
                        <button type="button" class="btn btn-white btn-sm dropdown-toggle" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-download me-2"></i> Export
                        </button>

                        <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                            <span class="dropdown-header">Options</span>
                            <a id="export-copy" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin/assets/svg/illustrations/copy-icon.svg') }}" alt="Image Description">
                                Copy
                            </a>
                            <a id="export-print" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin/assets/svg/illustrations/print-icon.svg') }}" alt="Image Description">
                                Print
                            </a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-header">Download options</span>
                            <a id="export-excel" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin/assets/svg/brands/excel-icon.svg') }}" alt="Image Description">
                                Excel
                            </a>
                            <a id="export-csv" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin/assets/svg/components/placeholder-csv-format.svg') }}" alt="Image Description">
                                .CSV
                            </a>
                            <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin/assets/svg/brands/pdf-icon.svg') }}" alt="Image Description">
                                PDF
                            </a>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>
            </div>
        </div>
        <!-- End Header -->

        <!-- Header -->
        <div class="card-header">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-md">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Search -->
                        <form>
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search" aria-label="Search">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <!-- Filter -->
                    <div class="row align-items-sm-center">

                        <!-- Status -->
                        <div class="col-sm-auto">
                            <div class="row align-items-center gx-0">
                                <div class="col">
                                    <span class="text-secondary me-2">Status:</span>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                    <!-- Select -->
                                    <div class="tom-select-custom tom-select-custom-end">
                                        <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="6" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                              "searchInDropdown": false,
                              "hideSearch": true,
                              "dropdownWidth": "10rem"
                            }'>
                                            <option value="null" selected>All</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>

                    </div>
                    <!-- End Filter -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom">
            <table id="exportDatatable" class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                "dom": "Bfrtip",
                "buttons": [
                    {
                    "extend": "copy",
                    "className": "d-none"
                    },
                    {
                    "extend": "excel",
                    "className": "d-none"
                    },
                    {
                    "extend": "csv",
                    "className": "d-none"
                    },
                    {
                    "extend": "pdf",
                    "className": "d-none"
                    },
                    {
                    "extend": "print",
                    "className": "d-none"
                    }
                ],
               "columnDefs": [{
                  "targets": [7],
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
                        <th>Sl.no</th>
                        <th class="table-column-ps-0">Title</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($memberships as $key => $membership)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><strong>{{ ucfirst($membership->title) }}</strong></td>
                        <td>{{ ucfirst($membership->category) }}</td>
                        <td>{{ $membership->type }}</td>
                        <td>RM {{ number_format($membership->price, 2) }}</td>
                        <td>{{ $membership->created_at->format('d-M-Y') }}</td>
                        <td>
                            <span class="d-none">{{ $membership->status == 1 ? '1' : '0' }}</span>
                            <span class="legend-indicator {{ $membership->status == 1 ? 'bg-success' : 'bg-danger' }}"></span>
                            {{ $membership->status == 1 ? 'Active' : 'Inactive' }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-white btn-sm btn-outline-secondary border-secondary" data-bs-toggle="modal" data-bs-target="#editMembershipModal{{$key+1}}">
                                <i class="bi-pencil-fill me-1"></i>
                            </button>
                            <button class="delete btn btn-white btn-sm btn-outline-danger border-danger" data-url="{{ route('admin.membership.delete', $membership->id) }}">
                                <i class="bi-trash-fill me-1"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Membership Modal -->
                    <div class="modal fade" id="editMembershipModal{{$key+1}}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Edit Membership</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Body -->
                                <div class="modal-body">
                                    <form action="{{ route('admin.membership.update', $membership->id) }}" method="POST">
                                        @csrf

                                        <div class="row mb-4">
                                            <label class="col-sm-3 col-form-label form-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title', $membership->title) }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-sm-3 col-form-label form-label">Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="category" required>
                                                    <option value="">Please select category</option>
                                                    <option {{ old('category', $membership->category) == 'Diver' ? 'selected' : '' }} value="Diver">Diver</option>
                                                    <option {{ old('category', $membership->category) == 'Massage' ? 'selected' : '' }} value="Massage">Massage</option>
                                                    <option {{ old('category', $membership->category) == 'Merchant' ? 'selected' : '' }} value="Merchant">Merchant</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-sm-3 col-form-label form-label">Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="type" required>
                                                    <option value="">Please select type</option>
                                                    <option {{ old('type', $membership->type) == 'Monthly' ? 'selected' : '' }} value="Monthly">Monthly</option>
                                                    <option {{ old('type', $membership->type) == 'Yearly' ? 'selected' : '' }} value="Yearly">Yearly</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-sm-3 col-form-label form-label">Price</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="price" placeholder="Price" value="{{ old('price', $membership->price) }}" min="1" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-sm-3 col-form-label form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="status" required>
                                                    <option {{ old('status', $membership->status) == '1' ? 'selected' : '' }} value="1">Active</option>
                                                    <option {{ old('status', $membership->status) == '0' ? 'selected' : '' }} value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- End Body -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table -->

        <!-- Footer -->
        <div class="card-footer">
            <!-- Pagination -->
            <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                        <span class="me-2">Showing:</span>

                        <!-- Select -->
                        <div class="tom-select-custom">
                            <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                        "searchInDropdown": false,
                        "hideSearch": true
                      }'>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="8" selected>8</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <!-- End Select -->

                        <span class="text-secondary me-2">of</span>

                        <!-- Pagination Quantity -->
                        <span id="datatableWithPaginationInfoTotalQty"></span>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <div class="d-flex justify-content-center justify-content-sm-end">
                        <!-- Pagination -->
                        <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Pagination -->
        </div>
        <!-- End Footer -->
    </div>
    <!-- End Card -->
</div>

<!-- Create Membership Modal -->
<div class="modal fade" id="createMembershipModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Create Membership</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <form action="{{ route('admin.membership.store') }}" method="POST">
                    @csrf

                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label form-label">Category</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category" required>
                                <option value="">Please select category</option>
                                <option {{ old('category') == 'Diver' ? 'selected' : '' }} value="Diver">Diver</option>
                                <option {{ old('category') == 'Massage' ? 'selected' : '' }} value="Massage">Massage</option>
                                <option {{ old('category') == 'Merchant' ? 'selected' : '' }} value="Merchant">Merchant</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label form-label">Type</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="type" required>
                                <option value="">Please select type</option>
                                <option {{ old('type') == 'Monthly' ? 'selected' : '' }} value="Monthly">Monthly</option>
                                <option {{ old('type') == 'Yearly' ? 'selected' : '' }} value="Yearly">Yearly</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label form-label">Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control numberOnly" name="price" placeholder="Price" value="{{ old('price') }}" min="1" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status" required>
                                <option {{ old('status') == '1' ? 'selected' : '' }} value="1">Active</option>
                                <option {{ old('status') == '0' ? 'selected' : '' }} value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Body -->
        </div>
    </div>
</div>
@endsection
