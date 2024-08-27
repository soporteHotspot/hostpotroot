<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$_SERVER['HTTP_HOST'];?><?=$_SERVER['REQUEST_URI'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <link 
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="logo/favicon.jpg"
    />

    <?php 

if (is_file("require/connect_db.php")) {
   header("Location:../");
// fopen($fileconect, 'w');
   return false;
  
} ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome611/css/all.css">
 
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="css/adminlte.css">
   <link rel="stylesheet" href="css/body.css">
  <!-- Google Font: Source Sans Pro -->

  
  
   <!-- DataTables -->
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="css/responsive.bootstrap4.min.css">
</head>
    

<body>

<!-- Page Content -->
<div class="row h-100">
	
	
    <div class="container  mt-5    p-2 ">

                   
                            
              

 

 <!--start div 2-->
		  <div class="form-row">
    <div class="form-group col-md-4">
<div class="container">
<div class="col-md-12 mb-2 bg-success p-2 text-center">  Bienvenid@  </div>

       

     <div class="col-md-12 mb-2 bg-danger p-2 text-center">  No se encontró archivo de conexión con la base de datos, ingrese los datos para crearlo, porfavor ve la ayuda  <button type="button" class="btn btn-info  " data-toggle="modal" data-target="#Modalhelp">
 <i class="fas fa-question"> </i>
</button></div>

   <div class="col-md-12 mb-2 bg-success p-2 text-center"> Crear base de datos  


    </div>
	<form id="guardarconexion">

   

 

                         <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-server"> </i></div>
        </div>
        <input id="server" required maxlength="30" type="text"  class="form-control input-sm chat-input " value="localhost" name="server" placeholder="servidor"/>

         <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#Modalhelp">
 <i class="fas fa-question"> </i>
</button>
      </div>
					
                              <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-user"> </i></div>
        </div>
        <input id="usuario" required type="text"  class="form-control input-sm chat-input " value="root" name="usuario" placeholder="Usuario"/>
      </div>
					
                     
                

                <div class="input-group   mb-1">
 <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-lock"> </i></div>
        </div>
  <input id="password" type="password"  class="form-control" value="" name="password" placeholder="Contraseña"/>
   <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm"><input    id='toggle'  type="checkbox"   onchange='togglePassword(this);'></span>
  </div>
</div>
            
          <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-database"> </i></div>
        </div>
        <input id="database" type="text"  class="form-control input-sm chat-input " value="db_hotspot_control" name="basededatos" placeholder="Nombre de la base de datos "/>
      </div>           

<div class="row">
<div class="col-md-12 mb-2">
               <input id="enviardata" class="btn btn-success float-right" type="submit" name="enviar" value="Generar">            
 
</div>
 </div>
                             
                


               </form>
				 



</div>

        <!--start box-->
	 
		
    </div>
	
<div id="Modalhelp" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ayuda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Paso 1</h1>
        Rellene los datos requeridos y presione Generar para generar la base de datos del sistema y Continuar para proceder la instalación <br>
        Si usa un servidor con php diferente a PHP 8.1, PHP 8.2 posiblemente no reflejará errores, recargue la pagina y vuelve a ingresar los datos correctos.
      </div>
      <div class="modal-footer">
         
        <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
 
    <!--footer-->
   
    <!--//footer-->
 <?php 

include_once('includes/script.php');
 

?>
        
     
              
  
               
            </div>
       
		
		
  
 <script type="text/javascript" src="../jsapp/crearbasededatos.js"></script>
       
        
    </body>
</html>
