

$(document).on('click', '#closesession', function(e){
    e.preventDefault();
 Swal.fire({
  title: '¿Está seguro de salir del sistema?',
  cancelButtonColor: '#d33',
  showCancelButton: true,
  confirmButtonText: 'Cerrar sesión',
   cancelButtonText: 'Cancelar',
  
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Procesando...', '', 'info')

     $.ajax({
                url: "model/cerrarsesion.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) { 
                Swal.fire({
   
  icon: 'success',
  title: '<strong>Un placer atenderle</strong>',
  showConfirmButton: false,  
  html:   '<i class="fa fa-user"></>  '+ data,  
   
}) ;setTimeout(function(){  window.location.href = "login";}, 2000);
         
                }
            });
  }  
})
    
  });


  