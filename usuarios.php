
 
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
     <button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladusermikrotik">
<i class="fas fa-user-plus  "></i> 

</button>


   <button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladdgroup">
<i class="fas fa-users  "></i> 

</button>

  <button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modalchangeport">
<i class="fas fa-cog  "></i> 

</button>

 <button  onclick="usuariosmikrotik()" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>

 
</div></div>
</section>
     <!-- /.end -->



<!-- Modal y formulario para agregar user mikrotik-->
<div class="modal fade" id="Modaladusermikrotik" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar vendedores o administradores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddusuariorb">
    <!-- contenido-->
      <div class="modal-body">


            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Nombre </span>
  </div>
<input name="nombre" required type="text" class="form-control" placeholder="Nombre de usuario" value="" >
 
</div>

          <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Contraseña </span>
  </div>
<input name="password" required type="text" class="form-control" placeholder="Contraseña de usuario" value="" >
 
</div>
   
 



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Grupo</span>
  </div>
<input id="gruporb" name="grupodelusuario" required type="text" class="form-control" placeholder="" value="" >
  <button id="updategrupo" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Comentario</span>
  </div>
<select class="form-control" name="comentario">
  
  <option value="vendedor">Vendedor</option>
   <option value="administrador">Administrador</option>
</select>
</div>







 

<!-- error-->
  <div id="erroraddusermikrotik" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submitaduu"  class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar ser mikrotikr-->



<!-- Modal y formulario para agregar grupo mikrotik-->
<div class="modal fade" id="Modaladdgroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar grupo usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddgroup">
    <!-- contenido-->
      <div class="modal-body">


            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  ">Nombre grupo</span>
  </div>
<input name="nombre" id="groupapim" required type="text" class="form-control" placeholder="Nombre de usuario" value="" >
 
</div>
<!-- error-->
  <div id="erroraddgroup" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submitaddgroup"  class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar group mikrotikr-->





<!-- Modal y formulario para acambiar puerto api mikrotik-->
<div class="modal fade" id="Modalchangeport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Cambiar puerto api</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formasetport">
    <!-- contenido-->
      <div class="modal-body">


            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  ">Puerto</span>
  </div>
<input name="puerto" id="portapi" required type="text" class="form-control" placeholder="N puerto" value="" >
 
</div>
<!-- error-->
  <div id="errorsetport" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submitsetport"  class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para cambiar puerto mikrotikr-->


 
<!-- Modal y formulario para editar user mikrotik-->
<div class="modal fade" id="Modaledituserm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar usuarios mikrotik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formeditusuariosrb">
    <!-- contenido-->
      <div class="modal-body">

<input name="nombre1" id="nombreeditmikrotik21"  required type="hidden" class="form-control" placeholder="Nombre de usuario" value="" >
            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text    ">Nombre </span>
  </div>
<input name="nombre2" id="nombreeditmikrotik22"  required type="text" class="form-control" placeholder="Nombre de usuario" value="" >
 
</div>

  
   
 



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">Grupo</span>
  </div>
<input id="grupousermikrotik" name="grupo" required type="text" class="form-control" placeholder="grupo" value=""   >
 <button id="updategrupo2" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">Comentario</span>
  </div>
<input id="comentusermikrotik" name="comentario" required type="text" class="form-control" placeholder="comentario" value="" >
 
  
</div>







 

<!-- error-->
  <div id="erroreditusermikrotik" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submiteditum"  class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para editar ser mikrotikr-->

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


  <?php 
include_once('includes/main.php');

 
include_once('includes/formulariosdelete.php');

include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
  <script type="text/javascript" src="../jsapp/usuarios.js"></script>
