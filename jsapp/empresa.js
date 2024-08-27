$(document).ready(function () {cargarsistema();
       DeleteSIS();
       agregardatos();
       editardatos();

    });




        var cargarsistema= function (e) { 
    
    
         $('#contbody').html(""); 
        $.ajax({
                url: "view/sistema.php",
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
                url: "model/removerdatossistema.php",
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



      var Mostrarempresa1 = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscardatosistema.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {  
                     $('#preview2').html('<img src="'+data.logo+'"   style="width:100px;height:100px;">');        
          $('#nombree').val(data.sistema);
          $('#idusere').val(data.idusuario);
          $('#idpasse').val(data.idpassword);
          $('#texte').val(data.texto);
          $('#zonahoraria').val(data.zona);
          $('#modo').val(data.modo);
          $('#moneda').val(data.moneda);
                }
            });
        }
    }
        var Mostrarempresa2 = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscardatosistema.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {                                           
          $('#nombreempresa').html(data.sistema);
                }
            });
        }
    }
        var agregardatos = function () {
    $("#Formadsistema").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize(); 
 Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
}); 
      $     
    $.ajax({
            type: 'POST',
            url: 'model/agregarregsistema.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,  
             dataType: "json",           
            success: function(data){ 

                if(data==1)
       
     {   cargarsistema();     Swal.fire({ confirmButtonText:      'Aceptar',
                       
                     title: '<strong>Correcto!</strong>',
                     icon: 'success',
                    text:   'Registro agregado correctamente ', 
                     
                     timer:2000
                   });
                   
                 
            $('#Formadsistema').trigger("reset");    
             }
   else  if(data==2)
                {
Swal.fire({ confirmButtonText:      'Aceptar',
                       
                     title: '<strong>Opps!</strong>',
                     icon: 'error',
                    text:   'Datos no procesados', 
                     
                     timer:2000
                   });
                }

else if(data==3)
       
     {       Swal.fire({ confirmButtonText:      'Aceptar',
                       
                     title: '<strong>Opps!</strong>',
                     icon: 'error',
                    text:   'Imagen no procesada solo png o jpg', 
                     
                     timer:2000
                   });
                   
               $('#Formadsistema').trigger("reset");    
             }

                if(data==7)
                {
Swal.fire({ confirmButtonText:      'Aceptar',
                       
                     title: '<strong>Opps!</strong>',
                     icon: 'error',
                    text:   'Ya existe un registro elimine o edite para agregar nuevo', 
                     
                     timer:2000
                   });
                }


         
      }
      
        });

    
    });  
  
  }
  
  
       var editardatos = function () {
    $("#Formeditsistema").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize(); 
     Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',
     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',  
});     
    $.ajax({
            type: 'POST',
            url: 'model/updatesistema.php',
            data: new FormData(this),
              contentType: false,
            cache: false,
            processData:false, 
            dataType: "json",   
            success: function(data){ 

                if(data==1)
       
     {       Swal.fire({ confirmButtonText:      'Aceptar',
                       
                     title: '<strong>Correcto!</strong>',
                     icon: 'success',
                    text:   'Registro actualizado ', 
                     
                     timer:2000
                   });
                   
                 
            $('#Formeditsistema').trigger("reset");    
              cargarsistema();}


else if(data==3)
       
     {       Swal.fire({ confirmButtonText:      'Aceptar',
                       
                     title: '<strong>Opps!</strong>',
                     icon: 'error',
                    text:   'Imagen no procesada solo png o jpg', 
                     
                     timer:2000
                   });
                   
                 
            $('#Formeditsistema').trigger("reset");    
             }



              else {
  Swal.fire({ confirmButtonText:      'Aceptar',
                       
                     title: '<strong>Correcto!</strong>',
                     icon: 'success',
                    text:   data, 
                     
                     timer:2000
                   });
                   
}


  
      }
      
        });

    
    });  
  
  }
  
  
