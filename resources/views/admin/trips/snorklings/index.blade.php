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
                                            <a href="{{ route('admin.trip-snorkling.index') }}"><span
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
                                                data-target-column-index="8" data-target-table="datatable"
                                                autocomplete="off"
                                                data-hs-tom-select-options='{
                              "searchInDropdown": false,
                              "hideSearch": true,
                              "dropdownWidth": "10rem"
                            }'>
                                                <option value="null" selected>All</option>
                                                <option value="2">Completed</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
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
                            <th>Country</th>
                            <th>Dates</th>
                            <th>Allowed Persons</th>
                            <th>Trip Budget / Person</th>
                            <th>Joining Fee</th>
                            <th>Joined Peoples</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($events as $key => $events)
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
                                <td>{{ ucfirst($events->country) }}</td>
                                <td>
                                    <strong>Start:</strong> {{ date('d M Y', strtotime($events->from_date)) }} <br>
                                    <strong>End:</strong> {{ date('d M Y', strtotime($events->to_date)) }}
                                </td>
                                <td>{{ $events->no_of_persons }}</td>



                                <td>
                                    @if ($events->trip_budget != null)
                                        RM {{ number_format($events->trip_budget, 2) }}
                                    @endif
                                </td>


                               <!--<td>-->
                               <!--     @if ($events->joining_fees == null)-->
                               <!--         <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"-->
                               <!--             data-bs-target="#setPrice{{ $events->id }}">-->
                               <!--             <i class="bi bi-currency-dollar"></i>-->
                               <!--             Set Join Fees-->
                               <!--         </button>-->
                               <!--         <div class="modal fade" id="setPrice{{ $events->id }}" tabindex="-1"-->
                               <!--             aria-labelledby="exampleModalLabel" aria-hidden="true">-->
                               <!--             <div class="modal-dialog">-->
                               <!--                 <div class="modal-content">-->
                               <!--                     <div class="modal-header">-->
                               <!--                         <h1 class="modal-title fs-5" id="exampleModalLabel">-->
                               <!--                             Set Joining Fees-->
                               <!--                         </h1>-->
                               <!--                         <button type="button" class="btn-close" data-bs-dismiss="modal"-->
                               <!--                             aria-label="Close"></button>-->
                               <!--                     </div>-->
                               <!--                     <form action="{{ route('admin.setup.price', ['id' => $events->id]) }}"-->
                               <!--                         method="post">-->
                               <!--                         <div class="modal-body">-->
                               <!--                             @csrf-->
                               <!--                             <div class="form-group">-->
                               <!--                                 <label for="">Enter Joining Fees</label>-->
                               <!--                                 <input type="text" name="fees" id=""-->
                               <!--                                     class="form-control numberOnly"-->
                               <!--                                     placeholder="Please enter joining fees per person"-->
                               <!--                                     required>-->
                               <!--                             </div>-->
                               <!--                         </div>-->
                               <!--                         <div class="modal-footer">-->
                               <!--                             <button type="button" class="btn btn-secondary"-->
                               <!--                                 data-bs-dismiss="modal">Close</button>-->
                               <!--                             <button type="Submit" class="btn btn-primary">-->
                               <!--                                 Set Price-->
                               <!--                             </button>-->
                               <!--                         </div>-->
                               <!--                     </form>-->
                               <!--                 </div>-->
                               <!--             </div>-->
                               <!--         </div>-->
                               <!--     @endif-->
                               <!--     @if ($events->joining_fees != null)-->
                               <!--         RM {{ number_format($events->joining_fees, 2) }}-->
                               <!--     @endif-->
                               <!-- </td>-->

                                <!--<td>-->
                                    <!-- Button to Open Modal for Setting or Updating Joining Fees -->
                                <!--    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"-->
                                <!--        data-bs-target="#setPrice{{ $events->id }}">-->
                                <!--        <i class="bi bi-currency-dollar"></i>-->
                                <!--        @if ($events->joining_fees == null)-->
                                <!--            Set Join Fees-->
                                <!--        @else-->
                                <!--            Change Join Fees-->
                                <!--        @endif-->
                                <!--    </button>-->

                                    <!-- Modal to Set/Change Joining Fees -->
                                <!--    <div class="modal fade" id="setPrice{{ $events->id }}" tabindex="-1"-->
                                <!--        aria-labelledby="exampleModalLabel" aria-hidden="true">-->
                                <!--        <div class="modal-dialog">-->
                                <!--            <div class="modal-content">-->
                                <!--                <div class="modal-header">-->
                                <!--                    <h1 class="modal-title fs-5" id="exampleModalLabel">-->
                                <!--                        @if ($events->joining_fees == null)-->
                                <!--                            Set Joining Fees-->
                                <!--                        @else-->
                                <!--                            Change Joining Fees-->
                                <!--                        @endif-->
                                <!--                    </h1>-->
                                <!--                    <button type="button" class="btn-close" data-bs-dismiss="modal"-->
                                <!--                        aria-label="Close"></button>-->
                                <!--                </div>-->
                                <!--                <form action="{{ route('admin.setup.price', ['id' => $events->id]) }}"-->
                                <!--                    method="post">-->
                                <!--                    <div class="modal-body">-->
                                <!--                        @csrf-->
                                <!--                        <div class="form-group">-->
                                <!--                            <label for="">Enter Joining Fees</label>-->
                                <!--                            <input type="text" name="fees" id=""-->
                                <!--                                class="form-control numberOnly"-->
                                <!--                                placeholder="Please enter joining fees per person"-->
                                <!--                                value="{{ $events->joining_fees }}" required>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                    <div class="modal-footer">-->
                                <!--                        <button type="button" class="btn btn-secondary"-->
                                <!--                            data-bs-dismiss="modal">Close</button>-->
                                <!--                        <button type="Submit" class="btn btn-primary">-->
                                <!--                            @if ($events->joining_fees == null)-->
                                <!--                                Set Price-->
                                <!--                            @else-->
                                <!--                                Update Price-->
                                <!--                            @endif-->
                                <!--                        </button>-->
                                <!--                    </div>-->
                                <!--                </form>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->

                                    <!-- Display Joining Fees -->
                                <!--    @if ($events->joining_fees != null)-->
                                <!--        RM {{ number_format($events->joining_fees, 2) }}-->
                                <!--    @endif-->
                                <!--</td>-->


                                <td>

                                    @php
                                        $cms = App\Models\CMS::find(1);
                                        // $joiningfee = $cms->joiningfee;
                                    @endphp

                                    <!-- Button to Open Modal for Setting or Updating Joining Fees -->
                                    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                        data-bs-target="#setPrice{{ $events->id }}">
                                        <i class="bi bi-currency-dollar"></i>
                                        @if ($events->joining_fees == null)
                                            Set Join Fees
                                        @else
                                            Change Join Fees
                                        @endif
                                    </button>

                                    <!-- Modal to Set/Change Joining Fees -->
                                    <div class="modal fade" id="setPrice{{ $events->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        @if ($events->joining_fees == null)
                                                            Set Joining Fees
                                                        @else
                                                            Change Joining Fees
                                                        @endif
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('admin.setup.price', ['id' => $events->id]) }}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="">Enter Joining Fees</label>
                                                            <input type="text" name="fees" id=""
                                                                class="form-control numberOnly"
                                                                placeholder="Please enter joining fees per person"
                                                                value="{{ $events->joining_fees ?? $cms->joiningfee }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="Submit" class="btn btn-primary">
                                                            @if ($events->joining_fees == null)
                                                                Set Price
                                                            @else
                                                                Update Price
                                                            @endif
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Display Joining Fees -->
                                    @if ($events->joining_fees != null)
                                        RM {{ number_format($events->joining_fees, 2) }}
                                    @else
                                        RM {{ number_format($cms->joiningfee, 2) }} <!-- Default CMS fee -->
                                    @endif
                                </td>


                                <td>{{ count(@$events->joins) ?? '0' }}</td>
                                <td>{{ $events->created_at->format('d-M-Y') }}</td>
                                <td>
                                    <span
                                        class="d-none">{{ $events->status == '1' ? '1' : ($events->status == '2' ? '2' : '0') }}</span>
                                    <span
                                        class="legend-indicator {{ $events->status == '1' ? 'bg-primary' : ($events->status == '2' ? 'bg-success' : 'bd-ganger') }}"></span>
                                    {{ $events->status == '1' ? 'Active' : ($events->status == '2' ? 'Completed' : 'Inactive') }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.trip-diving.detail', $events->id) }}"
                                        class="btn btn-white btn-sm btn-outline-info border-info">
                                        <i class="bi-eye-fill me-1"></i>
                                    </a>

                                    <a href="{{ route('admin.trip-diving.delete', $events->id) }}"
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

    <script>
        $(document).ready(function() {
            $('.numberOnly').on('input', function() {
                // Get the current value of the input field
                var value = $(this).val();

                // Replace any non-numeric characters with an empty string
                var numericValue = value.replace(/[^0-9]/g, '');

                // Set the cleaned value back to the input field
                $(this).val(numericValue);
            });
        });
    </script>
@endsection
