
    
    <?php
	
	require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	  
	  
	
	
	 $getgroup = $API->comm("/user/group/print");
		
    
    $TotalReg = count($getgroup);


echo '<select id="gruporb" required  name="grupodelusuario" class="form-control" aria-label="Default select example">';
echo '<option   value="">Seleccione grupo</option>';
    for ($i = 0; $i < $TotalReg; $i++) {
		
      $grupo = $getgroup[$i]['name'];
     
    
 

  
		
		   	 
		
		echo '<option value="'.$grupo.'">'.$grupo.'</option>';
   
     
     

     }
echo "</select>";
	 }
	 else
	 {echo 3;}

    ?>




