
					 
					 <!-- Default box -->
      <div id="controuters" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Routers</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">
 


<?php


//Use any PEAR2_Net_RouterOS class from here on



				require("../require/connect_db.php");
			 
				$obtenerda=("SELECT * FROM routerboard");
                 $data=mysqli_query($mysqli,$obtenerda);    
				
		


echo "<table id='dataTablerouter' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr>
                    <th>Ip</th>
					<th>Nombre</th>
					<th>Usuario</th>
					
                    	<th>Id sucursal</th>
					
					 <th>Editar</th>
					 <th>Eliminar</th>
					  
					  
                </tr>
            </thead> <tbody>";

  while($verdata=mysqli_fetch_array($data)){
	
					 					 
					 $id=$verdata['id'];
					  $ip=$verdata['ip'];
					  $namerb=$verdata['nombre'];
					   $username=$verdata['usuario'];					  
					    $idsucursal=$verdata['idsucursal'];	
						 
					    $obteneridsu=("SELECT * FROM sucursal WHERE id='$idsucursal'");
              $datasucursal=mysqli_query($mysqli,$obteneridsu);    
              $datas=mysqli_fetch_array($datasucursal);             
              
              if(isset($datas['nombre']))
					    {$nombresucursal=$datas['nombre'];;}
					    else {$nombresucursal='<span class="text-danger">No Asignado!</span>';  }
	echo '
	
            
                
                <tr>
                    <td>'.$ip.'</td>
					<td>'.$namerb.'</td>
                    <td>'.$username.'</td>
                           <td>'.$nombresucursal.'</td>
					  
                   					
					<td><button onclick="MostrarreR('.$id.');" class="btn btn-block text-warning" data-toggle="modal" data-target="#ModaleditRouter" ><i class="fa fa-edit" ></i> </button></td>
					<td><button onclick="MostrariddRouter('.$id.');" class="btn btn-block text-danger" data-toggle="modal" data-target="#ModaledRouter" ><i class="fa fa-trash"></i> </button></td>
                </tr>
               
            ';
        
	
    
  }
		 
		 
 
echo "</tbody> </table>";

?>
	<!-- Button trigger modal -->

 


	    </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->