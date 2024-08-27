$(document).on('click', '.verinfo', function(e){
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
                url: "model/obtenerdatosusershp.php",
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

                    else{swal.close(); 
                        $('#tituloinfo').html('Información general del usuario '+data.user);
                        if(data.estado=="Conectado"){$('#iconoestado').html('<i class="fa fa-user-check text-lime"></i>');}else{$('#iconoestado').html('<i class="fa fa-user-xmark text-warning"></i>');}
                        
$('#1status').html(data.estado); 

$('#1u').html(data.user);
$('#1pass').html(data.password); 
$('#1ip').html(data.ip);
$('#1mac').html(data.mac);
$('#1perfil').html(data.perfil);
$('#1uptime').html(data.tiempo);
$('#1limitup').html(data.limitupt);
$('#1lbt').html(data.limitbt);
$('#1bi').html(data.bin);
$('#1bout').html(data.bout);
$('#1com').html(data.commentr);
$("#Modalainnfouser").modal('show');



 }
          
      }
            }); 
    

     
    
  }); 