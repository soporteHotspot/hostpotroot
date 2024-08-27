


 
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
<button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladusers">
   <i class="fas fa-cog   "></i>
</button>



<button onclick="cargardatoscards()"   type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>

</div></div>
</section>
     <!-- /.end -->


<!-- Modal y formulario para agregar cards usuarios-->

<div class="modal fade" id="Modaladusers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered   " role="document">
    <div class="modal-content">
       <form  id="Formgenerarusuarios"  >   
     
      <div class="modal-header bg-success">

         <li class="fa fa-cog  fa-2x mr-4"></li>
        <h5 class="modal-title" id="exampleModalLongTitle">Configuración de tarjetas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">

      <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-success"  >Sucursal</span>
  </div>
  <input type="text" id="btnsucursales"  required name="sucursal" class="form-control" value="" placeholder="Nombre Sucursal o zona hotspot"  >
     <button id="updatesucursal" type="button" class="btn btn-success"> <i class="fa fa-sync"></i></button>
</div>

    
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-success"  >Server</span>
  </div>
  <input type="text" id="servers"  required name="servidor" class="form-control" value="all" placeholder="Nombre servidor"  >
     <button id="updateservers" type="button" class="btn btn-success"> <i class="fa fa-sync"></i></button>
</div>


     <div  class="input-group mb-1">
  <div id="perfiles" class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-success"  >Perfil</span>
  </div>
 
 <input type="text" id="btnprofile"  required name="perfil" class="form-control" placeholder="Nombre perfil"  > 
  
 <button id="updateperfil" type="button" class="btn btn-success"> <i class="fa fa-sync"></i></button>
</div> 

<div class="input-group mb-1">
  <div class="input-group-prepend">
<span  style="width:100px; "  class="input-group-text text-white bg-success  ">Precio</span>
  </div>
  <input required name="comentario"   class="form-control" type="text"   value=""> 
</div>
 

    


<div class="input-group border border-success mb-2">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-success"  >Tiempo</span>
  </div>  
  <input name="tiemponumber"   min="0" required type="number" class="form-control" value="0"   >
   <select name="tiempoword"  required class="form-control"  >
      <option value="m">Minutos</option>
      <option value="h">Horas</option>
      <option value="d">Días</option>
      
    </select>
  
</div>

 
<div class="input-group mb-1">
  <div class="input-group-prepend">
<span  style="width:100px; "  class="input-group-text text-white bg-success  ">Descripción</span>
  </div>
  <input required name="descripcion"   class="form-control" type="text"   value=""> 
</div>




    </div>
  </div>
  
    
 <div id="erroraduser"  class="modal-body">
      
   </div>
     

      </div>
      
      
      
      
      <div class="modal-footer">
      <button id="submitreg" type="submit" class="btn btn-success">Generar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
    
    </form>
  </div>
</div>  


<!-- Fin Modal y formulario para connfigurar cards usuarios-->

<!-- Modal y formulario para editar datos cards-->


<div class="modal fade" id="Modaleditcard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <form  id="Formeditcards"  >   
   
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Edición opciones tarjetas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
  <input type="hidden" id="idcardedit"    required name="id" class="form-control" value="" placeholder="idcard"  >
<div class="input-group mb-1">



    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white  "  >Sucursal</span>
  </div>
 <?php  

  require("require/connect_db.php");
  $obtenerda=("SELECT * FROM sucursal"); 
  $datax=mysqli_query($mysqli,$obtenerda);
    $checkid=mysqli_num_rows($datax);  
  
      if($checkid>0){
        print '<select required class="form-control" id="btnsucursales5" name="sucursal"> ';
              while($verdata=mysqli_fetch_array($datax)){
  
                     
        $id=$verdata['id'];
        $name=$verdata['nombre'];

        print '<option value="'.$id.'">'.$name.'</option>';


                }

                print '</select>';
        

      }  else   
 
{ 

  
      print '<input type="text" id="btnsucursales5"  required name="sucursal" class="form-control" value="" placeholder="Nombre Sucursal o zona hotspot"  >';        

}
                 ?>
     <button id="updatesucursal5" type="button" class="btn btn-success"> <i class="fa fa-sync"></i></button>
</div>






  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-light"  >Servidor</span>
  </div>
  <input type="text" id="servidorcard"    required name="servidor" class="form-control" value="" placeholder="Server"  >
</div>





  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-light"  >Perfil</span>
  </div>
  <input id="perfilcard" type="text" required name="perfil" class="form-control" value="" placeholder="Perfil" >
   <button id="updatecardedit" type="button" class="btn btn-light"> <i class="fa fa-sync"></i></button>
</div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-light"  >Precio</span>
  </div>
  <input type="text" id="preciocard"  required name="precio" class="form-control" value="" placeholder="Precio"  >
</div>

    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span id="tipobin" style="width:130px; " class="input-group-text text-white bg-light"  >Tiempo</span>
  </div>
 <input type="text" id="tiempocard"  required name="tiempo" class="form-control" value="" placeholder="Tiempo"  >
</div>
    
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span  style="width:130px;" class="input-group-text text-white bg-light"  >Descripcion</span>
  </div>
  <input type="text" id="descripcioncard" required name="descripcion" class="form-control" value="" placeholder="Comentario" >
   
</div>
    </div>
  </div>
  
    
 <div id="erroreditcards"  class="modal-body">
      
   </div>
     

      </div>
    
    
    
    
      <div class="modal-footer">
    <button id="submiteditcard" type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  
  </form>
  </div>
</div>  

<!-- Fin Modal y formulario para editar datoscard-->
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

<script type="text/javascript" src="jsapp/mayoreo.js"></script>

