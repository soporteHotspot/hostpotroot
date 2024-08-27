


 
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
<div class="container-fluid bg-light p-1 border">



  <button id="updateventas" onclick=" Ventas();" type="button" class="btn btn-primary ml-2"> <i class="fa fa-sync "></i></button>
 

</div>
  <!-- endd header  -->
 
    </section>
     <!-- /.end -->
  <!-- secion de loader  -->
  <section id="loader" class="content">
 
      
 
    </section>
 
    <!-- secion de contenido body -->
    <section id="contbody" class="content">
 
      
 <!-- termina seccion de contenido body -->
    </section>
   
	
	<!-- termina contenido ajustado en panel -->
  </div>
  <?php 

include_once('includes/formularios.php');
include_once('includes/formulariosdelete.php');


?>

 <?php 

include_once('includes/script.php');
 

?>
 
<?php 

include_once('includes/footer.php');
 

?>
<script>
$(document).ready(function () {
        
       Ventas();
       Deleteventa();
       regbtn();
 
    });

 
  
  
  var Mostraridventas = function (id) {        
        if (!/^([0-9])*$/.test(id)) {
            return false
        } else {
            $.ajax({
                url: "model/buscarventa.php",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
          $('#idventa').val(data.id);
           $('#userventa').val(data.user);                                    
         
                }
            });
        }
    }
  

 
  

        var Deleteventa = function () {
        $('#Formdeleteventas').submit(function (e) {
            e.preventDefault();     
      $('#errordeleteventas').html('<div class="alert alert-warning alert-dismissible fade show mt-2 mt-2" role="alert"> <strong>Procesando <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
      var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/removeventa.php",
                data: datos,
                success: function (data) {
        Ventas();
                  $('#errordeleteventas').html(data);
          $('#ipR').html("");
          $('#nombreR').html("");
          $('#Formdeleteventas').trigger("reset");         
                }
        
        
        
            });
      
      }, 1000);
        });
    } 
   
        var Ventas= function (e) { 
    
              $('#updateventas').html('<i class="fa fa-sync  fa-spin  fa-fw  "></i> '); 
        
    $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning mt-2" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando fichas vendidas</strong></div>'); 
            $.ajax({
                url: "view/ventas.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {
                $('#updateventas').html('<i class="fa fa-sync    fa-fw  "></i> ');                   
          $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTablerouter').DataTable({ responsive: true });       
                }
            });
     
       
    }


  

    var regbtn = function () {
        $('#Formaddbtn').submit(function (e) {
            e.preventDefault();
      $('#erroradbtn').html('<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert"> <strong>Procesando <i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i></strong></div>');
            var datos = $(this).serialize();
      setTimeout(function(){
            $.ajax({
                type: "POST",
                url: "model/agregarbtn.php",
                data: datos,
                success: function (data) {
                  Ventas();
                  $('#erroradbtn').html(data);
                  $('#Formaddbtn').trigger("reset");       
                }
        
            });
        }, 1000);
        });
    } 
       

</script>
