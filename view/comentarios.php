 
  
  
    
    <?php
	
	require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	  
	  
	
	
	 $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => "comment",
           
            ));
		
    
    $TotalReg = count($obtenerusers);

    $arraycomment="SIN-COMENTARIOS";
    for ($i = 0; $i < $TotalReg; $i++) {
		$users = $obtenerusers[$i];
		
     if(isset($users['comment']))		
     {$comentarios =$users['comment'];}
 else if(isset($users['comment'])==null||$users['comment']=="") {$comentarios="SIN-COMENTARIOS";}		
     
      $arraycomment .= ",".$comentarios;
    }

    $comment=  explode(",",$arraycomment);
     echo '<select required  id="parametro" name="parametro"  class="form-control" aria-label="Default select example">';
	  
    foreach (array_unique($comment) as $endcomment) {
		    $comentariospersonalizados=str_replace('"', "`", explode(",",$endcomment)[0]);
			$comentariofinal=explode(",",$endcomment)[0];   	 
		
		echo '<option value="'.$comentariospersonalizados.'">'.$comentariofinal.'</option>';
   
     
     

     }
echo "</select>";
	 }
else 

 {echo 3;}
    ?>
