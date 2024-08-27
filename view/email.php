					 <!-- Default box -->
      <div id="controuters" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Sistema</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">     <?php

				require("../require/connect_db.php");
				$sql=("SELECT * FROM mailer");
				
	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				$query=mysqli_query($mysqli,$sql);

				echo "<table style='width:100%;' id='dataTable' border='1'  class='table table-sm table-bordered table-striped' cellspacing='0'>";
					echo "<thead class='bg-primary text-white' > <tr>";
						
					 
						
						echo "<td>Usuario</td>";
						 	echo "<td>Email</td>";
						 		echo "<td>Host</td>";
						 			echo "<td>Cifrado</td>";
						 			echo "<td>Puerto</td>";
						 					
						
						echo "<td>Editar</td>";
						echo "<td>Borrar</td>";
					echo "</tr> </thead>";

			    	
			?>
			  
			<?php 
				 while($arreglo=mysqli_fetch_array($query)){
					 $id=$arreglo["id"];					 
					 
					  $user=$arreglo["nombreusuario"];
					  $mail=$arreglo["email"];
					  $pass=$arreglo["password"];
					  $host=$arreglo["host"];
					   $cifrado=$arreglo["cifrado"];
					    $puerto=$arreglo["puerto"];
						 
				  	echo "<tr >";				    
				    	
				    	 
				    	echo "<td>$user</td>";		
				    	echo "<td>$mail</td>";	
				    	echo "<td>$host</td>";	
				    	echo "<td>$cifrado</td>";	
				    	echo "<td>$puerto</td>";	

						
						 
					 
						
						

				    	echo "<td><button onclick='Mostrardataedit(".$id.");' class='btn btn-block text-warning' data-toggle='modal' data-target='#ModalCenter1' ><i class='fa fa-edit' ></i> </button>";
						
						
						
						
						echo "<td><button onclick='mostrardatadelete(".$id.");' class='btn btn-block text-danger' data-toggle='modal' data-target='#Modaldeletedata' ><i class='fa fa-trash' ></i> </button></td>";
						
						
						

						
					echo "</tr>";
				}

				echo "</table>";

					extract($_GET);
					if(@$idborrar==2){
		                $target_dir = $img; 	
						$sqlborrar="DELETE FROM productos WHERE id=$id";
						unlink($target_dir);
						$resborrar=mysqli_query($mysqli,$sqlborrar);
						echo "<script>location.href='productos.php?idalert=458'</script>";
					}

			?>               
                            </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
