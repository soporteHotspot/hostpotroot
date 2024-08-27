    <?php	
		require("../../require/connect_db.php");
		$sql="SELECT * FROM mailer WHERE id='1'";
	
		$ressql=mysqli_query($mysqli,$sql);
		$row=mysqli_fetch_row ($ressql);
		    	$id=$row[0];			
		    	$nombre=$row[1];
				$email=$row[2];
				$passuser=$row[3];
				$host=$row[4];
				$cifrado=$row[5];
				$puerto=$row[6];
					    							
		    	
		 

		?>