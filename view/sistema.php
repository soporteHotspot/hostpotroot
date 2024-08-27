
					 
					 <!-- Default box -->
      <div id="controuters" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Sistema</h3>

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
				
				
			 
				$obtenerda=("SELECT * FROM sistema");
                 $data=mysqli_query($mysqli,$obtenerda);    
				
		
echo "<table id='dataTablesistema' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr>
                    <th>Sistema</th>
					<th>Logo</th>
					<th>idusuario</th>
					
                    <th>idpassword</th>
					 <th>Texto</th>
					  <th>Zona horaria</th>
					  <th>Editar</th>
					   <th>Eliminar</th>
					  
                </tr>
            </thead> <tbody>";



  while($verdata=mysqli_fetch_array($data)){
					 					 
					 $id=$verdata['id'];
					  $sistema=$verdata['sistema'];
					   $logo=$verdata['logo'];
					   $idusername=$verdata['idusuario'];
					    $idpassword=$verdata['idpassword'];
						 $texto=$verdata['texto'];
						 $zone=$verdata['zona'];				  
					    
						 
	echo '
	
            
                
                <tr>
                    <td>'.$sistema.'</td>
					<td><img src="'.$logo.'"   style="width:100px;height:100px;">  </td>
                    <td>'.$idusername.'</td>
					 <td>'.$idpassword.'</td>
                    <td>'.$texto.'</td>
                      <td>'.$zone.'</td>
						
					<td><button onclick="Mostrarempresa1('.$id.');" class="btn btn-block text-warning" data-toggle="modal" data-target="#Modaleditdata" ><i class="fa fa-edit" ></i> </button></td>
					<td><button onclick="Mostrarempresa2('.$id.');" class="btn btn-block text-danger" data-toggle="modal" data-target="#ModalDData" ><i class="fa fa-trash"></i> </button></td>
                
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
