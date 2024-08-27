



<?php 
session_start();
if (@!$_SESSION['ip']) {
	header("Location:login");
}
include_once('includes/header.php');
include_once('includes/navbar.php');
include_once('includes/asidebartpv.php');
include_once('includes/seccionlink.php');

?> 

   
<section   class="content">
  <!-- /start head -->
<div class="container-fluid bg-light p-1 border">


<div class="row col-md-6 d-flex flex-row">
 
  <button  onclick="Cortes();" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>

</div></div>
</section>
     <!-- /.end -->

  <?php 
include_once('includes/main.php');
include_once('includes/formularios.php');
include_once('includes/formulariosdelete.php');
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
<script>
$(document).ready(function () {
        agregarcorte();
       Cortes();
       Eliminardata();
        
    });



     var Mostrardatadelete = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscarcorte.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
          $('#datadelete').val(data.id);
           $('#seedata').html(data.cantidad +" "+data.vendedor); 
          $('#titledelete').html(' Eliminar corte'); 
          $('#preguntadeletedata').html(' Está seguro de eliminar el siguiente corte?');                                    
         
                }
            });
        }
    }
  
  

 var Eliminardata = function () {

    $('#Formdeletedata').submit(function (e) {

            e.preventDefault();

             var sindato=$('#datadelete').val();

     if(sindato==""){

                $('#errordeletedata').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Por favor seleccione un registro</strong></div>');
            } 
            else {

              
            $("#submitdeletedata").prop('disabled', true); 
             $("#submitdeletedata").html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>  Espere');
      $('#errordeletedata').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Procesando <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
      var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/removecortevendedor.php",
                data: datos,
                success: function (data) { 
                   if (data==1){
            $('#errordeletedata').html('<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Registro eliminado exitosamente</strong></div>');
            $('#Formadeletehost').trigger("reset");           

            $("#submitdeletedata").prop('disabled', false); 
            $("#submitdeletedata").html('Confirmar'); 
             $("#seedata").html('Eliminado'); 
             $('#datadelete').val("");          
         Cortes();
          }

    else if (data==2){
                       $("#submitdeletedata").prop('disabled', false); 
                       $("#submitdeletedata").html('Confirmar');                   
                       $('#errordeletedata').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>No se encontraron registros</strong></div>');
                       $('#Formdeletedata').trigger("reset");
                       $("#seedata").html('Error!');  
          }
    else   if (data==3){
                        $("#submitdeletedata").prop('disabled', false);    
                        $("#submitdeletedata").html('Confirmar');                     
                        $('#errordeletedata').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Error de conexión</strong></div>');
                        $('#Formdeletedata').trigger("reset");
                        $("#seedata").html('Error!');

          }
          else {
            $("#submitdeletedata").prop('disabled', false);
            $("#submitdeletedata").html('Confirmar'); 
            $('#errordeletedata').html(data);
            $('#Formdeletedata').trigger("reset");
            $("#seedata").html('Error!');
          
          }
   
          
         
            
          
                }
        
        
        
            });
      
      }, 1000);}
        });
    }  
 
   

   
        var Cortes= function (e) { 
    
    
        
    $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando cortes registrados</strong></div>'); 
            $.ajax({
                url: "view/entregas.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTablecortes').DataTable({ responsive: true });       
                }
            });
     
       
    }
    var leercorte = function () {      
            $.ajax({
                url: "model/leerventas.php",
                method: "POST",
                dataType: "json",               
                success: function (data) {          
                $('#netoventas').val(data);

                }
            });        
    }

 
  
       var agregarcorte = function () {
    $("#Formaddcorte").on('submit', function(e){
        e.preventDefault();   
    var data = $(this).serialize(); 
    $('#erroradcorte').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong> Validando datos espere  porfavor y no cierre la página<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
      $     
    $.ajax({
            type: 'POST',
            url: 'model/agregarcorte.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,           
            success: function(msg){ 
      setTimeout(function(){ 
             $('#erroradcorte').html(msg);
       $('#Formaddcorte').trigger("reset");    
         Cortes();

}, 1000);   
      }
      
        });

    
    });  
  
  }
</script>
