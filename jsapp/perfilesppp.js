$(document).ready(function () {
        
     profilepppoe();
    Deleteprofileppp();
agregarperfilPPP();
editarperfilppp();
    });
        var profilepppoe= function (e) { 
    
   $.ajax({
                url: "view/profilePPPoE.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
          $('#loader').html("");                    
          $('#dataTableperfiles').DataTable({ responsive: true });    
         
                }
            });
     
       
    }
  $('#updatepool1').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/obtenernombrepoollocal.php",
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

  else                  
          {$('#poollocal').replaceWith(data);}                     
          
                     
                }
            });
});
    $('#updatepooll').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/obtenernombrepooll.php",
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

  else                  
          {$('#poollocaledit').replaceWith(data);}                     
          
                     
                }
            });
});

      $('#updatepoolr').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/obtenernombrepoolr.php",
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

  else          
          {$('#poolremotoedit').replaceWith(data);  }                      
          
                     
                }
            });
});
  $('#updatepool2').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/obtenernombrepoolremoto.php",
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

  else          
          {$('#poolremoto').replaceWith(data);  }                      
          
                     
                }
            });
});

 
    $(document).on('click', '.nombredeperfilppp', function(e){
    e.preventDefault();
    $('#errordeleteperfipppp').html("");
    var nombre=$(this).val();
    if (nombre=="default"){
      
      $('#nameperfilpppoe').html("Éste perfil no es posible eliminarlo");
      $('#nombreppoe').val("");
      return false;
    }
    if (nombre=="default-encryption"){
      
      $('#nameperfilpppoe').html("Éste perfil no es posible eliminarlo");
      $('#nombreppoe').val("");
      return false;
    }
    else {
        $('#nameperfilpppoe').html(nombre);   
    $('#nombreppoe').val(nombre);
    
    }
  });



        var agregarperfilPPP = function () {
        $('#FormaddProfilePPPoE').submit(function (e) {
            e.preventDefault();
      $("#submitadPPP").prop('disabled', true);
Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregarperfilPPPoE.php",
                data: datos,
                success: function (data) { 
        setTimeout(function(){
          
          if (data==1){
         Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Perfila gregado correctamente</strong>',
  icon: 'success',
 html:   '☻',  
  
}); $('#FormaddProfilePPPoE').trigger("reset");    
                $("#submitadPPP").prop('disabled', false);
          profilepppoe();
        }
else {
$("#submitadPPP").prop('disabled', false);
Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Error al procesar los datos </strong>',
  icon: 'info',  
});}       
}, 1000);         
                }
        
            });
        
        });
    }
  
        var Deleteprofileppp= function () {
           $('#Formdeleteperfilppp').submit(function (e) {
            e.preventDefault();     
      Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});var datos = $(this).serialize();
      setTimeout(function(){

            $.ajax({
                type: "POST",
                url: "model/deleteperfilPpp.php",
                data: datos,
                success: function (data) {
          
          if (data==1){  $('.modal').modal('hide');
            Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Perfil eliminado  </strong>',
  icon: 'success',
 html:   '☻',  
  
});  $('#Formdeleteperfilppp').trigger("reset");
            $('#nameperfilpppoe').html("");           
            profilepppoe();
          }
      else if (data==3){
                     Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});$('#Formdeleteperfilppp').trigger("reset");
          }
          else {
            Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Datos no procesados',
  
}); $('#Formdeleteperfilppp').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }
    




 $(document).on('click', '.obtenernombreperfilppp', function(e){
    e.preventDefault();

    var id=$(this).attr('id'); 
    var nombre=$(this).val();
       var parametro = {
                "nombre" : nombre,
                
        };
      
     $.ajax({ data: parametro,
                url: "model/obtenerdatosperfilppp.php",
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
  html:   '<strong>Error! El perfil no figura el mikrotik </strong>',  
  
  
})

  }

                    else{
 $('#name1').val(data.name);
$('#name2').val(data.name);
$('#poollocaledit').val(data.pooll);
$('#poolremotoedit').val(data.poolr);
$('#velocidadp').val(data.velocidad);
$('#titleeppp').html('Editar perfil "'+data.name+'"')
$('#Modaleditperfilppp').modal("show");
 
 }
          
      }
            }); 
    

     
    
  }); 



       var editarperfilppp = function () {
        $('#Formedicionperfilppp').submit(function (e) {
            e.preventDefault();
      $("#submiteditperfilppp").prop('disabled', true);
Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/actualizarperfilppp.php",
                data: datos,
                success: function (data) { 
               
          
          if (data==1){  $('.modal').modal('hide');
        Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Datos actualizados</strong>',
  icon: 'success',
 html:   '☻',  
  
});  $('#Formedicionperfilppp').trigger("reset");    
                $("#submiteditperfilppp").prop('disabled', false);
        profilepppoe();
        }


         else if (data==2){
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});    $("#submiteditperfilppp").prop('disabled', false);
           
        }
else {
$("#submiteditperfilppp").prop('disabled', false);
   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Datos no procesados',
  
});}       
          
                }
        
            });
        
        });
    }