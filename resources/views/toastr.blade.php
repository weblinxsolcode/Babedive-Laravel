<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
  @if(Session::has('success'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "positionClass": "toast-top-right",
    "timeOut": 10000
  }
      toastr.success("{{ session('success') }}");
  @endif

  @if($errors->any())
      @foreach($errors->all() as $error)
          toastr.options = {
              "closeButton" : true,
              "progressBar" : true,
              "positionClass": "toast-top-right",
              "timeOut": 10000
          }
          toastr.error("{{ $error }}");
      @endforeach
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "positionClass": "toast-top-right",
    "timeOut": 10000
  }
      toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "positionClass": "toast-top-right",
    "timeOut": 10000
  }
      toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "positionClass": "toast-top-right",
    "timeOut": 10000
  }
      toastr.warning("{{ session('warning') }}");
  @endif
</script>
