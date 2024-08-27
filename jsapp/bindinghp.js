$(document).ready(function () {Deshabilitacion();
        
     bindinghpKroTik();
   agregarusuariosbinding();
Removebinding();
    });



        var agregarusuariosbinding= function () {
        $('#Formagregarbinding').submit(function (e) {
            e.preventDefault();
      $("#submitregbin").prop('disabled', true);
   Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregarbinding.php",
                data: datos,
                success: function (data) { 
        
        if (data==1){
         Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Datos agregados correctamente  </strong>',
  icon: 'success',
    timer:1500
  
  
}); 
        $('#Formagregarbinding').trigger("reset");     
                $("#submitregbin").prop('disabled', false);
      
         
        }
        else if (data==3){
 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! de conexión ',
  
});
        $('#Formagregarbinding').trigger("reset");     
                $("#submitregbin").prop('disabled', false);
         
        }
        
        
else {
$("#submitregbin").prop('disabled', false);
 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! al procesar los datos',
  
});   
}       
          
          
         
            
          
                }
        
            });
        
        });
    }
        

        var bindinghpKroTik= function (e) { 
    
       $.ajax({
                url: "view/binding.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {   swal.close();               
          $('#contbody').html(data);            
          $('#loader').html("");                    
          $('#dataTablebinding').DataTable({ responsive: true });    
         
                }
            });
     
       
    }


     $(document).on('click', '.removerbinding', function(e){
    e.preventDefault();   
    $('#errorremovebinding').html("");
    var macc=$(this).val();   
    $('#macbinding').html(macc);
    $('#direcionmacbin').val(macc);
    
    
  });

                  var Removebinding = function () {
        $('#Formremovebinding').submit(function (e) {
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
                url: "model/removebinding.php",
                data: datos,
                success: function (data) {
          
          if (data==1){ $('.modal').modal('hide');
                Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Dato eliminado  </strong>',
  icon: 'success',
    timer:1500
  
  
});
            $('#Formremovebinding').trigger("reset");
            binding();      
          }
          
          else if (data==2){
           Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! El  dato no figura en MikroTik ',
  
});
            $('#Formremovebinding').trigger("reset");
          }
      else if (data==3){
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! de conexión ',
  
});
            $('#Formremovebinding').trigger("reset");
          }
          else {
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! al procesar los datos ',
  
});
          $('#Formremovebinding').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }
  
  $('#updateserverbinding').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/nombreserverhp.php",
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
         {
            $('#serverbinding').replaceWith(data);}
                }
            });
});

 
     $(document).on('click', '.mostrardataconfig', function(e){
    e.preventDefault();

    
    var macuser=$(this).attr('id') 
    var Comentario=$(this).val();
    
$('#errorrconfigb').html("");  
  
$('#direcionmacbin2').val(macuser);   
$('#comentariobi').val(Comentario); 
   

     
    
  }); 


      $(document).on('click', '.mostrardatacambio', function(e){
    e.preventDefault();

    
   $(".Cambiarestatus").attr("id","Formdcestadobindig");
    var estatus=$(this).val(); 
    var nombre=$(this).attr('id') 
$('#errorcambioestado').html("");  
 $('#estadocambiar').val(estatus);
$('#dataacambiar').val(nombre);   
   

    if (estatus=="true"){
     $('#estadoactualdata').html("Deshabilitado"); 
      $('#ask').html("Está seguro de habilitar el siguiente usuario binding?");    }

     if (estatus=="false"){
     $('#estadoactualdata').html("Habilitado");
     $('#ask').html("Está seguro de deshabilitar el siguiente usuario binding?");    }

     Cambiarestadobinding();
    
  }); 



           var Cambiarestadobinding = function () {
        $('#Formdcestadobindig').submit(function (e) {
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
                url: "model/disableduserbinding.php",
                data: datos,
                success: function (data) {
            if (data==1){  
             Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Estado cambiado  </strong>',
  icon: 'success',
    timer:1500
  
  
});$('#Formdcestadobindig').trigger("reset"); 
         $('#estadoactualdata').html("Cambiado"); 
          
                      
        
        }
        
          else if (data==2){
                   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! El  dato no figura en MikroTik ',
  
});
        $('#Formdcestadobindig').trigger("reset");                
          
        }
        
          
          else if (data==3){
              Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! de conexión ',
  
});
        $('#Formdcestadobindig').trigger("reset");                
          
        }
        else {
        
              
            Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! al procesar petición ',
  
});            
        $('#Formdcestadobindig').trigger("reset"); }

        
                }
        
        
        
            });
      
      }, 1000);
        });
    }  



     var Deshabilitacion = function () {
        $('#Formrconfigb').submit(function (e) {
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
                url: "model/deshabilitacionbinding.php",
                data: datos,
                success: function (data) {
            if (data==1){  
      Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Datos actualizados en el mikrotik </strong>',
  icon: 'success',
   
  
  
});
          
          bindinghpKroTik();
                      
        
        }
        
          else if (data==2){
                  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! El  secret no figura en MikroTik ',
  
});
        $('#Formrconfigb').trigger("reset");                
          
        }
        
          
          else if (data==3){
                   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! de conexión ',
  
});
        $('#Formrconfigb').trigger("reset");                
          
        }
        else {
        
                 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! petición no procesada',
  
});             
        $('#Formrconfigb').trigger("reset"); }

        
                }
        
        
        
            });
      
      }, 1000);
        });
    }  

