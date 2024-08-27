$(document).ready(function () {             
          
     leerficheros();
      Delete();
      RecoverySQL();
           });
           
           
 
 var leerficheros= function () {  
 
 
            $.ajax({
                url: "view/verrespaldos.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                                  
                    $('#contbody').html(data);
                                        $("#dataTable thead").addClass(rand);  
                    $('#dataTable').DataTable({ responsive: true });        
                       $('#loader').html('');   
                       $('#titlecard').html('Respaldos');              
                }
            });
         
       
    }


  $(document).on('click', '#sendcode', function(e){
    e.preventDefault();   
          Swal.fire({
            showConfirmButton: false,
  icon: 'info',
  title: '<i class="fas fa-spinner fa-spin" aria-hidden="true"></i>',
  text:'Enviando código...',
   
});
      $.ajax({
                
                url: "../model/mails/sendcodebackup.php",
              
        
               type: "POST",
                dataType: "json",
                success: function (data) {

                  if(data==1)

              {      Swal.fire({ 
                confirmButtonText:'Aceptar',
                confirmButtonColor: 'green',
                icon: 'success',
                title: 'Excelente!',
                html: "Código enviado", 
                timer:1000,     
                
                 
              });}

            else   {      Swal.fire({ 
                confirmButtonText:'Aceptar',
                confirmButtonColor: 'green',
                icon: 'error',
                title: 'Error!',
                html: data,      
                
                 
              });}
                                        
                
        }
            });

    
  });




    $(document).on('click', '.deleteitem', function(e){
    e.preventDefault();   
     var carpeta=$(this).attr("id");
     var valor=$(this).val(); 
  $('#namepfile').html(valor);   
  $('#nombrearchivo').val(valor); 

    
  });

   $(document).on('click', '.seeitem', function(e){
    e.preventDefault();   
     var carpeta=$(this).attr("id");
     var valor=$(this).val(); 
  $('#namepfiler').html(valor);   
  $('#nombrearchivor').val(valor); 

    
  });



       var Delete= function () {
        $('#Formdeleteitem').submit(function (e) {
      
            e.preventDefault();   

            Swal.fire({
            showConfirmButton: false,
  icon: 'info',
  title: '<i class="fas fa-spinner fa-spin" aria-hidden="true"></i>',
  text:'Validando...',
   
});var datos = $(this).serialize();
      setTimeout(function(){

            $.ajax({
                type: "POST",
                url: "../model/eliminar/deletefichero.php",
                data: datos,
                success: function (data) {
          
          if (data==1){
    Swal.fire({ 
  confirmButtonText:'Aceptar',
  confirmButtonColor: 'green',
  icon: 'success',
  title: 'Excelente',
  text: "Archivo eliminado",
  timer:1000
   
}); 

 leerficheros();
      
$('#Formdeleteitem').trigger("reset");
$('#namepfile').html("");
$('#Modaldeleteitem').modal('hide');  

          }
          
          
          else if(data==3) {
            Swal.fire({ 
  confirmButtonText:'Aceptar',
  confirmButtonColor: 'green',
  icon: 'warning',
  title: 'Alerta!',
  html: "El archivo ya fue eliminado"
   
});$('#Formdeleteitem').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }



       var RecoverySQL= function () {
        $('#Formrecoverysql').submit(function (e) {


      
            e.preventDefault();   
  var archivo =$('#nombrearchivor').val(); 

if(archivo==""){
  Swal.fire({ 
  confirmButtonText:'Aceptar',
  confirmButtonColor: 'green',
  icon: 'error',
  title: 'Error!',
  text: "Seleccione un respaldo",
  timer:1500
   
}); 

}

else{

            Swal.fire({
            showConfirmButton: false,
  icon: 'info',
  title: '<i class="fas fa-spinner fa-spin" aria-hidden="true"></i>',
  text:'Restaurando...',
   
});var datos = $(this).serialize();
      setTimeout(function(){

            $.ajax({
                type: "POST",
                url: "../model/actualizar/RecoverySQL.php",
                data: datos,
                success: function (data) {
          
          if (data==9){
    Swal.fire({ 
  confirmButtonText:'Aceptar',
  confirmButtonColor: 'green',
  icon: 'error',
  title: 'Error!',
  text: "El código ingresado es erroneo",
  timer:1500
   
}); 

 
      


          }

                  else if (data==1){
    Swal.fire({ 
  confirmButtonText:'Aceptar',
  confirmButtonColor: 'green',
  icon: 'success',
  title: 'Excelente',
  text: "Base de datos restaurada con éxito",
  timer:1000
   
}); 

 
      
$('#Formrecoverysql').trigger("reset");
 
$('#namepfiler').html(""); 
$('#nombrearchivor').val(""); 
          }
          
          
          
          else {
            Swal.fire({ 
  confirmButtonText:'Aceptar',
  confirmButtonColor: 'green',
  icon: 'info',
  title: 'Información de proceso!',
  html: data
   
});$('#Formrecoverysql').trigger("reset");
 
$('#namepfiler').html(""); 
$('#nombrearchivor').val(""); 
          
          }
          
                }
        
        
        
            });
      
      }, 1000);

}
        });
    }
