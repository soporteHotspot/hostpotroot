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

                   
                            
              

 

 <!--start div 2-->
		  <div class="form-row">
    <div class="form-group col-md-4 bg-info rounded">

      
<div class="container">
	  <div class="   alert text-center">  <h5>No se encontró ni un sucursal, agregue uno para poder iniciar</h5></div>


                  
				<form id="agregarsucursal">
    
    

     <div class="form-row">

    <div class="form-group col-md-12">
      <label for="inputEmail4">Sucursal:</label>
      <input type="text" required  class="form-control" name="nombresucursal" placeholder="Nombre">
    </div>
    <div class="form-group col-md-12 ">
      <label for="inputPassword4">Dirrección:</label>
      <input required  type="text" class="form-control" name="direccioncursal"  placeholder="Direccion">
    </div>
  <div class="form-group col-md-12 ">
      <label for="inputPassword4">Texto:</label>
      <input required  type="text" class="form-control" name="texto"  value="Conéctate a la red Wi-Fi" placeholder="Texto tarjetas">
    </div>

  </div>




     
      <div class="modal-footer">

        <div id="erroradsistema" class="col-md-12">
        </div>

         <button type="submit" class="btn btn-primary">Guardar</button>
        
       
      </div>

    </form>



</div>

        <!--start box-->
	 
		
    </div> </div>
	

 
    <!--footer-->
   
    <!--//footer-->
 <?php 

include_once('includes/script.php');
 

?>
        
     
              
  
               
            </div>
       
 <script type="text/javascript" src="../jsapp/agregarsucursal.js"></script>
       
        
    </body>
</html>
