$(document).ready(function () {
    agregarschedule();
        
     schedule();
       Removeschedule();
       Cambiarestadoschedule();

    });
        var schedule= function (e) { 
    
    
        
    $.ajax({
                url: "view/schedule.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
          $('#loader').html("");                    
          $('#dataTableschedule').DataTable({ responsive: true });    
         
                }
            });
     
       
    }

    $(document).on('click', '.removeschedule', function(e){
    e.preventDefault();
    var nombre=$(this).val();   
    $('#eerrorremoveschedule').html("");
       $('#nombreschedulerem').val(nombre); 
       $('#nombreschedule').html(nombre); 
    
  });  
      
       $(document).on('click', '.removeruseractiePPPoE', function(e){
    e.preventDefault();
    var nombre=$(this).val();   
    $('#errorremoveruserpppoe').html("");
       $('#nombreactivepppoe').val(nombre); 
       $('#nombreuserppoe').html(nombre); 
    
  });  
            var Removeschedule = function () {
        $('#Formremoveschedule').submit(function (e) {
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
                url: "model/removeschedule.php",
                data: datos,
                success: function (data) {
          
          if (data==1){   $('.modal').modal("hide");
Swal.fire({ confirmButtonText:
                  'Aceptar',
                 
                title: '<strong>Correcto!</strong>',
                icon: 'success',
               text:   'Registro Eliminado', 
                
                
              });
            $('#Formremoveschedule').trigger("reset");
            $('#nombreschedulerem').val("");         
            $('#nombreschedule').html(""); 
            schedule();
          }
          
          else if (data==2){
         Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! Dato no encontrado</strong>',  
  
  
});
            $('#Formremoveschedule').trigger("reset");
          }
      else if (data==3){
                  Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error de conexion</strong>',  
  
  
});    $('#Formremoveschedule').trigger("reset");
          }
          else {
                  $('#errorremoveschedule').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Error! verifique conexión o api</strong></div>');
          $('#Formremoveschedule').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }
  


    $(document).on('click', '.mostrardatasche', function(e){
      e.preventDefault();    
   
    var estatus=$(this).val(); 
    var nombre=$(this).attr('id') 
  
$('#errorcambioestadosche').html("");  
  $('#estadocambiarsche').val(estatus);
  $('#dataacambiarsche').val(nombre);
   localStorage.setItem("nombre", nombre);
    localStorage.setItem("estado", estatus);
   

    if (estatus=="true"){
     $('#estadoactualdatasche').html("Deshabilitado");  
       $('#asksche').html("Está seguro de habilitar el siguiente schedule?"); 
       $('#divestatus').removeClass("bg-success");  $('#divestatus').addClass("bg-danger");}

     if (estatus=="false"){
     $('#estadoactualdatasche').html("Habilitado");
     $('#asksche').html("Está seguro de deshabilitar el siguiente schedule?");  $('#divestatus').removeClass("bg-danger");  $('#divestatus').addClass("bg-success");  }

      if (estatus=="Eliminado"){
       $('#estadoactualdatasche').html("El schedule ya fue eliminado");
     $('#asksche').html("Eliminado");   
$('#divestatus').removeClass("bg-danger");  $('#divestatus').addClass("bg-dark");
     }

     
    
  }); 



        var Cambiarestadoschedule = function () {
        $('#Formdidschedule').submit(function (e) {
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
                url: "model/disabledschedule.php",
                data: datos,
                success: function (data) {
            if (data==1){  
        $('#errorcambioestadosche').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> El Schedule ha cambiado su estado exitosamente</strong></div>');     
        $('#Formdidschedule').trigger("reset"); 
         
        var boton = localStorage.getItem("nombre");
        var estadoanterior= localStorage.getItem("estado");


        if(estadoanterior=="true"){   $('.modal').modal("hide");

       $('#divestatus').removeClass("bg-danger");  $('#divestatus').addClass("bg-success");
         $('#'+boton).removeClass("btn-danger");
         $('#'+boton).html("Deshabilitar");
         
         $('#'+boton).val("false");
         $('#'+boton).addClass("btn-success");
         Swal.fire({
   
  icon: 'success',
  title: 'Schedule Habilitado',
   
 confirmButtonColor: "#3085d6",
 
  confirmButtonText: "Aceptar"
})   ;
        }
        if(estadoanterior=="false"){ $('.modal').modal("hide"); $('#divestatus').removeClass("bg-success");  $('#divestatus').addClass("bg-danger");
       
          $('#'+boton).removeClass("btn-success");
         $('#'+boton).html("Habilitar");
         $('#'+boton).val("true");
         $('#'+boton).addClass("btn-danger");
         Swal.fire({
   
  icon: 'success',
  title: 'Schedule Deshabilitado',
   
 confirmButtonColor: "#3085d6",
 
  confirmButtonText: "Aceptar"
})   ;
        
        }
        }
        
          else if (data==2){
         Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! Dato no encontrado</strong>',  
  
  
}); $('#Formdidschedule').trigger("reset");                
          
        }
        
          
          else if (data==3){
              Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error de conexion</strong>',  
  
  
});   $('#Formdidschedule').trigger("reset");                
          
        }
        else {
        
              
                 $('#errorcambioestadosche').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa  fa-info" aria-hidden="true"></i> Error  inesperado, revice api</strong></div>');               
        $('#Formdidschedule').trigger("reset"); }

        
                }
        
        
        
            });
      
      }, 1000);
        });
    }  

   var agregarschedule = function () {
    $("#agregartarea").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize(); 
    Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});    
    $.ajax({
            type: 'POST',
            url: 'model/agregarschedule.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false, 

            dataType: "json",          
            success: function(msg){

            if(msg==1){   

                $('#agregartarea').trigger("reset");    
         Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Excelente</strong>',
  icon: 'success',
  html:   '<strong>Schedule agregado</strong>',  
  
  
});   schedule();
            } 

            else {


                Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error de conexion</strong>',  
  
  
});   
            }
     
              
       
   
      }
      
        });

    
    });  
  
  }