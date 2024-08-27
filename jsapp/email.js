   $(document).ready(function () {
    
    leerdatos();
         agregar();
         Eliminardata();
        Sendemail();

    });


   var cambiartitulo = function(){
 $('#btn').html("Agregar");
    $('#ModalTitle').html("Configurar email");
   }

   
    var leerdatos = function () {  
 
 
            $.ajax({
                url: "view/email.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                                  
                    $('#contbody').html(data);                   
                    $('#dataTable').DataTable({ responsive: true ,dom: 'Bfrtip',});           
                                    
                }
            });
         
       
    }


       var Sendemail= function () {
        $('#pruebamailer').submit(function (e) {
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
                url: "model/mails/sendemail.php",
                data: datos,
                dataType:"json",
                success: function (data) {

                    if(data==1)


                {      Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Email enviado con éxito</strong>',
  icon: 'success',
    timer:1500
  
  
});}

            else if(data==3)
{  

          Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! al enviar email',
  
})


}
                  
                                  
                }
                
            });
                }, 1000);
        });
    }


   var agregar = function () {
        $('#registrarmailer').submit(function (e) {
            e.preventDefault();
			$('#error2').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Procesando <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
            var datos = $(this).serialize();
			setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/registrar/agregarmailer.php",
                data: datos,
                success: function (data) {
				
                  $('#error2').html(data);
                  leerdatos();
				  				  
                }
				
            });
				}, 1000);
        });
    }

     
    
 

      var Mostrardataedit = function (id) {        
         
            $.ajax({
                url: "model/consulta/buscaremail.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) { 
                    $('#ModalTitle').html("Editar email");
                    $('#btn').html("Guardar");
           
          $('#ide').val(data.id);                  
                    $('#nombre').val(data.nombreusuario);  
                    $('#email').val(data.email);  
                    $('#password').val(data.password);  
                    $('#host').val(data.host);  
                    $('#cifrado').val(data.cifrado);  
                    $('#puerto').val(data.puerto);                                
           
                    
                }
            });
        
    }
       var mostrardatadelete = function (id) {        
         
            $.ajax({
                url: "model/consulta/buscaremail.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) { 
          $('#datadelete').val(id);
           $('#seedata').html(data.email); 
          $('#titledelete').html(' Eliminar email'); 
          $('#errordeletedata').html("");
          $('#preguntadeletedata').html('Está seguro de eliminar el siguiente email?');                                    
           
                    
                }
            });
        
    }
    
     var Eliminardata = function () {

    $('#Formdeletedata').submit(function (e) {

            e.preventDefault();

             var sindato=$('#datadelete').val();

     if(sindato==""){

                $('#errordeletedata').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Por favor seleccione un registro</strong></div>');
            } 
            else {

              
            $("#submitdeletedata").prop('disabled', true); 
             $("#submitdeletedata").html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>  Espere');
      $('#errordeletedata').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Procesando <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
      var datos = $(this).serialize();
       
            $.ajax({
                type: "POST",
                url: "model/eliminar/borraremail.php",
                data: datos,
                success: function (data) { 
                   if (data==1){
            $('#errordeletedata').html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Registro eliminado exitosamente</strong></div>');
            $('#Formadeletehost').trigger("reset");           

            $("#submitdeletedata").prop('disabled', false); 
            $("#submitdeletedata").html('Confirmar'); 
             $("#seedata").html('Eliminado'); 
             $('#datadelete').val("");  
             $("#namedata").removeClass("alert text-center alert-primary");   
             $("#namedata").html("");          
           leerdatos();
          }

    else if (data==2){
                       $("#submitdeletedata").prop('disabled', false); 
                       $("#submitdeletedata").html('Confirmar');                   
                       $('#errordeletedata').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>No se encontraron registros</strong></div>');
                       $('#Formdeletedata').trigger("reset");
                       $("#seedata").html('Error!');  
          }
    else   if (data==3){
                        $("#submitdeletedata").prop('disabled', false);    
                        $("#submitdeletedata").html('Confirmar');                     
                        $('#errordeletedata').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Error de conexión</strong></div>');
                        $('#Formdeletedata').trigger("reset");
                        $("#seedata").html('Error!');

          }
          else {
            $("#submitdeletedata").prop('disabled', false);
            $("#submitdeletedata").html('Confirmar'); 
            $('#errordeletedata').html(data);
            $('#Formdeletedata').trigger("reset");
            $("#seedata").html('Error!');
          
          }
   
          
         
            
          
                }
        
        
        
            });
      
      }
        });
    }      
 
    
     
         $("#toggle").change(function(){
  
  // Check the checkbox state
  if($(this).is(':checked')){
   // Changing type attribute
   $("#password").attr("type","text");
   
   // Change the Text
   $("#toggleText").text("Ocultar contraseña");
  }else{
   // Changing type attribute
   $("#password").attr("type","password");
  
   // Change the Text
   $("#toggleText").text("Ver contraseña");
  }
 
 });
     
    
    
    
       