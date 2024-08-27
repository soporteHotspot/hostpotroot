$(document).on('click', '.getdataqr', function(e){
    e.preventDefault();
Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Obteniendo datos ...</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});
    var nombre=$(this).val();
       var parametro = {
                "username" : nombre,
                
        };
      
     $.ajax({ data: parametro,
                url: "model/obtenerdatosuserqr.php",
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
  html:   '<strong>Error! El usuario ya no figura en el mikrotik </strong>',  
  
  
})

  }

                    else{  swal.close(); var userx=data.user;
                                    var clave=data.password;
                                  
                                    
                                                        
                                                
                                  $('#titlesell').html('<i class="fa fa-user-circle"  aria-hidden="true"></i>  '+data.user); 
                                   $('#userx').html(data.user); 
                  
                                   if (userx==clave || clave==""){ 
                                   $("#divpass").removeClass("d-block");                                    
                                   $("#divpass").addClass("d-none");                                               
                                                                    
                                    }
                  
                  
                                  else if (userx!=clave && clave!=""){
                                     $("#divpass").removeClass("d-none"); 
                                    $("#divpass").addClass("d-block");                  
                                        $('#clavex').html(data.password);
                                  
                                    }

                                    
                                    
                                   $('#preciox').html(data.comment); 
                                   $('#tiempox').html(data.limituptime); 
                                   

new QRious({
      element: document.querySelector("#codigo"),
      value: 'http://'+data.ip+'/login?username='+data.user+'&password='+data.password,
      size: 1000,
      backgroundAlpha: "#0831B2", // 0 para fondo transparente
      foreground: "#0831B2", // Color del QR
      level: "M", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
    });


                                   $('#usernamegenrated').val(data.user);
                                   $("#Modalpreviewuser").modal('show');

 }
          
      }
            }); 
    

     
    
  }); 