<!-- Default box -->
 
      <div id="contuser" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Usuarios</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">
<button type="button" class="btn  border m-2" data-toggle="modal" data-target="#Modaladusers">
   <i class="fas fa-user-plus text-primary fa-2x"></i>
</button>

  <button  type="button" class="btn  border m-2" data-toggle="modal" data-target="#ModalH">
  <i class="fas fa-address-card text-success fa-2x "></i>
</button>
  <button  type="button" class="btn  border m-2" data-toggle="modal" data-target="#ModalF">
  <i class="fas fa-qrcode text-dark fa-2x "></i>
</button>

<button id="updateusershp" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>


 <!-- <button  type="button" class="btn  border m-2" data-toggle="modal" data-target="#ModalH">
  <i class="fas fa-file-code text-dark fa-2x "></i>
</button> -->
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on




echo "<table id='dataTableusers' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead class='bg-primary'>
                <tr> <th>ID</th>
                    <th>Usuario</th>
					<th>Password</th>
					<th>Perfil</th>
					
                    <th>Tiempo</th>
					 <th>Tiempo limite</th>
					  <th>Consumo</th>
                    <th>Comentario</th>
					<th>Imprimir</th>					
					<th>Eliminar</th>
                </tr>
            </thead> <tbody>";
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	
 
	 $obtenerusers = $API->comm("/ip/hotspot/user/print");
		
		$TotalReg = count($obtenerusers);


$i = 0;

while ( $i++ < $TotalReg) {

//for ($i = 0; $i++ < $TotalReg; ) {
	$users = $obtenerusers[$i];
	
	$id = $users['.id'];
	$nombre = $users['name'];
	$idx = substr($users['.id'],1,5);
	
	if (isset($users['password'])){			
			$pass = $users['password'];
		}
		else {
			$pass ="";
		}
	if (isset($users['profile'])){			
			$perfil = $users['profile'];
		}
		else {
			$perfil ="";
		}
	
	
	if (isset($users['uptime'])){			
			$tiempo = $users['uptime'];
		}
		else {
			$tiempo="";
		}
		if (isset($users['limit-uptime'])){			
			$ltiempo =$users['limit-uptime'];
		}
		else {
			$ltiempo ="Ilimitado";
		}
		if (isset($users['bytes-out'])){			
			$byts = $users['bytes-out'];
		}
		else {
			$byts  ="";
		}
		if (isset($users['comment'])){			
			$comentario = substr($users['comment'],0,10)."...";
			
		}
		else {
			$comentario ="";
		}
	
	
	
	echo '
	
            
                
                <tr id="'.$nombre.'">
                    <td >'.$id.'</td>
					<td>'.$nombre.'</td>
                    
					<td>**********</td>
                    <td>'.$perfil.'</td>					
					<td>'.$tiempo.'</td>	
					<td>'.$ltiempo.'</td>	
					<td>'.$byts.'</td>	
					<td>'.$comentario.'</td>';
					
					if ($id=="*0"){ echo "<td></td><td></td>";
						
					} else {
					echo '
                     <td class="text-center"><form action="voucher/usuario.php" method="post" target="_blanck"> <input required type="hidden"  value="'.$nombre.'"     name="usuario"><button type="submit" class="btn  btn-light border"><i class="fas fa-print text-primary"></i></button> </form></td>					
					 
					 <td class="text-center"><button value="'.$nombre.'"type="button" class="btn btn-light border mostraridusuario " data-toggle="modal" data-target="#Modaldeldeleteuser"><i class="fas fa-user-minus text-danger"></i></button>
					
					</td>	';	}			
					
                echo '</tr>';
               
            
		
 	 
		 
}
echo "</tbody> </table>";}

else {
	
	echo 3;
}
 ?>