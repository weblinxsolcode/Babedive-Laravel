@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-sm mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item">
                            <a class="breadcrumb-link" href="{{ route('admin.dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>

                <h1 class="page-header-title">List of {{ $title }}</h1>
            </div>
            <!-- End Col -->

            <div class="col-sm-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCouponModal">
                    <i class="fa-solid fa-circle-plus"></i>
                    Create Level
                </button>
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
                                        <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="7" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                              "searchInDropdown": false,
                              "hideSearch": true,
                              "dropdownWidth": "10rem"
                            }'>
                                            <option value="null" selected>All</option>
                                            <option value="available">Available</option>
                                            <option value="expired">Expired</option>
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
            <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
               "columnDefs": [{
                  "targets": [8],
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
                        <th class="table-column-ps-0">
                            Title
                        </th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($list as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><strong>{{ ucfirst($item->name) }}</strong></td>
                        <td>{{ $item->created_at->format('d-M-Y') }}</td>
                        <td>
                            <button type="button" class="btn btn-white btn-sm btn-outline-secondary border-secondary" data-bs-toggle="modal" data-bs-target="#editCouponModal{{$key+1}}">
                                <i class="bi-pencil-fill me-1"></i>
                            </button>
                            <button class="delete btn btn-white btn-sm btn-outline-danger border-danger" data-url="{{ route('admin.delete.level', $item->id) }}">
                                <i class="bi-trash-fill me-1"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Coupon Modal -->
                    <div class="modal fade" id="editCouponModal{{$key+1}}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Edit Level</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Body -->
                                <div class="modal-body">
                                    <form action="{{ route('admin.update.level', $item->id) }}" method="POST">
                                        @csrf

                                        <div class="row mb-4">
                                            <label class="col-sm-3 col-form-label form-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" placeholder="Title" value="{{ old('name', $item->name) }}" required>
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

<!-- Create Coupon Modal -->
<div class="modal fade" id="createCouponModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Create Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <form action="{{ route('admin.store.level') }}" method="POST">
                    @csrf

                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label form-label">
                            Title
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="Enter Level Name" value="{{ old('name') }}" required>
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
