<!-- Profile Header -->
<div class="text-center mb-5">
    <!-- Avatar -->
    <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
        @if ($user->profile != '' && file_exists('ProfilePictures/' . $user->profile))
        <img class="avatar-img" src="{{ asset('ProfilePictures/' . $user->profile) }}" alt="Image">
        @else
        <img class="avatar-img" src="{{ asset('image-placeholder.jpeg') }}" alt="Image">
        @endif
    </div>
    <!-- End Avatar -->

    <h1 class="page-header-title">{{ ucfirst($user->name) }}</h1>

    <!-- List -->
    <ul class="list-inline list-px-2">
        <li class="list-inline-item">
            <i class="bi-geo-alt me-1"></i>
            <span>{{ ucfirst($user->city ?? '-') }}</span>
        </li>

        <li class="list-inline-item">
            <i class="bi-person-check-fill me-1"></i>
            <span>Joined {{ $user->created_at->format('d-M-Y') }}</span>
        </li>
    </ul>
    <!-- End List -->
</div>
<!-- End Profile Header -->

<!-- Nav -->
<div class="js-nav-scroller hs-nav-scroller-horizontal mb-5">
    <span class="hs-nav-scroller-arrow-prev" style="display: none;">
        <a class="hs-nav-scroller-arrow-link" href="javascript:;">
            <i class="bi-chevron-left"></i>
        </a>
    </span>

    <span class="hs-nav-scroller-arrow-next" style="display: none;">
        <a class="hs-nav-scroller-arrow-link" href="javascript:;">
            <i class="bi-chevron-right"></i>
        </a>
    </span>

    <ul class="nav nav-tabs align-items-center">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('admin.diver.profile') ? 'active' : '' }}" href="{{ route('admin.diver.profile', $user->id) }}">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('admin.diver.feedback') ? 'active' : '' }}" href="{{ route('admin.diver.feedback', $user->id) }}">Reviews <span class="badge bg-soft-dark text-dark rounded-circle ms-1">{{ count(@$user->feedbacks ?? '0') }}</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('admin.diver.trip') ? 'active' : '' }}" href="{{ route('admin.diver.trip', $user->id) }}">Trips <span class="badge bg-soft-dark text-dark rounded-circle ms-1">{{ count(@$user->getEvents ?? '0') }}</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('admin.diver.transaction') ? 'active' : '' }}" href="{{ route('admin.diver.transaction', $user->id) }}">Transactions <span class="badge bg-soft-dark text-dark rounded-circle ms-1">{{ count($user->transactions ?? '0') }}</span></a>
        </li>
    </ul>
</div>
<!-- End Nav -->
