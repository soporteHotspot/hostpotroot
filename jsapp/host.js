$(document).ready(function () { agregarusuariosbinding();
        fijarmac();
        removehost();
     host();
       Removeusercookie();

    });
        var host= function (e) { 
         $.ajax({
                url: "view/host.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {  swal.close();               
          $('#contbody').html(data);            
          $('#loader').html("");                    
          $('#dataTablehost').DataTable({ responsive: true });    
         
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
          
          if (data==1){
     Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>  eliminado  </strong>',
  icon: 'success',
    timer:1500
  
  
});  host();
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
  text: 'Error! datos no procesados correctamenet',
  
});
    
          $('#Formremovecookieuserhp').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }
  
    $(document).on('click', '.vermac', function(e){
    e.preventDefault();    
    $("#errormacstatic").html("");
    var mac=$(this).val();   
    $('#macfijo').val(mac);     
    
  }); 


        $(document).on('click', '.vermac2', function(e){
    e.preventDefault();    
    $("#errormacstatic").html("");
    var mac=$(this).val();   
    $('#machost').val(mac);     
    
  }); 



     var fijarmac= function () {
        $('#Formasetstatic').submit(function (e) {
            e.preventDefault();
      $("#submitstatic").prop('disabled', true);
       
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/fijarmac.php",
                data: datos,
                success: function (data) { 
                   if (data==1){
          Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>Proceso terminado </strong>',
  icon: 'success',
    timer:1500
  
  
});
            $('#Formasetstatic').trigger("reset");           

            $("#submitstatic").prop('disabled', false);
            

          }

    else if (data==2){$("#submitstatic").prop('disabled', false);
                   
                       Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! el dato no figura en MikroTik',
  
});
                       $('#Formasetstatic').trigger("reset");
          }
    else   if (data==3){$("#submitstatic").prop('disabled', false);
                        
              Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! de conexión',
  
});
                       $('#Formasetstatic').trigger("reset");
          }
          else {$("#submitstatic").prop('disabled', false);
                
                $('#errormacstatic').html(data);
                $('#Formasetstatic').trigger("reset");
          
          }
   
          
         
            
          
                }
        
            });
        
        });
    }

   var removehost= function () {
        $('#Formadeletehost').submit(function (e) {
            e.preventDefault();
      $("#submithost").prop('disabled', true);
       
var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/removerhost.php",
                data: datos,
                success: function (data) { 
                   if (data==1){
         Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong> Host removido  </strong>',
  icon: 'success',
    timer:1500
  
  
});  host();
            $('#Formadeletehost').trigger("reset");           

            $("#submithost").prop('disabled', false);
            

          }

    else if (data==2){$("#submithost").prop('disabled', false);
                   
       Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! el dato no figura en MikroTik',
  
});
                       $('#Formadeletehost').trigger("reset");
          }
    else   if (data==3){$("#submithost").prop('disabled', false);
                        
                       Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! de conexión con MikroTik',
  
});
                       $('#Formadeletehost').trigger("reset");
          }
          else {$("#submithost").prop('disabled', false);
                
                  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! en el proceso',
  
});
                $('#Formadeletehost').trigger("reset");
          
          }
   
          
         
            
          
                }
        
            });
        
        });
    }


 