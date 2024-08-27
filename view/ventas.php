



					 
					 <!-- Default box -->
      <div id="controuters" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Fichas  generadas con tpv</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">
 


<?php
require("../require/connect_db.php");
 function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES"; }
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 

       
        $obtenerda=("SELECT * FROM sistema");
    $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        
             $zone=$data['zona'];
              $moneda=$data['moneda'];

date_default_timezone_set($zone);
$fecha=date("d-m-Y"); 

//Use any PEAR2_Net_RouterOS class from here on



				require("../require/connect_db.php");
				
			 
				$obtenerda=("SELECT * FROM fichas ");
                 $data=mysqli_query($mysqli,$obtenerda);    
				
		


echo "<table id='dataTablerouter' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr>
                    <th>Id</th>
					<th>Fecha</th>
					<th>Perfil</th>
					   <th>Tiempo</th>
                    <th>Usuario</th>
                   
                     <th>Precio</th>
                      <th>Vendedor</th>
                       <th>Información</th>  
                      <th>QR</th>
                          
                      <th>Reimprimir</th>   

					
					 
					 <th>Eliminar</th>
					  
					  
                </tr>
            </thead> <tbody>";


        

  while($verdata=mysqli_fetch_array($data)){
	
					 					 
					 $id=$verdata['id'];
					  $fecha=$verdata['fecha'];
					  $perfil=$verdata['perfil'];
					   $tiempo=converttime($verdata['tiempo']);

					   			$username=$verdata['user'];		  
					    $password=$verdata['pass'];
					    $precio=$verdata['precio'];

					    $vendedor=$verdata['vendedor'];
						 
	echo '
	
            
                
                <tr>
                    <td>'.$id.'</td>
					<td>'.$fecha.'</td>
                    <td>'.$perfil.'</td>					
					 <td>'.$tiempo.'</td>
					 <td>'.$username.'</td>
					  
					 <td>'.$moneda.' '.$precio.'</td>
					 <td>'.$vendedor.'</td>

                <td class="text-center"><button value="'.$username.'"  type="submit" class="btn  btn-light border verinfo"><i class="fas fa-info-circle text-primary"></i></button> </td>
                            
                             <td class="text-center"><button value="'.$username.'" type="submit" class="btn  btn-light   getdataqr"><i class="fas fa-qrcode text-secondary" ></i></button> </td>

          <td class="text-center"><form action="voucher/usuario" method="post" target="_blank"> <input required type="hidden"  value="'.$username.'"     name="usuario"><button type="submit" class="btn  btn-light  "><i class="fas fa-print text-primary "></i></button> </form></td>
					
					<td class="text-center"><button title="Eliminar '.$username.'" onclick="Mostrardatadelete('.$id.');" class="btn  btn-light text-danger  " data-toggle="modal" data-target="#Modaldeletedata" ><i class="fa fa-trash"></i> </button></td>
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
