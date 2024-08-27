$(document).ready(function () {
         createbase();

      
    });


 var createbase = function () {


		$('#guardarconexion').submit(function (e) {

      var server=$('#server').val();
      var user=$('#usuario').val();
      var pass=$('#password').val();
      var database=$('#database').val();
    		 e.preventDefault();	
		 
	Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:false,
  title: '<strong>Validando datos</strong>',
  icon: 'info',
 html:   '<i class="fa fa-cog spin"></>  ', 
  
  
})
$('#enviardata').attr("disabled", true);		

           var datos = $(this).serialize();
		 				
				
            $.ajax({
                type: "POST",
                url: "model/crearbase.php",
                data: datos,
                dataType: "html",				
				   success :  function(data)
          {    
$('#enviardata').attr("disabled", false);  
         


          	Swal.fire({ 
  title: 'Creación de base de datos!</br>Procesos MySQL!',
  html: data,
  icon: 'success',
  showCloseButton: true,
  showCancelButton: false,
  showDenyButton: true,
  showConfirmButton:false,
  denyButtonText: `Continuar`,
  denyButtonColor: 'green',
  confirmButtonColor: 'red',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Cerrar'
}).then((result) => {
  if (result.isDenied) {
  window.location.href = "crearconexion?server="+server+"&usuario="+user+"&password="+pass+"&database="+database
  }
})
			
		
          	
         
        
			  

	
		  
		  
         },
			
				
            });
		 
        });
    }
	

	  	   $("#toggle").change(function(){   
  if($(this).is(':checked')){    
   $("#password").attr("type","text");   
    
  }else{ 
   $("#password").attr("type","password");   
  }
 
 });
