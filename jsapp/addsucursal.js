$(document).ready(function () {
        
       cargarsuc();
       deletesucursal();
       agregardatos();
       editardatos();

    });




        var cargarsuc= function (e) { 
    
    
         $('#contbody').html(""); 
    $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando datos del sistema</strong></div>'); 
            $.ajax({
                url: "view/sucursales.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data); 
           
                      $('#loader').html("");
                     $( "#contuser" ).addClass("collapsed-card");         
            $( "#contperfil" ).addClass("collapsed-card");
            
              $('#dataTablesistema').DataTable({ responsive: true });  
           
                }
            });
     
       
    }
   var DeleteSIS = function () {
        $('#FormdeleteSIS').submit(function (e) {
            e.preventDefault();     
      $('#errordeleteSIS').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Procesando <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
      var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/deletesucursal.php",
                data: datos,
                success: function (data) {             
                  $('#errordeleteSIS').html(data);         
          $('#FormdeleteSIS').trigger("reset");
                  Sistema();          
                }
        
        
        
            });
      
      }, 1000);
        });
    }



      var Mostrardaedit = function (id) {        
       
            $.ajax({
                url: "model/buscardatosucursal.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {  
           $('#idsucursaledit').val(data.id);
          $('#nombresucursaledit').val(data.nombre);
          $('#dirsucursaledit').val(data.direccion);
          $('#textosucursaledit').val(data.texto);
         
           
                }
            });
         
    }
           var Mostrardadelete = function (id) {        
       
            $.ajax({
                url: "model/buscardatosucursal.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {  
           $('#idsucursaldelete').val(data.id);
          $('#nombresucursaldelete').html(data.nombre);
          
         
           
                }
            });
         
    }


        var agregardatos = function () {
    $("#agregarsucursal").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize(); 
    
          
    $.ajax({
            type: 'POST',
            url: 'model/agregarsucursal.php',
             data:data,  
            dataType:'json',         
            success: function(data){ 

              if(data==1){
               Swal.fire({ confirmButtonText:
                  'Aceptar',
                  
                title: '<strong>Correcto!</strong>',
                icon: 'success',
               text:   'Registro agregado  ', 
                
                
              })
              
                           
                     $('#agregarsucursal').trigger("reset");    
                       cargarsuc();
              
                }

                else {

    Swal.fire({ confirmButtonText:
                  'Aceptar',
                  
                title: '<strong>Error!</strong>',
                icon: 'error',
               text:   'Datos no procesados  ', 
                
                
              })
              
                           
                

                }
      }
      
        });

    
    });  
  
  }
  
          var editardatos = function () {
    $("#Formeditsucursal").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize(); 
    
          
    $.ajax({
            type: 'POST',
            url: 'model/updatesucursal.php',
             data:data,  
            dataType:'json',         
            success: function(data){ 

              if(data==1){
               Swal.fire({ confirmButtonText:
                  'Aceptar',
                  
                title: '<strong>Correcto!</strong>',
                icon: 'success',
               text:   'Registro actualizado ', 
                
                
              })
              
                           
                     $('#Formeditsucursal').trigger("reset");    
                       cargarsuc();
              
                }

                else {

    Swal.fire({ confirmButtonText:
                  'Aceptar',
                 
                title: '<strong>Error!</strong>',
                icon: 'error',
               text:   'Datos no procesados  ', 
                
                
              })
              
                           
                

                }
      }
      
        });

    
    });  
  
  }

        var deletesucursal = function () {
    $("#Formdeletesucursal").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize(); 

    
 
          
    $.ajax({
            type: 'POST',
            url: 'model/deletesucursal.php',
             data:data,  
            dataType:'json',         
            success: function(data){ 

              if(data==1){
               Swal.fire({ confirmButtonText:
                  'Aceptar',
                 
                title: '<strong>Correcto!</strong>',
                icon: 'success',
               text:   'Registro Eliminado', 
                
                
              })
              $('#idsucursaldelete').val("");
          $('#nombresucursaldelete').html("");

                           
                     $('#Formdeletesucursal').trigger("reset");    
                       cargarsuc();
              
                }


                 else  if(data==3){
               Swal.fire({ confirmButtonText:
                  'Aceptar',
                 
                title: '<strong>Error!!</strong>',
                icon: 'error',
               text:   'Existe perfiles de mayoreo con ésta sucursal elimine datos antes de eliminarla', 
                
                
              })
              $('#idsucursaldelete').val("");
          $('#nombresucursaldelete').html("");

                           
                     $('#Formdeletesucursal').trigger("reset");    
                        
              
                }


                   else if(data==7){
               Swal.fire({ confirmButtonText:
                  'Aceptar',
                 
                title: '<strong>Error!!</strong>',
                icon: 'error',
               text:   'Existe botones con ésta sucursal elimine datos antes de eliminarla', 
                
                
              })
              $('#idsucursaldelete').val("");
          $('#nombresucursaldelete').html("");

                           
                     $('#Formdeletesucursal').trigger("reset");    
                        
              
                }


                        else if(data==9){
               Swal.fire({ confirmButtonText:
                  'Aceptar',
                 
                title: '<strong>Error!!</strong>',
                icon: 'error',
               text:   'Existe routers con ésta sucursal elimine datos antes de eliminarla', 
                
                
              })
              $('#idsucursaldelete').val("");
          $('#nombresucursaldelete').html("");

                           
                     $('#Formdeletesucursal').trigger("reset");    
                        
              
                }

                else {

    Swal.fire({ confirmButtonText:
                  'Aceptar',
                   
                title: '<strong>Error!</strong>',
                icon: 'error',
               text:   'Datos no procesados  ', 
                
                
              })
              
                           
                

                }
      }
      
        });

    
    });  
  
  }
  
  
  
 