
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<!-- Your JavaScript code -->
<script type="text/javascript">
    
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": 7000,  // Set the timeOut to the duration you want the progress bar to last
    "extendedTimeOut": null,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

    // Your custom code that might use toastr
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"

        switch(type){
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;    
            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;    
            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;    
            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");     
                break;
        }
    @endif
</script>


<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

<!-- Include Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->


<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include Bootstrap Datepicker CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- Include Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>