$(document).ready(function () {
  cargarbotones();

       

    });




var bg = ["bg-danger ","bg-purple ","bg-primary ","bg-cyan ","bg-black ","bg-secondary ","bg-success ", "bg-Fuchsia ","bg-indigo ","bg-maroon ","bg-olive " ,"bg-lime ","bg-teal","bg-pink "];
     
 var iconos= function(){
 $( ".iconos" ).each(function() {
 
 var rand = bg[Math.floor(Math.random() * bg.length)];
  var rand = bg[Math.floor(Math.random() * bg.length)];

  $( this ).addClass( rand );
  
 $( this ).width(34).height(34);

}); 

}   

   $(document).on('click', '.agregarventa', function(e){

    e.preventDefault();   
    var id=$(this).attr('id'); 
    var timer=$(this).attr('limittime'); 
     Swal.fire({ iconHtml: '<div class="fa fa-user-circle   fa-beat-fade  text-primary "></div>',

     confirmButtonText:
    'Aceptar',
  html: ' <strong>Generando usuario de '+timer+' </strong>',
  icon: 'info',
    
  
  
});
  

    $('#evento'+id).html('<i class="iconos rounded-circle p-2 fa border fa-2x fa-solid fa-beat-fade fa fa-spinner fa-spin " aria-hidden="true"></i>'); 

  iconos();

$(".working").addClass( rand );
  $(".working").width(34).height(34);

$('#'+id).prop( "disabled", true );
    var parametro = {
                "id" : id,
                
        };


            $.ajax({ data:  parametro,
                url: "model/agregarventa.php",
                type: "POST",
                dataType: "json",               
                success: function (data) {  

                  
if(data==4)
                    {   Swal.fire({
                        
                        confirmButtonColor: '#A00F00',
  confirmButtonText: 'Aceptar',
  icon: 'error',
  title: 'Oops...',
  text: 'Error de conexión con MikroTik',  
  timer: 1500
});
$('#'+id).prop( "disabled", false );
$('#evento'+id).html('<i class="iconos rounded-circle p-2 fas fa-2x border border-light fa-hand-pointer"></i>');  
iconos();


                                 }

                                   else if(data==3)
                    { Swal.fire({   
                       
                        confirmButtonColor: '#A00F00',
  confirmButtonText: 'Aceptar',
  icon: 'error',
 
  text: 'Error! en nombre del perfil, actualice sus datos',
  timer: 2000
  
});$('#'+id).prop( "disabled", false );
   $('#evento'+id).html('<i class="iconos rounded-circle p-2 fas fa-2x border border-light fa-hand-pointer"></i>'); 
iconos();
                                 }


                                    else if(data==7)
                    { Swal.fire({   
                       
                        confirmButtonColor: '#A00F00',
  confirmButtonText: 'Aceptar',
  icon: 'error',
 
  text: 'Error! en empresa no se encontró ni un registro',
  timer: 2000
  
});$('#'+id).prop( "disabled", false );
   $('#evento'+id).html('<i class="iconos rounded-circle p-2 fas fa-2x border border-light fa-hand-pointer"></i>'); 
iconos();
                                 }
                  
                                    else {swal.close();
                                    var user=data.name;
                                    var clave=data.password;
                                  
                                   $('#evento'+id).html('<i class="iconos rounded-circle p-2 fas fa-2x border border-light fa-hand-pointer"></i>');
                                   $('#'+id).prop( "disabled", false );
                                     iconos();
                                                        
                                  $('#Modalpreviewuser').modal('show');                
                                  $('#titlesell').html('<i class="fa fa-user-circle"  aria-hidden="true"></i>  '+data.name); 
                                   $('#userx').html(data.name); 
                                     if (user==clave || clave==""){ 
                                   $("#divpass").removeClass("d-block");                                    
                                   $("#divpass").addClass("d-none");                                               
                                                                    
                                    }
                  
                  
                                   else if (user!=clave & clave!=""){
                                     $("#divpass").removeClass("d-none"); 
                                    $("#divpass").addClass("d-block");                  
                                        $('#clavex').html(data.password);
                                  
                                    }
                  
                                   $('#preciox').html(data.precio); 
                                   $('#tiempox').html(data.tiempo); 


                                 

new QRious({
			element: document.querySelector("#codigo"),
			value: 'http://'+data.ip+'/login?username='+data.name+'&password='+data.password,
			size: 400,
			backgroundAlpha: "#0831B2", // 0 para fondo transparente
			foreground: "#0831B2", // Color del QR
			level: "M", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
		});


                                   $('#usernamegenrated').val(data.name);
                                   
                                   leerventas();}




                }
            });
   


     
    
  }); 
     



        var cargarbotones= function (e) { 
    
    
        
   Swal.fire({ iconHtml: '<i class="fa fa-spinner fa-spin p-2"  ></i>',

     confirmButtonText:
    'Aceptar',
  title: '<strong>Cargando registros</strong>',
  icon: 'info',
    
  
  
});$.ajax({
                url: "view/botonestpv.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {    swal.close();   

          $('#contbody').html(data); 
           
                      $('#loader').html("");
                     $( "#contuser" ).addClass("collapsed-card");         
            $( "#contperfil" ).addClass("collapsed-card");
            
             
 $( ".agregarventa, .iconos" ).each(function() {
 

  var rand = bg[Math.floor(Math.random() * bg.length)];

  $( this ).addClass( rand );
  
 $(".iconos").width(35).height(35);

});

          
                }
            });
     
       
    }
  
  
 