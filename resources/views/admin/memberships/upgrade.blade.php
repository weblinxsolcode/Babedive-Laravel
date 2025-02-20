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
        </div>
        <!-- End Row -->
    </div>
    <!-- End Page Header -->

    <!-- Users Card -->
    <div class="card">

        <!-- Date Range Filter -->
        <div class="card-header">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="">
                            <form action="" method="GET" class="col-auto">
                                <div class="input-group">
                                    <input class="form-control border-0" value="{{ request('date') }}" id="datePicker" type="text" name="date" placeholder="Select dates to filter data">
                                    @if (request('date'))
                                    <div class="input-group-append">
                                        <a href="{{ route('admin.membership.upgrade') }}"><span class="input-group-text border-0 fs-3">x</span></a>
                                    </div>
                                    @endif
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <h3 class="card-title">
                            Total: RM {{ number_format($memberships->sum("price"), 2) }}
                        </h3>
                    </div>
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
                  "orderable": false
                }],
               "order": [],
               "info": {
                 "totalQty": "#datatableWithPaginationInfoTotalQty"
               },
               "search": "#datatableSearch",
               "entries": "#datatableEntries",
               "pageLength": 8,
               "isResponsive": true,
               "isShowPaging": true,
               "pagination": "datatablePagination"
             }'>
                <thead class="thead-light">
                    <tr>
                        <th>Sl.no</th>
                        <th class="table-column-ps-0">Membership Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Role</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Created At</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($memberships as $key => $membership)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><strong>{{ ucfirst($membership->package_name) }}</strong></td>
                        <td>{{ $membership->type }}</td>
                        <td>RM {{ number_format($membership->price, 2) }}</td>
                        <td>
                            <button class="btn btn-sm btn-info rounded-pill" type="button">
                                {{ ucfirst("diver master") }}
                            </button>
                        </td>
                        <td>
                            <strong>Name:</strong> {{ @$membership->userInfo->name }} <br>
                            <strong>Email:</strong> {{ @$membership->userInfo->email }}
                        </td>
                        <td>
                            <strong>Start:</strong> {{ date('d-M-Y', strtotime($membership->start_date)) }} <br>
                            <strong>End:</strong> {{ date('d-M-Y', strtotime($membership->end_date)) }}
                        </td>
                        <td>{{ $membership->created_at->format('d-M-Y') }}</td>
                    </tr>
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
@endsection
