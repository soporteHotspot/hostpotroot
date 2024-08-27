


 
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
   <button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladrouter">
<i class="fa fa-server "></i> +
</button>
  <button  onclick=" MiKroTik();" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>


</div></div>
</section>
     <!-- /.end -->


<!-- Modal y formulario para agregar   router-->
<div class="modal fade" id="Modaladrouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar nuevo router</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Foradrouters">
    <!-- contenido-->
      <div class="modal-body">



      <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white  "  >Sucursal</span>
  </div>
  <input type="text" id="btnsucursales3"  required name="sucursal" class="form-control" value="" placeholder="Nombre Sucursal o zona hotspot"  >
     <button id="updatesucursal3" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>




    
     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Dir. IP</span>
  </div>
  <input id="dirip" name="dirip" required type="text" class="form-control" placeholder="ej. 192.168.50.1" value=""   >

   <button id="updateip" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Usuario</span>
  </div>
  <input id="usersmikrotik" name="nombre" required type="text" class="form-control" placeholder="Nombre de usuario para mikrotik" value="" >
   <button id="updateusermikrotik" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Contraseña</span>
  </div>
  <input name="password"   type="text" class="form-control" placeholder="contraseña no es forzoso" value="" >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Nombre</span>
  </div>
  <input name="userm" required type="text" class="form-control" placeholder="Nombre completo del usuario" value=""  >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Puerto</span>
  </div>
  <input name="puerto" id="puertoapi" required type="text" class="form-control" placeholder="Puerto api" value=""   >

  <button id="updatepuerto" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>

 


<!-- error-->
  <div id="erroradrouter" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submitadr"  id="submitrouter"  class="btn btn-primary">Registrar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar routers-->

<!-- Modal edit   router-->
<div class="modal fade" id="ModaleditRouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar router</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="FormEditR">
    <!-- contenido-->
      <div class="modal-body">
   
   
<input type="hidden" class="form-control" id="ideR"   name="id">
 
   <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white  "  >Sucursal</span>
  </div>
   <?php  

  require("require/connect_db.php");
  $obtenerda=("SELECT * FROM sucursal"); 
  $datax=mysqli_query($mysqli,$obtenerda);
    $checkid=mysqli_num_rows($datax);  
  
      if($checkid>0){
        print '<select required class="form-control" id="btnsucursales4" name="sucursal"> ';
              while($verdata=mysqli_fetch_array($datax)){
  
                     
        $id=$verdata['id'];
        $name=$verdata['nombre'];

        print '<option value="'.$id.'">'.$name.'</option>';


                }

                print '</select>';
        

      }  else   
 
{ 

  
      print '<input type="text" id="btnsucursales4"  required name="sucursal" class="form-control" value="" placeholder="Nombre Sucursal o zona hotspot"  >';        

}
                 ?>
     <button id="updatesucursal4" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text" id="basic-addon1">IP</span>
  </div>
<input type="text" class="form-control" id="ipeR"   name="ip">
</div>


 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text" id="basic-addon1">Nombre</span>
  </div>
<input type="text" class="form-control" id="nombreeR" placeholder="nombre del cliente"   name="nombre">
</div>


 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text" id="basic-addon1">Usuario</span>
  </div>
<input type="text" class="form-control" id="usuarioeR" placeholder="usuario mikrotik"   name="usuario">
</div>

 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text"  >Contraseña</span>
  </div>
<input type="password" class="form-control" id="passwordeditR"   name="password">
<div class="input-group-prepend">
    <span class="input-group-text"  ><input    id='toggler'  type="checkbox"   onchange='togglePassword(this);'></span>
  </div>
</div>
 
 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text"  >Puerto</span>
  </div>
<input type="text" class="form-control" id="puertoeditR"   name="puerto">
 
</div>
 




<!-- error-->
  <div id="erroreditrouter" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submisaver"  class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal edit routers-->

<!-- Modal delete   router-->
<div class="modal fade" id="ModaledRouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="FormdeleteR">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente registro?</strong>
  </div>
 <input id="idR" type="hidden" name="id">
 
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text" id="basic-addon1">IP</span>
  </div>
<input type="text" class="form-control" id="ipR" readonly name="ip">
</div>
 
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span style="width:100px;" class="input-group-text" id="basic-addon1">Nombre</span>
  </div>
<input type="text" class="form-control"  id="nombreR" readonly name="nombre">
</div>


<!-- error-->
  <div id="errordeleterouter" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal delete routers-->





  <?php 
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
 <script type="text/javascript" src="jsapp/router.js"></script>