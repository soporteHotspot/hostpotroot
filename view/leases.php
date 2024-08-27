<!-- Default box -->
 
    
      <div   class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Host</h3>

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




echo "<table id='dataTablehost' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead class='bg-primary'>
                <tr> <th>ID</th>
                    <th>Ip</th>
					<th>MAC</th>					
					   <th>Dispositivo</th>

					   <th>Bypassed</th>
					   <th>Remover</th>		
             				
                </tr>
            </thead> <tbody>";
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	

	 $obtenerusers = $API->comm("/ip/dhcp-server/lease/print");
		
		$TotalReg = count($obtenerusers);


for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	 
	
	
	
	if (isset($users['mac-address'])){			
			$MAC = $users['mac-address'];
		}
		else {
			$MAC ="";
		}
	
	
	
	if (isset($users['address'])){			
			$ip = $users['address'];
		}
		else {
			$ip ="";
		}
	

	
		if (isset($users['host-name'])){			
			$hostname = $users['host-name'];
		}
		else {
			$hostname ="";
		}
	
	
	
	
 
 
	
		echo "
	
            
                
                <tr>
                    <td>".$id."</td>
                    <td>".$ip."</td>				
					<td>".$MAC." </td>
                    <td>".$hostname." </td>
                    <td class='text-center'><button id='".$MAC."' value='".$ip."' type='submit' class='btn   mostrardata' data-toggle='modal' data-target='#Modaladbinding' >  <i class='fa fa-cog text-success'></i> </button> </td>
					
						<td class='text-center'><button value='".$MAC."' type='button' class='btn btn-light border vermac2' data-toggle='modal' data-target='#Modalremovehost' > <i class='fa fa-trash text-danger'></i> </button> </td>


					
					
					
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