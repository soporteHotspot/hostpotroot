 
  
  
    
    <?php
	
	require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	  
	  
	
	
	 $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => "comment",
               "?disabled" => "yes",
            ));
		
    
    $TotalReg = count($obtenerusers);
     $arraycomment="SIN-COMENTARIOS";
    for ($i = 0; $i < $TotalReg; $i++) {

    	$users = $obtenerusers[$i];

    	if(isset($users['comment']))
		
     {$comentarios =$users['comment'];}
 else if(isset($users['comment'])==null||$users['comment']=="") {$comentarios="0 SIN-COMENTARIOS";}			 
			

			$comentario2=explode(" ",$comentarios);    
            $arraycomment .= ",".$comentario2[1];
    }


 
    $comment=  explode(",",$arraycomment);
     echo '<select required  id="vendedoresperros2" name="vendedor"  class="form-control" >';
	 echo '<option  required   value="">Seleccione comentario</option>';
    foreach (array_unique($comment) as $endcomment) {
		
		    $comentariospersonalizados=str_replace('"', "`", explode(",",$endcomment)[0]);
			$comentariofinal=explode(",",$endcomment)[0];   	 
		
		echo '<option value="'.$comentariospersonalizados.'">'.$comentariofinal.'</option>';
   
     
     

     }
echo "</select>";


 






	 }


	 else {
echo 0;

	 }

    ?>
