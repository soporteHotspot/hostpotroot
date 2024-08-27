<!-- Default box -->
 
 

<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on




echo "<table id='dataTablesecrets' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead class='bg-primary'>
                <tr> <th>ID</th>
                    <th>Usuario</th>				
					<th>Servicio</th>					
					   <th>Perfil</th>	
					   <th>Comentario</th>	
					   <th>Editar</th>	
                 	<th>Estado</th>                 	
                 	<th>Eliminar</th>
					
                </tr>
            </thead> <tbody>";
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	

	 $obtenerusers = $API->comm("/ppp/secret/print");
		
		$TotalReg = count($obtenerusers);


for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$nombre = $users['name'];
	
	
	
	if (isset($users['password'])){			
			$pass = $users['password'];
		}
		else {
			$pass ="";
		}
	
	
	
	if (isset($users['service'])){			
			$service = $users['service'];
		}
		else {
			$service ="";
		}
	
	if (isset($users['profile'])){			
			$profile = $users['profile'];
		}
		else {
			$profile ="";
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
					
                    <td>".$service." </td>
					<td>".$profile." </td>
					<td>".$comentario." </td>";
					echo "<td class='text-center'><button value='".$nombre."' type='submit' class='btn  getdataedit'  > <i class='fa fa-edit text-warning'></i>  </button> </td>";


						if ($disabled=="true"){
						echo "<td class='text-center'><button id='".$nombre."' value='".$disabled."' type='submit' class='btn btn-danger border mostrardatacambio' data-toggle='modal' data-target='#Modaldisabled' > Habilitar </button> </td>";


					}

						else if ($disabled=="false") {
							echo "<td class='text-center'><button id='".$nombre."' value='".$disabled."' type='submit' class='btn btn-success border mostrardatacambio' data-toggle='modal' data-target='#Modaldisabled' > Deshabilitar </button> </td>";

						}

					
					
					echo "
					
					<td class='text-center'><button value='".$nombre."' type='submit' class='btn btn-light border mostrarsecret' data-toggle='modal' data-target='#Modaldeldelsecret' > <i class='fa fa-trash text-danger'></i> </button> </td>
					
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