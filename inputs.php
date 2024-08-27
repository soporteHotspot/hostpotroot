


 
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
<div class="container-fluid bg-light p-1 border">

 <div class="row col-md-6 d-flex flex-row">
   <button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladboton">
<i class="fa fa-cog "></i> 
</button>
  <button  onclick=" botones();" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>
 </div> </div>
</section>
     <!-- /.end -->

<!-- Modal  ad bnt     -->
<div class="modal fade" id="Modaladboton" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
    <li class="fa fa-cog text-light fa-2x mr-4"></li>
        <h5 class="modal-title" id="exampleModalLongTitle">Configurar botones </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddbtn"  >
    <!-- contenido-->
      <div class="modal-body">
       <div class="input-group  ">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text   "  >Sucursal</span>
  </div>
  <input type="text" id="btnsucursales2"  required name="sucursal" class="form-control" value="" placeholder="Nombre Sucursal o zona hotspot"  >
     <button id="updatesucursal2" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>





       <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Servidor</span>
        </div>
        <input type="text" id="servidorbtnedit" class="form-control" name="servidor"  placeholder="Servidor" required>
         <button id="loadserverbtn" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Perfil</span>
        </div>
        <input type="text" id="perfilbtnedit" class="form-control" name="perfil"  placeholder="Perfil" required>
         <button id="loadperfilesbtn" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
      </div>


 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Nombre</span>
        </div>
        <input type="text"  class="form-control" name="nombre"   placeholder="Nombre eje. Ficha 1 Hora" required>
      </div>

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Tiempo</span>
        </div>      
<input name="tiemponumber"   min="0" required type="number" class="form-control"   >
   <select name="tiempoword"  required class="form-control"  >
      <option value="m">Minutos</option>
      <option value="h">Horas</option>
      <option value="d">Días</option>
      
    </select>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Precio</span>
        </div>
        <input type="text"  class="form-control"  name="precio" placeholder="Eje. 5" required>
      </div>



 

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;"   class="bg-primary input-group-text" >Longitud</span>
        </div>
        <input type="number"  min="1" max="20"  class="form-control" name="longitud"  placeholder="longitud de los usuarios" value="8" required>
      </div>


 
 

  


<!-- error-->
  <div id="erroradbtn" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitbtnventas" type="submit"    class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin ad bnt    -->

<!-- Modal  edit bnt     -->
<div class="modal fade" id="Modaleditboton" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
   
        <h5 class="modal-title" id="exampleModalLongTitle">Editar botones </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formeditbtn"  >
    <!-- contenido-->
      <div class="modal-body">
    
<input type="hidden" id="idbntedit" class="form-control" name="idbtn"   >



  <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Sucursal</span>
        </div>
     <?php  

  require("require/connect_db.php");
  $obtenerda=("SELECT * FROM sucursal"); 
  $datax=mysqli_query($mysqli,$obtenerda);
    $checkid=mysqli_num_rows($datax);  
  
      if($checkid>0){
        print '<select required class="form-control" id="btnsucursales6" name="sucursal"> ';
              while($verdata=mysqli_fetch_array($datax)){
  
                     
        $id=$verdata['id'];
        $name=$verdata['nombre'];

        print '<option value="'.$id.'">'.$name.'</option>';


                }

                print '</select>';
        

      }  else   
 
{ 

  
      print '<input type="text" id="btnsucursales6"  required name="sucursal" class="form-control" value="" placeholder="Nombre Sucursal o zona hotspot"  >';        

}
                 ?>
         <button id="updatesucursal6" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Nombre</span>
        </div>
        <input type="text" id="nombrebtnedit" class="form-control" name="nombre"   placeholder="Nombre eje. Ficha 1 Hora" required>
      </div>



       <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Servidor</span>
        </div>
        <input   type="text" id="servidorbtnedit2" class="form-control" name="Servidorhp"  placeholder="Servidor" required>
         <button id="loadserverbtn2" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Perfil</span>
        </div>
        <input   type="text" id="perfilbtnedit2" class="form-control" name="perfil"  placeholder="Perfil" required>
         <button id="loadperfbtn2" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Tiempo</span>
        </div>
        <input type="text" id="tiempobtnedit" class="form-control" name="tiempo" value="0d 00:00:00"  placeholder="eje. 0d 00:00:00" required>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Precio</span>
        </div>
        <input type="number" id="preciobtnedit" class="form-control"  name="precio" placeholder="Eje. 5" required>
      </div>



 

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;"   class="bg-primary input-group-text" >Longitud</span>
        </div>
        <input type="text" id="longitudbtnedit" class="form-control" name="longitud"  placeholder="longitud de los usuarios" value="8" required>
      </div>


 
 

  


<!-- error-->
  <div id="erroreditbtn" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submiteditbtn" type="submit"    class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin modal editar bnt    -->

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
<script type="text/javascript" src="jsapp/inputs.js"></script>

