    
$(document).ready(function () {
         agregardatos();
    
      
    });


    var agregardatos = function () {
    $("#Formadsistema").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize();
        
Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Validando datos</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
}); 
    $.ajax({
            type: 'POST',
            url: 'model/agregarregsistemastart.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,           
            success: function(data){

            if(data==1) {

                    Swal.fire({
  title: 'Excelente!',
  text: "Datos guardados con éxito!",
  icon: 'success',
  showCancelButton: false,
  confirmButtonColor: 'green',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Continuar'
}).then((result) => {
  if (result.isConfirmed) {
    setTimeout(location.reload(), 5000);
  }
})
      
    

            }


              else if(data==3) {

              Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Excelente</strong>',
  icon: 'error',
 html:   'Datos no procesados  ', 
  
  
})

            }
    else if(data==9) {

              Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Excelente</strong>',
  icon: 'error',
 html:   'Imágen no procesada soportada solo  png jpg  ', 
  
  
})

            }

         
      }
      
        });

    
    });  
  
  }