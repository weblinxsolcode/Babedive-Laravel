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
            @include('admin.divers.profile-header')

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
                            <ul class="list-unstyled list-py-2 text-dark mb-0">
                                <li class="pb-0"><span class="card-subtitle">About</span></li>
                                <li><i class="bi-person dropdown-item-icon"></i> <strong>Name:</strong> {{ ucfirst($user->diveUserInfo->name) }}</li>
                                <li><i class="bi-gender-ambiguous dropdown-item-icon"></i> <strong>Gender:</strong> {{ ucfirst($user->diveUserInfo->gender) }}</li>
                                <li><i class="bi-flag-fill dropdown-item-icon"></i> <strong>Followers:</strong> {{ count($user->diveUserInfo->followerCount) }}</li>
                                <li><i class="bi-geo-alt dropdown-item-icon"></i> <strong>City:</strong> {{ ucfirst($user->diveUserInfo->city) }}</li>
                                <li><i class="bi-person-check-fill dropdown-item-icon"></i> <strong>Joined:</strong> {{ \Carbon\Carbon::parse($user->diveUserInfo->created_at)->format("d-M-Y") }}</li>
                                <li><i class="bi-building dropdown-item-icon"></i> <strong>Certificate Level:</strong> {{ ucfirst($user->diveUserInfo->cert_level) }}</li>
                                <li><i class="bi-list-ol dropdown-item-icon"></i> <strong>Certificate No:</strong> {{ ucfirst($user->diveUserInfo->cert_no) }}</li>
                                <li><i class="bi-check-square dropdown-item-icon"></i> <strong>Subscribed:</strong> {{ $user->diveUserInfo->is_paid == true ? 'Subscribed':'Not Subscribed' }}</li>

                                <li class="pt-4 pb-0"><span class="card-subtitle">Contacts</span></li>
                                <li><i class="bi-at dropdown-item-icon"></i> <strong>Email:</strong> {{ $user->diveUserInfo->email }}</li>
                                <li><i class="bi-whatsapp dropdown-item-icon"></i> <strong>WhatsApp:</strong> {{ $user->diveUserInfo->whatsapp }}</li>
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
