
					 
					 <!-- Default box -->
      <div id="controuters" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Sursales</h3>

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
				
				
			 
				$obtenerda=("SELECT * FROM sucursal");
                 $data=mysqli_query($mysqli,$obtenerda);    
				
		
print "<table id='dataTables' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr>
                    <th>Nombre</th>
					 
					  <th>Direccción</th>
					  <th>Texto</th>
					  <th>Editar</th>
					   <th>Eliminar</th>
					  
                </tr>
            </thead> <tbody>";



  while($verdata=mysqli_fetch_array($data)){
					 					 
					 $id=$verdata['id'];
					  $nombre=$verdata['nombre'];
					   $dir=$verdata['direccion'];
					   $txt=$verdata['texto'];
									  
					    
						 
	print '
	
            
                
                <tr>
					
                 
                    <td>'.$nombre.'</td>
                      <td>'.$dir.'</td>
                        <td>'.$txt.'</td>
						
				<td><button onclick="Mostrardaedit('.$id.');" class="btn btn-block text-warning" data-toggle="modal" data-target="#Modaleditsucursal" ><i class="fa fa-edit" ></i> </button></td>
					<td><button onclick="Mostrardadelete('.$id.');" class="btn btn-block text-danger" data-toggle="modal" data-target="#Modaldelete" ><i class="fa fa-trash"></i> </button></td>
                
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
