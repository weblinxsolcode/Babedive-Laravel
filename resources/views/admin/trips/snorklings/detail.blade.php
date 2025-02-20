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
                            <li class="breadcrumb-item active" aria-current="page">
                                <a class="breadcrumb-link" href="{{ route('admin.dashboard') }}">
                                    Snorkeling
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">{{ $title }}</h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->
        <div class="row justify-content-lg-center">
            <div class="col-lg-12">

                <div class="row">
                    <!-- Event Details -->
                    <div class="col-lg-6">

                        <!-- Sticky Block Start Point -->
                        <div id="accountSidebarNav"></div>

                        <!-- Card -->
                        <div class="js-sticky-block card mb-3 mb-lg-5"
                            data-hs-sticky-block-options='{
                 "parentSelector": "#accountSidebarNav",
                 "breakpoint": "lg",
                 "startPoint": "#accountSidebarNav",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20
               }'>
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Event Details</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <ul class="list-unstyled list-py-2 text-dark mb-0">
                                    <li><strong>Title:</strong> {{ ucfirst($event->title) }}</li>
                                    <li><strong>Type:</strong> {{ $event->type }}</li>
                                    <li><strong>Country:</strong> {{ $event->country ?? '-' }}</li>
                                    <li><strong>Start Date:</strong> {{ date('d-M-Y', strtotime($event->from_date)) }}</li>
                                    <li><strong>End Date:</strong> {{ date('d-M-Y', strtotime($event->to_date)) }}</li>
                                    <li><strong>Allowed Persons:</strong> {{ $event->no_of_persons ?? '-' }}</li>
                                    <li><strong>Trip Budget / Person:</strong> {{ $event->trip_budget ?? '-' }}</li>
                                    <li><strong>Joined Peoples:</strong> {{ count(@$event->joins) ?? '0' }}</li>
                                    <li><strong>Created At:</strong> {{ $event->created_at->format('d-M-Y') }}</li>
                                    <li><strong>Status:</strong> <span
                                            class="legend-indicator {{ $event->status == '1' ? 'bg-primary' : ($event->status == '2' ? 'bg-success' : 'bd-ganger') }}"></span>
                                        {{ $event->status == '1' ? 'Active' : ($event->status == '2' ? 'Completed' : 'Inactive') }}
                                    </li>
                                    <li><strong>Description:</strong> {{ $event->description ?? '-' }}</li>
                                </ul>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>

                    <!-- Diver Details -->
                    <div class="col-lg-6">

                        <!-- Sticky Block Start Point -->
                        <div id="accountSidebarNav"></div>

                        <!-- Card -->
                        <div class="js-sticky-block card mb-3 mb-lg-5"
                            data-hs-sticky-block-options='{
                 "parentSelector": "#accountSidebarNav",
                 "breakpoint": "lg",
                 "startPoint": "#accountSidebarNav",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20
               }'>
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Diver Details</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <ul class="list-unstyled list-py-2 text-dark mb-0">
                                    <li><strong>Name:</strong> Testing</li>
                                    <li><strong>Email:</strong> test@dispostable.com</li>
                                    <li><strong>Gender:</strong> Female</li>
                                    <li><strong>City:</strong> Karachi</li>
                                    <li><strong>Cert Level:</strong> Level 5</li>
                                    <li><strong>Cert No:</strong> 10</li>
                                    <li><strong>Trip Budget / Person:</strong> 500</li>
                                    <li><strong>Created At:</strong> 02-Apr-2024</li>
                                    <li><strong>Status:</strong> Completed</li>
                                    <li><strong>Description:</strong> thanks for letting me know about the next steps are to
                                        be made to the gym and then I will be able to make it to the meeting tonight but I
                                        will be there at the same</li>
                                </ul>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>

                    <!-- Event Gallery -->
                    <div class="col-lg-12">

                        <!-- Sticky Block Start Point -->
                        <div id="accountSidebarNav"></div>

                        <!-- Card -->
                        <div class="js-sticky-block card mb-3 mb-lg-5"
                            data-hs-sticky-block-options='{
                 "parentSelector": "#accountSidebarNav",
                 "breakpoint": "lg",
                 "startPoint": "#accountSidebarNav",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20
               }'>
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Event Gallery</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <div class="post">
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="gallery">
                                                    @foreach ($event->images as $image)
                                                        <img class="img-fluid mb-3 border"
                                                            src="{{ asset('GalleryImages/' . $image->image) }}"
                                                            style="width: 300px !important" alt="Gallery Image">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>

                    <!-- Event Discussions -->
                    <div class="col-lg-12">

                        <!-- Sticky Block Start Point -->
                        <div id="accountSidebarNav"></div>

                        <!-- Card -->
                        <div class="js-sticky-block card mb-3 mb-lg-5"
                            data-hs-sticky-block-options='{
                 "parentSelector": "#accountSidebarNav",
                 "breakpoint": "lg",
                 "startPoint": "#accountSidebarNav",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20
               }'>
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Event Discussions</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <ul class="list-unstyled list-py-2 text-dark mb-0">
                                    <div class="row">
                                        @foreach (@$event->comments as $comment)
                                            <div class="col-lg-4 mt-2">
                                                <a
                                                    href="{{ route('admin.user.profile', ['id' => $comment->userInfo->id]) }}">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar avatar-sm avatar-circle">
                                                                @if (@$comment->userInfo->profile != '' && file_exists('ProfilePictures/' . @$comment->userInfo->profile))
                                                                    <img class="avatar-img"
                                                                        src="{{ asset('ProfilePictures/' . @$comment->userInfo->profile) }}">
                                                                @else
                                                                    <img class="avatar-img"
                                                                        src="{{ asset('admin/dist/img/image-placeholder.jpeg') }}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h5 class="text-inherit mb-0">
                                                                {{ ucfirst($comment->userInfo->name) }}</h5>
                                                            <small style="color: black">
                                                                {{ $comment->created_at->format('l') }}
                                                                {{ $comment->created_at->format('d-M-Y') }}
                                                                -
                                                                {{ $comment->created_at->format('g:i A') }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <span class="mt-2">
                                                    {{ $comment->comment }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>

                    <!-- Joined Users -->
                    <div class="col-lg-12">

                        <!-- Sticky Block Start Point -->
                        <div id="accountSidebarNav"></div>

                        <!-- Card -->
                        <div class="js-sticky-block card mb-3 mb-lg-5"
                            data-hs-sticky-block-options='{
                 "parentSelector": "#accountSidebarNav",
                 "breakpoint": "lg",
                 "startPoint": "#accountSidebarNav",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20
               }'>
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Joined Users</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <ul class="list-unstyled list-py-2 text-dark mb-0">
                                    <div class="row">
                                        @foreach (@$event->joins as $user)
                                            <div class="col-lg-4 mt-2">
                                                <a href="javascript:void(0)">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar avatar-sm avatar-circle">
                                                                @if (@$user->userInfo->profile != '' && file_exists('ProfilePictures/' . @$user->userInfo->profile))
                                                                    <img class="avatar-img"
                                                                        src="{{ asset('ProfilePictures/' . @$user->userInfo->profile) }}">
                                                                @else
                                                                    <img class="avatar-img"
                                                                        src="{{ asset('admin/dist/img/image-placeholder.jpeg') }}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h5 class="text-inherit mb-0">
                                                                {{ ucfirst($user->userInfo->name) }}</h5>
                                                            <small style="color: black">
                                                                {{ $user->created_at->format('l') }}
                                                                {{ $user->created_at->format('d-M-Y') }}
                                                                -
                                                                {{ $user->created_at->format('g:i A') }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
@endsection
