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
                                            <a href="{{ route('admin.user.index') }}"><span
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
                    <div class="col-auto">
                        <!-- Dropdown -->
                        <div class="dropdown me-2">
                            <button type="button" class="btn btn-white btn-sm dropdown-toggle" id="usersExportDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-download me-2"></i> Export
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                                <span class="dropdown-header">Options</span>
                                <a id="export-copy" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('admin/assets/svg/illustrations/copy-icon.svg') }}"
                                        alt="Image Description">
                                    Copy
                                </a>
                                <a id="export-print" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('admin/assets/svg/illustrations/print-icon.svg') }}"
                                        alt="Image Description">
                                    Print
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Download options</span>
                                <a id="export-excel" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('admin/assets/svg/brands/excel-icon.svg') }}" alt="Image Description">
                                    Excel
                                </a>
                                <a id="export-csv" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('admin/assets/svg/components/placeholder-csv-format.svg') }}"
                                        alt="Image Description">
                                    .CSV
                                </a>
                                <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('admin/assets/svg/brands/pdf-icon.svg') }}" alt="Image Description">
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
                                                data-target-column-index="5" data-target-table="datatable"
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
                <table id="exportDatatable"
                    class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
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
                                        href="{{ route('admin.user.profile', $user->id) }}">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                                <path
                                                    d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
                                            </svg>
                                            Block
                                        </button>
                                    @endif
                                    @if ($user->blocked == 1)
                                        <button class="unblock btn btn-success"
                                            data-url="{{ route('admin.unblock.user', ['id' => $user->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                            </svg>
                                            Unblock
                                        </button>
                                    @endif
                                    <a href="{{ route('admin.user.profile', $user->id) }}"
                                        class="btn btn-white btn-sm btn-outline-info border-info">
                                        <i class="bi-eye-fill me-1"></i>
                                    </a>

                                    <a href="{{ route('admin.user.delete', $user->id) }}"
                                        class="btn btn-white btn-sm btn-outline-danger border-danger">
                                        <i class="bi bi-trash-fill me-1"></i> <!-- Trash icon for delete -->
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
@endsection
