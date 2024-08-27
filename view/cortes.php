
					 
					 <!-- Default box -->
      <div id="controuters" class="card mt-1 ">
        <div class="card-header bg-primary">
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



				require("../require/connect_db.php");

				     $obtenerda=("SELECT * FROM sistema");
              $datax=mysqli_query($mysqli,$obtenerda);    
              $data=mysqli_fetch_array($datax);             
              $moneda=$data['moneda'];
			 
				$obtenerda=("SELECT * FROM cortes");
                 $data=mysqli_query($mysqli,$obtenerda);    
				
		


echo "<table id='dataTablecortes' border='1' style='width:100%;'  class='table border-primary table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr>
                    <th>Id</th>
					<th>Fecha</th>
					<th>Porcentaje</th>
					<th>Comision del vendedor</th>
					<th>Restante</th>
					<th>Total</th>					 
					<th>Responsable</th>
					<th>Vendedor</th>
					<th >Archivo</th>
					
					<th>Estado</th>
					 
					 <th>Eliminar</th>
					  
					  
                </tr>
            </thead> <tbody>";

  while($verdata=mysqli_fetch_array($data)){
	
					 					 
					 $id=$verdata['id'];
					  $fecha=$verdata['fecha'];
					  $porcentaje=$verdata['porcentaje'];
					  $comision=floatval($verdata['comision']);
					  $dif=floatval($verdata['restante']);
					   $res=$verdata['responsable'];					  
					   $total=floatval($verdata['cantidad']);
					    $vendedor=$verdata['vendedor'];
					    $archivo=$verdata['nota'];
					    $estado=$verdata['estado'];

					    
						 
	print '
	
            
                
                <tr>
                    <td>'.$id.'</td>
					<td>'.$fecha.'</td>
                    <td>% '.$porcentaje.'</td>
                    <td> '.$moneda.' '.number_format($comision,2,".",",").'</td>
                    <td>'.$moneda.' '.number_format($dif,2,".",",").'</td>
                    <td class="text-right" >'.$moneda.' '.number_format($total,2,".",",").'</td>
					 <td>'.$res.'</td>
					  <td>'.$vendedor.'</td>';

					  if (!file_exists("../../corte/".$archivo)) {
					    	  print '<td class="text-center" ><a style="pointer-events: none;" target="_blank" title="eliminado"   class="btn " href="#"  > <i class="fas text-warning fa-exclamation-triangle fa-2x"></i></a></td></td>';}

					    else {print '<td class="text-center" ><a target="_blank" class="btn  " href="vercorte?pdf='.$archivo.'" role="button"><i class="fas text-danger  fa-2x fa-file-pdf"></i></a></td>';}

					  if($estado=="pagado"){
echo '<td><span class="badge bg-success pt-2 pb-2 btn-block">'.$estado.'</span></td>';

					  }

					 else if($estado=="anulado"){

					  	echo '<td><span class="badge bg-danger pt-2 pb-2 btn-block">'.$estado.'</span></td>';
					  }
                  
					echo '<td class="text-center"><button onclick="Mostrardatadelete('.$id.');" class="btn btn-danger" data-toggle="modal" data-target="#Modaldeletedata" ><i class="fa fa-trash"></i> </button></td>
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