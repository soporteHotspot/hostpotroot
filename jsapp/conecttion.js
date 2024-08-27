 $(document).ready(function () {
         creatcon();

      
    });


 var creatcon = function () {
		$('#guardarconexion').submit(function (e) {
			 e.preventDefault();	
		 Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Validando datos</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});
	
$('#enviardata').attr("disabled", true);

		

           var datos = $(this).serialize();
		 				
				
            $.ajax({
                type: "POST",
                url: "model/createconn.php",
                data: datos,
                dataType: "json",				
				   success :  function(data)
          {    

          if(data==1) {


          	Swal.fire({
  title: 'Excelente!',
  text: "Archivo de conexión creado con éxito!",
  icon: 'success',
  showCancelButton: false,
  confirmButtonColor: 'green',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Continuar'
}).then((result) => {
  if (result.isConfirmed) {
     window.location.href = "../";
  }
})
			
		
          	
          } 
        
			  
else if(data==7){   Swal.fire({
      icon: 'error',
      title: 'Oops...',
      html: "Error! de comunicacion al servidor especificado",
      
    });
    
    
            $('#enviardata').attr("disabled", false);
          
          }
	 else if(data==3){		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  html: "Error en el proceso de creacion de archivo",
		  
		});
		
		
					  $('#enviardata').attr("disabled", false);
				  
				  }
		  
		  
         },
			
				
            });
		 
        });
    }
	

	  	   $("#toggle").change(function(){   
  if($(this).is(':checked')){    
   $("#intpassword").attr("type","text");   
    
  }else{ 
   $("#intpassword").attr("type","password");   
  }
 
 });
