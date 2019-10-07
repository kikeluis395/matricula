toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "slideUp",
    "closeMethod": 'slideUp'
  }

  function ShowError(message){
    toastr.error(message, 'Error!')
  }

  function ShowSuccess(message){
    toastr.success(message, 'Exito!')
  }
  
  function ShowWarning(message){
    toastr.warning(message, 'Advertencia!')
  }
