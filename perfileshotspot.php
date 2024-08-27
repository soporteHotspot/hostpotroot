





 
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
   <button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladprofile">
<i class="fas fa-user-plus  "></i> 
</button>    <button  onclick="perfileshp()" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>
 </div>
</div>
</section>
     <!-- /.end -->



<!-- Modal y formulario para agregar Perfiles-->
<div class="modal fade" id="Modaladprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="FormaddProfile">
    <!-- contenido-->
      <div class="modal-body">


 

  
    


  


       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Nombre </span>
  </div>
<input name="nombrep" required type="text" class="form-control" placeholder="Nombre de perfil" value="" >
 
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Velocidad </span>
  </div>
<input name="velocidadp" required type="text" class="form-control" placeholder="Ej. 500K/1M" value="" >
 
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">No. usuarios</span>
  </div>
<select name="nusuariosp" required class="form-control"   >

 <option value="">Seleccione No. usuarios</option>
  
  <option  SELECTED value="1">1 Usuario </option>
        <option value="unlimited">Ilimitados</option>          
          <option value="2">2 Usuarios </option>
          <option value="3">3 Usuarios </option>
          <option value="4">4 Usuarios </option>
          <option value="5">5 Usuarios </option>
          <option value="6">6 Usuarios </option>
          <option value="7">7 Usuarios </option>
          <option value="9">8 Usuarios </option>
          <option value="9">9 Usuarios </option>
          <option value="10">10 Usuarios </option>

   </select>
</div>


    <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">MAC Cookie </span>
  </div>
<input  id="cookiep" class="form-control"   name="cookiep"  maxlength="13" placeholder="Ingrese  tiempo mac cookie " type="text" value="30d 00:00:00">  
</div>

    <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Tipo de perfil</span>
  </div>
<select   class="form-control "  name="tipop">  
          <option value="0">Tiempo corrido y autodeshabilitacion</option>  
         <option value="1">Tiempo corrido y autoeliminación</option>     
         <option  value="2">Tiempo pausado y autoeliminación</option>   
           <option  value="3">Tiempo pausado y autodeshabilitacion</option>
                  
                                                            
</select>
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <label style="width:130px; class="switch">
  <input    id="checkt" type="checkbox">
  <span class="slider"></span>
</label>
  </div>
   
  
     <button  readonly type="button" class="btn form-control text-left"> <li class="fa text-primary fa-paper-plane"></li> Notificación por telegram </button>
</div>



    

      




      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Token </span>
  </div>
<input id="token" name="token"  type="text" class="form-control" placeholder="Token bot" >
 
</div>



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Id chat </span>
  </div>
<input id="idchat" name="idchat"  type="text" class="form-control" placeholder="Id chat" value="" >
 
</div>











<!-- error-->
  <div id="erroradperfil" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submitprofile"  class="btn btn-primary">Generar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar pper-->



<!-- Modal y formulario para editar perfilhp mikrotik-->
<div class="modal fade" id="Modaleditprofilehp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  " role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar perfil hotspot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formeditprofilehp">
    <!-- contenido-->
      <div class="modal-body">

<input name="nombre1" id="nombreprofileedit1"  required type="hidden" class="form-control" placeholder="Nombre" value="" >
            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text    ">Nombre</span>
  </div>
<input name="nombre2" id="nombreprofileedit2"  required type="text" class="form-control" placeholder="Nombre del perfil" value="" >
 
</div>

 

     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">No. Usuarios</span>
  </div>
<input id="nusuariosp" name="nusuarios" required type="text" class="form-control" placeholder="numero usuarios" value="" >
 
  
</div>
  <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">Velocidad</span>
  </div>
<input id="velocidadprofile" name="velocidad"  type="text" class="form-control" placeholder="Rx/Tx" value="" >
 
  
</div>
  <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">Cookie</span>
  </div>
<input id="cookieprofile" name="cookie"  type="text" class="form-control" placeholder="cookie" value="" >
 
  
</div>
 




 

<!-- error-->
  <div id="erroreditprofilehp" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submiteditprofilehp"  class="btn btn-primary">Guardar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para editar perfilhp mikrotikr-->


 <!-- Modal delete perfiles hotspot-->
<div class="modal fade" id="ModalperfilhP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-times"></i>   Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeleteperfilhp">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente perfil?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <h2 id="nameperfil"> </h2>
</div>
 
<input type="hidden" class="form-control"  id="nombreP" readonly name="nombre">



<!-- error-->
  <div id="errordeleteperfilhp" class="content">
 
      
 
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

<!-- Fin Modal delete perfiles hotspot-->
  <?php 
include_once('includes/main.php');
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
 <script type="text/javascript" src="../jsapp/perfileshp.js"></script>
 
