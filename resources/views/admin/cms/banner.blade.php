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
        </div>
    </div>
    <form action="{{ route('admin.store.banner') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="text-right">
                    <button class="btn btn-primary" type="submit">
                        Update Banner
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="banner">Upload Banner Image</label>
                    <input type="file" name="banner" id="banner" class="form-control" accept="image/*" required>
                </div>
            </div>
        </div>
    </form>
    
</div>
@endsection
