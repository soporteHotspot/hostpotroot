 
  
  
    
    <?php
	
	require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	  
	  
	
	
	 $getlimituptime = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => "limit-uptime",
           
            ));
		
    
    $TotalReg = count($getlimituptime);
    $arrayluptime="00:00:00";
    for ($i = 0; $i < $TotalReg; $i++) {

    	$timer = $getlimituptime[$i];

    	if(isset($timer['limit-uptime']))		
     {$limitup =$timer['limit-uptime'];}
 else if(isset($timer['limit-uptime'])==null||$timer['limit-uptime']=="") {$limitup="00:00:00";}		
     
      $arrayluptime .= ",".$limitup;
		
      
    }

    $luptime=  explode(",",$arrayluptime);
     echo '<select required  id="parametrotarjet" name="parametro"  class="form-control" aria-label="Default select example">';
	 
    foreach (array_unique($luptime) as $uniqueluptime) {
		
		echo '<option value="'.explode(",",$uniqueluptime)[0].'">'.explode(",",$uniqueluptime)[0].'</option>';
   
     
     

     }
echo "</select>";
	 }

	 else {
echo 3;
	 }

    ?>
