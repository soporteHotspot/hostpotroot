
	
	<?php
	
	
		    	$nombre=$_POST['namesend'];
				$email=$_POST['emailsend'];
				$password=$_POST['passend'];
				$hostmail=$_POST['hostsend'];
				$cifrado=$_POST['cifrado'];
				$puerto=$_POST['port'];
	   

    
    require("../../require/connect_db.php");
	$checkname=mysqli_query($mysqli,"SELECT * FROM mailer WHERE id='1'");
	$checkname=mysqli_num_rows($checkname);	
	if($checkname>0){
				
				
mysqli_query($mysqli,"update mailer set nombreusuario='$nombre', email='$email', password='$password', host='$hostmail',cifrado='$cifrado',puerto='$puerto' WHERE id='1'");
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  
 Excelente! se ha actualizado los datos correctamente
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
			}

				else {
				//require("connect_db.php");
 


				mysqli_query($mysqli,"INSERT INTO `mailer` (`id`, `nombreusuario`, `email`, `password`, `host`, `cifrado`, `puerto`) VALUES ('1', '$nombre', '$email', '$password', '$hostmail', '$cifrado', '$puerto')");	
				echo '<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
  <strong>Correcto</strong>  Se ha agregado nuevo estilo, actualice para visualizar
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;

}
				
				
?>