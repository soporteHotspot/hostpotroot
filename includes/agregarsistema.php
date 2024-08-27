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

                   
                            
              

 
	
    	<div class=" col-md-8">
<div class="container">
  <div class="form-row">
	 
         
  
 <!--start div 2-->
      


    
      <div   class="  col-md-8">
         <div class="bg-warning  alert text-center"> No se encontró datos generales del sistema, porfavor complete el registro</div>
				 
<!-- Modal y formulario para agregar datos sistema-->
 
     
	  <form id="Formadsistema">
	  <!-- contenido-->
     
	   
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
<input name="idusuario" required type="text" class="form-control" placeholder="Ej. Usuario" value="Usuario" >

</div>	



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Idcontraseña</span>
  </div>
<input name="idpassword" required type="text" class="form-control" placeholder="Ej. Contraseña" value="Contraseña" >

</div>	



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Texto</span>
  </div>
<input name="texto" required type="text" class="form-control" placeholder="Texto" value="Conéctate a tu zona Wi-Fi"  >

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



     
	    <!-- end contenido-->
      <div class="modal-footer">
	  <button type="submit"   class="btn bg-blue">Registrar</button>
       
        
      </div>
	  
	  </form>
    </div>    

<!-- Fin Modal y formulario para agregar sistema-->

<div id="preview" class="  col-md-4">
    </div>

</div>


</div>

        <!--start box-->
	 
		
    </div>
	

 
    <!--footer-->
   
    <!--//footer-->
 <?php 

include_once('includes/script.php');
 

?>
        
     
              
  
               
            </div>
       
		
		
  
 <script type="text/javascript" src="../jsapp/agregarsistema.js"></script>
       
        
    </body>
</html>
