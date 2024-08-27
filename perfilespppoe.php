






 
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
<button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#ModaladprofilePPPoE">
<i class="fas fa-user-plus   "></i> 
</button>   <button  onclick="profilepppoe()" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync  "></i></button>
</div></div>


<!-- Modal y formulario para editar  perfppp mikrotik-->
<div class="modal fade" id="Modaleditperfilppp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
        <h5 class="modal-title" id="titleeppp">Editar perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formedicionperfilppp">
    <!-- contenido-->
      <div class="modal-body">

<input name="name1" id="name1"  required type="hidden" class="form-control" placeholder="Nombre perfil" value="" >
            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text    "><i class="fa fa-user-cog"> </i> </span>
  </div>
<input name="name2" id="name2"  required type="text" class="form-control" placeholder="nombre del perfil" value="" >
 
</div>

   
  
   
 
   <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fa fa-circle"> </i></span>
  </div>
<input id="poollocaledit" name="poollocal" required type="text" class="form-control" placeholder="pool local" value=""   >
 <button id="updatepooll" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fa fa-circle"> </i></span>
  </div>
<input id="poolremotoedit" name="poolremoto" required type="text" class="form-control" placeholder="poll remoto" value=""   >
 <button id="updatepoolr" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>

 
     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fa fa-download"> </i></span>
  </div>
<input id="velocidadp" name="velocidad"   type="text" class="form-control" placeholder="velocidad" value="" >
 
  
</div>







 

<!-- error-->
  <div id="erroreditperfilppp" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submiteditperfilppp"  class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para editar perf mikrotikr-->

</section>
     <!-- /.end -->


<!-- Modal y formulario para agregar Perfiles PPPoE-->
<div class="modal fade" id="ModaladprofilePPPoE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar perfil PPPoE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="FormaddProfilePPPoE">
      <!-- contenido-->
      <div class="modal-body">
      
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Nombre </span>
  </div>
<input name="nombre" required type="text" class="form-control" placeholder="Nombre de perfil" value="" >
 
</div>

      <div class="input-group mb-1">  
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Pool-local </span>
  </div>
 
<input id="poollocal" name="local" required type="text" class="form-control" placeholder="" value="" >
  <button id="updatepool1" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Pool-remoto</span>
  </div>
<input id="poolremoto" name="remoto" required type="text" class="form-control" placeholder="" value="" >
  <button id="updatepool2" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Velocidad (rx/tx)</span>
  </div>
<input name="velocidad" required type="text" class="form-control" placeholder="Ej. 500K/1M" value="" >
 
</div>







 

<!-- error-->
  <div id="erroradperfilPPP" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
        <!-- end contenido-->
      <div class="modal-footer">
      <button type="submit"  id="submitadPPP"  class="btn btn-primary">Generar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
      
      </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar pper-->

<!-- Modal delete perfiles ppp-->
<div class="modal fade" id="ModaldelPPPoE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-times"></i>   Eliminar perfil PPPoE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="Formdeleteperfilppp">
      <!-- contenido-->
      <div class="modal-body">
      <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente perfil?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <h2 id="nameperfilpppoe"> </h2>
</div>
 
<input type="hidden" class="form-control"  id="nombreppoe" readonly name="nombre">



<!-- error-->
  <div id="errordeleteperfipppp" class="content">
 
      
 
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

<!-- Fin Modal delete perfiles ppp-->


  <?php 
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
    <script type="text/javascript" src="../jsapp/perfilesppp.js"></script>
