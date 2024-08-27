
$(document).ready(function () { 

  
Loading(1000).init();

$(".loading").fadeOut();

leerhp();
leerpppoe(); 
leerventas();
 
  $(".modal-content").draggable();
       
      });


var Loading = (loadingDelayHidden = 0) => {

    //-----------------------------------------------------
    // Variables
    //-----------------------------------------------------
    // HTML
    let loading = null;
    // Retardo para borrar
    const myLoadingDelayHidden = loadingDelayHidden;
    // Imágenes
    let imgs = [];
    let lenImgs = 0;
    let counterImgsLoading = 0;

    //-----------------------------------------------------
    // Funciones
    //-----------------------------------------------------

    /**
     * Método que aumenta el contador de las imágenes cargadas
     */
    function incrementCounterImgs() {
        counterImgsLoading += 1;
        // Comprueba si todas las imágenes están cargadas
        if (counterImgsLoading === lenImgs) hideLoading();
    }

    /**
     * Ocultar HTML
     */
    function hideLoading() {
        // Comprueba que exista el HTML
        if(loading !== null) {
            // Oculta el HTML de "cargando..." quitando la clase .show
            loading.classList.remove('show');

            // Borra el HTML
            setTimeout(function () {
                loading.remove();
            }, myLoadingDelayHidden);
        }

    }

    /**
     * Método que inicia la lógica
     */
    function init() {
        /* Comprobar que el HTML esté cargadas */
        document.addEventListener('DOMContentLoaded', function () {
            loading = document.querySelector('.loading');
            imgs = Array.from(document.images);
            lenImgs = imgs.length;

            /* Comprobar que todas las imágenes estén cargadas */
            if(imgs.length === 0) {
                // No hay ninguna
                hideLoading();
            } else {
                // Una o más
                imgs.forEach(function (img) {
                    // A cada una le añade un evento que cuando se carge la imagen llame a la funcion incrementCounterImgs
                    img.addEventListener('load', incrementCounterImgs, false);
                });
            }
        });
    }

    return {
        'init': init
    }
}

// Para usarlo se declara e inicia. El número es el tiempo transcurrido para borra el HTML una vez cargado todos los elementos, en este caso 1 segundo: 1000 milisegundos,
	
	  		function leerhp(){

   $.ajax({
                url: "live/hp.php",
                method: "POST",
                dataType: "json",                 
                success: function (data) {					 				
					$('#hp').html(data); 

					 
                     
 }
            });
			
		 
	}
	
      function leerventas(){

   $.ajax({
                url: "live/leerventas.php",
                method: "POST",
                dataType: "json",                 
                success: function (data) {                  
          $('#nventas').html(data); 

           
                     
 }
            });
      
     
  }
  
 
	
		function leerpppoe(){
	
         $.ajax({
                url: "live/pppoe.php",
                method: "POST",
                dataType: "json",                 
                success: function (data) {

					
					$('#pppoe').html(data); 
					 
                     
 },

        
    
 
            });
   
  
	}
	
	    var latino = {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
	
	
	
	
	
	
	
	
 


 
	    var Vertrafico= function () { 
                
        $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando datos aguarde un momento</strong></div>'); 
            $.ajax({
                url: "view/traficored.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                                  
                    $('#contbody').html(data);                   
                      $('#loader').html("");
                        $('#dataTablei').DataTable({ responsive: true });         
                     $("#contdashboard").addClass("collapsed-card");  
                     $('#page').html("Interfaces"); 
                }
            });
         
       
    }
    




	$('#about').click(function(event) {
    event.preventDefault();   
 
		$('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando contenido</strong></div>'); 
            $.ajax({
                url: "view/acercade.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {					 				
					$('#contbody').html(data); 
					$('#loader').html("");	
			 $('#page').html("Características");	
                }
            });
});
	 




	
		$('#updateservers').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/nombreservhotpot.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                 					
					$('#servers').replaceWith(data);		 
					
                    
                }
            });
});
	
	
 


  
    


	
	





	
     var dashboard= function () { 
	 $.ajax({ 
                url: "view/dashboard.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {					 				
					$('#contbody').prepend(data); 					 
                     
                }
            });
		 
       
    }
	
		    var Sistema= function () { 
		$( "#contsistema" ).remove();
        $( "#contuser" ).remove();	
        $( "#contdashboard" ).remove();			
		$('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando datos sistema</strong></div>'); 
            $.ajax({
                url: "view/sistema.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {					 				
					$('#contbody').prepend(data); 					 
                      $('#loader').html("");
                     	$('#dataTablesistema').DataTable({ responsive: true });  		  
					   $("#contdashboard").addClass("collapsed-card");
					  $('#page').html("Sistema");	
                }
            });
		 
       
    }
	
		    var ViewRouters= function () { 
				
		$('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargandorouters</strong></div>'); 
            $.ajax({
                url: "view/routers.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {					 				
					$('#contbody').html(data); 					 
                      $('#loader').html("");
                     	$('#dataTablerouter').DataTable({ responsive: true });  		  
					 $("#contdashboard").addClass("collapsed-card");  
					 $('#page').html("Routers");	
                }
            });
		 
       
    }
	
 






     



	
  

	
 
	
	
	

	
	
	
	
	
	    var Mostrariduser = function (nombre) {        
      
            $.ajax({
                url: "model/buscarusers.php",
                method: "POST",
                data: "{}",
                async: true,
                dataType: "json",
                data: {nombre: nombre},
                success: function (data) { console.log(data);
					 $('#errordeleteuserhp').html('');                                                
					$('#usernameu').html(data.name); 
					$('#nombreU').val(data.name);
                }
            });
        
    }
 

	


	
	
	
	   $(document).on('click', '.editbinding', function(e){
		e.preventDefault();		
	$('#erroreditbin').html("");
	var mac=$(this).val();		
    var ipb=$('#ip'+mac).val();
    var serverb=$('#server'+mac).val();
    var tipob=$('#tipo'+mac).val();
    var comentario=$('#com'+mac).val();
	$('#macbin').val(mac);
$('#ipbin').val(ipb);
$('#serverbin').val(serverb);
$('#tipobin').val(tipob);
$('#comentariobin').val(comentario);
});



	
		


		
     $(document).on('click', '.mostrarphp', function(e){
		e.preventDefault();
		var nombre=$(this).val();		
		$('#namedefault').val(nombre);
		
	});  
           

	
		
	
 
	
	  
	
	

	
		    var Mostraridetherff = function (per) {        
       
            $.ajax({
                url: "model/buscarether.php",
                method: "POST",
                dataType: "json",
                data: {id:per},
                success: function (data) {  console.log(data);					                                                 
					$('#idether').html(data.id); 
					$('#namedefault').val(data.name);
					$('#arp').val(data.arp);
					$('#comentario').val(data.comment);
                }
            });
        
    }
	
	
	    var MostraridperfilPPPoE = function (per) {        
       if (!/^([0-9])*$/.test(per)) {
            return false
        } else {
            $.ajax({
                url: "model/buscarpPPPoE.php",
                method: "POST",
                dataType: "json",
                data: {id:per},
                success: function (data) {  
					 $('#errordeleteperfipppp').html('');                                                
					$('#nameperfilpppoe').html(data.name); 
					$('#nombreppoe').val(data.name);
                }
            });
        
    }}
	
	
	
	
	
		$('#binding').click(function(event) {
    event.preventDefault();   

		$('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando registros binding.</strong></div>'); 
            $.ajax({
                url: "view/binding.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {					 				
					$('#contbody').html(data); 
					 $('#dataTablebinding').DataTable({ responsive: true });                   
             $('#loader').html("");	
			
                }
            });
});
		    var binding= function () {
				
		
		$('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando usuarios binding</strong></div>'); 
            $.ajax({
                url: "view/binding.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {					 				
					$('#contbody').html(data); 
					$('#loader').html('');	
                    $('#page').html("Usuarios en ip-binding");	
                   $('#dataTablebinding').DataTable({ responsive: true });   					
                }
            });
		 
       
    }

	


	
	
	
			    var EditarinterfacE= function () {
        $('#Formeditether').submit(function (e) {
            e.preventDefault();
			
$('#erroreditinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Procesando </strong></div>'); 
var datos = $(this).serialize();
			
            $.ajax({
                type: "POST",
                url: "model/editinterface.php",
                data: datos,
                success: function (data) { 
				setTimeout(function(){
					
					if (data==1){
				$('#erroreditinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Interface editado correctamente</strong></div>'); 		
				$('#Formeditether').trigger("reset");		 
                
				 perfilesPPPoE();
				}
else {

$('#erroreditinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error! conexion no establecida correctamente</strong></div>'); 	
}				
}, 1000);				  
                }
				
            });
				
        });
    }
	
	
	
	
	

	
	
		

	
	function viewpassword(){
		var cambio = $("#passwordeR");
		if(cambio.type = 'password'){
			 cambio.attr('type', 'text');
			$('#view').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		
		}
		else { 
		    
			cambio.attr('type', 'password');
			$('#view').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		
		}
	} 
	


	

	function voucherPDF(){	
		window.open( 
              "voucher/fichas.php", "_blank"); 
        } 
function archivo(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("preview").innerHTML = ['<div class="alert alert-primary" role="alert"> Selección </div> <img  width="100%" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
             
      document.getElementById('files').addEventListener('change', archivo, false);	
	  
	  
	  
	  
	  
	  function archivo2(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("preview2").innerHTML = ['<div class="alert alert-primary" role="alert"> Selección </div> <img  width="100%" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
             
      document.getElementById('files2').addEventListener('change', archivo2, false);	
	  
	  
	  	 
 
 

 