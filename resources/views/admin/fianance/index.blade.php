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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Manage Comission & Payment Settings
            </h3>
        </div>
        <form action="{{ route('admin.update.fianance') }}" id="formSubmit" method="post">
            @csrf

            <div class="card-body">
                <div class="row">                    
                    <div class="form-group col-6 mb-2">
                        <label for="">Stripe Key</label>
                        <input type="text" name="key" id="" placeholder="Please enter stripe key" class="form-control" value="{{ $info->stripe_key ?? '' }}" required>
                    </div>
                    <div class="form-group col-6 mb-2">
                        <label for="">Stripe Secret</label>
                        <input type="text" name="secret" id="" placeholder="Please enter stripe secret" class="form-control" value="{{ $info->stripe_secret ?? '' }}" required>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-rounded" type="submit">
                    Update Settings
                </button>
            </div>
        </form>
    </div>
</div>

{{--  This script is working to form submitting  --}}
<script>
    $(document).ready(function(){
        $("#formSubmit").submit(function(){
            event.preventDefault();

            var type = $("#comissionType").val();
            var value = parseInt($("#comissionValue").val());
            var form = $("#formSubmit");

            if(type == "percentage")
            {
                if(value > 100)
                {
                    alert("You cannot provide more that 100% in comission.");
                } else {
                    form[0].submit();
                }
            } else {
                form[0].submit();
            }

        })
    });
</script>
{{--  End Script  --}}
@endsection
