$(document).ready(function () {
        
     conctadoshpMiKroTik();
       Desconectarusuriohp();

    });
        var conctadoshpMiKroTik= function (e) { 
    
            $.ajax({
                url: "view/consultausersactivos.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {    swal.close();               
          $('#contbody').html(data);            
          $('#loader').html("");                    
        //  $('#dataTableusersactive').DataTable({ responsive: true });    
         
                }
            });
     
       
    }
      var Desconectarusuriohp = function () {
        $('#Formremoveuserhp').submit(function (e) {
            e.preventDefault();     
 Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});
      var datos = $(this).serialize();
      setTimeout(function(){

            $.ajax({
                type: "POST",
                url: "model/removeuseractive.php",
                data: datos,
                success: function (data) {
          
          if (data==1){   $('.modal').modal('hide');
                    Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Usuario desconectado  </strong>',
  icon: 'success',
    timer:1500
  
  
});
            $('#Formremoveuserhp').trigger("reset");
            $('#usernameu').html("");         
          }
          
          else if (data==2){
             Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! el dato no figura en MikroTik',
  
});
            $('#Formremoveuserhp').trigger("reset");
          }
      else if (data==3){
                                Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! de conexión',
  
});
            $('#Formremoveuserhp').trigger("reset");
          }
          else {
                     Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! Petición no procesados',
  
});
          $('#Formremoveuserhp').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }
  
    $(document).on('click', '.desconectarusuario', function(e){
e.preventDefault();
var nombre=$(this).val(); 
$('#errorremoveuserhp').html("");
$('#nombreactive').html(nombre);    
$('#nombreusuarioactivo').val(nombre);
    
  });  
  /* Autor : alonso meneses
	funcionalidad consulta de pines mediante ajax y jquery
	26/08/2024
	realiza la peticion al archivo consultausersactivos.php
  */
	
	
function consultarPin(){
	
	//pin = $('#nombre').val()
	texto= $('#nombre').val()
	if (texto===""){ 
		
	}else {
		$.ajax({
		url: "view/consultausersactivos.php",
		method: "POST",
		dataType: "html",  
		data: {nombre: texto},
		success: function (data) {
				//$('#dataTableusersactive').clear();			
			  $('#dataTableusersactive').append(data);    
			 
					}
				});
			}
}