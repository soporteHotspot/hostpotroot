
					 
					 <!-- Default box -->
      <div id="controuters" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Cortes</h3>

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



require_once '../require/routerboard.phar';

				require("../require/connect_db.php");
				$vendedor =$_SESSION['username'];
			 
				$obtenerda=("SELECT * FROM cortes WHERE vendedor='$vendedor'AND estado='pagado'");
                 $data=mysqli_query($mysqli,$obtenerda);    
				
		


echo "<table id='dataTablecortes' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr>
                    <th>Id</th>
					<th>Fecha</th>
					<th>Total</th>
					<th>Porcentaje</th>
					<th>Comision</th>
					<th>Responsable</th>
					<th>Vendedor</th>
					
					
					 
					 <th>Eliminar</th>
					  
					  
                </tr>
            </thead> <tbody>";

  while($verdata=mysqli_fetch_array($data)){
	
					 					 
					 $id=$verdata['id'];
					  $fecha=$verdata['fecha'];
					  $cantidad=$verdata['cantidad'];
					   $por=$verdata['porcentaje'];
					    $com=$verdata['comision'];
					   $res=$verdata['responsable'];					  
					    $vendedor=$verdata['vendedor'];
						 
	echo '
	
            
                
                <tr>
                    <td>'.$id.'</td>
					<td>'.$fecha.'</td>
                    <td> $ '.$cantidad.'</td>
                    <td> % '.$por.'</td>
                    <td> $ '.$com.'</td>
					 <td>'.$res.'</td>
					  <td>'.$vendedor.'</td>
                  
					<td><button onclick="Mostrardatadelete('.$id.');" class="btn btn-block text-danger" data-toggle="modal" data-target="#Modaldeletedata" ><i class="fa fa-trash"></i> </button></td>
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