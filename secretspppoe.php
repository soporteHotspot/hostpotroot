


 
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
<button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladdsecret">
   <i class="fas fa-user-plus   "></i>
</button>  <button  onclick="secrestpppoe()" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>
</div></div>




<!-- Modal y formulario para editar secretppp mikrotik-->
<div class="modal fade" id="Modaleditsecretppp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
        <h5 class="modal-title" id="title">Editar secret</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formedicionsecretppp">
    <!-- contenido-->
      <div class="modal-body">

<input name="secret1" id="secret1"  required type="hidden" class="form-control" placeholder="Nombre de usuario" value="" >
            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text    "><i class="fa fa-user"> </i> </span>
  </div>
<input name="secret2" id="secret2"  required type="text" class="form-control" placeholder="Usuario" value="" >
 
</div>

  <div class="input-group mb-1 ">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text    "><i class="fa fa-lock"> </i> </span>
  </div>
<input name="password" id="passwordsecret"  required type="password" class="form-control" placeholder="password" value="" >
  <div class="input-group-append"> <span class="input-group-text">
 
  <input    id='toggle2'   type="checkbox"   onchange='togglePassword(this);'>
  
</span> </div>
 
</div>
  
   



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fa fa-user-circle"> </i></span>
  </div>
<input id="perfilesecret" name="perfil" required type="text" class="form-control" placeholder="perfil" value=""   >
 <button id="updateprofilesecret" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>

 
     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fa fa-comments"> </i></span>
  </div>
<input id="comentsecret" name="comentario"   type="text" class="form-control" placeholder="comentario" value="" >
 
  
</div>







 

<!-- error-->
  <div id="erroreditsecret" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submiteditsecret"  class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>


<!-- Fin Modal y formulario para editar secretppp mikrotikr-->





<!-- Modal y formulario para agregar secret-->

<div class="modal fade" id="Modaladdsecret" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered   " role="document">
    <div class="modal-content">
     <form  id="Formagregarsecret"  >   
   
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar secret usuarios PPPoE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-lime"  >Nombre</span>
  </div>
  <input type="text"  required name="nombre" class="form-control" value="" placeholder="Nombre "  >
</div>
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-lime"  >Password</span>
  </div>
  <input type="password" id="passwordeR" required name="password" class="form-control" value="" placeholder="Password"  >

    <div class="input-group-append"> <span class="input-group-text">
 
  <input    id='toggle'  type="checkbox"   onchange='togglePassword(this);'>
  
</span> </div>
</div>

   <div  class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-lime"  >Perfil</span>
  </div>
 
 <input type="text" id="btnperfileppoe"  required name="perfil" class="form-control" placeholder="Nombre perfil" > 
 
 <button id="updateperfilpppoe" type="button" class="btn bg-lime"> <i class="fa fa-sync"></i></button>
</div> 


   <div  class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-lime"  >Comentario</span>
  </div>
 
 <input type="text"   required name="comentario" class="form-control" placeholder="Cometario"  > 
 

</div> 

    
    

    </div>
  </div>
  
    
 <div id="erroradsecret"  class="modal-body">
      
   </div>
     

      </div>
    
    
    
    
      <div class="modal-footer">
    <button id="submitregppoe" type="submit" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  
  </form>
  </div>
</div>  


<!-- Fin Modal y formulario para agregar secret-->








<!-- Modal delete secret ppp-->
<div class="modal fade" id="Modaldeldelsecret" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-times"></i>   Eliminar secret PPPoE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeletesecretppp">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente usuario?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <h2 id="nameuserpppp"> </h2>
</div>
 
<input type="hidden" class="form-control"  id="nombresecret" readonly name="nombre">



<!-- error-->
  <div id="errordeletesecretpppp" class="content">
 
      
 
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

<!-- Fin Modal delete secret ppp-->





<!-- Modal habilitar   -->
<div class="modal fade" id="Modaldisabled" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
   
        <h5 class="modal-title"  >Cambio de estado </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdces" class="Cambiarestatus" >
    <!-- contenido-->
      <div class="modal-body">
     
  <strong id="ask">¿Está seguro de cambiar el estado ?</strong>
   
<input id="estadocambiar" required type="hidden" class="form-control"  value=''  name="estado">
<input id="dataacambiar" required readonly   class="form-control form-control-lg  text-danger  bg-white text-center border border-light "  value=''  name="data">
 

  <div id="divedeestado"  class="alert  text-center mt-2">

Estado actual:
  <strong id="estadoactualdata"></strong>

   
  </div>


<!-- error-->
  <div id="errorcambioestado" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitestadoshp" type="submit"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal habilitar     -->


</section>



     <!-- /.end -->

  <?php 
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
   <script type="text/javascript" src="../jsapp/secretsppp.js"></script>
