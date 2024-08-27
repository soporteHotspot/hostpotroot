


 
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

         <!-- seccion de botones-->
<section   class="content">
<div class="container-fluid bg-light p-1   ">

<div class="row col-md-6 d-flex flex-row">
 

 

    <button onclick="leercorte()" type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladcorte">
<i class="fa fa-plus-square "></i> 
</button>
  <button  onclick="Cortes();" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>





  </div>

 </div>




</section>
  <!-- endd header  -->
   <!-- seccion de botones-->
<section   class="content">
<div class="container-fluid bg-light p-1 border">
 
 

</div>
</section>


<section   class="content">
  <!-- /start head -->
<div class="container-fluid bg-light p-1 border">


</div>
</section>
     <!-- /.end -->

<!-- Modal  ad  cortes     -->
<div class="modal fade" id="Modaladcorte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
   
        <h5 class="modal-title"  >Agregar corte </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddcorte"  >
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
   require("require/connect_db.php"); 
     
     
        $consulta=("SELECT DISTINCT mikrotik FROM fichas");
    $datos=mysqli_query($mysqli,$consulta); 
  echo '<select id="mikrotikid" required  name="mikrotik" class="form-control" ';
  
  echo '<option value=""  >Seleccione mikrotik </option>';
 
             while($m=mysqli_fetch_array($datos)){            
              $nombre=$m['mikrotik'];
              
              
              if (isset($nombre)){                
                echo '<option>'.$nombre.'</option>';
              }
              }
              
              echo '</select>';
             
             ?>


      </div>







 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Vendedor </span>
        </div>
  <?php 
   require("require/connect_db.php"); 
     
     
        $consulta=("SELECT DISTINCT vendedor FROM fichas");
    $datos=mysqli_query($mysqli,$consulta); 
  echo '<select required id="vendedorperro" name="vendedor" class="form-control" >';
  
  echo '<option value="">seleccione vendedor</option>';
 
             while($vendedores=mysqli_fetch_array($datos)){            
              $nombre=$vendedores['vendedor'];
              
              
              if (isset($nombre)){                
                echo '<option value="'.$nombre.'">'.$nombre.'</option>';
              }
              }
              
              echo '</select>';
             
             ?>


      </div>


 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Responsable</span>
        </div>
        <input type="text"  readonly id="usernamecut" class="form-control" value="<?php echo $_SESSION['username']; ?>" name="responsable" required>
      </div>





 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Total</span>
        </div>
        <input type="text" id="netoventas" class="form-control"  name="total" required>
      </div>


       <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Porcentaje</span>
        </div>
        <input type="text" id="porcentaje" class="form-control"  name="porcentaje" required>
      </div>

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Comision vendedor</span>
        </div>
        <input type="text" id="comision" class="form-control"  name="comision" required>
      </div>
 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Diferencia</span>
        </div>
        <input type="text" id="diferencia" class="form-control"  name="diferencia" required>
      </div>


 



 
 

  


<!-- error-->
  <div id="erroradcorte" class="content mt-2">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitaddcorte" type="submit"    class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin ad cortes   -->
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
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>

<script type="text/javascript" src="jsapp/corte.js"></script>

