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
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Page Header -->

    <div class="card" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
        <div class="card-header">
            <h3 class="card-title">
                General Info
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="col-form-label form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $admin->name }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="col-form-label form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $admin->email }}" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary">Update Info</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-3" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
        <div class="card-header">
            <h3 class="card-title">
                Password Security
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.update.password') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="col-form-label form-label">New Password</label>
                            <input type="password" class="form-control" name="password" placeholder="New Password" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label class="col-form-label form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm your new password" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
