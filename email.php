


 
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
   <button style="cursor:pointer;" onclick="cambiartitulo();" title="Agregar email" type="button" class="btnmenu col-md-2 col-3   p-2"   data-toggle="modal" data-target="#ModalCenter1" data-placement="bottom" title="Agregar un email para envio de repaldos"> <i class="fas  fa-plus " aria-hidden="true"></i> </button> 

 
  <button style="cursor:pointer;"   title="Probar envio de email" type="button" class="btnmenu col-md-2 col-3   p-2"  data-toggle="modal" data-target="#Modalpruebae"> <i class="fa fa-envelope" aria-hidden="true"></i></button> 

 <button style="cursor:pointer;" title="Refrescar" onclick="leerdatos();" type="button" class="btnmenu col-md-2 col-3   p-2" data-toggle="tooltip" data-placement="bottom" title="Refrescar tabla"><i class="fas  fa-sync  " aria-hidden="true"></i>  </button> 

</div>


</div>
</section>
     <!-- /.end -->

<!-- Modal  email-->
<div class="modal fade" id="ModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div id="header2" class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Configurar mailer</h5>
        
        
        
        <form id="registrarmailer" > 
    
    
    
    
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
    
       
      </div>
      <div class="modal-body">
      
      
   
   <label>Nombre para mostrar</label>
  
  <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text text-white bg-primary text-white bg-primary" id="basic-addon1"><i class="fa fa-user"></i></span>
  </div>
  <input id="nombre" name="namesend" type="text" class="form-control"   placeholder="Usuario email" aria-label="Username" aria-describedby="basic-addon1">
</div>


    <label>Email que enviara y recibira correos</label>
  
  <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text text-white bg-primary" id="basic-addon1"><i class="fa fa-envelope"></i></span>
  </div>
  <input id="email" name="emailsend" type="email" class="form-control" value="" placeholder="email" aria-label="Username" aria-describedby="basic-addon1">
</div>

   <label>Contraseña</label>

    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span   color:white"  class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
  </div>
<input id="password" name="passend" type="password" class="form-control" placeholder="contraseña" aria-label="Username" aria-describedby="basic-addon1">

 <div class="input-group-prepend">
    <span    class="input-group-text" id="basic-addon1"><input    id='toggle'  type="checkbox"  onchange='togglePassword(this);'></span>
  </div>
  
 
  
  
</div>
  


    <label>Host</label>
  
  <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text text-white bg-primary" id="basic-addon1"><i class="fa fa-server" aria-hidden="true"></i></span>
  </div>
  <input id="host" name="hostsend" type="text" class="form-control"  value="smtp.gmail.com" placeholder="SMTP" aria-label="Username" aria-describedby="basic-addon1">
</div>

   <label>Cifrado</label>
  
  <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text text-white bg-primary" id="basic-addon1"><i class="fa fa-asterisk" aria-hidden="true"></i></span>
  </div>
  <input id="cifrado" name="cifrado" type="text" class="form-control"  value="PHPMailer::ENCRYPTION_STARTLS" placeholder="cifrado SSL,TLS" aria-label="Username" aria-describedby="basic-addon1">
</div>



   <label>Puerto</label>
  
  <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text text-white bg-primary" id="basic-addon1"><i class="fa fa-dot-circle" aria-hidden="true"></i></span>
  </div>
  <input id="puerto" name="port" type="text" class="form-control"  value="587" placeholder="puerto SMTP" aria-label="Username" aria-describedby="basic-addon1">
</div>




  
    


    </div>
  
  <div class="modal-body">
    
      <div id="error2" style=" width:100%;" >
  
 
</div></div>
  
      <div class="modal-footer">
    <button type="submit"  name="submit" id="btn" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
        </form>
        
       
      </div>
    </div>
  </div>
</div> 
        
     
 
  


  
    <!-- Modal -->






     <!-- Modal  email-->
<div class="modal fade" id="Modalpruebae" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div id="header2" class="modal-header">
        <h5 class="modal-title" >Prueba mensaje en sistema</h5>
        
        
        
        <form id="pruebamailer" > 
    
    
    
    
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
    
       
      </div>
      <div class="modal-body">
      
      
  


    <label>Email destino</label>
  
  <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text text-white bg-primary" id="basic-addon1"><i class="fa fa-envelope"></i></span>
  </div>
  <input required  id="email" name="email" type="email" class="form-control" value="" placeholder="email"  >
</div>
 
 



    <label>Mensaje de prueba</label>
  
  <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span class="input-group-text text-white bg-primary"  ><i class="fa fa-envelope"></i></span>
  </div>
  <textarea  name="mensaje"   class="form-control"  >Mensaje de prueba para configuración de email en sistema</textarea>
</div>
   



  
    


    </div>
  
  <div class="modal-body">
    
      <div id="errorsend" style=" width:100%;" >
  
 
</div></div>
  
      <div class="modal-footer">
    <button type="submit"  name="submit" id="btnsend" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
        </form>
        
       
      </div>
    </div>
  </div>
</div> 
        
     
  


 <?php 
  
///phpinfo(INFO_MODULES);
include_once('includes/main.php');
 
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
 <script type="text/javascript" src="../jsapp/email.js" ></script>
