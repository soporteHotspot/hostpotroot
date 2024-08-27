
      
   <section   class="content">
 
        <div class="row">

        	 <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info "><i class="fa  fa-handshake-slash  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Vendedor </span>
                <span class="info-box-number">
<?php  if(isset($_POST['comentario'])){echo $_POST['comentario']; } ?>  </span>
          </div>
              <!-- /.info-box-content text-dark -->
        </div>
       <!-- /.info-box -->
       </div>
          <!-- /.col -->


    <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info "><i class="fa  fa-calendar-week  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Fecha del sistema </span>
                <span class="info-box-number">
<?php  
require("../require/connect_db.php");


       
$obtenerda=("SELECT * FROM sistema");
$datax=mysqli_query($mysqli,$obtenerda);    
$data=mysqli_fetch_array($datax);
        
$zone=$data['zona'];
$moneda=$data['moneda'];

date_default_timezone_set($zone);
$fecha=date("d/m/Y"); 

require_once '../require/routerboard.phar';
$vendedor =$_SESSION['username'];



if (isset($fecha) ){ echo  
   $fecha; 
    } else {echo "$ 0.00";}  ?> </span>
          </div>
              <!-- /.info-box-content text-dark -->
        </div>
       <!-- /.info-box -->
       </div>
          <!-- /.col -->





            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-cash-register  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Recaudacion   </span>
                <span class="info-box-number">
<?php
 
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on



 
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	
 
$com=$_POST['comentario'];

	 $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
           
            "?disabled" => "yes",
            
            ));

		
		$TotalReg = count($obtenerusers);


			$TotalReg = count($obtenerusers);


			if ($TotalReg<1){
         echo 2;

		}


		else {


//$i = 1;

//while ( $i <= $TotalReg) {
$suma=0;
for ($i = 0; $i < $TotalReg; $i++) {   


	$users = $obtenerusers[$i];

	if(isset($users['comment']))
		
     {$comentariox =$users['comment'];
$comentario2=explode(" ",$comentariox);
$comentario=$comentario2[1];}
 else {$comentario="0 SIN-COMENTARIOS";}
 



if($com==$comentario){
 
		 
		if (isset($users['comment'])){
			$comentariomm =$users['comment'];
			$int=explode(" ",$comentariomm);
			$suma+=(int)$int[0];			 
			
		}
		else {
			$comentario ="";
		}
	
	 	 
}}

 echo $moneda." ". $suma;

}}

else {
	
	echo "Error";
}

 ?> </span>
              </div>
              <!-- /.info-box-content text-dark -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
 </div>
    </section>
    <!-- secion de contenido body -->













      <div   class="card mt-1 ">
        <div class="card-header bg-danger">
          <h3 class="card-title ">Usuarios deshabilitados </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">
 
    
<?php
error_reporting(0);
 ini_set('max_execution_time', '0');
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on




echo "<table id='dataTabletimeout' border='1' style='width:100%;'  class='table border-danger table-sm     table-striped' cellspacing='0'>
            <thead class='bg-warning'>
                <tr> 
                    <th>Usuario</th>
				
					<th>Perfil</th>
					
                  
					 <th>Tiempo limite</th>
					 
                    <th>Comentario</th>
					<th>Estado</th>					
					<th>Imprimir</th>		
					<th>Eliminar</th>
                </tr>
            </thead> <tbody>";
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	
 
$com=$_POST['comentario'];

	 $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
           
            "?disabled" => "yes",
            
            ));

		
		$TotalReg = count($obtenerusers);


			if ($TotalReg<1){
         echo 2;

		}


		else {


//$i = 1;

//while ( $i <= $TotalReg) {

for ($i = 0; $i < $TotalReg; $i++) {   


	$users = $obtenerusers[$i];

$comentariox =$users['comment'];
$comentario2=explode(" ",$comentariox);
$comentario=$comentario2[1];


if($com==$comentario){
	
	$id = $users['.id'];
	$nombre = $users['name'];
	$idx = substr($users['.id'],1,5);
	

	if (isset($users['profile'])){			
			$perfil = $users['profile'];
		}
		else {
			$perfil ="";
		}
	
	
	 
		if (isset($users['limit-uptime'])){			
			$ltiempo =$users['limit-uptime'];
		}
		else {
			$ltiempo ="Ilimitado";
		}
		 
		if (isset($users['comment'])){			
			$comentario = substr($users['comment'],0,30);
			 
			
		}
		else {
			$comentario ="";
		}
	
	$disabled = $users['disabled'];
	
	echo '
	
            
                
                <tr  >
                    <td >'.$nombre.'</td>
				
                     
                    <td>'.$perfil.'</td>					
				 	
					<td>'.$ltiempo.'</td>	
					
					<td>'.$comentario.'</td>';
						if ($disabled=="true"){
						echo "<td class='text-center'>Deshabilitado </td>";


					}

						else if ($disabled=="false") {
							echo "<td class='text-center'> Habilitado </td>";

						}

					
					if ($id=="*0"){ echo "<td></td><td></td>";
						
					} else {
					echo '
                     <td class="text-center"><form action="voucher/usuario" method="post" target="_blank"> <input required type="hidden"  value="'.$nombre.'"     name="usuario"><button type="submit" class="btn  btn-light border"><i class="fas fa-print text-primary"></i></button> </form></td>					
					 
					 <td class="text-center"><button   value="'.$nombre.'" type="button" class="btn btn-light border mostraridusuario " data-toggle="modal" data-target="#Modaldeldeleteuser"><i class="fas fa-user-minus text-danger"></i></button>
					
					</td>	';	}			
					
                echo '</tr>';
               
 
 	 
	
 	 
}}


echo "</tbody> </table>";
 

}
}

else {
	
	echo '<div class="alert alert-danger" role="alert">
  Error de conexión!
</div>';
}

 ?>