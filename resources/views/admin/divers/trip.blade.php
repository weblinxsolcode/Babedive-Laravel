@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <div class="row justify-content-lg-center">
        <div class="col-lg-12">
            <!-- Profile Cover -->
            <div class="profile-cover">
                <div class="profile-cover-img-wrapper">
                    <img class="profile-cover-img" src="{{ asset('admin/assets/img/1920x400/img1.jpg') }}" alt="Image Description">
                </div>
            </div>
            <!-- End Profile Cover -->

            <!-- Include Header -->
            @include('admin.divers.profile-header')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
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
                                        <th class="table-column-ps-0">Title</th>
                                        <th>Type</th>
                                        <th>Location</th>
                                        <th>Trip Dates</th>
                                        <th>Person</th>
                                        <th>Price/Person</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($user->diveUserInfo->events as $key => $event)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><strong>{{ ucfirst($event->title) }}</strong></td>
                                        <td>{{ ucfirst($event->type) }}</td>
                                        <td>{{ ucfirst($event->location) }}</td>
                                        <td>
                                            <strong>From:</strong> {{ \Carbon\Carbon::parse($event->from_date)->format("d-M-Y") }} <br>
                                            <strong>Tp:</strong> {{ \Carbon\Carbon::parse($event->to_date)->format("d-M-Y") }}
                                        </td>
                                        <td>{{ $event->no_of_persons }}</td>
                                        <td>RM {{ number_format($event->trip_budget, 2) }}</td>
                                        <td>{{ ucfirst($event->country) }}</td>
                                        <td>
                                            <span class="legend-indicator {{ ($event->status == '1') ? 'bg-primary' : ($event->status == '2' ? 'bg-success' : 'bd-ganger') }}"></span>
                                            {{ ($event->status == '1') ? 'Active' : ($event->status == '2' ? 'Completed' : 'Inactive') }}
                                        </td>
                                        <td>{{ $event->created_at->format("d-M-Y") }}</td>
                                        <td>
                                            <a type="button" class="btn btn-white btn-sm btn-outline-info border-info">
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
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
@endsection
