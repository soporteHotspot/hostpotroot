<!-- Default box -->
 
    
      <div   class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Usuarios binding Hotspot</h3>

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
$esp = array('-Seg.', '-Min ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana. ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 
function convertdatav($datavig){
$datemikrotik = array('jan', 'feb', 'mar','apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec');
$espanish = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre.', 'Octubre', 'Noviembre.', 'Diciembre.');
return sprintf(str_replace($datemikrotik, $espanish, $datavig));
} 



echo "<table id='dataTablebinding' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead class='bg-primary'>
                <tr>                
					<th>MAC</th>					
					<th>IP</th>
					   <th>Server</th>	  
					     						
						  <th>Comentario</th>	
						   <th>Habilitación</th>	
						   	  <th>Deshabilitación</th>	
  <th>Tiempo </th>	
						   <th>Estado</th>	

					<th>Eliminar</th>
					
                </tr>
            </thead> <tbody>";
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	

	 $obtenerusers = $API->comm("/ip/hotspot/ip-binding/print");
		
		$TotalReg = count($obtenerusers);


for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$mac = $users['mac-address'];

	$obtenervig= $API->comm("/system/schedule/print", array(
            ".proplist" => ".id,name,interval,start-date,start-time,next-run",
            "?name" => $mac,
            ));

$TotalRegv = count($obtenervig);

if($TotalRegv==1) 
	{	$obtenerv = $obtenervig[0];
				$startdatex = $obtenerv['start-date'];
				$startime = $obtenerv['start-time'];
				$finishdata = $obtenerv['next-run'];
				$interval = $obtenerv['interval'];
				$interval= converttime($interval);
			 

				
			}

			else{

$startdatex = "No definido";
				$startime = "No definido";
				$finishdata = "No definido";	
$interval= "No definido";	
			}
 

	if(isset($users['address']))
	{$ip = $users['address'];}

else {

	$ip="";
}



	if (isset($users['server'])){			
			$server = $users['server'];
		}
		else {
			$server ="";
		}
	
	
	$tipo = $users['type'];

	
	 if (isset($users['comment'])){	

	 $coment=		$users['comment'];
			$com = substr($users['comment'],0,20)."...";
			 
			
		}
		else {
		$com  ="";
		}
	
	
	$disabled = $users['disabled'];
 
	
		echo "
	
                     <tr> 
                     <td> ".$mac ."  </td>	
					 <td>".$ip."  </td>			 
					  <td>".$server."  </td>	
					  
					  <td>".$com."</td>    
					  <td> ".$startdatex." ".$startime."  </td>

					  <td> ".$finishdata."  </td>
					   <td> ".$interval."  </td>"		 ;

					 

					  	if ($disabled=="true"){
						echo "<td class='text-center'><button id='".$mac."' value='".$coment."' type='submit' class='btn btn-danger border mostrardataconfig' data-toggle='modal' data-target='#Modalconfigurar' ><i class='fa fa-clock  '></i>  Habilitar </button> </td>";


					}

						else if ($disabled=="false") {
							echo "<td class='text-center'><button id='".$mac."' value='".$coment."' type='submit' class='btn btn-success border mostrardataconfig' data-toggle='modal' data-target='#Modalconfigurar' > <i class='fa fa-clock  '></i> Modificar </button> </td>";

						}

					  echo "
					  
					<td class='text-center'><button value='".$mac."' type='submit' class='btn btn-light border removerbinding' data-toggle='modal' data-target='#Modalrembinding' > <i class='fa fa-user-minus text-danger'></i> </button> </td>
					
					
					
                </tr>
               
            ";
 	 
		 
}
echo "</tbody> </table>";}

else {
	
	echo '<div class="alert alert-danger" role="alert">
  Error de conexión!
</div>';
}
 ?>