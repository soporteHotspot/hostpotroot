
$(document).ready(function () {
        agregarusuariosmikro();
        usuariosmikrotik();
       Removeusermikrotik();
       agregargrupo();
       agregarpuerto();
       editarusers();

       Cambiarestadousers();

    });
        var usuariosmikrotik= function (e) { 
    
          $.ajax({
                url: "view/usuariosmikrotik.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                
          $('#contbody').html(data);            
          $('#loader').html("");                    
          $('#dataTableCookie').DataTable({ responsive: true });    
         
                }
            });
     
       
    }

    $(document).on('click', '.removerkookie', function(e){
    e.preventDefault();
    var nombre=$(this).val();   
    $('#errorremovecookiehp').html("");
       $('#nombrecookieactivo').val(nombre); 
       $('#nombrecookie').html(nombre); 
    
  });  
      
       $(document).on('click', '.removeruseractiePPPoE', function(e){
    e.preventDefault();
    var nombre=$(this).val();   
    $('#errorremoveruserpppoe').html("");
       $('#nombreactivepppoe').val(nombre); 
       $('#nombreuserppoe').html(nombre); 
    
  });  
            var Removeusermikrotik = function () {
        $('#Formdeleteusermikrotik').submit(function (e) {
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
                url: "model/removeusermikrotik.php",
                data: datos,
                success: function (data) {
          
          if (data==1){  $('.modal').modal('hide');
           Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Usuario eliminado de MikroTik</strong>',
  icon: 'success',
    timer:1500
  
  
});
$('#Formdeleteusermikrotik').trigger("reset");
            $('#usernameu').html("");  
            usuariosmikrotik();       
          }
          
          else if (data==2){
              Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! el usuario no figura en MikroTik',
  
});$('#Formdeleteusermikrotik').trigger("reset");
          }
      else if (data==3){
              Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});$('#Formdeleteusermikrotik').trigger("reset");
          }
          else {
            Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: data,
  
});$('#Formdeleteusermikrotik').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }
  


     $(document).on('click', '.mostrarusermik', function(e){
e.preventDefault();
$('#errordeleteusermik').html("");
var nombre=$(this).val();
localStorage.setItem("nombre", nombre);


    
    $('#mostrarnombremuserm').html(nombre);
$('#nombreusuariomikrotik').val(nombre);
    
  });

    $('#updategrupo').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/obtenergruposusuarios.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {  

                   if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}) }   else               
         {                
          $('#gruporb').replaceWith(data);                     
          
                     
                }}
            });
});

    $('#updategrupo2').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/obtenergruposusuarios2.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {

                if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:false,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}) }   else               
         { $('#grupousermikrotik').replaceWith(data);}                     
          
                     
                }
            });
});

    var agregarpuerto = function () {
        $('#Formasetport').submit(function (e) {
            e.preventDefault();
      $("#submitsetport").prop('disabled', true);
Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Actualizando puerto API</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/updateport.php",
                data: datos,
                success: function (data) { 
        setTimeout(function(){
          
          if (data==1){  $('.modal').modal('hide');
       Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Excelente puerto actualizado</strong>',
  icon: 'success',
 html:   '☻',  
  
}); $('#Formasetport').trigger("reset");    
                $("#submitsetport").prop('disabled', false);
          usuariosmikrotik();
        }
else {
$("#submitsetport").prop('disabled', false);
  Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
 
  
  
});
}       
}, 1000);         
                }
        
            });
        
        });
    }


      var editarusers = function () {
        $('#Formeditusuariosrb').submit(function (e) {
            e.preventDefault();
      $("#submiteditum").prop('disabled', true);
Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
});var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/actualizaruser.php",
                data: datos,
                success: function (data) { 
               
          
          if (data==1){  $('.modal').modal('hide');
            Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Datos actualizdos</strong>',
  icon: 'success',
    timer:1500
  
  
});$('#Formeditusuariosrb').trigger("reset");    
                $("#submiteditum").prop('disabled', false);
          usuariosmikrotik();
        }


         else if (data==2){
          Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});    $("#submiteditum").prop('disabled', false);
           
        }
else {
$("#submiteditum").prop('disabled', false);
   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error al procesar datos',
  
});}       
          
                }
        
            });
        
        });
    }

        var agregargrupo = function () {
        $('#Formaddgroup').submit(function (e) {
            e.preventDefault();
      $("#submitaddgroup").prop('disabled', true);
Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando dato</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregargrupotomikrotik.php",
                data: datos,
                success: function (data) { 
        setTimeout(function(){
          
          if (data==1){  $('.modal').modal('hide');
        Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Excelente grupo agregado al MikroTik</strong>',
  icon: 'success',
 html:   '☻',  
  
});
        $('#Formaddgroup').trigger("reset");    
                $("#submitaddgroup").prop('disabled', false);
          usuariosmikrotik();
        }
else {
$("#submitaddgroup").prop('disabled', false);
Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
 
  
  
});
}       
}, 1000);         
                }
        
            });
        
        });
    }


        var agregarusuariosmikro = function () {
        $('#Formaddusuariorb').submit(function (e) {
            e.preventDefault();
      $("#submitaduu").prop('disabled', true);
Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
});var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregarusuariosmikrotik.php",
                data: datos,
                success: function (data) { 
        setTimeout(function(){
          
          if (data==1){  

        Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Excelente proceso terminado</strong>',
  icon: 'success',
  timer:1500
  
  
  
});$('#Formaddusuariorb').trigger("reset");    
                $("#submitaduu").prop('disabled', false);
          usuariosmikrotik();
        }
else {
$("#submitaduu").prop('disabled', false);
   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Datos no procesados',
  
});}       
}, 1000);         
                }
        
            });
        
        });
    }

            var Deleteuser= function () {
           $('#Formdeleteperfilppp').submit(function (e) {
            e.preventDefault();     
       Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
});
       var datos = $(this).serialize();
 

            $.ajax({
                type: "POST",
                url: "model/deleteperfilPpp.php",
                data: datos,
                success: function (data) {
          
          if (data==1){   $('.modal').modal('hide');
            $('#errordeleteperfipppp').html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Perfil eliminado exitosamente</strong></div>');
            $('#Formdeleteperfilppp').trigger("reset");
            $('#nameperfilpppoe').html("");           
            profilepppoe();
          }
      else if (data==3){
            $('#errordeleteperfipppp').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Error de conexión</strong></div>');
            $('#Formdeleteperfilppp').trigger("reset");
          }
          else {
                  $('#errordeleteperfipppp').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Error! el perfil elegido posiblemente no se puede eliminar</strong></div>');
          $('#Formdeleteperfilppp').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
    
        });
    }



 
 
            


 $(document).on('click', '.mostrarusermeditm', function(e){
    e.preventDefault();

    var id=$(this).attr('id'); 
    var nombre=$(this).val();
       var parametro = {
                "username" : id,
                
        };
      
     $.ajax({ data: parametro,
                url: "model/obtenerdatosusers.php",
                method: "POST",
                dataType: "json",               
                success: function (data) { 
                    if (data==3){
Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
})

  }

  else                if (data==2){
Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! El usuario no figura el mikrotik </strong>',  
  
  
})

  }

                    else{
 $('#nombreeditmikrotik21').val(data.user);
$('#nombreeditmikrotik22').val(data.user);
$('#grupousermikrotik').val(data.group);
$('#comentusermikrotik').val(data.comment);
$('#Modaledituserm').modal("show");
 
 }
          
      }
            }); 
    

     
    
  }); 


 $(document).on('click', '.mostrarusermikdeleteM', function(e){
    e.preventDefault();

    
    var datausername=$(this).attr('id');
   
    
$('#errordeleteusermik2').html("");  
  
$('#mostrarnombremuserm2').html(datausername);   
$('#nombreusuariomikrotik2').val(datausername); 
   

     
    
  }); 



 $(document).on('click', '.mostrardatacambio2', function(e){
    e.preventDefault();

    
    
    var estatus=$(this).val(); 
    var nombre=$(this).attr('id') 
    localStorage.setItem("nombre", nombre);
    localStorage.setItem("estado", estatus);
$('#errorcambioestado').html("");  
 $('#estadocambiar').val(estatus);
$('#dataacambiar').val(nombre);   
   

    if (estatus=="true"){
     $('#estadoactualdata').html("Deshabilitado");  
       $('#ask2').html("Está seguro de habilitar el siguiente usuario hotspot?");   }

     if (estatus=="false"){
     $('#estadoactualdata').html("Habilitado");
     $('#ask2').html("Está seguro de deshabilitar el siguiente usuario hotspot?");    }

      if (estatus=="Eliminado"){
       $('#estadoactualdata').html("El usuario ya fue eliminado");
     $('#ask2').html("Eliminado");   

     }

     
    
  }); 





     var Cambiarestadousers = function () {
        $('#Formdces').submit(function (e) {
            e.preventDefault();     
    Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
});var datos = $(this).serialize();
       
            $.ajax({
                type: "POST",
                url: "model/disabledusermikrotik.php",
                data: datos,
                success: function (data) {
            if (data==1){  
         $('#Formdcestadouhp').trigger("reset"); 
         
        var boton = localStorage.getItem("nombre");
        var estadoanterior= localStorage.getItem("estado");


        if(estadoanterior=="true"){      Swal.fire({
   
  icon: 'success',
  title: 'Usuario Habilitado',
   
 confirmButtonColor: "#3085d6",
 
  confirmButtonText: "Aceptar"
})   ;

         $('#'+boton).removeClass("btn-danger");
         $('#'+boton).html("Deshabilitar");
         
         $('#'+boton).val("false");
         $('#'+boton).addClass("btn-success");
          $('#estadoactualdata').html("Habilitado");
        }
        if(estadoanterior=="false"){
 Swal.fire({
   
  icon: 'success',
  title: 'Usuario Deshabilitado',
   confirmButtonColor: "#3085d6",
 
  confirmButtonText: "Aceptar"
   
})   ;
          $('#'+boton).removeClass("btn-success");
         $('#'+boton).html("Habilitar");
         $('#'+boton).val("true");
         $('#'+boton).addClass("btn-danger");
          $('#estadoactualdata').html("Deshabilitado");
        
        }
        }
        
          else if (data==2){
        $('#errorcambioestado').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa  fa-info" aria-hidden="true"></i> El secret NO FUE ENCONTRADO</strong></div>');    
        $('#Formdcestadouhp').trigger("reset");                
          
        }
        
          
          else if (data==3){
        $('#errorcambioestado').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa  fa-info" aria-hidden="true"></i> Error de conexión</strong></div>');    
        $('#Formdcestadouhp').trigger("reset");                
          
        }
        else {
        
              
                 $('#errorcambioestado').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa  fa-info" aria-hidden="true"></i> Error  inesperado, revice api</strong></div>');               
        $('#Formdcestadouhp').trigger("reset"); }

        
                }
        
        
        
            });
      
      
        });
    } 