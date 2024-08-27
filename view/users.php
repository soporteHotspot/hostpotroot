
      <div   class="card mt-1 ">
        <div class="card-header bg-purple">
          <h3 class="card-title ">Usuarios Hotspot</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">
 
    
<?php



function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES";	}
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 

error_reporting(0);
 ini_set('max_execution_time', '0');
require_once '../require/routerboard.phar';
 






if ($API->connect($ip,$Usuario,$password)) {

		  


	echo "<table id='dataTableusers' border='1' style='width:100%;'  class='table border-indigo table-sm     table-striped' cellspacing='0'>
            <thead class='bg-indigo'>
                <tr> 
                    <th>Usuario</th>
				
					<th>Perfil</th>
					
                  
					 <th>Tiempo limite</th>
					  
                    <th>Comentario</th>
                     
					<th>Estado</th>
					<th>QR</th>
					 <th>Detalles</th>
					 <th>Editar</th>						
					<th>Imprimir</th>		
					<th>Eliminar</th>
                </tr>
            </thead> <tbody>";
	
 
	 $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => "name,profile,limit-uptime,comment,disabled",
           
            ));
		
	 


//$i = 1;

//while ( $i <= $TotalReg) {

foreach($obtenerusers as $i=>$v)  {
	 
	
	$id = $obtenerusers[$i]['.id'];
	$nombre = $obtenerusers[$i]['name'];
	$idx = substr($obtenerusers[$i]['.id'],1,5);
	

	if (isset($obtenerusers[$i]['profile'])){			
			$perfil = $obtenerusers[$i]['profile'];
		}
		else {
			$perfil ="";
		}
	
	
	 
		if (isset($obtenerusers[$i]['limit-uptime'])){			
			$ltiempo =converttime($obtenerusers[$i]['limit-uptime']);
		}
		else {
			$ltiempo ="Ilimitado";
		}
		 
		if (isset($obtenerusers[$i]['comment'])){			
			$comentario = substr($obtenerusers[$i]['comment'],0,10)."...";
			 
			
		}
		else {
			$comentario ="";
		}
	
	$disabled = $obtenerusers[$i]['disabled'];
	
	echo '
	
            
                
                <tr  >
                    <td >'.$nombre.'</td>
				
                     
                    <td>'.$perfil.'</td>					
				 	
					<td>'.$ltiempo.'</td>	
					
					<td>'.$comentario.'</td>';

						if ($disabled=="true"){
						echo "<td class='text-center'><button id='".$nombre."' value='".$disabled."' type='submit' class='btn btn-danger border mostrardatacambio' data-toggle='modal' data-target='#Modaldisableduser' > Habilitar </button> </td>";


					}

						else if ($disabled=="false") {
							echo "<td class='text-center'><button id='".$nombre."' value='".$disabled."' type='submit' class='btn btn-success border mostrardatacambio' data-toggle='modal' data-target='#Modaldisableduser' > Deshabilitar </button> </td>";

						}
echo ' <td class="text-center"> <button value="'.$nombre.'" type="submit" class="btn  btn-light getdataqr"  ><i class="fas fa-qrcode text-dark"></i></button></td>';
						echo ' <td class="text-center"> <button value="'.$nombre.'" type="submit" class="btn  btn-light verinfo"  ><i class="fas fa-info-circle text-primary"></i></button></td>';

					echo "<td class='text-center'><button id='".$nombre."' value='".$nombre."'   class='btn btn-light border mostrardatauserhp'  > <i class='fa fa-edit text-warning'></i> </button> </td>";
							if ($id=="*0"){ echo "<td></td><td></td>";
						
					} else {
					echo '
                     <td class="text-center"><form action="voucher/usuario" method="post" target="_blank"> <input required type="hidden"  value="'.$nombre.'"     name="usuario"><button type="submit" class="btn  btn-light border"><i class="fas fa-print text-primary"></i></button> </form></td>					
					 
					 <td class="text-center"><button   value="'.$nombre.'" type="button" class="btn btn-light border mostraridusuario " data-toggle="modal" data-target="#Modaldeldeleteuser"><i class="fas fa-user-minus text-danger"></i></button>
					
					</td>	';	}			
					
                echo '</tr>';
               
 
 	 
	
 	 
}
echo "</tbody> </table>";
 

}

else {
 
	
	echo "error";
}

 ?>