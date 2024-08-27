$(document).ready(function () { DeleteVentas();
         
       Ventas();
       Eliminardata();
       
 
    });

 
  
  
  
 
   
        var Ventas= function (e) { 
    
    
        
    $.ajax({
                url: "view/ventas.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {   
            swal.close();          
          $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTablerouter').DataTable({ responsive: true });       
                }
            });
     
       
    }

        var estadistica= function (e) { 
    
    
    Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Cargando estadística</strong>',
  icon: 'info',
    
  
  
});  $.ajax({
                url: "view/estadisticaventas.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {  
                     Swal.fire({
   
  icon: 'success',
  title: 'Datos cargados',
  showConfirmButton: false,
  timer: 1000
})   ;                
          $('#contbody').html(data);            
            $('#loader').html("");                     
                 
                }
            });
     
       
    }


  




           $('#updatevendedor').click(function(event) {
            $('#updatevendedor').html('<i class="fa fa-sync  fa-spin  fa-fw  "></i> '); 
    event.preventDefault();   
   $.ajax({ 
                url: "model/getvendedoresventas.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                          $('#updatevendedor').html('<i class="fa fa-sync   "></i> '); 
          $('#vendedores').replaceWith(data);    
          
                    
                }
            });
});



 

var Mostrardatadelete = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscarventa.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
          $('#datadelete').val(data.id);
           $('#seedata').html(data.user); 
          $('#titledelete').html(' Eliminar venta'); 
          $('#preguntadeletedata').html(' Está seguro de eliminar la siguiente venta');                                    
         
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
confirmButtonColor: 'red',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Seleccione un usuario</strong>',
  icon: 'error',
    
  
  
});  
            } 
            else {

              
            $("#submitdeletedata").prop('disabled', true); 
             $("#submitdeletedata").html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>  Espere');
      Swal.fire({ iconHtml: '<div class="spinner-grow text-warning "></div>',
confirmButtonColor: '#E1B70D',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Borrando seleccion espere...</strong>',
  icon: 'warning',
    
  
  
});    var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/deletevent.php",
                data: datos,
                success: function (data) { 
                   if (data==1){
            $('#errordeletedata').html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Registro eliminado exitosamente</strong></div>');
            $('#Formadeletehost').trigger("reset");           

            $("#submitdeletedata").prop('disabled', false); 
            $("#submitdeletedata").html('Confirmar'); 
             $("#seedata").html('Eliminado'); 
             $('#datadelete').val("");          
          Ventas();
         leerventas();
          }

    else if (data==2){
                       $("#submitdeletedata").prop('disabled', false); 
                       $("#submitdeletedata").html('Confirmar');                   
                      Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Usuario no registrado!',
  
}); $('#Formdeletedata').trigger("reset");
                       $("#seedata").html('Error!');  
          }
    else   if (data==3){
                        $("#submitdeletedata").prop('disabled', false);    
                        $("#submitdeletedata").html('Confirmar');                     
                          Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});$('#Formdeletedata').trigger("reset");
                        $("#seedata").html('Error!');

          }
          else {
            $("#submitdeletedata").prop('disabled', false);
            $("#submitdeletedata").html('Confirmar'); 
           Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: data,
  
});
            $('#Formdeletedata').trigger("reset");
            $("#seedata").html('Error!');
          
          }
   
          
         
            
          
                }
        
        
        
            });
      
      }, 1000);}
        });
    }  
   
 

      var DeleteVentas = function () {
        $('#Formdeleteventasv').submit(function (e) {
            e.preventDefault();     
      Swal.fire({ iconHtml: '<div class="spinner-grow p-2 text-warning "></div>',
confirmButtonColor: '#E1B70D',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Borrando registros en la base de datos espere...</strong>',
  icon: 'warning',
    
  
  
});   var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/deleteventasv.php",
                data: datos,
                success: function (data) {
                    swal.close();
         
         Ventas();
         leerventas();
        $('#errordeleteventasv').html(data);                
        $('#Formdeleteventasv').trigger("reset");         
                }
        
        
        
            });
      
      }, 1000);
        });
    } 