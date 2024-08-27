





 
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
    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>  
   
    
    
	 <!-- /start head -->
<div class="container-fluid bg-light p-1 border">
    <div class="row col-md-6 d-flex flex-row">
     <button  onclick="leerficheros()" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>
 </div>
</div>
</section>
     <!-- /.end -->
 


<!-- Modal delete gz-->
<div class="modal fade" id="Modaldeleteitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-file"></i>   Eliminar archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeleteitem">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar archivo?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <div id="namepfile"> </div>
</div>
 
 
<input type="hidden" class="form-control"  id="nombrearchivo" readonly name="nombre">



<!-- error-->
  <div id="errordeleteitem" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
        <div class="btn-group">
    <button type="submit"   class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal delete fichero-->







<!-- Modal delete gz-->
<div class="modal fade" id="Modalrecoverysql" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-database"></i> Restaurar base de datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formrecoverysql">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>Para restaurar con el respaldo seleccionado, genere un código de verificación que se enviará al correo registrado</strong>
  </div>
<div  class="alert text-center alert-primary" role="alert">
  <div id="namepfiler"> </div>
</div>
 
 <input type="text" placeholder="código" required class="form-control text-center"  id="codigo"  name="code">


<input type="hidden" class="form-control"  id="nombrearchivor" readonly name="nombre">



<!-- error-->
  <div id="errorrecoverysql" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
<div class="btn-group">
           <button id="sendcode" type="button"   class="btn btn-primary">Generar código </button>
    <button type="submit"   class="btn btn-success">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>  </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal delete PDF-->


<!-- Fin Modal delete data-->
<!-- Fin Modal delete perfiles hotspot-->
  <?php 
include_once('includes/main.php');
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
 <script type="text/javascript" src="../jsapp/respaldo.js"></script>
 
