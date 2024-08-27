
$(document).ready(function () {
editarperfil();        
perfileshp();
agregarperfilMikroTik();
Deleteprofilmikrotik();
    });


        var agregarperfilMikroTik = function () {

              
        $('#FormaddProfile').submit(function (e) {
                    e.preventDefault();
 
         if( $('#checkt').is(':checked') ) {
$("#submitprofile").prop('disabled', true);

var token=$.trim($("#token").val());
var idchat=$.trim($("#idchat").val());
if(token.length==0)
{
   
    $("#submitprofile").prop('disabled', false);
    $('#erroradperfil').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong >Por favor ingrese token de bot</strong></div>');
     return false;
}  
                
if(idchat.length==0)
{
    
    $("#submitprofile").prop('disabled', false);
    $('#erroradperfil').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong >Por favor ingrese chat id</strong></div>');
    return false;
}  
    
               
 

$("#submitprofile").prop('disabled', true);      
$('#erroradperfil').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> agregando perfil</strong></div>'); 
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregarperfiltelegram.php",
                data: datos,
                success: function (data) { 
        setTimeout(function(){
          
          if (data==1){
        $('#erroradperfil').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Perfil registrado correctamente</strong></div>');    
        $('#FormaddProfile').trigger("reset");     
                $("#submitprofile").prop('disabled', false);
         perfileshp();
        }
else {
$("#submitprofile").prop('disabled', false);
$('#erroradperfil').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error al agregar perfil verifique sus datos</strong></div>');  
}       
}, 1000);         
                }
        
            });
        



               
     
}
else {
$("#submitprofile").prop('disabled', true);      
$('#erroradperfil').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> agregando perfil</strong></div>'); 
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregarperfil.php",
                data: datos,
                success: function (data) { 
        setTimeout(function(){
          
          if (data==1){
        $('#erroradperfil').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Perfil registrado correctamente</strong></div>');    
        $('#FormaddProfile').trigger("reset");     
                $("#submitprofile").prop('disabled', false);
         perfileshp();
        }
else {
$("#submitprofile").prop('disabled', false);
$('#erroradperfil').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error al agregar perfil verifique sus datos</strong></div>');  
}       
}, 1000);         
                }
        
            });}
        
        });
    }

        var perfileshp= function (e) { 
    
    
        
    $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando perfiles hotspot</strong></div>'); 
            $.ajax({
                url: "view/profile.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
          $('#loader').html("");                    
          $('#dataTableperfiles').DataTable({ responsive: true });    
         
                }
            });
     
       
    }
  $(document).on('click', '.nombredeperfil', function(e){
    e.preventDefault();
    $('#errordeleteperfilhp').html("");
    var nombre=$(this).val();
    
    
    if (nombre=="default"){ $('#nombreP').val("");
    $('#nameperfil').html("Éste perfil no se puede eliminar");}
    else {
        $('#nameperfil').html(nombre);    
    $('#nombreP').val(nombre);
    
    }
  });
  
  
          var Deleteprofilmikrotik = function () {
        $('#Formdeleteperfilhp').submit(function (e) {
            e.preventDefault();     
      $('#errordeleteperfilhp').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Procesando <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
      var datos = $(this).serialize();
      setTimeout(function(){

            $.ajax({
                type: "POST",
                url: "model/deleteperfil.php",
                data: datos,
                success: function (data) {
          
          if (data==1){
            $('#errordeleteperfilhp').html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Perfil eliminado exitosamente</strong></div>');
            $('#Formdeleteperfilhp').trigger("reset");
            $('#usernameu').html(""); 
            perfileshp();
          }
          
          else if (data==2){
            $('#errordeleteperfilhp').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> El Perfil ya no  se encontró </strong></div>');
            $('#Formdeleteperfilhp').trigger("reset");
          }
      else if (data==3){
            $('#errordeleteperfilhp').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Error de conexión</strong></div>');
            $('#Formdeleteperfilhp').trigger("reset");
          }
          else {
                  $('#errordeleteperfilhp').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Error! el perfil elegido posiblemente no se puede eliminar</strong></div>');
          $('#Formdeleteperfilhp').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }
  
    $(document).on('click', '.mostrardataprofile', function(e){
    e.preventDefault();

    var id=$(this).attr('id'); 
    var nombre=$(this).val();
       var parametro = {
                "nombre" : nombre,
                
        };
      
     $.ajax({ data: parametro,
                url: "model/obtenerdatosprofil.php",
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
 $('#nombreprofileedit1').val(data.nombre);
 $('#nombreprofileedit2').val(data.nombre);
  $('#nusuariosp').val(data.usuarios);
   $('#velocidadprofile').val(data.velocidad);
   $('#cookieprofile').val(data.cookie); 
   
 $('#Modaleditprofilehp').modal("show");
 
 }
          
      }
            }); 
    

     
    
  }); 


      var editarperfil = function () {
        $('#Formeditprofilehp').submit(function (e) {
            e.preventDefault();
      $("#submiteditprofilehp").prop('disabled', true);
$('#erroreditprofilehp').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Procesando espere...</strong></div>'); 
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/actualizarperfilhp.php",
                data: datos,
                success: function (data) { 
               
          
          if (data==1){
        $('#erroreditprofilehp').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Perfil editado correctamente</strong></div>');     
        $('#Formeditprofilehp').trigger("reset");    
                $("#submiteditprofilehp").prop('disabled', false);
          perfileshp();
        }


         else if (data==2){
        $('#erroreditprofilehp').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Error! de conexioón</strong></div>');     
            
                $("#submiteditprofilehp").prop('disabled', false);
           
        }
else {
$("#submiteditprofilehp").prop('disabled', false);
$('#erroreditprofilehp').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error! al procesar datos</strong></div>');   
}       
          
                }
        
            });
        
        });
    }