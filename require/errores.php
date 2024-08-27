<?php
 
	if (!$mysqli) {
		echo ' <div class="mt-2 mb-2 pb-5 pt-5 alert alert-warning border-danger" role="alert">
  <strong>Warning!</strong> Falló la conexión a MySQL.  Verifique sus datos de conexión, es posible que la base de datos  ' .$database.' no se ha encontrado
</div>';
	}

	else if($mysqli -> connect_errno==1049){
echo '<div class="mt-2 mb-2 pb-5 pt-5 alert alert-warning border-danger" role="alert">
  <strong>Warning!</strong> La base de datos <strong>'.$database.' </strong> no existe en servidor MySQL
</div>';
 

	}


		else if($mysqli -> connect_errno==1045){
echo ' <div class="mt-2 mb-2 pb-5 pt-5 alert alert-warning border-danger" role="alert">
  <strong>Warning!</strong> Usuario o contraseñas incorrectos para conectar a la base de datos <strong>'.$database.' </strong>
</div>';


	}

			else if($mysqli -> connect_errno==2002){
echo ' <div class="mt-2 mb-2 pb-5 pt-5 alert alert-warning border-danger" role="alert">
  <strong>Warning!</strong> Fallo de conexión con servidor <strong>'.$server.' </strong>
</div>';


	}
		 
 
  ?>