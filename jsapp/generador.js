
$(document).ready(function () { 
       DeletePDF();
        Generarlotesusuarios();
      
    });


 function modelos(){
  var plantilla=$('#seeplantilla').val();

var radio1= $('#flexRadioDefault1');
 
var radio4= $('#flexRadioDefault4');
 

if (radio1.is(":checked")){ 


  $("#Formmodelos").attr("action","custom/"+plantilla);
}

 

else if (radio4.is(":checked")){  
  $("#Formmodelos").attr("action","voucher/fichasmpdf");
}

   
 
   
 }
 


  function modelosqr(){


var radio1= $('#flexRadio1');
var radio2= $('#flexRadio2');
var radio3= $('#flexRadio3');


if (radio1.is(":checked")){ 
    $("#formqrmodelos").attr("action","voucher/fichasmpdfqr");
}

else if (radio2.is(":checked")){    
    $("#formqrmodelos").attr("action","voucher/vouchersqr");
}
else if (radio3.is(":checked")){    
    $("#formqrmodelos").attr("action","voucher/ticketmpdfqr");
}



     
     
     
     
 }
 
 
     var Generarlotesusuarios= function () {
        $('#Formaddlotes').submit(function (e) {
            e.preventDefault();
      $("#submitlotes").prop('disabled', true);
      $("#submitlotes").html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>  Trabajando');


    Swal.fire({ 
        iconHtml: '<div class="fa fa-user-circle   fa-beat-fade  text-primary "></div>',

     confirmButtonText:
    'Aceptar',
  html: '<i class="fa fa-user-circle   text-primary " aria-hidden="true"></i>  <strong>Generando usuarios espere...</strong>',
  icon: 'info',
    
  
  
});

var datos = $(this).serialize();
      
            $.ajax({
                type: "POST",
                url: "model/agregaruser.php",
                data: datos,
                dataType: "json",
                success: function (data) { 

                //console.log(data);


    if(data==4)
    {  $("#submitlotes").html('Generar');
$("#submitlotes").prop('disabled', false);
   Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  title: '<strong>Error!</strong>',
  icon: 'error',
  text:   'Error de conexión',  
  
  
});

    }
      else if(data==5)
    {  $("#submitlotes").html('Generar');
$("#submitlotes").prop('disabled', false);
   Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: '#229406',
  title: '<strong>Correcto!</strong>',
  icon: 'success',
  text:   'Usuarios generados',  
  
  
});

    }
    
   else  if(data==3)
    {  $("#submitlotes").html('Generar');
$("#submitlotes").prop('disabled', false);
  Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
  title: '<strong>Error!</strong>',
  icon: 'error',
  text:   'Error en el nombre del perfil',  
  
  
});
    }


    
      else { 

 $('#Modallotescards').modal('hide');
        
 $("#submitlotes").html('Generar');
$("#submitlotes").prop('disabled', false);
Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',confirmButtonColor: '#078F1A',
  title: '<strong>Usuarios generados correctamente</strong>',
  icon: 'success',
    
  
  
});
var comentario = data.comentario;
var velocidad = data.velocidad;

$('#parametrotarjet').replaceWith('<input id="parametrotarjet" required type="text" class="form-control"  value="'+comentario+'"  name="parametro">');
$('#parametro').replaceWith('<input id="parametro" required type="text" class="form-control"  value="'+comentario+'"  name="parametro">');

$("#opcion option[value=comment").attr("selected",true);
$("#opciontarjet option[value=comment").attr("selected",true);
       
 
     leerventas();
     if( $('#genrarpdf').is(':checked') ) {
     GeneratePDF(comentario,velocidad); 
}
         


}
          
                }
        
            });
        
        });
    }






       function GeneratePDF(comentario,velocidad){  
        $("#submitlotes").html('Generando PDF');
       $("#submitlotes").prop('disabled', true);
  
           Swal.fire({ showConfirmButton:false, confirmButtonText:
    'Aceptar',
  title: '<strong><i class="fa   fa-file-pdf fa-flip    text-danger  " aria-hidden="true"></i></strong>',
   
  html:   '<div class="d-flex bg-danger bd-highlight">    <div class="p-2 flex-fill bd-highlight">Generando archivo</div> </div>',  
  
  
});
   $.ajax({
                url: "voucher/generatepdf.php",
                method: "POST",
                dataType: "json",
                data: {'comment': comentario, 'velocidad': velocidad},
                success: function (extract) {

                if(extract==5){
                     Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
  title: '<strong>Error!</strong>',
  icon: 'error',
  text: 'No se envio dato para generar el PDF',
    
  
  
});$("#submitlotes").html('Generar');
         $("#submitlotes").prop('disabled', false);
                } else
                   
{  $("#submitlotes").html('Generar');
         $("#submitlotes").prop('disabled', false);          
          Swal.fire({  
            showConfirmButton:false, showCancelButton: false,showCloseButton: true, confirmButtonText:
             'Aceptar',
           title: 'PDF generado correctamente',
           icon: 'success',
           
           html:   '<a class="btn   btn-outline-danger"  target="_blank" title="abrir '+extract.namefile+'" href="verpdf?pdf='+extract.pdf+'"><i class="fa fa-file-pdf    fa-3x "></i>  </a>', 
                
           
         });

               mostrarPDF();
                }         
         
                                          
                }
            });
}


     $('#updatelotes').click(function(event) {
            $('#updatelotes').html('<i class="fa fa-sync  fa-spin  fa-fw  "></i> '); 
    event.preventDefault();   
   $.ajax({ 
                url: "model/tiempocards.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                          $('#updatelotes').html('<i class="fa fa-sync   "></i> '); 
                         $('#tiemposlotes').replaceWith(data);  
                         Swal.fire({
  
  icon: 'success',
  title: 'Tiempos cargados',
  showConfirmButton: false,
  timer: 500
})  
          
                    
                }
            });
});
      $(document).on('change','#tiemposlotes', function(){
  var idcard = $(this).val();
   
    buscar_RB(idcard);
   
});

$(document).on('change','#nhojas', function(){
  var numh = $(this).val();
   
     var ntotal=numh*27;
   
    $('#cantidadv').val(ntotal);
   
});

    function buscar_RB(idcard){
   $.ajax({
                url: "model/getprecioslotes.php",
                method: "POST",
                dataType: "json",
                data: {id: idcard},
                success: function (data) {
                         
          $('#idcard').val(data.idcard);               
          
          $('#precioslotes').val(data.preciocard);  
           

          
                }
            });
}

   

   $('#updateperfil2').click(function(event) {
    event.preventDefault();
   $('#updateperfil2').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');    

var option=  $('#opcion').val();

  if (option=="profile"){
   $.ajax({ 
                url: "view/nombreperfiles2.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                    if(data==3){Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
});$('#updateperfil2').html('<i class="fa fa-sync    "></i> ');}   else
                   {$('#updateperfil2').html('<i class="fa fa-sync    fa-fw"></i> ');    
                                         $('#parametro').replaceWith(data);}         
            
                }
            });
      
      
  }
  
  else  if (option=="limit-uptime"){
    $('#updateperfil2').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');  
    
    $.ajax({ 
                url: "view/tiempos.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {

                if(data==3){Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
});$('#updateperfil2').html('<i class="fa fa-sync    "></i> ');}   else                  
           {$('#parametro').replaceWith(data); 
                        $('#updateperfil2').html('<i class="fa fa-sync    fa-fw"></i> ');  } 
                     
                }
            });
  }
  
  else  if (option=="comment"){

    $('#updateperfil2').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');  
    $.ajax({ 
                url: "view/comentarios.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) { 
                 if(data==3){Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
});$('#updateperfil2').html('<i class="fa fa-sync    "></i> ');}   else                  
          { $('#parametro').replaceWith(data); 
                          $('#updateperfil2').html('<i class="fa fa-sync    fa-fw"></i> ');}   
                     
                }
            });
  }
      
});


     $('#updateperfilT').click(function(event) {
    event.preventDefault();
   $('#updateperfilT').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');  

var option=  $('#opciontarjet').val();

  if (option=="profile"){
   $.ajax({ 
                url: "view/nombreperfiles3.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                     if(data==3){Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
});$('#updateperfilT').html('<i class="fa fa-sync    "></i> ');}   else
             {$('#parametrotarjet').replaceWith(data);         
                            $('#updateperfilT').html('<i class="fa fa-sync    "></i> ');}  
                }
            });
      
      
  }
  
  else  if (option=="limit-uptime"){
    $('#updateperfilT').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');  
    $.ajax({ 
                url: "view/tiempos3.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                 if(data==3){Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
});$('#updateperfilT').html('<i class="fa fa-sync    "></i> ');}   else                  
          { $('#parametrotarjet').replaceWith(data); 
                      $('#updateperfilT').html('<i class="fa fa-sync    "></i> ');  }
                     
                }
            });
  }
  
  else  if (option=="comment"){
     $('#updateperfilT').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');  
    $.ajax({ 
                url: "view/comentarios3.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                 if(data==3){Swal.fire({ showConfirmButton:true, confirmButtonText:
    'Aceptar',
    confirmButtonColor: ' #D30303',
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
});$('#updateperfilT').html('<i class="fa fa-sync    "></i> ');}   else                  
           {$('#parametrotarjet').replaceWith(data); 
                        $('#updateperfilT').html('<i class="fa fa-sync    "></i> '); } 
                     
                }
            });
  }
      
});

         var mostrarPDF =function(){

         $.ajax({
                url: "view/verpdfvendedor.php",
                method: "POST",
                dataType: "html",
                
                success: function (data) {
         

           $('#contbody').html(data);                                     
           $('#dataTablepdf').DataTable({ responsive: true });  
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
          
          if (data==1){
               Swal.fire({ confirmButtonText:
    'Aceptar',
     
  title: '<strong>PDF eliminado</strong>',
  icon: 'success',
    timer:1500
  
  
});

mostrarPDF();
 
    
  

              
$('#FormdeletePDF').trigger("reset");
 
          }
          
          
          else {
                  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Error! al eliminar el archivo',
  
});
          $('#Formdeleteuserhp').trigger("reset");
          
          }
          
                }
        
        
        
            });
      
      }, 1000);
        });
    }
   

   $(document).on('click', '#getphp', function(e){
    
e.preventDefault();  
 $('#getphp').html('<i class="fa fa-sync  fa-spin  fa-fw"></i> ');     
 Swal.fire({ iconHtml: '<div class="fa fa-user fa-fade  "></div>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Cargando estilos..</strong>',
  icon: 'info',
    
  
  
}); $.ajax({   cache:false,
               
                url: "model/consulta/getplantilla.php",
                type: "POST",
                dataType: "html",                 
                success: function (data) { swal.close(); 
 $('#getphp').html('<i class="fa fa-sync  "></i> ');    
$('#seeplantilla').replaceWith(data); 
  
                }
            });
    
  });  