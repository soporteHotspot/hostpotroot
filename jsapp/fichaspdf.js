 


$(document).ready(function () {
        
      CargarArchivos();
      DeletePDF();
      Deletecarpeta();
    });

 
 

      $(document).on('click', '.abrir', function(e){

    e.preventDefault();   
    var id=$(this).val(); 
    $(this).html('Abriendo <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> '); 
$(this).prop( "disabled", true );
        var parametros = {
                "id" : id,
                
        };


            $.ajax({ data:  parametros,
               url: "view/verarchivospdf.php",
                method: "POST",
                dataType: "html",
               
                success: function (data) { 

 $('#contbody').html(data); 
   $('#dataTablepdf').DataTable({ responsive: true });   

                }
            });
   


     
    
  }); 
     

      var CargarArchivos= function () { 

 
   $.ajax({ 
                url: "view/verarchivos.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {  
                $('#loader').html("");                  
          $('#contbody').html(data); 
                  $('#dataTablearchivos').DataTable({ responsive: true });  
                     
                }
            });
     
       
    }


  
 
 
 
 
 
      $(document).on('click', '.viewpdf', function(e){
    e.preventDefault();   
     var carpeta=$(this).attr("id");
     var valor=$(this).val(); 
  $('#namepdf').html(valor);  
  $('#nombrecarpetadelete').val(carpeta); 
  $('#nombrepdf').val(valor); 

    
  });


 $(document).on('click', '.viewcarpeta', function(e){
    e.preventDefault();   
    var valor=$(this).val(); 
 $('#namecarpeta').html(valor); $('#nombrecar').val(valor);    
  });
    
  
         var DeletePDF = function () {
        $('#FormdeletePDF').submit(function (e) {
      
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
                url: "model/deletepdf.php",
                data: datos,
                success: function (data) {
          
          if (data==1){  $('.modal').modal('hide');
                  Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Archivo eliminado </strong>',
  icon: 'success',
 
  
});


 
    var id=$('#nombrecarpetadelete').val();     
        var parametros = {
                "id" : id,
                
        };


            $.ajax({ data:  parametros,
               url: "view/verarchivospdf.php",
                method: "POST",
                dataType: "html",
               
                success: function (data) { 

 $('#contbody').html(data); 
   $('#dataTablepdf').DataTable({ responsive: true });   

                }
            });
$('#FormdeletePDF').trigger("reset");
$('#namepdf').html(""); 
          }
          
          
          else {
                                 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error al eliminar el archivo',
  
}); $('#Formdeleteuserhp').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }

      var Deletecarpeta= function () {
        $('#Formdeletecarpeta').submit(function (e) {
      
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
                url: "model/deletefolder.php",
                data: datos,
                success: function (data) {
          
          if (data==1){ $('.modal').modal('hide');
                  Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Carpeta eliminada  </strong>',
  icon: 'success',
 
  
});
             
            CargarArchivos();
          }
          
          
          else {
               Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error al eliminar carpeta',
  
});$('#Formdeleteuserhp').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }

     
 