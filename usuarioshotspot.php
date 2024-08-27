


 
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
   
<div class="container-fluid bg-light p-1 border">
     
 <div class="row col-md-6 d-flex flex-row">
<button type="button" class="col-md-1 col-2 btn-primary p-2" data-toggle="modal" data-target="#Modallotescards">
   <i class="fas fa-user-plus   "></i>
</button>

  <button  type="button" class="col-md-1 col-2 btn-primary p-2" data-toggle="modal" data-target="#ModalH">
  <i class="fas fa-address-card    "></i>
</button>
  <button  type="button" class="col-md-1 col-2 btn-dark p-2" data-toggle="modal" data-target="#ModalF">
  <i class="fas fa-qrcode    "></i>
</button>

  <button  type="button" class="col-md-1 col-2 btn-danger p-2" data-toggle="modal" data-target="#Modalremovelotes">
  <i class="fas fa-trash    "></i>
</button>

<button id="updateusershp" type="button" class="col-md-1 col-2 btn-primary p-2"> <i class="fa fa-sync "></i></button>
 

<button onclick="mostrarPDF()"  type="button" class="col-md-1 col-2 btn-danger p-2"> <i class="fa fa-file-pdf "></i></button>
 <button  type="button" class="col-md-2 col-2 btn-success p-2" data-toggle="modal" data-target="#designcard">
   Personalizar
</button>
</div>
</div>



</section>

     <!-- /.end -->




<!-- Modal habilitar   -->
<div class="modal fade" id="Modaldisableduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
   
        <h5 class="modal-title"  >Cambio de estado </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formddeshabilitar" class="Cambiarestatus" >
    <!-- contenido-->
      <div class="modal-body">
     
  <strong id="askuser">¿Está seguro de cambiar el estado ?</strong>
   
<input id="estadocambiaruser" required type="hidden" class="form-control"  value=''  name="estado">
<input id="dataacambiaruser" required readonly   class="form-control form-control-lg  text-danger  bg-white text-center border border-light "  value=''  name="data">
 

  <div id="divedeestadouser"  class="alert  text-center mt-2">

Estado actual:
  <strong id="estadoactualdatauser"></strong>

   
  </div>


<!-- error-->
  <div id="errorcambioestadouser" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitestadoshpuser" type="submit"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal habilitar     -->
 







<!-- Modal y formulario para editar userhotspot mikrotik-->
<div class="modal fade" id="Modaledituserhp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar usuarios hotspot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formeditusuarioshotspot">
    <!-- contenido-->
      <div class="modal-body">

  
<input name="nombre1" id="useredithp0"  readonly required type="hidden" class="form-control" placeholder="Nombre de usuario" value="" >
  
       
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text    "><i class="fa fa-user"> </i> </span>
  </div>
<input name="nombre2" id="useredithp"  required type="text" class="form-control" placeholder="Nombre de usuario" value="" >
  
</div>

  <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text    "><i class="fa fa-lock"> </i> </span>
  </div>
<input name="password" id="pasedithp"  required type="password" class="form-control" placeholder="password" value="" >
 <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm"><input    id='toggleuh'  type="checkbox"   onchange='togglePassword(this);'></span>
  </div>
</div>
  
   
 



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fa fa-user-circle"> </i></span>
  </div>
<input id="perfilehp" name="perfil" required type="text" class="form-control" placeholder="perfil" value=""   >
 <button id="updateprofilehp" title="Obtener perfiles del mikrotik" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>

   <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fas fa-clock"> </i></span>
  </div>
<input id="tiempolimite"  name="tiempolimite"  type="text" class="form-control" placeholder="limit-uptime" value="" >
 
  
</div>
     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fa fa-comments"> </i></span>
  </div>
  <textarea id="comentuserhp" name="comentario" class="form-control"></textarea>
 
 
  
</div>







 

<!-- error-->
  <div id="erroredituserhp" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submitedithpot"  class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>
 


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

 

  <?php 
include_once('includes/main.php');
include_once('includes/formularios.php');
include_once('includes/formulariosdelete.php');
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>

<script type="text/javascript" src="jsapp/generador.js"></script>
<script type="text/javascript" src="jsapp/usuarioshotspot.js"></script>
<script type="text/javascript" src="jsapp/getqr.js"></script>
<script type="text/javascript" src="jsapp/getinfouserhp.js"></script>
<script src="js/canvas2image.js"></script>
<script src="js/html2canvas.min.js"></script>
<script type="text/javascript" src="jsapp/downimg.js"></script>
 <script type="text/javascript" src="jsapp/customcard.js"></script>
