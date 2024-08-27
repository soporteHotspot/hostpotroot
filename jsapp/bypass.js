  
   
  $('#updateserverbinding').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/nombresserverhp.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
})        } else
                     {$('#serverbinding').replaceWith(data);}
                }
            });
});

  

  $(document).on('click', '.mostrardata', function(e){
    e.preventDefault();

    
    var macuser=$(this).attr('id') 
    var ip=$(this).val();
    
$('#erroradbinding').html("");  
  
$('#newmac').val(macuser);   
$('#newip').val(ip); 
   

     
    
  }); 

  var agregarusuariosbinding= function () {
        $('#Formagregarbinding').submit(function (e) {
            e.preventDefault();
      $("#submitregbin").prop('disabled', true);
     Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando datos espere...</strong>',
  icon: 'info',  
});var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregarbinding.php",
                data: datos,
                success: function (data) { 
        
        if (data==1){  $('.modal').modal('hide');
           Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Usuario agregado correctamente</strong>',
  icon: 'success',
    timer:1500
  
  
});$('#Formagregarbinding').trigger("reset");     
                $("#submitregbin").prop('disabled', false);
         
         
        }
        else if (data==3){
                        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
}); $('#Formagregarbinding').trigger("reset");     
                $("#submitregbin").prop('disabled', false);
         
        }
        
        
else {
$("#submitregbin").prop('disabled', false);
                 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error al procesar los datos',
  
});}       
          
          
         
            
          
                }
        
            });
        
        });
    }