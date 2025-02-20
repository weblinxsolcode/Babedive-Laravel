<!-- Navbar Vertical -->
<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <!-- Logo -->

            <a class="navbar-brand" href="{{ route('admin.dashboard') }}" aria-label="Front">
                {{-- <img style="scale: 0.6;" class="navbar-brand-logo" src="{{ asset('logo.png') }}" alt="Logo" data-hs-theme-appearance="default"> --}}
                <img style="scale: 2; margin-left: 50px;" class="navbar-brand-logo" src="{{ asset('logo.png') }}" alt="Logo" data-hs-theme-appearance="default">
                <img style="scale: 0.6;" class="navbar-brand-logo" src="{{ asset('logo.png') }}" alt="Logo" data-hs-theme-appearance="dark">

                <img class="navbar-brand-logo-mini" style="scale: 2.5;" src="{{ asset('logo.png') }}" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="{{ asset('logo.png') }}" alt="Logo" data-hs-theme-appearance="dark">
            </a>

            <!-- End Logo -->

            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>

            <!-- End Navbar Vertical Toggle -->

            <!-- Content -->
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                    <!-- Dashboard -->
                    <div class="nav-item">
                        <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" data-placement="left">
                            <i class="bi-house-door nav-icon"></i>
                            <span class="nav-link-title">Dashboard</span>
                        </a>
                    </div>
                    <!-- End Dashboard -->

                    <span class="dropdown-header mt-4">Pages</span>
                    <small class="bi-three-dots nav-subtitle-replacer"></small>

                    <!-- Collapse -->
                    <div class="navbar-nav nav-compact">

                    </div>
                    <div id="navbarVerticalMenuPagesMenu">

                        <!-- Divers -->
                        <div class="nav-item">
                            <a class="nav-link {{ Route::is(['admin.membership.index']) ? 'active' : '' }}" href="{{ route('admin.membership.index') }}" data-placement="left">
                                <i class="bi-cash-coin nav-icon"></i>
                                <span class="nav-link-title">Memberships</span>
                            </a>
                        </div>

                        <!-- Users -->
                        <div class="nav-item">
                            <a class="nav-link {{ Route::is(['admin.user.index', 'admin.user.profile', 'admin.user.feedback', 'admin.user.trip']) ? 'active' : '' }}" href="{{ route('admin.user.index') }}" data-placement="left">
                                <i class="bi-people nav-icon"></i>
                                <span class="nav-link-title">Diver Management</span>
                            </a>
                        </div>
                        <!-- Divers -->
                        <div class="nav-item">
                            <a class="nav-link {{ Route::is(['admin.diver.index', 'admin.diver.profile', 'admin.diver.feedback', 'admin.diver.trip', 'admin.diver.transaction']) ? 'active' : '' }}" href="{{ route('admin.diver.index') }}" data-placement="left">
                                <i class="bi-people nav-icon"></i>
                                <span class="nav-link-title">Dive Master Management</span>
                            </a>
                        </div>

                        <!-- Trips -->
                        <!-- Snorklings & Divings -->
                        @php($snorkling_trip_routes = [
                        'admin.trip-snorkling.index',
                        'admin.trip-snorkling.detail',
                        ])

                        @php($diving_trip_routes = [
                        'admin.trip-diving.index',
                        'admin.trip-diving.detail',
                        ])

                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle {{ Route::is(['admin.trip-snorkling.index', 'admin.trip-snorkling.detail', 'admin.trip-diving.detail', 'admin.trip-diving.index', 'admin.ongoing.trips', 'admin.completed.trips']) ? 'active' : '' }}" href="#navbarVerticalMenuPagesTrips" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesTrips" aria-expanded="false" aria-controls="navbarVerticalMenuPagesTrips">
                                <i class="bi bi-calendar-event nav-icon"></i>
                                <span class="nav-link-title">Trips</span>
                            </a>

                            <div id="navbarVerticalMenuPagesTrips" class="nav-collapse collapse {{ Route::is(['admin.trip-snorkling.index', 'admin.trip-snorkling.detail', 'admin.ongoing.trips', 'admin.completed.trips', 'admin.trip-diving.detail', 'admin.trip-diving.index']) ? 'show' : '' }}" data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link {{ Route::is(array_merge($snorkling_trip_routes)) ? 'active' : '' }}" href="{{ route('admin.trip-snorkling.index') }}">
                                    Snorkling
                                </a>
                                <a class="nav-link {{ Route::is(['admin.trip-diving.detail', 'admin.trip-diving.index']) ? 'active' : '' }}" href="{{ route('admin.trip-diving.index') }}">
                                    Diving
                                </a>
                                <a href="{{ route('admin.ongoing.trips') }}" class="nav-link {{ Route::is(['admin.ongoing.trips']) ? 'active' : '' }}">
                                    Ongoing Trips
                                </a>
                                <a href="{{ route('admin.completed.trips') }}" class="nav-link {{ Route::is(['admin.completed.trips']) ? 'active' : '' }}">
                                    Completed Trips
                                </a>
                            </div>
                        </div>

                        <!-- Coupons -->
                        <div class="nav-item">
                            <a class="nav-link {{ Route::is('admin.coupon.index') ? 'active' : '' }}" href="{{ route('admin.coupon.index') }}" data-placement="left">
                                <i class="bi-gift-fill nav-icon"></i>
                                <span class="nav-link-title">Coupons Management</span>
                            </a>
                        </div>

                        <!-- Level Management -->
                        <div class="nav-item">
                            <a class="nav-link {{ Route::is(['admin.level.management']) ? 'active' : '' }}" href="{{ route('admin.level.management') }}" data-placement="left">
                                <i class="bi-gift-fill nav-icon"></i>
                                <span class="nav-link-title">Level Management</span>
                            </a>
                        </div>

                        <!-- Fianance Management -->
                        <div class="nav-item">
                            <a class="nav-link {{ Route::is(['admin.fianance.management']) ? 'active' : '' }}" href="{{ route('admin.fianance.management') }}" data-placement="left">
                                <i class="bi-key nav-icon"></i>
                                <span class="nav-link-title">Fianance Management</span>
                            </a>
                        </div>

                        <!-- Complaints -->
                        <div class="nav-item">
                            <a class="nav-link {{ Route::is('admin.complaint.index') ? 'active' : '' }}" href="{{ route('admin.complaint.index') }}" data-placement="left">
                                <i class="bi-flag-fill nav-icon"></i>
                                <span class="nav-link-title">Complaints Management</span>
                            </a>
                        </div>

                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle {{ Route::is(['admin.sale.index', 'admin.membership.upgrade']) ? 'active' : '' }}" href="#navbarVerticalMenuPagesMenuSales" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesMenuSales" aria-expanded="false" aria-controls="navbarVerticalMenuPagesMenuSales">
                                <i class="bi bi-currency-dollar nav-icon"></i>
                                <span class="nav-link-title">Sales Report</span>
                            </a>

                            <div id="navbarVerticalMenuPagesMenuSales" class="nav-collapse collapse {{ Route::is(['admin.sale.index', 'admin.membership.upgrade']) ? 'show' : '' }}" data-bs-parent="#navbarVerticalMenuPagesMenuSales">
                                <a class="nav-link {{ Route::is('admin.sale.index') ? 'active' : '' }}" href="{{ route('admin.sale.index') }}">
                                    <span class="nav-link-title">Revenue</span>
                                </a>
                                <a class="nav-link {{ Route::is(['admin.membership.upgrade']) ? 'active':'' }}" href="{{ route('admin.membership.upgrade') }}">
                                    <span class="nav-link-title">Account Upgrade</span>
                                </a>
                            </div>
                        </div>

                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle {{ Route::is(['admin.faq.management', 'admin.contact.management', 'admin.terms', 'admin.privacy']) ? 'active' : '' }}" href="#navbarVerticalMenuPagesCMS" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesCMS" aria-expanded="false" aria-controls="navbarVerticalMenuPagesCMS">
                                <i class="bi bi-hdd-stack nav-icon"></i>
                                <span class="nav-link-title">CMS</span>
                            </a>

                            <div id="navbarVerticalMenuPagesCMS" class="nav-collapse collapse {{ Route::is(['admin.faq.management', 'admin.contact.management', 'admin.terms', 'admin.privacy']) ? 'show' : '' }}" data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link {{ Route::is('admin.faq.management') ? 'active' : '' }}" href="{{ route('admin.faq.management') }}">
                                    <span class="nav-link-title">FAQ Management</span>
                                </a>
                                <a class="nav-link {{ Route::is(['admin.contact.management']) ? 'active':'' }}" href="{{ route('admin.contact.management') }}">
                                    <span class="nav-link-title">Contact Management</span>
                                </a>
                                <a class="nav-link {{ Route::is(['admin.terms']) ? 'active':'' }}" href="{{ route('admin.terms') }}">
                                    <span class="nav-link-title">Terms & Conditions</span>
                                </a>
                                <a class="nav-link {{ Route::is(['admin.privacy']) ? 'active':'' }}" href="{{ route('admin.privacy') }}">
                                    <span class="nav-link-title">Privacy Policy</span>
                                </a>
                                <a class="nav-link {{ Route::is(['admin.banner']) ? 'active':'' }}" href="{{ route('admin.banner') }}">
                                    <span class="nav-link-title">Banner</span>
                                </a>
                                 <a class="nav-link {{ Route::is(['admin.joiningfee']) ? 'active' : '' }}"
                                    href="{{ route('admin.joiningfee') }}">
                                    <span class="nav-link-title">Joining Fee</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- End Content -->
        </div>
    </div>
</aside>

<!-- End Navbar Vertical -->
