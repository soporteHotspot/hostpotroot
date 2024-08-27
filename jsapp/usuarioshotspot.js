

$(document).ready(function () {
        Cambiarestadouhp();
        editarusershp();
      Eliminarlotes();
Deleteusermikrotik();
    });



     var Eliminarlotes= function () {
        $('#Formremovelotes').submit(function (e) {
      e.preventDefault();
      $("#submitdeletelotes").prop('disabled', true);
      $("#submitdeletelotes").html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>  Trabajando');
   Swal.fire({ iconHtml: '<div p-2 class="spinner-grow text-warning "></div>',
confirmButtonColor: '#E1B70D',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Borrando registros en MikroTik espere...</strong>',
  icon: 'warning',
    
  
  
});    
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/removelotesusuarios.php",
                data: datos,
                success: function (data) { 
                   if (data==1){
                    mostrarcomdel();
               Swal.fire({
                confirmButtonColor: '#108107',
  
  confirmButtonText: 'Aceptar',
  icon: 'success',
  title: 'Excelente',
  text: 'Usuarios eliminados', 
  timer:1500 
});
       $('#Formremovelotes').trigger("reset");           

            $("#submitdeletelotes").prop('disabled', false);
            $("#submitdeletelotes").html('Aceptar');
 
          }

    else if (data==2){$("#submitdeletelotes").prop('disabled', false);
                      $("#submitdeletelotes").html('Aceptar');
                      Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! datos no encontrador en el mikrotik',  
});
                       $('#Formremovelotes').trigger("reset");
          }
    else   if (data==3){$("#submitdeletelotes").prop('disabled', false);
                        $("#submitdeletelotes").html('Aceptar');
                             Swal.fire({
                                showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión con MikroTik',  
});
                       $('#Formremovelotes').trigger("reset");
          }
          else {$("#submitdeletelotes").prop('disabled', false);
                $("#submitdeletelotes").html('Aceptar');
                        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! posiblemente el usuario seleccioando no se puede eliminar',  
});
                $('#Formremovelotes').trigger("reset");
          
          }
   
          
         
            
          
                }
        
            });
        
        });
    }



          var Deleteusermikrotik = function () {
        $('#Formdeleteuserhp').submit(function (e) {
      
            e.preventDefault(); 
             Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando</strong>',
  icon: 'info',
  html:   '<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>',  
  
  
});    
       
      var datos = $(this).serialize();
     

            $.ajax({
                type: "POST",
                url: "model/deleteuser.php",
                data: datos,
                success: function (data) {
          
          if (data==1){
           $('.modal').modal('hide'); 
             
            $('#usernameu').html("");
           var boton= localStorage.getItem("nombre");
             $('#'+boton).html("Eliminado");
              $('#'+boton).val("Eliminado");
             $('#'+boton).removeClass("btn-danger bnt-success");
             $('#'+boton).addClass("btn-dark");
             $('#'+boton).removeAttr('id');
             mostrarcomdel();


               Swal.fire({  showConfirmButton:true, confirmButtonText:
    'Aceptar',
  icon: 'success',
  title: 'Excelente',
  text: 'Usuarios eliminados',  
});
          }
          
          else if (data==2){
              Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! el usuario ya no figura en el mikrotik',  
});
            $('#Formdeleteuserhp').trigger("reset");
          }
      else if (data==3){
              Swal.fire({
                showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión con MikroTik',  
});
            $('#Formdeleteuserhp').trigger("reset");
          }
          else {
            Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! inesperado de sistema, reporte',  
});
          $('#Formdeleteuserhp').trigger("reset");
          
          }
          
                }
        
        
        
            });
       
        });
    }
    
$(document).on('click', '#updateusershp', function(e){
e.preventDefault();  
 $('#updateusershp').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');     
 Swal.fire({ iconHtml: '<div class="fa fa-user fa-fade  "></div>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Cargando usuarios hotspot  espere...</strong>',
  icon: 'info',
    
  
  
}); $.ajax({   cache:false,
               timeout:3000000,
                url: "view/users.php",
                type: "POST",
                dataType: "html",                 
                success: function (data) {
              
if(data=="error"){ $('#updateusershp').html('<i class="fa fa-sync   fa-fw"></i> ');  
Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  title: '<strong>Error!</strong>',
  icon: 'error',
  text:   'Error de conexión',  
  
  
});}
         else   {           swal.close(); 
         $('#updateusershp').html('<i class="fa fa-sync    "></i> ');           
                      $('#loader').html('');
                                $('#contbody').html(data); 
                      $('#dataTableusers').DataTable({ responsive: true }); }


                }
            });
    
  });  


   $(document).on('click', '.mostraridusuario', function(e){
e.preventDefault();
$('#errordeleteuserhp').html("");
var nombre=$(this).val();
localStorage.setItem("nombre", nombre);


if (nombre=="default-trial"){ $('#nombreusuario').val(""); 
$('#mostrarnombre').html("Éste usuario no se puede eliminar");}
else {    
    $('#mostrarnombre').html(nombre);
$('#nombreusuario').val(nombre);}
    
  });

      $('#updateservers').click(function(event) {
    event.preventDefault();

     $('#updateservers').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');    
   $.ajax({ 
                url: "view/nombreservhotpot.php",
                type: "POST",
                dataType: "html",                 
                success: function (data) {                          
          $('#servers').replaceWith(data);     
           $('#updateservers').html('<i class="fa fa-sync   "></i> '); 
                    
                }
            });
});


     
 

  
   


      $(document).on('click', '.mostrardatacambio', function(e){
    e.preventDefault();

  
    var estatus=$(this).val(); 
    var nombre=$(this).attr('id') 
    localStorage.setItem("nombre", nombre);
    localStorage.setItem("estado", estatus);
$('#errorcambioestadouser').html("");  
 $('#estadocambiaruser').val(estatus);
$('#dataacambiaruser').val(nombre);   
   

    if (estatus=="true"){ $('#divedeestadouser').html("Deshabilitado");
        $('#divedeestadouser').removeClass("bg-success");  $('#divedeestadouser').addClass("bg-danger");
   
       $('#askuser').html("Está seguro de habilitar el siguiente usuario hotspot?");   }

     if (estatus=="false"){$('#divedeestadouser').html("Habilitado"); $('#divedeestadouser').removeClass("bg-danger");  $('#divedeestadouser').addClass("bg-success");
  
     $('#askuser').html("Está seguro de deshabilitar el siguiente usuario hotspot?");    }

      if (estatus=="Eliminado"){
       $('#estadoactualdatauser').html("El usuario ya fue eliminado");
     $('#ask').html("Eliminado");   

     }

   
    
  }); 

  var mostrarcomdel= function()  { 



 
         $('#updatecom').html('<i class="fa fa-sync  fa-spin fa-fw"></i> ');    
   $.ajax({ 
                 url: "view/getcomentarioslotes.php",
                type: "POST",
                dataType: "html",                 
                success: function (data) { 

                     if(data==3){Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',    
});$('#updatecom').html('<i class="fa fa-sync    "></i> ');}   else

               { $('#comentariosdeletelotes').replaceWith(data);     
                                 
                $('#updatecom').html('<i class="fa fa-sync   "></i> ');}        
                     
                }
            });
     
       
    }

    

     var Cambiarestadouhp = function () {
        $('#Formddeshabilitar').submit(function (e) {
            e.preventDefault();     
     Swal.fire({ iconHtml: '<div class="spinner-grow text-info "></div>',
confirmButtonColor: '#12BBD3',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando petición espere...</strong>',
  icon: 'info',
    
  
  
});   var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/disableduserhp.php",
                data: datos,
                success: function (data) {

                    $(".modal").modal("hide");
            if (data==1){  
       
        $('#Formddeshabilitar').trigger("reset"); 
         
        var boton = localStorage.getItem("nombre");
        var estadoanterior= localStorage.getItem("estado");


        if(estadoanterior=="true"){ 
$('#divedeestadouser').removeClass("bg-danger");  $('#divedeestadouser').addClass("bg-success");
         $('#'+boton).removeClass("btn-danger");
         $('#'+boton).html("Deshabilitar");
         
         $('#'+boton).val("false");
         $('#'+boton).addClass("btn-success");
       Swal.fire({ 
confirmButtonColor: 'green',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Usuario habilitado</strong>',
  icon: 'success',
  timer:1500,
    
  
  
});
        }
        if(estadoanterior=="false"){
 $('#divedeestadouser').removeClass("bg-success");  $('#divedeestadouser').addClass("bg-danger");
          $('#'+boton).removeClass("btn-success");
         $('#'+boton).html("Habilitar");
         $('#'+boton).val("true");
         $('#'+boton).addClass("btn-danger");
      Swal.fire({ 
confirmButtonColor: 'green',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Usuario deshabilitado</strong>',
  icon: 'success',
  timer:1500,
    
  
  
});
        
        }
        }
        
          else if (data==2){
        Swal.fire({ 
confirmButtonColor: 'red',
     confirmButtonText:
    'Aceptar',
  title: '<strong>El usuario no figura en MikorTik</strong>',
  icon: 'error',
    
  
  
});     $('#Formddeshabilitar').trigger("reset");                
          
        }
        
          
          else if (data==3){
       Swal.fire({ 
confirmButtonColor: 'red',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Error de conexión</strong>',
  icon: 'error',
    
  
  
});   $('#Formddeshabilitar').trigger("reset");                
          
        }
        else {
        
              swal.close();
                                   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error aal procesar datos',
  
}); $('#Formddeshabilitar').trigger("reset"); }

        
                }
        
        
        
            });
      
      }, 1000);
        });
    }  


   


 $(document).on('click', '.mostrardatauserhp', function(e){
    e.preventDefault();
Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Obteniendo datos ...</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});
    var id=$(this).attr('id'); 
    var nombre=$(this).val();
       var parametro = {
                "username" : id,
                
        };
      
     $.ajax({ data: parametro,
                url: "model/obtenerdatosusersedit.php",
                type: "POST",
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

else{ swal.close(); 
$('#useredithp0').val(data.user);
$('#useredithp').val(data.user);
$('#pasedithp').val(data.password);
$('#perfilehp').val(data.perfil);
$('#tiempolimite').val(data.limituptime);
$('#comentuserhp').val(data.comment);
$('#Modaledituserhp').modal("show");
 }
          
      }
            }); 
    

     
    
  }); 


      $('#updateprofilehp').click(function(event) {
    event.preventDefault();

     $('#updateprofilehp').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');    
   $.ajax({ 
                url: "view/obtenerperfilesedit.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {

                 if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}); $('#updateprofilehp').html('<i class="fa fa-sync   "></i> '); }   else                             
          {$('#perfilehp').replaceWith(data);     
                      $('#updateprofilehp').html('<i class="fa fa-sync   "></i> ');} 
                    
                }
            });
});




          var editarusershp = function () {
        $('#Formeditusuarioshotspot').submit(function (e) {
            e.preventDefault();
      $("#submitedithpot").prop('disabled', true);
  Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/actualizaruserhp.php",
                data: datos,
                success: function (data) { 
               
          
          if (data==1){ $('.modal').modal('hide'); 
               Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Datos actualizados </strong>',
  icon: 'success',
 
  
});$('#Formeditusuarioshotspot').trigger("reset");    
                $("#submitedithpot").prop('disabled', false);
          
        }


         else if (data==2){
                                  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});    
            
                $("#submitedithpot").prop('disabled', false);
           
        }
else {
$("#submitedithpot").prop('disabled', false);
                            Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error aal procesar datos',
  
}); 
}       
          
                }
        
            });
        
        });
    }



  $("#toggleuh").change(function(){   
  if($(this).is(':checked')){    
   $("#pasedithp").attr("type","text");   
    
  }else{ 
   $("#pasedithp").attr("type","password");   
  }
 
 });

 