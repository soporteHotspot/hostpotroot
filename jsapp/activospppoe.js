$(document).ready(function () {
        
     conctadospppoe();
      Removeuseractiveppoe();
      
    });
        var conctadospppoe= function (e) { 
    
    
        
      $.ajax({
                url: "view/activepppoe.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
          $('#loader').html("");                    
          $('#dataTableactivepppoe').DataTable({ responsive: true });    
         
                }
            });
     
       
    }
    
          var Removeuseractiveppoe = function () {
        $('#FormremoveactivePPPoE').submit(function (e) {
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
                url: "model/removeuseractivePPPoE.php",
                data: datos,
                success: function (data) {
          
          if (data==1){$('.modal').modal('hide');  conctadospppoe();
                  Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Usuario desconectado  </strong>',
  icon: 'success',
 html:   '☻',  
  
});
            $('#FormremoveactivePPPoE').trigger("reset");
            $('#nombreuserppoe').html("");         
          }
          
          else if (data==2){
                             Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Dato no encontrado ',
  
});$('#FormremoveactivePPPoE').trigger("reset");
          }
      else if (data==3){
                             Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión',
  
});$('#FormremoveactivePPPoE').trigger("reset");
          }
          else {
                    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Datos no procesados',
  
});
          $('#FormremoveactivePPPoE').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }



   $(document).on('click', '.removeruseractivePPPoE', function(e){
    e.preventDefault();
    var nombre=$(this).val(); 
     
$('#errorremoveruserpppoe').html("");
$('#nombreuserppoe').html(nombre);    
$('#nombreactivepppoe').val(nombre);   
    

     
    
  }); 


