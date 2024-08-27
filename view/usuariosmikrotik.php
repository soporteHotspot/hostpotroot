<!-- Default box -->
 
    
      <div   class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Usuarios mikrotik</h3>

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




echo "<table id='dataTableCookie' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead class='bg-primary'>
                <tr> <th>ID</th>
                    <th>Usuario</th>
                      <th>Grupo</th>
                      <th>Comentario</th>
                        <th>Estado</th>
                      <th>Editar</th>
                       <th>Eliminar</th>
					
					
                </tr>
            </thead> <tbody>";
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	

	 $obtenerusers = $API->comm("/user/print");
		
		$TotalReg = count($obtenerusers);


for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$nombre = $users['name'];
	 
	$grupo = $users['group'];

if(isset($users['comment']))
	{$comment = $users['comment'];}

else {$comment="";}
	

	 	$disabled = $users['disabled'];
	
	

 
	
		echo "
	
            
                
                <tr>
                    <td>".$id."</td>
                    <td>".$nombre."</td>				
                     <td>".$grupo."</td>
                      <td>".$comment."</td>";				 ;	


                      	if ($disabled=="true"){
						echo "<td class='text-center'><button id='".$nombre."' value='".$disabled."' type='submit' class='btn btn-danger border mostrardatacambio2' data-toggle='modal' data-target='#Modaldisabled' > Habilitar </button> </td>";


					}

						else if ($disabled=="false") {
							echo "<td class='text-center'><button id='".$nombre."' value='".$disabled."' type='submit' class='btn btn-success border mostrardatacambio2' data-toggle='modal' data-target='#Modaldisabled' > Deshabilitar </button> </td>";

						}

					
			echo "
		<td class='text-center'><button id='".$nombre."' value='".$nombre."'   class='btn btn-light border mostrarusermeditm' > <i class='fa fa-edit text-warning'></i> </button> </td>
					
		<td class='text-center'><button id='".$nombre."' type='submit' class='btn btn-light border mostrarusermikdeleteM' data-toggle='modal' data-target='#Modaldeldelusermikrotik' > <i class='fa fa-trash text-danger'></i> </button> </td>
					
                </tr>
               
            ";
               
            
 	 
		 
}
echo "</tbody> </table>";




}

else {
	
	
	echo '<div class="alert alert-danger" role="alert">
  Error de conexión!
</div>';
}
 ?>