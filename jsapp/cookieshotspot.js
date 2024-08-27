$(document).ready(function () {
        
     cokiehp();
       Removeusercookie();

    });
        var cokiehp= function (e) { 
    
     $.ajax({
                url: "view/cokie.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {   swal.close();               
          $('#contbody').html(data);            
          $('#loader').html("");                    
          $('#dataTableCookie').DataTable({ responsive: true });    
         
                }
            });
     
       
    }

    $(document).on('click', '.removerkookie', function(e){
    e.preventDefault();
    var nombre=$(this).val();   
    $('#errorremovecookiehp').html("");
       $('#nombrecookieactivo').val(nombre); 
       $('#nombrecookie').html(nombre); 
    
  });  
      
       $(document).on('click', '.removeruseractiePPPoE', function(e){
    e.preventDefault();
    var nombre=$(this).val();   
    $('#errorremoveruserpppoe').html("");
       $('#nombreactivepppoe').val(nombre); 
       $('#nombreuserppoe').html(nombre); 
    
  });  
            var Removeusercookie = function () {
        $('#Formremovecookieuserhp').submit(function (e) {
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
                url: "model/removeusercookie.php",
                data: datos,
                success: function (data) {
          
          if (data==1){  $('.modal').modal('hide');
              Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Usuario removido   </strong>',
  icon: 'success',
    timer:1500
  
  
});
            $('#Formremovecookieuserhp').trigger("reset");
            $('#usernameu').html("");         
          }
          
          else if (data==2){
                  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! el dato no figura en MikroTik',
  
});
            $('#Formremovecookieuserhp').trigger("reset");
          }
      else if (data==3){
                         Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! de conexión',
  
});
            $('#Formremovecookieuserhp').trigger("reset");
          }
          else {
                  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! Datos no procesados',
  
});
          $('#Formremovecookieuserhp').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }
  