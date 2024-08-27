


 
<?php 

session_start();
if (@!$_SESSION['ip']) {
  header("Location:login");
}
if ($_SESSION['tipo']!="administrador") {
  header("Location:puntodeventa");
}

 $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    
if (!file_exists($PNG_WEB_DIR)) {
    mkdir($PNG_WEB_DIR, 0777, true);
  
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
   <button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladdsucursal">
<i class="fa fa-plus "></i> 
</button>
  <button  onclick="cargarsuc();" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync  "></i></button>

</div></div>





<!-- Modal -->
<div class="modal fade" id="Modaladdsucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar sucursal  o zona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="agregarsucursal">
      <div class="modal-body">
    

     <div class="form-row">

    <div class="form-group col-md-12">
      <label for="inputEmail4">Sucursal:</label>
      <input type="text" required  class="form-control" name="nombresucursal" placeholder="Nombre">
    </div>
    <div class="form-group col-md-12 ">
      <label for="inputPassword4">Dirrección:</label>
      <input required  type="text" class="form-control" name="direccioncursal"  placeholder="Direccion">
    </div>
  <div class="form-group col-md-12 ">
      <label for="inputPassword4">Texto:</label>
      <input required  type="text" class="form-control" name="texto"  value="Conéctate a la red Wi-Fi" placeholder="Texto tarjetas">
    </div>

  </div>




      </div>
      <div class="modal-footer">

        <div id="erroradsistema" class="col-md-12">
        </div>

         <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
       
      </div>

    </form>
    </div>
  </div>
</div>



<!-- Modal  editar sucursal-->
<div class="modal fade" id="Modaleditsucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar sucursal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="Formeditsucursal">
      <div class="modal-body">
    

     <div class="form-row">
<input type="text" id="idsucursaledit" hidden class="form-control" name="id" placeholder="id">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Sucursal:</label>
      <input id="nombresucursaledit" type="text" required  class="form-control" name="nombresucursal" placeholder="Nombre">
    </div>
    <div class="form-group col-md-12 ">
      <label for="inputPassword4">Dirrección:</label>
      <input id="dirsucursaledit" required  type="text" class="form-control" name="direccioncursal"  placeholder="Direccion">
    </div>
   <div class="form-group col-md-12 ">
      <label for="inputPassword4">Texto:</label>
      <input id="textosucursaledit" required  type="text" class="form-control" name="texto"  placeholder="Texto tarjetas">
    </div>

  </div>




      </div>
      <div class="modal-footer">

        <div id="erroradsistema" class="col-md-12">
        </div>

         <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
       
      </div>

    </form>
    </div>
  </div>
</div>



<!-- Modal  eliminar sucursal-->
<div class="modal fade" id="Modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar sucursal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="Formdeletesucursal">
      <div class="modal-body">
    

     <div class="form-row">
<input type="text" id="idsucursaldelete" required hidden  class="form-control" name="id" placeholder="id">
    <div class="form-group col-md-12">

    	¿Está seguro de eliminar el siguiente registro?
      <div id="nombresucursaldelete"  class="alert alert-danger text-center "> </div>
       
    </div>
    

  </div>




      </div>
      <div class="modal-footer">

        <div id="erroradsistema" class="col-md-12">
        </div>

         <button type="submit" class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
       
      </div>

    </form>
    </div>
  </div>
</div>



</section>
     <!-- /.end -->

  <?php 
  
///phpinfo(INFO_MODULES);
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
 <script type="text/javascript" src="jsapp/addsucursal.js"></script>
