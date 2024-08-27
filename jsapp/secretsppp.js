$(document).ready(function () {
        
     
    DeleteSecreppp();
agregarusuariosPPPoE();
 
EditarSP();
 
    });

   $("#toggle").change(function(){   
  if($(this).is(':checked')){    
   $("#passwordeR").attr("type","text");   
    
  }else{ 
   $("#passwordeR").attr("type","password");   
  }
 
 });


    $("#toggle2").change(function(){   
  if($(this).is(':checked')){    
   $("#passwordsecret").attr("type","text");   
    
  }else{ 
   $("#passwordsecret").attr("type","password");   
  }
 
 });
      var EditarSP = function () {
        $('#Formedicionsecretppp').submit(function (e) {
            e.preventDefault();
      $("#submiteditsecret").prop('disabled', true);
  Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
}); var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/actualizarsecret.php",
                data: datos,
                success: function (data) { 
               
          
          if (data==1){ secrestpppoe();  $('.modal').modal('hide'); 
        Swal.fire({  confirmButtonText:
    'Aceptar',
     
  title: '<strong>Datos actualizados</strong>',
  icon: 'success',
    timer:1500
  
  
});  
        $('#Formedicionsecretppp').trigger("reset");    
                $("#submiteditsecret").prop('disabled', false);
          secrestpppoe();
        }


         else if (data==2){
                Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});     
                $("#submiteditsecret").prop('disabled', false);
           
        }
else {
$("#submiteditsecret").prop('disabled', false);
      Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Datos no procesados',
  
});   
}       
          
                }
        
            });
        
        });
    }

        var secrestpppoe= function (e) { 

    
    
        
      $.ajax({
                url: "view/secrets.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
          $('#loader').html("");                    
          $('#dataTablesecrets').DataTable({ responsive: true });    
         
                }
            });
     
       
    }
 

 $(document).on('click', '.mostrarsecret', function(e){
    e.preventDefault();
    var nombre=$(this).val(); 
    localStorage.setItem("nombre", nombre);

$('#errordeletesecretpppp').html("");
$('#nameuserpppp').html(nombre);    
    $('#nombresecret').val(nombre);
    
  });  





      $(document).on('click', '.mostrardatacambio', function(e){
    e.preventDefault();

    
   $(".Cambiarestatus").attr("id","Formdcestadosecret");
    var estatus=$(this).val(); 
    var nombre=$(this).attr('id') 

    localStorage.setItem("nombre", nombre);
    localStorage.setItem("estado", estatus);
$('#errorcambioestado').html("");  
 $('#estadocambiar').val(estatus);
$('#dataacambiar').val(nombre);   
   

    if (estatus=="true"){
     $('#estadoactualdata').html("Deshabilitado"); 
      $('#ask').html("Está seguro de habilitar el siguiente usuario PPPoE?");   }

     if (estatus=="false"){
     $('#estadoactualdata').html("Habilitado");  
      $('#ask').html("Está seguro de deshabilitar el siguiente usuario PPPoE?");  }

       if (estatus=="Eliminado"){
       $('#estadoactualdata').html("El usuario ya fue eliminado");
     $('#ask').html("Eliminado");   

     }


     Cambiarestadosecret();
    
  }); 

  

 


        $('#updateperfilpppoe').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/nombreperfilesPPPoE.php",
                method: "POST",
                dataType: "html",                 
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
else { $('#btnperfileppoe').replaceWith(data);}
                }
            });
});



            var agregarusuariosPPPoE= function () {
        $('#Formagregarsecret').submit(function (e) {
            e.preventDefault();
      $("#submitregppoe").prop('disabled', true);
  Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
}); var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregarsecretPPoE.php",
                data: datos,
                success: function (data) { 
        
        if (data==1){
         Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Usuario agregado al MikroTik</strong>',
  icon: 'success',
    timer:1500
  
  
}); $('#Formagregarsecret').trigger("reset");    
                $("#submitregppoe").prop('disabled', false);
          
        }
        else if (data==3){
                 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});$('#Formagregarsecret').trigger("reset");    
                $("#submitregppoe").prop('disabled', false);
         
        }
        
        
else {
$("#submitregppoe").prop('disabled', false);
                          Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Datos no procesados',
  
}); }       
          
          
         
            
          
                }
        
            });
        
        });
    }
      


        var DeleteSecreppp = function () {
        $('#Formdeletesecretppp').submit(function (e) {
            e.preventDefault();     
        Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
}); var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/removesecret.php",
                data: datos,
                success: function (data) {
            if (data==1){ secrestpppoe(); $('.modal').modal('hide');
         Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Usuario eliminado de MikroTik</strong>',
  icon: 'success',
    timer:1500
  
  
});$('#Formdeletesecretppp').trigger("reset");                
           var boton= localStorage.getItem("nombre");
             $('#'+boton).html("Eliminado");
              $('#'+boton).val("Eliminado");
             $('#'+boton).removeClass("btn-danger bnt-success");
             $('#'+boton).addClass("btn-dark");
             $('#'+boton).removeAttr('id');
        }
        
          else if (data==2){
                                 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Dato no encontrado ',
  
}); $('#Formdeletesecretppp').trigger("reset");                
          
        }
        
          
          else if (data==3){
                Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});$('#Formdeletesecretppp').trigger("reset");                
           
        }
        else {
        
              
                                 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Dato no procesado ',
  
}); $('#Formdeletesecretppp').trigger("reset"); }

        
                }
        
        
        
            });
      
      }, 1000);
        });
    } 
  


   var Cambiarestadosecret = function () {
        $('#Formdcestadosecret').submit(function (e) {
            e.preventDefault();     
        Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
}); var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/disabledsecret.php",
                data: datos,
                success: function (data) {
            if (data==1){  
        $('#Formdcestadosecret').trigger("reset"); 
          $('#estadoactualdata').html("Cambiado"); 
         var boton = localStorage.getItem("nombre");
        var estadoanterior= localStorage.getItem("estado");

  if(estadoanterior=="true"){ 

         $('#'+boton).removeClass("btn-danger");
         $('#'+boton).html("Deshabilitar");
         
         $('#'+boton).val("false");
         $('#'+boton).addClass("btn-success");
            Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Usuario habilitado</strong>',
  icon: 'success',
    timer:1500
  
  
}); $('.modal').modal('hide');
        }
        if(estadoanterior=="false"){

          $('#'+boton).removeClass("btn-success");
         $('#'+boton).html("Habilitar");
         $('#'+boton).val("true");
         $('#'+boton).addClass("btn-danger");
      Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Usuario deshabilitado</strong>',
  icon: 'success',
    timer:1500
  
  
});
        $('.modal').modal('hide');
        }



        
        }
        
          else if (data==2){
       $("#submitregppoe").prop('disabled', false);
                          Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Dato no encontrado',
  
});  $('#Formdcestadosecret').trigger("reset");                
          
        }
        
          
          else if (data==3){
                Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});$('#Formdcestadosecret').trigger("reset");                
           
        }
        else {
        
              
                                Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Dato no procesado',
  
});  $('#Formdcestadosecret').trigger("reset"); }

        
                }
        
        
        
            });
      
      }, 1000);
        });
    } 


     $(document).on('click', '.getdataedit', function(e){
    e.preventDefault();

     
    var secret=$(this).val();
       var parametro = {
                "secret" : secret,
                
        };
      
     $.ajax({ data: parametro,
                url: "model/obtenerdatossecret.php",
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
 $('#secret1').val(data.user);
$('#secret2').val(data.user);
$('#passwordsecret').val(data.password);
$('#perfilesecret').val(data.perfil);
$('#comentsecret').val(data.comment);

$('#Modaleditsecretppp').modal("show");
 }
          
      }
            }); 
    

     
    
  }); 



             $('#updateprofilesecret').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/nombreperfilesPPP.php",
                method: "POST",
                dataType: "html",                 
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
else { $('#perfilesecret').replaceWith(data);}
                }
            });
});



