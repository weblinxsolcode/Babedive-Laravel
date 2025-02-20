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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($list as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->name, 50, $end='...') }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->email, 50, $end='...') }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->subject, 50, $end='...') }}</td>
                        <td>
                            {{ \Illuminate\Support\Str::limit($item->message, 50, $end='...') }}
                        </td>
                        <td>{{ $item->created_at->format("d-M-Y") }}</td>
                        <td>
                            <button type="button" class="btn btn-white btn-sm btn-outline-info border-info" data-bs-toggle="modal" data-bs-target="#view{{$key+1}}">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="delete btn btn-white btn-sm btn-outline-danger border-danger" data-url="{{ route('admin.delete.contact', ['id' => $item->id]) }}">
                                <i class="bi-trash-fill me-1"></i>
                            </button>
                        </td>
                    </tr>

                    {{-- View Modal  --}}
                    <div class="modal fade" id="view{{$key+1}}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">View Message</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Body -->
                                <div class="modal-body">
                                    <div>
                                        <label for="">Name</label>
                                        <p class="text-dark">
                                            {{ ucfirst($item->name) }}
                                        </p>
                                    </div>
                                    <div>
                                        <label for="">Email</label>
                                        <p class="text-dark">
                                            {{ ucfirst($item->email) }}
                                        </p>
                                    </div>
                                    <div>
                                        <label for="">Subject</label>
                                        <p class="text-dark">
                                            {{ ucfirst($item->subject) }}
                                        </p>
                                    </div>
                                    <div>
                                        <label for="">Message</label>
                                        <p class="text-dark">
                                            {{ ucfirst($item->message) }}
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
@endsection
