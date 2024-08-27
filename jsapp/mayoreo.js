

$(document).ready(function () {
        
      cargardatoscards();
       agregarcards();
Eliminardata();
Updatecard();
    });

 
 
 

var Mostrardatadelete = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscadatoscard.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
          $('#datadelete').val(data.id);
           $('#seedata').html(data.descripcion); 
          $('#titledelete').html(' Eliminar registro'); 
          $('#preguntadeletedata').html(' Está seguro de eliminar la siguiente registro para mayoreos?');                                    
         
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
  text: 'Seleccione un registro pra procesar la petición',
  
});  } 
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
                url: "model/deletedatoscard.php",
                data: datos,
                success: function (data) { 
                   if (data==1){  $('.modal').modal('hide');
                Swal.fire({
   
  icon: 'success',
  title: 'Proceso terminado con éxito',
   
  timer: 1000
});
$('#Formadeletehost').trigger("reset");           

            $("#submitdeletedata").prop('disabled', false); 
            $("#submitdeletedata").html('Confirmar'); 
             $("#seedata").html('Eliminado'); 
             $('#datadelete').val("");          
          cargardatoscards();
          }

    else if (data==2){
                       $("#submitdeletedata").prop('disabled', false); 
                       $("#submitdeletedata").html('Confirmar');                   
                        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se encontraron registros relacionados con la petición',
  
}); $('#Formdeletedata').trigger("reset");
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
   
 

     var agregarcards= function () {
        $('#Formgenerarusuarios').submit(function (e) {
            e.preventDefault();
      $("#submitreg").prop('disabled', true);
Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Validando datos</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregarcard.php",
                data: datos,
                 dataType: "json",
                success: function (data) {   

                  if(data==3)

    { Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ya existe un registro con la misma descripcion y mikrotik ingresada',
  
});
  $("#submitreg").prop('disabled', false);
}

          else  if(data==7)

    { Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Los datos no se procesaron correctamente',
  
});
  $("#submitreg").prop('disabled', false);
}

 else  if(data==5)

    { Swal.fire({
   
  icon: 'success',
  title: 'Datos  agergados al sistema',
  showConfirmButton: false,
  timer: 1000
});

  cargardatoscards();
        
 
$("#submitreg").prop('disabled', false);

        
}
        
          
          
         
            
          
                }
        
            });
        
        });
    }

     

   var Updatecard = function () {
        $('#Formeditcards').submit(function (e) {
      
            e.preventDefault();     
   Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Validando datos</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});var datos = $(this).serialize();
   

            $.ajax({
                type: "POST",
                url: "model/updatecard.php",
                dataType:"json",
                data: datos,
                success: function (data) {

                	if(data==1)
          { cargardatoscards();
                      
                        $('.modal').modal('hide');
                            $('#Formeditcards').trigger("reset");  

                                Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
  title: '<strong>Datos procesados correctamente</strong>',
  icon: 'success',
  html:   '<strong>Excelente</strong>',  
  
  
});

                              }    

                              	if(data==3)
          { cargardatoscards();
                      
                        
                            $('#Formeditcards').trigger("reset");  

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

    

      var cargardatoscards= function () { 
 $.ajax({ 
                url: "view/datoscards.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {  
                $('#loader').html("");                  
          $('#contbody').html(data); 
           $('#dataTablecards').DataTable({ responsive: true });            
                     
                }
            });
     
       
    }


  
 
  $('#updateservers').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/nombreservhotpot.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                 if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
})        } else {
                                
                
          $('#servers').replaceWith(data); 
                 }  
            
          
                    
                }
            });
});
   


    $('#updateperfil').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/nombreperfiles.php",
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
                                
                
          $('#btnprofile').replaceWith(data); 
                 }  
            
          
                    
                }
            });
});

    $('#updatesucursal').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "model/getnamesucursale.php",
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
                                
                
          $('#btnsucursales').replaceWith(data); 
                 }  
            
          
                    
                }
            });
});


          $('#updatesucursal5').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "model/getnamesucursales5.php",
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
                                
                
          $('#btnsucursales5').replaceWith(data); 
                 }  
            
          
                    
                }
            });
});



 
   var Mostraridcard1 = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscadatoscard.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
                                             
          $('#idcardedit').val(data.id); 
          $('#btnsucursales5').val(data.idsucursal); 

          $('#servidorcard').val(data.server);
          $('#perfilcard').replaceWith('<input id="perfilcard" type="text" required name="perfil" class="form-control" value="'+data.profile+'" placeholder="Perfil" >');            
          $('#preciocard').val(data.comment);
          $('#tiempocard').val(data.limituptime);
          $('#descripcioncard').val(data.descripcion);
           
           
          
           
                }
            });
        }
    }
 
   

       $('#updatecardedit').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/getperfilescard.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                          
          $('#perfilcard').replaceWith(data);     
          
                    
                }
            });
});
 
  
      
 

