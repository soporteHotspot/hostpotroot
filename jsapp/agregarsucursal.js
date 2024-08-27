 $(document).ready(function () {
        
       
       agregardatos();
       

    });


          var agregardatos = function () {
    $("#agregarsucursal").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize(); 
    
          
    $.ajax({
            type: 'POST',
            url: 'model/agregarsucursalstart.php',
             data:data,  
            dataType:'json',         
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
            
      }
      
        });

    
    });  
  
  }