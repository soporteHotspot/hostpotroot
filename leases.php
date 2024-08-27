





 
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
include_once('includes/seccionlink.php');

?> 

   
   <!-- seccion de botones-->
<section   class="content">
	     <!-- /start head -->
<div class="container-fluid bg-light p-1 border">
     <div class="row col-md-6 d-flex flex-row">
 <button  onclick="host()" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>
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

<script type="text/javascript" src="../jsapp/leases.js"></script>
<script type="text/javascript" src="../jsapp/bypass.js"></script>
 
