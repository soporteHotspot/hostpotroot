<!-- Default box -->
 
    
      <div   class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Perfiles Hotspot</h3>

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
function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES";	}
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 
echo "<table id='dataTableperfiles' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr><th>ID</th>
                    <th>Nombre</th>
					 <th>No. usuarios</th>					 
					 <th>Velocidad</th>
					 <th>MAC cookie</th>
					  <th>Script</th>
					   <th>Editar</th>
					   <th>Eliminar</th>
					
					
                   
                </tr>
            </thead> <tbody>";
if ($API->connect($ip,$Usuario,$password)) {
	
	 $ObtenerPerfiles = $API->comm("/ip/hotspot/user/profile/print");
		
		$TotalReg = count($ObtenerPerfiles);

$Perfiles = $ObtenerPerfiles['0'];	



for ($i = 0; $i < $TotalReg; $i++) {
	$Perfiles = $ObtenerPerfiles[$i];
	$id=$Perfiles['.id'];
	$idx = substr($Perfiles['.id'],1,10);
	$nombre=$Perfiles['name'];
	$nusuarios=$Perfiles['shared-users'];
	
	if (isset($Perfiles['mac-cookie-timeout'])){			
			$cokie=converttime($Perfiles['mac-cookie-timeout']);
		}
		else {
			$cokie = "";
		}
	
	
	
	if (isset($Perfiles['rate-limit'])){			
			$velocidad=$Perfiles['rate-limit'];
		}
		else {
			$velocidad ="Ilimitado";
		}
	
	
	if (isset($Perfiles['on-login'])){			
			$script=$Perfiles['on-login'];
			$script = substr($script, 0, 15) . ' . . .  >_';
		}
		else {
			$script="";
		}
	
	

	
	
	echo "          <tr> <td>".$id."</td>
                    <td>".$nombre."</td>
					 <td>".$nusuarios."</td>
					 <td>".$velocidad."</td>
					  <td>".$cokie."</td>
					  <td style='background-color:#3E403E ; color:white ;'>".$script."</td>";
					  echo "<td class='text-center'><button id='".$nombre."' value='".$nombre."'   class='btn btn-light border mostrardataprofile'  > <i class='fa fa-edit text-warning'></i> </button> </td>";
					  if ($id=="*0"){ echo "<td></td>";
						
					} else { echo "<td class='text-center'><button value='".$nombre."' class='btn btn-light border nombredeperfil' data-toggle='modal' data-target='#ModalperfilhP' ><i class='fa fa-trash text-danger'></i> </button></td>";
					} echo '</tr>';
               
         
        
	
    
		 
		 
		 
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