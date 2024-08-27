<!-- Default box -->
      <div id="contperfil" class="card mt-1 ">
        <div class="card-header bg-purple">
          <h3 class="card-title ">Perfiles PPPoE</h3>

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

echo "<table id='dataTableperfiles' border='1' style='width:100%;'  class='table border-purple table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr><th>ID</th>
                    <th>Nombre</th>
					 <th>Poollocal</th>					 
					 <th>pool remoto</th>
					 <th>Velodidad(rx/tx)</th>
					  <th>Editar</th>
					
					   <th>Eliminar</th>
					
					
                   
                </tr>
            </thead> <tbody>";
if ($API->connect($ip,$Usuario,$password)) {
	
	 $ObtenerPerfiles = $API->comm("/ppp/profile/print");
		
		$TotalReg = count($ObtenerPerfiles);

$Perfiles = $ObtenerPerfiles['0'];	



for ($i = 0; $i < $TotalReg; $i++) {
	$Perfiles = $ObtenerPerfiles[$i];
	$id=$Perfiles['.id'];
	$idx = substr($Perfiles['.id'],1,10);
	$nombre=$Perfiles['name'];
	
	

	
	
if (isset($Perfiles['local-address'])){			
			$iplocal=$Perfiles['local-address'];
		}
		else {
			$iplocal="";
		}
		
	if (isset($Perfiles['remote-address'])){			
			$ipremoto=$Perfiles['remote-address'];;
		}
		else {
			$ipremoto="";
		}
	
	if (isset($Perfiles['rate-limit'])){			
			$velodidad=$Perfiles['rate-limit'];
		}
		else {
			$velodidad="Ilimitado";
		}
	
	
	

	
	
	echo "
	
            
                
                <tr> <td>".$id."</td>
                    <td>".$nombre."</td>
					 <td>".$iplocal."</td>
					 <td>".$ipremoto."</td>
					  <td>".$velodidad."</td>";
					  echo "<td class='text-center'><button value='".$nombre."' class='btn btn-light border obtenernombreperfilppp'  ><i class='fa fa-edit text-warning'></i> </button></td>";
					  
					  if ($id=="*0" || $id=="*FFFFFFFE"){ echo "<td></td>";
						
					} else { echo "<td class='text-center'><button value='".$nombre."' class='btn btn-light border nombredeperfilppp' data-toggle='modal' data-target='#ModaldelPPPoE' ><i class='fa fa-trash text-danger'></i> </button></td>";
					} echo "</tr>";
        
	
    
		 
		 
		 
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
