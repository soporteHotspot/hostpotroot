<!-- Default box -->
      <div id="contperfil" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title "> Tree queues</h3>

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

echo "<table id='dataTablearbolcolas' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr><th>ID</th>
                    <th>Nombre</th>
					<th>Parent</th>
					<th>Marcado de paquete</th>
					<th>Tipo de cola</th>
					<th>Prioridad</th>
					<th>Limite</th>
					<th>Limite Máximo</th>
						
                  <th>Comentario</th>		
				  	
				    <th>Estado</th>		
				        <th>Eliminar</th>		
					 
					
                   
                </tr>
            </thead> <tbody>";
if ($API->connect($ip,$Usuario,$password)) {
	
	 $Obtenerinterfaces = $API->comm("/queue/tree/print");
		
		$TotalReg = count($Obtenerinterfaces);

 	



for ($i = 0; $i < $TotalReg; $i++) {
	$interfacessss = $Obtenerinterfaces[$i];
	$id=$interfacessss['.id'];
	$idx = substr($interfacessss['.id'],1,5);
	$nam=$interfacessss['name'];
	$target=$interfacessss['parent'];
	$limite=$interfacessss['max-limit'];
	$limitemax=$interfacessss['limit-at'];
	$marcado=$interfacessss['packet-mark'];
	$tipocola=	$interfacessss['queue'];
	$prioridad=	$interfacessss['priority'];
	$comentario=$interfacessss['comment'];	
	$disabled = $interfacessss['disabled'];
	
	echo "
	
            
                
                <tr> <td>".$id."</td>
                    <td>".$nam."</td>
					 <td>".$target."</td>				 
					   <td>".$marcado."</td>
					   <td>".$tipocola."</td>	
					    <td>".$prioridad."</td>	

					   <td>".$limite."</td>	
					   <td>".$limitemax."</td>						  
					   <td>".$comentario."</td>";
					   
					   if ($disabled=="true"){
						echo "<td class='text-center'><button id='".$nam."' value='".$disabled."' type='submit' class='btn btn-danger border mostrardatacambio' data-toggle='modal' data-target='#Modaldisabled' > Habilitar </button> </td>";


					}

						else if ($disabled=="false") {
							echo "<td class='text-center'><button id='".$nam."' value='".$disabled."' type='submit' class='btn btn-success border mostrardatacambio' data-toggle='modal' data-target='#Modaldisabled' > Deshabilitar </button> </td>";

						}

					
         echo '<td class="text-center"><button   value="'.$nombre.'" type="button" class="btn btn-light border mostrararbolcolas " data-toggle="modal" data-target="#Modaldeldeletearbolcolas"><i class="fas fa-user-minus text-danger"></i></button>
					
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