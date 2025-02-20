@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">{{ $title }}</h1>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Page Header -->

    <!-- Stats -->
    <div class="row">

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="{{ route('admin.membership.index') }}">
                <div class="card-body">
                    <h6 class="card-subtitle">Total Transactions</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">
                                RM {{ number_format($totalSales->sum("price"), 2) }}
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="col-6">
                            <!-- Chart -->
                            <div class="chartjs-custom" style="height: 3rem;">
                            </div>
                            <!-- End Chart -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="{{ route('admin.sale.index') }}">
                <div class="card-body">
                    <h6 class="card-subtitle">Sales Revenue</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">
                                RM {{ number_format($totalRevenue->sum("price"), 2) }}
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="col-6">
                            <!-- Chart -->
                            <div class="chartjs-custom" style="height: 3rem;">
                            </div>
                            <!-- End Chart -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->


                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="{{ route('admin.coupon.index') }}">
                <div class="card-body">
                    <h6 class="card-subtitle">Coupons</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">
                                {{ count($coupons) }}
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="col-6">
                            <!-- Chart -->
                            <div class="chartjs-custom" style="height: 3rem;">
                            </div>
                            <!-- End Chart -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->


                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="{{ route('admin.membership.index') }}">
                <div class="card-body">
                    <h6 class="card-subtitle">Memberships</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">
                                {{ count($memberships) }}
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="col-6">
                            <!-- Chart -->
                            <div class="chartjs-custom" style="height: 3rem;">
                            </div>
                            <!-- End Chart -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->


                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="{{ route('admin.user.index') }}">
                <div class="card-body">
                    <h6 class="card-subtitle">Divers</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">
                                {{ count($divers) }}
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="col-6">
                            <!-- Chart -->
                            <div class="chartjs-custom" style="height: 3rem;">
                            </div>
                            <!-- End Chart -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="{{ route('admin.diver.index') }}">
                <div class="card-body">
                    <h6 class="card-subtitle">Dive Master</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">
                                {{ count($diverMasters) }}
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="col-6">
                            <!-- Chart -->
                            <div class="chartjs-custom" style="height: 3rem;">
                            </div>
                            <!-- End Chart -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->


                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="{{ route('admin.ongoing.trips') }}">
                <div class="card-body">
                    <h6 class="card-subtitle">On-Going Trips</h6>

                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">
                                {{ $events->where("status", 1)->count() }}
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="col-6">
                            <!-- Chart -->
                            <div class="chartjs-custom" style="height: 3rem;">
                            </div>
                            <!-- End Chart -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->


                </div>
            </a>
            <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow h-100" href="{{ route('admin.completed.trips') }}">
                <div class="card-body">
                    <h6 class="card-subtitle">Completed Trips</h6>
                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <h2 class="card-title text-inherit">
                                {{ $events->where("status", 2)->count() }}
                            </h2>
                        </div>
                        <div class="col-6">
                            <!-- Chart -->
                            <div class="chartjs-custom" style="height: 3rem;">
                            </div>
                            <!-- End Chart -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </a>
            <!-- End Card -->
        </div>

    </div>
    <!-- End Stats -->

</div>
@endsection
