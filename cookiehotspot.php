


 
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
 <button  onclick="cokiehp()" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>
</div></div>
</section>
     <!-- /.end -->


<!-- Modal remove cookie user-->
<div class="modal fade" id="Modalremcookieuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-minus"></i>   Remover usuario kookie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="Formremovecookieuserhp">
      <!-- contenido-->
      <div class="modal-body">
      <div class="alert">
  <strong>¿Está seguro de remover el siguiente usuario?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <h2 id="nombrecookie"> </h2>
</div>
 
<input type="hidden" class="form-control"  id="nombrecookieactivo"   name="nombre">

<!-- error-->
  <div id="errorremovecookiehp" class="content">
 </div>
<!-- errior-->

      </div>
        <!-- end contenido-->
      <div class="modal-footer">
      <button type="submit"   class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
      
      </form>
    </div>
  </div>
</div>

<!-- Fin Modal remove cookie user-->



 
  <?php 
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
 
 <script type="text/javascript" src="jsapp/cookieshotspot.js"></script>