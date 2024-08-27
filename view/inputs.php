
					 
					 <!-- Default box -->
      <div id="controuters" class="card mt-1 ">
        <div class="card-header bg-primary">
          <h3 class="card-title ">Botones para punto de venta</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">
 


<?php


//Use any PEAR2_Net_RouterOS class from here on
function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES"; }
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 

          require_once '../require/routerboard.phar';

          $ip =$_SESSION['ip'];

				require("../require/connect_db.php");    
   $obtenerda=("SELECT * FROM sistema");
              $datax=mysqli_query($mysqli,$obtenerda);    
              $data=mysqli_fetch_array($datax);             
              $moneda=$data['moneda'];
				 
			   	$obtenerda=("SELECT * FROM botones where mikrotik='$ip' ");  
                 $data=mysqli_query($mysqli,$obtenerda); 




				
		


echo "<table id='dataTablerouter' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr>
                    <th>Id</th>
                     <th>Ip</th>
					<th>Nombre</th>
					<th>Servidor</th>
					
                    <th>Perfil</th>
                    <th>Tiempo</th>
                    <th>Precio</th>
                    
                      <th>Long</th>
                       <th>Id sucursal</th>
                       <th>Editar</th>

					
					 
					 <th>Eliminar</th>
					  
					  
                </tr>
            </thead> <tbody>";

  while($verdata=mysqli_fetch_array($data)){
	
					 					 
					 $id=$verdata['id'];
					 $ip=$verdata['mikrotik'];
					  $nombre=$verdata['nombre'];
					  $server=$verdata['server'];
					  $perfil=$verdata['perfil'];
					   $tiempo=converttime($verdata['tiempo']);                 	
					    $precio=$moneda." ".number_format($verdata['precio'],2,".",",");
					     
					    $longitud=$verdata['legend'];
					    $idsucursal=$verdata['idsucursal'];

					    $obteneridsu=("SELECT * FROM sucursal WHERE id='$idsucursal'");
              $datasucursal=mysqli_query($mysqli,$obteneridsu);    
              $datas=mysqli_fetch_array($datasucursal);             
              $nombresucursal=$datas['nombre'];
						 
	echo '
	
            
                
                <tr>
                    <td>'.$id.'</td>
                    <td>'.$ip.'</td>
					<td>'.$nombre.'</td>
                    <td>'.$server.'</td>					
					 <td>'.$perfil.'</td>
					 <td>'.$tiempo.'</td>
					 
					 <td>'.$precio.'</td>
					 
					  <td>'.$longitud.'</td>
					   <td>'.$nombresucursal.'</td>
                   		<td><button onclick="Mostraridbotonedit('.$id.');" class="btn btn-block text-warning" data-toggle="modal" data-target="#Modaleditboton" ><i class="fa fa-edit"></i> </button></td>			
					
					<td><button onclick="Mostrardatadelete('.$id.');" class="btn btn-block text-danger" data-toggle="modal" data-target="#Modaldeletedata" ><i class="fa fa-trash"></i> </button></td>
                </tr>
               
            ';
        
	
    
  }
		 
		 
 
echo "</tbody> </table>";

?>
	<!-- Button trigger modal -->

 


	    </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->