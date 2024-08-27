


 
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
<div class="container-fluid bg-light p-1   ">

<div class="row col-md-6 d-flex flex-row">
 

 <button  title="leer ventas" onclick=" Ventas();" type="button" class="col-md-2 col-3 btn-success p-2 "> <i class="fa fa-sync "></i></button>
 <button title="leer estadisticas"  onclick="estadistica();" type="button" class="col-md-2 col-3 btn-primary  p-2 "> <i class="fa fa-sync "></i></button>
  
 
 <button   type="button" class="col-md-2 col-3 btn-danger p-2" data-toggle="modal" data-target="#Modaldeleteventas">
<i class="fa fa-trash "></i> 
</button>


  </div>

 </div>






</section>
  <!-- endd header  -->
 


<!-- Modal delete  ventas-->
<div class="modal fade" id="Modaldeleteventas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
   
        <h5 class="modal-title"   >Eliminar ventas de la base de datos del sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeleteventasv" >
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar registros del siguiente vendedor?</strong>
  </div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-success"  >Vendedor</span>
  </div>
  <input required type="text" id="vendedores"  required name="vendedor" class="form-control" value="" placeholder="Nombre vendedor"  >
     <button id="updatevendedor" type="button" class="btn btn-success"> <i class="fa fa-sync"></i></button>
</div>

 

<!-- error-->
  <div id="errordeleteventasv" class="content mt-2">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitdeletecard" type="submit"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal delete  ventas-->
<!-- Modal delete -->
<div class="modal fade" id="Modaldeletedata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="titledelete">   Eliminar </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeletedata">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong id="preguntadeletedata">¿Está seguro de eliminar el siguiente dato?</strong>
  </div>
<div  id="seedata" class="alert text-center alert-danger" role="alert">
  
</div>
 
<input type="hidden" class="form-control"  id="datadelete"   name="datadelete">



<!-- error-->
  <div id="errordeletedata" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit" id="submitdeletedata"  class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal delete data-->
     
   <?php 
include_once('includes/main.php');
include_once('includes/formularios.php');
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>


<script type="text/javascript" src="jsapp/ventas.js"></script>
<script type="text/javascript" src="jsapp/getqr.js"></script>
<script type="text/javascript" src="jsapp/getinfouserhp.js"></script>
 <script src="js/canvas2image.js"></script>
<script src="js/html2canvas.min.js"></script>
<script type="text/javascript" src="jsapp/downimg.js"></script>

 