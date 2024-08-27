


 
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

?> 

   
  <div class="content-wrapper">

    <!-- seccion de navegacion -->
    <section class="content-header p-2">
      <div class="container-fluid ">
        <div class="row mb-0">
          <div class="col-sm-6">
     
            </div>
  
  
          <div class="col-sm-12 p-2 border">
      
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active float-right"><a href="<?=$_SERVER['REQUEST_URI'];?>"><?=$_SERVER['REQUEST_URI'];?></a></li>
            </ol>
          </div>
        </div>
      </div>
	  
	     <!-- /start head -->
<div class="container-fluid bg-light p-1 border">
   <div class="row col-md-6 d-flex flex-row">
      <button    type="button" class="col-md-2 col-3 btn-primary p-2" data-toggle="modal" data-target="#Modaladds"> <i class="fa fa-plus "></i></button>
 <button  onclick="schedule()" type="button" class="col-md-2 col-3 btn-primary p-2"> <i class="fa fa-sync "></i></button>
</div></div>
  <!-- endd header  -->
     
   
    </section>
     <!-- /.end -->
  <!-- secion de loader  -->
  <section id="loader" class="content">
 
      
 
    </section>
    <!-- secion de contenido body -->
    <section id="contbody" class="content">
 
      
 <!-- termina seccion de contenido body -->
    </section>
   
<!-- Modal habilitar  schedule -->
<div class="modal fade" id="Modaldische" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
   
        <h5 class="modal-title"  >Cambio de estado </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdidschedule"   >
    <!-- contenido-->
      <div class="modal-body">
     
  <strong id="asksche">¿Está seguro de cambiar el estado ?</strong>
   
<input id="estadocambiarsche" required type="hidden" class="form-control"  value=''  name="estado">
<input id="dataacambiarsche" required readonly   class="form-control form-control-lg     text-center border border-light "  value=''  name="data">
 

  <div id="divestatus" class="alert   text-center mt-2">

Estado actual:
  <strong id="estadoactualdatasche"></strong>

   
  </div>


<!-- error-->
  <div id="errorcambioestadosche" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitestadosche" type="submit"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal habilitar  schedule   -->
	


<!-- Modal -->
<div class="modal fade" id="Modaladds" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form id="agregartarea">
  <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Nombre</span>
        </div>
        <input type="text"  class="form-control"  name="nombre" required>
      </div>

        <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text"  >Fecha inicio</span>
        </div>
        <input type="text"   class="form-control" placeholder="Jan/01/2022" name="finicio" required>
      </div>


        <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Hora inicio</span>
        </div>
        <input type="text"  class="form-control"  value="00:00:00" name="hinicio" required>
      </div>


        <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Intervalo</span>
        </div>
        <input type="text"  class="form-control"  name="intervalo" required value="00:00:00">
      </div>


        <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 120px;" class="bg-primary input-group-text" >Script</span>
        </div>
        <textarea class="form-control" name="script"></textarea>
      </div>


      </div>
      <div class="modal-footer">
        <button type="submit" id="submitadschedule"  class="btn btn-primary">Agregar</button>
        <button type="button" class="btn bg-danger" data-dismiss="modal">Cerrar</button>
        
      </div>

    </form>
    </div>
  </div>
</div>

<!-- Modal remove schedule-->
<div class="modal fade" id="Modalremschedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-minus"></i>   Remover schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formremoveschedule">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de remover la siguiente tarea?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <h2 id="nombreschedule"> </h2>
</div>
 
<input type="hidden" class="form-control"  id="nombreschedulerem"   name="nombre">

<!-- error-->
  <div id="errorremoveschedule" class="content">
 </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submitschedule"   class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal remove schedule-->
	<!-- termina contenido ajustado en panel -->
  </div>
  

 <?php 

include_once('includes/script.php');
 

 

include_once('includes/footer.php');
 

?>
 <script type="text/javascript" src="jsapp/schedule.js"></script>
