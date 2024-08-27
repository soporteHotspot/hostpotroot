$(document).ready(function () {
        
       MiKroTik();
       DeleteRouter();
regrouterboard();
EditRouterOS();
    });


function detenerupdatedash() {
        clearInterval(IntervDash);
     }

     function iniciarrefresh(){

IntervDash= setInterval(function(){ updatedashboard() },2000);

     }
  $("#toggler").change(function(){   
  if($(this).is(':checked')){    
   $("#passwordeditR").attr("type","text");   
    
  }else{ 
   $("#passwordeditR").attr("type","password");   
  }
 
 });

            var MostrarreR = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscarrouter.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {

                	$('#btnsucursales4').val(data.idsucursal); 
          $('#ideR').val(data.id);
            $('#nombreeR').val(data.nombre);                                    
          $('#ipeR').val(data.ip); 
          $('#usuarioeR').val(data.usuario); 
          $('#passwordeditR').val(data.password); 
          $('#puertoeditR').val(data.puerto); 
           
                }
            });
        }
    }
  
  
  var MostrariddRouter = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscarrouter.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
          $('#idR').val(data.id);
                    $('#ipR').val(data.ip);                                    
          $('#nombreR').val(data.nombre);
                }
            });
        }
    }
  
var regrouterboard= function () {
        $('#Foradrouters').submit(function (e) {
            e.preventDefault();
             $("#submitadr").prop('disabled', true);
Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Validando datos</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
});var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/agregarrouter.php",
                data: datos,
                dataType: "json",  
                success: function (data) {

 if(data==3)

    { Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ya existe un registro con la misma ip y nombre',
  
});
  $("#submitadr").prop('disabled', false);
}

          else  if(data==7)

    { Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Los datos no se procesaron correctamente',
  
});
  $("#submitadr").prop('disabled', false);
}

 else  if(data==5)

    {  MiKroTik();
      Swal.fire({
   
  icon: 'success',
  title: 'Datos  agregados al sistema',
  showConfirmButton: false,
  timer: 1000
});

                  
 $('#Foradrouters').trigger("reset"); 

        
}
                        
                }
        
            });
        }, 1000);
        });
    } 
  
  

        var DeleteRouter = function () {
        $('#FormdeleteR').submit(function (e) {
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
                url: "model/removerouter.php",
                data: datos,
                success: function (data) {   $('.modal').modal('hide');
        MiKroTik();
               Swal.fire({ confirmButtonText:
    'Aceptar',
    
  title: '<strong>Excelente proceso terminado</strong>',
  icon: 'success',
  
    timer:1500
  
})
          $('#ipR').html("");
          $('#nombreR').html("");
          $('#FormdeleteR').trigger("reset");         
                }
        
        
        
            });
      
      }, 1000);
        });
    } 
   
        var MiKroTik= function (e) { 
      $.ajax({
                url: "view/routers.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTablerouter').DataTable({ responsive: true });       
                }
            });
     
       
    }


            var EditRouterOS = function () {
        $('#FormEditR').submit(function (e) {
            e.preventDefault();     
        Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong>Validando datos</strong>',
  icon: 'info',
  html:   '<strong><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong>',  
  
  
}); var datos = $(this).serialize();
 
            $.ajax({
                type: "POST",
                url: "model/updaterouter.php",
                data: datos,
                datos:'json',
                success: function (data) {



    if(data==1)
          {   ViewRouters(); 
                 
          $('#FormEditR').trigger("reset"); 

                                Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
  title: '<strong>Datos actualizados correctamente</strong>',
  icon: 'success',
  html:   '<strong>Excelente</strong>',  
  
  timer:1500
}); $('.modal').modal('hide');

                              }    

                                if(data==3)
          {   ViewRouters();
                 
          $('#FormEditR').trigger("reset"); 

                                Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
  title: '<strong>Datos no  procesados</strong>',
  icon: 'error',
  html:   '<strong>Error!</strong>',  
  
  
});

                              }      
      


              
                }
        
        
        
            });
      
   
        });
    }
  

  $("#toggle").change(function(){
  
  // Check the checkbox state
  if($(this).is(':checked')){
   // Changing type attribute
   $("#passwordeR").attr("type","text");
   
   // Change the Text
   $("#toggleText").text("Hide");
  }else{
   // Changing type attribute
   $("#passwordeR").attr("type","password");
  
   // Change the Text
   $("#toggleText").text("Show");
  }
 
 });


            $('#updatesucursal3').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "model/getnamesucursales3.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                 if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}) }   
                else {
                                
                
          $('#btnsucursales3').replaceWith(data); 
                 }  
            
          
                    
                }
            });
});


                        $('#updatesucursal4').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "model/getnamesucursales4.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                 if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}) }   
                else {
                                
                
          $('#btnsucursales4').replaceWith(data); 
                 }  
            
          
                    
                }
            });
});



                     $('#updatepuerto').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "model/getport.php",
                method: "POST",
                dataType: "json",                 
                success: function (data) {
                 if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}) }   
                else {
                                
                
          $('#puertoapi').val(data); 
                 }  
            
          
                    
                }
            });
});

                         $('#updateip').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "model/getip.php",
                method: "POST",
                dataType: "json",                 
                success: function (data) {
                 if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}) }   
                else {
                                
                
          $('#dirip').val(data); 
                 }  
            
          
                    
                }
            });
});


 $('#updateusermikrotik').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "model/getusersmikrotik.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                 if(data==3){Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
}) }   
                else {
                                
                
          $('#usersmikrotik').replaceWith(data); 
                 }  
            
          
                    
                }
            });
});
