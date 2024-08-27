$(".design").keyup(function(){

 uppreview()

});
  $(document).ready(function () {
  
 createplant();

      
    });
 




function uppreview(){


  var htmlcard=$('#htmlcard').val();
   var estilo=$('#estiloscss').val();

 $('#vistaprevia').html('<style type="text/css">'+estilo+'</style>'+'<div class="contenedor">'+htmlcard+"</div>");  

}



 var createplant = function () {
    $('#Formplantilla').submit(function (e) {
   e.preventDefault();  
var namefile=$('#namefile').val();
 

    
     Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Validando datos</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});
  
$('#enviardata').attr("disabled", true);

    

           var datos = $(this).serialize();
            
        
            $.ajax({
                type: "POST",
                url: "model/crear/crearplantilla.php",
                data: datos,
                dataType: "json",       
           success :  function(data)
          {    

          if(data==1) {


            Swal.fire({
  title: 'Excelente!',
  text: "Plantilla guardada y creado con éxito!",
  icon: 'success',
  showCancelButton: false,
  confirmButtonColor: 'green',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Aceptar'
})
      
    $('#enviardata').attr("disabled", false);
            
          } 
        
        
else if(data==7){   Swal.fire({
      icon: 'error',
      title: 'Oops...',
      html: "Error! de comunicacion al servidor especificado",
      
    });
    
    
            $('#enviardata').attr("disabled", false);
          
          }
   else if(data==3){    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      html: "Error en el proceso de creacion de archivo",
      
    });
    
    
            $('#enviardata').attr("disabled", false);
          
          }
      
      
         },
      
        
            });

          
     
        });
    }
  



$(document).on('click', '#getstile', function(e){
    $('#estiloscss').val(""); 
e.preventDefault();  
 $('#getstile').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');     
 Swal.fire({ iconHtml: '<div class="fa fa-user fa-fade  "></div>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Cargando estilos..</strong>',
  icon: 'info',
    
  
  
}); $.ajax({   cache:false,
               
                url: "model/consulta/getestilo.php",
                type: "POST",
                dataType: "html",                 
                success: function (data) { swal.close(); 
 $('#getstile').html('<i class="fa fa-sync  "></i> ');    
$('#seeestilos').replaceWith(data); 
  
                }
            });
    
  });  


$(document).on('click', '#gethtml', function(e){


    $('#htmlcard').val(""); 
e.preventDefault();  
 $('#gethtml').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');     
 Swal.fire({ iconHtml: '<div class="fa fa-user fa-fade  "></div>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Cargando html..</strong>',
  icon: 'info',
    
  
  
}); $.ajax({   cache:false,
               
                url: "model/consulta/gethtml.php",
                type: "POST",
                dataType: "html",                 
                success: function (data) {


                 
                 swal.close(); 
$('#gethtml').html('<i class="fa fa-sync  "></i> '); 
$('#seehtml').replaceWith(data); 
  
                }
            });
    
  });  


 




$(document).on('click', '#readestile', function(e){
e.preventDefault();  
 
 var archivo = $('#seeestilos').val();


 Swal.fire({ iconHtml: '<div class="fa fa-user fa-fade  "></div>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Cargando estilos..</strong>',
  icon: 'info',
    
  
  
}); $.ajax({    data:{filecss:archivo},
             cache:false,               
                url: "model/consulta/readcss.php",
                type: "POST",
                dataType: "html",                 
                success: function (data) { swal.close(); 

$('#estiloscss').val(data); 
  
                }
            });
    
  });  



$(document).on('click', '#readhtml', function(e){

e.preventDefault();  
 
 var archivo = $('#seehtml').val();


 Swal.fire({ iconHtml: '<div class="fa fa-user fa-fade  "></div>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Cargando HTML..</strong>',
  icon: 'info',
    
  
  
}); $.ajax({    data:{filehtml:archivo},
             cache:false,               
                url: "model/consulta/readhtml.php",
                type: "POST",
                dataType: "html",                 
                success: function (data) {   swal.close(); 

$('#htmlcard').val(data); 
  uppreview();
                }
            });
    
  });  




 
$(document).on('change', '#seeestilos', function(e){



e.preventDefault();  
    $('#estiloscss').val(""); 
  $('#htmlcard').val(""); 
});


$(document).on('click', '#deletecss', function(e){
    e.preventDefault();

      var estilo= $('#seeestilos').val();
 Swal.fire({
  title: '¿Está seguro de eliminar plantilla relacionado con ' +estilo+"?",
  cancelButtonColor: '#d33',
  showCancelButton: true,
  confirmButtonText: 'Aceptar',
   cancelButtonText: 'Cancelar',
  
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Procesando...', '', 'info')

     $.ajax({ data:{estilo:estilo},
                url: "model/eliminar/deletecss.php",
                method: "POST",
                dataType: "json",                 
                success: function (data) {

                if(data==111) 
     {           Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'success',
       title: '<strong>Archivos eliminados con éxito</strong>',
       
      // html:   data,  
        
     }) ; }

 else 

          if(data==133) 
     {           Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'success',
       title: '<strong>Archivo eliminado con éxito</strong>',
       
      // html:   data,  
        
     }) ; }
        if(data==313) 
     {           Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'success',
       title: '<strong>Archivo eliminado con éxito</strong>',
       
      // html:   data,  
        
     }) ; }

  if(data==331) 
     {           Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'success',
       title: '<strong>Archivo eliminado con éxito</strong>',
       
      // html:   data,  
        
     }) ; }

 if(data==333){
     Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'error',
       title: '<strong>Error al eliminar archivos</strong>',
       
       //html:   data,  
        
     }) ;

 }

       

         
                }
            });
  }  
})
    
  });

$(document).on('click', '#deletehtml', function(e){
    e.preventDefault();

      var estilo= $('#seehtml').val();
 Swal.fire({
  title: '¿Está seguro de eliminar plantilla relacionado con ' +estilo+"?",
  cancelButtonColor: '#d33',
  showCancelButton: true,
  confirmButtonText: 'Aceptar',
   cancelButtonText: 'Cancelar',
  
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Procesando...', '', 'info')

     $.ajax({ data:{estilo:estilo},
                url: "model/eliminar/deletecss.php",
                method: "POST",
                dataType: "json",                 
                success: function (data) {

                if(data==111) 
     {           Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'success',
       title: '<strong>Archivos eliminados con éxito</strong>',
       
      // html:   data,  
        
     }) ; }

 else 

          if(data==133) 
     {           Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'success',
       title: '<strong>Archivo eliminado con éxito</strong>',
       
      // html:   data,  
        
     }) ; }
        if(data==313) 
     {           Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'success',
       title: '<strong>Archivo eliminado con éxito</strong>',
       
      // html:   data,  
        
     }) ; }

  if(data==331) 
     {           Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'success',
       title: '<strong>Archivo eliminado con éxito</strong>',
       
      // html:   data,  
        
     }) ; }

 if(data==333){
     Swal.fire({
         confirmButtonText: 'Aceptar',
       icon: 'error',
       title: '<strong>Error al eliminar archivos</strong>',
       
       //html:   data,  
        
     }) ;

 }

       

         
                }
            });
  }  
})
    
  });
