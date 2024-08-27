$(document).ready(function () {
         login();
		 logintwo();
		  
    });
	
 $(document).on('change','#usuariomikro', function(){
	var valor = $(this).val();
	 
		buscar_RB(valor);
	 
});
		function buscar_RB(idr){
	 $.ajax({
                url: "model/buscarRB.php",
                method: "POST",
                dataType: "json",
                data: {idr: idr},
                success: function (data) {
                $('#IPMikroTik').val(data.ip);
                $('#nombreuser').val(data.nombre);      					
          $('#username').val(data.usuario); 
          $('#password').val(data.password);
          $('#idsucursal').val(data.idsucursal);			
					$('#puerto').val(data.puerto);
					 

					
                }
            });
}
	
    var login = function () {
				
        $('#login').submit(function (e) {
			 e.preventDefault();	
		 
	var iplogin= $('#iplogin').val();
$('#btnentrar').attr("disabled", true);	


Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Conectando a '+iplogin+'</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});
        var datos = $(this).serialize();

      ///  console.log(datos);
			setTimeout(function(){	


				
            $.ajax({
                type: "POST",
                url: "model/validar.php",
                data: datos,
                dataType: "json",				
				success :  function(data)
          { 

 // console.log(data);

       if(data.login ==0){ 



Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:false,
  title: '<strong>Bienvenid@</strong>',
  icon: 'success',
 html:   '<i class="fa fa-user"></>  '+ data.username, 
  
  
});


            
window.location.href = "puntodeventa";		 
          
         }

   else if(data.login ==1){ 



Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:false,
  title: '<strong>Bienvenid@</strong>',
  icon: 'success',
  html:   '<i class="fa fa-user"></>  '+ data.username,  
  
  
})


            
window.location.href = "dashboard";		 
          
         }
         
		  
		  else if(data ==3){   
			  
			Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se encontró la api mikrotik verifique su dirección correcta!',
  
})

			  $('#btnentrar').attr("disabled", false);
		  }

          else if(data ==9){   
        
      Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ya existe registro con el mismo nombre y direccion ip, ingrese desde la otra pestaña "Guardados"!',
  
})

        $('#btnentrar').attr("disabled", false);
      }

	  else if(data ==4){
			  
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Usuario no registrado!',
  
});

			  $('#btnentrar').attr("disabled", false);
		  }
  else if(data ==2){
			  
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});

			  $('#btnentrar').attr("disabled", false);
		  }


		   else {
			  

				Swal.fire({
  icon: 'error',
  title: 'Oops...',
   text: 'Error de conexión! ',
  
});


			  $('#btnentrar').attr("disabled", false);
		  }
		  
		  
		  
         },
			
				
            });
				}, 1000);
        });
    }
	
	
 var logintwo = function () {
		$('#logintwo').submit(function (e) {
			 e.preventDefault();	
		 
	var iplogin= $('#IPMikroTik').val();
$('#btnentrar2').attr("disabled", true);

		
Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Conectando</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
})
           var datos = $(this).serialize();
			setTimeout(function(){				
				
            $.ajax({
                type: "POST",
                url: "model/validartwo.php",
                data: datos,
                dataType: "json",				
				   success :  function(data)
          {      
         if(data.login ==0){ 



Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:false,
  title: '<strong>Bienvenid@</strong>',
  icon: 'success',
  html:   '<i class="fa fa-user"></>  '+ data.username,  
  
  
})


            
window.location.href = "puntodeventa";		 
          
         }

   else if(data.login ==1){ 



Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:false,
  title: '<strong>Bienvenid@</strong>',
  icon: 'success',
  html:   '<i class="fa fa-user"></>  '+ data.username,  
  
  
})


            
window.location.href = "dashboard";		 
          
         }


         
		  
		  else if(data ==3){   
			  
			Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se encontró la api mikrotik verifique su dirección correcta!',
  
})

			  $('#btnentrar2').attr("disabled", false);
		  }

	  else if(data ==4){
			
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Usuario no registrado!',
  
})

			  $('#btnentrar2').attr("disabled", false);
		  }


		   else {
			  

				Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión! '+data,
  
})


			  $('#btnentrar2').attr("disabled", false);
		  }
		  
		  
		  
         },
			
				
            });
				}, 1000);
        });
    }
	
	
	
	  $("#toggle").change(function(){   
  if($(this).is(':checked')){    
   $("#intpassword1").attr("type","text");   
    
  }else{ 
   $("#intpassword1").attr("type","password");   
  }
 
 });


	  	  $("#toggle2").change(function(){   
  if($(this).is(':checked')){    
   $("#password").attr("type","text");   
    
  }else{ 
   $("#password").attr("type","password");   
  }
 
 });