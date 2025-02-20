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
                                <a href="{{ route('admin.complaint.index') }}"><span class="input-group-text border-0 fs-3">x</span></a>
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
                <input id="datatableSearch" type="search" class="form-control" placeholder="Search"
                  aria-label="Search users">
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
      <table id="datatable"
        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
        data-hs-datatables-options='{
               "columnDefs": [{
                  "targets": [6],
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
            <th class="table-column-ps-0">Subject</th>
            <th>Complaint By</th>
            <th>Complaint Against</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($complaints as $key => $complaint)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td><strong>{{ ucfirst($complaint->subject) }}</strong></td>
              <td>
                <strong>Name:</strong> {{ ucfirst($complaint->userInfo->name) }} <br>
                <strong>Email:</strong> {{ ucfirst($complaint->userInfo->email) }}
              </td>
              <td>
                <strong>Name:</strong> {{ ucfirst($complaint->againstInfo->name) }} <br>
                <strong>Email:</strong> {{ ucfirst($complaint->againstInfo->email) }}
              </td>
              <td>{{ \Illuminate\Support\Str::limit($complaint->description, 50, $end='...') }}</td>
              <td>{{ $complaint->created_at->format("d-M-Y") }}</td>
              <td>
                <button type="button" class="btn btn-white btn-sm btn-outline-info border-info" 
                data-bs-toggle="modal" data-bs-target="#complaintDetailModal{{$key+1}}">
                  <i class="bi-eye-fill me-1"></i> 
                </button>
              </td>
            </tr>

            <!-- Complaint Detail Modal -->
            <div class="modal fade" id="complaintDetailModal{{$key+1}}" tabindex="-1" aria-labelledby="complaintDetailModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="complaintDetailModalLabel">Complaint Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col">
                        <p><strong>Subject:</strong> {{ ucfirst($complaint->subject) }}</p>
                        <p><strong>Complaint By:</strong></p>
                        <ul class="list-unstyled">
                          <li><strong>Name:</strong> {{ ucfirst($complaint->userInfo->name) }}</li>
                          <li><strong>Email:</strong> {{ ucfirst($complaint->userInfo->email) }}</li>
                        </ul>
                        <p><strong>Complaint Against:</strong></p>
                        <ul class="list-unstyled">
                          <li><strong>Name:</strong> {{ ucfirst($complaint->againstInfo->name) }}</li>
                          <li><strong>Email:</strong> {{ ucfirst($complaint->againstInfo->email) }}</li>
                        </ul>
                        <p><strong>Description:</strong></p>
                        <p>{{ $complaint->description }}</p>
                        <p><strong>Created At:</strong> {{ $complaint->created_at->format("d-M-Y") }}</p>
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

    <!-- Footer -->
    <div class="card-footer">
      <!-- Pagination -->
      <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
        <div class="col-sm mb-2 mb-sm-0">
          <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
            <span class="me-2">Showing:</span>

            <!-- Select -->
            <div class="tom-select-custom">
              <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto"
                autocomplete="off" data-hs-tom-select-options='{
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
