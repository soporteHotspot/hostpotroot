$(document).ready(function () {
        
       botones();
       Eliminardata();
       regbtn();
 editbtn();
 
    });

 
   var Mostrardatadelete = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscardatabtn.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
          $('#datadelete').val(data.id);
           $('#seedata').html(data.nombre); 
          $('#titledelete').html(' Eliminar botón tpv'); 
          $('#preguntadeletedata').html(' Está seguro de eliminar el siguiente botón?');                                    
         
                }
            });
        }
    }
  


  var Eliminardata = function () {

    $('#Formdeletedata').submit(function (e) {

            e.preventDefault();

             var sindato=$('#datadelete').val();

     if(sindato==""){

          Swal.fire({ confirmButtonText:
                  'Aceptar',
                 
                title: '<strong>Error!!</strong>',
                icon: 'error',
               text:   'Seleccione un registro para procesar petición', 
                
                
              });  } 
            else {

              
            $("#submitdeletedata").prop('disabled', true); 
             $("#submitdeletedata").html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>  Espere');
      Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
}); var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/removebtnreg.php",
                data: datos,
                success: function (data) { 
                   if (data==1){ $('.modal').modal('hide');
   Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Registro eliminado  </strong>',
  icon: 'success',
    timer:1500
  
  
}); $('#Formadeletehost').trigger("reset");           

            $("#submitdeletedata").prop('disabled', false); 
            $("#submitdeletedata").html('Confirmar'); 
             $("#seedata").html('Eliminado'); 
             $('#datadelete').val("");          
          botones();
          }

    else if (data==2){
                       $("#submitdeletedata").prop('disabled', false); 
                       $("#submitdeletedata").html('Confirmar');                   
                     Swal.fire({ confirmButtonText:
                  'Aceptar',
                 
                title: '<strong>Error!!</strong>',
                icon: 'error',
               text:   'No se encontraron registros relacionados con la elección', 
                
                
              });  $('#Formdeletedata').trigger("reset");
                       $("#seedata").html('Error!');  
          }
    else   if (data==3){
                        $("#submitdeletedata").prop('disabled', false);    
                        $("#submitdeletedata").html('Confirmar');                     
                     Swal.fire({ confirmButtonText:
                  'Aceptar',
                 
                title: '<strong>Error!!</strong>',
                icon: 'error',
               text:   'Error de conexion', 
                
                
              }); $('#Formdeletedata').trigger("reset");
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
   
  


  var Mostraridbotonedit = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscardatabtn.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
          $('#idbntedit').val(data.id);
           $('#nombrebtnedit').val(data.nombre);                                    
           $('#servidorbtnedit2').val(data.server);  
           $('#perfilbtnedit2').val(data.perfil);  
           $('#tiempobtnedit').val(data.tiempo);  
           $('#preciobtnedit').val(data.precio);  
           $('#tipobtnedit').val(data.tipo);  
           $('#longitudbtnedit').val(data.legend); 
            $('#btnsucursales6').val(data.idsucursal); 
           $('#submitbtnventas').html("Guardar");  
           
         
                }
            });
        }
    }
  
  

 
  

        
   
        var botones= function (e) {  $.ajax({
                url: "view/inputs.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTablerouter').DataTable({ responsive: true });       
                }
            });
     
       
    }


  




    var editbtn = function () {
        $('#Formeditbtn').submit(function (e) {
            e.preventDefault();
      Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Validando datos</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});var datos = $(this).serialize();
 
            $.ajax({
                type: "POST",
                url: "model/updatebtn.php",

                data: datos,
                dataType:'json',
                success: function (data) {


    if(data==1)
          {  botones(); $('.modal').modal('hide');
        
                  $('#Formeditbtn').trigger("reset");    

                                Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
  title: '<strong>Datos actualizados correctamente</strong>',
  icon: 'success',
  html:   '<strong>Excelente</strong>',  
  timer:1500,
  
});

                              }    

                                if(data==3)
          {  botones();
        
                  $('#Formeditbtn').trigger("reset");    

                                Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
  title: '<strong>Datos no  procesados</strong>',
  icon: 'error',
  html:   '<strong>Error!</strong>',  
  
  
});

                              }      
      



                    
                }
        
            });
        
        });
    } 

    var regbtn = function () {
        $('#Formaddbtn').submit(function (e) {
            e.preventDefault();
             $("#submitbtnventa").prop('disabled', true);
Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Validando datos</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/agregarbtn.php",
                data: datos,
                 dataType: "json",  
                success: function (data) {

 if(data==3)

    { Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ya existe un registro con la misma descripcion y mikrotik ingresada',
  
});
  $("#submitbtnventa").prop('disabled', false);
}

          else  if(data==7)

    { Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Los datos no se procesaron correctamente',
  
});
  $("#submitbtnventa").prop('disabled', false);
}

 else  if(data==5)

    { botones(); 
      Swal.fire({
   
  icon: 'success',
  title: 'Datos  agergados al sistema',
  showConfirmButton: false,
  timer: 1000
});

                  
 $('#Formaddbtn').trigger("reset"); 

        
}
                        
                }
        
            });
        }, 1000);
        });
    } 
       
   $('#loadserverbtn').click(function(event) {
    event.preventDefault();
  
  
   $.ajax({ 
                url: "view/nombreserverbtn.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                      if(data==0) {

                   $('#erroradbtn').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> Error! No es posible conectar con el mikrotik</strong></div>');
                }

                else{ $('#erroradbtn').html('');
                                
       $('#servidorbtnedit').replaceWith(data); 
                 }  
                  
                     
            
                }
            });
      
      
      
});


      $('#loadperfilesbtn').click(function(event) {
    event.preventDefault();
  
  
   $.ajax({ 
                url: "view/nombreperfilesbtn.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                      if(data==0) {

                   $('#erroradbtn').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> Error! No es posible conectar con el mikrotik</strong></div>');
                }

                else{ $('#erroradbtn').html('');
                                
      $('#perfilbtnedit').replaceWith(data); 
                 }  
                  
                     
            
                }
            });
      
      
      
});
   $('#loadserverbtn2').click(function(event) {
    event.preventDefault();
  
  
   $.ajax({ 
                url: "view/nombreserverbtn2.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
             $('#servidorbtnedit2').replaceWith(data);         
            
                }
            });
      
      
      
});


      $('#loadperfbtn2').click(function(event) {
    event.preventDefault();
  
  
   $.ajax({ 
                url: "view/nombreperfilesbtn2.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
             $('#perfilbtnedit2').replaceWith(data);         
            
                }
            });
      
      
      
});


          $('#updatesucursal2').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "model/getnamesucursales2.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                 if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}) }   
                else {
                                
                
          $('#btnsucursales2').replaceWith(data); 
                 }  
            
          
                    
                }
            });
});
    $('#updatesucursal6').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "model/getnamesucursales6.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                 if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}) }   
                else {
                                
                
          $('#btnsucursales6').replaceWith(data); 
                 }  
            
          
                    
                }
            });
});
