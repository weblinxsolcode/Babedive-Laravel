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

            <div class="col-sm-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMembershipModal">
                    <i class="bi bi-patch-plus me-1"></i>
                    Create FAQ
                </button>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Page Header -->

    <!-- Users Card -->
    <div class="card">
        <!-- Table -->
        <div class="table-responsive datatable-custom">
            <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
               "columnDefs": [{
                  "targets": [4],
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
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($list as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->title, 50, $end='...') }}</td>
                        <td>
                            {{ \Illuminate\Support\Str::limit($item->description, 50, $end='...') }}
                        </td>
                        <td>{{ $item->created_at->format("d-M-Y") }}</td>
                        <td>
                            <button type="button" class="btn btn-white btn-sm btn-outline-info border-info" data-bs-toggle="modal" data-bs-target="#view{{$key+1}}">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-white btn-sm btn-outline-secondary border-secondary" data-bs-toggle="modal" data-bs-target="#editCouponModal{{$key+1}}">
                                <i class="bi-pencil-fill me-1"></i>
                            </button>
                            <button class="delete btn btn-white btn-sm btn-outline-danger border-danger" data-url="{{ route('admin.delete.faq', ['id' => $item->id]) }}">
                                <i class="bi-trash-fill me-1"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Membership Modal -->
                    <div class="modal fade" id="editCouponModal{{$key+1}}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Edit Membership</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Body -->
                                <div class="modal-body">
                                    <form action="{{ route('admin.update.faq', ['id' => $item->id]) }}" method="POST">
                                        @csrf

                                        <div class="row mb-4">
                                            <label class="col-sm-3 col-form-label form-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title', $item->title) }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-sm-3 col-form-label form-label">Description</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter description">{{ $item->description }}</textarea>
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

                    {{--  View Modal  --}}
                    <div class="modal fade" id="view{{$key+1}}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">View FAQ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Body -->
                                <div class="modal-body">
                                    <div>
                                        <label for="">Title</label>
                                        <p class="text-dark">
                                            {{ ucfirst($item->title) }}
                                        </p>
                                    </div>
                                    <div>
                                        <label for="">Description</label>
                                        <p class="text-dark">
                                            {{ ucfirst($item->description) }}
                                        </p>
                                    </div>
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
                <h5 class="modal-title" id="editUserModalLabel">Create FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <form action="{{ route('admin.store.faq') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" required placeholder="Enter description"></textarea>
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
