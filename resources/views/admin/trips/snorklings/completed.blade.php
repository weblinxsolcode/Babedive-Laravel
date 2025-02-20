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
                                    <a href="{{ route('admin.ongoing.trips') }}"><span class="input-group-text border-0 fs-3">x</span></a>
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
                    </div>
                </div>
                <!-- End Col -->

            </div>
            <!-- End Row -->
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom">
            <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
               "columnDefs": [{
                  "targets": [9],
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
                        <th class="table-column-ps-0">Diver Master</th>
                        <th class="table-column-ps-0">Title</th>
                        <th class="table-column-ps-0">Role</th>
                        <th>Country</th>
                        <th>Dates</th>
                        <th>Allowed Persons</th>
                        <th>Trip Budget / Person</th>
                        <th>Joined Peoples</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($events as $key => $events)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <a href="{{ route('admin.diver.profile', ['id' => $events->diverInfo->id]) }}">
                                <ul style="list-style: none; padding-left: unset !important;">
                                    <li>
                                        {{ ucfirst($events->diverInfo->name) }}
                                    </li>
                                    <li>
                                        {{ ucfirst($events->diverInfo->email) }}
                                    </li>
                                </ul>
                            </a>
                        </td>
                        <td><strong>{{ ucfirst($events->title) }}</strong></td>
                        <td>
                            <button type="button" class="btn btn-{{ $events->type == 'diving' ? 'success':'primary' }} btn-sm rounded-pill">
                                {{ ucfirst($events->type) }}
                            </button>
                        </td>
                        <td>{{ ucfirst($events->country) }}</td>
                        <td>
                            <strong>Start:</strong> {{ date('d M Y', strtotime($events->from_date)) }} <br>
                            <strong>End:</strong> {{ date('d M Y', strtotime($events->to_date)) }}
                        </td>
                        <td>{{ $events->no_of_persons }}</td>
                        <td>RM {{ $events->trip_budget ?? 0 }}</td>
                        <td>{{ count(@$events->joins) ?? '0' }}</td>
                        <td>{{ $events->created_at->format('d-M-Y') }}</td>
                        <td>
                            <a href="{{ route('admin.trip-diving.detail', $events->id) }}" class="btn btn-white btn-sm btn-outline-info border-info">
                                <i class="bi-eye-fill me-1"></i>
                            </a>
                        </td>
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
