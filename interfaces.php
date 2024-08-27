


 
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
<div class="container-fluid bg-light p-1 border ">

   <div class="row col-md-6 d-flex flex-row">
<div class="dropdown col-md-2 col-3 btn-primary p-2">
  <button class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-plus-square "></i> 
    Agregar
  </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modaladbridge">Bridge</a>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modaladvlan">VLAN</a>
    
  </div>
</div>
  
    <button onclick="Viewinterfacesether()" type="button" class="col-md-2 col-3 btn-primary p-2"  >
<i class="fas fa-ethernet "></i> Ethernet
</button>
    

    

      <button onclick="Viewinterfacesbridge()" type="button" class="col-md-2 col-3 btn-primary p-2"  >
<i class="fas fa-network-wired  "></i> Bridge
</button>




    
    <button onclick="Viewinterfacesvlan()" type="button" class="col-md-2 col-3 btn-primary p-2"  >
<i class="fas fa-project-diagram  "></i> VLAN
</button>
    

  
</div>


 
    
  
</div>
</section>
     <!-- /.end -->


<!-- Modal y formulario para agregar bridge-->

<div class="modal fade" id="Modaladbridge" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
       <form  id="Formagregarbridge"  >   
     
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo bridge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
    
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Nombre</span>
  </div>
  <input type="text"  required name="nombre" class="form-control" value="Bridge" placeholder="Nombre" >
</div>






<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >ARP</span>
  </div>
 <select style="width:100px; "  class="form-control"  name="arp">
    <option value="enabled" >Enabled</option>
    <option value="disabled">Disabled</option>
    <option value="local-proxy-arp">Local-proxy-arp</option>
    <option value="proxy-arp">Proxy-arp</option>
    <option value="reply-only">Reply-only</option>
  </select>
</div>


  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Comentario</span>
  </div>
  <input type="text"  required name="comentario" class="form-control" value="" placeholder="Comentario" >
</div>

    
    

    </div>
  </div>
  
    
 <div id="erroradbridge"  class="modal-body">
      
   </div>
     

      </div>
      
      
      
      
      <div class="modal-footer">
      <button id="submitregpbre" type="submit" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
    
    </form>
  </div>
</div>  


<!-- Fin Modal y formulario para agregar bridge-->
<!-- Modal y formulario para agregar vlan-->

<div class="modal fade" id="Modaladvlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
     <form  id="Formagregarvlan"  >   
   
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Nueva VLAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Nombre</span>
  </div>
  <input type="text"  required name="nombre" class="form-control" value="vlan1" placeholder="Nombre"  >
</div>



  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >MTU</span>
  </div>
  <input type="number"  required name="mtu" class="form-control" value="1500" placeholder="Nombre"  >
</div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >ARP</span>
  </div>
 <select style="width:100px; "  class="form-control"  name="arp">
    <option value="enabled" >Enabled</option>
    <option value="disabled">Disabled</option>
    <option value="local-proxy-arp">Local-proxy-arp</option>
    <option value="proxy-arp">Proxy-arp</option>
  <option value="reply-only">Reply-only</option>
  </select>
</div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >ID VLAN</span>
  </div>
  <input type="number"  required name="vlanid" class="form-control" value="1" placeholder="Id"  >
</div>

  
 <div  class="input-group mb-1">
  <div id="interfacesss" class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Interfaz</span>
  </div>
 
 <input type="text" id="btnintrfaces"  required  class="form-control" placeholder="interfaces" > 
  
 <button id="updateinterfaces" type="button" name="inter"  class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div> 






<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Comentario</span>
  </div>
  <input type="text"  required name="comentario" class="form-control" value="" placeholder="Comentario" >
</div>

    
    

    </div>
  </div>
  
    
 <div id="erroradvlan"  class="modal-body">
      
   </div>
     

      </div>
    
    
    
    
      <div class="modal-footer">
    <button id="submitregvlan" type="submit" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  
  </form>
  </div>
</div>  


<!-- Fin Modal y formulario para agregar vlan-->

<!-- Modal y formulario para  editarrr interface-->

<div class="modal fade" id="Modaleditinterface" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  " role="document">
    <div class="modal-content">
       <form  id="Formeditinterfaz" >   
     
      <div class="modal-header bg-success">
        <h5 class="modal-title" >Editar nombres interfaces</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">


    
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Nombre default</span>
  </div>
  <input type="text"  readonly id="namedefault"  required name="namedefault" class="form-control" value="" placeholder="Nombre" >
</div>



<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Nombre actual</span>
  </div>
  <input type="text" readonly  id="nombreactual"  required name="nombreactual" class="form-control" value="" placeholder="Nombre actual" >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Nuevo nombre</span>
  </div>
  <input type="text"   id="newname"  required name="newname" class="form-control" value="" placeholder="Nuevo nombre" >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Tipo</span>
  </div>
  <input type="text"  readonly id="tipo"  required name="tipo" class="form-control" value="" placeholder="Nuevo nombre" >
</div>

  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Comentario</span>
  </div>
  <input  id="comentariointerface" type="text"  required name="comentario" class="form-control" value="" placeholder="Comentario" >
</div>

    
    

    </div>
  </div>
  
    
 <div id="erroreditinterface"  class="modal-body">
      
   </div>
     

      </div>
      
      
      
      
      <div class="modal-footer">
      <button id="submiteditinterfaz" type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
    
    </form>
  </div>
</div>  


<!-- Fin Modal y formulario para editarrr interface-->


<!-- Modal delete   interface bridge-->
<div class="modal fade" id="Modaledelinterfacebridge" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
   
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar interface bridge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeleteinterfacebridge" class="formulariodeleteinterface">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente interfaz?</strong>
  </div>


 
  <input type="text" readonly class="form-control  p-2 text-center"  id="nombrebridgedelete"   name="nombre">
 



<!-- error-->
  <div id="errordeleteinterface" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="borrarinerfacebri" type="submit"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal delete  interface bridge-->

<!-- Modal delete   interface vlan-->
<div class="modal fade" id="Modaledelinterface" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
   
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar interfaz vlan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeleteinterfacesvlan" >
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente interfaz?</strong>
  </div>


 
  <input type="text" readonly class="form-control  p-2 text-center"  id="nombrevlandelete"   name="nombre">
 



<!-- error-->
  <div id="errordeletevlan" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="borrarinerfacevlan" type="submit"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal delete  interface vlan-->




  <?php 
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
<script type="text/javascript" src="jsapp/interfaces.js"></script>
