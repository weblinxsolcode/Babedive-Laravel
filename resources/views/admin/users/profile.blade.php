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

                    <!-- Sticky Block Start Point -->
                    <div id="accountSidebarNav"></div>

                    <!-- Card -->
                    <div class="js-sticky-block card mb-3 mb-lg-5" data-hs-sticky-block-options='{
                 "parentSelector": "#accountSidebarNav",
                 "breakpoint": "lg",
                 "startPoint": "#accountSidebarNav",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20
               }'>
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">Profile</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <ul class="list-unstyled list-py-2 text-dark mb-0">
                                    <li class="pb-0"><span class="card-subtitle">About</span></li>
                                    <li><i class="bi-person dropdown-item-icon"></i> <strong>Name:</strong> {{ ucfirst($user->name) }}</li>
                                    <li><i class="bi-gender-ambiguous dropdown-item-icon"></i> <strong>Gender:</strong> {{ ucfirst($user->gender ?? "-") }}</li>
                                    <li><i class="bi-flag-fill dropdown-item-icon"></i> <strong>Following:</strong> {{ count($user->followingDiver) }}</li>
                                    <li><i class="bi-geo-alt dropdown-item-icon"></i> <strong>City:</strong> {{ ucfirst($user->city ?? "-") }}</li>
                                    <li><i class="bi-person-check-fill dropdown-item-icon"></i> <strong>Joined:</strong> {{ $user->created_at->format('d-M-Y') }}</li>
                                </ul>
                                <ul class="list-unstyled list-py-2 text-dark mb-0">
                                    <li class="pt-4 pb-0"><span class="card-subtitle">Contacts</span></li>
                                    <li><i class="bi-at dropdown-item-icon"></i> <strong>Email:</strong> {{ $user->email }}</li>
                                    <li><i class="bi-whatsapp dropdown-item-icon"></i> <strong>WhatsApp:</strong> {{ $user->whatsapp ?? "-" }}</li>
                                </ul>
                            </div>
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
