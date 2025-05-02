            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://github.com/aboamen7000/aboamen7000" target="_blank" class="footer-link fw-bolder">IA</a>
                </div>
                <div>
         

                 
                </div>
              </div>
            </footer>
            <!-- / Footer -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
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

