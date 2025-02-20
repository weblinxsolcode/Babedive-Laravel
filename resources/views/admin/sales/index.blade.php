@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-sm mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ Route('admin.dashboard') }}">Dashboard</a></li>
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

    <!-- Card -->
    <div class="card mt-2">

        <!-- Date Range Filter -->
        <div class="card-header">

            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-sm-8">
                    <h3 class="card-title">
                        Total Revenue: RM {{ number_format($sales->sum("price"), 2) }}
                    </h3>
                </div>
                <div class="col-sm-4">
                    <div class="row align-items-center gx-0">
                        <div class="col-auto">
                            <span class="text-secondary me-2">Select Dates:</span>
                        </div>
                        <form action="" method="GET" class="col-auto">
                            <div class="input-group">
                                <input class="form-control border-0" value="{{ request('date') }}" id="datePicker" type="text" name="date" placeholder="Select dates to filter data">
                                @if (request('date'))
                                <div class="input-group-append">
                                    <a href="{{ route('admin.sale.index') }}"><span class="input-group-text border-0 fs-3">x</span></a>
                                </div>
                                @endif
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                </div>
                            </div>
                        </form>
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
                  "targets": [5],
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
                        <th class="table-column-ps-0">Name</th>
                        <th>Email</th>
                        <th>Event</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sales as $key => $sale)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <a href="{{ route('admin.user.profile', ['id' => $sale->user_id]) }}" target="_blank">
                                {{ ucfirst($sale->userInfo->name) }}
                            </a>
                        </td>
                        <td>{{ $sale->userInfo->email }}</td>
                        <td>
                            <a href="{{ route('admin.trip-diving.detail', ['id' => $sale->event_id]) }}" target="_blank">
                                {{ ucfirst($sale->eventInfo->title) }}
                            </a>
                        </td>
                        <td>RM {{ number_format($sale->price, 2) }}</td>
                        <td>{{ $sale->created_at->format("d-M-Y") }}</td>
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
