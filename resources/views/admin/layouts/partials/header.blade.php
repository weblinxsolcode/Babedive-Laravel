<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">

        <div class="navbar-nav-wrap-content-start">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>
            <!-- End Navbar Vertical Toggle -->

        </div>

        <div class="navbar-nav-wrap-content-end">
            <!-- Navbar -->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <!-- Account -->
                    <div class="dropdown">
                        <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <span class="bi bi-person"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                            <div class="dropdown-item-text">
                                <div class="d-flex align-items-center">
                                    @php
                                        $admin = \App\Models\Admins::find(session("admin_id"));
                                    @endphp
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">{{ ucfirst($admin->name) }}</h5>
                                        <p class="card-text text-body">{{ $admin->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">Sign out</a>
                        </div>
                    </div>
                    <!-- End Account -->
                </li>
            </ul>
            <!-- End Navbar -->
        </div>
    </div>
</header>
<!-- ========== END HEADER ========== -->
