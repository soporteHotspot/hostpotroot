$(document).ready(function () {
        
       Getuptime();
 agregarcortevencidos();
    Eliminardata();
    });

 
   var Eliminardata = function () {

    $('#Formdeletedata').submit(function (e) {

            e.preventDefault();

             var sindato=$('#datadelete').val();

     if(sindato==""){

                 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Por favor seleccione un registro',
  
});
            } 
            else {

              
            $("#submitdeletedata").prop('disabled', true); 
             $("#submitdeletedata").html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>  Espere');
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
                url: "model/removecuserlimituptime.php",
                data: datos,
                success: function (data) { 
                   if (data==1){ $('.modal').modal('hide');
          Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Registro eliminado de MikroTik</strong>',
  icon: 'success',
    timer:1500
  
  
});
            $('#Formadeletehost').trigger("reset");           

            $("#submitdeletedata").prop('disabled', false); 
            $("#submitdeletedata").html('Confirmar'); 
             $("#seedata").html('Eliminado'); 
             $('#datadelete').val("");          
         Getuptime();
          }

    else if (data==2){
                       $("#submitdeletedata").prop('disabled', false); 
                       $("#submitdeletedata").html('Confirmar');                   
           Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error datos no encontrados',
  
});
                       $('#Formdeletedata').trigger("reset");
                       $("#seedata").html('Error!');  
          }
    else   if (data==3){
                        $("#submitdeletedata").prop('disabled', false);    
                        $("#submitdeletedata").html('Confirmar');                     
                  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});
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
      
      }, 1000);}
        });
    }  
 
       
 
  
    $(document).on('click', '.Mostrardatadelete', function(e){
e.preventDefault();
$('#errordeletedata').html("");
$('#preguntadeletedata').html("Está seguro de eliminar éste usuario?");
var nombre=$(this).val();
 
if (nombre=="default-trial"){ $('#datadelete').val(""); 
$('#seedata').html("Éste usuario no se puede eliminar");}
else {    
    $('#seedata').html(nombre);
$('#datadelete').val(nombre);}
    
  });
        var Getuptime= function (e) { 
    
      $.ajax({
                url: "view/timeout.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {   

                swal.close();                 
          $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTabletimeout').DataTable({ responsive: true });       
                }
            });
     
       
    }


  


            var updateteuserslm= function(){
var comentario=$('#comentlimituptime').val();
               if (comentario==""){

       Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Por favor seleccione un comentario',
  
});  }
        else {

        
Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});

  $.ajax({
                url: "view/comtimeout.php",
                method: "POST",
                dataType: "html",
                data: {comentario:comentario},
                success: function (data) { swal.close();

             $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTabletimeout').DataTable({ responsive: true });
     Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Datos procesados</strong>',
  icon: 'success',
    timer:1500
  
  
});

          
                }
            });

 
    
  }}


   



    var obtenercomtimeout= function () { 
$('#errorremovecomlimitup').html("");
        
   $.ajax({ 
                url: "model/getcomentariostimeout.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {  
                    if(data==0) {

                   $('#errorremovecomlimitup').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> Error! No es posible conectar con el mikrotik</strong></div>');
                }

                else{ $('#errorremovecomlimitup').html('');
                                
       $('#comentlimituptime').replaceWith(data); 
                 }  
                                
          
                    
                     
                }
            });
     
       
    }




   $(document).on('change','#vendedoresperros2', function(){
  var valor = $(this).val();
   
    buscar_RB(valor);
   
});
    function buscar_RB(nombre){
   $.ajax({
                url: "model/totalventasvencidos.php",
                method: "POST",
                dataType: "json",
                data: {nombre: nombre},
                success: function (data) {
                         
          $('#netoventasvencidos').val(data);                        
          
         
           

          
                }
            });
}







     var obtenercomtimeoutvencidos= function () { 
$('#erroradcortevencidos').html('');
        
   $.ajax({ 
                url: "model/getcomentariostimeoutvencidos.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) { 
                if(data==0) {

                   $('#erroradcortevencidos').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> Error! No es posible conectar con el mikrotik</strong></div>');
                }

                else{$('#erroradcortevencidos').html('');
                                
          $('#vendedoresperros2').replaceWith(data); 
                 }   
                     
                }
            });
     
       
    }


 $(document).on('keyup','#porcentaje2', function(){
  var valor = $(this).val();
   
  var total= $('#netoventasvencidos').val();
 

 $('#comision2').val(total/100*valor);

  $('#diferencia2').val(total-(total/100*valor));
   
});
 
       var agregarcortevencidos = function () {
    $("#Formaddcortevencidos").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize(); 
  Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});   
    $.ajax({
            type: 'POST',
            url: 'model/agregarcortevencidos.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,           
            success: function(data){ 
 
            Swal.fire({  
     confirmButtonText:
    'Aceptar',
  title: '<strong>Alerta!</strong>',
  icon: 'info',
  html: data,  
});
       $('#Formaddcortevencidos').trigger("reset");    
          Getuptime();
          leerventas();
   
      }
      
        });

    
    });  
  
  }
