


 
<?php 
session_start();
if (@!$_SESSION['ip']) {
  header("Location:login");
}
if ($_SESSION['tipo']!="administrador") {
  header("Location:puntodeventa");
}
include_once('includes/header.php');
include_once('includes/navbar.php');
include_once('includes/asidebar.php');

?> 

   
  <div class="content-wrapper">
    <!-- seccion de navegacion -->
   <!-- Content Header (Page header) -->
    <section class="content-header p-2">
      <div class="container-fluid ">
        <div class="row mb-0">
          <div class="col-sm-6">
		 
            </div>
  
  
          <div class="col-sm-12 p-2 border">
		  
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active float-right"><a href="<?=$_SERVER['REQUEST_URI'];?>"><?=$_SERVER['REQUEST_URI'];?></a></li>
            </ol>
          </div>
        </div>
      </div>
	  
	   <!-- /start head -->
<div class="container-fluid bg-light p-1 border ">


<div class="dropdown ">
  <button class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-plus-square "></i> 
  </button>
  
    <button onclick="Viewqueuessimple()" type="button" class="btn btn-primary mb-1 mt-1"  >
<i class="fas fa-feather-alt "></i> Colas simples
</button>
    

    

      <button onclick="Viewtreequeues()" type="button" class="btn btn-primary mb-1 mt-1"  >
<i class="fas fa-tree "></i> Arbol de colas
</button>




    
    <button onclick="Viewtypesqueues()" type="button" class="btn btn-primary mb-1 mt-1"  >
<i class="fas fa-cannabis  "></i> Tipo de colas
</button>
    

  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modaladcolasimple"><i class="fas fa-feather-alt "></i> Colas simple</a>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modaladarbolcolas"><i class="fas fa-tree "></i>  Árbol de colas</a>
     <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modaladtipocolas"><i class="fas fa-cannabis  "></i> Tipo de colas</a>
    
    
  </div>
</div>


 
    
  

</div>
  <!-- endd header  -->
    </section>
     <!-- /.end -->
	 
	 
 
  <!-- secion de loader  -->
  <section id="loader" class="content">
 
      
 
    </section>
    <!-- secion de contenido body -->
    <section id="contbody"  class="content">
	




      
 <!-- termina seccion de contenido body -->
    </section>
   
	
	<!-- termina contenido ajustado en panel -->
  </div>
   

 <?php 

include_once('includes/script.php');
 

?>


<?php 

include_once('includes/footer.php');
 

?>
<script>



$(document).ready(function () {
        
       Viewqueuessimple();
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
      $('#erroreditinterface').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Procesando espere <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
      var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/updateinterfaz.php",
                data: datos,
                success: function (data) {


                if (data==1){ 
                  if(tipo=="ether"){
                    $('#erroreditinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Interfaz actualizado correctamente</strong></div>');     
        $('#Formeditinterfaz').trigger("reset");    
                $("#submiteditinterfaz").prop('disabled', false);
                Viewinterfacesether();
                  }

 else if(tipo=="bridge"){
                    $('#erroreditinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Interfaz actualizado correctamente</strong></div>');     
        $('#Formeditinterfaz').trigger("reset");    
                $("#submiteditinterfaz").prop('disabled', false);
                Viewinterfacesbridge();
                  }
 else if(tipo=="vlan"){
                    $('#erroreditinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Interfaz actualizado correctamente</strong></div>');     
        $('#Formeditinterfaz').trigger("reset");    
                $("#submiteditinterfaz").prop('disabled', false);
                Viewinterfacesvlan;
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
      $('#erroradbridge').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Procesando espere <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
      var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/agregarbridge.php",
                data: datos,
                success: function (data) {
                if (data==1){ Viewinterfacesbridge();
        $('#erroradbridge').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Bridge registrados correctamente</strong></div>');     
        $('#Formagregarbridge').trigger("reset");    
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
      
      }, 1000);
        });
    } 
  
  var agregarvlan = function () {
        $('#Formagregarvlan').submit(function (e) {
            e.preventDefault();   
$("#submitregvlan").prop('disabled', true);      
      $('#erroradvlan').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Procesando espere <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
      var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/agregarvlan.php",
                data: datos,
                success: function (data) {
                if (data==1){ Viewinterfacesvlan();
        $('#erroradvlan').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> VLAN registrados correctamente</strong></div>');     
        $('#Formagregarvlan').trigger("reset");    
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
      
      }, 1000);
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
 var Viewqueuessimple= function () { 
        
    $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando colas simples</strong></div>'); 
            $.ajax({
                url: "view/simplequeues.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);           
                      $('#loader').html("");
                      $('#dataTableque').DataTable({ responsive: true });       
       
          
                }
            });
     
       
    }
	 var Viewtreequeues= function () { 
				
		$('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando arbol de colas</strong></div>'); 
            $.ajax({
                url: "view/treequeues.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {					 				
					$('#contbody').html(data); 					 
                      $('#loader').html("");
                     	$('#dataTablearbolcolas').DataTable({ responsive: true });  		  
				
                }
            });
		 
       
    }
   var Viewtypesqueues= function () { 
        
    $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando tipos de colas</strong></div>'); 
            $.ajax({
                url: "view/typequeues.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
                     $('#contbody').html(data);           
                      $('#loader').html("");
                      $('#dataTabletiposcolas').DataTable({ responsive: true });       
          
                }
            });
     
       
    }




	     var Eleminarinterfbridge= function () {
        $('#Formdeleteinterfacebridge').submit(function (e) {
            e.preventDefault();
            $("#borrarinerfacebri").prop('disabled', true);
$('#errordeleteinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Procesando...</strong></div>'); 
var datos = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "model/deleteinterfaz.php",
                data: datos,
                success: function (data) { 
                
                if (data==1){  Viewinterfacesbridge();
                $('#errordeleteinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Interfaz eliminado correctamente</strong></div>');         
                $('Formdeleteinterfacebridge').trigger("reset");        
                $("#borrarinerfacebri").prop('disabled', false);
                 
                }
                else if (data==3){
                $('#errordeleteinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Error de conexión</strong></div>');         
                $('Formdeleteinterfacebridge').trigger("reset");        
                $("#borrarinerfacebri").prop('disabled', false);
                 
                }

                 else if (data==2){
                $('#errordeleteinterface').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> La interfaz ya se ha eliminado </strong></div>');         
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
$('#errordeletevlan').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Procesando...</strong></div>'); 
var datos = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "model/deleteinterfazvlan.php",
                data: datos,
                success: function (data) { 
                
                if (data==1){ 
                $('#errordeletevlan').html('<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Interfaz eliminado correctamente</strong></div>');         
                $('#Formdeleteinterfacesvlan').trigger("reset");        
                $("#borrarinerfacevlan").prop('disabled', false);
                  Viewinterfacesvlan();
                }
                else if (data==3){
                $('#errordeletevlan').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> Error de conexión</strong></div>');         
                $('#Formdeleteinterfacesvlan').trigger("reset");        
                $("#borrarinerfacevlan").prop('disabled', false);
                 
                }
                 else if (data==2){
                $('#errordeletevlan').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa  fa-check-circle" aria-hidden="true"></i> La interfaz ya se ha eliminado </strong></div>');         
                $('#Formdeleteinterfacesvlan').trigger("reset");        
                $("#borrarinerfacevlan").prop('disabled', false);
                 
                }
                
                
                
else {
$("#borrarinerfacevlan").prop('disabled', false);
$('#errordeletevlan').html('<div class="alert  customestile mt-1 mb-2 border  bg-danger" role="alert"><strong ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error al procesar datos </strong></div>');  
}               
                    
}
                
            });
                
        });
    }

</script>
