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
            @include('admin.users.profile-header')

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
                                        <th>Feedback</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($user->feedbacks as $key => $feedback)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ ucfirst($feedback->infoDiver->name) }}</td>
                                        <td>{{ ucfirst($feedback->infoDiver->email) }}</td>
                                        <td style="white-space: normal;">{{ $feedback->feedback }}</td>
                                        <td>
                                            <span class="legend-indicator {{ ($feedback->status == '1' ? 'bg-success' : 'bg-danger') }}"></span>
                                            {{ ($feedback->status == 1 ? 'Available' : 'Hidden') }}
                                        </td>
                                        <td>{{ $feedback->created_at->format("d-M-Y") }}</td>
                                        <td>
                                            <button class="{{ $feedback->status == 1 ? 'block':'unblock' }} btn btn-{{ $feedback->status == 1 ? 'danger':'success' }}" data-url="{{ $feedback->status == 1 ? route('admin.remove.diver.review', ['id' => $feedback->id]):route('admin.show.diver.review', ['id' => $feedback->id]) }}">
                                                {{ $feedback->status == 1 ? 'Hide':'Show' }}
                                            </button>
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
                title: "Hide Review?"
                , text: "Are you sure to hide this review?"
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#d33"
                , cancelButtonColor: "#3085d6"
                , confirmButtonText: "Yes, Hide"
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
                title: "Show Review?"
                , text: "Are you sure to show this review?"
                , icon: "success"
                , showCancelButton: true
                , confirmButtonColor: "#00AB8E"
                , cancelButtonColor: "#3085d6"
                , confirmButtonText: "Yes, Show!"
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
