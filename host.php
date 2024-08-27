





 
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
</div>
</section></section>
     <!-- /.end -->


     

<!-- Modal remove host mikrotik-->
<div class="modal fade" id="Modalremovehost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle">Remover host de lease</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formadeletehost">
    <!-- contenido-->
      <div class="modal-body">

      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-light">MAC</span>
  </div>
<input name="mac" id="machost" required type="text" class="form-control" placeholder="MAC" value="" >
 
</div>
    
 


<!-- error-->
  <div id="errorremovehost" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submithost"  class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin remove host->

  <?php 
include_once('includes/main.php');
include_once('includes/formularios.php');
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>

 <script type="text/javascript" src="../jsapp/host.js"></script> 
 <script type="text/javascript" src="../jsapp/bypass.js"></script>
 