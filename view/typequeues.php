<!-- Default box -->
      <div id="contperfil" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title "> Queues type</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">
		  <div class="form-row">
    <div class="form-group col-md-3">
   
    </div>
  </div>
		
		 
	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

echo "<table id='dataTabletiposcolas' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr><th>ID</th>
                    <th>Nombre</th>
					<th>Tipo [kind]</th>
						
                  <th>Velocidad</th>		
				  	
				    <th>Clasificación</th>		
				
				      <th>Eliminar</th>	
					 
					
                   
                </tr>
            </thead> <tbody>";
if ($API->connect($ip,$Usuario,$password)) {
	
	 $Obtenerinterfaces = $API->comm("/queue/type/print");
		
		$TotalReg = count($Obtenerinterfaces);

 	



for ($i = 0; $i < $TotalReg; $i++) {
	$interfacessss = $Obtenerinterfaces[$i];
	$id=$interfacessss['.id'];
	$idx = substr($interfacessss['.id'],1,5);
	$nam=$interfacessss['name'];
	$tipo=$interfacessss['kind'];

if(isset($interfacessss['pcq-rate'])){
	$rate=$interfacessss['pcq-rate'];
} else{ $rate="";}
	
if(isset($interfacessss['pcq-classifier'])){
	$clasificacion=$interfacessss['pcq-classifier'];
} else{ $clasificacion="";}
	
	
	echo "
	
            
                
                <tr> <td>".$id."</td>
                    <td>".$nam."</td>
					 <td>".$tipo."</td>			 
					  
					   <td>".$rate."</td>
					   <td>".$clasificacion."</td>";


					
					
           echo '<td class="text-center"><button   value="'.$nam.'" type="button" class="btn btn-light border mostrartipocolas " data-toggle="modal" data-target="#Modaldeldeletetipocolas"><i class="fas fa-user-minus text-danger"></i></button>
					
					</td>	';	
	
	
    
		 
		 
		 
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