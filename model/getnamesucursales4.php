	

 <?php  

	require("../require/connect_db.php");
	$obtenerda=("SELECT * FROM sucursal"); 
	$datax=mysqli_query($mysqli,$obtenerda);
    $checkid=mysqli_num_rows($datax);  
  
      if($checkid>0){
      	print '<select required class="form-control" id="btnsucursales4" name="sucursal"> ';
              while($verdata=mysqli_fetch_array($datax)){
	
					 					 
				$id=$verdata['id'];
				$name=$verdata['nombre'];

				print '<option value="'.$id.'">'.$name.'</option>';


			          }

			          print '</select>';
      	

      }  else   
 
{ 

	
      print '<input type="text" id="btnsucursales4"  required name="sucursal" class="form-control" value="" placeholder="Nombre Sucursal o zona hotspot"  >';        

}
                 ?>