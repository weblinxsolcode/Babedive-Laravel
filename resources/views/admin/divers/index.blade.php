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
                                    <input class="form-control border-0" value="{{ request('date') }}" id="datePicker"
                                        type="text" name="date" placeholder="Select dates to filter data">
                                    @if (request('date'))
                                        <div class="input-group-append">
                                            <a href="{{ route('admin.diver.index') }}"><span
                                                    class="input-group-text border-0 fs-3">x</span></a>
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
                                        aria-label="Search">
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
                                            <select
                                                class="js-select js-datatable-filter form-select form-select-sm form-select-borderless"
                                                data-target-column-index="4" data-target-table="datatable"
                                                autocomplete="off"
                                                data-hs-tom-select-options='{
                              "searchInDropdown": false,
                              "hideSearch": true,
                              "dropdownWidth": "10rem"
                            }'>
                                                <option value="null" selected>All</option>
                                                <option value="1">Verified</option>
                                                <option value="0">Not Verified</option>
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
                            <th class="table-column-ps-0">Name</th>
                            <th>Email</th>
                            <th>Registration</th>
                            <th>Verified</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="table-column-ps-0">
                                    <a class="d-flex align-items-center"
                                        href="{{ route('admin.diver.profile', $user->id) }}">
                                        <div class="flex-shrink-0">
                                            <div class="avatar avatar-sm avatar-circle">
                                                @if ($user->profile != '' && file_exists('ProfilePictures/' . $user->profile))
                                                    <img class="avatar-img"
                                                        src="{{ asset('ProfilePictures/' . $user->profile) }}"
                                                        alt="Image">
                                                @else
                                                    <img class="avatar-img" src="{{ asset('image-placeholder.jpeg') }}"
                                                        alt="Image">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="text-inherit mb-0">{{ ucfirst($user->name) }}</h5>
                                        </div>
                                    </a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>Via {{ ucfirst($user->registration) ?? '-' }}</td>
                                <td>
                                    <span class="d-none">{{ $user->activated == '1' ? '1' : '0' }}</span>
                                    <span
                                        class="legend-indicator {{ $user->activated == '1' ? 'bg-success' : 'bg-danger' }}"></span>
                                    {{ $user->activated == '1' ? 'Verified' : 'Not Verified' }}
                                </td>
                                <td>
                                    <span
                                        class="legend-indicator {{ $user->blocked == '1' ? 'bg-danger' : 'bg-success' }}"></span>
                                    {{ $user->blocked == '1' ? 'Blocked' : 'Active' }}
                                </td>
                                <td>{{ $user->created_at->format('d-M-Y') }}</td>
                                <td>
                                    @if ($user->blocked == 0)
                                        <button class="block btn btn-danger"
                                            data-url="{{ route('admin.block.user', ['id' => $user->id]) }}">
                                            <i class="bi bi-ban"></i> Block
                                        </button>
                                    @endif
                                    @if ($user->blocked == 1)
                                        <button class="unblock btn btn-success"
                                            data-url="{{ route('admin.unblock.user', ['id' => $user->id]) }}">
                                            <i class="bi-hand-thumbs-up"></i> Unblock
                                        </button>
                                    @endif

                                    @if ($user->is_approved == 0)
                                        <button class="approve btn btn-success"
                                            data-url="{{ route('admin.approve.user', ['id' => $user->id]) }}">
                                            <i class="bi-check-circle"></i> Approve
                                        </button>
                                    @endif
                                    @if ($user->is_approved == 1)
                                        <button class="unapprove btn btn-danger"
                                            data-url="{{ route('admin.unapprove.user', ['id' => $user->id]) }}">
                                            <i class="bi-x-circle"></i> Unapprove
                                        </button>
                                    @endif



                                    <a href="{{ route('admin.diver.profile', $user->diveUserInfo->id) }}"
                                        class="btn btn-white btn-sm btn-outline-info border-info">
                                        <i class="bi-eye-fill me-1"></i>
                                    </a>

                                    {{-- <a href="{{ route('admin.diver.delete', $user->id) }}" --}}
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#deleteUser{{ $user->id }}"
                                        class="btn btn-white btn-sm btn-outline-danger border-danger">
                                        <i class="bi bi-trash-fill me-1"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal For Deletion Of Diver --}}
                            <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                Delete User
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="text-danger">
                                                    <h5 class="text-danger">Are you sure you want to delete this Dive
                                                        Master?</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="{{ route('admin.diver.delete', $user->id) }}"
                                                class="btn btn-danger">Yes, Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal --}}
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
                                    autocomplete="off"
                                    data-hs-tom-select-options='{
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Add event listener for click event on delete button
        $(document).ready(function() {
            $('.block').click(function(event) {
                event.preventDefault();

                // Reference to the clicked button
                var button = $(this);

                // Show Swal confirmation dialog
                Swal.fire({
                    title: "Block User?",
                    text: "Are you sure to block this user?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Block"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = button.data('url');
                        window.location.href = url;
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.unblock').click(function(event) {
                event.preventDefault();

                // Reference to the clicked button
                var button = $(this);

                // Show Swal confirmation dialog
                Swal.fire({
                    title: "Unblock User?",
                    text: "Are you sure to unblock this user?",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#00AB8E",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Unblock!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = button.data('url');
                        window.location.href = url;
                    }
                });
            });
        });
    </script>


    <script>
        // Add event listener for click event on approve button
        $(document).ready(function() {
            $('.approve').click(function(event) {
                event.preventDefault();

                // Reference to the clicked button
                var button = $(this);

                // Show Swal confirmation dialog
                Swal.fire({
                    title: "Approve User?",
                    text: "Are you sure to approve this user?",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#00AB8E", // Green for approve
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Approve"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = button.data('url');
                        window.location.href = url;
                    }
                });
            });
        });

        // Add event listener for click event on unapprove button
        $(document).ready(function() {
            $('.unapprove').click(function(event) {
                event.preventDefault();

                // Reference to the clicked button
                var button = $(this);

                // Show Swal confirmation dialog
                Swal.fire({
                    title: "Unapprove User?",
                    text: "Are you sure to unapprove this user?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33", // Red for unapprove
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Unapprove"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = button.data('url');
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
@endsection
