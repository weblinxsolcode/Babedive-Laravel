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
                            <div class="row d-flex justify-content-between">
                                <div class="col-auto">
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
                                <div class="col-auto">
                                    <div class="row align-items-center gx-0">
                                        <div class="col-auto">
                                            <span class="text-secondary me-2">Select Dates:</span>
                                        </div>
                                        <form action="" method="GET" class="col-auto">
                                            <div class="input-group">
                                                <input class="form-control border-0" value="{{ request('date') }}" id="datePicker" type="text" name="date" placeholder="Select dates to filter data">
                                                @if (request('date'))
                                                <div class="input-group-append">
                                                    <a href="{{ route('admin.diver.transaction', ['id' => $user->id]) }}"><span class="input-group-text border-0 fs-3">x</span></a>
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
                            <!-- End Row -->
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <div class="table-responsive datatable-custom">
                            <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
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
                       "isResponsive": false,
                       "isShowPaging": false,
                       "pagination": "datatablePagination"
                     }'>
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sl.no</th>
                                        <th class="table-column-ps-0">Package</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Valid Date</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($trans as $key => $transaction)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ ucfirst($transaction->package_name) }}</td>
                                        <td>{{ ucfirst($transaction->type) }}</td>
                                        <td>{{ number_format($transaction->price, 2) }}</td>
                                        <td>
                                            <strong>Starting:</strong> {{ \Carbon\Carbon::parse($transaction->start_date)->format("d-M-Y") }} <br>
                                            <strong>Expired On:</strong> {{ \Carbon\Carbon::parse($transaction->end_date)->format("d-M-Y") }}
                                        </td>
                                        <td>
                                            <span class="legend-indicator {{ ($transaction->status == '1') ? 'bg-success' : 'bg-danger' }}"></span>
                                            {{ ($transaction->status == '1') ? 'Active' : 'Expired' }}
                                        </td>
                                        <td>24-April-2024</td>
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
