<!-- Default box -->
      <div id="contperfil" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Interfaces</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">
		 
		
		 
	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on
echo "<table id='dataTablei' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
 
            <thead>
                <tr><th>ID</th>
                    <th>Nombre</th>
					<th>Tipo</th>
					<th>Nombre Default</th>
						
                  <th>Comentario</th>	

                   <th>Tráfico</th>			
				  	
				    <th>Editar</th>		
				
					 
					
                   
                </tr>
            </thead> <tbody>";
if ($API->connect($ip,$Usuario,$password)) {
	
	 $Obtenerinterfaces = $API->comm("/interface/print", array(
           
            "?type" =>"ether",          
              
            ));
		$TotalReg = count($Obtenerinterfaces);

$Perfiles = $Obtenerinterfaces['0'];	



for ($i = 0; $i < $TotalReg; $i++) {
	$interfacessss = $Obtenerinterfaces[$i];
	$id=$interfacessss['.id'];
	$idx = substr($interfacessss['.id'],1,5);
	$nam=$interfacessss['name'];
	$tipo=$interfacessss['type'];	
	
	$def=$interfacessss['default-name'];

	if(isset($interfacessss['comment'])){
		$comentario=$interfacessss['comment'];	
	}else
	{$comentario="";}	
	
	echo "
	
            
                
                <tr>  <td><input id='id".$nam."' value='".$id."' type='button' class='btn btn-sm '  ></td>	
                     <td><input id='n".$nam."' value='".$nam."' type='button' class='btn btn-sm '  ></td>	
					 <td><input   id='tipo".$nam."' value='".$tipo."' type='button' class='btn btn-sm'  ></td>			 
					  <td><input id='default".$nam."' value='".$def."' type='button' class='btn btn-sm'  ></td>	
					  
					    <td><input id='comentario".$nam."' value='".$comentario."' type='button' class='btn btn-sm'  ></td>";


echo '
					      <td class="text-center"><form action="trafico" method="post" > <input required type="hidden"  value="'.$nam.'"     name="interface"><button type="submit" class="btn  btn-light border"><i class="fas fa-chart-bar text-primary"></i></button> </form></td>';

					      echo "
					  
					<td class='text-center'><button  value='".$nam."' type='submit' class='btn btn-sm btn-light border editinterface' data-toggle='modal' data-target='#Modaleditinterface' ><i class='fa fa-edit text-warning'></i> </button></td> 	";
        
	
    echo "</tr>";
		 
		 
		 
}
echo "</tbody> </table>";
 
}

else {
	
	echo '<div class="alert alert-danger" role="alert">
  Error de conexión!
</div>';
}
?>



	    </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->