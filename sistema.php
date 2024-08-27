


 
<?php 

session_start();
if (@!$_SESSION['ip']) {
  header("Location:login");
}
if ($_SESSION['tipo']!="administrador") {
  header("Location:puntodeventa");
}

 $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    
if (!file_exists($PNG_WEB_DIR)) {
    mkdir($PNG_WEB_DIR, 0777, true);
  
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
   <button type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladdata">
<i class="fa fa-cog "></i> 
</button>
  <button  onclick="cargarsistema();" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync  "></i></button>

</div></div>
</section>
     <!-- /.end -->



<!-- Modal delete   datos-->
<div class="modal fade" id="ModalDData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
     
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar datos sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="FormdeleteSIS">
      <!-- contenido-->
      <div class="modal-body">
      <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente registro?</strong>
  </div>


<div class="alert bg-orange">
  <strong id="nombreempresa"></strong>
  </div>


<!-- error-->
  <div id="errordeleteSIS" class="content">
 
      
 
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

<!-- Fin Modal delete datos-->



<!-- Modal y formulario para agregar datos sistema-->
<div class="modal fade" id="Modaladdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-cyan">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar datos sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="Formadsistema">
      <!-- contenido-->
      <div class="modal-body">
         <div style=" width:40%" id="preview"></div>
     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Logo</span>
  </div>
  <input id="files" class="form-control" type="file"  required name="logo" accept="image/png, .jpeg, .jpg">

</div>    
  


     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Empresa</span>
  </div>
<input name="nameempresa" required type="text" class="form-control" placeholder="Nombre empresa" value="" >

</div>  

   <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Modo</span>
  </div>
<select name="modo" class="form-control">
  <option value="10">PIN (Usuario=Contraseña)</option>
    <option value="20">PIN (Solo usuario)</option>
     <option value="30">Usuario y contraseña</option>

</select>

</div>

     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Idusuario</span>
  </div>
<input name="idusuario" required type="text" class="form-control" placeholder="Ej. Usuario" value="" >

</div>  



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Idcontraseña</span>
  </div>
<input name="idpassword" required type="text" class="form-control" placeholder="Ej. Contraseña" value="" >

</div>  



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Texto</span>
  </div>
<input name="texto" required type="text" class="form-control" placeholder="Texto" value=""  >

</div>  

     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Z. Horaria</span>
  </div>
<input name="zonahoraria" required type="text" class="form-control" placeholder="zona horaria" value="America/Mexico_City" >

</div>

 


    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:180px; " class="input-group-text text-white bg-cyan"  >Simbolo de moneda</span>
  </div>
<input name="moneda" required type="text" class="form-control" placeholder="moneda" value="$" >

</div>


<!-- error-->
  <div id="erroradsistema" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
        <!-- end contenido-->
      <div class="modal-footer">
      <button type="submit"   class="btn bg-blue">Registrar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
      
      </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar sistema-->
 

<!-- Modal delete   datos-->
<div class="modal fade" id="ModalDData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
   
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar datos sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="FormdeleteSIS">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente registro?</strong>
  </div>


<div class="alert bg-orange">
  <strong id="nombreempresa"></strong>
  </div>


<!-- error-->
  <div id="errordeleteSIS" class="content">
 
      
 
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

<!-- Fin Modal delete datos-->


<!-- Modal y formulario para edit datos sistema-->
<div class="modal fade" id="Modaleditdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar datos sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formeditsistema">
    <!-- contenido-->
      <div class="modal-body">
       <div style=" width:40%" id="preview2"></div>
     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text "  >Logo</span>
  </div>
  <input id="files2" class="form-control" type="file"  name="logo" accept="image/png, .jpeg, .jpg">

</div>    
  


     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text "  >Empresa</span>
  </div>
<input id="nombree" name="nameempresa" required type="text" class="form-control" placeholder="Nombre empresa" value="" >

</div>  

  <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text "  >Modo</span>
  </div>
<select id="modo" name="modo" class="form-control">
  <option value="10">PIN (Usuario=Contraseña)</option>
    <option value="20">PIN (Solo usuario)</option>
     <option value="30">Usuario y contraseña</option>

</select>

</div>

     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text "  >Idusuario</span>
  </div>
<input id="idusere"  name="idusuario" required type="text" class="form-control" placeholder="Ej. Usuario" value="" >

</div>  



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text "  >Idcontraseña</span>
  </div>
<input id="idpasse" name="idpassword" required type="text" class="form-control" placeholder="Ej. Contraseña" value="" >

</div>  



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text "  >Texto</span>
  </div>
<input id="texte" name="texto" required type="text" class="form-control" placeholder="Texto" value="" >

</div>  


     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text "  >Z. Horaria</span>
  </div>
<input id="zonahoraria" name="zonahoraria" required type="text" class="form-control" placeholder="zona horaria" value="" >

</div>

  

    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:180px; " class="input-group-text "  >Simbolo de moneda</span>
  </div>
<input id="moneda" name="moneda" required type="text" class="form-control" placeholder="moneda" value="$" >

</div>




<!-- error-->
  <div id="erroreditsistema" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"   class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para editar sistema-->

 <?php 
  
///phpinfo(INFO_MODULES);
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
 <script type="text/javascript" src="../jsapp/empresa.js" ></script>
