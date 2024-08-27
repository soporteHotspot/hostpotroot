 
  
  
    
    




    <?php

	session_start();
//Use any PEAR2_Net_RouterOS class from here on
$ip =$_SESSION['ip'];
 $Usuario=$_SESSION['username'];
 $idsucursal=$_SESSION['idsucursal'];

				require("../require/connect_db.php");


				$obtenerda=("SELECT * FROM cards where mikrotik='$ip' AND idsucursal='$idsucursal'");
                 $data=mysqli_query($mysqli,$obtenerda);    
				
echo '<select required  id="tiemposlotes" name="tiempo"  class="form-control Cardselector">';
	 echo '<option     value="">Seleccione tiempo</option>';

  while($verdata=mysqli_fetch_array($data)){
	
					 					$idcard=$verdata['id']; 
					 $limituptime=$verdata['limituptime'];
					 $des=$verdata['descripcion'];				  					  
					    
					echo '<option value="'.$idcard.'">'.$des.'</option>';	 
	
        
	
    
  }
		 
		 
 
echo '</select>';
?>
