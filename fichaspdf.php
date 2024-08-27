


 
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

<button onclick="CargarArchivos()"   type="button" class="col-md-2 col-3 btn btn-outline-warning p-2"> <i class="fa fa-folder "></i></button>

</div></div>





</section>
     <!-- /.end -->


<!-- Modal delete PDF-->
<div class="modal fade" id="Modaldeletepdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-file"></i>   Eliminar PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="FormdeletePDF">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar el PDF?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <div id="namepdf"> </div>
</div>
 
<input type="hidden" class="form-control"  id="nombrecarpetadelete" readonly name="carpeta">
<input type="hidden" class="form-control"  id="nombrepdf" readonly name="nombre">



<!-- error-->
  <div id="errordeletepdf" class="content">
 
      
 
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

<!-- Fin Modal delete PDF-->



<!-- Modal delete carpeta-->
<div class="modal fade" id="Modaldeletecarpeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-folder"></i>   Eliminar Carpeta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeletecarpeta">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar la carpeta?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <h2 id="namecarpeta"> </h2>
</div>
 
<input type="hidden" class="form-control"  id="nombrecar" readonly name="nombre">



<!-- error-->
  <div id="errordeletecarpeta" class="content">
 
      
 
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

<!-- Fin Modal delete carpeta-->
  <?php 
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
<script type="text/javascript" src="jsapp/fichaspdf.js"></script>