$(document).ready(function () {
        agregarcorte();
       Cortes();
       Eliminardata();
        
    });



    var Mostrardatadelete = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscarcorte.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
          $('#datadelete').val(data.id);
           $('#seedata').html(data.cantidad +" "+data.vendedor); 
          $('#titledelete').html(' Eliminar corte'); 
          $('#preguntadeletedata').html(' Está seguro de eliminar el siguiente corte?');                                    
         
                }
            });
        }
    }
  
  var Eliminardata = function () {

    $('#Formdeletedata').submit(function (e) {

            e.preventDefault();

             var sindato=$('#datadelete').val();

     if(sindato==""){
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Por favor seleccione un registro para realizar la petición',
  
});
            } 
            else {
 Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});
              
            $("#submitdeletedata").prop('disabled', true); 
             $("#submitdeletedata").html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>  Espere');
     
      var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/removercorte.php",
                data: datos,
                success: function (data) { 
                   if (data==1){ $('.modal').modal('hide');
               Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Datos eliminados </strong>',
  icon: 'success',
    timer:2000
  
  
});
            $('#Formadeletehost').trigger("reset");           

            $("#submitdeletedata").prop('disabled', false); 
            $("#submitdeletedata").html('Confirmar'); 
             $("#seedata").html('Eliminado'); 
             $('#datadelete').val("");          
         Cortes();
          }

    else if (data==2){ Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Datos no encontrados en sistema',
  
});
                       $("#submitdeletedata").prop('disabled', false); 
                       $("#submitdeletedata").html('Confirmar');                   
                    
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
 
 

   
        var Cortes= function (e) { 
    
    
        
    $.ajax({
                url: "view/cortes.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) { swal.close();                 
          $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTablecortes').DataTable({ responsive: true });       
                }
            });
     
       
    }
    var leercorte = function () {      
            $.ajax({
                url: "model/leerventas.php",
                method: "POST",
                dataType: "json",               
                success: function (data) {          
                $('#netoventas').val(data);

                }
            });        
    }

 
  var agregarcorte= function () {
        $('#Formaddcorte').submit(function (e) {
            e.preventDefault();
             $("#submitaddcorte").prop('disabled', true);
 Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});var datos = $(this).serialize();
   
            $.ajax({
               type: "POST",
                url: "model/agregarcorte.php",
                data: datos,
                 dataType: "json",
                success: function (data) {
 //console.log(data);

 if(data==3)

    { Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ya existe un registro con la misma descripcion y mikrotik ingresada',
  
});
  $("#submitaddcorte").prop('disabled', false);
}

          else  if(data==7)

    { Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Los datos no se procesaron correctamente',
  
});
  $("#submitaddcorte").prop('disabled', false);
}

 else  if(data==5)

    { leerventas();  Cortes();
      Swal.fire({
   
  icon: 'success',
  title: 'Datos  agregados al sistema',
  showConfirmButton: false,
  timer: 1000
});
 $("#submitaddcorte").prop('disabled', false);
                  
 $('#Formaddcorte').trigger("reset"); 

        
}
                        
                }
        
            });
         
        });
    } 
  
      




   $(document).on('change','#vendedorperro', function(){
  var valor = $(this).val();
  var mikrotik = $('#mikrotikid').val();
   
   $.ajax({
                url: "model/totalventasvendedor.php",
                method: "POST",
                dataType: "json",
                 data: {'nombre': valor, 'mikrotik': mikrotik},
                success: function (data) {
                         
          $('#netoventas').val(data);                        
          
         
           

          
                }
            });
   
});
     


 $(document).on('keyup','#porcentaje', function(){
  var valor = $(this).val();
   
  var total= $('#netoventas').val();
 

 $('#comision').val(total/100*valor);

  $('#diferencia').val(total-(total/100*valor));
   
});
 

 
