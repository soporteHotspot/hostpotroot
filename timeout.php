


 
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
 

 

 <button onclick="leercorte()" type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladcortevencidos">
<i class="fa fa-plus-square "></i> 
</button>


 <button  type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaloption">
  <i class="fas fa-money-check-alt   "></i>
</button>

  <button  onclick=" Getuptime();" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>
  </div>

 </div>




</section>
  <!-- endd header  -->
   <!-- seccion de botones-->
<section   class="content">
<div class="container-fluid bg-light p-1 border">
 
 

</div>
</section>
     <!-- /.end -->


<!-- Modal  ad  cortes   vencidos  -->
<div class="modal fade" id="Modaladcortevencidos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
   
        <h5 class="modal-title"  >Agregar corte vencidos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddcortevencidos"  >
    <!-- contenido-->
      <div class="modal-body">
    

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Fecha </span>
        </div>
        <input type="text"  readonly  class="form-control" value="<?php require("require/connect_db.php");


       
        $obtenerda=("SELECT * FROM sistema");
    $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        
             $zone=$data['zona'];

date_default_timezone_set($zone); $fecha=date("d/m/Y"); echo $fecha; ?>" name="fecha" required>
      </div>




 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Mikrotik </span>
        </div>
 <?php 
  if(isset($_SESSION['ip']))
{
    echo '<input type="text"  class="form-control" value="'.$_SESSION['ip'].'" name="mikrotik" required>';
            } 
             ?>


      </div>







 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Vendedor </span>
        </div>
  <input type="text" id="vendedoresperros2"  required name="vendedor" class="form-control" value="" placeholder="vendedor" >
     <button  onclick="obtenercomtimeoutvencidos()" type="button" class="btn btn-info"> <i class="fa fa-sync"></i></button>

      </div>


 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Responsable</span>
        </div>
        <input type="text"  readonly  class="form-control" value="<?php echo $_SESSION['username']; ?>" name="responsable" required>
      </div>





 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Total</span>
        </div>
        <input type="text" id="netoventasvencidos" class="form-control"  name="total" required>
      </div>


       <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Porcentaje</span>
        </div>
        <input  type="text" id="porcentaje2" class="form-control"  name="porcentaje" required>
      </div>

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Comision vendedor</span>
        </div>
        <input type="text" id="comision2" class="form-control"  name="comision" required>
      </div>
 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Diferencia</span>
        </div>
        <input type="text" id="diferencia2" class="form-control"  name="diferencia" required>
      </div>


 



 
 

  


<!-- error-->
  <div id="erroradcortevencidos" class="content mt-2">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitaddcortevencidos" type="submit"    class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin ad cortes vencidos  -->

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

<!-- Modal opcionestioimeout user-->
<div class="modal fade" id="Modaloption" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" ><i class="fa fa-comments"></i>   Comentarios  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <!-- contenido-->
      <div class="modal-body">



    <div class="alert">
  <strong>Comentarios</strong>
  </div>
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-info"  >Comentario</span>
  </div>
  <input type="text" id="comentlimituptime"  required name="comentario" class="form-control" value="" placeholder="Comentario" >
     <button  onclick="obtenercomtimeout()" type="button" class="btn btn-info"> <i class="fa fa-sync"></i></button>
</div>
 
 

<!-- error-->
  <div id="errorremovecomlimitup" class="content">
 </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
        <button type="button" onclick="updateteuserslm()"   class="btn btn-primary"><i class="fa fa-money-bill-alt"></i> Consultar</button>
  
        <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
        
      </div>
    
    </div>
  </div>
</div>

<!-- Fin Modal opciones timeout lotes user-->
  <?php 
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>

<script type="text/javascript" src="jsapp/timeout.js"></script>
 
