



 
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
<button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladbinding">
   <i class="fas fa-user-plus   "></i> </button>  <button  onclick="binding()" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>

</div></div>
</section>
     <!-- /.end -->

<!-- Modal remove binding user-->
<div class="modal fade" id="Modalrembinding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" ><i class="fa fa-user-minus"></i>   Remover usuario binding</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="Formremovebinding">
      <!-- contenido-->
      <div class="modal-body">
      <div class="alert">
  <strong>¿Está seguro de remover el siguiente registro?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <h2 id="macbinding"> </h2>
</div>
 
<input type="hidden" class="form-control"  id="direcionmacbin"   name="mac">

<!-- error-->
  <div id="errorremovebinding" class="content">
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

<!-- Fin Modal remove binding user-->


  <?php 
include_once('includes/main.php');
include_once('includes/formularios.php');
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>

  <script type="text/javascript" src="../jsapp/bindinghp.js"></script>
