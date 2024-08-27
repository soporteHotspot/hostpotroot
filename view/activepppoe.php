<!-- Default box -->
 
    
      <div   class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Usuarios conectados PPPoE</h3>

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




echo "<table id='dataTableactivepppoe' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead class='bg-primary'>
                <tr> <th>ID</th>
                    <th>Usuario</th>					
					<th>Servicio</th>					
					   <th>IP</th>						
					   <th>Tiempo</th>	
					   
                 	<th>Desconectar</th>
                  
					
                </tr>
            </thead> <tbody>";
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	

	 $obtenerusers = $API->comm("/ppp/active/print");
		
		$TotalReg = count($obtenerusers);


for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$nombre = $users['name'];
	
	
	if (isset($users['service'])){			
			$service = $users['service'];
		}
		else {
			$service ="";
		}
	
	if (isset($users['address'])){			
			$ip = $users['address'];
		}
		else {
			$ip ="";
		}
	
	
		if (isset($users['uptime'])){			
			$tiempo = converttime($users['uptime']);
		}
		else {
			$tiempo ="";
		}
	
	
	
	
 
 
	
		echo "
	
            
                
                <tr>
                    <td>".$id."</td>
                    <td>".$nombre."</td>					
                    <td>".$service." </td>
					<td>".$ip." </td>
					<td>".$tiempo." </td>
					
					<td class='text-center'><button value='".$nombre."' type='submit' class='btn btn-light border removeruseractivePPPoE' data-toggle='modal' data-target='#ModalremoveuserPPPoE' > <i class='fa fa-user-minus text-danger'></i> </button> </td>
					
					
					
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