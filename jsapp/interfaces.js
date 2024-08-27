 


$(document).ready(function () {
        
       Viewinterfacesether();
       agregarbridge();       
       editarinterfaces();
        Eleminarinterfbridge();
        Eleminarinterfvlan();
        agregarvlan();
    });


       $(document).on('click', '.editinterface', function(e){
    e.preventDefault();
    
  $('#erroreditinterface').html("");
  var nombre=$(this).val();
  var tipo= $('#tipo'+nombre).val();
  var defautl= $('#default'+nombre).val();  
  var comentario= $('#comentario'+nombre).val();
  $('#namedefault').val(defautl);
  $('#nombreactual').val(nombre); 
    $('#newname').val(nombre); 
    $('#tipo').val(tipo);
    $('#comentariointerface').val(comentario); 
    
  });

    
     $(document).on('click', '.deleteinterfazbridge', function(e){

    
            var nombre=$(this).val();
          
        e.preventDefault();        
    $('#errordeleteinterface').html("");
   
   $('#nombrebridgedelete').val(nombre);   
    

  
        
    });


      $(document).on('click', '.deleteinterfazvlan', function(e){ 

   
            var nombre=$(this).val();
           
        e.preventDefault();     
    $('#errordeletevlan').html("");  
   $('#nombrevlandelete').val(nombre);   
    
 

        
    });
  


    var editarinterfaces = function () {
        $('#Formeditinterfaz').submit(function (e) {
            e.preventDefault();

            tipo=   $("#tipo").val(); 
$("#submiteditinterfaz").prop('disabled', true);      
    Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
});   var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/updateinterfaz.php",
                data: datos,
                success: function (data) {


                if (data==1){ 

                  if(tipo=="ether"){ $('.modal').modal('hide');
            Swal.fire({ confirmButtonText:
    'Aceptar',
    
  title: '<strong>Excelente registro atualizado </strong>',
  icon: 'success',
  
    timer:1500
  
}); $('#Formeditinterfaz').trigger("reset");    
                $("#submiteditinterfaz").prop('disabled', false);
                Viewinterfacesether();
                  }

 else if(tipo=="bridge"){
      $('.modal').modal('hide');
            Swal.fire({ confirmButtonText:
    'Aceptar',
    
  title: '<strong>Excelente registro atualizado </strong>',
  icon: 'success',
  
    timer:1500
  
}); $('#Formeditinterfaz').trigger("reset");    
                $("#submiteditinterfaz").prop('disabled', false);
                Viewinterfacesbridge();
                  }
 else if(tipo=="vlan"){
     $('.modal').modal('hide');
            Swal.fire({ confirmButtonText:
    'Aceptar',
    
  title: '<strong>Excelente registro atualizado </strong>',
  icon: 'success',
  
    timer:1500
  
});  $('#Formeditinterfaz').trigger("reset");    
                $("#submiteditinterfaz").prop('disabled', false);
                Viewinterfacesvlan();
                  }

        


         
        }


        else if (data==3){
        $('#erroreditinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Error de conexión</strong></div>');     
        $('#Formeditinterfaz').trigger("reset");    
                $("#submiteditinterfaz").prop('disabled', false);
         
        }
        
        
else {
$("#submiteditinterfaz").prop('disabled', false);
$('#erroreditinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error al actualizar verifique sus datos</strong></div>');  
}       
                
                }
        
        
        
            });
      
      }, 1000);
        });
    } 
  

  var agregarbridge = function () {
        $('#Formagregarbridge').submit(function (e) {
            e.preventDefault();   
$("#submitregb").prop('disabled', true);      
   Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
}); var datos = $(this).serialize();
     
            $.ajax({
                type: "POST",
                url: "model/agregarbridge.php",
                data: datos,
                success: function (data) {
                if (data==1){ Viewinterfacesbridge();
             Swal.fire({ confirmButtonText:
    'Aceptar',
    
  title: '<strong>Excelente nuevo bridge agregado</strong>',
  icon: 'success',
  
    timer:1500
  
}); $('#Formagregarbridge').trigger("reset");    
                $("#submitregb").prop('disabled', false);
         
        }
        else if (data==3){
        $('#erroradbridge').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Error de conexión</strong></div>');     
        $('#Formagregarbridge').trigger("reset");    
                $("#submitregb").prop('disabled', false);
         
        }
        
        
else {
$("#submitregb").prop('disabled', false);
$('#erroradbridge').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error al agregar bridge verifique sus datos</strong></div>');  
}       
                
                }
        
        
        
            });
      
     
        });
    } 
  
  var agregarvlan = function () {
        $('#Formagregarvlan').submit(function (e) {
            e.preventDefault();   
$("#submitregvlan").prop('disabled', true);      
    Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
});  var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregarvlan.php",
                data: datos,
                success: function (data) {
                if (data==1){ Viewinterfacesvlan();
           Swal.fire({ confirmButtonText:
    'Aceptar',
    
  title: '<strong>Excelente nuevo vlan agregado</strong>',
  icon: 'success',
  
    timer:1500
  
}); $('#Formagregarvlan').trigger("reset");    
                $("#submitregvlan").prop('disabled', false);
         
        }
        else if (data==3){
        $('#erroradvlan').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Error de conexión</strong></div>');     
        $('#Formagregarvlan').trigger("reset");    
                $("#submitregvlan").prop('disabled', false);
         
        }
        
        
else {
$("#submitregvlan").prop('disabled', false);
$('#erroradvlan').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error al agregar vlan verifique sus datos</strong></div>');  
}       
                
                }
        
        
        
            });
      
     
        });
    } 
  

    $('#updateinterfaces').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/getinterfaces.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                          
          $('#btnintrfaces').replaceWith(data);    
          
                    
                }
            });
});
 var Viewinterfacesvlan= function () { 
        
      $.ajax({
                url: "view/interfacesvlan.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {    swal.close();               
          $('#contbody').html(data);           
                      $('#loader').html("");
                      $('#dataTableivlan').DataTable({ responsive: true });       
       
          
                }
            });
     
       
    }
	 var Viewinterfacesether= function () { 
				
	  $.ajax({
                url: "view/interfacesether.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {		 swal.close();   			 				
					$('#contbody').html(data); 					 
                      $('#loader').html("");
                     	$('#dataTablei').DataTable({ responsive: true });  		  
				
                }
            });
		 
       
    }
   var Viewinterfacesbridge= function () { 
        
     $.ajax({
                url: "view/interfacesbridge.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {         swal.close();             
                     $('#contbody').html(data);           
                      $('#loader').html("");
                      $('#dataTablebridge').DataTable({ responsive: true });       
          
                }
            });
     
       
    }




	     var Eleminarinterfbridge= function () {
        $('#Formdeleteinterfacebridge').submit(function (e) {
            e.preventDefault();
            $("#borrarinerfacebri").prop('disabled', true);
Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
});var datos = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "model/deleteinterfaz.php",
                data: datos,
                success: function (data) { 
                
                if (data==1){  $('.modal').modal("hide");
 Viewinterfacesbridge();
                       Swal.fire({ 
                confirmButtonColor: '#108107',
  
  confirmButtonText: 'Aceptar',
  icon: 'success',
  title: 'Excelente',
  text: 'Interfaz eliminado', 
  timer:1500 
}); $('Formdeleteinterfacebridge').trigger("reset");        
                $("#borrarinerfacebri").prop('disabled', false);
                 
                }
                else if (data==3){
                 Swal.fire({
                                showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión con MikroTik',  
});
      $('Formdeleteinterfacebridge').trigger("reset");        
                $("#borrarinerfacebri").prop('disabled', false);
                 
                }

                 else if (data==2){
                                Swal.fire({
                                showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  icon: 'error',
  title: 'Oops...',
  text: 'Error dato no encontrado en MikroTik',  
});
      $('Formdeleteinterfacebridge').trigger("reset");        
                $("#borrarinerfacebri").prop('disabled', false);
                 
                }
                
                
else {
$("#borrarinerfacee").prop('disabled', false);
$('#errordeleteinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error al procesar datos </strong></div>');  
}               
                    
                    
                 
                    
                  
                }
                
            });
                
        });
    }


   var Eleminarinterfvlan= function () {
        $('#Formdeleteinterfacesvlan').submit(function (e) {
            e.preventDefault();
            $("#borrarinerfacevlan").prop('disabled', true);
Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Procesando </strong>',
  icon: 'info',
    
  
  
});var datos = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "model/deleteinterfazvlan.php",
                data: datos,
                success: function (data) { 
                
                if (data==1){ $('.modal').modal("hide");
                     Swal.fire({
                confirmButtonColor: '#108107',
  
  confirmButtonText: 'Aceptar',
  icon: 'success',
  title: 'Excelente',
  text: 'Interfaz eliminado', 
  timer:1500 
});   

 $('#Formdeleteinterfacesvlan').trigger("reset");        
                $("#borrarinerfacevlan").prop('disabled', false);
                  Viewinterfacesvlan();
                }
                else if (data==3){
                                 Swal.fire({
                                showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión con MikroTik',  
});
      $('#Formdeleteinterfacesvlan').trigger("reset");        
                $("#borrarinerfacevlan").prop('disabled', false);
                 
                }
                 else if (data==2){
                                         Swal.fire({
                                showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  icon: 'error',
  title: 'Oops...',
  text: 'Error dato no encontrado en MikroTik',  
});$('#Formdeleteinterfacesvlan').trigger("reset");        
                $("#borrarinerfacevlan").prop('disabled', false);
                 
                }
                
                
                
else {
$("#borrarinerfacevlan").prop('disabled', false);
                         Swal.fire({
                                showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  icon: 'error',
  title: 'Oops...',
  text: 'Error no definido',  
});}               
                    
}
                
            });
                
        });
    }

 