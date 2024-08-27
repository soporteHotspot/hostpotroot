<!-- Default box -->
 
    
      <div   class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Usuarios conectados Hotspot</h3>

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
 
function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES";	}
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 




echo "<table id='dataTableusersactive' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead class='bg-primary'>
                <tr> <th>ID</th>
                    <th>Usuario</th>
					<th>IP</th>
					<th>MAC</th>					
                    <th>Tiempo</th>
					 <th>Tiempo inactividad</th>
					   <th>Tiempo restante</th>
					  <th>Tiempo espera</th>
                 	<th>Limete  total bytes</th>	
					 
					<th>Desconectar</th>
					
                </tr>
            </thead> <tbody>";
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	

	 $obtenerusers = $API->comm("/ip/hotspot/active/print");
		
		$TotalReg = count($obtenerusers);


for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$nombre = $users['user'];
	
	
	if (isset($users['address'])){			
			$ip = $users['address'];
		}
		else {
			$ip ="";
		}
	if (isset($users['mac-address'])){			
			$mac = $users['mac-address'];
		}
		else {
			$mac ="";
		}
	
	
	if (isset($users['uptime'])){			
			$tiempo = converttime($users['uptime']);
		}
		else {
			$tiempo="";
		}
		if (isset($users['idle-time'])){			
			$inactividad =converttime($users['idle-time']);
		}
		else {
			$inactividad ="";
		}
		if (isset($users['session-time-left'])){			
			$restante = converttime($users['session-time-left']);
		}
		else {
			$restante ="";
		}
		if (isset($users['keepalive-timeout'])){			
			$espera =converttime($users['keepalive-timeout']);
			
		}
		else {
			$espera="";
		}
		
		if (isset($users['limit-bytes-total'])){			
			$bytstotal = $users['limit-bytes-total'];
			
		}
		else {
			$bytstotal="";
		}
	
	

	
	
	
	
	
	
 
 
	
		echo "
	
            
                
                <tr>
                    <td>".$id."</td>
                    <td>".$nombre."</td>
					<td>".$ip."</td>
					<td>".$mac." </td>
					<td>".$tiempo." </td>
					<td>".$inactividad." </td>
                    <td>".$restante." </td>
					<td>".$espera." </td>
					<td>".$bytstotal." </td>
					
					
					<td class='text-center'><button value='".$nombre."' type='submit' class='btn btn-light border desconectarusuario' data-toggle='modal' data-target='#Modalremuser' > <i class='fa fa-user-minus text-danger'></i> </button> </td>
					
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