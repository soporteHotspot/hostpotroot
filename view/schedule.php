<!-- Default box -->
 
    
      <div   class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Schedule</h3>

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

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES"; }
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 




echo "<table id='dataTableschedule' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead class='bg-primary'>
                <tr> <th>ID</th>
                 <th>Nombre</th>										
				 <th>Inicio</th>					
                <th>Intervalo</th>
               <th>Siguiente ejecución</th>
                <th>Script</th>
                <th>Comentarios</th>
                 <th>Estado</th>
               
               <th>Eliminar</th>
					
                </tr>
            </thead> <tbody>";
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	

	 $obtenerusers = $API->comm("/system/schedule/print");
		
		$TotalReg = count($obtenerusers);
		
for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$nombre = $users['name'];
	
	
	
	if (isset($users['start-date'])){			
			$start = $users['start-date'];
		}
		else {
			$start ="";
		}
	
	
	
	if (isset($users['interval'])){			
			$in = converttime($users['interval']);
		}
		else {
			$in ="";
		}
	
	if (isset($users['next-run'])){			
			$nr= $users['next-run'];
		}
		else {
			$nr ="";
		}
	
		if (isset($users['on-event'])){			
			$scr = substr($users['on-event'],0,20)."...";
			 
			
		}
		else {
			$scr ="";
		}
	
	
	if (isset($users['comment'])){			
			$comentario = substr($users['comment'],0,20)."...";
			 
			
		}
		else {
			$comentario ="";
		}
	
	$disabled = $users['disabled'];
 
 
	
		echo "
	
            
                
                <tr>
                    <td>".$id."</td>
                    <td>".$nombre."</td>				
					<td>".$start." </td>
                    <td>".$in." </td>
                    <td>".$nr." </td>
                   
                    <td>".$scr." </td>
                     <td>".$comentario." </td>";
                     	if ($disabled=="true"){
						echo "<td class='text-center'><button id='".$nombre."' value='".$disabled."' type='submit' class='btn btn-danger border mostrardatasche' data-toggle='modal' data-target='#Modaldische' > Habilitar </button> </td>";


					}

						else if ($disabled=="false") {
							echo "<td class='text-center'><button id='".$nombre."' value='".$disabled."' type='submit' class='btn btn-success border mostrardatasche' data-toggle='modal' data-target='#Modaldische' > Deshabilitar </button> </td>";

						} echo "<td class='text-center'><button value='".$nombre."' type='submit' class='btn btn-light border removeschedule' data-toggle='modal' data-target='#Modalremschedule' > <i class='fa fa-user-minus text-danger'></i> </button> </td>
					
					
					
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